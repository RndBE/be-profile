<!doctype html>
<html class="no-js" lang="en">
    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Content Security Policy -->
    <meta http-equiv="Content-Security-Policy"
            content="script-src 'self' https://www.googletagmanager.com https://embed.tawk.to https://cdn.jsdelivr.net https://code.jquery.com 'unsafe-inline' 'unsafe-eval';">

    <!-- Preconnect untuk resource eksternal -->
    <link rel="preconnect" href="https://www.googletagmanager.com">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preconnect" href="https://cdn.jsdelivr.net">

    <!-- Preload CSS penting -->
    <link rel="preload" href="{{ asset('asset/css/bootstrap.min.css') }}" as="style" onload="this.rel='stylesheet'">
    <link rel="preload" href="{{ asset('asset/css/main.css') }}" as="style" onload="this.rel='stylesheet'">

    <!-- Fallback untuk browser lama -->
    <noscript>
        <link rel="stylesheet" href="{{ asset('asset/css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('asset/css/main.css') }}">
    </noscript>

    <!-- CSS sekunder (tidak blokir render) -->
    <link rel="preload" href="{{ asset('asset/css/swiper-bundle.css') }}" as="style" onload="this.rel='stylesheet'">
    <link rel="preload" href="{{ asset('asset/css/aos.css') }}" as="style" onload="this.rel='stylesheet'">
    <link rel="preload" href="{{ asset('asset/css/animate.min.css') }}" as="style" onload="this.rel='stylesheet'">
    <link rel="preload" href="{{ asset('asset/css/flaticon.css') }}" as="style" onload="this.rel='stylesheet'">

    <!-- Google Font dengan teknik non-blocking -->
    <link href="https://fonts.googleapis.com/css2?family=Lexend+Deca:wght@100..900&display=swap"
            rel="stylesheet" media="print" onload="this.media='all'">

    <!-- Google Tag Manager -->
    <script>
        (function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':new Date().getTime(),event:'gtm.js'});
        var f=d.getElementsByTagName(s)[0],j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';
        j.async=true;j.src='https://www.googletagmanager.com/gtm.js?id='+i+dl;
        f.parentNode.insertBefore(j,f);
        })(window,document,'script','dataLayer','GTM-MTQWD9MT');
    </script>

    <!-- Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-6JSP4BZ625"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());
        gtag('config', 'G-6JSP4BZ625');
    </script>

    @include('User.layouts.head')
    @livewireStyles
    </head>

    <body>
    <header class="transparent-header">@include('User.layouts.header')</header>
    <main class="fix">@yield('content')</main>
    <footer>@include('User.layouts.footer')</footer>
    @livewireScripts

    <!-- jQuery -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js" defer></script>

    <!-- Tawk.to -->
    <script type="text/javascript">
        var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
        (function(){
        var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
        s1.async=true;
        s1.src='https://embed.tawk.to/683aba05b9e648190c8df866/1isimd9v1';
        s1.charset='UTF-8';
        s1.setAttribute('crossorigin','*');
        s0.parentNode.insertBefore(s1,s0);
        })();
    </script>

    <!-- JSON-LD Schema -->
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "Organization",
        "name": "PT. Arta Teknologi Comunindo",
        "url": "https://www.be-jogja.com",
        "logo": "https://www.be-jogja.com/assets/dist/img/logo.png",
        "contactPoint": {
        "@type": "ContactPoint",
        "telephone": "+62-274-4986899",
        "contactType": "customer service",
        "email": "info@bejogja.com"
        },
        "address": {
        "@type": "PostalAddress",
        "streetAddress": "Kadirojo I, Purwomartani, Kalasan",
        "addressLocality": "Sleman",
        "addressRegion": "DI Yogyakarta",
        "postalCode": "55571",
        "addressCountry": "ID"
        }
    }
    </script>

    <!-- JS Lokal dengan defer -->
    <script src="{{ asset('asset/js/gsap.js') }}" defer></script>
    <script src="{{ asset('asset/js/ScrollTrigger.js') }}" defer></script>
    <script src="{{ asset('asset/js/SplitText.js') }}" defer></script>
    <script src="{{ asset('asset/js/jquery.parallaxScroll.min.js') }}" defer></script>
    <script src="{{ asset('asset/js/swiper-bundle.js') }}" defer></script>
    <script src="{{ asset('asset/js/wow.min.js') }}" defer></script>
    <script src="{{ asset('asset/js/aos.js') }}" defer></script>
    <script src="{{ asset('asset/js/ajax-form.js') }}" defer></script>
    <script src="{{ asset('asset/js/main.js') }}" defer></script>

    <!-- CDN Script -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/magnific-popup@1.1.0/dist/jquery.magnific-popup.min.js" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/odometer@0.4.8/odometer.min.js" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery.appear@1.0.1/jquery.appear.min.js" defer></script>

    <!-- Disable klik kanan gambar -->
    <script>
        document.addEventListener('contextmenu', function (e) {
        if (e.target.tagName === 'IMG') e.preventDefault();
        });
    </script>

    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-MTQWD9MT"
    height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    </body>
</html>
