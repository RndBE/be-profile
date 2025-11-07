<!-- =======================
   META SEO OPTIMIZED HEAD
========================== -->

<!-- Google Tag Manager -->
<script>
(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-MTQWD9MT');
</script>
<!-- End Google Tag Manager -->

<!-- Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-6JSP4BZ625"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());
  gtag('config', 'G-6JSP4BZ625');
</script>
<!-- End Google Analytics -->

<meta charset="utf-8">
<meta http-equiv="x-ua-compatible" content="ie=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="csrf-token" content="{{ csrf_token() }}">

<title>@yield('title', 'Beacon Engineering | PT. Arta Teknologi Comunindo')</title>

<!-- =======================
   SEO Meta Tags
========================== -->
<meta name="description" content="@yield('description', 'PT. Arta Teknologi Comunindo (Beacon Engineering) adalah perusahaan manufaktur perangkat data logger dan software Smart Telemetry Systems (STESY) untuk smart monitoring di bidang klimatologi, hidrologi, irigasi, geoteknik, dan geothermal.')">
<meta name="keywords" content="Beacon Engineering, PT. Arta Teknologi Comunindo, data logger, Smart Telemetry Systems, STESY, telemetri, monitoring, hidrologi, klimatologi, irigasi, geoteknik, geothermal, smart monitoring, IoT Indonesia, DAQ, sistem pemantauan online, AWLR, AWR, AVWR, AWGC, AFMR, ADR, AWQR, ARR, EWS BL-1100, BL-110">
<meta name="author" content="PT. Arta Teknologi Comunindo">
<meta name="robots" content="index, follow">
<link rel="canonical" href="{{ url()->current() }}">

<!-- =======================
   Open Graph (Facebook / WhatsApp)
========================== -->
<meta property="og:title" content="@yield('title', 'Beacon Engineering | PT. Arta Teknologi Comunindo')">
<meta property="og:description" content="@yield('description', 'Solusi teknologi monitoring berbasis IoT di Indonesia.')">
<meta property="og:image" content="@yield('image', asset('assets/dist/img/logo.png'))">
<meta property="og:url" content="{{ url()->current() }}">
<meta property="og:type" content="@yield('type', 'website')">
<meta property="og:site_name" content="Beacon Engineering">

<!-- =======================
   Twitter Card
========================== -->
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="@yield('title', 'Beacon Engineering | PT. Arta Teknologi Comunindo')">
<meta name="twitter:description" content="@yield('description', 'Solusi teknologi monitoring berbasis IoT di Indonesia.')">
<meta name="twitter:image" content="@yield('image', asset('assets/dist/img/logo.png'))">

<!-- =======================
   Local Business Schema
========================== -->
<meta name="geo.region" content="ID-YO" />
<meta name="geo.placename" content="Sleman, Yogyakarta" />
<meta name="geo.position" content="-7.773035;110.464579" />
<meta name="ICBM" content="-7.773035, 110.464579" />

@yield('meta')

<!-- =======================
   Structured Data (JSON-LD)
========================== -->
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "Organization",
  "name": "Beacon Engineering",
  "url": "https://be-jogja.com",
  "logo": "https://be-jogja.com/assets/dist/img/logo.png",
  "sameAs": [
    "https://www.linkedin.com/company/beaconengineering",
    "https://www.instagram.com/beaconengineering"
  ],
  "address": {
    "@type": "PostalAddress",
    "streetAddress": "Jl. Raya Kaliurang, Sleman",
    "addressLocality": "Yogyakarta",
    "postalCode": "55581",
    "addressCountry": "ID"
  }
}
</script>

<!-- =======================
   Favicon
========================== -->
<link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/dist/img/title.ico') }}">

<!-- =======================
   Fonts & CSS
========================== -->
<link rel="preconnect" href="https://fonts.googleapis.com" />
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
<link href="https://fonts.googleapis.com/css2?family=Lexend+Deca:wght@100..900&display=swap" rel="stylesheet" />

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

<!-- Cegah download gambar -->
<style>
  img {
    pointer-events: none;
    user-select: none;
  }
</style>
