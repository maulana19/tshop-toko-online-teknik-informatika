<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransaksiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksi', function (Blueprint $table) {
            $table->id();
            //Field untuk menghubungkan table transaksi dengan tabel user
            $table->foreignId('pembeli_id')->references('id')->on('users');
            //Field untuk menghubungkan table transaksi dengan tabel penjual
            $table->foreignId('penjual_id')->references('id')->on('penjual');
            //Field untuk menghubungkan table transaksi dengan tabel karya
            $table->foreignId('karya_id')->references('id')->on('karya');
            //Field berisi total barang yang dipesan
            $table->integer('total_barang');
            //Field berisi Total Harga yang harus dibayar
            $table->integer('total_harga');
            //Field berisi informasi status dari transaksi: (1) diproses, (2)menunggu pembayaran, (3) diterima/selesai, (4) batal
            $table->integer('status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transaksi');
    }
}
