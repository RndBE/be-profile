<!DOCTYPE html>
<html lang="en">
<head>
    @include('adminlte.layouts.head')
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
        </ul>

        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <div class="navbar-search-block">

                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link" data-toggle="dropdown" href="#">
                    <i class="far fa-bell"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                    <div class="dropdown-divider"></div>
                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="nav-link">Logout</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                <i class="fas fa-expand-arrows-alt"></i>
                </a>
            </li>
        </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="{{ route('dashboard.index') }}" style="text-decoration: none;" class="brand-link">
            <img src="{{ asset('assets/dist/img/title.ico') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
            <span class="brand-text font-weight-light">{{ $title ?? "Beacon Engineering" }}</span>
        </a>
        <!-- Sidebar -->
        <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
            <img src="{{ asset('assets/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
            <a style="text-decoration: none;" href="#" class="d-block">{{ auth()->user()->name }}</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
                with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="/admin/dashboard" class="nav-link {{ Request::is('admin/dashboard*') ?'active' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt "></i>
                        <p>
                        Dashboard
                            {{-- <span class="right badge badge-danger">New</span> --}}
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="/admin/carousel" class="nav-link {{ Request::is('admin/carousel*') ?'active' : '' }}">
                        <i class="nav-icon fas fa-image"></i>
                        <p>
                        Carousel
                            {{-- <span class="right badge badge-danger">New</span> --}}
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="/admin/klien" class="nav-link {{ Request::is('admin/klien*') ?'active' : '' }}">
                        <i class="nav-icon fas fa-address-card"></i>
                        <p>
                        Klien
                            {{-- <span class="right badge badge-danger">New</span> --}}
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="/admin/tag" class="nav-link {{ Request::is('admin/tag*') ?'active' : '' }}">
                        <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-hash"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M5 9l14 0" /><path d="M5 15l14 0" /><path d="M11 4l-4 16" /><path d="M17 4l-4 16" /></svg>
                        <p>
                        Tag
                            {{-- <span class="right badge badge-danger">New</span> --}}
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="/admin/kategori_projek" class="nav-link {{ Request::is('admin/kategori_projek*') ?'active' : '' }}">
                        <i class="nav-icon fas fa-tags"></i>
                        <p>
                        Kategori Projek
                            {{-- <span class="right badge badge-danger">New</span> --}}
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="/admin/projek" class="nav-link {{ Request::is('admin/projek*') ?'active' : '' }}">
                        <i class="nav-icon fas fa-helmet-safety"></i>
                        <p>
                        Projek
                            {{-- <span class="right badge badge-danger">New</span> --}}
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="/admin/testimoni" class="nav-link {{ Request::is('admin/testimoni*') ?'active' : '' }}">
                        <i class="nav-icon fas fa-thumbs-up"></i>
                        <p>
                        Testimoni
                            {{-- <span class="right badge badge-danger">New</span> --}}
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-comment"></i>
                        <p>
                            Solusi
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/admin/solutions" class="nav-link {{ Request::is('admin/solutions*') ?'active' : '' }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Solusi</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/admin/sub-solutions" class="nav-link {{ Request::is('admin/sub-solutions*') ?'active' : '' }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Sub Solusi</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/admin/fitur-sub-solutions" class="nav-link {{ Request::is('admin/fitur-sub-solutions*') ?'active' : '' }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Fitur Sub Solusi</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="currentColor"  class="icon icon-tabler icons-tabler-filled icon-tabler-square-rounded-letter-p"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M11.676 2.001l.324 -.001c7.752 0 10 2.248 10 10l-.005 .642c-.126 7.235 -2.461 9.358 -9.995 9.358l-.642 -.005c-7.13 -.125 -9.295 -2.395 -9.358 -9.67v-.325c0 -7.643 2.185 -9.936 9.676 -9.999m.324 4.999h-2a1 1 0 0 0 -1 1v8a1 1 0 0 0 1 1l.117 -.007a1 1 0 0 0 .883 -.993v-3h1a3 3 0 0 0 0 -6m0 2a1 1 0 0 1 0 2h-1v-2z" /></svg>
                        <p>
                            Produk
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/admin/produk" class="nav-link {{ Request::is('admin/produk*') ?'active' : '' }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Tambah Produk</p>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/admin/solusi-produk" class="nav-link {{ Request::is('admin/solusi-produk*') ?'active' : '' }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Solusi Pemasangan</p>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/admin/komponen" class="nav-link {{ Request::is('admin/komponen*') ?'active' : '' }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Komponen</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-certificate"></i>
                        <p>
                            Tentang Kami
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/admin/tentang-kami" class="nav-link {{ Request::is('admin/tentang-kami*') ?'active' : '' }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Tentang Beacon</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/admin/sertifikasi" class="nav-link {{ Request::is('admin/sertifikasi*') ?'active' : '' }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Sertifikasi</p>
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

    @yield('content')


    </body>
</html>
