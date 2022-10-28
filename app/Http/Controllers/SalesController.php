<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Customer;
use App\Models\Sales;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class SalesController extends Controller
{
    public function index(Request $request)
    {
        try {
            $search = $request->get('search') ?: '';
            $sortBy = $request->get('sortBy') ?: 't_sales.kode';
            $sort = $request->get('sort') ?: 'asc';
            $perPage = $request->get('perPage') ?: 10;

            $data = Sales::with('barang')
                ->join('m_customer','m_customer.id','=','t_sales.cust_id')
                ->where('m_customer.name', 'like','%'.strtolower($search).'%')
                ->orderBy($sortBy,$sort)
                ->paginate($perPage,['t_sales.*','m_customer.name']);

            return response()
                ->json(['status' => 'success', 'data' => $data]);
        } catch (Exception $exception) {
            return response()
                ->json(['status' => 'error','message' => $exception->getMessage()],500);
        }
    }

    public function store(Request $request)
    {
        try {
            $data = new Sales;
            $data->kode = $request->input('kode');
            $data->tgl = $request->input('tgl');
            $data->subtotal = $request->input('subtotal');
            $data->diskon = $request->input('diskon');
            $data->ongkir = $request->input('ongkir');
            $data->total_bayar = $request->input('total_bayar');

            $cust = Customer::findOrFail($request->input('cust_id'));
            $cust->sales()->save($data);

            $sales = Sales::findOrFail($data->id);
            $barang = array();

            foreach ($request->input('barang') as $value){
                $dataBarang = [
                    'harga_bandrol' => $value['harga_bandrol'],
                    'qty' => $value['qty'],
                    'diskon_pct' => $value['diskon_pct'],
                    'diskon_nilai' => $value['diskon_nilai'],
                    'harga_diskon' => $value['harga_diskon'],
                    'total' => $value['total'],
                ];
                $sales->barang()->attach($value['barang_id'], $dataBarang);
                $dataBarang = array_merge($dataBarang,['barang_id' => $value['barang_id']]);

                $item = Barang::findOrFail($value['barang_id']);
                $item->stok = $item->stok - $value['qty'];
                $item->save();

                $barang[] = $dataBarang;
            }

            $data->barang = $barang;

            return response()
                ->json([
                    'status' => 'success',
                    'message' => 'Berhasil menyimpan transaksi',
                    'data' => $data,
                ],201);
        } catch (ModelNotFoundException $exception) {
            return response()
                ->json(['status' => 'error', 'message' => 'customer / transaksi tidak ditemukan'], 404);
        } catch (Exception $exception) {
            return response()
                ->json(['status' => 'error','message' => $exception->getMessage()],500);
        }
    }
}