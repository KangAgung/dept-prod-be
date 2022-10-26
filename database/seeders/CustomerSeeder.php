<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('m_customer')->insert([
            'kode' => 'CUS001',
            'name' => 'Customer A',
            'telp' => '085712345678',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('m_customer')->insert([
            'kode' => 'CUS002',
            'name' => 'Customer B',
            'telp' => '085712312378',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('m_customer')->insert([
            'kode' => 'CUS003',
            'name' => 'Customer C',
            'telp' => '085712345123',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('m_customer')->insert([
            'kode' => 'CUS004',
            'name' => 'Customer D',
            'telp' => '085745645678',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('m_customer')->insert([
            'kode' => 'CUS005',
            'name' => 'Customer E',
            'telp' => '085812312378',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
    }
}
