<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Exception;

class BarangController extends Controller
{
    public function index()
    {
        try {
            $data = Barang::all();

            return response()
                ->json(['status' => 'success', 'data' => $data]);

        } catch (Exception $exception) {
            return response()
                ->json(['status' => 'error','message' => $exception->getMessage()],500);
        }
    }
}
