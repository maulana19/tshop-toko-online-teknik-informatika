@extends('admin.part.app')
@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            {{-- <h1 class="m-0">Detail Karya</h1> --}}
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="/karya-list">Karya</a></li>
                <li class="breadcrumb-item active">Detail</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->

    <!-- Main content -->
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="card" style="width: 100%">
                <div class="card-header">
                  <h3 class="card-title">Detail Karya</h3>
                  <div class="card-tools">
                    {{-- Pencarian --}}


                    {{-- <form action="/back/barang/search" method="get">
                    <div class="input-group input-group-sm" style="width: 300px;">
                      <input type="text" name="keyword" value="{{ $cari }}" class="form-control float-right" placeholder="Search">
                      <div class="input-group-append">
                        <button type="submit" class="btn btn-default">
                          <i class="fas fa-search"></i>
                        </button>
                      </div>
                    </form> --}}
                      {{-- <button type="button" class="ml-1 btn btn-sm btn-success"  data-toggle="modal" data-target="#modal-default">Edit Suplier Profile</button> --}}
                    {{-- </form> --}}
                    </div>
                  </div>
                </div>
                <div class="card-body">
                   <div class="row">
                      <div class="col-md-12 my-auto"style="text-align: center">
                          {{-- <img src="{{ asset('image/logo').'/'.$data[0]->logo }}" alt="Suplier Logo" class="brand-image img-circle elevation-3" style="opacity: .8;width:150px"> --}}
                          <h2 style="margin-top: 20px"><center>{{ $dataKarya->nama_karya}}</center></h2>
                          <img src="{{asset('admin/image/foto/'.$dataFoto->nama_foto)}}" alt="Foto Karya" class="brand-image elevation-3" style="width:70%">
                      </div>
                      <div class="col-md-12 mt-4 mx-auto">
                          <div style="background-color:white; border:solid rgb(215, 215, 215); padding-left: 30px; padding-right: 30px; padding-top:30px; padding-bottom:30px;border-radius:5px">
                              <div class="row">
                                  <div class="col-md-6">
                                      <h3 class="card-title"><b>Nama Toko</b></h3><br>
                                      <h2 class="card-title" style="margin-left: 10px;">TesShop</h2><br>
                                      <br>
                                      <h3 class="card-title"><b>Status</b></h3><br>
                                      <h2 class="card-title" style="margin-left: 10px;">{{$dataKarya->status == 2 ? 'Valid' : 'Belum Valid'}}</h2><br>
                                      <br>
                                      <h3 class="card-title"><b>Ukuran Karya</b></h3><br>
                                      <h2 class="card-title" style="margin-left: 10px;">{{$dataKarya->ukuran_karya/1000000}} MB</h2><br>
                                      <br>
                                      <h3 class="card-title"><b>Harga</b></h3><br>
                                      <h2 class="card-title" style="margin-left: 10px;">Rp {{$dataKarya->harga}}</h2><br>
                                  </div>
                                  <div class="col-md-6">
                                      <h3 class="card-title"><b>Deskripsi</b></h3><br>
                                      <h2 class="card-title" style="margin-left: 10px;">{{$dataKarya->deskripsi}}</h2><br>
                                  </div>
                              </div>
                          </div>
                      </div>
                   </div>
                </div>
                <!-- /.card-body -->
              </div>
          </div>
        </div>
        <!-- /.row -->
      </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>

@endsection
