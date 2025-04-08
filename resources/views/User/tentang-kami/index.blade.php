@extends('User.layouts.app')
@section('title', 'Tentang Kami | BE Profile')
@section('content')
        <!-- breadcrumb-area -->
        <section class="breadcrumb__area breadcrumb__bg" data-background="{{ asset('asset/img/project/bg.png') }}">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="breadcrumb__content">
                            <h2 class="title">Tentang Kami</h2>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/">Beranda</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Tentang Kami</li>
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
                    <div class="col-lg-6 col-md-9">
                        <div class="choose__img-wrap-five">
                            <div class="icon">
                                @if($tentangKami)
                                    @if($tentangKami->gambar_satu)
                                        <img src="{{ asset('storage/' . $tentangKami->gambar_satu) }}" alt="Gambar Satu">
                                    @endif
                                    @if($tentangKami->gambar_dua)
                                        <img src="{{ asset('storage/' . $tentangKami->gambar_dua) }}" alt="Gambar Dua">
                                    @endif
                                @else
                                    <p>Tidak ada gambar yang tersedia.</p>
                                @endif
                            </div>
                            <div class="img-shape">
                                <img src="{{ asset('asset/img/images/testimonial_shape1.png') }}" alt="">
                                <img src="{{ asset('asset/img/images/testimonial_shape2.png') }}" alt="" class="alltuchtopdown">
                            </div>
                        </div>
                        <div class="choose__list">
                            <ul class="list-wrap">
                                <li>
                                    <div class="icon">
                                        <img src="{{ asset('asset/img/icon/Online acess.png') }}" alt="">
                                    </div>
                                    <div class="content">
                                        <h4 class="title">100%</h4>
                                        <p style="color:#2E2E4D">DATA ONLINE</p>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="choose__content-five">
                            <div class="section-title mb-30 tg-heading-subheading animation-style3">
                                <span class="sub-title" style="color: rgba(180, 4, 4, 0.75);">MENGENAL LEBIH JAUH BEACON ENGINEERING</span>
                                <h2 class="title tg-element-title">Kami menyediakan solusi berupa penyediaan perangkat telemetri</h2>
                            </div>
                            <div class="about__content-inner-five">
                                <div class="about__list-box">
                                    <ul class="list-wrap">
                                        <li><i class="flaticon-arrow-button"></i>Menyajikan data akurasi tinggi</li>
                                        <li><i class="flaticon-arrow-button"></i>Monitoring realtime 24 jam</li>
                                        <li><i class="flaticon-arrow-button"></i>Akses data 100% online</li>
                                    </ul>
                                </div>
                            </div>
                            <p style="text-align: justify;color:#2E2E4D">
                                Dengan keunggulan tersebut, perangkat telemetri dapat membantu berbagai bidang mulai dari masalah keamanan air, klimatologi, hidrologi, irigasi, geothermal, hingga geoteknik.
                            </p>
                            <div class="about-bottom">
                                <a href="https://wa.me/628112632151" target="_blank" class="btn btn-two" style="margin-top:50px;">
                                    Kontak Kami
                                </a>
                            </div>
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
                        <div class="komitmen__content-five">
                            <span class="sub-title" style="color: rgba(180, 4, 4, 0.75);">KOMITMEN DAN TUJUAN KAMI</span>
                            <h2 class="title tg-element-title">Memberikan peran nyata dalam memajukan Indonesia</h2>

                            <p style="text-align: justify;color:#2E2E4D">melalui upaya profesional dan kreatif dalam pengembangan teknologi telemetri pintar.</p>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="komitmen__list">
                            <ul class="list-wrap">
                                <li>
                                    <div class="icon">
                                        <img src="{{ asset('asset/img/icon/garansi1.png') }}" alt="">
                                    </div>
                                    <div class="content">
                                        <h4 class="title">KUALITAS PRODUK TERBAIK</h4>
                                        <p style="text-align: justify;color:#2E2E4D">Memberikan kualitas produk dan layanan terbaik, dengan harga bersaing.</p>
                                    </div>
                                </li>
                            </ul>
                            <ul class="list-wrap">
                                <li>
                                    <div class="icon">
                                        <img src="{{ asset('asset/img/icon/garansi2.png') }}" alt="">
                                    </div>
                                    <div class="content">
                                        <h4 class="title">SUMBER DAYA MANUSIA UNGGUL</h4>
                                        <p style="text-align: justify;color:#2E2E4D">Mengelola bisnis berdasarkan SDM yang unggul, menggunakan teknologi terkini, dan membangun kerja sama yang menguntungkan.</p>
                                    </div>
                                </li>
                            </ul>
                            <ul class="list-wrap">
                                <li>
                                    <div class="icon">
                                        <img src="{{ asset('asset/img/icon/garansi3.png') }}" alt="">
                                    </div>
                                    <div class="content">
                                        <h4 class="title">RISET DAN INOVASI BERKELANJUTAN</h4>
                                        <p style="text-align: justify;color:#2E2E4D">Membangun riset dan inovasi berkelanjutan untuk menghasilkan produk yang sesuai dengan kebutuhan klien</p>
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
                <span class="sub-title" style="color: rgba(180, 4, 4, 0.75);font-weight: 600;">TIM LEADER</span>
                <h2 class="title">Dibalik Inovasi Telemetri <span style="color: rgba(180, 4, 4, 0.75);">Beacon</span> Engineering</h2>
            </div>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="row justify-content-center position-relative">
                        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-8">
                            <div class="team__item-four shine-animate-item">
                                <div class="team__thumb-four shine-animate">
                                    <div class="text_direktur">
                                        <h2 class="text_direktur-title">SOFYAN ARIYANTO, S.T.</h2>
                                        <div class="sub-title">
                                            <span>Direktur</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-8">
                            <div class="team__item-four shine-animate-item">
                                <div class="team__thumb-four shine-animate">
                                    @if($tentangKami)
                                        @if($tentangKami->gambar_direktur)
                                            <img src="{{ asset('storage/' . $tentangKami->gambar_direktur) }}" alt="Gambar Direktur">
                                        @endif
                                    @else
                                        <p>Tidak ada gambar yang tersedia.</p>
                                    @endif
                                </div>
                                <div class="team__content-four_direktur">
                                    <h2 class="title">SOFYAN ARIYANTO, S.T.</h2>
                                    <span>Direktur</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-8">
                            <div class="team__item-four shine-animate-item">
                                <div class="team__thumb-four shine-animate">
                                    @if($tentangKami)
                                        @if($tentangKami->gambar_komisaris)
                                            <img src="{{ asset('storage/' . $tentangKami->gambar_komisaris) }}" alt="Gambar Komisaris">
                                        @endif
                                    @else
                                        <p>Tidak ada gambar yang tersedia.</p>
                                    @endif
                                </div>
                                <div class="team__content-four_direktur">
                                    <h2 class="title">RADEN TARJADI</h2>
                                    <span>Komisaris</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-8">
                            <div class="team__item-four shine-animate-item">
                                <div class="team__thumb-four shine-animate">
                                    <div class="text_komisaris">
                                        <h2 class="text_komisaris-title">RADEN TARJADI</h2>
                                        <div class="sub-title">
                                            <span>Komisaris</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="team__content-four-direksi">
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-8">
                        <div class="team__item-four shine-animate-item">
                            <div class="team__thumb-four shine-animate">
                                @if($tentangKami)
                                    @if($tentangKami->gambar_administrasi)
                                        <img src="{{ asset('storage/' . $tentangKami->gambar_administrasi) }}" alt="Gambar Manager Administrasi">
                                    @endif
                                @else
                                    <p>Tidak ada gambar yang tersedia.</p>
                                @endif
                            </div>
                            <div class="team__content-four">
                                <h2 class="title">WAHYU N. H, S.T.</h2>
                                <span>Manager Administrasi</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-8">
                        <div class="team__item-four shine-animate-item">
                            <div class="team__thumb-four shine-animate">
                                @if($tentangKami)
                                    @if($tentangKami->gambar_marketing)
                                        <img src="{{ asset('storage/' . $tentangKami->gambar_marketing) }}" alt="Gambar Manager Administrasi">
                                    @endif
                                @else
                                    <p>Tidak ada gambar yang tersedia.</p>
                                @endif
                            </div>
                            <div class="team__content-four">
                                <h2 class="title">SONNIE TRIYONO, S.IP, MM.</h2>
                                <span>Manager Marketing</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-8">
                        <div class="team__item-four shine-animate-item">
                            <div class="team__thumb-four shine-animate">
                                @if($tentangKami)
                                    @if($tentangKami->gambar_hardware)
                                        <img src="{{ asset('storage/' . $tentangKami->gambar_hardware) }}" alt="Gambar Manager Hardware">
                                    @endif
                                @else
                                    <p>Tidak ada gambar yang tersedia.</p>
                                @endif
                            </div>
                            <div class="team__content-four">
                                <h2 class="title">M. SUBARKAH, S.T.</h2>
                                <span>Manager Hardware</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-8">
                        <div class="team__item-four shine-animate-item">
                            <div class="team__thumb-four shine-animate">
                                @if($tentangKami)
                                    @if($tentangKami->gambar_software)
                                        <img src="{{ asset('storage/' . $tentangKami->gambar_software) }}" alt="Gambar Manager Software">
                                    @endif
                                @else
                                    <p>Tidak ada gambar yang tersedia.</p>
                                @endif
                            </div>
                            <div class="team__content-four">
                                <h2 class="title">NOFIYANTO, S.T.</h2>
                                <span>Manager Software</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="about-bottom" style="justify-content: center">
                <a href="https://wa.me/628112632151" target="_blank" class="btn btn-two" style="margin-top:100px;">
                    Konsultasi gratis sekarang!
                </a>
            </div>

        </section>
        <!-- team-area-end -->
@endsection


