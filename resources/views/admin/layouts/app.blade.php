<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="{{ asset('img/title.ico') }}">
    <title>@yield('title', 'Dashboard | BE PROFILE')</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="/plugins/fontawesome-free/css/all.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="/dist/css/adminlte.min.css">
    <!-- summernote -->
    <link rel="stylesheet" href="/plugins/summernote/summernote-bs4.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    </head>
    <body class="hold-transition sidebar-mini layout-fixed">
        <!-- Site wrapper -->
        <div class="wrapper">
            <!-- Navbar -->
            <nav class="main-header navbar navbar-expand navbar-white navbar-light">
                <!-- Left navbar links -->
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                    </li>
                </ul>
                <!-- Right navbar links -->
                <ul class="navbar-nav ml-auto">
                    <!-- Navbar Search -->
                    <li class="nav-item">
                        <a class="nav-link" href="/admin/logout">
                        <i class="fas fa-sign-out-alt"></i>
                        </a>
                    </li>
                </ul>
            </nav>
            <!-- /.navbar -->
            <aside class="main-sidebar sidebar-dark-primary elevation-4">
                <a href="" class="brand-link d-flex align-items-center" style="text-decoration: none;">
                    <img src="{{ asset('img/title.ico') }}" alt="Beacon Engineering Logo" class="brand-image" style="width: 40px; height: 40px; margin-right: 10px;">
                    <span class="brand-text font-weight-light">Beacon Engineering</span>
                </a>

                <div class="sidebar">
                    <!-- Sidebar Menu -->
                    <nav class="mt-2">
                        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
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
                        <a href="/admin/beranda" class="nav-link {{ Request::is('admin/beranda*') ?'active' : '' }}">
                            <i class="nav-icon fas fa-envelope"></i>
                            <p>
                            Beranda
                                <span class="right badge badge-danger">New</span>
                            </p>
                        </a>
                        </li>

                    </nav>
                    <!-- /.sidebar-menu -->
                </div>
                <!-- /.sidebar -->
            </aside>
            @include('sweetalert::alert')
            <div class="content-wrapper">
                <!-- Main content -->
                <section class="content">
                    <div class="container-fluid pt-2">
                        @yield('content')
                    </div>
                </section>
            </div>
            <footer class="main-footer p-11">
                <div class="float-right d-none d-sm-block navbar-fixed-bottom">
                </div>
                <strong>Copyright &copy; 2010-<span id="current-year"></span> <a style="text-decoration: none;" href="/dashboard">Beacon Engineering</a>.</strong> All rights reserved.
            </footer>
            <aside class="control-sidebar control-sidebar-dark">
            </aside>
        </div>

        <!-- jQuery -->
        <script src="/plugins/jquery/jquery.min.js"></script>
        <!-- Bootstrap 4 -->
        <script src="/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
        <!-- overlayScrollbars -->
        <script src="/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
        <!-- AdminLTE App -->
        <script src="/dist/js/adminlte.min.js"></script>
        {{-- summernote --}}
        <script src="/plugins/summernote/summernote-bs4.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

        <script>
            document.getElementById('current-year').textContent = new Date().getFullYear();
        </script>
        <script>
            $(function () {
                // Summernote
                $('#summernote').summernote()
                // CodeMirror
                CodeMirror.fromTextArea(document.getElementById("codeMirrorDemo"), {
                mode: "htmlmixed",
                theme: "monokai"
                });
            })
        </script>
    </body>
</html>
