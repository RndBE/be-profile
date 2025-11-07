@extends('User.layouts.app')
@section('title', (isset($produk) ? e($produk->nama_produk) : 'Detail Produk') . ' | Beacon Engineering')
@section('description', isset($produk) ? Str::limit(strip_tags($produk->deskripsi_produk), 160, '...') : 'Lihat detail produk Beacon Engineering.')
@section('image', isset($produk) ? asset('storage/' .$produk->gambar_produk) : asset('asset/img/project/bg.png'))

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
                                        <img src="{{ asset('storage/' .$produk->gambar_produk) }}" alt="{{ $produk->nama_produk }}">
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
                                <span class="project-artikel__details-inner-content">{!! $produk->deskripsi_produk !!}</span>
                                @else
                                <span class="project-artikel__details-inner-content">Deskripsi tidak tersedia</span>
                                @endif
                                <div class="produk__details-info">
                                    <ul class="list-wrap">
                                        <li>
                                            @if(isset($produk) && $produk->brosur)
                                                <a class="btn" href="{{ asset('storage/' .$produk->brosur) }}" target="_blank">
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
                                    <span class="project-artikel__details-inner-content" style="color: #2E2E4D">{{ $solusi->nama }}</span>
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
                                    <div class="tab-pane fade " id="komponen-tab-pane" role="tabpanel" aria-labelledby="komponen-tab" tabindex="0">
                                        <div class="choose__tab-content text-center">
                                            @if ($komponen)
                                                <div class="komponen-item text-center mt-4">
                                                    <p class="fs-4 fw-bold" style="color: #2E2E4D">{{ $komponen->description }} <span style="color: #b40404;">{{ $komponen->dataProduk->nama_produk }}</span>?</p>
                                                    @if($komponen->gambar)
                                                        <img src="{{ asset('storage/' . $komponen->gambar) }}" class="img-fluid mb-2" alt="Gambar Komponen">
                                                    @endif

                                                </div>
                                            @else
                                                <p class="text-muted">Tidak ada komponen tersedia.</p>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="tab-pane fade" id="keunggulan-tab-pane" role="tabpanel" aria-labelledby="keunggulan-tab" tabindex="0">
                                        <div class="choose__tab-content">
                                            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-2 row-cols-lg-2 g-4">
                                                @foreach($keunggulan as $item)
                                                    <div class="col">
                                                        <div class="content-box">
                                                            <h4>
                                                                <i class="fas fa-check" style="background-color: #2E2E4D; color: white; padding: 8px; border-radius: 100%; font-size: 18px; font-weight: bold;"></i>
                                                                {{ $item->nama_keunggulan }}
                                                            </h4>
                                                            <div class="keunggulan-description">
                                                                {!! $item->description !!}
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="spesifikasi-tab-pane" role="tabpanel" aria-labelledby="spesifikasi-tab" tabindex="0">
                                        <div class="choose__tab-content">
                                            <div class="row row-cols-1 row-cols-sm-1 row-cols-md-1 row-cols-lg-1 g-4">
                                                @if($seriPerangkat->isNotEmpty())
                                                    @foreach($seriPerangkat as $perangkat)
                                                        <div class="col">
                                                            <div class="content-box">
                                                                <h5>
                                                                    <i class="fas fa-check" style="background-color: #2E2E4D; color: white; padding: 8px; border-radius: 100%; font-size: 15px; font-weight: bold;"></i>
                                                                    {{ $perangkat->seri_perangkat }}
                                                                </h5>
                                                                <div class="keunggulan-description">
                                                                    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-2 row-cols-lg-2 g-4">
                                                                        <div class="col">
                                                                            <div class="content-box">
                                                                                <img src="{{ asset('storage/' . $perangkat->gambar1) }}" alt="Gambar 1" class="img-fluid">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col">
                                                                            <div class="content-box">
                                                                                <img src="{{ asset('storage/' . $perangkat->gambar2) }}" alt="Gambar 2" class="img-fluid">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                @if($perangkat->spesifikasi->isNotEmpty())
                                                                    <div class="row row-cols-1 g-4" style="margin-right:5px;">
                                                                        <table class="table">
                                                                            @php
                                                                                $backgroundColors = ['rgba(46, 46, 77, 0.30)', 'rgb(210, 210, 219, 0.15)'];
                                                                                $index = 0;
                                                                            @endphp
                                                                            @foreach($perangkat->spesifikasi->groupBy('dataSpesifikasi.dataKategoriSpesifikasi.nama_kategori') as $kategori => $items)
                                                                                <thead>
                                                                                    <tr>
                                                                                        <th colspan="2" scope="col" style="text-align: center; background-color: #2E2E4D; color: white;">
                                                                                            {{ $kategori }}
                                                                                        </th>
                                                                                    </tr>
                                                                                </thead>
                                                                                <tbody>
                                                                                    @foreach($items as $item)
                                                                                        <tr>
                                                                                            <td scope="row" style="background-color: {{ $backgroundColors[$index % count($backgroundColors)] }}; color: #2E2E4D; border-right: 2px solid rgb(46, 46, 77, 0.25);">
                                                                                                {{ $item->dataSpesifikasi->judul }}
                                                                                            </td>
                                                                                            <td style="color: #2E2E4D; background-color: {{ $loop->odd ? 'transparent' : 'rgb(210, 210, 219, 0.30)' }};">
                                                                                                <span class="project-artikel__details-inner-content">{!! $item->deskripsi !!}</span>
                                                                                            </td>
                                                                                        </tr>
                                                                                        @php $index++; @endphp
                                                                                    @endforeach
                                                                                </tbody>
                                                                            @endforeach
                                                                        </table>
                                                                    </div>
                                                                @else
                                                                    <p class="text-muted">Tidak ada spesifikasi untuk perangkat ini.</p>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                @endif

                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="sertifikasi-tab-pane" role="tabpanel" aria-labelledby="sertifikasi-tab" tabindex="0">
                                        <div class="choose__tab-content">
                                            @if(isset($produk))
                                                @php
                                                    $searchPatterns = ['/view?usp=sharing', '/view?usp=drive_link'];
                                                    $previewLink = str_replace($searchPatterns, '/preview', $produk->link_tkdn);
                                                @endphp
                                                <iframe src="{{ $previewLink }}" style="width: 100%; height: 80vh; border: none;"></iframe>
                                            @endif
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
