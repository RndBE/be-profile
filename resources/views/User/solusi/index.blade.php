@extends('User.layouts.app')
@section('title',
    (isset($solution) ? $solution->nama : 'Solusi') .
    (isset($subSolution) ? ' - ' . $subSolution->nama : '') .
    ' | Beacon Engineering'
)

@section('description',
    isset($subSolution)
        ? Str::limit(strip_tags($subSolution->description1 ?? ''), 160)
        : 'Jelajahi solusi kami bersama Beacon Engineering.'
)

@section('image',
    isset($subSolution) && !empty($subSolution->gambar[0]->gambar)
        ? asset('storage/' . $subSolution->gambar[0]->gambar)
        : asset('asset/img/images/no-image1.png')
)
@section('content')
        <!-- breadcrumb-area -->
        <section class="breadcrumb__area breadcrumb__bg" data-background="{{ asset('asset/img/project/bg.png') }}">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="breadcrumb__content">
                            <h2 class="title">
                                @if(isset($solution))
                                    Solusi {{ $solution->nama }}
                                @endif
                            </h2>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/">Beranda</a></li>
                                    <li class="breadcrumb-item">Solusi</a></li>
                                        @if(isset($solution)) <!-- Pastikan solusi ada -->
                                            <li class="breadcrumb-item active" aria-current="page">
                                                {{ $solution->nama }}
                                            </li>
                                        @endif

                                        @if(isset($subSolution)) <!-- Jika sub-solusi ada -->
                                            <li class="breadcrumb-item active" aria-current="page">
                                                {{ $subSolution->nama }}
                                            </li>
                                        @endif
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- breadcrumb-area-end -->
        <!-- services-details-area -->
        <section class="services__details-area">
            <div class="container">
                <div class="services__details-wrap">
                    <div class="row">
                        <div class="col-70 order-0 order-lg-2">
                            <div class="services__details-content services__details-content-two">
                               <div class="project__details-thumb swiper-container slider-project-banner">
                                    <div class="swiper-wrapper">
                                        @if($subSolution && $subSolution->gambar)
                                            @forelse($subSolution->gambar as $gambar)
                                                <div class="swiper-slide">
                                                    <div class="slide-container">
                                                        <img src="{{ asset('storage/' . $gambar->gambar) }}" alt="gambar">

                                                        @if($subSolution->link_3d)
                                                            <a href="{{ $subSolution->link_3d }}"
                                                               class="btn-3d" target="_blank">
                                                               <i class="fas fa-cube me-2"></i> Lihat 3D
                                                            </a>
                                                        @endif
                                                    </div>
                                                </div>
                                            @empty
                                                <div class="swiper-slide">
                                                    <div class="slide-container">
                                                        <img src="{{ asset('asset/img/images/no-image1.png') }}" alt="default">
                                                    </div>
                                                </div>
                                            @endforelse
                                        @else
                                            <div class="swiper-slide">
                                                <div class="slide-container">
                                                    <img src="{{ asset('asset/img/images/no-image1.png') }}" alt="default">
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                    <!--<div class="swiper-pagination swiper-pagination-project"></div>-->
                                </div>

                                @if($subSolution)
                                <span class="project-artikel__details-inner-content">{!! $subSolution->description1 !!}</p>
                                @else
                                <span class="project-artikel__details-inner-content">Sub-solusi tidak ditemukan.</p>
                                @endif

                                <div class="services__details-inner-two services__details-inner-four">
                                    <div class="row gutter-24 align-items-center">
                                        <div class="services__details-list-two">
                                            <div class="row gutter-24">
                                                @if($subSolution && $subSolution->fiturSubSolutions->isNotEmpty())
                                                    @foreach($subSolution->fiturSubSolutions as $fitur)
                                                        <div class="col-md-4">
                                                            <div class="services__details-list-box-two">
                                                                <div class="icon">
                                                                    <img src="{{ asset('storage/' . $fitur->icon) }}" alt="icon">
                                                                </div>
                                                                <div class="content">
                                                                    <h4 class="title">{{ $fitur->nama }}</h4>
                                                                    <p style="color: #2E2E4D;text-align: center;">{{ $fitur->description }}</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                @else
                                                <span class="project-artikel__details-inner-content">Fitur belum tersedia.</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @if($subSolution)
                                <span class="project-artikel__details-inner-content">{!! $subSolution->description2 !!}</span>
                                @else
                                <span class="project-artikel__details-inner-content">Sub-solusi tidak ditemukan.</span>
                                @endif
                                <div class="services__details-inner">
                                    <div class="row gutter-24 align-items-top">
                                        <div class="col-56">
                                            <div class="project__details-inner-content" id="project-description">
                                                @if($subSolution)
                                                <span class="project-artikel__details-inner-content">{!! $subSolution->description3 !!}</span>
                                                @else
                                                <span class="project-artikel__details-inner-content">Sub-solusi tidak ditemukan.</span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-44">
                                            <div class="services__details-inner-img">
                                                @if ($subSolution && $subSolution->video)
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
                                                    <span class="project-artikel__details-inner-content">Invalid YouTube URL</span>
                                                    @endif
                                                @endif
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
                                            @foreach($solution->subSolutions as $subSolution)
                                            <li class="{{ Request::is('solusi/' . Str::slug($solution->nama) . '/' . Str::slug($subSolution->nama)) ? 'active' : '' }}">
                                                <a href="{{ route('solusi.show', [Str::slug($solution->nama), Str::slug($subSolution->nama)]) }}"
                                                    class="px-3 py-2 {{ Request::is('solusi/' . Str::slug($solution->nama) . '/' . Str::slug($subSolution->nama)) ? 'active' : '' }}">
                                                    {{ $subSolution->nama }}
                                                    <i class="flaticon-arrow-button"></i>
                                                </a>
                                            </li>
                                            @endforeach
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
                                    <div class="sidebar__contact sidebar__contact-two" data-background="{{ asset('asset/img/services/KONSUL5.png') }}">
                                        <h2 class="title" style="color:#2E2E4D;">Konsultasi apa saja, kami siap membantu!</h2>
                                        {{-- <a href="tel:0123456789" class="btn"><i class="flaticon-phone-call"></i>+91 705 2101 786</a> --}}
                                        <a href="https://wa.me/628112632151" target="_blank" class="btn"><i class="flaticon-phone-call"></i>+62 811 2632 151</a>
                                    </div>
                                </div>
                            </aside>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- services-details-area-end -->
        <!-- brand-area -->
        <section class="produk_expert__area_six">
            <div class="container">
                <div class="box-video-small">
                    <div class="video-small-left-inner">
                        <div class="video-small-left-1">
                            <h2>Lihat Seri Produk</h2>
                            <p>dan sesuaikan dengan kebutuhan!</p>
                        </div>
                    </div>
                    <div class="produk-shape-wrap">
                        <img src="{{ asset('asset/img/images/Komponen background.png') }}" alt="" data-aos="fade-right" data-aos-delay="400">
                    </div>
                </div>
                <div class="box-video-small_right">
                    <div class="swiper-container produk-slider">
                        <div class="swiper-wrapper">
                            @foreach ($produks as $item)
                                <div class="swiper-slide">
                                    <div>
                                        <a href="{{ route('detail-produk.show', $item->slug) }}" class="produk-item">
                                            <div class="produk-thumb">
                                                <img src="{{ asset('storage/' .$item->gambar_thumbnail_produk) }}" alt="{{ $item->nama_produk }}">
                                            </div>
                                            <div class="produk-content">
                                                <h4 class="title">{{ $item->nama_produk }}</h4>
                                                <div class="deskripsi-content">
                                                    {!! $item->deskripsi_thumbnail !!}
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="box-button-slider-right">
                            <div class="produk__nav-four">
                                <div class="produk-two-button-prev button-swiper-prev"><svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-chevron-right"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M9 6l6 6l-6 6" /></svg></i></div>
                                <div class="produk-two-button-next button-swiper-next"><svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-chevron-right"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M9 6l6 6l-6 6" /></svg></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="produk_expert-shape-wrap">
                <img src="{{ asset('asset/img/images/Produkbackground.png') }}" alt="" data-aos="fade-right" data-aos-delay="400">
            </div>
        </section>
        <section class="blog__post-area-four">
            <div class="container">
                <div class="row justify-content-center">

                </div>
                <div class="row justify-content-center">

                </div>
            </div>
        </section>
        <!-- brand-area -->
        <!--<script>-->
        <!--    document.addEventListener('DOMContentLoaded', () => {-->
        <!--        new Swiper('.produk-slider', {-->
        <!--            slidesPerView: 1,-->
        <!--            spaceBetween: 20,-->
        <!--            loop: true,-->
        <!--            autoplay: {-->
        <!--                delay: 3000,-->
        <!--                disableOnInteraction: false,-->
        <!--            },-->
        <!--            navigation: {-->
        <!--                prevEl: '.button-swiper-prev',-->
        <!--                nextEl: '.button-swiper-next',-->
        <!--            },-->
        <!--            breakpoints: {-->
        <!--                640: { slidesPerView: 1 },-->
        <!--                992: { slidesPerView: 1 },-->
        <!--                1024: { slidesPerView: 2 },-->
        <!--                1500: { slidesPerView: 3 },-->
        <!--            },-->
        <!--        });-->
        <!--    });-->
        <!--</script>-->
        <script>
            document.addEventListener('DOMContentLoaded', () => {
                const swiperContainer = document.querySelector('.produk-slider');
                const slides = swiperContainer.querySelectorAll('.swiper-slide');
                const slideCount = slides.length;
                const navButtons = document.querySelector('.produk__nav-four');
                const screenWidth = window.innerWidth;

                // Default nilai
                let slidesPerView = 1;
                let loopMode = false; // <- Default loop: OFF

                if (screenWidth >= 1500) {
                    slidesPerView = Math.min(3, slideCount);
                    loopMode = slideCount > 3; // Loop hanya kalau slide lebih dari 3
                } else if (screenWidth >= 1024) {
                    slidesPerView = Math.min(2, slideCount);
                    loopMode = slideCount > 2; // Boleh diatur juga kalau mau
                } else {
                    slidesPerView = 1;
                    loopMode = slideCount > 1;
                }

                if (slideCount >= slidesPerView) {
                    // Inisialisasi Swiper
                    new Swiper('.produk-slider', {
                        slidesPerView: slidesPerView,
                        spaceBetween: 20,
                        loop: loopMode,   // ЁЯЫая╕П Loop aktif atau tidak tergantung jumlah
                        autoplay: loopMode ? {   // ЁЯЫая╕П Autoplay juga nyala hanya kalau loop nyala
                            delay: 3000,
                            disableOnInteraction: false,
                        } : false,
                        navigation: {
                            prevEl: '.button-swiper-prev',
                            nextEl: '.button-swiper-next',
                        },
                        breakpoints: {
                            640: { slidesPerView: Math.min(1, slideCount) },
                            992: { slidesPerView: Math.min(1, slideCount) },
                            1024: { slidesPerView: Math.min(2, slideCount) },
                            1500: { slidesPerView: Math.min(3, slideCount) },
                        },
                    });
                } else {
                    // Kalau tidak pakai slider
                    // navButtons?.classList.add('d-none');
                }
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
        <!--<script>-->
        <!--    // Inisialisasi Swiper-->
        <!--    document.addEventListener('DOMContentLoaded', () => {-->
        <!--        new Swiper('.slider-project-banner', {-->
        <!--            loop: true, // Loop untuk memutar gambar-->
        <!--            pagination: {-->
        <!--                el: '.swiper-pagination-project',-->
        <!--                clickable: true,-->
        <!--            },-->
        <!--            speed: 1000,-->
        <!--            autoplay: {-->
        <!--                delay: 3000,-->
        <!--            },-->
        <!--            slidesPerView: 1,-->
        <!--            breakpoints: {-->
        <!--                768: {-->
        <!--                    slidesPerView: 1,-->
        <!--                },-->
        <!--                1024: {-->
        <!--                    slidesPerView: 1,-->
        <!--                }-->
        <!--            }-->
        <!--        });-->
        <!--    });-->
        <!--</script>-->
        <script>
            document.addEventListener("DOMContentLoaded", function () {
                let produkItems = document.querySelectorAll(".produk-item");
                let maxHeight = 0;

                // Cari tinggi maksimal dari semua produk-item
                produkItems.forEach(item => {
                    let height = item.offsetHeight;
                    if (height > maxHeight) {
                        maxHeight = height;
                    }
                });

                // Terapkan tinggi maksimal ke semua produk-item
                produkItems.forEach(item => {
                    item.style.height = maxHeight + "px";
                });
            });
        </script>
@endsection
