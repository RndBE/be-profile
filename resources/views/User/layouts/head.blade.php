<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>@yield('title', 'Beacon Engineering | PT. Arta Teknologi Comunindo')</title>

    {{-- SEO Meta Tags --}}
    <meta name="description" content="PT. Arta Teknologi Comunindo (Beacon Engineering) adalah perusahaan manufaktur perangkat data logger dan software Smart Telemetry Systems (STESY) STESY untuk smart monitoring di bidang klimatologi, hidrologi, irigasi, geoteknik, dan geothermal.">
    <meta name="keywords" content="Beacon Engineering, PT. Arta Teknologi Comunindo, data logger, Smart Telemetry Systems (STESY), telemetri, monitoring, hidrologi, klimatologi, irigasi, geoteknik, geothermal, smart monitoring, IoT Indonesia, DAQ, sistem pemantauan online, AWLR, AWR, AVWR, AWGC, AFMR, ADR, AWQR, ARR, EWS BL-1100, BL-110">
    <meta name="author" content="PT. Arta Teknologi Comunindo">
    <meta name="robots" content="index, follow">

    {{-- Responsive --}}
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- CSRF --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- Open Graph (Facebook, LinkedIn, WhatsApp) --}}
    <!--<meta property="og:title" content="Beacon Engineering | PT. Arta Teknologi Comunindo">-->
    <!--<meta property="og:description" content="Perusahaan manufaktur perangkat data logger dan software STESY berbasis IoT untuk sistem monitoring klimatologi, hidrologi, dan lainnya.">-->
    <!--<meta property="og:image" content="{{ asset('assets/dist/img/logo.png') }}">-->
    <!--<meta property="og:url" content="{{ url()->current() }}">-->
    <!--<meta property="og:type" content="website">-->
    <meta property="og:title" content="@yield('title')">
    <meta property="og:description" content="@yield('description')">
    <meta property="og:image" content="@yield('image', asset('assets/dist/img/logo.png'))">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:type" content="@yield('type', 'website')">

    {{-- Twitter Card --}}
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Beacon Engineering | PT. Arta Teknologi Comunindo">
    <meta name="twitter:description" content="Solusi teknologi monitoring berbasis IoT di Indonesia.">
    <meta name="twitter:image" content="{{ asset('assets/dist/img/logo.png') }}">

    {{-- Local Business Location --}}
    <meta name="geo.region" content="ID-YO" />
    <meta name="geo.placename" content="Sleman, Yogyakarta" />
    <meta name="geo.position" content="-7.773035;110.464579" />
    <meta name="ICBM" content="-7.773035, 110.464579" />

    {{-- Favicon --}}
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/dist/img/title.ico') }}">
    {{-- mencegah duplikat konten dan memberitahu mesin pencari URL utama --}}
    <link rel="canonical" href="{{ url()->current() }}">

    {{-- CSS Files --}}
    <link rel="stylesheet" href="{{ asset('asset/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('asset/css/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('asset/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('asset/css/fontawesome-all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('asset/css/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('asset/css/odometer.css') }}">
    <link rel="stylesheet" href="{{ asset('asset/css/swiper-bundle.css') }}">
    <link rel="stylesheet" href="{{ asset('asset/css/aos.css') }}">
    <link rel="stylesheet" href="{{ asset('asset/css/default.css') }}">
    <link rel="stylesheet" href="{{ asset('asset/css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    {{-- Cegah download gambar --}}
    <style>
        img {
            pointer-events: none;
            user-select: none;
        }
    </style>
</head>
