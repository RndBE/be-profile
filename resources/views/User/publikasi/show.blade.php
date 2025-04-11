@extends('User.layouts.app')
@section('title', 'Detail Artikel | BE Profile')
@section('content')
    <!-- breadcrumb-area -->
    <section class="breadcrumb__area breadcrumb__bg" data-background="{{ asset('asset/img/project/bg.png') }}">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="breadcrumb__content">
                        <h2 class="title">Detail Artikel</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/">Beranda</a></li>
                                <li class="breadcrumb-item"><a href="/publikasi">Publikasi</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Detail Artikel</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="project__details-area">
        <div class="container">
            <div class="services__details-wrap">
                <div class="row">
                    <div class="col-30 order-0 order-lg-2">
                        <aside class="services__sidebar">
                            <div class="sidebar__widget sidebar__widget-two">
                                <div class="sidebar__search">
                                    <form action="{{ route('searchall') }}" method="GET">
                                        <input type="text" name="query" placeholder="Cari artikel atau kata kunci soal IT dan Telemetri" required>
                                        <button type="submit">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="none">
                                                <path d="M19.0002 19.0002L14.6572 14.6572M14.6572 14.6572C15.4001 13.9143 15.9894 13.0324 16.3914 12.0618C16.7935 11.0911 17.0004 10.0508 17.0004 9.00021C17.0004 7.9496 16.7935 6.90929 16.3914 5.93866C15.9894 4.96803 15.4001 4.08609 14.6572 3.34321C13.9143 2.60032 13.0324 2.01103 12.0618 1.60898C11.0911 1.20693 10.0508 1 9.00021 1C7.9496 1 6.90929 1.20693 5.93866 1.60898C4.96803 2.01103 4.08609 2.60032 3.34321 3.34321C1.84288 4.84354 1 6.87842 1 9.00021C1 11.122 1.84288 13.1569 3.34321 14.6572C4.84354 16.1575 6.87842 17.0004 9.00021 17.0004C11.122 17.0004 13.1569 16.1575 14.6572 14.6572Z" stroke="currentcolor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                            </svg>
                                        </button>
                                    </form>
                                </div>
                            </div>
                            <div class="sidebar__widget px-3 py-3">
                                <h4 class="sidebar-publikasi__widget-title">Terkait</h4>
                                <div class="sidebar__post-list">
                                    @foreach ($artikels_list as $artikellist)
                                        <div class="sidebar__post-item" onclick="window.location='{{ route('publikasi.show', $artikellist->slug) }}'"
                                            style="cursor: pointer;">
                                            <div class="sidebar__post-content">
                                                <div class="blog-post-meta">
                                                    <ul class="list-wrap">
                                                        <li><span class="blog-artikel__post-tag-two">
                                                            {{ $artikellist->kategoriTopik->nama ?? 'Uncategorized' }}
                                                        </span></li>
                                                        <li style="font-size: 13px"><img src="{{ asset('asset/img/icon/Calendar.png') }}" alt="" style="width: 16px; height: 16px;">
                                                            {{ \Carbon\Carbon::parse($artikellist->tanggal_publikasi)->locale('id')->translatedFormat('l, d F Y') }}
                                                        </li>
                                                    </ul>
                                                </div>
                                                <h2 class="title">
                                                    <a href="{{ route('publikasi.show', $artikellist->slug) }}">{{ $artikellist->judul }}</a>
                                                </h2>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </aside>
                    </div>
                    <div class="col-70">
                        <div class="services__details-content services__details-content-two">
                            <div class="project__details-thumb swiper-container slider-project-banner">
                                <div class="swiper-wrapper">
                                    @forelse($artikel->gambar as $gambar)
                                        <div class="swiper-slide">
                                            <img src="{{ asset('storage/' . $gambar->gambar) }}" alt="gambar">
                                        </div>
                                    @empty
                                        <div class="swiper-slide">
                                            <img style="width: 100%;height: 600px;" src="{{ asset('asset/img/images/no-image1.png') }}" alt="default">
                                        </div>
                                    @endforelse
                                </div>
                                <div class="swiper-pagination swiper-pagination-project"></div>
                            </div>
                            <div class="blog__details-content">
                                <h2 class="title">{{ $artikel->judul ?? null }}</h2>
                                <div class="blog-post-meta">
                                    <ul class="list-wrap" style="display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap;">
                                        <li>
                                            <span class="blog__post-tag-two">{{ $artikel->kategoriTopik->nama ?? null }}</span>
                                        </li>
                                        <li style="display: flex; align-items: center;">
                                            <img src="{{ asset('asset/img/icon/Calendar.png') }}" alt="Calendar Icon" style="margin-right: 5px;">
                                            {{ \Carbon\Carbon::parse($artikel->tanggal_publikasi)->locale('id')->translatedFormat('l, d F Y') }}
                                        </li>
                                        <li style="display: flex; align-items: center; margin-left: auto;">
                                            <div style="display: flex; align-items: center;">
                                                <span style="margin-right: 10px;">Bagikan:</span>
                                                <a href="https://api.whatsapp.com/send?text={{ urlencode("*".$artikel->judul."*" . "\n\nKlik untuk baca: \n" . route('artikel.show', $artikel->slug)) }}" target="_blank">
                                                    <img src="{{ asset('asset/img/icon/WhatsApp.png') }}" alt="Bagikan ke WhatsApp">
                                                </a>

                                                <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(route('artikel.show', $artikel->slug)) }}" target="_blank">
                                                    <img src="{{ asset('asset/img/icon/Facebook.png') }}" alt="Bagikan ke Facebook">
                                                </a>

                                                <a id="copyButton" data-bs-toggle="tooltip" data-bs-placement="top" title="Click to copy URL" class="copy-link" data-link="{{ route('artikel.show', $artikel->slug) }}">
                                                    <img src="{{ asset('asset/img/icon/Link.png') }}" alt="Salin Link">
                                                </a>
                                            </div>
                                        </li>
                                    </ul>
                                </div>

                            </div>
                            <div class="project-artikel__details-inner-content">
                                {!! $artikel->konten !!}
                                {{-- <img src="{{ asset('storage/uploads/nama_gambar.jpg') }}"> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/clipboard.js/2.0.8/clipboard.min.js"></script>
    <script>
      document.addEventListener("DOMContentLoaded", function () {
        // Initialize tooltip
        var tooltipTriggerList = [].slice.call(
          document.querySelectorAll('[data-bs-toggle="tooltip"]')
        );
        var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
          return new bootstrap.Tooltip(tooltipTriggerEl);
        });

        // Copy URL to clipboard
        var copyButton = document.getElementById("copyButton");
        copyButton.addEventListener("click", function () {
          var url = window.location.href;

          var clipboard = new ClipboardJS(copyButton, {
            text: function () {
              return url;
            },
          });

          clipboard.on("success", function (e) {
            e.clearSelection();
            copyButton.setAttribute("data-bs-original-title", "URL copied!");
            var tooltip = bootstrap.Tooltip.getInstance(copyButton);
            tooltip.update();
            tooltip.show();
            clipboard.destroy();

            // メッセージの表示時間を設定
            setTimeout(function () {
              copyButton.setAttribute(
                "data-bs-original-title",
                "Click to copy URL"
              );
              tooltip.update();
              tooltip.hide();
            }, 2000);
          });

          clipboard.on("error", function () {
            copyButton.setAttribute(
              "data-bs-original-title",
              "Failed to copy URL. Please manually copy the URL."
            );
            var tooltip = bootstrap.Tooltip.getInstance(copyButton);
            tooltip.update();
            tooltip.show();
            clipboard.destroy();

            // メッセージの表示時間を設定
            setTimeout(function () {
              copyButton.setAttribute(
                "data-bs-original-title",
                "Click to copy URL"
              );
              tooltip.update();
              tooltip.hide();
            }, 2000);
          });

          clipboard.onClick(event);
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
