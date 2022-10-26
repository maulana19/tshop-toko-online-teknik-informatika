<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKaryaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('karya', function (Blueprint $table) {
            $table->id();
            //Field untuk menghubungkan tabel karya dengan tabel penjual
            $table->foreignId('penjual_id')->references('id')->on('penjual');
            //Field berisi nama karya yang dijual oleh penjual
            $table->string('nama_karya');
            //Field berisi status karya : (3) terverivikasi, (2) Belum Terverivikasi
            $table->string('status')->default('2');
            //Field ini berisi deskripsi dari karya
            $table->text('deskripsi');
            //Field ini berisi Total ukuran file dari karya dalam satuan bit
            $table->integer('ukuran_karya');
            //Field Berisi Link Demonstrasi dari karya
            $table->text('demo')->nullable();
            //Field Berisi Harga dari Karya
            $table->integer('harga');
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
        Schema::dropIfExists('karya');
    }
}
