<!-- resources/views/User/publikasi/searchall.blade.php -->
@extends('User.layouts.app')
@section('title', 'Beacon Search | BE Profile')
@section('content')
    <!-- breadcrumb-area -->
    <section class="breadcrumb__area breadcrumb__bg" data-background="{{ asset('asset/img/project/bg.png') }}">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="breadcrumb__content">
                        <h2 class="title">Beacon Search</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/">Beranda</a></li>
                                <li class="breadcrumb-item"><a href="/publikasi">Publikasi</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Beacon Search</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb-area-end -->
    <!-- blog-area -->
    <section class="services-area services-bg" data-background="{{ asset('asset/img/bg/bg5.png') }}">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-6 col-lg-8">
                    <div class="section-title text-center mb-40 tg-heading-subheading animation-style3">
                        <h2 class="title tg-element-title mb-3">Beacon Hari Ini</h2>
                        <span class="mb-5" style="font-size:20px;font-weight: 300;color:#2E2E4D">Tambah wawasan soal teknologi telemetri dan berkembang bersama Beacon Engineering mulai hari ini!</span>
                    </div>
                </div>
            </div>
            <div class="services-item-wrap">
                <div class="row justify-content-center">
                    <div class="publikasi__search">
                        <form action="{{ route('searchall') }}" method="GET">
                            <input type="text" name="query" placeholder="Cari artikel atau kata kunci soal IT dan Telemetri" value="{{ request('query') }}" required>
                            <button type="submit">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="none">
                                    <path d="M19.0002 19.0002L14.6572 14.6572M14.6572 14.6572C15.4001 13.9143 15.9894 13.0324 16.3914 12.0618C16.7935 11.0911 17.0004 10.0508 17.0004 9.00021C17.0004 7.9496 16.7935 6.90929 16.3914 5.93866C15.9894 4.96803 15.4001 4.08609 14.6572 3.34321C13.9143 2.60032 13.0324 2.01103 12.0618 1.60898C11.0911 1.20693 10.0508 1 9.00021 1C7.9496 1 6.90929 1.20693 5.93866 1.60898C4.96803 2.01103 4.08609 2.60032 3.34321 3.34321C1.84288 4.84354 1 6.87842 1 9.00021C1 11.122 1.84288 13.1569 3.34321 14.6572C4.84354 16.1575 6.87842 17.0004 9.00021 17.0004C11.122 17.0004 13.1569 16.1575 14.6572 14.6572Z" stroke="currentcolor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="blog__area">
        <div class="container">
            <div class="blog__inner-wrap">
                <div class="row">
                    <div class="col-100">
                        <div class="blog-post-wrap">
                            <div class="row">
                                <div class="col-lg-12 col-md-6">
                                    @if($artikels->isEmpty())
                                        <div class="col-12 text-center">
                                            <p class="text-muted">Tidak ada hasil ditemukan.</p>
                                        </div>
                                    @else
                                        @foreach($artikels as $artikel)
                                            <div class="flex flex-row services__item-three row space-between relative"
                                                onclick="window.location='{{ route('publikasi.show', $artikel->slug) }}'"
                                                style="cursor: pointer;">
                                                <div class="service-content col-lg-7">
                                                    <div class="services__item-top">
                                                        <div class="services__item-top-title">
                                                            <h4 class="title mil-up">
                                                                {{ $artikel->judul }}
                                                            </h4>
                                                            <ul class="list-wrap" style="display: flex; align-items: center; gap: 10px; list-style: none; padding: 0; margin-top: 20px;">
                                                                <li>
                                                                    <btn class="blog-publikasi__post-tag-two" style="white-space: nowrap;">
                                                                        {{ $artikel->kategoriTopik->nama ?? 'Tanpa Kategori' }}
                                                                    </btn>
                                                                </li>
                                                                <li style="display: flex; align-items: center; gap: 5px;">
                                                                    <img src="{{ asset('asset/img/icon/Calendar.png') }}" alt="" style="width: 16px; height: 16px;">
                                                                    <span style="color:#2E2E4D;">{{ $artikel->created_at->translatedFormat('l, d F Y') }}</span>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="services__content-three">
                                                        <p class="mil-up">
                                                            <a href="{{ route('publikasi.show', $artikel->slug) }}" style="text-decoration: none; color: inherit;">
                                                                {!! Str::limit(strip_tags($artikel->konten), 200, '...') !!}
                                                            </a>
                                                        </p>
                                                    </div>
                                                </div>

                                                <div class="col-lg-4 service-img-container">
                                                    <div class="service-img">
                                                        <a href="{{ route('publikasi.show', $artikel->slug) }}">
                                                            <img src="{{ asset('storage/' . $artikel->thumbnail) }}" alt="{{ $artikel->judul }}">
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                                @if($artikels->hasPages())
                                <div class="pagination-wrap mt-40 d-flex justify-content-center">
                                    {{ $artikels->links('vendor.pagination.bootstrap-4') }}
                                </div>
                            @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
