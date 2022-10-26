@extends('admin.part.app')
@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Tambah Karya Baru</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="/karya-list">Karya</a></li>
                <li class="breadcrumb-item active">Tambah</li>
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
            <div class="card card-default">
              <div class="card-header">
                <h3 class="card-title">Lengkapi Data Karya Kamu</h3>
              </div>
                <div class="card-body p-0">
                <!-- your steps content here -->
                    <form action="karya/tambah-simpan" enctype="multipart/form-data" method="post">
                        @csrf
                        <div id="logins-part" class="content" role="tabpanel" aria-labelledby="logins-part-trigger">
                            <div class="row" style="margin: 20px">
                            <div class="col-md-6">
                                <div class="form-group">
                                <label>Nama Karya</label>
                                <input type="text" class="form-control" name="nama_karya" id="" placeholder="Isi nama karya yang ingin ditambah">
                                </div>
                                <!-- /.form-group -->
                                <div class="form-group">
                                <label>Harga</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                    <span class="input-group-text"><i><b>Rp. </b></i></span>
                                    </div>
                                    <input type="number" name="harga" class="form-control">

                                    <div class="input-group-append">
                                    <span class="input-group-text"><i>,00</i></span>
                                    </div>
                                </div>
                                <!-- /.input group -->
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputFile">Foto Karya</label>
                                    <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" name="nama_foto" class="custom-file-input" id="exampleInputFile">
                                        <label class="custom-file-label" for="exampleInputFile">Pilih Foto</label>
                                    </div>
                                    </div>
                                </div>
                                <!-- /.form-group -->
                            </div>


                            <div class="col-md-6">
                                <!-- /.form-group -->
                                <div class="form-group">
                                    <label>Deskripsi</label>
                                    <textarea class="form-control" name="deskripsi" cols="30" rows="4" placeholder="Lengkapi deskripsi dari karya anda"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputFile">Demo</label>
                                    <textarea name="demo" class="form-control" id="" cols="30" rows="2" placeholder="Paste link demo dari karya disini !!"></textarea>
                                </div>
                                <!-- /.form-group -->
                            </div>
                            </div>
                            <input type="submit" class="btn btn-primary btn-block" value="Submit">

                        </div>
                    </form>
                </div>
            </div>
            <!-- /.card -->
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





