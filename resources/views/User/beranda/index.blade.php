@extends('User.layouts.app')
{{-- @section('title', 'Testimoni | BE Profile') --}}
@section('content')
    <!-- banner-area -->
    <section class="w-screen" id="home">
        <div class="row">
            <div class="col-12">
                <div class="swiper-container slider-homepage-banner">
                    <div class="swiper-wrapper">
                        @foreach ($carousels as $carousel)
                        <div class="swiper-slide">
                            <section class="banner-area banner-bg" data-background="{{ asset('storage/' . $carousel->gambar) }}">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="banner-content">
                                                <span class="sub-title" data-aos="fade-up" data-aos-delay="0">Selamat datang di Beacon Engineering!</span>
                                                <h2 class="title" data-aos="fade-up" data-aos-delay="200">{!! $carousel->judul !!}</h2>
                                                <p class="sub_judul" data-aos="fade-up" data-aos-delay="400">{{ $carousel->sub_judul }}</p>
                                                <a href="about.html" class="btn" data-aos="fade-up" data-aos-delay="600">Pelajari selengkapnya!</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                        </div>
                        @endforeach
                    </div>
                </div>
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
                                <img src="{{ asset('storage/' . $klien->logo) }}" alt="{{ $klien->nama }}">
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
    <section class="services-area services-bg" data-background="{{ asset('asset/img/bg/bg1.png') }}">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-6 col-lg-8">
                    <div class="section-title text-center mb-40 tg-heading-subheading animation-style3">
                        <span class="sub-title">APA YANG KAMI LAKUKAN?</span>
                        <h2 class="title tg-element-title">Berkontribusi pada negeri dengan solusi analisis data yang <span class="highlight-red">presisi</span>.</h2>
                    </div>
                </div>
            </div>
            <div class="services-item-wrap">
                <div class="row justify-content-center">
                    @foreach($solutionss as $solution)
                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-8">
                        <div class="services-item shine-animate-item">
                            <div class="services-thumb">
                                <a href="services-details.html" class="shine-animate"><img src="{{ asset('storage/' . $solution->thumbnail) }}" alt=""></a>
                            </div>
                            <div class="services-content">
                                <div class="icon">
                                    <img src="{{ asset('storage/' . $solution->icon) }}" alt="">
                                </div>
                                <h4 class="title">{{ $solution->nama }}</h4>
                                <p>{{ $solution->description }}</p>
                                <a href="services-details.html" class="btn">Pelajari</a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <!-- services-area-end -->
    <!-- about-area -->
    <section id="about" class="about-area pt-120 pb-120">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-8">
                    <div class="about-img-wrap">
                            <img src="{{ asset('asset/img/images/Topologi.png') }}" alt="">
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="about-content">
                        <div class="section-title mb-35 tg-heading-subheading animation-style3">
                            <span class="sub-title">MENGAPA BEACON ENGINEERING?</span>
                            <h2 class="title tg-element-title">Memimpin dalam akurasi, monitoring dan observasi hanya lewat ujung jari.</h2>
                        </div>
                        <p>Semua perangkat telemetri Beacon Engineering terintegrasi dengan aplikasi STESY Smart Telemetry System. Monitoring lebih mudah, tepat, dan cepat.</p>
                        <div class="about-bottom">
                            <a href="about.html" class="btn btn-two">Lihat STESY</a>
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
                        <img src="{{ asset('asset/img/images/teknisi.jpeg') }}" alt="">
                        <img src="{{ asset('asset/img/images/Group 34.png') }}" class="shadow-image" alt="" data-parallax='{"x" : 50 }'>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="choose-content">
                        <div class="section-title white-title mb-30 tg-heading-subheading animation-style3">
                            <span class="sub-title">APA YANG INGIN DIHADIRKAN?</span>
                            <h2 class="title tg-element-title">Bukan hanya tentang perangkat, namun juga harapan dan manfaat berkelanjutan.</h2>
                        </div>
                        <p>Berdampingan dengan perangkat telemetri yang mumpuni, Beacon Engineering juga menghadirkan berbagai layanan unggulan.</p>
                        <div class="choose-list swiper-container">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <div class="icon">
                                        <img src="{{ asset('asset/img/icon/AI.png') }}" alt="">
                                    </div>
                                    <div class="content">
                                        <h4 class="title">Telemetri Berbasis AI</h4>
                                        <p>Mengumpulkan data lebih cepat dan akurat, serta analisa dan komparasi data hasil pengukuran.</p>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="icon">
                                        <img src="{{ asset('asset/img/icon/GARANSI.png') }}" alt="">
                                    </div>
                                    <div class="content">
                                        <h4 class="title">Garansi Maintenance</h4>
                                        <p>Garansi pengecekan teknis, pemeriksaan visual dan kebersihan, penggantian suku cadang, kalibrasi, serta uji fungsional.</p>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="icon">
                                        <img src="{{ asset('asset/img/icon/MONITORING.png') }}" alt="">
                                    </div>
                                    <div class="content">
                                        <h4 class="title">Monitoring Terintegrasi</h4>
                                        <p>Akses mudah dengan aplikasi STESY (Smart Telemetry System) yang hemat waktu dan efisien.</p>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="icon">
                                        <img src="{{ asset('asset/img/icon/LAYANAN.png') }}" alt="">
                                    </div>
                                    <div class="content">
                                        <h4 class="title">Layanan Konsultasi</h4>
                                        <p>Mengumpulkan data lebih cepat dan akurat, serta analisa dan komparasi data hasil pengukuran.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-pagination swiper-pagination-testimonials"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="choose-shape-wrap">
            <img src="{{ asset('asset/img/images/blog_shape031.png') }}" alt="" data-aos="fade-left" data-aos-delay="400">
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
                                    <a href="{{ route('proyek.show', Str::slug($projek->nama_projek)) }}">
                                        <img src="{{ asset('storage/' . $projek->thumbnail) }}" alt="">
                                    </a>
                                </div>
                                <div class="project-content">
                                    <div class="left-side-content">
                                        <h4 class="title">
                                            <a href="{{ route('proyek.show', Str::slug($projek->nama_projek)) }}">{{ $projek->nama_projek }}</a>
                                        </h4>
                                        <span>Tahun {{ $projek->waktu }}</span>
                                    </div>
                                    <div class="link-arrow">
                                        <a href="{{ route('proyek.show', Str::slug($projek->nama_projek)) }}">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 18 15" fill="none">
                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M17.6293 3.27957C17.7117 2.80341 17.4427 2.34763 17.0096 2.17812C16.9477 2.15385 16.8824 2.13552 16.8144 2.12376L6.96081 0.419152C6.41654 0.325049 5.89911 0.689856 5.80491 1.23411C5.71079 1.77829 6.07564 2.29578 6.61982 2.38993L14.0946 3.68295L1.36574 12.6573C0.914365 12.9756 0.806424 13.5995 1.12467 14.0509C1.44292 14.5022 2.06682 14.6102 2.51819 14.2919L15.247 5.31753L13.954 12.7923C13.8598 13.3365 14.2247 13.854 14.7689 13.9482C15.3131 14.0422 15.8305 13.6774 15.9248 13.1332L17.6293 3.27957Z" fill="currentcolor" />
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
                            <p>Cari tahu sejauh mana Beacon Engineering<br> berkontribusi di Indonesia!</p>
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
                                <h2 class="title">300+</h2>
                                <span>Proyek <br> di Indonesia</span>
                            </div>
                            <div class="content-right">
                                <h2 class="title">Pendapat Mitra</h2>
                                <p>Cari tahu pengalaman berkembang bersama Beacon Engineering melalui pendapat mitra kami!</p>
                            </div>
                        </div>
                        <div class="consulting-img shine-animate">
                            <img src="{{ asset('asset/img/images/valveIKN.jpeg') }}" alt="">
                        </div>
                        <div class="consulting-shape">
                            {{-- <img src="{{ asset('asset/img/images/consulting_shape.png') }}" alt=""> --}}
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
                                            <img src="{{ asset('storage/' . $testimoni->projek->klien->logo ) }}" alt="Logo" class="user-image">
                                        </div>
                                        <div class="text-info">
                                            <h4 class="title">{{ $testimoni->nama_user }}</h4>
                                            <span class="sub-title">{{ $testimoni->jabatan }}</span>
                                        </div>
                                    </div>
                                    <div class="testimonial-content">
                                        <p>“{{ $testimoni->testimoni }}”</p>
                                        <div class="icon"><img src="{{ asset('asset/img/images/petik.png') }}" alt=""></div>
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
                            <img src="{{ asset('asset/img/images/widya1.png') }}" alt="">
                        </div>
                        <div class="img-shape">
                            <img src="{{ asset('asset/img/images/testimonial_bgwidya1.png') }}" class="bgwidya" alt="">
                            <img src="" alt="" class="rightToLeft">
                            <img src="{{ asset('asset/img/images/testimonial_shape1.png') }}" alt="" data-parallax='{"y" : 80 }'>
                            <img src="{{ asset('asset/img/images/testimonial_shape2.png') }}" alt="" class="alltuchtopdown">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- testimonial-area-end -->
    <!-- blog-post-area -->
    <section class="blog-post-area blog-post-bg" data-background="{{ asset('asset/img/bg/bg2.png') }}">
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
                <div class="col-xl-4 col-lg-6 col-md-10">
                    <div class="blog-post-item shine-animate-item">
                        <div class="blog-post-thumb">
                            <a href="blog-details.html" class="shine-animate"><img src="{{ asset('asset/img/blog/artikel.jpeg') }}" alt=""></a>
                        </div>
                        <div class="blog-post-content">
                            <h2 class="title"><a href="blog-details.html">Telemetri 101: Pengertian, Sejarah, dan Perkembangannya</a></h2>
                            <div class="blog-avatar">
                                <div class="avatar-thumb">
                                    <img src="{{ asset('asset/img/blog/calendar1.png') }}" alt="">
                                </div>
                                <div class="avatar-content">
                                    <p>Jumat, 25 Oktober 2024</p>
                                </div>
                            </div>
                            <div class="blog-post-meta">
                                <ul class="list-wrap">
                                    <a href="blog-details.html" class="btn-two">Baca selengkapnya</a>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="project-content-bottom">
                        <a href="project-details.html" class="btn btn-two">Cari tahu lebih banyak</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- blog-post-area-end -->
    <script>
        // Inisialisasi Swiper
        document.addEventListener('DOMContentLoaded', () => {
            new Swiper('.brand-active', {
                slidesPerView: 3,
                spaceBetween: 30,
                loop: true,
                autoplay: {
                    delay: 3000,
                    disableOnInteraction: false,
                },
                breakpoints: {
                    640: { slidesPerView: 2 },
                    768: { slidesPerView: 3 },
                    1024: { slidesPerView: 5 },
                }
            });
        });
    </script>
    <script>
        // Inisialisasi Swiper
        document.addEventListener('DOMContentLoaded', () => {
            new Swiper('.project-slider', {
                slidesPerView: 1,
                spaceBetween: 20,
                loop: true,
                autoplay: {
                    delay: 3000,
                    disableOnInteraction: false,
                },
                breakpoints: {
                    640: { slidesPerView: 1 },
                    768: { slidesPerView: 2 },
                    1024: { slidesPerView: 5 },
                }
            });
        });
    </script>
    <script>
        // Inisialisasi Swiper
        document.addEventListener('DOMContentLoaded', () => {
            new Swiper('.choose-list', {
                slidesPerView: 1,
                spaceBetween: 3,
                loop: true,
                autoplay: {
                    delay: 5000,
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

<script>
    // Inisialisasi Swiper
    document.addEventListener('DOMContentLoaded', () => {
        new Swiper('.testimonial-active', {
            slidesPerView: 1,
            spaceBetween: 20,
            loop: true,
            autoplay: {
                delay: 5000,
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
