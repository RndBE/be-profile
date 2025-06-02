@extends('User.layouts.app')
@section('title', 'Galeri Proyek | Beacon Engineering')
@section('description', 'Lihat berbagai dokumentasi proyek unggulan Beacon Engineering yang menunjukkan penerapan teknologi telemetri di berbagai sektor industri.')
@section('image', asset('asset/img/project/bg.png'))
@section('content')
        <!-- breadcrumb-area -->
        <section class="breadcrumb__area breadcrumb__bg" data-background="{{ asset('asset/img/project/bg.png') }}">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="breadcrumb__content">
                            <h2 class="title">Galeri Proyek</h2>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/">Beranda</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Galeri Proyek</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- breadcrumb-area-end -->
        <!-- blog-area -->
        <section class="blog__area">
            <div class="container">
                @livewire('galeri-projek')
            </div>
        </section>

        <!-- blog-area-end -->
@endsection
