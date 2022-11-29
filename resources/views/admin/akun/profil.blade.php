@extends('admin.part.app')
@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Detail Profil</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Profil</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle"
                       src="{{ asset($data->logo)}}"
                       alt="Logo Toko">
                </div>

                <h3 class="profile-username text-center">{{$data->name}}</h3>

                <p class="text-muted text-center">{{$data->penjual->nim}}</p>

                @if (auth()->user()->status == 1)
                    <div class="alert alert-success" role="alert">
                        <center>
                            Toko & Akun Aktif
                        </center>
                    </div>
                @endif

                @if (auth()->user()->status == 2)
                    <div class="alert alert-info" role="alert">
                        <center>Toko & Akun <br> Belum Terverivikasi</center>
                    </div>
                @endif

                @if (auth()->user()->status == 3)
                    <div class="alert alert-danger" role="alert">
                        <center>Toko & Akun Tidak Aktif</center>
                    </div>
                @endif

                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b>Github Repo: </b> <a class="float-right" href="{{ $data->penjual->github ? $data->penjual->github : '#' }}">{{ $data->penjual->github ? $data->penjual->github : "-" }}</a>
                  </li>
                  <li class="list-group-item">
                    <b>Portofolio: </b> <a class="float-right" href="{{ $data->penjual->portofolio ? $data->penjual->portofolio : '#' }}">{{ $data->penjual->portofolio ? $data->penjual->portofolio : "-"}}</a>
                  </li>
                  {{-- <li class="list-group-item">
                    <b>Karya Terjual</b> <a class="float-right">543</a>
                  </li> --}}
                  <li class="list-group-item">
                    <b>Total Karya</b> <a class="float-right">{{ $totalKarya->count() }}</a>
                  </li>

                  <li class="list-group-item">
                    <b>Total Karya Valid</b> <a class="float-right">{{ $totalKaryaValid->count() }}</a>
                  </li>
                </ul>

                <a href="{{ $data->penjual->github ? $data->penjual->github : '#' }}" class="btn btn-primary btn-block"><b>Lihat Github</b></a>
                <a href="{{ $data->penjual->portofolio ? $data->penjual->portofolio : '#' }}" class="btn btn-secondary btn-block"><b>Lihat Portofolio</b></a>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

          </div>
          <!-- /.col -->
          <div class="col-md-9">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                    <li class="nav-item"><a class="nav-link active" href="#info" data-toggle="tab">Penting</a></li>
                  <li class="nav-item"><a class="nav-link " href="#activity" data-toggle="tab">Data Profil</a></li>
                  <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Ubah Data</a></li>
                  <li class="nav-item"><a class="nav-link" href="#foto" data-toggle="tab">Upload Foto Profil</a></li>
                  <li class="nav-item"><a class="nav-link" href="#logo" data-toggle="tab">Upload Logo</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                    <div class="active tab-pane" id="info">
                        @if (auth()->user()->status && $data->cekLogo && $data->cekFoto == 1 )
                            <center> Tidak Ada Pemberitahuan Terbaru</center>
                        @else
                            @if ($data->cekFoto == 2)
                                <div class="alert alert-warning" role="alert">
                                    File Foto Profil Anda Mengalami Masalah, Silahkan Upload Ulang Foto Anda!
                                </div>
                            @endif

                            @if ($data->cekLogo == 2)
                                <div class="alert alert-warning" role="alert">
                                    File Logo Toko Anda Mengalami Masalah, Silahkan Upload Ulang Logo Anda!
                                </div>
                            @endif

                            @if (auth()->user()->status == 2)
                                <div class="alert alert-warning" role="alert">
                                    Proses Verivikasi Sedang Berlangsung, Proses Ini Membutuhkan Waktu Beberapa Hari Mohon Bersabar.
                                </div>
                            @endif

                            @if (auth()->user()->status == 3)
                                <div class="alert alert-danger" role="alert">
                                    Toko & Akun Anda Belum Aktif, Silahkan Lengkapi Data yang Kurang dari Akun dan Toko Anda.
                                </div>
                            @endif
                            @if ($data->cekFoto == 0)
                                <div class="alert alert-danger" role="alert">
                                    Foto Profil Anda Masih Kosong, Silahkan Tambahkan Foto !
                                </div>
                            @endif

                            @if ($data->cekLogo == 0)
                                <div class="alert alert-danger" role="alert">
                                    Logo Toko Anda Masih Kosong, Silahkan Tambahkan Logo !
                                </div>
                            @endif
                        @endif
                    </div>
                    <div class="tab-pane" id="activity">
                        <div class="row">
                            <div class="col-md-12 mb-1 mt-2">
                                <center>
                                    <img class="profile-user-img img-fluid img-circle"
                                     src="{{ asset($data->foto)}}"
                                     alt="Foto Profil">
                                </center>
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-12">
                                        <label for="" class="col-form-label">Nama Lengkap</label>
                                        <p class="description pl-2">{{ $data->name }}</p>
                                    </div>
                                    <div class="col-md-12">
                                        <label for="" class="col-form-label">NIM</label>
                                        <p class="description pl-2">{{ $data->penjual->nim }}</p>
                                    </div>
                                    <div class="col-md-12">
                                        <label for="" class="col-form-label">Email</label>
                                        <p class="description pl-2">{{ $data->email }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-12">
                                        <label for="" class="col-form-label">Nomor Whatsapp</label>
                                        <p class="description pl-2">{{ $data->wa }}</p>
                                    </div>
                                    <div class="col-md-12">
                                        <label for="" class="col-form-label">Alamat</label>
                                        <p class="description pl-2">{{ $data->alamat }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                  <!-- /.tab-pane -->
                  {{-- <div class="tab-pane" id="timeline">
                    <!-- The timeline -->
                    <div class="timeline timeline-inverse">
                      <!-- timeline time label -->
                      <div class="time-label">
                        <span class="bg-danger">
                          10 Feb. 2014
                        </span>
                      </div>
                      <!-- /.timeline-label -->
                      <!-- timeline item -->
                      <div>
                        <i class="fas fa-envelope bg-primary"></i>

                        <div class="timeline-item">
                          <span class="time"><i class="far fa-clock"></i> 12:05</span>

                          <h3 class="timeline-header"><a href="#">Support Team</a> sent you an email</h3>

                          <div class="timeline-body">
                            Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles,
                            weebly ning heekya handango imeem plugg dopplr jibjab, movity
                            jajah plickers sifteo edmodo ifttt zimbra. Babblely odeo kaboodle
                            quora plaxo ideeli hulu weebly balihoo...
                          </div>
                          <div class="timeline-footer">
                            <a href="#" class="btn btn-primary btn-sm">Read more</a>
                            <a href="#" class="btn btn-danger btn-sm">Delete</a>
                          </div>
                        </div>
                      </div>
                      <!-- END timeline item -->
                      <!-- timeline item -->
                      <div>
                        <i class="fas fa-user bg-info"></i>

                        <div class="timeline-item">
                          <span class="time"><i class="far fa-clock"></i> 5 mins ago</span>

                          <h3 class="timeline-header border-0"><a href="#">Sarah Young</a> accepted your friend request
                          </h3>
                        </div>
                      </div>
                      <!-- END timeline item -->
                      <!-- timeline item -->
                      <div>
                        <i class="fas fa-comments bg-warning"></i>

                        <div class="timeline-item">
                          <span class="time"><i class="far fa-clock"></i> 27 mins ago</span>

                          <h3 class="timeline-header"><a href="#">Jay White</a> commented on your post</h3>

                          <div class="timeline-body">
                            Take me to your leader!
                            Switzerland is small and neutral!
                            We are more like Germany, ambitious and misunderstood!
                          </div>
                          <div class="timeline-footer">
                            <a href="#" class="btn btn-warning btn-flat btn-sm">View comment</a>
                          </div>
                        </div>
                      </div>
                      <!-- END timeline item -->
                      <!-- timeline time label -->
                      <div class="time-label">
                        <span class="bg-success">
                          3 Jan. 2014
                        </span>
                      </div>
                      <!-- /.timeline-label -->
                      <!-- timeline item -->
                      <div>
                        <i class="fas fa-camera bg-purple"></i>

                        <div class="timeline-item">
                          <span class="time"><i class="far fa-clock"></i> 2 days ago</span>

                          <h3 class="timeline-header"><a href="#">Mina Lee</a> uploaded new photos</h3>

                          <div class="timeline-body">
                            <img src="https://placehold.it/150x100" alt="...">
                            <img src="https://placehold.it/150x100" alt="...">
                            <img src="https://placehold.it/150x100" alt="...">
                            <img src="https://placehold.it/150x100" alt="...">
                          </div>
                        </div>
                      </div>
                      <!-- END timeline item -->
                      <div>
                        <i class="far fa-clock bg-gray"></i>
                      </div>
                    </div>
                  </div> --}}
                  <!-- /.tab-pane -->

                  <div class="tab-pane" id="settings">
                    <form class="form-horizontal" method="post" action="/akun/profil/ubahProfil">
                      @csrf
                        <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">Nama Lengkap</label>
                        <div class="col-sm-10">
                            <input type="text" name="name" class="form-control  {{ $errors->has('name') ? 'is-invalid': '' }}" value="{{ old('name') }}" id="inputName" placeholder="Nama Lengkap">
                            @if ($errors->has('name'))
                                <p class="pl-2">
                                    <code>
                                        {{ $errors->first('name') }}
                                    </code>
                                </p>
                            @endif
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="nim" class="col-sm-2 col-form-label">NIM</label>
                        <div class="col-sm-10">
                            <input type="number" name="nim" class="form-control {{ $errors->has('nim') ? 'is-invalid': '' }}" value="{{ old('nim') }}" id="nim" placeholder="NIM">
                            @if ($errors->has('nim'))
                                <p class="pl-2">
                                    <code>
                                        {{ $errors->first('nim') }}
                                    </code>
                                </p>
                            @endif
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                            <input type="email" name="email" class="form-control {{ $errors->has('email') ? 'is-invalid': '' }}" id="inputEmail" value="{{ old('email') }}" placeholder="Email">
                            @if ($errors->has('email'))
                                <p class="pl-2">
                                    <code>
                                        {{ $errors->first('email') }}
                                    </code>
                                </p>
                            @endif
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="wa" class="col-sm-2 col-form-label">Nomor WA</label>
                        <div class="col-sm-10">
                            <input type="number" name="wa" class="form-control {{ $errors->has('wa') ? 'is-invalid': '' }}" id="wa" value="{{ old('wa') }}" placeholder="Nomor Whatsapp Aktif (ex: 089223445556)">
                            @if ($errors->has('wa'))
                                <p class="pl-2">
                                    <code>
                                        {{ $errors->first('wa') }}
                                    </code>
                                </p>
                            @endif
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                        <div class="col-sm-10">
                            <textarea class="form-control {{ $errors->has('alamat') ? 'is-invalid': '' }}" id="alamat" name="alamat" placeholder="Alamat Tempat Tinggal Saat Ini">{{ old('alamat') }}</textarea>
                            @if ($errors->has('alamat'))
                                <p class="pl-2">
                                    <code>
                                        {{ $errors->first('alamat') }}
                                    </code>
                                </p>
                            @endif
                        </div>
                      </div>
                      <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                          <button type="submit" class="btn btn-danger">Simpan</button>
                        </div>
                      </div>
                    </form>
                  </div>
                  <div class="tab-pane" id="foto">
                    <form action="/akun/upload/foto" method="post" class="form-horizontal" id="my-great-dropzone">
                        @csrf
                        <div class="form-group row">
                            <label for="">Foto</label>
                            <div class="col-sm-12">
                                <div class="custom-file">
                                    <input type="file" name="foto" class="custom-file-input" id="customFile">
                                    <label for="customFile" class="custom-file-label">Pilih Foto Profil Anda !</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="pd-4 col-sm-12">
                            <button type="submit" class="btn btn-danger">Upload</button>
                            </div>
                        </div>
                    </form>
                  </div>

                  <div class="tab-pane" id="logo">
                    <form action="/akun/upload/logo" method="post" class="form-horizontal" id="my-great-dropzone">
                        @csrf
                        <div class="form-group row">
                            <label for="">Logo</label>
                            <div class="col-sm-12">
                                <div class="custom-file">
                                    <input type="file" name="logo" class="custom-file-input" id="customFile">
                                    <label for="customFile" class="custom-file-label">Pilih Logo dari Toko Anda !</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="pd-4 col-sm-12">
                            <button type="submit" class="btn btn-danger">Upload</button>
                            </div>
                        </div>
                    </form>
                  </div>
                  <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>

@endsection
