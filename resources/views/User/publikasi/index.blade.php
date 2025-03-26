@extends('User.layouts.app')
@section('title', 'Publikasi | BE Profile')
@section('content')
        <!-- breadcrumb-area -->
        <section class="breadcrumb__area breadcrumb__bg" data-background="{{ asset('asset/img/project/bg.png') }}">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="breadcrumb__content">
                            <h2 class="title">Publikasi</h2>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/">Beranda</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Publikasi</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- breadcrumb-area-end -->
        <!-- blog-area -->
        <section class="services-area services-bg" data-background="{{ asset('asset/img/bg/bg5.png') }}">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-6 col-lg-8">
                        <div class="section-title text-center mb-40 tg-heading-subheading animation-style3">
                            <h2 class="title tg-element-title mb-3">Beacon Hari Ini</h2>
                            <span class="mb-5" style="font-size:20px;font-weight: 300;color:#2E2E4D">Tambah wawasan soal teknologi telemetri dan berkembang bersama Beacon Engineering mulai hari ini!</span>
                        </div>
                    </div>
                </div>
                <div class="services-item-wrap">
                    <div class="row justify-content-center">
                        <div class="publikasi__search">
                            <form action="#">
                                <input type="text" wire:model.live="search" placeholder="Cari artikel atau kata kunci soal IT dan Telemetri">
                                <button type="submit">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="none">
                                        <path d="M19.0002 19.0002L14.6572 14.6572M14.6572 14.6572C15.4001 13.9143 15.9894 13.0324 16.3914 12.0618C16.7935 11.0911 17.0004 10.0508 17.0004 9.00021C17.0004 7.9496 16.7935 6.90929 16.3914 5.93866C15.9894 4.96803 15.4001 4.08609 14.6572 3.34321C13.9143 2.60032 13.0324 2.01103 12.0618 1.60898C11.0911 1.20693 10.0508 1 9.00021 1C7.9496 1 6.90929 1.20693 5.93866 1.60898C4.96803 2.01103 4.08609 2.60032 3.34321 3.34321C1.84288 4.84354 1 6.87842 1 9.00021C1 11.122 1.84288 13.1569 3.34321 14.6572C4.84354 16.1575 6.87842 17.0004 9.00021 17.0004C11.122 17.0004 13.1569 16.1575 14.6572 14.6572Z" stroke="currentcolor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="blog__area">
            <div class="container">
                @livewire('publikasi-index')
            </div>
        </section>
        <section class="artikel-publikasi-area">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 d-flex align-items-stretch">
                        <div class="section-title text-center mb-20 tg-heading-subheading animation-style3">
                            <h3 class="tg-element-title">Artikel Terbaru</h3>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-md-12 d-flex align-items-stretch">
                        <div class="project-item-wrap">
                            <div class="container custom-container-two">
                                <div class="swiper-container artikel-publikasi-slider">
                                    <div class="swiper-wrapper">
                                        <div class="swiper-slide">
                                            <div class="blog__post-two shine-animate-item w-100">
                                                <div class="blog__post-thumb-two">
                                                    <a href="blog-details.html" class="shine-animate">
                                                        <img src="asset/img/images/Rectangle 101 (1).png" alt="">
                                                    </a>
                                                </div>
                                                <div class="blog-artikel__post-content-two">
                                                    <div class="blog-artikel-post-meta">
                                                        <ul class="list-wrap">
                                                            <li><a href="blog.html" class="blog-artikel__post-tag-two">Beacon Update</a></li>
                                                            <li><img src="asset/img/icon/Calendar.png" alt="">Sabtu, 7 Februari 2025</li>
                                                        </ul>
                                                    </div>
                                                    <h2 class="title"><a href="blog-details.html">Gathering Beacon Engineering di Kopeng Treetop Magelang Tahun 2025</a></h2>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row justify-content-center">
                                    <div class="col-12 poster-artikel">
                                        <img src="asset/img/bg/breadcrumb_bg.jpg" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="services-area topik-bg">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 d-flex align-items-stretch">
                        <div class="section-title text-center mb-20 tg-heading-subheading animation-style3">
                            <h3 class="tg-element-title">Topik Khusus</h3>
                        </div>
                    </div>
                </div>
                <div class="services-item-wrap">
                    <div class="row justify-content-center">
                        @foreach($kategori_topiks as $kategori)
                            <div class="col-xl-4 col-md-4">
                                <a href="#" class="services-link">
                                    <div class="topik-artikel-item shine-animate-item">
                                        <div class="topik-thumb">
                                            <img src="{{ asset('storage/' . $kategori->thumbnail) }}" alt="{{ $kategori->nama }}">
                                        </div>
                                        <div class="services-topik-content">
                                            <div class="icon">
                                                <img src="{{ asset('storage/' . $kategori->icon) }}" alt="Icon {{ $kategori->nama }}">
                                            </div>
                                            <h4 class="title">{{ $kategori->nama }}</h4>
                                            <p>{{ $kategori->description }}</p>
                                            <span class="btn">Cari tahu sekarang</span>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>

        <script>
            // Inisialisasi Swiper
            document.addEventListener('DOMContentLoaded', () => {
                new Swiper('.artikel-publikasi-slider', {
                    slidesPerView: 3,
                    spaceBetween: 50,
                    loop: true,
                    autoplay: {
                        delay: 3000,
                        disableOnInteraction: false,
                    },
                    breakpoints: {
                        640: { slidesPerView: 1 },
                        768: { slidesPerView: 1 },
                        1024: { slidesPerView: 3 },
                    }
                });
            });
        </script>
@endsection
