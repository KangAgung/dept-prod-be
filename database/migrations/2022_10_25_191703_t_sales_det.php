<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TSalesDet extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_sales_det', function (Blueprint $table) {
            $table->foreignId('sales_id');
            $table->foreignId('barang_id');
            $table->decimal('harga_bandrol',16,2,true);
            $table->integer('qty');
            $table->decimal('diskon_pct');
            $table->decimal('diskon_nilai',16,2,true);
            $table->decimal('harga_diskon',16,2,true);
            $table->decimal('total',16,2,true);

            $table->foreign('sales_id')->references('id')->on('t_sales');
            $table->foreign('barang_id')->references('id')->on('m_barang');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('t_sales_det');
    }
}
