<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            //Waktu akun telah diverivikasi
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            //Role merupakan Level dari User ada 3 (1 pembeli,2 penjual,3 admin)
            $table->string('role')->default('1');
            //Status dari akun, apakah status nya hidup(1), atau belum diverivikasi(2), mati(3)
            $table->string('status')->default('1');
            //Nomor WA aktif dari User
            $table->string('wa',50);
            //Alamat Tinggal User
            $table->text('alamat')->nullable();
            //Foto Profil dari user
            $table->text('foto')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
