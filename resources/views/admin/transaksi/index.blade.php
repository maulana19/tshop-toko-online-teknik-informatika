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
                  <li class="breadcrumb-item"><a href="/transaksi">Home</a></li>
                  <li class="breadcrumb-item active">Daftar Transaksi</li>
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
                    <h3 class="card-title">Daftar Transaksi</h3>
                </div>
              </div>
              <!-- /.card-header -->
                <div class="card-body table-responsive p-0" style="max-height: 480px;">
                <table class="table table-head-fixed text-nowrap">
                    <thead>
                        <tr>
                            <th><center>#</center></th>
                            <th><center>Waktu Transaksi</center></th>
                            <th><center>Pembeli</center></th>
                            <th><center>Karya</center></th>
                            <th><center>Total Harga</center></th>
                            <th><center>Status Pesanan</center></th>
                            <th><center>Option</center></th>
                        </tr>
                    </thead>
                    <tbody>
                    @php
                        $no = 1;
                    @endphp
                    @foreach ($dataTransaksi as $data)
                        <tr>
                        <td><center>{{ $no++ }}</center></td>
                        <td><center>{{ $data->updated_at}}</center></td>
                        <td><center>{{ $data->pembeli->name }} </center></td>
                        <td><center>{{ $data->karya->nama_karya }} </center></td>
                        <td><center>{{ $data->total_harga }} </center></td>
                        <td>
                            @if ($data->status == 1)
                                <center> Sedang Diproses </center>
                            @elseif ($data->status == 2)
                                <center> Menunggu Pemayaran </center>
                            @elseif ($data->status == 3)
                                <center> Selesai </center>
                            @elseif ($data->status == 4)
                                <center> Batal </center>
                            @endif
                        </td>

                        <td>
                          <a href="/transaksi/hapus/{{$data->id}}"><button class="btn btn-md btn-danger">Hapus</button></a><br>
                      </td>
                     </tr>
                   @endforeach
                   @if ($dataTransaksi->count() == 0)
                       <tr>
                        <td colspan="7"><center>Data Not Found</center></td>
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
