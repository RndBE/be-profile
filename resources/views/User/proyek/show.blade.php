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
                            <div class="project-artikel__details-inner-content">
                                {!! $projek->deskripsi1!!}
                            </div>
                            <div class="project__details-inner">
                                <div class="row">
                                    <div class="col-lg-6 order-0 order-lg-2">
                                        <div class="project__details-inner-img">
                                            <img src="{{ asset('storage/' . $projek->gambar_proyek) }}" alt="gambar proyek">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="project__details-inner-content" id="project-description">
                                            <span class="project-artikel__details-inner-content">{!! $projek->deskripsi2!!}</span>
                                            <p><a class="simple-button-plugin" href="{{ $projek->white_paper }}" style="" target="_blank">Download White Paper</a></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- project-details-area-end -->
    <!-- consulting-area-project -->
    <section class="consulting-area-project">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="consulting-inner-wrap-project shine-animate-item">
                        <div class="consulting-content-project">
                            <div class="content-right">
                                <h2 class="title">Bagaimana Pendapat Mitra Tentang Proyek Ini?</h2>
                            </div>
                        </div>
                        <div class="consulting-img-project">
                            <img src="{{ asset('asset/img/images/valveIKN.jpeg') }}" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- consulting-area-end -->
    <!-- testimonial-area -->
    <section class="testimonial-area-project">
        <div class="container">
            <div class="row" style="display: flex;align-items:flex-end">
                <div class="col-lg-6 order-0 order-lg-2">
                    <div class="testimonial-active-project swiper-container">
                        <div class="swiper-wrapper">
                            @foreach($testimonis as $testimoni)
                            <div class="swiper-slide">
                                <div class="testimonial-item-project">
                                    <div class="testimonial-info-project">
                                        <div class="icon">
                                            <img src="{{ asset('storage/' . $testimoni->projek->klien->logo ) }}" alt="Logo" class="user-image">
                                        </div>
                                        <div class="text-info">
                                            <h4 class="title">{{ $testimoni->nama_user }}</h4>
                                            <span class="sub-title">{{ $testimoni->jabatan }}</span>
                                        </div>
                                    </div>
                                    <div class="testimonial-content-project">
                                        <p>“{{ $testimoni->testimoni }}”</p>
                                        <div class="icon"><img src="{{ asset('asset/img/images/petik.png') }}" alt=""></div>
                                    </div>
                                    <div class="testimonial-content1-project">
                                        <div class="icon1">{{ $testimoni->projek->nama_projek }}</div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <div class="swiper-pagination"></div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-8 kolom-widya">
                    <div class="testimonial-img-wrap-project">
                        <div class="icon">
                            <img src="{{ asset('asset/img/images/widya2.png') }}" alt="">
                        </div>
                        <div class="img-shape">
                            <img src="{{ asset('asset/img/images/bgwidya2.png') }}" class="bgwidya" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- testimonial-area-end -->
    <script>
        // Wait for the document to fully load
        document.addEventListener("DOMContentLoaded", function() {
            // Get the description container
            const descriptionElement = document.getElementById('project-description');

            // Check if the description has any lists (either ordered or unordered)
            const lists = descriptionElement.querySelectorAll('ul, ol');

            // Loop through each list and replace list items
            lists.forEach(function(list) {
                const listItems = list.querySelectorAll('li');

                listItems.forEach(function(item) {
                    // Replace list items with the custom icon
                    item.innerHTML = '<i class="flaticon-arrow-button"></i>' + item.innerHTML;
                });
            });
        });
    </script>
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
    <script>
        // Inisialisasi Swiper
        document.addEventListener('DOMContentLoaded', () => {
            new Swiper('.testimonial-active-project', {
                slidesPerView: 1,
                spaceBetween: 20,
                loop: true,
                autoplay: {
                    delay: 50000,
                    disableOnInteraction: false,
                },
                pagination: {
                    el: '.swiper-pagination',
                    clickable: true,
                },
                breakpoints: {
                    640: { slidesPerView: 1 },
                    768: { slidesPerView: 1 },
                    1024: { slidesPerView: 1 },
                }
            });
        });
    </script>
@endsection
