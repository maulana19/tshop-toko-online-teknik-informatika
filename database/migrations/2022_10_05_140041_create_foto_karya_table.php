<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFotoKaryaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('foto_karya', function (Blueprint $table) {
            $table->id();
            //Field sebagai penghubung tabel foto dengan tabel karya
            $table->foreignId('karya_id')->references('id')->on('karya');
            //Field berisi nama foto dari karya
            $table->string('nama_foto');
            //Field Optional yang berisi alamat dari foto yang disimpan
            $table->text('alamat_foto')->nullable();
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
        Schema::dropIfExists('foto_karya');
    }
}
