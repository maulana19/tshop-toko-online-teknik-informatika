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
                  <li class="breadcrumb-item active">Akun Penjual</li>
                </ol>
              </div><!-- /.col -->
            </div><!-- /.row -->
          </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
          <div class="container-fluid">
            <div class="card" style="width: 100%;margin-top:50px">
              <div class="card-header">
                <h3 class="card-title">Akun Penjual</h3>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0" style="max-height: 480px;">
                <table class="table table-head-fixed text-nowrap">
                  <thead>

                    <tr>
                      <th><center>#</center></th>
                      <th><center>Nama</center></th>
                      <th><center>Status</center></th>
                      <th><center>Option</center></th>
                    </tr>
                  </thead>
                  <tbody>
                  @php
                    $no = 1;
                   @endphp
                   @foreach ($penjual as $jual)
                     <tr>
                        <td><center>{{ $no++ }}</center></td>
                        <td><center>{{ $jual->nama_karya }} </center></td>
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
                        @if ($jual->status == 1)
                            <a href="/akun/shutdown/{{$jual->id}}"><button style="width: 100%; margin-top:8px" class="btn btn-md btn-danger">Non-Aktifkan</button></a><br>
                        @endif
                        @if ($jual->status == 2)
                            <a href="/akun/verify/{{$jual->id}}"><button style="width: 100%; margin-top:8px" class="btn btn-md btn-primary">Verifikasi</button></a><br>
                        @endif
                        @if ($jual->status == 3)
                            <a href="/akun/activate/{{$jual->id}}"><button style="width: 100%; margin-top:8px" class="btn btn-md btn-success">Aktifkan</button></a><br>
                        @endif
                        <br>
                          <a href="/akun/ubah/{{$jual->id}}"><button style="width: 50%; margin-top:8px" class="btn btn-md btn-warning">Edit</button></a>
                          <a href="/akun/hapus/{{$jual->id}}"><button style="width: 50%; margin-top:8px" class="btn btn-md btn-danger">Hapus</button></a><br>
                      </td>
                     </tr>
                   @endforeach
                   @if ($penjual->count() == 0)
                       <tr>
                        <td colspan="5"><center>Data Not Found</center></td>
                       </tr>
                   @endif
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.row (main row) -->
          </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
      </div>
@endsection
