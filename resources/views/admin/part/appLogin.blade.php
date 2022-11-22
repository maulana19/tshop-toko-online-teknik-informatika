<!DOCTYPE html>
<html lang="en">
    @include('admin.part.header')
<body class="hold-transition login-page">
    @yield('content')
</body>

</div>
<script src="{{ asset('admin/plugins/bs-stepper/js/bs-stepper.min.js') }}"></script>
<script src="{{ asset('admin/plugins/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('admin/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('admin/plugins/ekko-lightbox/ekko-lightbox.min.js') }}"></script>
<script src="{{ asset('admin/dist/js/adminlte.min.js') }}"></script>
<script src="{{ asset('admin/plugins/filterizr/jquery.filterizr.min.js') }}"></script>

</html>
