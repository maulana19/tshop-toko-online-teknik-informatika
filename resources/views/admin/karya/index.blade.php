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
                <li class="breadcrumb-item"><a href="karya-list">Home</a></li>
                <li class="breadcrumb-item active">Karya</li>
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
          <div class="row">
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-info">
                <div class="inner">
                  <h3>{{ $data->count()}}</h3>

                  <p>Jumlah Karya</p>
                </div>
                <div class="icon">
                  <i class="ion ion-bag"></i>
                </div>
                {{-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> --}}
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-success">
                <div class="inner">
                  <h3>53<sup style="font-size: 20px">%</sup></h3>

                  <p>Karya Terjual</p>
                </div>
                <div class="icon">
                  <i class="ion ion-stats-bars"></i>
                </div>
                {{-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> --}}
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-warning">
                <div class="inner">
                  <h3>44</h3>

                  <p>Penjualan Bulan Ini</p>
                </div>
                <div class="icon">
                  <i class="ion ion-person-add"></i>
                </div>
                {{-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> --}}
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-danger">
                <div class="inner">
                  <h3>65</h3>

                  <p>Total Pemasukan</p>
                </div>
                <div class="icon">
                  <i class="ion ion-pie-graph"></i>
                </div>
                {{-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> --}}
              </div>
            </div>
            <!-- ./col -->
          </div>
          <div class="card" style="width: 100%">
            <div class="card-header">
              <h3 class="card-title">Daftar Karya</h3>
              <div class="card-tools">
                {{-- Pencarian --}}


                {{-- <form action="/back/karya/search" method="get">
                <div class="input-group input-group-sm" style="width: 300px;">
                  <input type="text" name="keyword" value="{{ $cari }}" class="form-control float-right" placeholder="Search">
                  <div class="input-group-append">
                    <button type="submit" class="btn btn-default">
                      <i class="fas fa-search"></i>
                    </button>
                  </div>
                </form> --}}
                <a href="/karya-tambah">
                  <button type="button" class="ml-1 btn btn-sm btn-success">Tambah Karya Baru</button>
                </a>
                </form>
                </div>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0" style="max-height: 480px;">
              <table class="table table-head-fixed text-nowrap">
                <thead>

                  <tr>
                    <th><center>#</center></th>
                    <th><center>Nama Karya</center></th>
                    <th><center>Harga</center></th>
                    {{-- <th><center>Photo</center></th> --}}
                    <th><center>Option</center></th>
                  </tr>
                </thead>
                <tbody>
                @php
                  $no = 1;
                 @endphp
                 @foreach ($data as $karya)
                   <tr>
                     <td><center>{{ $no++ }}</center></td>
                     {{-- <td><center><img src="{{ asset('image/karya/'.$karya->foto) }}" alt="" width="50px" srcset=""></center></td> --}}
                     <td><center>{{ $karya->nama_karya }} </center></td>
                     <td><center>{{ $karya->harga }} </center></td>

                     <td style="max-width:50vh">
                        @if ($karya->demo != null)
                            <a href="{{$karya->demo ? $karya->demo : '#'}}" {{ $karya->demo ? 'target="_blank"': '' }}><button style="width: 50%" class="btn btn-md btn-success">Preview Demo</button></a>
                        @endif
                        <a href="/karya/detail/{{ $karya->id }}"><button style="width: {{$karya->demo? '50%':'100%'}}" class="btn btn-md btn-info">Detail</button></a>

                        <br>
                        <a href="/karya/ubah/"><button style="width: 50%; margin-top:8px" class="btn btn-md btn-warning">Edit</button></a>
                        <a href="/karya/hapus/{{$karya->id}}"><button style="width: 50%; margin-top:8px" class="btn btn-md btn-danger">Hapus</button></a><br>

                        @if ($karya->status == 2)
                        <form action="/karya/verifikasi" method="POST">@csrf <input type="hidden" name="id" value="{{$karya->id}}"><button type="submit" style="width: 100%; margin-top:15px" class="btn btn-lg btn-primary">Verifikasi</button></form>
                        @endif
                    </td>
                   </tr>
                 @endforeach
                 @if ($data->count() == 0)
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
