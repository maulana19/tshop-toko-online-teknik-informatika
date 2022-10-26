<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePembayaranTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pembayaran', function (Blueprint $table) {
            $table->id();
            //Field menghubungkan tabel pembayaran dengan transaksi
            $table->foreignId('transaksi_id')->references('id')->on('transaksi');
            //Field berisi status pembayaran: (1) menunggu transfer, (2) berhasil ditransfer, (3) Gagal atau batal
            // $table->integer('status_pembayaran');

            //Field Berisi nomor pembayaran karya yang dipesan
            $table->text('nomor_pembayaran')->nullable();
            //Field Berisi Informasi transfer
            $table->string('via_pembayaran')->nullable();
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
        Schema::dropIfExists('pembayaran');
    }
}
