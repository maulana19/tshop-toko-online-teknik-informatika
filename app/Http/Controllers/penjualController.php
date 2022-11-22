<?php

namespace App\Http\Controllers;

use App\Models\Penjual;
use App\Models\User;
use Illuminate\Http\Request;

class penjualController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.akun.profil');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Penjual  $penjual
     * @return \Illuminate\Http\Response
     */
    public function show(Penjual $penjual)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Penjual  $penjual
     * @return \Illuminate\Http\Response
     */
    public function edit(Penjual $penjual)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Penjual  $penjual
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Penjual $penjual)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Penjual  $penjual
     * @return \Illuminate\Http\Response
     */
    public function destroy(Penjual $penjual)
    {
        //
    }
    public function daftarAkun()
    {
        //Mengambil semua data user
        $totalAkun = User::all();

        //Mengambil semua data Penjual
        $totalPenjual = User::where(['role' => 2])->get();

        //Mengambil semua data akun yang terverivikasi
        $totalAkunVer = User::where(['status'=> 1])->get();

        //Mengambil semua data Pembeli
        $totalPembeli = User::where(['role' => 1])->get();


        //Mengambil semua data Penjual batas 5 data
        $penjual = User::where(['role' => 2])->limit(5)->orderBy('id','DESC')->get();

        //Mengambil semua data Pembeli batas 5 data
        $pembeli = User::where(['role' => 1])->limit(5)->orderBy('id','DESC')->get();

        //menampilkan halaman akun/index
        return view('admin.akun.index', compact('totalAkun', 'totalPenjual', 'totalPembeli', 'totalAkunVer','penjual', 'pembeli'));
    }

    public function daftarPenjual()
    {
        //Mengambil semua data Pembeli
        $penjual = User::where(['role' => 2])->get();

        //menampilkan halaman akun/index
        return view('admin.akun.penjual.index', compact('penjual'));
    }

    public function daftarPembeli()
    {
        //Mengambil semua data Pembeli
        $pembeli = User::where(['role' => 1])->get();

        //menampilkan halaman akun/index
        return view('admin.akun.pembeli.index', compact('pembeli'));
    }

    public function matikanAkun($id)
    {
        $ubah = User::where(['id' => $id])->update(['status' => 3]);
        return redirect('/akun/daftar-akun');
    }

    public function verAkun($id)
    {
        $ubah = User::where(['id' => $id])->update(['status' => 1]);
        return redirect('/akun/daftar-akun');
    }

    public function aktifkanAkun($id)
    {
        $ubah = User::where(['id' => $id])->update(['status' => 2]);
        return redirect('/akun/daftar-akun');
    }

    public function hapusAkun($id)
    {
        User::where(['id' => $id])->delete();
        return redirect('/akun/daftar-akun');
    }

    public function changePassword()
    {
        return view('admin.akun.password');
    }

    public function saveChangePassword(Request $request)
    {
        //Validasi Password Inputan User
        $data = $request->validate([
            'password_lama' => 'required',
            'password_baru' => 'required'
        ]);
        return redirect('/akun/profil');
    }
}
