@extends('User.layouts.app')
@section('title', 'Detail Produk | BE Profile')
@section('content')
        <!-- breadcrumb-area -->
        <section class="breadcrumb__area breadcrumb__bg" data-background="{{ asset('asset/img/project/bg.png') }}">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="breadcrumb__content">
                            <h2 class="title">
                                {{-- @if(isset($solution)) --}}
                                    Solusi
                                {{-- @endif --}}
                            </h2>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/">Beranda</a></li>
                                    <li class="breadcrumb-item">Solusi</a></li>
                                        {{-- @if(isset($solution))  --}}
                                            <li class="breadcrumb-item active" aria-current="page">
                                                Water Security
                                            </li>
                                        {{-- @endif --}}

                                        {{-- @if(isset($subSolution))  --}}
                                            <li class="breadcrumb-item active" aria-current="page">
                                                Automatic Water Level Recorder
                                            </li>
                                        {{-- @endif --}}
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- breadcrumb-area-end -->
        <!-- produk-details-area -->
        <section class="produk__details-area produk__bg" data-background="{{ asset('asset/img/bg/bg_produk.png') }}">
            <div class="container">
                <div class="produk__details-inner">
                    <div class="row justify-content-center align-items-center">
                        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-8">
                            <div class="produk__item-four shine-animate-item">
                                <div class="produk__thumb-four shine-animate">
                                    <img src="{{ asset('asset/img/produk/Logger.png') }}" alt="">
                                </div>
                                <div class="produk__content-four">
                                    <span>AWLR BE-WLR-100-U150</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-64">
                            <div class="produk__details-content">
                                <p>This device is ideal for use as a remote monitoring for water level measuring rainfall
                                    levels.. BE Data Loggers offers accurate data recording measurement results specifically
                                    for hydrological monitoring solutions. This device uses BL-11 series BE Data Logger which
                                    is efficient and economical because it only measures one sensor (on location) which is
                                    stored on the SD Card. The rainfall sensor uses a self-emptying tipping bucket with a
                                    resolution of 0.2 mm, and uses high quality plastic material with a simple design for longterm use, outer shell is made from Styrosun material which makes the surface easy to
                                    clean. The enclosure uses ABS material and has Ip65 rating which is resistant to weather effect
                                    and and high temperature. This enclosure can make the electronic device inside be durable
                                    and can protect the device from high temperatures due to UV exposure and keep the
                                    humidity of the electronic device inside to avoid corrosion.
                                    The battery in the data logger uses a type of Lead Acid with a Deep Cycle that can be
                                    recharged and discharged many times. This battery is also resistant to high temperatures
                                    and can be used for a long time.
                                </p>
                                <div class="produk__details-info">
                                    <ul class="list-wrap">
                                        <li>
                                            <a class="btn" href="" target="_blank" download>Unduh Brosur</a>
                                            <div class="dropdown-lkpp">
                                                <button type="button" class="btn btn-group">
                                                    Lihat di LKPP
                                                </button>
                                                <ul class="dropdown-menu">
                                                    <li><a class="dropdown-item" href="#">Lokal</a></li>
                                                    <li><a class="dropdown-item" href="#">Sektoral</a></li>
                                                </ul>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- produk-details-area-end -->
        <!-- solusiproduk-area -->
        <section class="solusiproduk-area">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-6 col-lg-8">
                        <div class="section-title text-center mb-50 tg-heading-subheading animation-style3">
                            <h2 class="title tg-element-title">Solusi tepat pemasangan di wilayah:</h2>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center gutter-24">
                    <div class="col-xl-3 col-lg-4 col-sm-6">
                        <div class="solusiproduk-item text-center">
                            <div class="icon">
                                <img src="{{ asset('asset/img/icon/water-waves 1.png') }}" alt="">
                            </div>
                            <div class="content">
                                <p>Irigasi</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-sm-6">
                        <div class="solusiproduk-item text-center">
                            <div class="icon">
                                <img src="{{ asset('asset/img/icon/water-waves 2.png') }}" alt="">
                            </div>
                            <div class="content">
                                <p>Bendungan</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-sm-6">
                        <div class="solusiproduk-item text-center">
                            <div class="icon">
                                <img src="{{ asset('asset/img/icon/water-waves 3.png') }}" alt="">
                            </div>
                            <div class="content">
                                <p>Spillway</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-sm-6">
                        <div class="solusiproduk-item text-center">
                            <div class="icon">
                                <img src="{{ asset('asset/img/icon/water-waves 4.png') }}" alt="">
                            </div>
                            <div class="content">
                                <p>Drainase</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- solusiproduk-area-end -->
        <!-- services-area -->
        <section class="services__area-six services__bg-six">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="box-faq-right">
                            <div class="choose__tab">
                                <ul class="nav nav-tabs" id="myTab" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link active" id="komponen-tab" data-bs-toggle="tab" data-bs-target="#komponen-tab-pane" type="button" role="tab" aria-controls="komponen-tab-pane" aria-selected="true">Komponen</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="keunggulan-tab" data-bs-toggle="tab" data-bs-target="#keunggulan-tab-pane" type="button" role="tab" aria-controls="keunggulan-tab-pane" aria-selected="false">Keunggulan</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="spesifikasi-tab" data-bs-toggle="tab" data-bs-target="#spesifikasi-tab-pane" type="button" role="tab" aria-controls="spesifikasi-tab-pane" aria-selected="false">Spesifikasi</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="sertifikasi-tab" data-bs-toggle="tab" data-bs-target="#sertifikasi-tab-pane" type="button" role="tab" aria-controls="sertifikasi-tab-pane" aria-selected="false">Sertifikasi</button>
                                    </li>
                                </ul>
                                <div class="tab-content" id="myTabContent">
                                    <div class="tab-pane fade show active" id="komponen-tab-pane" role="tabpanel" aria-labelledby="komponen-tab" tabindex="0">
                                        <div class="choose__tab-content text-center">
                                            <p class="fs-4 fw-bold">Apa saja komponen dalam perangkat <br> AWLR Seri <span style="color: #b40404;">BE-WLR-100-U150</span>?</p>
                                            <img src="{{ asset('asset/img/produk/Skema produk Beacon AWLR 1 1.png') }}" alt="" class="img-fluid">
                                        </div>
                                    </div>

                                    <div class="tab-pane fade" id="keunggulan-tab-pane" role="tabpanel" aria-labelledby="keunggulan-tab" tabindex="0">
                                        <div class="choose__tab-content">
                                            <p>longerty successfully cope with tasks of varying complexity provide area guarantees and regularly master new Practice.</p>
                                            <ul class="list-wrap">
                                                <li><i class="fas fa-check"></i>Save Money & Time</li>
                                                <li><i class="fas fa-check"></i>100% Satisfaction</li>
                                                <li><i class="fas fa-check"></i>Best For IT Consulting</li>
                                                <li><i class="fas fa-check"></i>Our Vision, Our Mission</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="spesifikasi-tab-pane" role="tabpanel" aria-labelledby="spesifikasi-tab" tabindex="0">
                                        <div class="choose__tab-content">
                                            <p>spek.</p>
                                            <ul class="list-wrap">
                                                <li><i class="fas fa-check"></i>Save Money & Time</li>
                                                <li><i class="fas fa-check"></i>100% Satisfaction</li>
                                                <li><i class="fas fa-check"></i>Best For IT Consulting</li>
                                                <li><i class="fas fa-check"></i>Our Vision, Our Mission</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="sertifikasi-tab-pane" role="tabpanel" aria-labelledby="sertifikasi-tab" tabindex="0">
                                        <div class="choose__tab-content">
                                            <p>sertifikasi.</p>
                                            <ul class="list-wrap">
                                                <li><i class="fas fa-check"></i>Save Money & Time</li>
                                                <li><i class="fas fa-check"></i>100% Satisfaction</li>
                                                <li><i class="fas fa-check"></i>Best For IT Consulting</li>
                                                <li><i class="fas fa-check"></i>Our Vision, Our Mission</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- services-area-end -->
        <script>
            document.addEventListener('DOMContentLoaded', () => {
                new Swiper('.produk-slider', {
                    slidesPerView: 1,
                    spaceBetween: 20,
                    loop: true,
                    autoplay: {
                        delay: 3000,
                        disableOnInteraction: false,
                    },
                    navigation: {
                        prevEl: '.button-swiper-prev',
                        nextEl: '.button-swiper-next',
                    },
                    breakpoints: {
                        640: { slidesPerView: 1 },
                        992: { slidesPerView: 1 },
                        1024: { slidesPerView: 2 },
                        1500: { slidesPerView: 3 },
                    },
                });
            });
        </script>
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
@endsection
