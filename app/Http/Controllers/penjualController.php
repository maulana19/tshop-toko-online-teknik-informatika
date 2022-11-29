<?php

namespace App\Http\Controllers;

use App\Models\Penjual;
use App\Models\Karya;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class penjualController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = auth()->user()->id;
        $data = User::where(['id' => $id])->first();
        $totalKarya = Karya::where(['id' => $id])->get();
        $totalKaryaValid = Karya::where(['id' => $id])->where(['status' => 3])->get();

        if ($data->foto != null) {
            if (File::exists(public_path('admin/image/foto/profil/'.$data->foto))) {
                $data->foto = 'admin/image/foto/profil/'.$data->foto;
                $data->cekFoto = 1;
            }else{
                $data->foto = 'admin/dist/img/default_profil.png';
                $data->cekFoto = 2;
            }
        }else{
            $data->foto = 'admin/dist/img/default_profil.png';
            $data->cekFoto = 0;
        }

        if ($data->penjual->logo != null) {
            if (File::exists(public_path('admin/image/logo/toko/'. $data->penjual->logo ))) {
                $data->logo = 'admin/image/foto/profil/'. $data->penjual->logo;
                $data->cekLogo = 1;
            }else{
                $data->logo = 'admin/dist/img/default_logo.png';
                $data->cekLogo = 2;
            }
        }else{
            $data->logo = 'admin/dist/img/default_logo.png';
            $data->cekLogo = 0;
        }

        return view('admin.akun.profil', compact('data', 'totalKarya', 'totalKaryaValid'));
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
    public function editAkun(Request $request)
    {
        if ($request->email != null) {
            $validasi = $request->validate([
                'email'     => 'email',
            ],
            [
                'email.email'       => 'Email Tidak Valid',
            ]);
        }
        if ($request->wa != null) {
            $validasi = $request->validate([
                'wa'     => 'regex:/^(08)/|min:12',
            ],
            [
                'wa.regex'       => 'Periksa Nomor Whatsapp Anda, Nomor yang Dimasukkan Harus Diawali angka 08 ',
                'wa.min'         => 'Periksa Nomor Whatsapp Anda, Nomor yang Dimasukkan memiliki jumlah angka yang tidak wajar ',
            ]);
        }
        $data = [];
        if($request->name != null){
            $data += ['name' => $request->name];
        }
        if($request->email != null){
            $data += ['email' => $request->email];
        }
        if($request->wa != null){
            $data += ['wa' => $request->wa];
        }
        if($request->alamat != null){
            $data += ['alamat' => $request->alamat];
        }
        $editData = User::where(['id' => auth()->user()->id])->update($data);
        if($request->nim != null){
            $validasi = $request->validate([
                'nim'  => 'numeric'
            ],[
                'nim.numeric' => 'NIM Hanya Boleh Berisi Angka'
            ]);
            $editData = Penjual::where(['user_id' => auth()->user()->id])->update(['nim' => $request->nim]);
        }
        return redirect('/akun/profil');
    }

    public function editFotoAkun(Request $request)
    {
        return 'ok Edit Foto';
    }

    public function editLogoAkun(Request $request)
    {
        return 'ok Edit Logo';
    }
}
