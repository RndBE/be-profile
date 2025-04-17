@extends('User.layouts.app')
{{-- @section('title', 'Testimoni | BE Profile') --}}

@section('content')
    <!-- banner-area -->
    <section class="w-screen" id="home">
        <div class="row">
            <div class="col-12">
                <div class="swiper-container slider-homepage-banner">
                    <div class="swiper-wrapper">
                        @foreach ($carousels as $carousel)
                        <div class="swiper-slide">
                            <section class="banner-area banner-bg" data-background="{{ asset('storage/' . $carousel->gambar) }}">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="banner-content">
                                                <span class="sub-title" data-aos="fade-up" data-aos-delay="0">Selamat datang di Beacon Engineering!</span>
                                                <h2 class="title" data-aos="fade-up" data-aos-delay="200">{!! $carousel->judul !!}</h2>
                                                <p class="sub_judul" data-aos="fade-up" data-aos-delay="400">{{ $carousel->sub_judul }}</p>
                                                <a href="#services" class="btn" data-aos="fade-up" data-aos-delay="600">Pelajari selengkapnya!</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- banner-area-end -->
    <!-- brand-area -->
    <div class="brand-area">
        <div class="container">
            <div class="swiper-container brand-active">
                <div class="swiper-wrapper">
                    @foreach ($kliens as $klien)
                        <div class="swiper-slide">
                            <div class="brand-item">
                                <img loading="lazy" src="{{ asset('storage/' . $klien->logo) }}" alt="{{ $klien->nama }}">
                            </div>
                            <div>
                                <p>{{ $klien->nama_perusahaan }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <!-- brand-area -->
    <!-- services-area -->
    <section id="services" class="services-area services-bg" data-background="{{ asset('asset/img/bg/bg1.png') }}">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-6 col-lg-8">
                    <div class="section-title text-center mb-40 tg-heading-subheading animation-style3">
                        <span class="sub-title">APA YANG KAMI LAKUKAN?</span>
                        <h2 class="title tg-element-title">Berkontribusi pada negeri dengan solusi analisis data yang <span class="highlight-red">presisi</span>.</h2>
                    </div>
                </div>
            </div>
            <div class="services-item-wrap">
                <div class="row justify-content-center">
                    @foreach($solutionss as $solution)
                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-8">
                        <a href="{{ route('solusi.show', Str::slug($solution->nama)) }}" class="services-link">
                            <div class="services-item shine-animate-item">
                                <div class="services-thumb">
                                    <img loading="lazy" src="{{ asset('asset/img/images/Topologi.png') }}" alt="">
                                </div>
                                <div class="services-content">
                                    <div class="icon">
                                        <img loading="lazy" src="{{ asset('asset/img/images/Topologi.png') }}" alt="">
                                    </div>
                                    <h4 class="title">{{ $solution->nama }}</h4>
                                    <p>{{ $solution->description }}</p>
                                    <span class="btn">Pelajari</span>
                                </div>
                            </div>
                        </a>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <!-- services-area-end -->
    <style>
        .topology-diagram {
            font-family: Arial, sans-serif;
            text-align: center;
            color: #2b2b2b;
            position: relative;
        }
        .cloud-section {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 10px;
            position: relative;
            flex-wrap: wrap;
        }
        .devices {
            width: 25%;
            position: relative;
        }
        .devices ul {
            list-style: none;
            padding: 0;
        }
        .devices li{
            background: #2e2e4d;
            color: #fff;
            padding: 8px 12px;
            margin: 12px 0;
            border-radius: 6px;
            font-size: 12px;
            position: relative;
            height: 70px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-align: center;
        }

        .devices li a{
            background: #2e2e4d;
            color: #fff;
            padding: 8px 12px;
            margin: 12px 0;
            border-radius: 6px;
            font-size: 12px;
            position: relative;
            height: 70px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-align: center;
        }

        .cloud {
            width: 35%;
            position: relative;
        }
        .cloud img {
            max-width: 100%;
            height: auto;
        }
        .monitoring img {
            max-width: 20%;
            height: auto;
        }
        .desc {
            font-size: 13px;
            max-width: 700px;
            margin: 0px auto;
            color: #333;
            margin-bottom: 20px;
        }

        .devices.left {
            position: relative;
        }

        .devices.left::before {
            content: "";
            position: absolute;
            top: 20px;
            right: -40px;
            width: 2px;
            height: 79%;
            background-color: #2e2e4d;
            z-index: -1;
        }

        .devices.left::after {
            content: "";
            position: absolute;
            top: 0;
            right: -58px;
            width: 20px;
            height: 20px;
            border-bottom: 2px solid #2e2e4d;
            border-right: 2px solid #2e2e4d;
            border-bottom-right-radius: 20px;
            background: none;
            z-index: -1;
            transform: rotate(-90deg) scaleY(-1);
        }

        .devices.left .arrow-up {
            content: "";
            position: absolute;
            top: -2px;
            right: -65px;
            width: 0;
            height: 0;
            border-left: 5px solid transparent;
            border-right: 5px solid transparent;
            border-bottom: 6px solid #2e2e4d;
            z-index: -1;
            transform: rotate(90deg)
        }

        .devices.left li::before {
            content: "";
            position: absolute;
            top: 50%;
            right: -10px;
            width: 10px;
            height: 10px;
            background-color: #2e2e4d;
            border-radius: 50%;
            transform: translateY(-50%);
            z-index: 1;
        }
        .devices.left li::after {
            content: "";
            position: absolute;
            top: 38%;
            right: -40px;
            width: 40px;
            height: 20px;
            background: none;
            border-top: 2px solid #2e2e4d;
            border-right: 2px solid #2e2e4d;
            border-top-right-radius: 20px;
            transform: translateY(-50%) scaleY(-1);
        }

        .devices.right {
            position: relative;
        }

        .devices.right::before {
            content: "";
            position: absolute;
            top: 20px;
            left: -40px;
            width: 2px;
            height: 80%;
            background-color: #2e2e4d;
            z-index: -1;
        }

        .devices.right::after {
            content: "";
            position: absolute;
            top: 0;
            left: -58px;
            width: 20px;
            height: 20px;
            border-bottom: 2px solid #2e2e4d;
            border-left: 2px solid #2e2e4d;
            border-bottom-left-radius: 20px;
            background: none;
            z-index: -1;
            transform: rotate(90deg) scaleY(-1);
        }

        .devices.right .arrow-up {
            content: "";
            position: absolute;
            top: -2px;
            left: -65px;
            width: 0;
            height: 0;
            border-left: 5px solid transparent;
            border-right: 5px solid transparent;
            border-top: 6px solid #2e2e4d;
            z-index: -1;
            transform: rotate(90deg);
        }

        .devices.right li::before {
            content: "";
            position: absolute;
            top: 55%;
            left: -10px;
            width: 10px;
            height: 10px;
            background-color: #2e2e4d;
            border-radius: 50%;
            transform: translateY(-50%);
            z-index: 1;
        }

        .devices.right li::after {
            content: "";
            position: absolute;
            top: 40%;
            left: -40px;
            width: 40px;
            height: 20px;
            background: none;
            border-top: 2px solid #2e2e4d;
            border-left: 2px solid #2e2e4d;
            border-top-left-radius: 20px;
            transform: translateY(-50%) scaleY(-1);
        }

        /* Mobile responsive */
        @media (max-width: 834px) {
            .cloud-section {
                flex-direction: column-reverse;
            }

            .devices, .cloud {
                width: 90%;
            }

            .cloud img {
                max-width: 50%;
                height: auto;
            }

            .cloud {
                order: 0; /* tampilkan cloud di atas */
            }

            .devices.left {
                order: -1; /* di bawah cloud */
            }

            .devices.right {
                order: -1; /* paling bawah */
            }

            .monitoring img {
                max-width: 40%;
                height: auto;
            }

            .devices.left {
                position: relative;
            }

            .devices.left::before {
                content: "";
                position: absolute;
                top: -880px;
                right: -20px;
                width: 2px;
                height: 1240px;
                background-color: #2e2e4d;
                z-index: -1;
            }

            .devices.left::after {
                content: "";
                position: absolute;
                top: -898px;
                right: -20px;
                width: 20px;
                height: 20px;
                border-bottom: 2px solid #2e2e4d;
                border-right: 2px solid #2e2e4d;
                border-bottom-right-radius: 20px;
                background: none;
                z-index: -1;
                transform: rotate(-90deg) scaleY(1);
            }

            .devices.left .arrow-up {
                content: "";
                position: absolute;
                top: -899px;
                right: -5px;
                width: 0;
                height: 0;
                border-left: 5px solid transparent;
                border-right: 5px solid transparent;
                border-bottom: 6px solid #2e2e4d;
                z-index: -1;
                transform: rotate(-90deg);
            }

            .devices.left li::before {
                content: "";
                position: absolute;
                top: 50%;
                right: -10px;
                width: 10px;
                height: 10px;
                background-color: #2e2e4d;
                border-radius: 50%;
                transform: translateY(-50%);
                z-index: 1;
            }
            .devices.left li::after {
                content: "";
                position: absolute;
                top: 38%;
                right: -20px;
                width: 20px;
                height: 20px;
                background: none;
                border-top: 2px solid #2e2e4d;
                border-right: 2px solid #2e2e4d;
                border-top-right-radius: 20px;
                transform: translateY(-50%) scaleY(-1);
            }

            .devices.right {
                position: relative;
            }

            .devices.right::before {
                content: "";
                position: absolute;
                top: -450px;
                left: -20px;
                width: 2px;
                height: 815px;
                background-color: #2e2e4d;
                z-index: -1;
            }

            .devices.right::after {
                content: "";
                position: absolute;
                top: -470px;
                left: -20px;
                width: 20px;
                height: 20px;
                border-bottom: 2px solid #2e2e4d;
                border-left: 2px solid #2e2e4d;
                border-bottom-left-radius: 20px;
                background: none;
                z-index: -1;
                transform: rotate(90deg) scaleY(1);
            }

            .devices.right .arrow-up {
                content: "";
                position: absolute;
                top: -472px;
                left: -5px;
                width: 0;
                height: 0;
                border-left: 5px solid transparent;
                border-right: 5px solid transparent;
                border-top: 6px solid #2e2e4d;
                z-index: -1;
                transform: rotate(-90deg);
            }

            .devices.right li::before {
                content: "";
                position: absolute;
                top: 55%;
                left: -10px;
                width: 10px;
                height: 10px;
                background-color: #2e2e4d;
                border-radius: 50%;
                transform: translateY(-50%);
                z-index: 1;
            }

            .devices.right li::after {
                content: "";
                position: absolute;
                top: 45%;
                left: -20px;
                width: 20px;
                height: 20px;
                background: none;
                border-top: 2px solid #2e2e4d;
                border-left: 2px solid #2e2e4d;
                border-top-left-radius: 20px;
                transform: translateY(-50%) scaleY(-1);
            }
        }

        @media (max-width: 440px) {
            .devices.left::before {
                content: "";
                position: absolute;
                top: -670px;
                right: -20px;
                width: 2px;
                height: 1028px;
                background-color: #2e2e4d;
                z-index: -1;
            }

            .devices.left::after {
                content: "";
                position: absolute;
                top: -690px;
                right: -20px;
                width: 20px;
                height: 20px;
                border-bottom: 2px solid #2e2e4d;
                border-right: 2px solid #2e2e4d;
                border-bottom-right-radius: 20px;
                background: none;
                z-index: -1;
                transform: rotate(-90deg) scaleY(1);
            }

            .devices.left .arrow-up {
                content: "";
                position: absolute;
                top: -692px;
                right: -5px;
                width: 0;
                height: 0;
                border-left: 5px solid transparent;
                border-right: 5px solid transparent;
                border-bottom: 6px solid #2e2e4d;
                z-index: -1;
                transform: rotate(-90deg);
            }

            .devices.right::before {
                content: "";
                position: absolute;
                top: -245px;
                left: -20px;
                width: 2px;
                height: 610px;
                background-color: #2e2e4d;
                z-index: -1;
            }

            .devices.right::after {
                content: "";
                position: absolute;
                top: -265px;
                left: -20px;
                width: 20px;
                height: 20px;
                border-bottom: 2px solid #2e2e4d;
                border-left: 2px solid #2e2e4d;
                border-bottom-left-radius: 20px;
                background: none;
                z-index: -1;
                transform: rotate(90deg) scaleY(1);
            }

            .devices.right .arrow-up {
                content: "";
                position: absolute;
                top: -266px;
                left: -5px;
                width: 0;
                height: 0;
                border-left: 5px solid transparent;
                border-right: 5px solid transparent;
                border-top: 6px solid #2e2e4d;
                z-index: -1;
                transform: rotate(-90deg);
            }
        }

        @media (max-width: 375px) {
            .devices.left::before {
                content: "";
                position: absolute;
                top: -645px;
                right: -20px;
                width: 2px;
                height: 1005px;
                background-color: #2e2e4d;
                z-index: -1;
            }

            .devices.left::after {
                content: "";
                position: absolute;
                top: -665px;
                right: -20px;
                width: 20px;
                height: 20px;
                border-bottom: 2px solid #2e2e4d;
                border-right: 2px solid #2e2e4d;
                border-bottom-right-radius: 20px;
                background: none;
                z-index: -1;
                transform: rotate(-90deg) scaleY(1);
            }

            .devices.left .arrow-up {
                content: "";
                position: absolute;
                top: -667px;
                right: -5px;
                width: 0;
                height: 0;
                border-left: 5px solid transparent;
                border-right: 5px solid transparent;
                border-bottom: 6px solid #2e2e4d;
                z-index: -1;
                transform: rotate(-90deg);
            }

            .devices.right::before {
                content: "";
                position: absolute;
                top: -220px;
                left: -20px;
                width: 2px;
                height: 582px;
                background-color: #2e2e4d;
                z-index: -1;
            }

            .devices.right::after {
                content: "";
                position: absolute;
                top: -240px;
                left: -20px;
                width: 20px;
                height: 20px;
                border-bottom: 2px solid #2e2e4d;
                border-left: 2px solid #2e2e4d;
                border-bottom-left-radius: 20px;
                background: none;
                z-index: -1;
                transform: rotate(90deg) scaleY(1);
            }

            .devices.right .arrow-up {
                content: "";
                position: absolute;
                top: -242px;
                left: -5px;
                width: 0;
                height: 0;
                border-left: 5px solid transparent;
                border-right: 5px solid transparent;
                border-top: 6px solid #2e2e4d;
                z-index: -1;
                transform: rotate(-90deg);
            }
        }

        @media (max-width: 320px) {
            .devices.left::before {
                content: "";
                position: absolute;
                top: -615px;
                right: -20px;
                width: 2px;
                height: 975px;
                background-color: #2e2e4d;
                z-index: -1;
            }

            .devices.left::after {
                content: "";
                position: absolute;
                top: -635px;
                right: -20px;
                width: 20px;
                height: 20px;
                border-bottom: 2px solid #2e2e4d;
                border-right: 2px solid #2e2e4d;
                border-bottom-right-radius: 20px;
                background: none;
                z-index: -1;
                transform: rotate(-90deg) scaleY(1);
            }

            .devices.left .arrow-up {
                content: "";
                position: absolute;
                top: -637px;
                right: -5px;
                width: 0;
                height: 0;
                border-left: 5px solid transparent;
                border-right: 5px solid transparent;
                border-bottom: 6px solid #2e2e4d;
                z-index: -1;
                transform: rotate(-90deg);
            }

            .devices.right::before {
                content: "";
                position: absolute;
                top: -190px;
                left: -20px;
                width: 2px;
                height: 555px;
                background-color: #2e2e4d;
                z-index: -1;
            }

            .devices.right::after {
                content: "";
                position: absolute;
                top: -210px;
                left: -20px;
                width: 20px;
                height: 20px;
                border-bottom: 2px solid #2e2e4d;
                border-left: 2px solid #2e2e4d;
                border-bottom-left-radius: 20px;
                background: none;
                z-index: -1;
                transform: rotate(90deg) scaleY(1);
            }

            .devices.right .arrow-up {
                content: "";
                position: absolute;
                top: -212px;
                left: -5px;
                width: 0;
                height: 0;
                border-left: 5px solid transparent;
                border-right: 5px solid transparent;
                border-top: 6px solid #2e2e4d;
                z-index: -1;
                transform: rotate(-90deg);
            }
        }

        @media (max-width: 1114px) and (min-width: 835px) {
            .devices {
                width: 22%;
                position: relative;
            }

            .devices li {
                background: #2e2e4d;
                color: #fff;
                padding: 8px 12px;
                margin: 12px 0;
                border-radius: 6px;
                font-size: 8px;
                position: relative;
                height: 55px;
                display: flex;
                flex-direction: column;
                align-items: center;
                justify-content: center;
                text-align: center;
            }

            .devices.left {
                position: relative;
            }

            .devices.left::before {
                content: "";
                position: absolute;
                bottom: 0px;
                right: -40px;
                width: 2px;
                height: 78%;
                background-color: #2e2e4d;
                z-index: -1;
            }

            .devices.left::after {
                content: "";
                position: absolute;
                top: 0;
                right: -58px;
                width: 20px;
                height: 20px;
                border-bottom: 2px solid #2e2e4d;
                border-right: 2px solid #2e2e4d;
                border-bottom-right-radius: 20px;
                background: none;
                z-index: -1;
                transform: rotate(-90deg) scaleY(-1);
            }

            .devices.left .arrow-up {
                content: "";
                position: absolute;
                top: -2px;
                right: -65px;
                width: 0;
                height: 0;
                border-left: 5px solid transparent;
                border-right: 5px solid transparent;
                border-bottom: 6px solid #2e2e4d;
                z-index: -1;
                transform: rotate(90deg)
            }

            .devices.left li::before {
                content: "";
                position: absolute;
                top: 55%;
                right: -10px;
                width: 10px;
                height: 10px;
                background-color: #2e2e4d;
                border-radius: 50%;
                transform: translateY(-50%);
                z-index: 1;
            }
            .devices.left li::after {
                content: "";
                position: absolute;
                top: 38%;
                right: -40px;
                width: 40px;
                height: 20px;
                background: none;
                border-top: 2px solid #2e2e4d;
                border-right: 2px solid #2e2e4d;
                border-top-right-radius: 20px;
                transform: translateY(-50%) scaleY(-1);
            }

            .devices.right {
                position: relative;
            }

            .devices.right::before {
                content: "";
                position: absolute;
                bottom: 0px;
                left: -40px;
                width: 2px;
                height: 78%;
                background-color: #2e2e4d;
                z-index: -1;
            }

            .devices.right::after {
                content: "";
                position: absolute;
                top: 0;
                left: -58px;
                width: 20px;
                height: 20px;
                border-bottom: 2px solid #2e2e4d;
                border-left: 2px solid #2e2e4d;
                border-bottom-left-radius: 20px;
                background: none;
                z-index: -1;
                transform: rotate(90deg) scaleY(-1);
            }

            .devices.right .arrow-up {
                content: "";
                position: absolute;
                top: -2px;
                left: -65px;
                width: 0;
                height: 0;
                border-left: 5px solid transparent;
                border-right: 5px solid transparent;
                border-top: 6px solid #2e2e4d;
                z-index: -1;
                transform: rotate(90deg);
            }

            .devices.right li::before {
                content: "";
                position: absolute;
                top: 55%;
                left: -10px;
                width: 10px;
                height: 10px;
                background-color: #2e2e4d;
                border-radius: 50%;
                transform: translateY(-50%);
                z-index: 1;
            }

            .devices.right li::after {
                content: "";
                position: absolute;
                top: 40%;
                left: -40px;
                width: 40px;
                height: 20px;
                background: none;
                border-top: 2px solid #2e2e4d;
                border-left: 2px solid #2e2e4d;
                border-top-left-radius: 20px;
                transform: translateY(-50%) scaleY(-1);
            }
        }
    </style>

    <!-- about-area -->
    <section id="about" class="about-area pt-120 pb-120">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-8">
                    <div class="topology-diagram">
                        <div class="cloud-section">
                            <div class="devices left">
                                <div class="arrow-up"></div>
                                <ul>
                                    <li>
                                        <a href="https://be-jogja.com/solusi/water-security/automatic-water-level-recorder">
                                            AUTOMATIC WATER LEVEL RECORDER <strong>(AWLR)</strong>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="https://be-jogja.com/solusi/weather-forecast/automatic-weather-recorder">
                                            AUTOMATIC WEATHER RECORDER <strong>(AWR)</strong>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="https://be-jogja.com/solusi/weather-forecast/automatic-rain-recorder">
                                            AUTOMATIC RAIN RECORDER <strong>(ARR)</strong>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            AUTOMATIC GEOTHERMAL RECORDER <strong>(AGR)</strong>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="https://be-jogja.com/solusi/water-security/automatic-deformation-recorder">
                                            AUTOMATIC DEFORMATION RECORDER <strong>(ADR)</strong>
                                        </a>
                                    </li>
                                </ul>
                            </div>

                            <div class="cloud">
                                <img loading="lazy" src="{{ asset('asset/img/images/cloud.png') }}" alt="Cloud">
                                <img loading="lazy" src="{{ asset('asset/img/images/sistem monitoring.png') }}" alt="Sistem Monitoring">
                            </div>

                            <div class="devices right">
                                <div class="arrow-up"></div>
                                <ul>
                                    <li>
                                        <a href="https://be-jogja.com/solusi/water-security/automatic-water-gate-controller">
                                            AUTOMATIC WATER GATE CONTROLLER <strong>(AWGC)</strong>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="https://be-jogja.com/solusi/water-security/automatic-water-quality-recorder">
                                            AUTOMATIC WATER QUALITY RECORDER <strong>(AWQR)</strong>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="https://be-jogja.com/solusi/water-security/automatic-flow-meter-recorder">
                                            AUTOMATIC FLOW METER RECORDER <strong>(AFMR)</strong>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="https://be-jogja.com/solusi/water-security/automatic-vibrating-wire-recorder">
                                            AUTOMATIC VIBRATING WIRE RECORDER <strong>(AVWR)</strong>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="https://be-jogja.com/solusi/early-warning-system/early-warning-system">
                                            EARLY WARNING SYSTEM <strong>(EWS)</strong>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <div class="monitoring">
                            <img loading="lazy" src="{{ asset('asset/img/images/App.png') }}" alt="App">
                            <p class="desc">
                                Seluruh sistem monitoring dan kontrol perangkat telemetri <strong>BEACON ENGINEERING</strong>
                                telah dirancang untuk beroperasi secara optimal di berbagai platform, termasuk
                                <strong>Windows, macOS, iOS,</strong> dan <strong>Android</strong>, memastikan aksesibilitas dan kemudahan
                                penggunaan bagi pengguna di berbagai perangkat.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="about-content">
                        <div class="section-title mb-35 tg-heading-subheading animation-style3">
                            <span class="sub-title">MENGAPA BEACON ENGINEERING?</span>
                            <h2 class="title tg-element-title">Memimpin dalam akurasi, monitoring dan observasi hanya lewat ujung jari.</h2>
                        </div>
                        <p>Semua perangkat telemetri Beacon Engineering terintegrasi dengan aplikasi STESY Smart Telemetry System. Monitoring lebih mudah, tepat, dan cepat.</p>
                        <div class="about-bottom">
                            <a href="https://www.youtube.com/watch?v=qD1ePHATQ4o" target="__blank" class="btn btn-two">Lihat STESY</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- about-area-end -->
    <!-- choose-area -->
    <section class="choose-area">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-4 order-0 order-lg-2">
                    <div class="choose-img-wrap">
                        <img loading="lazy" src="{{ asset('asset/img/images/Foto Harapan.png') }}" alt="">
                        <img loading="lazy" src="{{ asset('asset/img/images/Group 34.png') }}" class="shadow-image" alt="" data-parallax='{"x" : 50 }'>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="choose-content">
                        <div class="section-title white-title mb-30 tg-heading-subheading animation-style3">
                            <span class="sub-title">APA YANG INGIN DIHADIRKAN?</span>
                            <h2 class="title tg-element-title">Bukan hanya tentang perangkat, namun juga harapan dan manfaat berkelanjutan.</h2>
                        </div>
                        <p>Berdampingan dengan perangkat telemetri yang mumpuni, Beacon Engineering juga menghadirkan berbagai layanan unggulan.</p>
                        <div class="choose-list swiper-container">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <div class="icon">
                                        <img loading="lazy" src="{{ asset('asset/img/icon/AI.png') }}" alt="">
                                    </div>
                                    <div class="content">
                                        <h4 class="title">Telemetri Berbasis AI</h4>
                                        <p>Mengumpulkan data lebih cepat dan akurat, serta analisa dan komparasi data hasil pengukuran.</p>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="icon">
                                        <img loading="lazy" src="{{ asset('asset/img/icon/GARANSI.png') }}" alt="">
                                    </div>
                                    <div class="content">
                                        <h4 class="title">Garansi Maintenance</h4>
                                        <p>Garansi pengecekan teknis, pemeriksaan visual dan kebersihan, penggantian suku cadang, kalibrasi, serta uji fungsional.</p>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="icon">
                                        <img loading="lazy" src="{{ asset('asset/img/icon/MONITORING.png') }}" alt="">
                                    </div>
                                    <div class="content">
                                        <h4 class="title">Monitoring Terintegrasi</h4>
                                        <p>Akses mudah dengan aplikasi STESY (Smart Telemetry System) yang hemat waktu dan efisien.</p>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="icon">
                                        <img loading="lazy" src="{{ asset('asset/img/icon/LAYANAN.png') }}" alt="">
                                    </div>
                                    <div class="content">
                                        <h4 class="title">Layanan Konsultasi</h4>
                                        <p>Mengumpulkan data lebih cepat dan akurat, serta analisa dan komparasi data hasil pengukuran.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-pagination swiper-pagination-choose"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="choose-shape-wrap">
            <img loading="lazy" src="{{ asset('asset/img/images/blog_shape031.png') }}" alt="" data-aos="fade-left" data-aos-delay="400">
        </div>
    </section>
    <!-- choose-area-end -->
    <!-- project-area -->
    <section class="project-area">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-6 col-lg-7">
                    <div class="section-title text-center mb-50 tg-heading-subheading animation-style3">
                        <h2 class="title tg-element-title">Temukan <span class="highlight-red">Beacon</span> Engineering
                            di Berbagai Proyek Pembangunan Indonesia</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="project-item-wrap">
            <div class="container custom-container-two">
                <div class="swiper-container project-slider">
                    <div class="swiper-wrapper">
                        @foreach($projeks as $projek)
                        <div class="swiper-slide">
                            <div class="project-item">
                                <div class="project-thumb">
                                    <a href="{{ route('proyek.show', $projek->slug) }}">
                                        <img loading="lazy" src="{{ asset('storage/' . $projek->thumbnail) }}" alt="">
                                    </a>
                                </div>
                                <div class="project-content">
                                    <div class="left-side-content">
                                        <h4 class="title">
                                            <a href="{{ route('proyek.show', $projek->slug) }}">{{ $projek->nama_projek }}</a>
                                        </h4>
                                        <span>Tahun {{ $projek->waktu }}</span>
                                    </div>
                                    <div class="link-arrow">
                                        <a href="{{ route('proyek.show', $projek->slug) }}">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 18 15" fill="none">
                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M17.6293 3.27957C17.7117 2.80341 17.4427 2.34763 17.0096 2.17812C16.9477 2.15385 16.8824 2.13552 16.8144 2.12376L6.96081 0.419152C6.41654 0.325049 5.89911 0.689856 5.80491 1.23411C5.71079 1.77829 6.07564 2.29578 6.61982 2.38993L14.0946 3.68295L1.36574 12.6573C0.914365 12.9756 0.806424 13.5995 1.12467 14.0509C1.44292 14.5022 2.06682 14.6102 2.51819 14.2919L15.247 5.31753L13.954 12.7923C13.8598 13.3365 14.2247 13.854 14.7689 13.9482C15.3131 14.0422 15.8305 13.6774 15.9248 13.1332L17.6293 3.27957Z" fill="currentcolor" />
                                            </svg>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-12">
                        <div class="project-content-bottom">
                            <p style="color: #2e2e4d;">Cari tahu sejauh mana Beacon Engineering<br> berkontribusi di Indonesia!</p>
                            <a href="/proyek" class="btn btn-two">Lihat semua proyek</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- project-area-end -->

    <!-- consulting-area -->
    <section class="consulting-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="consulting-inner-wrap shine-animate-item">
                        <div class="consulting-content">
                            <div class="content-left">
                                <h2 class="title">300+</h2>
                                <span>Proyek <br> di Indonesia</span>
                            </div>
                            <div class="content-right">
                                <h2 class="title">Pendapat Mitra</h2>
                                <p>Cari tahu pengalaman berkembang bersama Beacon Engineering melalui pendapat mitra kami!</p>
                            </div>
                        </div>
                        <div class="consulting-img shine-animate">
                            <img loading="lazy" src="{{ asset('asset/img/images/valveIKN.jpeg') }}" alt="">
                        </div>
                        <div class="consulting-shape">
                            {{-- <img loading="lazy" src="{{ asset('asset/img/images/consulting_shape.png') }}" alt=""> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- consulting-area-end -->
    <!-- testimonial-area -->
    <section class="testimonial-area">
        <div class="container">
            <div class="row" style="display: flex;align-items:flex-end">
                <div class="col-lg-6 order-0 order-lg-2">
                    <div class="testimonial-active swiper-container">
                        <div class="swiper-wrapper">
                            @foreach($testimonis as $testimoni)
                            <div class="swiper-slide">
                                <div class="testimonial-item">
                                    <div class="testimonial-info">
                                        <div class="icon">
                                            <img loading="lazy" src="{{ asset('storage/' . $testimoni->projek->klien->logo ) }}" alt="Logo" class="user-image">
                                        </div>
                                        <div class="text-info">
                                            <h4 class="title">{{ $testimoni->nama_user }}</h4>
                                            <span class="sub-title">{{ $testimoni->jabatan }}</span>
                                        </div>
                                    </div>
                                    <div class="testimonial-content">
                                        <p>“{{ $testimoni->testimoni }}”</p>
                                        <div class="icon"><img loading="lazy" src="{{ asset('asset/img/images/petik.png') }}" alt=""></div>
                                    </div>
                                    <div class="testimonial-content1">
                                        <div class="icon1">{{ $testimoni->projek->nama_projek }}</div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-8 kolom-widya">
                    <div class="testimonial-img-wrap">
                        <div class="icon">
                            <img loading="lazy" src="{{ asset('asset/img/images/widya1.png') }}" alt="">
                        </div>
                        <div class="img-shape">
                            <img loading="lazy" src="{{ asset('asset/img/images/testimonial_bgwidya1.png') }}" class="bgwidya" alt="">
                            <img loading="lazy" src="" alt="" class="rightToLeft">
                            <img loading="lazy" src="{{ asset('asset/img/images/testimonial_shape1.png') }}" alt="" data-parallax='{"y" : 80 }'>
                            <img loading="lazy" src="{{ asset('asset/img/images/testimonial_shape2.png') }}" alt="" class="alltuchtopdown">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- testimonial-area-end -->
    <!-- artikel-post-area -->
    <section class="artikel-post-area artikel-post-bg" data-background="{{ asset('asset/img/bg/bg2.png') }}">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-6">
                    <div class="section-title text-center mb-40 tg-heading-subheading animation-style3">
                        <span class="sub-title">PUBLIKASI</span>
                        <h2 class="title tg-element-title">Artikel Terbaru <br>
                            tentang Telemetri dan Teknologi</h2>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                @foreach($artikels_terbaru as $artikel)
                    <div class="col-xl-4 col-lg-6 col-md-10">
                        <div class="artikel-post-item shine-animate-item" onclick="window.location='{{ route('publikasi.show', $artikel->slug) }}'"
                            style="cursor: pointer;">
                            <div class="artikel-post-thumb">
                                <a href="{{ route('publikasi.show', $artikel->slug) }}" class="shine-animate">
                                    <img loading="lazy" src="{{ asset('storage/' . $artikel->thumbnail) }}" alt="{{ $artikel->judul }}">
                                </a>
                            </div>
                            <div class="artikel-post-content">
                                <h2 class="title">
                                    <a href="{{ route('publikasi.show', $artikel->slug) }}">{{ $artikel->judul }}</a>
                                </h2>
                                <div class="artikel-avatar">
                                    <div class="avatar-thumb">
                                        <img loading="lazy" src="{{ asset('asset/img/blog/calendar1.png') }}" alt="">
                                    </div>
                                    <div class="avatar-content">
                                        <p>{{ $artikel->created_at->translatedFormat('l, d F Y') }}</p>
                                    </div>
                                </div>
                                <div class="artikel-post-meta">
                                    <ul class="list-wrap">
                                        <a href="{{ route('publikasi.show', $artikel->slug) }}" class="btn-two">Baca selengkapnya</a>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="project-content-bottom">
                        <a href="{{ route('publikasi.index') }}" class="btn btn-two">Cari tahu lebih banyak</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- artikel-post-area-end -->
    <script>
        // Inisialisasi Swiper
        document.addEventListener('DOMContentLoaded', () => {
            new Swiper('.brand-active', {
                slidesPerView: 3,
                spaceBetween: 30,
                loop: true,
                autoplay: {
                    delay: 3000,
                    disableOnInteraction: false,
                },
                breakpoints: {
                    640: { slidesPerView: 2 },
                    768: { slidesPerView: 3 },
                    1024: { slidesPerView: 5 },
                }
            });
        });
    </script>
    <script>
        // Inisialisasi Swiper
        document.addEventListener('DOMContentLoaded', () => {
            new Swiper('.project-slider', {
                slidesPerView: 1,
                spaceBetween: 20,
                loop: true,
                autoplay: {
                    delay: 3000,
                    disableOnInteraction: false,
                },
                breakpoints: {
                    640: { slidesPerView: 1 },
                    768: { slidesPerView: 2 },
                    1024: { slidesPerView: 5 },
                }
            });
        });
    </script>
    <script>
        // Inisialisasi Swiper
        document.addEventListener('DOMContentLoaded', () => {
            new Swiper('.testimonial-active', {
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
                    640: { slidesPerView: 1 },
                    768: { slidesPerView: 1 },
                    1024: { slidesPerView: 1 },
                }
            });
        });
    </script>
@endsection
