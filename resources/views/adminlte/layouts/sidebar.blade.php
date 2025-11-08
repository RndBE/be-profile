<aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark">
    <!--begin::Sidebar Brand-->
    <div class="sidebar-brand">
        <!--begin::Brand Link-->
        <a href="/" class="brand-link">
        <!--begin::Brand Image-->
        <img
            src="{{ asset('assets/dist/img/title.ico') }}"
            alt="BE Profile Logo"
            class="brand-image opacity-75 shadow"
        />
        <!--end::Brand Image-->
        <!--begin::Brand Text-->
        <span class="brand-text fw-light">BE Profile</span>
        <!--end::Brand Text-->
        </a>
        <!--end::Brand Link-->
    </div>
    <!--end::Sidebar Brand-->
    <!--begin::Sidebar Wrapper-->
    <div class="sidebar-wrapper">
        <nav class="mt-2">
        <!--begin::Sidebar Menu-->
        <ul
            class="nav sidebar-menu flex-column"
            data-lte-toggle="treeview"
            role="navigation"
            aria-label="Main navigation"
            data-accordion="false"
            id="navigation"
        >
            <li class="nav-item">
                <a href="/admin/dashboard" class="nav-link {{ Request::is('admin/dashboard*') ?'active' : '' }}">
                    <i class="nav-icon fas fa-tachometer-alt "></i>
                    <p>
                    Dashboard
                        {{-- <span class="right badge badge-danger">New</span> --}}
                    </p>
                </a>
            </li>

            <li class="nav-item">
                <a href="/admin/carousel" class="nav-link {{ Request::is('admin/carousel*') ?'active' : '' }}">
                    <i class="nav-icon fas fa-image"></i>
                    <p>
                    Carousel
                        {{-- <span class="right badge badge-danger">New</span> --}}
                    </p>
                </a>
            </li>

            <li class="nav-item">
                <a href="/admin/klien" class="nav-link {{ Request::is('admin/klien*') ?'active' : '' }}">
                    <i class="nav-icon fas fa-address-card"></i>
                    <p>
                    Klien
                        {{-- <span class="right badge badge-danger">New</span> --}}
                    </p>
                </a>
            </li>

            <li class="nav-item">
                <a href="/admin/tag" class="nav-link {{ Request::is('admin/tag*') ?'active' : '' }}">
                    <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-hash"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M5 9l14 0" /><path d="M5 15l14 0" /><path d="M11 4l-4 16" /><path d="M17 4l-4 16" /></svg>
                    <p>
                    Tag
                        {{-- <span class="right badge badge-danger">New</span> --}}
                    </p>
                </a>
            </li>

            <li class="nav-item">
                <a href="/admin/kategori_projek" class="nav-link {{ Request::is('admin/kategori_projek*') ?'active' : '' }}">
                    <i class="nav-icon fas fa-tags"></i>
                    <p>
                    Kategori Projek
                        {{-- <span class="right badge badge-danger">New</span> --}}
                    </p>
                </a>
            </li>

            <li class="nav-item">
                <a href="/admin/projek" class="nav-link {{ Request::is('admin/projek*') ?'active' : '' }}">
                    <i class="nav-icon fas fa-helmet-safety"></i>
                    <p>
                    Projek
                        {{-- <span class="right badge badge-danger">New</span> --}}
                    </p>
                </a>
            </li>

            <li class="nav-item">
                <a href="/admin/testimoni" class="nav-link {{ Request::is('admin/testimoni*') ?'active' : '' }}">
                    <i class="nav-icon fas fa-thumbs-up"></i>
                    <p>
                    Testimoni
                        {{-- <span class="right badge badge-danger">New</span> --}}
                    </p>
                </a>
            </li>

            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-comment"></i>
                    <p>
                        Solusi
                        <i class="nav-arrow bi bi-chevron-right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="/admin/solutions" class="nav-link {{ Request::is('admin/solutions*') ?'active' : '' }}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Solusi</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/admin/sub-solutions" class="nav-link {{ Request::is('admin/sub-solutions*') ?'active' : '' }}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Sub Solusi</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/admin/fitur-sub-solutions" class="nav-link {{ Request::is('admin/fitur-sub-solutions*') ?'active' : '' }}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Fitur Sub Solusi</p>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item">
                <a href="#" class="nav-link">
                    <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="currentColor"  class="icon icon-tabler icons-tabler-filled icon-tabler-square-rounded-letter-p"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M11.676 2.001l.324 -.001c7.752 0 10 2.248 10 10l-.005 .642c-.126 7.235 -2.461 9.358 -9.995 9.358l-.642 -.005c-7.13 -.125 -9.295 -2.395 -9.358 -9.67v-.325c0 -7.643 2.185 -9.936 9.676 -9.999m.324 4.999h-2a1 1 0 0 0 -1 1v8a1 1 0 0 0 1 1l.117 -.007a1 1 0 0 0 .883 -.993v-3h1a3 3 0 0 0 0 -6m0 2a1 1 0 0 1 0 2h-1v-2z" /></svg>
                    <p>
                        Produk
                        <i class="nav-arrow bi bi-chevron-right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="/admin/produk" class="nav-link {{ Request::is('admin/produk*') ?'active' : '' }}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Tambah Produk</p>
                        </a>
                    </li>
                </ul>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="/admin/solusi-produk" class="nav-link {{ Request::is('admin/solusi-produk*') ?'active' : '' }}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Solusi Pemasangan</p>
                        </a>
                    </li>
                </ul>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="/admin/komponen" class="nav-link {{ Request::is('admin/komponen*') ?'active' : '' }}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Komponen</p>
                        </a>
                    </li>
                </ul>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="/admin/keunggulan" class="nav-link {{ Request::is('admin/keunggulan*') ?'active' : '' }}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Keunggulan</p>
                        </a>
                    </li>
                </ul>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>
                                Spesifikasi
                                <i class="nav-arrow bi bi-chevron-right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item ms-1">
                                <a href="/admin/seri-perangkat" class="nav-link {{ Request::is('admin/seri-perangkat') ?'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Seri Perangkat</p>
                                </a>
                            </li>
                        </ul>
                        <ul class="nav nav-treeview">
                            <li class="nav-item ms-1">
                                <a href="/admin/kategori-spesifikasi" class="nav-link {{ Request::is('admin/kategori-spesifikasi*') ?'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Kategori Spesifikasi</p>
                                </a>
                            </li>
                        </ul>
                        <ul class="nav nav-treeview">
                            <li class="nav-item ms-1">
                                <a href="/admin/spesifikasi" class="nav-link {{ Request::is('admin/spesifikasi*') ?'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Spesifikasi</p>
                                </a>
                            </li>
                        </ul>
                        <ul class="nav nav-treeview">
                            <li class="nav-item ms-1">
                                <a href="/admin/seri-perangkat-spesifikasi" class="nav-link {{ Request::is('admin/seri-perangkat-spesifikasi*') ?'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Seri Perangkat Spesifikasi</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </li>

            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-certificate"></i>
                    <p>
                        Tentang Kami
                        <i class="nav-arrow bi bi-chevron-right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="/admin/tentang-kami" class="nav-link {{ Request::is('admin/tentang-kami*') ?'active' : '' }}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Tentang Beacon</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/admin/sertifikasi" class="nav-link {{ Request::is('admin/sertifikasi*') ?'active' : '' }}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Sertifikasi</p>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="fa-solid fa-link"></i>
                    <p>
                        Publikasi
                        <i class="nav-arrow bi bi-chevron-right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="/admin/kategori-topik" class="nav-link {{ Request::is('admin/kategori-topik*') ?'active' : '' }}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Kategori Topik</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/admin/artikel" class="nav-link {{ Request::is('admin/artikel*') ?'active' : '' }}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Artikel</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/admin/iklan" class="nav-link {{ Request::is('admin/iklan*') ?'active' : '' }}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Poster Iklan</p>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="fa-solid fa-shoe-prints"></i>
                    <p>
                        Footer
                        <i class="nav-arrow bi bi-chevron-right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="/admin/instagram-token" class="nav-link {{ Request::is('admin/instagram-token*') ?'active' : '' }}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Instagram</p>
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
        <!--end::Sidebar Menu-->
        </nav>
    </div>
    <!--end::Sidebar Wrapper-->
</aside>
