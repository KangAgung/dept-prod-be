<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('m_barang')->insert([
            'kode' => 'A001',
            'nama' => 'Barang A',
            'harga' => 200000,
            'stok' => 30,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('m_barang')->insert([
            'kode' => 'C025',
            'nama' => 'Barang B',
            'harga' => 350000,
            'stok' => 30,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('m_barang')->insert([
            'kode' => 'A102',
            'nama' => 'Barang C',
            'harga' => 125000,
            'stok' => 30,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('m_barang')->insert([
            'kode' => 'A301',
            'nama' => 'Barang D',
            'harga' => 300000,
            'stok' => 30,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('m_barang')->insert([
            'kode' => 'B221',
            'nama' => 'Barang E',
            'harga' => 300000,
            'stok' => 30,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
    }
}
