@extends('User.layouts.app')
@section('title', 'Bandingkan Perangkat | Beacon Engineering')
@section('description', 'Temukan spesifikasi terbaik untuk solusi terbaik. Pilih Kategori Perangkat, Pilih produk untuk dibandingkan!')
@section('image', asset('asset/img/project/bg.png'))

@section('content')
        <!-- breadcrumb-area -->
        <section class="breadcrumb__area breadcrumb__bg" data-background="{{ asset('asset/img/project/bg.png') }}">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="breadcrumb__content">
                            <h2 class="title">Bandingkan Perangkat</h2>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/">Beranda</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Bandingkan Perangkat</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        @livewire('bandingkan-perangkat')

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


