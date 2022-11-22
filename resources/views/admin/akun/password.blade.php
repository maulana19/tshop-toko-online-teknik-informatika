@extends('admin.part.app')
@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Ganti Password</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="/akun/daftar-akun">Home</a></li>
                <li class="breadcrumb-item active">Password</li>
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
                <h3 class="card-title">Silahkan Isi Inputan Berikut Bila Ingin Mengubah Password</h3>
              </div>
                <div class="card-body p-0">
                <!-- your steps content here -->
                    <form action="/akun/ubah-password/simpan" method="post">
                        @csrf
                        <div id="logins-part" class="content" role="tabpanel" aria-labelledby="logins-part-trigger">
                                <div class="row" style="margin: 20px">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Password Lama</label>
                                            <input type="password" class="form-control" name="password_lama" id="" placeholder="Tulis Password Lama Kamu disini">
                                        </div>
                                    </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputFile">Password Baru</label>
                                        <input type="password" class="form-control" name="password_baru" id="" placeholder="Tulis Password Baru Kamu disini">
                                    </div>
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
