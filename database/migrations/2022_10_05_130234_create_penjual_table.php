<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePenjualTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penjual', function (Blueprint $table) {
            $table->id();
            //Field user id untuk menghubungkan tabel penjual dengan tabel user
            $table->foreignId('user_id')->references('id')->on('users')->onDelete('cascade');
            //Field NIM untuk membuktikan bahwa penjual merupakan user dengan predikat mahasiswa TIF aktif
            $table->integer('nim');
            //Feild Berisi Portofolio dari pennjual
            $table->text('portofolio')->nullable;
            //Field Berisi repository github dari penjual
            $table->text('github')->nullable;
            //Field Berisi Logo Penjual
            $table->text('logo');
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
        Schema::dropIfExists('penjual');
    }
}
