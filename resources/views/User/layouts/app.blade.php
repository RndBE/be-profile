<!doctype html>
<html class="no-js" lang="en">
<head>
    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-MTQWD9MT');</script>
    <!-- End Google Tag Manager -->
    <!-- Google tag (gtag.js) -->
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
    <!--Preloader-->
    <div id="preloader">
        <div id="loader" class="loader">
            <div class="loader-container">
                <div class="loader-icon"><img src="{{ asset('assets/dist/img/title.ico') }}" alt="Preloader"></div>
            </div>
        </div>
    </div>
    <!--Preloader-end -->
    <!-- Scroll-top -->
    <!--<button class="scroll__top scroll-to-target" data-target="html">-->
    <!--    <i class="fas fa-angle-up"></i>-->
    <!--</button>-->
    <!-- Scroll-top-end-->

    <header class="transparent-header">
        @include('User.layouts.header')
    </header>
    <main class="fix">
        @yield('content')
    </main>


    <footer>
        @include('User.layouts.footer')
    </footer>
    @livewireScripts

    <!--Start of Tawk.to Script-->
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
    <!--End of Tawk.to Script-->

    <!-- Menambahkan JSON-LD untuk Schema.org -->
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
    <!-- JS here -->
    {{-- <script src="{{ asset('asset/js/vendor/jquery-3.6.0.min.js') }}" defer></script>
    <script src="{{ asset('asset/js/bootstrap.bundle.min.js') }}" defer></script>
    <script src="{{ asset('asset/js/jquery.magnific-popup.min.js') }}" defer></script>
    <script src="{{ asset('asset/js/jquery.odometer.min.js') }}" defer></script>
    <script src="{{ asset('asset/js/jquery.appear.js') }}" defer></script>
    <script src="{{ asset('asset/js/gsap.js') }}" defer></script>
    <script src="{{ asset('asset/js/ScrollTrigger.js') }}" defer></script>
    <script src="{{ asset('asset/js/SplitText.js') }}" defer></script>
    <script src="{{ asset('asset/js/gsap-animation.js') }}" defer></script>
    <script src="{{ asset('asset/js/jquery.parallaxScroll.min.js') }}" defer></script>
    <script src="{{ asset('asset/js/swiper-bundle.js') }}" defer></script>
    <script src="{{ asset('asset/js/ajax-form.js') }}" defer></script>
    <script src="{{ asset('asset/js/wow.min.js') }}" defer></script>
    <script src="{{ asset('asset/js/aos.js') }}" defer></script>
    <script src="{{ asset('asset/js/main.js') }}" defer></script> --}}
    <!-- jQuery -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js" defer></script>

    <!-- Bootstrap Bundle (dengan Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" defer></script>

    <!-- Magnific Popup -->
    <script src="https://cdn.jsdelivr.net/npm/magnific-popup@1.1.0/dist/jquery.magnific-popup.min.js" defer></script>

    <!-- Odometer -->
    <script src="https://cdn.jsdelivr.net/npm/odometer@0.4.8/odometer.min.js" defer></script>

    <!-- jQuery Appear -->
    <script src="https://cdn.jsdelivr.net/npm/jquery.appear@1.0.1/jquery.appear.min.js" defer></script>

    <!-- GSAP + Plugins -->
    <script src="https://cdn.jsdelivr.net/npm/gsap@3.13.0/dist/gsap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/gsap@3.13.0/dist/ScrollTrigger.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/gsap@3.13.0/dist/SplitText.min.js"></script>

    <!-- Parallax Scroll -->
    <script src="https://cdn.jsdelivr.net/npm/jquery-parallax-scroll@1.0.0/js/jquery.parallax-scroll.min.js"></script>

    <!-- Swiper -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js" defer></script>

    <!-- WOW.js -->
    <script src="https://cdn.jsdelivr.net/npm/wowjs@1.1.3/dist/wow.min.js" defer></script>

    <!-- AOS (Animate On Scroll) -->
    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js" defer></script>

    <!-- ajax-form.js dan main.js (file lokal custom kamu) -->
    <script src="{{ asset('asset/js/ajax-form.js') }}" defer></script>
    <script src="{{ asset('asset/js/main.js') }}" defer></script>


    <script>
        document.addEventListener('contextmenu', function (e) {
            if (e.target.tagName === 'IMG') {
                e.preventDefault();
            }
        });
    </script>
    <script>
        const text = document.querySelector('.circle');
        text.innerHTML = text.textContent.replace(/\S/g, "<span>$&</span>");
        const element = document.querySelectorAll('.circle span');
        for (let i = 0; i < element.length; i++) {
            element[i].style.transform = "rotate(" + i * 17 + "deg)"
        }
    </script>

    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-MTQWD9MT"
    height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->
</body>
</html>
