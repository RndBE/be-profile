@extends('User.layouts.app')
{{-- @section('title', 'Testimoni | BE Profile') --}}
<style>
    .logo-box {
        width: 150px;
        height: 80px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .logo-klien {
        max-width: 100%;

        width: auto;
        height: auto;
        object-fit: contain;
    }
</style>
@section('content')
    <!-- banner-area -->
    <section class="w-100" id="home">
        <div class="swiper-container slider-homepage-banner">
                    <div class="swiper-wrapper">
                        @foreach ($carousels as $carousel)
                            <div class="swiper-slide">
                                <section class="banner-area banner-bg position-relative">
                                    <img src="{{ asset('storage/' . $carousel->gambar) }}"
                                        alt="{{ $carousel->judul ?? 'Banner Beacon Engineering' }}" fetchpriority="high"
                                        decoding="async" width="1920" height="1080"
                                        class="position-absolute top-0 start-0 w-100 h-100 object-fit-cover"
                                        style="z-index: -1;">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="banner-content">
                                                    <span class="sub-title" data-aos="fade-up" data-aos-delay="0">Selamat datang
                                                        di Beacon Engineering!</span>
                                                    <h2 class="title" data-aos="fade-up" data-aos-delay="200">
                                                        {!! $carousel->judul !!}
                                                    </h2>
                                                    <p class="sub_judul" data-aos="fade-up" data-aos-delay="400">
                                                        {{ $carousel->sub_judul }}
                                                    </p>
                                                    <a href="#services" class="btn" data-aos="fade-up"
                                                        data-aos-delay="600">Pelajari selengkapnya!</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                            </div>
                        @endforeach
                    </div>
                </div>
    </section>
    <!-- banner-area-end -->
    <!-- brand-area -->
    <div class="brand-area">
        <div class="container">
            <div class="swiper-container brand-active">
                <div class="swiper-wrapper">
                    @foreach ($kliens as $klien)
                        <div class="swiper-slide">
                            <div class="brand-item">
                                <img loading="lazy" class="swiper-lazy" src="{{ asset('storage/' . $klien->logo) }}"
                                    alt="{{ $klien->nama_perusahaan }}" width="80" height="80">
                                <div class="swiper-lazy-preloader"></div>
                            </div>
                            <div>
                                <p>{{ $klien->nama_perusahaan }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <!-- brand-area -->
    <!-- services-area -->
    <section id="services" class="services-area services-bg" data-background="{{ asset('asset/img/bg/bg1.png') }}">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-6 col-lg-8">
                    <div class="section-title text-center mb-40 tg-heading-subheading animation-style3">
                        <span class="sub-title">APA YANG KAMI LAKUKAN?</span>
                        <h2 class="title tg-element-title">Berkontribusi pada negeri dengan solusi analisis data yang <span
                                class="highlight-red">presisi</span>.</h2>
                    </div>
                </div>
            </div>
            <div class="services-item-wrap">
                @foreach($solutionss->chunk(3) as $chunk)
                    <div class="row justify-content-center">
                        @foreach($chunk as $solution)
                            <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                                <a href="{{ route('solusi.show', Str::slug($solution->nama)) }}" class="services-link">
                                    <div class="services-item equal-box shine-animate-item">
                                        <div class="services-thumb">
                                            <img loading="lazy" src="{{ asset('storage/' . $solution->thumbnail) }}"
                                                alt="{{ $solution->nama }}" width="400" height="260" style="object-fit: cover; height: 260px; width: 100%;">
                                        </div>
                                        <div class="services-content">
                                            <div class="icon">
                                                <img loading="lazy" src="{{ asset('storage/' . $solution->icon) }}"
                                                    alt="{{ $solution->nama }} icon" width="60" height="60">
                                            </div>
                                            <h3 class="title">{{ $solution->nama }}</h3>
                                            <p>{{ $solution->description }}</p>
                                            <span class="btn" style="color: #2e2e4d">Pelajari</span>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- services-area-end -->
    <!-- about-area -->
    <section id="about" class="about-area pt-120 pb-120">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-8">
                    <div class="topology-diagram">
                        <div class="cloud-section">
                            <div class="devices left">
                                <div class="arrow-up"></div>
                                <ul>
                                    <li>
                                        <a href="https://be-jogja.com/solusi/water-security/automatic-water-level-recorder">
                                            AUTOMATIC WATER LEVEL RECORDER <strong>(AWLR)</strong>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="https://be-jogja.com/solusi/weather-forecast/automatic-weather-recorder">
                                            AUTOMATIC WEATHER RECORDER <strong>(AWR)</strong>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="https://be-jogja.com/solusi/weather-forecast/automatic-rain-recorder">
                                            AUTOMATIC RAIN RECORDER <strong>(ARR)</strong>
                                        </a>
                                    </li>
                                    <li>
                                        <a
                                            href="https://be-jogja.com/solusi/pressure-measurement/automatic-pressure-level-recorder">
                                            AUTOMATIC PRESSURE LEVEL RECORDER <strong>(APLR)</strong>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="https://be-jogja.com/solusi/water-security/automatic-deformation-recorder">
                                            AUTOMATIC DEFORMATION RECORDER <strong>(ADR)</strong>
                                        </a>
                                    </li>
                                </ul>
                            </div>

                            <div class="cloud">
                                <img loading="lazy" src="{{ asset('asset/img/images/cloud.png') }}" alt="Cloud" width="200"
                                    height="120">
                                <img loading="lazy" src="{{ asset('asset/img/images/sistem monitoring.png') }}"
                                    alt="Sistem Monitoring" width="180" height="100">
                            </div>

                            <div class="devices right">
                                <div class="arrow-up"></div>
                                <ul>
                                    <li>
                                        <a
                                            href="https://be-jogja.com/solusi/water-security/automatic-water-gate-controller">
                                            AUTOMATIC WATER GATE CONTROLLER <strong>(AWGC)</strong>
                                        </a>
                                    </li>
                                    <li>
                                        <a
                                            href="https://be-jogja.com/solusi/water-security/automatic-water-quality-recorder">
                                            AUTOMATIC WATER QUALITY RECORDER <strong>(AWQR)</strong>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="https://be-jogja.com/solusi/water-security/automatic-flow-meter-recorder">
                                            AUTOMATIC FLOW METER RECORDER <strong>(AFMR)</strong>
                                        </a>
                                    </li>
                                    <li>
                                        <a
                                            href="https://be-jogja.com/solusi/water-security/automatic-vibrating-wire-recorder">
                                            AUTOMATIC VIBRATING WIRE RECORDER <strong>(AVWR)</strong>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="https://be-jogja.com/solusi/early-warning/early-warning-system">
                                            EARLY WARNING SYSTEM <strong>(EWS)</strong>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <div class="monitoring">
                            <img loading="lazy" src="{{ asset('asset/img/images/App.png') }}" alt="App" width="600"
                                height="350">
                            <p class="desc">
                                Seluruh sistem monitoring dan kontrol perangkat telemetri <strong>BEACON
                                    ENGINEERING</strong>
                                telah dirancang untuk beroperasi secara optimal di berbagai platform, termasuk
                                <strong>Windows, macOS, iOS,</strong> dan <strong>Android</strong>, memastikan aksesibilitas
                                dan kemudahan
                                penggunaan bagi pengguna di berbagai perangkat.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="about-content">
                        <div class="section-title mb-35 tg-heading-subheading animation-style3">
                            <span class="sub-title">MENGAPA BEACON ENGINEERING?</span>
                            <h2 class="title tg-element-title">Memimpin dalam akurasi, monitoring dan observasi hanya lewat
                                ujung jari.</h2>
                        </div>
                        <p>Semua perangkat telemetri Beacon Engineering terintegrasi dengan aplikasi STESY Smart Telemetry
                            System. Monitoring lebih mudah, tepat, dan cepat.</p>
                        <div class="about-bottom">
                            <a href="https://www.youtube.com/watch?v=qD1ePHATQ4o" target="__blank" class="btn btn-two">Lihat
                                STESY</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- about-area-end -->
    <!-- choose-area -->
    <section class="choose-area">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-4 order-0 order-lg-2">
                    <div class="choose-img-wrap">
                        <img loading="lazy" src="{{ asset('asset/img/images/Foto-Harapan.webp') }}"
                            alt="Simulasi penggunaan alat telemetri" width="400" height="500">
                        <img loading="lazy" src="{{ asset('asset/img/images/Group-34.webp') }}" class="shadow-image"
                            alt="Perusahaan telemetri berpengalaman" width="200" height="150" data-parallax='{"x" : 50 }'>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="choose-content">
                        <div class="section-title white-title mb-30 tg-heading-subheading animation-style3">
                            <span class="sub-title">APA YANG INGIN DIHADIRKAN?</span>
                            <h2 class="title tg-element-title">Bukan hanya tentang perangkat, namun juga harapan dan manfaat
                                berkelanjutan.</h2>
                        </div>
                        <p>Berdampingan dengan perangkat telemetri yang mumpuni, Beacon Engineering juga menghadirkan
                            berbagai layanan unggulan.</p>
                        <div class="choose-list swiper-container">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <div class="icon">
                                        <img loading="lazy" src="{{ asset('asset/img/icon/AI.webp') }}"
                                            alt="Telemetri Berbasis AI" width="60" height="60">
                                    </div>
                                    <div class="content">
                                        <h3 class="title">Telemetri Berbasis AI</h3>
                                        <p>Mengumpulkan data lebih cepat dan akurat, serta analisa dan komparasi data hasil
                                            pengukuran.</p>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="icon">
                                        <img loading="lazy" src="{{ asset('asset/img/icon/GARANSI.webp') }}"
                                            alt="Garansi Maintenance" width="60" height="60">
                                    </div>
                                    <div class="content">
                                        <h3 class="title">Garansi Maintenance</h3>
                                        <p>Garansi pengecekan teknis, pemeriksaan visual dan kebersihan, penggantian suku
                                            cadang, kalibrasi, serta uji fungsional.</p>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="icon">
                                        <img loading="lazy" src="{{ asset('asset/img/icon/MONITORING.webp') }}"
                                            alt="Monitoring Terintegrasi" width="60" height="60">
                                    </div>
                                    <div class="content">
                                        <h3 class="title">Monitoring Terintegrasi</h3>
                                        <p>Akses mudah dengan aplikasi STESY (Smart Telemetry System) yang hemat waktu dan
                                            efisien.</p>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="icon">
                                        <img loading="lazy" src="{{ asset('asset/img/icon/LAYANAN.webp') }}"
                                            alt="Layanan Konsultasi" width="60" height="60">
                                    </div>
                                    <div class="content">
                                        <h3 class="title">Layanan Konsultasi</h3>
                                        <p>Mengumpulkan data lebih cepat dan akurat, serta analisa dan komparasi data hasil
                                            pengukuran.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-pagination swiper-pagination-choose"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="choose-shape-wrap">
            <img loading="lazy" src="{{ asset('asset/img/images/blog_shape031.webp') }}" alt="" width="200" height="200"
                data-aos="fade-left" data-aos-delay="400">
        </div>
    </section>
    <!-- choose-area-end -->
    <!-- project-area -->
    <section class="project-area">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-6 col-lg-7">
                    <div class="section-title text-center mb-50 tg-heading-subheading animation-style3">
                        <h2 class="title tg-element-title">Temukan <span class="highlight-red">Beacon</span> Engineering
                            di Berbagai Proyek Pembangunan Indonesia</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="project-item-wrap">
            <div class="container custom-container-two">
                <div class="swiper-container project-slider">
                    <div class="swiper-wrapper">
                        @foreach($projeks as $projek)
                            <div class="swiper-slide">
                                <div class="project-item">
                                    <div class="project-thumb">
                                        <a href="{{ route('proyek.show', $projek->slug) }}">
                                            <img loading="lazy" class="swiper-lazy"
                                                src="{{ asset('storage/' . $projek->thumbnail) }}"
                                                alt="{{ $projek->nama_projek }}" width="600" height="400" style="object-fit: cover; height: 400px; width: 100%;">
                                            <div class="swiper-lazy-preloader"></div> <!-- spinner loading -->
                                        </a>
                                    </div>
                                    <div class="project-content">
                                        <div class="left-side-content">
                                            <h3 class="title">
                                                <a href="{{ route('proyek.show', $projek->slug) }}"
                                                    aria-label="Lihat detail proyek {{ $projek->slug }}">{{ $projek->nama_projek }}</a>
                                            </h3>
                                            <span>Tahun {{ $projek->waktu }}</span>
                                        </div>
                                        <div class="link-arrow">
                                            <a href="{{ route('proyek.show', $projek->slug) }}"
                                                aria-label="Lihat detail proyek {{ $projek->slug }}">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 18 15" fill="none"
                                                    width="18" height="15">
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                        d="M17.6293 3.27957C17.7117 2.80341 17.4427 2.34763 17.0096 2.17812C16.9477 2.15385 16.8824 2.13552 16.8144 2.12376L6.96081 0.419152C6.41654 0.325049 5.89911 0.689856 5.80491 1.23411C5.71079 1.77829 6.07564 2.29578 6.61982 2.38993L14.0946 3.68295L1.36574 12.6573C0.914365 12.9756 0.806424 13.5995 1.12467 14.0509C1.44292 14.5022 2.06682 14.6102 2.51819 14.2919L15.247 5.31753L13.954 12.7923C13.8598 13.3365 14.2247 13.854 14.7689 13.9482C15.3131 14.0422 15.8305 13.6774 15.9248 13.1332L17.6293 3.27957Z"
                                                        fill="currentcolor" />
                                                </svg>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-12">
                        <div class="project-content-bottom">
                            <p style="color: #2e2e4d;">Cari tahu sejauh mana Beacon Engineering<br> berkontribusi di
                                Indonesia!</p>
                            <a href="/proyek" class="btn btn-two">Lihat semua proyek</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- project-area-end -->

    <!-- consulting-area -->
    <section class="consulting-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="consulting-inner-wrap shine-animate-item">
                        <div class="consulting-content">
                            <div class="content-left">
                                <h3 class="title">300+</h3>
                                <span>Proyek <br> di Indonesia</span>
                            </div>
                            <div class="content-right">
                                <h3 class="title">Pendapat Mitra</h3>
                                <p>Cari tahu pengalaman berkembang bersama Beacon Engineering melalui pendapat mitra kami!
                                </p>
                            </div>
                        </div>
                        <div class="consulting-img shine-animate">
                            <img loading="lazy" src="{{ asset('asset/img/images/valveIKN.jpeg') }}" alt="Valve IKN"
                                width="600" height="400">
                        </div>
                        <div class="consulting-shape">
                            {{-- <img loading="lazy" src="{{ asset('asset/img/images/consulting_shape.png') }}" alt=""> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- consulting-area-end -->
    <!-- testimonial-area -->
    <section class="testimonial-area">
        <div class="container">
            <div class="row" style="display: flex;align-items:flex-end">
                <div class="col-lg-6 order-0 order-lg-2">
                    <div class="testimonial-active swiper-container">
                        <div class="swiper-wrapper">
                            @foreach($testimonis as $testimoni)
                                <div class="swiper-slide">
                                    <div class="testimonial-item">
                                        <div class="testimonial-info">
                                            <div class="icon">
                                                <img loading="lazy" class="swiper-lazy"
                                                    src="{{ asset('storage/' . $testimoni->projek->klien->logo) }}"
                                                    alt="{{ $testimoni->projek->klien->nama_perusahaan }}" width="60"
                                                    height="60">
                                                <div class="swiper-lazy-preloader"></div> <!-- spinner loading -->
                                            </div>
                                            <div class="text-info">
                                                <h3 class="title">{{ $testimoni->nama_user }}</h3>
                                                <span class="sub-title">{{ $testimoni->jabatan }}</span>
                                            </div>
                                        </div>
                                        <div class="testimonial-content">
                                            <p>"{{ $testimoni->testimoni }}"</p>
                                            <div class="icon"><img loading="lazy"
                                                    src="{{ asset('asset/img/images/petik.png') }}" alt="" width="30"
                                                    height="24"></div>
                                        </div>
                                        <div class="testimonial-content1">
                                            <div class="icon1">{{ $testimoni->projek->nama_projek }}</div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-8 kolom-widya">
                    <div class="testimonial-img-wrap">
                        <div class="icon">
                            <img loading="lazy" src="{{ asset('asset/img/images/Foto Pendapat Mitra.png') }}"
                                alt="Pendapat Mitra" width="500" height="600">
                        </div>
                        <div class="img-shape">
                            <img loading="lazy" src="{{ asset('asset/img/images/testimonial_bgwidya1.png') }}"
                                class="bgwidya" alt="background" width="400" height="400">
                            <img loading="lazy" src="" alt="" class="rightToLeft" width="1" height="1">
                            <img loading="lazy" src="{{ asset('asset/img/images/testimonial_shape1.png') }}"
                                alt="testimonial_shape1" width="80" height="80" data-parallax='{"y" : 80 }'>
                            <img loading="lazy" src="{{ asset('asset/img/images/testimonial_shape2.png') }}"
                                alt="testimonial_shape2" width="60" height="60" class="alltuchtopdown">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- testimonial-area-end -->
    <!-- artikel-post-area -->
    <section class="artikel-post-area artikel-post-bg" data-background="{{ asset('asset/img/bg/bg2.png') }}">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-6">
                    <div class="section-title text-center mb-40 tg-heading-subheading animation-style3">
                        <span class="sub-title">PUBLIKASI</span>
                        <h2 class="title tg-element-title">Artikel Terbaru <br>
                            tentang Telemetri dan Teknologi</h2>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                @foreach($artikels_terbaru as $artikel)
                    <div class="col-xl-4 col-lg-6 col-md-10">
                        <div class="artikel-post-item shine-animate-item"
                            onclick="window.location='{{ route('publikasi.show', $artikel->slug) }}'" style="cursor: pointer;">
                            <div class="artikel-post-thumb">
                                <a href="{{ route('publikasi.show', $artikel->slug) }}" class="shine-animate">
                                            <img loading="lazy" src="{{ asset('storage/' . $artikel->thumbnail) }}"
                                                alt="{{ $artikel->judul }}" width="400" height="260" style="object-fit: cover; height: 260px; width: 100%;">
                                        </a>
                            </div>
                            <div class="artikel-post-content">
                                <h3 class="title">
                                    <a href="{{ route('publikasi.show', $artikel->slug) }}">{{ $artikel->judul }}</a>
                                </h3>
                                <div class="artikel-avatar">
                                    <div class="avatar-thumb">
                                        <img loading="lazy" src="{{ asset('asset/img/blog/calendar1.png') }}" alt="calendar"
                                            width="16" height="16">
                                    </div>
                                    <div class="avatar-content">
                                        <p>{{ $artikel->created_at->translatedFormat('l, d F Y') }}</p>
                                    </div>
                                </div>
                                <div class="artikel-post-meta">
                                    <ul class="list-wrap">
                                        <li>
                                            <a href="{{ route('publikasi.show', $artikel->slug) }}" class="btn-two">Baca
                                                selengkapnya</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="project-content-bottom">
                        <a href="{{ route('publikasi.index') }}" class="btn btn-two">Cari tahu lebih banyak</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- artikel-post-area-end -->

    {{-- ✅ Konsolidasi semua Swiper init menjadi satu block script --}}
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            // Homepage Banner Slider
            new Swiper('.slider-homepage-banner', {
                spaceBetween: 0,
                autoHeight: true,
                loop: true,
                speed: 1000,
                autoplay: { delay: 3000 },
                navigation: {
                    nextEl: '.project-button-next',
                    prevEl: '.project-button-prev',
                },
                pagination: {
                    el: '.swiper-pagination-testimonials',
                    clickable: true,
                },
            });

            // Choose List Slider
            new Swiper('.choose-list', {
                spaceBetween: 0,
                autoHeight: true,
                loop: true,
                speed: 1000,
                autoplay: { delay: 3000 },
                navigation: {
                    nextEl: '.project-button-next',
                    prevEl: '.project-button-prev',
                },
                pagination: {
                    el: '.swiper-pagination-choose',
                    clickable: true,
                },
            });

            // Brand slider
            new Swiper('.brand-active', {
                slidesPerView: 3,
                spaceBetween: 30,
                autoHeight: true,
                loop: true,
                autoplay: {
                    delay: 3000,
                    disableOnInteraction: false,
                },
                lazy: {
                    loadPrevNext: true,
                },
                breakpoints: {
                    640: { slidesPerView: 2 },
                    768: { slidesPerView: 3 },
                    1024: { slidesPerView: 5 },
                }
            });

            // Project slider
            new Swiper('.project-slider', {
                slidesPerView: 1,
                spaceBetween: 20,
                autoHeight: true,
                loop: true,
                autoplay: {
                    delay: 3000,
                    disableOnInteraction: false,
                },
                lazy: {
                    loadPrevNext: true,
                },
                breakpoints: {
                    640: { slidesPerView: 1 },
                    768: { slidesPerView: 2 },
                    1024: { slidesPerView: 5 },
                }
            });

            // Testimonial slider
            new Swiper('.testimonial-active', {
                slidesPerView: 1,
                spaceBetween: 20,
                autoHeight: true,
                loop: true,
                autoplay: {
                    delay: 5000,
                    disableOnInteraction: false,
                },
                pagination: {
                    el: '.swiper-pagination',
                    clickable: true,
                },
                lazy: {
                    loadPrevNext: true,
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