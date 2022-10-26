@extends('admin.part.app')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h class="m-0">Dashboard</h
                  1>
              </div><!-- /.col -->
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="/akun/daftar-akun">Home</a></li>
                  <li class="breadcrumb-item active">Daftar Pembeli</li>
                </ol>
              </div><!-- /.col -->
            </div><!-- /.row -->
          </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
          <div class="container-fluid">
            <div class="card" style="width: 100%">
                <div class="card-header">
                    <h3 class="card-title">Akun Pembeli</h3>
                </div>
              </div>
              <!-- /.card-header -->
                <div class="card-body table-responsive p-0" style="max-height: 480px;">
                <table class="table table-head-fixed text-nowrap">
                    <thead>
                        <tr>
                            <th><center>#</center></th>
                            <th><center>Nama</center></th>
                            <th><center>email</center></th>
                            <th><center>Status Akun</center></th>
                            <th><center>Option</center></th>
                        </tr>
                    </thead>
                    <tbody>
                    @php
                        $no = 1;
                    @endphp
                    @foreach ($pembeli as $beli)
                        <tr>
                        <td><center>{{ $no++ }}</center></td>
                        <td><center>{{ $beli->name}}</center></td>
                        <td><center>{{ $beli->email }} </center></td>
                        <td>
                            @if ($beli->status == 1)
                                <center> Aktif </center>
                            @elseif ($beli->status == 2)
                                <center> Belum Diverifikasi </center>
                            @elseif ($beli->status == 3)
                                <center> Tidak Aktif </center>
                            @endif
                        </td>

                        <td style="max-width:50vh">
                            @if ($beli->status == 1)
                                <a href="/akun/shutdown/{{$beli->id}}"><button style="width: 100%; margin-top:8px" class="btn btn-md btn-danger">Non-Aktifkan</button></a><br>
                            @endif
                            @if ($beli->status == 2)
                                <a href="/akun/verify/{{$beli->id}}"><button style="width: 100%; margin-top:8px" class="btn btn-md btn-primary">Verifikasi</button></a><br>
                            @endif
                            @if ($beli->status == 3)
                                <a href="/akun/activate/{{$beli->id}}"><button style="width: 100%; margin-top:8px" class="btn btn-md btn-success">Aktifkan</button></a><br>
                            @endif
                          <br>
                          <a href="/akun/ubah/{{$beli->id}}"><button style="width: 50%; margin-top:8px" class="btn btn-md btn-warning">Edit</button></a>
                          <a href="/akun/hapus/{{$beli->id}}"><button style="width: 50%; margin-top:8px" class="btn btn-md btn-danger">Hapus</button></a><br>
                      </td>
                     </tr>
                   @endforeach
                   @if ($pembeli->count() == 0)
                       <tr>
                        <td colspan="5"><center>Data Not Found</center></td>
                       </tr>
                   @endif
                  </tbody>
                </table>
              </div>
            <!-- /.row (main row) -->
          </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
      </div>
@endsection
