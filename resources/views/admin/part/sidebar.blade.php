
<div class="wrapper">
    <!-- Preloader -->
    <div class="preloader flex-column justify-content-center align-items-center">
        <img class="animation__shake" src="{{ asset('admin/image/logo/tiflogo.PNG')}}" alt="OK bRO" height="300" width="300">
    </div>
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </ul>

        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">
            <!-- Navbar Search -->
            <li class="nav-item">
            <a class="nav-link" data-widget="navbar-search" href="#" role="button">
                <i class="fas fa-search"></i>
            </a>
            <div class="navbar-search-block">
                <form class="form-inline">
                <div class="input-group input-group-sm">
                    <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                    <div class="input-group-append">
                    <button class="btn btn-navbar" type="submit">
                        <i class="fas fa-search"></i>
                    </button>
                    <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                        <i class="fas fa-times"></i>
                    </button>
                    </div>
                </div>
                </form>
            </div>
            </li>

      </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="index3.html" class="brand-link">
            {{-- <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8"> --}}
            <span class="brand-text font-weight-light">Admin Page</span>
        </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->

        <!-- SidebarSearch Form -->
        {{-- <div class="form-inline">
          <div class="input-group" data-widget="sidebar-search">
            <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
            <div class="input-group-append">
              <button class="btn btn-sidebar">
                <i class="fas fa-search fa-fw"></i>
              </button>
            </div>
          </div>
        </div> --}}

        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
                 with font-awesome or any other icon font library -->
            <li class="nav-item">
              <a href="/transaksi" class="nav-link">
                <i class="nav-icon fas fa-th-list"></i>
                <p>
                  Transaksi
                  {{-- <span class="right badge badge-danger">New</span> --}}
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="/karya-list" class="nav-link {{ Request::is('karya-list') || Request::is('karya-tambah') || Request::is('karya-edit') ? 'active' : ''}}">
                <i class="nav-icon fa fa-folder"></i>
                <p>
                  Karya
                  {{-- <span class="right badge badge-danger">New</span> --}}
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="/akun/daftar-akun" class="nav-link {{ Request::is('akun/daftar-akun') || Request::is('akun/daftar-penjual') || Request::is('akun/daftar-pembeli') ? 'active' : ''}}">
                <i class="nav-icon fas fa-users"></i>
                <p>
                 Daftar Akun
                  {{-- <span class="right badge badge-danger">New</span> --}}
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-user"></i>
                <p>
                  Profil
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="/akun/profil" class="nav-link">
                    <i class="fa fa-address-card nav-icon"></i>
                    <p>Profil Detail</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="/akun/ubah-password" class="nav-link">
                    <i class="fa fa-key nav-icon"></i>
                    <p>Change Password</p>
                  </a>
                </li>
                <li class="nav-item">
                    <a href="/logout" class="nav-link">
                        <i class="fa fa-window-close nav-icon"></i>
                        <p>Logout</p>
                    </a>
                </li>
              </ul>
            </li>
          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>
