<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TSales extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_sales', function (Blueprint $table) {
            $table->id();
            $table->string('kode',15)->unique();
            $table->dateTime('tgl');
            $table->foreignId('cust_id');
            $table->decimal('subtotal');
            $table->decimal('diskon');
            $table->decimal('ongkir');
            $table->decimal('total_bayar');
            $table->timestamps();

            $table->foreign('cust_id')->references('id')->on('m_customer');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('t_sales');
    }
}
