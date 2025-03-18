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
                                {{-- <span class="sub-title" style="color: rgba(180, 4, 4, 0.75);">MENGENAL LEBIH JAUH BEACON ENGINEERING</span> --}}
                                <h2 class="title tg-element-title">Sertifikasi adalah bentuk kepercayaan yang terbangun dan kualitas yang teruji. </h2>
                            </div>
                            {{-- <div class="about__content-inner-five">
                                <div class="about__list-box">
                                    <ul class="list-wrap">
                                        <li><i class="flaticon-arrow-button"></i>Menyajikan data akurasi tinggi</li>
                                        <li><i class="flaticon-arrow-button"></i>Monitoring realtime 24 jam</li>
                                        <li><i class="flaticon-arrow-button"></i>Akses data 100% online</li>
                                    </ul>
                                </div>
                            </div> --}}
                            <p style="text-align: justify;">Selain memprioritaskan dampak yang positif bagi masyakarat, Beacon Engineering juga menjadikan sertifikasi sebagai landasan untuk tetap mempertahankan kredibilitas dan integeritas.</p>
                            <div class="about-bottom">
                                <a href="mailto:info@bejogja.com" class="btn btn-two" style="margin-top:50px;margin-bottom:50px;">
                                    Konsultasi Sekarang
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-9">
                        <div class="choose__img-wrap-five-sertifikasi">
                            <div class="icon">
                                <img src="{{ asset('asset/img/images/h5_choose_img01.jpg') }}" alt="">
                                <img src="{{ asset('asset/img/images/h5_choose_img01.jpg') }}" alt="">
                            </div>
                            <div class="img-shape">
                                <img src="{{ asset('asset/img/images/testimonial_shape1.png') }}" alt="">
                                <img src="{{ asset('asset/img/images/testimonial_shape2.png') }}" alt="" class="alltuchtopdown">
                            </div>
                        </div>
                        <div class="choose__list-sertifikasi">
                            <ul class="list-wrap">
                                <li>
                                    {{-- <div class="icon">
                                        <img src="{{ asset('asset/img/icon/Online acess.png') }}" alt="">
                                    </div>
                                    <div class="content">
                                        <h4 class="title">100%</h4>
                                        <p>DATA ONLINE</p>
                                    </div> --}}
                                </li>
                                <li>
                                    <div class="icon">
                                        <img src="{{ asset('asset/img/icon/Checkmark.png') }}" alt="">
                                    </div>
                                    <div class="content">
                                        <h4 class="title">100%</h4>
                                        <p>Resmi & Teruji</p>
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
                                    <div class="swiper-slide">
                                        <div class="content">
                                            <img src="{{ asset('asset/img/iso/SERTIFIKASI ISO 90012015.jpg') }}" class="d-block w-100" alt="Sertifikasi 1">
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="content">
                                            <img src="{{ asset('asset/img/iso/SERTIFIKASI ISO 270012013.jpg') }}" class="d-block w-100" alt="Sertifikasi 2">
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="content">
                                            <img src="{{ asset('asset/img/iso/SERTIFIKASI ISO 30141.jpg') }}" class="d-block w-100" alt="Sertifikasi 3">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="komitmen__list">
                            <ul class="list-wrap">
                                <li>
                                    <div class="icon">
                                        <img src="{{ asset('asset/img/icon/sertifikasi1.png') }}" alt="">
                                    </div>
                                    <div class="content">
                                        <h4 class="title">SERTIFIKASI ISO 9001:2015</h4>
                                        <p>Menunjukkan level kompetensi tertinggi dalam proses dan prosedur perusahaan.</p>
                                    </div>
                                </li>
                            </ul>
                            <ul class="list-wrap">
                                <li>
                                    <div class="icon">
                                        <img src="{{ asset('asset/img/icon/sertifikasi2.png') }}" alt="">
                                    </div>
                                    <div class="content">
                                        <h4 class="title">SERTIFIKASI ISO 27001:2013</h4>
                                        <p>Dedikasi melindungi aset informasi dan menjaga keamanan data para klien.</p>
                                    </div>
                                </li>
                            </ul>
                            <ul class="list-wrap">
                                <li>
                                    <div class="icon">
                                        <img src="{{ asset('asset/img/icon/sertifikasi3.png') }}" alt="">
                                    </div>
                                    <div class="content">
                                        <h4 class="title">SERTIFIKASI ISO 30141</h4>
                                        <p>Menunjukkan kompetensi perusahaan dalam Internet of Things (IoT).</p>
                                    </div>
                                </li>
                            </ul>
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
                            <img src="{{ asset('asset/img/iso/merek_belakang.png') }}" class="d-block w-100" alt="Sertifikasi 1">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="sertifikasi__content-five">
                            <img src="{{ asset('asset/img/iso/merek_depan.png') }}" class="d-block w-100" alt="Sertifikasi 1">
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


