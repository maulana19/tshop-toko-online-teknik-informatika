@extends('admin.part.appLogin')
@section('content')

<div class="login-box">
    <div class="login-logo">
        <div>
            <a href="https://tif.unisnu.ac.id" target="_blank">
                <img src="{{ asset('admin/image/logo/tiflogo.PNG')}}" alt="Trendy Pants and Shoes"
                class="w-50"/>
            </a>
        </div>
        <a href="#" style="font-size: 20px"><b>TSHOP</b>-Teknik Informatika Shop</a>
    </div>
    <!-- /.login-logo -->
    <section class=" text-center text-lg-start">

        <div class="card mb-3">
            <div class="row g-0 d-flex align-items-center">
                <div class="col-lg-12">
                    <div class="card-body pb-5 px-md-3">
                    <h5 class="pb-3">
                        <b>Halaman Login</b>
                    </h5>
                        <form action="/signin" method="post">
                            @csrf
                            <div class="input-group mb-3">
                                <input type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Username" name="name">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fa fa-user"></span>
                                    </div>
                                </div>
                            </div>

                            <div class="input-group mb-3">
                                <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Password">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-lock"></span>
                                    </div>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary btn-block mb-4">Masuk</button>
                            <div class="row mb-4">
                                <div class="col d-flex justify-content-left">
                                    <a href="/register">Buat Akun Baru</a>
                                </div>
                            </div>

                            <h5>
                                @if($errors->any())
                                <b>Error:</b>
                                @foreach ($errors->all() as $error)
                                    <div class="alert alert-danger fade show" role="alert">
                                        <center>{{ $error }}</center>
                                    </div>
                                @endforeach
                            @endif
                            </h5>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
