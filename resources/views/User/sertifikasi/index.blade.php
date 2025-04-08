@extends('User.layouts.app')
@section('title', 'Sertifikasi | BE Profile')
@section('content')
        <!-- breadcrumb-area -->
        <section class="breadcrumb__area breadcrumb__bg" data-background="{{ asset('asset/img/project/bg.png') }}">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="breadcrumb__content">
                            <h2 class="title">Sertifikasi</h2>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/">Beranda</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Sertifikasi</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        {{-- MENGENAL --}}
        <section id="about" class="about-area pt-120 pb-120">
            <div class="container">
                <div class="row align-items-top">
                    <div class="col-lg-6">
                        <div class="choose__content-five-sertifikasi">
                            <div class="section-title mb-30 tg-heading-subheading animation-style3">
                                @if($sertifikasiAtas)
                                    @if($sertifikasiAtas->header)
                                        <h2 class="title tg-element-title">{{ $sertifikasiAtas->header }}</h2>
                                    @endif
                                @else
                                    <p>Tidak ada detail yang tersedia.</p>
                                @endif
                            </div>
                            @if($sertifikasiAtas)
                                    @if($sertifikasiAtas->header)
                                    <p style="text-align: justify;color:#2E2E4D">{{ $sertifikasiAtas->sub_header }}</p>
                                    @endif
                                @else
                                    <p>Tidak ada detail yang tersedia.</p>
                                @endif
                            <div class="about-bottom">
                                <a href="https://wa.me/628112632151" target="_blank" class="btn btn-two" style="margin-top:50px;margin-bottom:50px;">
                                    Konsultasi Sekarang
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-9">
                        <div class="choose__img-wrap-five-sertifikasi">
                            <div class="icon">
                                @if($sertifikasiAtas)
                                    @if($sertifikasiAtas->gambar_satu)
                                        <img src="{{ asset('storage/' . $sertifikasiAtas->gambar_satu) }}" alt="Gambar Satu">
                                    @endif
                                    @if($sertifikasiAtas->gambar_dua)
                                        <img src="{{ asset('storage/' . $sertifikasiAtas->gambar_dua) }}" alt="Gambar Dua">
                                    @endif
                                @else
                                    <p>Tidak ada gambar yang tersedia.</p>
                                @endif
                            </div>
                            <div class="img-shape">
                                <img src="{{ asset('asset/img/images/testimonial_shape1.png') }}" alt="">
                                <img src="{{ asset('asset/img/images/testimonial_shape2.png') }}" alt="" class="alltuchtopdown">
                            </div>
                        </div>
                        <div class="choose__list-sertifikasi">
                            <ul class="list-wrap">
                                <li>

                                </li>
                                <li>
                                    <div class="icon">
                                        <img src="{{ asset('asset/img/icon/Checkmark.png') }}" alt="">
                                    </div>
                                    <div class="content">
                                        <h4 class="title">100%</h4>
                                        <p style="color:#2E2E4D">Resmi & Teruji</p>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>

                </div>
            </div>
        </section>
        {{-- KOMITMEN --}}
        <section id="about" class="call-back-area pt-120 pb-120">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-9">
                        <div class="sertifikasi__content-five">
                            <h2 class="title tg-element-title mb-20">Sertifikasi ISO</h2>
                            <div class="sertifikasi-active swiper-container">
                                <div class="swiper-wrapper">
                                    @foreach ($sertifikasi as $item)
                                        <div class="swiper-slide">
                                            <div class="content">
                                                <img src="{{ asset('storage/' . $item->gambar) }}" class="d-block w-100" alt="{{ $item->title }}">
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="komitmen__list">
                            @foreach ($sertifikasi as $item)
                            <ul class="list-wrap">
                                <li>
                                    <div class="icon">
                                        <img src="{{ asset('storage/' . $item->icon) }}" alt="{{ $item->title }}">
                                    </div>
                                    <div class="content">
                                        <h4 class="title">{{ $item->title }}</h4>
                                        <p style="text-align: justify;color:#2E2E4D">{{ $item->sub_title }}</p>
                                    </div>
                                </li>
                            </ul>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <div class="blog-shape-wrap">
                <img src="{{ asset('asset/img/images/Komponen background (5).png') }}" style="opacity: 0.2" alt="" data-aos="fade-left" data-aos-delay="400">
                <img src="{{ asset('asset/img/images/Komponen background (3).png') }}" style="opacity: 0.2" alt="" data-aos="fade-right" data-aos-delay="400">
            </div>
        </section>
        <!-- team-area -->
        <section class="team__area-four">
            <div class="" style="text-align: center;padding-bottom:100px">
                <h2 class="title"><span style="color: rgba(180, 4, 4, 0.75);">Beacon</span> Engineering juga telah memiliki sertifikat merk dagang</h2>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-9">
                        <div class="sertifikasi__content-five">
                            <img src="{{ asset('asset/img/iso/Sertifikat Merek BE_page-0001.jpg') }}" class="d-block w-100" alt="Sertifikasi 1">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="sertifikasi__content-five">
                            <img src="{{ asset('asset/img/iso/Sertifikat Merek BE_page-0002.jpg') }}" class="d-block w-100" alt="Sertifikasi 1">
                        </div>
                    </div>
                </div>
            </div>

        </section>
        <!-- team-area-end -->
        <script>
            // Inisialisasi Swiper
            document.addEventListener('DOMContentLoaded', () => {
                new Swiper('.sertifikasi-active', {
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
                        320: { slidesPerView: 1 },
                        640: { slidesPerView: 1 },
                        768: { slidesPerView: 1 },
                        1024: { slidesPerView: 1 },
                    }
                });
            });
        </script>
@endsection


