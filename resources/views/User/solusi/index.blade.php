@extends('User.layouts.app')
@section('title', 'Solusi | BE Profile')
@section('content')
        <!-- breadcrumb-area -->
        <section class="breadcrumb__area breadcrumb__bg" data-background="{{ asset('asset/img/project/bg.png') }}">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="breadcrumb__content">
                            <h2 class="title">Solusi</h2>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/">Beranda</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Solusi</li>
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
                                        {{-- @forelse($subSolution->gambar as $gambar) --}}
                                            {{-- <div class="swiper-slide">
                                                <img src="{{ asset('storage/' . $gambar->gambar) }}" alt="gambar">
                                            </div> --}}
                                        {{-- @empty --}}
                                            <div class="swiper-slide">
                                                <img style="width: 100%;height: 480px;" src="{{ asset('asset/img/images/no-image1.png') }}" alt="default">
                                            </div>
                                        {{-- @endforelse --}}
                                    </div>
                                    <div class="swiper-pagination swiper-pagination-project"></div>
                                </div>
                                @if($subSolution)
                                    <p>{!! $subSolution->description1 !!}</p>
                                    <p>{{ $subSolution->description2 }}</p>
                                @else
                                    <p>Sub-solusi tidak ditemukan.</p>
                                @endif

                                <div class="services__details-inner-two services__details-inner-four">
                                    <div class="row gutter-24 align-items-center">
                                        <div class="services__details-list-two">
                                            <div class="row gutter-24">
                                                @if($subSolution->fiturSubSolutions->isNotEmpty())
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
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <p class="last-info">when an unknown printer took a galley of type and scrambled it to make a type specimen bookhas survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchan galley of type and scrambled it to make a type specimen book.when an unknown printer took a galley of type and scrambled it to make a type specimen bookhas survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchan galle.</p>
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
                                <div class="sidebar__widget sidebar__widget-three">
                                    <h4 class="sidebar__widget-title">Unduh Brosur</h4>
                                    <div class="sidebar__brochure sidebar__brochure-two">
                                        {{-- <p>when an unknown printer took ga lley offer typey anddey.</p> --}}
                                        <a href="" target="_blank" download>Unduh PDF</a>
                                        <a href="" target="_blank" download>Unduh TKDN</a>
                                    </div>
                                </div>
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
        <!-- brand-area -->
        <div class="brand__area-six">
            <div class="container">
                <div class="swiper-container brand-active">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <div class="brand-item">
                                <img src="assets/img/brand/brand_img01.png" alt="">
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="brand-item">
                                <img src="assets/img/brand/brand_img02.png" alt="">
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="brand-item">
                                <img src="assets/img/brand/brand_img03.png" alt="">
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="brand-item">
                                <img src="assets/img/brand/brand_img04.png" alt="">
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="brand-item">
                                <img src="assets/img/brand/brand_img05.png" alt="">
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="brand-item">
                                <img src="assets/img/brand/brand_img06.png" alt="">
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="brand-item">
                                <img src="assets/img/brand/brand_img03.png" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- brand-area -->
@endsection
