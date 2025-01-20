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
        <!-- team-details-area -->
        <section class="team__details-area produk__bg" data-background="{{ asset('asset/img/bg/bg_produk.png') }}">
            <div class="container">
                <div class="team__details-inner">
                    <div class="row align-items-center">
                        <div class="col-36">
                            <div class="team__details-img">
                                <img src="{{ asset('asset/img/produk/Logger.png') }}" alt="">
                            </div>
                        </div>
                        <div class="col-64">
                            <div class="team__details-content">
                                {{-- <h2 class="title">Marker Stephen</h2>
                                <span class="position">Finance Advisor</span> --}}
                                <p>eed a little help from our friends from time to time. Although we offer the one-stop convenience of annery integrated range of legal, financial services under one roof there are occasions when our clients areaneed specia.eed a little help from our friends from time to time. Although we offer the one-stop onvenience of annery integrated of legal, financial services under one roofthere.</p>
                                <div class="team__details-info">
                                    {{-- <ul class="list-wrap">
                                        <li>
                                            <i class="flaticon-phone-call"></i>
                                            <a href="tel:0123456789">+123 8989 444</a>
                                        </li>
                                        <li>
                                            <i class="flaticon-mail"></i>
                                            <a href="mailto:info@gmail.com">info@gmail.com</a>
                                        </li>
                                        <li>
                                            <i class="flaticon-pin"></i>
                                            256 Avenue, Mark Street, Newyork City
                                        </li>
                                        <li>
                                            <i class="fas fa-share-alt"></i>
                                            <ul class="list-wrap team__details-social">
                                                <li><a href="javascript:void(0)"><i class="fab fa-facebook-f"></i></a></li>
                                                <li><a href="javascript:void(0)"><i class="fab fa-twitter"></i></a></li>
                                                <li><a href="javascript:void(0)"><i class="fab fa-pinterest-p"></i></a></li>
                                                <li><a href="javascript:void(0)"><i class="fab fa-instagram"></i></a></li>
                                                <li><a href="javascript:void(0)"><i class="fab fa-linkedin-in"></i></a></li>
                                            </ul>
                                        </li>
                                    </ul> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- team-details-area-end -->
        <!-- services-details-area -->
        <section class="services__details-area">
            <div class="container">
                <div class="services__details-wrap">
                    <div class="row">
                        <div class="col-70 order-0 order-lg-2">
                            <div class="services__details-content services__details-content-two">
                                {{-- <div class="project__details-thumb swiper-container slider-project-banner">
                                    <div class="swiper-wrapper">
                                        @if($subSolution && $subSolution->gambar)
                                            @forelse($subSolution->gambar as $gambar)
                                                <div class="swiper-slide">
                                                    <img src="{{ asset('storage/' . $gambar->gambar) }}" alt="gambar">
                                                </div>
                                            @empty
                                                <div class="swiper-slide">
                                                    <img style="width: 100%;height: 600px;" src="{{ asset('asset/img/images/no-image1.png') }}" alt="default">
                                                </div>
                                            @endforelse
                                        @else
                                            <div class="swiper-slide">
                                                <img style="width: 100%;height: 600px;" src="{{ asset('asset/img/images/no-image1.png') }}" alt="default">
                                            </div>
                                        @endif
                                    </div>
                                    <div class="swiper-pagination swiper-pagination-project"></div>
                                </div>
                                @if($subSolution)
                                    <p>{!! $subSolution->description1 !!}</p>
                                @else
                                    <p>Sub-solusi tidak ditemukan.</p>
                                @endif --}}

                                <div class="services__details-inner-two services__details-inner-four">
                                    <div class="row gutter-24 align-items-center">
                                        <div class="services__details-list-two">
                                            <div class="row gutter-24">
                                                {{-- @if($subSolution && $subSolution->fiturSubSolutions->isNotEmpty())
                                                    @foreach($subSolution->fiturSubSolutions as $fitur)
                                                        <div class="col-md-4">
                                                            <div class="services__details-list-box-two">
                                                                <div class="icon">
                                                                    <img src="{{ asset('storage/' . $fitur->icon) }}" alt="icon">
                                                                </div>
                                                                <div class="content">
                                                                    <h4 class="title">{{ $fitur->nama }}</h4>
                                                                    <p>{{ $fitur->description }}</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                @else
                                                    <p>Fitur belum tersedia.</p>
                                                @endif --}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{-- @if($subSolution)
                                    <p>{!! $subSolution->description2 !!}</p>
                                @else
                                    <p>Sub-solusi tidak ditemukan.</p>
                                @endif --}}
                                <div class="services__details-inner">
                                    <div class="row gutter-24 align-items-top">
                                        <div class="col-56">
                                            <div class="project__details-inner-content" id="project-description">
                                                {{-- @if($subSolution)
                                                    <p>{!! $subSolution->description3 !!}</p>
                                                @else
                                                    <p>Sub-solusi tidak ditemukan.</p>
                                                @endif --}}
                                            </div>
                                        </div>
                                        <div class="col-44">
                                            <div class="services__details-inner-img">
                                                {{-- @if ($subSolution && $subSolution->video)
                                                    @php
                                                        // Ekstrak Video ID dari URL
                                                        preg_match('/(?:https?:\/\/)?(?:www\.)?(?:youtube\.com\/(?:embed\/|watch\?v=)|youtu\.be\/)([^\&\?\/]+)/', $subSolution->video, $matches);
                                                        $videoId = $matches[1] ?? null;
                                                    @endphp
                                                    @if ($videoId)
                                                        <div class="video-thumbnail-wrapper" style="position: relative; display: inline-block;">
                                                            <!-- Tampilkan Thumbnail Video -->
                                                            <img
                                                                src="https://img.youtube.com/vi/{{ $videoId }}/hqdefault.jpg"
                                                                style="width: 100%; height: 305px;"
                                                                alt="YouTube Video Thumbnail">

                                                            <!-- Tombol Play -->
                                                            <a
                                                                href="{{ $subSolution->video }}"
                                                                class="play-btn popup-video"
                                                                style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);">
                                                                <i class="fas fa-play" style="font-size: 40px;"></i>
                                                            </a>
                                                        </div>
                                                    @else
                                                        <p>Invalid YouTube URL</p>
                                                    @endif
                                                @endif --}}
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="col-30">
                            <aside class="services__sidebar">
                                <div class="sidebar__widget px-3 py-3">
                                    <div class="sidebar__cat-list-two sidebar__cat-list-three ">
                                        <ul class="list-wrap">
                                            {{-- @foreach($solution->subSolutions as $subSolution)
                                            <li class="{{ Request::is('solusi/' . Str::slug($solution->nama) . '/' . Str::slug($subSolution->nama)) ? 'active' : '' }}">
                                                <a href="{{ route('solusi.show', [Str::slug($solution->nama), Str::slug($subSolution->nama)]) }}"
                                                    class="px-3 py-2 {{ Request::is('solusi/' . Str::slug($solution->nama) . '/' . Str::slug($subSolution->nama)) ? 'active' : '' }}">
                                                    {{ $subSolution->nama }}
                                                    <i class="flaticon-arrow-button"></i>
                                                </a>
                                            </li>
                                            @endforeach --}}
                                        </ul>
                                    </div>
                                </div>
                                {{-- <div class="sidebar__widget sidebar__widget-three">
                                    <h4 class="sidebar__widget-title">Unduh Brosur</h4>
                                    <div class="sidebar__brochure sidebar__brochure-two">
                                        <p>when an unknown printer took ga lley offer typey anddey.</p>
                                        <a href="" target="_blank" download>Unduh PDF</a>
                                        <a href="" target="_blank" download>Unduh TKDN</a>
                                    </div>
                                </div> --}}
                                <div class="sidebar__widget sidebar__widget-two">
                                    <div class="sidebar__contact sidebar__contact-two" data-background="{{ asset('asset/img/services/sidebar_contact_bg.png') }}">
                                        <h2 class="title">Konsultasi apa saja, kami siap membantu!</h2>
                                        <a href="tel:0123456789" class="btn"><i class="flaticon-phone-call"></i>+91 705 2101 786</a>
                                    </div>
                                </div>
                            </aside>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- services-details-area-end -->
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
