<?php

namespace App\Http\Controllers;

use App\Models\Karya;
use App\Models\FotoBarang;
use Illuminate\Http\Request;
use Image;

class karyaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    //Function untuk mengirim data ke halaman karya dan menampilkan halaman
    public function index()
    {
        $data = Karya::all();
        return view('admin.karya.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    //Function untuk mengirim data ke halaman Menambah data karya dan menampilkan halaman
    public function create()
    {

        return view('admin.karya.tambah');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'nama_karya'    => 'required',
            'harga'         => 'required',
            'nama_foto'     => 'image|mimes:jpeg,png,jpg',
            'deskripsi'     => 'required'
        ]);
        //Cari Cara Upload Foto
        $fotoMentah  = $request->file('nama_foto');
        $foto_size   = $request->file('nama_foto')->getSize();
        $namaFoto = 'lg'.time().'.'.$fotoMentah->extension();
        $lokasiFoto = public_path('admin\image\foto');
        $foto = Image::make($fotoMentah->path());
        $save = $foto->save($lokasiFoto."\\".$namaFoto);

        $upload = [
            'penjual_id'    => 1,
            'nama_karya'    => $request->nama_karya,
            'status'        => 2,
            'deskripsi'     => $request->deskripsi,
            'ukuran_karya'  => $foto_size,
            'demo'          => $request->demo,
            'harga'         => $request->harga,
        ];
        Karya::insert($upload);
        $dataKarya = Karya::orderBy('id', 'DESC')->first();
        $karya_id = $dataKarya->id;
        FotoBarang::insert([
            'karya_id'  => $karya_id,
            'nama_foto' => $namaFoto
        ]);
        return redirect('/karya-list');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Karya  $karya
     * @return \Illuminate\Http\Response
     */
    public function show(Karya $karya)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Karya  $karya
     * @return \Illuminate\Http\Response
     */

     //Function untuk mengirim data ke halaman edit karya dan menampilkan halaman
    public function edit(Karya $karya)
    {
        return view('admin.karya.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Karya  $karya
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Karya $karya)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Karya  $karya
     * @return \Illuminate\Http\Response
     */
    public function destroy(Karya $karya, $id)
    {
        $deleteFoto = FotoBarang::where(['karya_id' => $id])->delete();
        $deleteKarya = Karya::where(['id' => $id])->delete();
            if ($deleteKarya) {
                return redirect('/karya-list');
            }
    }
    public function verifikasiKarya(Request $request)
    {

        $updateKarya = Karya::where(['id' => $request->id])->update(['status' => 3]);
        if ($updateKarya) {
            return redirect('/karya-list');
        }
    }
    public function preview($id)
    {
        $dataKarya = Karya::where(['id' => $id])->first();
        $dataFoto  = FotoBarang::where(['karya_id' => $id])->first();
        return view('admin.karya.detail', compact('dataKarya', 'dataFoto'));
    }
}
