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
                    <div class="card-body pb-5 px-md-5">
                    <h5 class="pb-5">
                        <b>Register Akun Baru</b>
                    </h5>
                        <form>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="Username">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fa fa-user"></span>
                                    </div>
                                </div>
                            </div>

                            <div class="input-group mb-3">
                                <input type="email" class="form-control" placeholder="Email">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-envelope"></span>
                                    </div>
                                </div>
                            </div>

                            <div class="input-group mb-3">
                                <input type="password" class="form-control" placeholder="Password">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-lock"></span>
                                    </div>
                                </div>
                            </div>

                            <button type="button" class="btn btn-primary btn-block mb-4">Simpan Akun</button>
                            <div class="row mb-4">
                                <div class="col d-flex justify-content-left">
                                    <a href="/login">Login Akun </a>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
