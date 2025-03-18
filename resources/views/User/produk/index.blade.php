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
                                @if(isset($produk))
                                    {{ $produk->nama_produk }}
                                @endif
                            </h2>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/">Beranda</a></li>
                                    <li class="breadcrumb-item active">Detail Produk</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">
                                        @if(isset($produk))
                                            {{ $produk->nama_produk }}
                                        @endif
                                    </li>
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
                        <div class="col-lg-6 col-md-9">
                            <div class="produk__item-four shine-animate-item">
                                <div class="produk__thumb-four shine-animate">
                                    @if(isset($produk) && $produk->gambar_produk)
                                        <img src="{{ asset('storage/' . $produk->gambar_produk) }}" alt="{{ $produk->nama_produk }}">
                                    @else
                                        <p>Deskripsi tidak tersedia</p>
                                    @endif
                                </div>
                                <div class="produk__content-four">
                                    @if(isset($produk) && $produk->nama_produk)
                                        <span>{{ $produk->nama_produk }}</span>
                                    @else
                                        <span>Nama produk tidak tersedia</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="produk__details-content">
                                @if(isset($produk) && $produk->deskripsi_produk)
                                    {!! $produk->deskripsi_produk !!}
                                @else
                                    <p>Deskripsi tidak tersedia</p>
                                @endif
                                <div class="produk__details-info">
                                    <ul class="list-wrap">
                                        <li>
                                            @if(isset($produk) && $produk->brosur)
                                                <a class="btn" href="{{ asset('storage/' . $produk->brosur) }}" target="_blank">
                                                    Unduh Brosur
                                                </a>
                                            @else
                                                <span class="btn">Brosur tidak tersedia</span>
                                            @endif
                                            <div class="dropdown-lkpp">
                                                <button type="button" class="btn btn-group">
                                                    Lihat di LKPP
                                                </button>
                                                <ul class="dropdown-menu">
                                                    <li>
                                                        @if(isset($produk) && $produk->link_lkpp_lokal)
                                                        <a class="dropdown-item" href="{{ $produk->link_lkpp_lokal }}" target="_blank">Lokal</a>
                                                        @else
                                                            <a class="dropdown-item">Lokal tidak tersedia</a>
                                                        @endif
                                                    </li>
                                                    <li>
                                                        @if(isset($produk) && $produk->link_lkpp_sektoral)
                                                        <a class="dropdown-item" href="{{ $produk->link_lkpp_sektoral }}" target="_blank">Sektoral</a>
                                                        @else
                                                            <a class="dropdown-item">Sektoral tidak tersedia</a>
                                                        @endif
                                                    </li>
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
                    @foreach($solusiProduk as $solusi)
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="solusiproduk-item text-center">
                                <div class="icon">
                                    <img src="{{ asset('storage/' . $solusi->icon) }}" alt="{{ $solusi->nama }}">
                                </div>
                                <div class="content">
                                    <p>{{ $solusi->nama }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
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
