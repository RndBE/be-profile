{{-- <header class="transparent-header"> --}}
    <div id="sticky-header" class="tg-header__area">
        <div class="container custom-container">
            <div class="row">
                <div class="col-12">
                    <div class="tgmenu__wrap">
                        <nav class="tgmenu__nav">
                            <div class="logo">
                                <a href="/"><img src="{{ asset('assets/dist/img/logo_be2.png') }}" alt="Logo"></a>
                            </div>
                            <div class="tgmenu__navbar-wrap tgmenu__main-menu d-none d-lg-flex">
                                <ul class="navigation">
                                    <li class="{{ Request::is('/') ? 'active' : '' }}"><a href="/">Beranda</a></li>
                                    <li class="menu-item-has-children {{ Request::is('solusi*') ? 'active' : '' }}">
                                        <a class="" href="">Solution</a>
                                        <ul class="sub-menu">
                                            @foreach($solutionss as $solution)
                                                <li class="{{ Request::is('solusi/' . Str::slug($solution->nama) . '*') ? 'active' : '' }}">
                                                    <a href="{{ route('solusi.show', Str::slug($solution->nama)) }}" class="{{ Request::is('solusi/' . Str::slug($solution->nama)) ? 'active' : '' }}">
                                                        <img src="{{ asset('storage/'.$solution->icon) }}" alt="" style="width: 20px; height: 20px; margin-right: 5px;">
                                                        {{ $solution->nama }}
                                                    </a>
                                                    @if($solution->subSolutions->count() > 0)
                                                        <ul class="sub-menu">
                                                            @foreach($solution->subSolutions as $subSolution)
                                                                <li class="{{ Request::is('solusi/' . Str::slug($solution->nama) . '/' . Str::slug($subSolution->nama)) ? 'active' : '' }}">
                                                                    <a href="{{ route('solusi.show', [Str::slug($solution->nama), Str::slug($subSolution->nama)]) }}" class="{{ Request::is('solusi/' . Str::slug($solution->nama) . '/' . Str::slug($subSolution->nama)) ? 'active' : '' }}">
                                                                        <img src="{{ asset('asset/img/images/mingcute_right-line.png') }}" alt="">
                                                                        {{ $subSolution->nama }}
                                                                    </a>
                                                                </li>
                                                            @endforeach
                                                        </ul>
                                                    @endif
                                                </li>
                                            @endforeach
                                            <li class="{{ Request::is('bandingkan-perangkat') ? 'active' : '' }}">
                                                <a href="/bandingkan-perangkat"><svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-vs" style="margin-right: 5px;"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M2 12c0 5.523 4.477 10 10 10s10 -4.477 10 -10s-4.477 -10 -10 -10s-10 4.477 -10 10" /><path d="M14 14.25c0 .414 .336 .75 .75 .75h1.25a1 1 0 0 0 1 -1v-1a1 1 0 0 0 -1 -1h-1a1 1 0 0 1 -1 -1v-1a1 1 0 0 1 1 -1h1.25a.75 .75 0 0 1 .75 .75" /><path d="M7 9l2 6l2 -6" /></svg>Bandingkan Perangkat</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="{{ Request::is('proyek') ? 'active' : '' }}">
                                        <a href="/proyek">Proyek</a>
                                    </li>
                                    <li class="{{ Request::is('publikasi') ? 'active' : '' }}">
                                        <a href="/publikasi">Publikasi</a>
                                    </li>
                                    {{-- <li class="menu-item-has-children"><a href="#">Publikasi</a>
                                        <ul class="sub-menu">
                                            <li><a href="about.html">Business About</a></li>
                                            <li><a href="about-2.html">Finance About</a></li>
                                            <li><a href="about-5.html">Consulting About</a></li>
                                            <li><a href="about-3.html">Insurance About</a></li>
                                            <li><a href="about-4.html">Digital agency About</a></li>
                                        </ul>
                                    </li> --}}
                                    <li class="menu-item-has-children"><a href="#">Tentang Kami</a>
                                        <ul class="sub-menu">
                                            <li class="{{ Request::is('tentang-kami') ? 'active' : '' }}">
                                                <a href="/tentang-kami">Tentang Beacon</a>
                                            </li>
                                            <li class="{{ Request::is('sertifikasi') ? 'active' : '' }}">
                                                <a href="/sertifikasi">Sertifikasi</a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>

                            <div class="tgmenu__action d-none d-md-block">
                                <ul class="list-wrap">
                                    <li class="header-btn"><a href="https://wa.me/628112632151" target="_blank" class="btn">Kontak Kami</a></li>
                                </ul>
                            </div>
                            <div class="mobile-nav-toggler">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 18 18" fill="none">
                                    <path d="M0 2C0 0.895431 0.895431 0 2 0C3.10457 0 4 0.895431 4 2C4 3.10457 3.10457 4 2 4C0.895431 4 0 3.10457 0 2Z" fill="currentcolor" />
                                    <path d="M0 9C0 7.89543 0.895431 7 2 7C3.10457 7 4 7.89543 4 9C4 10.1046 3.10457 11 2 11C0.895431 11 0 10.1046 0 9Z" fill="currentcolor" />
                                    <path d="M0 16C0 14.8954 0.895431 14 2 14C3.10457 14 4 14.8954 4 16C4 17.1046 3.10457 18 2 18C0.895431 18 0 17.1046 0 16Z" fill="currentcolor" />
                                    <path d="M7 2C7 0.895431 7.89543 0 9 0C10.1046 0 11 0.895431 11 2C11 3.10457 10.1046 4 9 4C7.89543 4 7 3.10457 7 2Z" fill="currentcolor" />
                                    <path d="M7 9C7 7.89543 7.89543 7 9 7C10.1046 7 11 7.89543 11 9C11 10.1046 10.1046 11 9 11C7.89543 11 7 10.1046 7 9Z" fill="currentcolor" />
                                    <path d="M7 16C7 14.8954 7.89543 14 9 14C10.1046 14 11 14.8954 11 16C11 17.1046 10.1046 18 9 18C7.89543 18 7 17.1046 7 16Z" fill="currentcolor" />
                                    <path d="M14 2C14 0.895431 14.8954 0 16 0C17.1046 0 18 0.895431 18 2C18 3.10457 17.1046 4 16 4C14.8954 4 14 3.10457 14 2Z" fill="currentcolor" />
                                    <path d="M14 9C14 7.89543 14.8954 7 16 7C17.1046 7 18 7.89543 18 9C18 10.1046 17.1046 11 16 11C14.8954 11 14 10.1046 14 9Z" fill="currentcolor" />
                                    <path d="M14 16C14 14.8954 14.8954 14 16 14C17.1046 14 18 14.8954 18 16C18 17.1046 17.1046 18 16 18C14.8954 18 14 17.1046 14 16Z" fill="currentcolor" />
                                </svg>
                            </div>
                        </nav>
                    </div>
                    <!-- Mobile Menu  -->
                    <div class="tgmobile__menu">
                        <nav class="tgmobile__menu-box">
                            <div class="close-btn"><i class="fas fa-times"></i></div>
                            <div class="nav-logo">
                                <a href="index.html"><img src="{{ asset('assets/dist/img/logo_be2.png') }}" alt="Logo"></a>
                            </div>
                            <div class="tgmobile__search">
                                {{-- <form action="#">
                                    <input type="text" placeholder="Search here...">
                                    <button><i class="fas fa-search"></i></button>
                                </form> --}}
                            </div>
                            <div class="tgmobile__menu-outer">
                                <!--Here Menu Will Come Automatically Via Javascript / Same Menu as in Header-->
                            </div>
                            <div class="tgmobile__menu-bottom">
                                <div class="contact-info">
                                    <ul class="list-wrap">
                                        <li><a href="mailto:info@apexa.com">info@bejogja.com</a></li>
                                        <li><a href="tel:02744986899">(0274) 4986899</a></li>
                                    </ul>
                                </div>
                                <div class="social-links">
                                    <ul class="list-wrap">
                                        <li><a href="https://www.instagram.com/beacon_engineering" target="_blank"><i class="fab fa-instagram"></i></a></li>
                                        <li><a href="https://www.linkedin.com/company/beaconen-gineering" target="_blank"><i class="fab fa-linkedin-in"></i></a></li>
                                        <li><a href="https://www.youtube.com/@beacon_engineering" target="_blank"><i class="fab fa-youtube"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </nav>
                    </div>
                    <div class="tgmobile__menu-backdrop"></div>
                    <!-- End Mobile Menu -->
                </div>
            </div>
        </div>
    </div>
    <!-- header-search -->
    {{-- <div class="search__popup">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="search__wrapper">
                        <div class="search__close">
                            <button type="button" class="search-close-btn">
                                <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M17 1L1 17" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                    <path d="M1 1L17 17" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                </svg>
                            </button>
                        </div>
                        <div class="search__form">
                            <form action="#">
                                <div class="search__input">
                                    <input class="search-input-field" type="text" placeholder="Type keywords here">
                                    <span class="search-focus-border"></span>
                                    <button>
                                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M9.55 18.1C14.272 18.1 18.1 14.272 18.1 9.55C18.1 4.82797 14.272 1 9.55 1C4.82797 1 1 4.82797 1 9.55C1 14.272 4.82797 18.1 9.55 18.1Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                            <path d="M19.0002 19.0002L17.2002 17.2002" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                        </svg>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="search-popup-overlay"></div> --}}
    <!-- header-search-end -->
    <!-- offCanvas-menu -->
    {{-- <div class="offCanvas__info">
        <div class="offCanvas__close-icon menu-close">
            <button><i class="far fa-window-close"></i></button>
        </div>
        <div class="offCanvas__logo mb-30">
            <a href="index.html"><img src="{{ asset('asset/img/logo/logo.png') }}" alt="Logo"></a>
        </div>
        <div class="offCanvas__side-info mb-30">
            <div class="contact-list mb-30">
                <h4>Office Address</h4>
                <p>123/A, Miranda City Likaoli <br> Prikano, Dope</p>
            </div>
            <div class="contact-list mb-30">
                <h4>Phone Number</h4>
                <p>+0989 7876 9865 9</p>
                <p>+(090) 8765 86543 85</p>
            </div>
            <div class="contact-list mb-30">
                <h4>Email Address</h4>
                <p>info@example.com</p>
                <p>example.mail@hum.com</p>
            </div>
        </div>
        <div class="offCanvas__social-icon mt-30">
            <a href="javascript:void(0)"><i class="fab fa-facebook-f"></i></a>
            <a href="javascript:void(0)"><i class="fab fa-twitter"></i></a>
            <a href="javascript:void(0)"><i class="fab fa-google-plus-g"></i></a>
            <a href="javascript:void(0)"><i class="fab fa-instagram"></i></a>
        </div>
    </div>
    <div class="offCanvas__overly"></div> --}}
    <!-- offCanvas-menu-end -->
{{-- </header> --}}
