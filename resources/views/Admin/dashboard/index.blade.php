@extends('adminlte.layouts.app')
@section('title', 'Dashboard | BE Profile')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="app-content-header">
        <!--begin::Container-->
        <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
                <div class="col-sm-6"><h3 class="mb-0">Dashboard</h3></div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-end">
                    <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                    </ol>
                </div>
            </div>
            <!--end::Row-->
        </div>
        <!--end::Container-->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="app-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3">
                    <div class="info-box">
                    <span class="info-box-icon bg-info elevation-1"><i class="fas fa-cog"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Pesan</span>
                        <span class="info-box-number">
                        {{-- {{ $pesan }} --}}
                        <small>Pesan</small>
                        </span>
                    </div>
                    <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->

                </div>
                <div class="col-md-3">
                    <div class="info-box">
                    <span class="info-box-icon bg-info elevation-1"><i class="fas fa-file"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Blog</span>
                        <span class="info-box-number">
                        {{-- {{ $blog }} --}}
                        <small>Blog</small>
                        </span>
                    </div>
                    <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>

                <div class="col-md-3">
                    <div class="info-box">
                    <span class="info-box-icon bg-info elevation-1"><i class="fas fa-list"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Services</span>
                        <span class="info-box-number">
                        {{-- {{ $service }} --}}
                        <small>Services</small>
                        </span>
                    </div>
                    <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>

                <div class="col-md-3">
                    <div class="info-box">
                    <span class="info-box-icon bg-info elevation-1"><i class="fas fa-user"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">User</span>
                        <span class="info-box-number">
                        {{-- {{ $user }} --}}
                        <small>User</small>
                        </span>
                    </div>
                    <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
            <!-- /.col-md-6 -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
@endsection
