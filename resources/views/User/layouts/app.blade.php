<!doctype html>
<html class="no-js" lang="en">
<head>
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
    <button class="scroll__top scroll-to-target" data-target="html">
        <i class="fas fa-angle-up"></i>
    </button>
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
    <!-- JS here -->
    <script src="{{ asset('asset/js/vendor/jquery-3.6.0.min.js') }}" async></script>
    <script src="{{ asset('asset/js/bootstrap.bundle.min.js') }}" async></script>
    <script src="{{ asset('asset/js/jquery.magnific-popup.min.js') }}" async></script>
    <script src="{{ asset('asset/js/jquery.odometer.min.js') }}" async></script>
    <script src="{{ asset('asset/js/jquery.appear.js') }}" async></script>
    <script src="{{ asset('asset/js/gsap.js') }}" async></script>
    <script src="{{ asset('asset/js/ScrollTrigger.js') }}" async></script>
    <script src="{{ asset('asset/js/SplitText.js') }}" async></script>
    <script src="{{ asset('asset/js/gsap-animation.js') }}" async></script>
    <script src="{{ asset('asset/js/jquery.parallaxScroll.min.js') }}" async></script>
    <script src="{{ asset('asset/js/swiper-bundle.js') }}" async></script>
    <script src="{{ asset('asset/js/ajax-form.js') }}" async></script>
    <script src="{{ asset('asset/js/wow.min.js') }}" async></script>
    <script src="{{ asset('asset/js/aos.js') }}" async></script>
    <script src="{{ asset('asset/js/main.js') }}" async></script>
    <script>
        document.addEventListener('contextmenu', function (e) {
            if (e.target.tagName === 'IMG') {
                e.preventDefault();
            }
        });
    </script>
    {{-- <script>
        const text = document.querySelector('.circle');
        text.innerHTML = text.textContent.replace(/\S/g, "<span>$&</span>");
        const element = document.querySelectorAll('.circle span');
        for (let i = 0; i < element.length; i++) {
            element[i].style.transform = "rotate(" + i * 17 + "deg)"
        }
    </script> --}}
</body>
</html>
