@extends('User.layouts.app')
@section('title', 'Detail Proyek | BE Profile')
@section('content')
    <!-- breadcrumb-area -->
    <section class="breadcrumb__area breadcrumb__bg" data-background="{{ asset('asset/img/project/bg.png') }}">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="breadcrumb__content">
                        <h2 class="title">Detail Proyek</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/">Beranda</a></li>
                                <li class="breadcrumb-item"><a href="/proyek">Proyek</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Detail Proyek</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb-area-end -->
    <!-- project-details-area -->
    <section class="project__details-area">
        <div class="container">
            <div class="project__details-wrap">
                <div class="row">
                    <div class="col-12">
                        <div class="project__details-top">
                            <div class="row">
                                <div class="col-70">
                                    <div class="project__details-thumb swiper-container slider-project-banner">
                                        <div class="swiper-wrapper">
                                            @forelse($projek->gambar as $gambar)
                                                <div class="swiper-slide">
                                                    <img src="{{ asset('storage/' . $gambar->gambar) }}" alt="gambar">
                                                </div>
                                            @empty
                                                <div class="swiper-slide">
                                                    <img style="width: 100%;height: 600px;" src="{{ asset('asset/img/images/no-image1.png') }}" alt="default">
                                                </div>
                                            @endforelse
                                        </div>
                                        <div class="swiper-pagination swiper-pagination-project"></div>
                                    </div>
                                </div>
                                <div class="col-30">
                                    <div class="project__details-info">
                                        <h4 class="title">Detail Proyek</h4>
                                        <ul class="list-wrap">
                                            <ul class="horizontal-list">
                                                <li>Kategori</li>
                                                <li class="colon">:</li>
                                                <li class="value">{{ $projek->kategoriProjek->nama }}</li>
                                            </ul>
                                            <ul class="horizontal-list">
                                                <li>User</li>
                                                <li class="colon">:</li>
                                                <li class="value">{{ $projek->klien->nama_perusahaan }}</li>
                                            </ul>
                                            <ul class="horizontal-list">
                                                <li>Lokasi</li>
                                                <li class="colon">:</li>
                                                <li class="value">{{ $projek->lokasi }}</li>
                                            </ul>
                                            <ul class="horizontal-list">
                                                <li>Website</li>
                                                <li class="colon">:</li>
                                                <li class="value"><a href="{{ $projek->website }}" target="_blank" rel="noopener noreferrer">
                                                    {{ $projek->website }}
                                                </a></li>
                                            </ul>
                                            <ul class="horizontal-list">
                                                <li>Share</li>
                                                <li class="colon">:</li>
                                                <li>
                                                    <ul class="list-wrap project-social">
                                                        <li><a href="https://api.whatsapp.com/send?text={{ urlencode("Cari tahu $projek->nama_projek sekarang juga! \n\n". route('proyek.show', Str::slug($projek->nama_projek))) }}"><i class="fab fa-whatsapp"></i></a></li>
                                                        {{-- <li><a href="https://www.instagram.com/?url={{ urlencode(route('proyek.show', Str::slug($projek->nama_projek))) }}" target="_blank" rel="noopener noreferrer"><i class="fab fa-instagram"></i></a></li> --}}
                                                        <li><a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(route('proyek.show', Str::slug($projek->nama_projek))) }}&quote={{ urlencode('Cari tahu Proyek ' . $projek->nama_projek . ' sekarang juga!') }}"><i class="fab fa-facebook-f"></i></a></li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="project__details-content">
                            <h2 class="title">Company Values & The Relationship</h2>
                            <p>eed a little help from our friends from time to time. Although we offer the one-stop convenience of annery integrated range of legal, financial services under one roof, there are occasions when our clients areaneed specia- list advice beyond the scope of our own expertise.when an unknown printer took a galley of type and scrambled it to make a type specimen bookhas survived not only.</p>
                            <p>when an unknown printer took a galley of type and scrambled it to make a type specimen bookhas survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchan galley of type and scrambled it to make a type specimen book.when an unknown.</p>
                            <div class="project__details-inner">
                                <div class="row align-items-center">
                                    <div class="col-lg-6 order-0 order-lg-2">
                                        <div class="project__details-inner-img">
                                            <img src="{{ asset('asset/img/project/project_details02.jpg') }}" alt="">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="project__details-inner-content">
                                            <h2 class="title">Our Corporate Business Planning</h2>
                                            <p>when an unknown printer took a galley of type and scrambled it to make a type specimen bookhas survived not only five centuries.but also the leap into electronic typesetting, remaining.</p>
                                            <div class="content-inner">
                                                <div class="about__list-box">
                                                    <ul class="list-wrap">
                                                        <li><i class="flaticon-arrow-button"></i>Medicare Advantage Plans</li>
                                                        <li><i class="flaticon-arrow-button"></i>Analysis & Research</li>
                                                        <li><i class="flaticon-arrow-button"></i>100% Secure Money Back</li>
                                                        <li><i class="flaticon-arrow-button"></i>100% Money Growth</li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <p class="last-info">when an unknown printer took a galley of type and scrambled it to make specimen bookhas survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchan galley of type and scrambled specimen book.when an unknown.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- <div class="project__details-content">
                            {!! $projek->deskripsi!!}
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- project-details-area-end -->
    
    <script>
        // Inisialisasi Swiper
        document.addEventListener('DOMContentLoaded', () => {
            new Swiper('.slider-project-banner', {
                loop: true, // Loop untuk memutar gambar
                pagination: {
                    el: '.swiper-pagination-project',
                    clickable: true,
                },
                speed: 1000,
                autoplay: {
                    delay: 3000,
                },
                slidesPerView: 1,
                breakpoints: {
                    768: {
                        slidesPerView: 1,
                    },
                    1024: {
                        slidesPerView: 1,
                    }
                }
            });
        });
    </script>
@endsection
