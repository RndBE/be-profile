
<div class="container-fluid container-xl position-relative d-flex align-items-center">

    <a href="#" class="logo d-flex align-items-center me-auto">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <img src="{{ asset('assets/dist/img/logo_be2.png') }}" alt="">
        {{-- <h1 class="sitename">Arsha</h1> --}}
    </a>

    <nav id="navmenu" class="navmenu">
        <ul>
        <li><a href="#hero" class="active">Beranda</a></li>
        <li><a href="#about">Solusi</a></li>
        <li><a href="#services">Proyek</a></li>
        <li><a href="#portfolio">Publikasi</a></li>
        <li><a href="#team">Tentang Kami</a></li>
        <li><a href="#pricing">Pricing</a></li>
        <li class="dropdown"><a href="#"><span>Dropdown</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
            <ul>
            <li><a href="#">Dropdown 1</a></li>
            <li class="dropdown"><a href="#"><span>Deep Dropdown</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
                <ul>
                <li><a href="#">Deep Dropdown 1</a></li>
                <li><a href="#">Deep Dropdown 2</a></li>
                <li><a href="#">Deep Dropdown 3</a></li>
                <li><a href="#">Deep Dropdown 4</a></li>
                <li><a href="#">Deep Dropdown 5</a></li>
                </ul>
            </li>
            <li><a href="#">Dropdown 2</a></li>
            <li><a href="#">Dropdown 3</a></li>
            <li><a href="#">Dropdown 4</a></li>
            </ul>
        </li>
        <li><a href="#contact">Contact</a></li>
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
    </nav>

    <a class="btn-getstarted" href="#about">Get Started</a>

</div>
