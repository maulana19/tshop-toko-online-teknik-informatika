<?php

use Illuminate\Support\Facades\Route;
use App\http\Controllers\karyaController;
use App\http\Controllers\penjualController;
use App\http\Controllers\transaksiController;
use App\http\Controllers\loginController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//Route untuk menampilkan halaman awal karya
Route::get('karya-list',[karyaController::class,'index']);
//Route untuk menampilkan halaman tambah karya baru
Route::get('karya-tambah',[karyaController::class,'create']);
//Route untuk menampilkan halaman edit karya
Route::get('karya-edit/{id}',[karyaController::class,'edit']);
//Route untuk menyimpan karya baru
Route::post('karya/tambah-simpan',[karyaController::class,'store']);
//Route untuk menyimpan perubahan dari karya
Route::post('karya/edit-simpan/{id}',[karyaController::class,'update']);
//Route untuk Menghapus Data Karya
Route::get('karya/hapus/{id}',[karyaController::class,'destroy']);
//Route untuk Verifikasi Data Karya
Route::post('karya/verifikasi', [karyaController::class, 'verifikasiKarya']);
//Route untuk melihat foto
Route::get('karya/detail/{id}', [karyaController::class, 'preview']);

//Route untuk menampilkan semua akun yang ada
Route::get('akun/daftar-akun', [penjualController::class, 'daftarAkun']);
//Route untuk menampilkan semua akun penjual yang ada
Route::get('akun/daftar-penjual', [penjualController::class, 'daftarPenjual']);
//Route untuk menampilkan semua akun pembeli yang ada
Route::get('akun/daftar-pembeli', [penjualController::class, 'daftarPembeli']);
//Route untuk mematikan akun yang dipilih
Route::get('akun/shutdown/{id}', [penjualController::class, 'matikanAkun']);
//Route untuk memverifikasi akun yang dipilih
Route::get('akun/verify/{id}', [penjualController::class, 'verAkun']);
//Route untuk mengaktifkan akun yang dipilih
Route::get('akun/activate/{id}', [penjualController::class, 'aktifkanAkun']);
//Route untuk menghapus akun yang dipilih
Route::get('akun/hapus/{id}', [penjualController::class, 'hapusAkun']);

//Route untuk Mengubah Data Profil
Route::post('akun/profil/ubahProfil', [penjualController::Class, 'editAkun']);

//Route untuk Mengubah Foto Profil
Route::post('akun/upload/foto', [penjualController::Class, 'editFotoAkun']);

//Route untuk Mengubah Logo
Route::post('akun/upload/logo', [penjualController::Class, 'editLogoAkun']);


//Route untuk menampilkan data transaksi
Route::get('transaksi', [transaksiController::class, 'index']);
//Route untuk menghapus data transaksi yang dipilih
Route::get('transaksi/hapus/{id}', [transaksiController::class, 'destroy']);


//Route untuk menampilkan halaman detail profil
Route::get('akun/profil', [penjualController::class, 'index']);
//Route untuk menampilkan halaman ubah password
Route::get('akun/ubah-password', [penjualController::class, 'changePassword']);
//Route untuk mengubah password
Route::post('akun/ubah-password/simpan', [penjualController::class, 'saveChangePassword']);

//Route Menampilkan Halaman Login
Route::get('login', [loginController::class, 'index']);
//Route Memproses Login
Route::post('signin', [loginController::class, 'attempt']);
//Route untuk Logout dari Akun
Route::get('logout', [loginController::class, 'logout']);


//Route Menampilkan Halaman Register
Route::get('register', [loginController::class, 'register']);
