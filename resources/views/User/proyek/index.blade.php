@extends('User.layouts.app')
@section('title', 'Galeri Proyek | BE Profile')
@section('content')
        <!-- breadcrumb-area -->
        <section class="breadcrumb__area breadcrumb__bg" data-background="{{ asset('asset/img/project/bg.png') }}">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="breadcrumb__content">
                            <h2 class="title">Galeri Proyek</h2>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/">Beranda</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Galeri Proyek</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- breadcrumb-area-end -->
        <!-- blog-area -->
        <section class="blog__area">
            <div class="container">
                <div class="blog__inner-wrap">
                    <div class="row">
                        <div class="col-70">
                            <div class="blog-post-wrap">
                                <div class="row gutter-24">
                                    <div class="col-md-6">
                                        <div class="blog__post-two shine-animate-item">
                                            <div class="blog__post-thumb-two">
                                                <a href="blog-details.html" class="shine-animate"><img src="{{ asset('asset/img/blog/h2_blog_post01.jpg') }}" alt=""></a>
                                            </div>
                                            <div class="blog__post-content-two">
                                                <div class="blog-post-meta">
                                                    <ul class="list-wrap">
                                                        <li>
                                                            <a href="blog.html" class="blog__post-tag-two">Business</a>
                                                        </li>
                                                        <li><i class="fas fa-calendar-alt"></i>Oct 21, 2024</li>
                                                    </ul>
                                                </div>
                                                <h2 class="title"><a href="blog-details.html">Marketing your area business downturn now a days</a></h2>
                                                <div class="blog-avatar">
                                                    <div class="avatar-thumb">
                                                        <img src="{{ asset('asset/img/blog/blog_avatar01.png') }}" alt="">
                                                    </div>
                                                    <div class="avatar-content">
                                                        <p>By <a href="blog-details.html">Doman Smith</a></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="blog__post-two shine-animate-item">
                                            <div class="blog__post-thumb-two">
                                                <a href="blog-details.html" class="shine-animate"><img src="{{ asset('asset/img/blog/h2_blog_post02.jpg') }}" alt=""></a>
                                            </div>
                                            <div class="blog__post-content-two">
                                                <div class="blog-post-meta">
                                                    <ul class="list-wrap">
                                                        <li>
                                                            <a href="blog.html" class="blog__post-tag-two">Audit</a>
                                                        </li>
                                                        <li><i class="fas fa-calendar-alt"></i>Oct 21, 2024</li>
                                                    </ul>
                                                </div>
                                                <h2 class="title"><a href="blog-details.html">Improving The Double Diamond Design Process</a></h2>
                                                <div class="blog-avatar">
                                                    <div class="avatar-thumb">
                                                        <img src="{{ asset('asset/img/blog/blog_avatar01.png') }}" alt="">
                                                    </div>
                                                    <div class="avatar-content">
                                                        <p>By <a href="blog-details.html">Doman Smith</a></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="blog__post-two shine-animate-item">
                                            <div class="blog__post-thumb-two">
                                                <a href="blog-details.html" class="shine-animate"><img src="{{ asset('asset/img/blog/h2_blog_post03.jpg') }}" alt=""></a>
                                            </div>
                                            <div class="blog__post-content-two">
                                                <div class="blog-post-meta">
                                                    <ul class="list-wrap">
                                                        <li>
                                                            <a href="blog.html" class="blog__post-tag-two">Investment</a>
                                                        </li>
                                                        <li><i class="fas fa-calendar-alt"></i>Oct 21, 2024</li>
                                                    </ul>
                                                </div>
                                                <h2 class="title"><a href="blog-details.html">Revealing Images With CSS Mask Animations</a></h2>
                                                <div class="blog-avatar">
                                                    <div class="avatar-thumb">
                                                        <img src="{{ asset('asset/img/blog/blog_avatar01.png') }}" alt="">
                                                    </div>
                                                    <div class="avatar-content">
                                                        <p>By <a href="blog-details.html">Doman Smith</a></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="blog__post-two shine-animate-item">
                                            <div class="blog__post-thumb-two">
                                                <a href="blog-details.html" class="shine-animate"><img src="{{ asset('asset/img/blog/h2_blog_post04.jpg') }}" alt=""></a>
                                            </div>
                                            <div class="blog__post-content-two">
                                                <div class="blog-post-meta">
                                                    <ul class="list-wrap">
                                                        <li>
                                                            <a href="blog.html" class="blog__post-tag-two">Agency</a>
                                                        </li>
                                                        <li><i class="fas fa-calendar-alt"></i>Oct 21, 2024</li>
                                                    </ul>
                                                </div>
                                                <h2 class="title"><a href="blog-details.html">Improving The Double Diamond
                                                        Design Process</a></h2>
                                                <div class="blog-avatar">
                                                    <div class="avatar-thumb">
                                                        <img src="{{ asset('asset/img/blog/blog_avatar01.png') }}" alt="">
                                                    </div>
                                                    <div class="avatar-content">
                                                        <p>By <a href="blog-details.html">Doman Smith</a></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="blog__post-two shine-animate-item">
                                            <div class="blog__post-thumb-two">
                                                <a href="blog-details.html" class="shine-animate"><img src="{{ asset('asset/img/blog/h2_blog_post05.jpg') }}" alt=""></a>
                                            </div>
                                            <div class="blog__post-content-two">
                                                <div class="blog-post-meta">
                                                    <ul class="list-wrap">
                                                        <li>
                                                            <a href="blog.html" class="blog__post-tag-two">Business</a>
                                                        </li>
                                                        <li><i class="fas fa-calendar-alt"></i>Oct 21, 2024</li>
                                                    </ul>
                                                </div>
                                                <h2 class="title"><a href="blog-details.html">Falling For Oklch: A Love Story
                                                        Of Color Spaces, Gamuts ...</a></h2>
                                                <div class="blog-avatar">
                                                    <div class="avatar-thumb">
                                                        <img src="{{ asset('asset/img/blog/blog_avatar01.png') }}" alt="">
                                                    </div>
                                                    <div class="avatar-content">
                                                        <p>By <a href="blog-details.html">Doman Smith</a></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="blog__post-two shine-animate-item">
                                            <div class="blog__post-thumb-two">
                                                <a href="blog-details.html" class="shine-animate"><img src="{{ asset('asset/img/blog/h2_blog_post06.jpg') }}" alt=""></a>
                                            </div>
                                            <div class="blog__post-content-two">
                                                <div class="blog-post-meta">
                                                    <ul class="list-wrap">
                                                        <li>
                                                            <a href="blog.html" class="blog__post-tag-two">Corporate</a>
                                                        </li>
                                                        <li><i class="fas fa-calendar-alt"></i>Oct 21, 2024</li>
                                                    </ul>
                                                </div>
                                                <h2 class="title"><a href="blog-details.html">Better Context Menus With Safe
                                                        Triangles</a></h2>
                                                <div class="blog-avatar">
                                                    <div class="avatar-thumb">
                                                        <img src="{{ asset('asset/img/blog/blog_avatar01.png') }}" alt="">
                                                    </div>
                                                    <div class="avatar-content">
                                                        <p>By <a href="blog-details.html">Doman Smith</a></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="pagination-wrap mt-40">
                                    <nav aria-label="Page navigation example">
                                        <ul class="pagination list-wrap">
                                            <li class="page-item"><a class="page-link" href="#"><i class="fas fa-angle-double-left"></i></a></li>
                                            <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                                            <li class="page-item"><a class="page-link" href="#">4</a></li>
                                            <li class="page-item next-page"><a class="page-link" href="#"><i class="fas fa-angle-double-right"></i></a>
                                            </li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                        </div>
                        <div class="col-30">
                            <aside class="blog__sidebar">
                                <div class="sidebar__widget sidebar__widget-two">
                                    <div class="sidebar__search">
                                        <form action="#">
                                            <input type="text" placeholder="Search . . .">
                                            <button type="submit">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="none">
                                                    <path d="M19.0002 19.0002L14.6572 14.6572M14.6572 14.6572C15.4001 13.9143 15.9894 13.0324 16.3914 12.0618C16.7935 11.0911 17.0004 10.0508 17.0004 9.00021C17.0004 7.9496 16.7935 6.90929 16.3914 5.93866C15.9894 4.96803 15.4001 4.08609 14.6572 3.34321C13.9143 2.60032 13.0324 2.01103 12.0618 1.60898C11.0911 1.20693 10.0508 1 9.00021 1C7.9496 1 6.90929 1.20693 5.93866 1.60898C4.96803 2.01103 4.08609 2.60032 3.34321 3.34321C1.84288 4.84354 1 6.87842 1 9.00021C1 11.122 1.84288 13.1569 3.34321 14.6572C4.84354 16.1575 6.87842 17.0004 9.00021 17.0004C11.122 17.0004 13.1569 16.1575 14.6572 14.6572Z" stroke="currentcolor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                                </svg>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                                <div class="sidebar__widget">
                                    <h4 class="sidebar__widget-title">Categories</h4>
                                    <div class="sidebar__cat-list">
                                        <ul class="list-wrap">
                                            <li>
                                                <a href="#"><i class="flaticon-arrow-button"></i>Business Solution (15)</a>
                                            </li>
                                            <li>
                                                <a href="#"><i class="flaticon-arrow-button"></i>Marketing Planning (11)</a>
                                            </li>
                                            <li>
                                                <a href="#"><i class="flaticon-arrow-button"></i>SEO Consulting (05)</a>
                                            </li>
                                            <li>
                                                <a href="#"><i class="flaticon-arrow-button"></i>Project Management (07)</a>
                                            </li>
                                            <li>
                                                <a href="#"><i class="flaticon-arrow-button"></i>Business Development (04)</a>
                                            </li>
                                            <li>
                                                <a href="#"><i class="flaticon-arrow-button"></i>Marketing Plan (22)</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="sidebar__widget">
                                    <h4 class="sidebar__widget-title">Latest Posts</h4>
                                    <div class="sidebar__post-list">
                                        <div class="sidebar__post-item">
                                            <div class="sidebar__post-thumb">
                                                <a href="blog-details.html"><img src="{{ asset('asset/img/blog/sb_post01.jpg') }}" alt=""></a>
                                            </div>
                                            <div class="sidebar__post-content">
                                                <h5 class="title"><a href="blog-details.html">deno weuine easiure and praising</a></h5>
                                                <span class="date"><i class="flaticon-time"></i>Sep 15, 2024</span>
                                            </div>
                                        </div>
                                        <div class="sidebar__post-item">
                                            <div class="sidebar__post-thumb">
                                                <a href="blog-details.html"><img src="{{ asset('asset/img/blog/sb_post02.jpg') }}" alt=""></a>
                                            </div>
                                            <div class="sidebar__post-content">
                                                <h5 class="title"><a href="blog-details.html">know how to pursue pleasure rationally</a></h5>
                                                <span class="date"><i class="flaticon-time"></i>Sep 15, 2024</span>
                                            </div>
                                        </div>
                                        <div class="sidebar__post-item">
                                            <div class="sidebar__post-thumb">
                                                <a href="blog-details.html"><img src="{{ asset('asset/img/blog/sb_post03.jpg') }}" alt=""></a>
                                            </div>
                                            <div class="sidebar__post-content">
                                                <h5 class="title"><a href="blog-details.html">there anyone who loves</a></h5>
                                                <span class="date"><i class="flaticon-time"></i>Sep 15, 2024</span>
                                            </div>
                                        </div>
                                        <div class="sidebar__post-item">
                                            <div class="sidebar__post-thumb">
                                                <a href="blog-details.html"><img src="{{ asset('asset/img/blog/sb_post04.jpg') }}" alt=""></a>
                                            </div>
                                            <div class="sidebar__post-content">
                                                <h5 class="title"><a href="blog-details.html">deno weuine easiure and praising</a></h5>
                                                <span class="date"><i class="flaticon-time"></i>Sep 15, 2024</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="sidebar__widget">
                                    <h4 class="sidebar__widget-title">Tags</h4>
                                    <div class="sidebar__tag-list">
                                        <ul class="list-wrap">
                                            <li><a href="#">Finance</a></li>
                                            <li><a href="#">Data</a></li>
                                            <li><a href="#">Agency</a></li>
                                            <li><a href="#">Business</a></li>
                                            <li><a href="#">Corporate</a></li>
                                            <li><a href="#">Development</a></li>
                                            <li><a href="#">Consultancy</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </aside>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- blog-area-end -->
@endsection
