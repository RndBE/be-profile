{{-- <footer> --}}
    <!-- call-back-area -->
    <!--<section class="call-back-area">-->
    <!--    <div class="container">-->
    <!--        <div class="row">-->
    <!--            <div class="col-lg-6">-->
    <!--                <div class="call-back-content">-->
    <!--                    <div class="section-title white-title mb-10 tg-heading-subheading animation-style3">-->
    <!--                        <h2 class="title tg-element-title">PUNYA PERTANYAAN?</h2>-->
    <!--                    </div>-->
    <!--                    <p>Kirim pertanyaanmu dan tunggu ahli kami menjawab apapun yang ingin kamu tahu.</p>-->
    <!--                </div>-->
    <!--            </div>-->
    <!--            <div class="col-lg-6">-->
    <!--                {{-- <div class="call-back-form">-->
    <!--                    <form id="whatsappForm" action="{{ route('send.whatsapp') }}" method="POST">-->
    <!--                        @csrf-->
    <!--                        <div class="row">-->
    <!--                            <div class="col-md-6">-->
    <!--                                <div class="form-grp">-->
    <!--                                    <input type="text" id="nama" name="nama" placeholder="*Nama lengkap" required>-->
    <!--                                </div>-->
    <!--                            </div>-->
    <!--                            <div class="col-md-6">-->
    <!--                                <div class="form-grp">-->
    <!--                                    <input type="number" id="phone" name="phone" placeholder="*No. Telp" required>-->
    <!--                                </div>-->
    <!--                            </div>-->
    <!--                            <div class="col-md-6">-->
    <!--                                <div class="form-grp">-->
    <!--                                    <input type="text" id="question" name="question" placeholder="*Pertanyaan" required>-->
    <!--                                </div>-->
    <!--                            </div>-->
    <!--                            <div class="col-md-6">-->
    <!--                                <button type="submit">Kirim</button>-->
    <!--                            </div>-->
    <!--                        </div>-->
    <!--                    </form>-->

    <!--                </div> --}}-->
    <!--                <div class="contact__form-wrap">-->
    <!--                    <form id="contact-form" method="POST" action="{{ route('contact.send') }}">-->
    <!--                        @csrf-->
    <!--                        <div class="form-grp">-->
    <!--                            <textarea style="color: #2e2e4d" name="message" placeholder="Message" required></textarea>-->
    <!--                        </div>-->
    <!--                        <div class="row">-->
    <!--                            <div class="col-md-4">-->
    <!--                                <div class="form-grp">-->
    <!--                                    <input style="color: #2e2e4d" type="text" name="name" placeholder="Name" required>-->
    <!--                                </div>-->
    <!--                            </div>-->
    <!--                            <div class="col-md-4">-->
    <!--                                <div class="form-grp">-->
    <!--                                    <input style="color: #2e2e4d" type="email" name="email" placeholder="Email" required>-->
    <!--                                </div>-->
    <!--                            </div>-->
    <!--                            <div class="col-md-4">-->
    <!--                                <div class="form-grp">-->
    <!--                                    <input style="color: #2e2e4d" type="number" name="phone" placeholder="Phone" required>-->
    <!--                                </div>-->
    <!--                            </div>-->
    <!--                        </div>-->
    <!--                        <button type="submit" class="btn">Submit</button>-->
    <!--                    </form>-->
    <!--                    @if(session('success'))-->
    <!--                        <div class="alert alert-success mt-3" id="success-alert">-->
    <!--                            {{ session('success') }}-->
    <!--                        </div>-->
    <!--                    @endif-->
    <!--                </div>-->
    <!--            </div>-->
    <!--        </div>-->
    <!--    </div>-->
    <!--    <div class="blog-shape-wrap">-->
    <!--        <img src="{{ asset('asset/img/images/blog_shape04-new.png') }}" style="opacity: 0.2" alt="" data-aos="fade-left" data-aos-delay="400">-->
    <!--        <img src="{{ asset('asset/img/images/blog_shape03-new.png') }}" style="opacity: 0.2" alt="" data-aos="fade-right" data-aos-delay="400">-->
    <!--    </div>-->
    <!--</section>-->
    <!-- call-back-area-end -->
    <div class="footer-area">
        <div class="footer-top">
            <div class="container">
                <div class="row">
                    <div class="col-xl-4 col-lg-4 col-md-6">
                        <div class="footer-widget">
                            <div class="fw-logo mb-25">
                                <a href="#"><img src="{{ asset('assets/dist/img/logo_be2.png') }}" alt=""></a>
                            </div>
                            <div class="footer-content">
                                <p>PT Arta Teknologi Comunindo dengan merk dagang Beacon Engineering merupakan perusahaan yang bergerak dibidang produksi dan pengadaan perangkat telemetri.</p>
                                <div class="footer-social">
                                    <ul class="list-wrap">
                                        <li><a href="https://www.youtube.com/@beacon_engineering" target="_blank" rel="noopener noreferrer"><i class="fab fa-youtube"></i></a></li>
                                        <li><a href="https://www.instagram.com/beacon_engineering" target="_blank" rel="noopener noreferrer"><i class="fab fa-instagram"></i></a></li>
                                        <li>
                                            <a href="https://www.linkedin.com/company/beaconen-gineering" target="_blank" rel="noopener noreferrer">
                                                <i class="fab fa-linkedin"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
                        <div class="footer-widget">
                            <h4 class="fw-title">Information</h4>
                            <div class="footer-info-list">
                                <ul class="list-wrap">
                                    <li>
                                        <div class="icon">
                                            <img src="{{ asset('asset/img/images/telp.png') }}" alt="">
                                        </div>
                                        <div class="content">
                                            <a href="tel:02744986899">(0274) 4986899</a>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="icon">
                                            <img src="{{ asset('asset/img/images/email.png') }}" alt="">
                                        </div>
                                        <div class="content">
                                            <a href="mailto:info@bejogja.com">info@bejogja.com</a>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="icon-loc">
                                            <img src="{{ asset('asset/img/images/location.png') }}" alt="">
                                        </div>
                                        <div class="content">
                                            <a href="https://maps.app.goo.gl/iSEeHkWqByRoxwxA8" target="__blank">Kadirojo I, Purwomartani, Kec. Kalasan, Kabupaten Sleman, Daerah Istimewa Yogyakarta</a>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    {{-- <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
                        <div class="footer-widget">
                            <h4 class="fw-title">Top Links</h4>
                            <div class="footer-link-list">
                                <ul class="list-wrap">
                                    <li><a href="about.html">How it’s Work</a></li>
                                    <li><a href="contact.html">Partners</a></li>
                                    <li><a href="contact.html">Testimonials</a></li>
                                    <li><a href="contact.html">Case Studies</a></li>
                                    <li><a href="contact.html">Pricing</a></li>
                                </ul>
                            </div>
                        </div>
                    </div> --}}
                    <div class="col-xl-4 col-lg-4 col-md-6">
                        <div class="footer-widget">
                            <h4 class="fw-title">Instagram Posts</h4>
                            <div class="footer-instagram">
                                <ul class="list-wrap">
                                    @foreach ($instagramFeeds ?? [] as $feed)
                                        @if (!empty($feed['media_url']))
                                            <li>
                                                <a href="{{ $feed['permalink'] }}" target="_blank" rel="noopener noreferrer">
                                                    <img src="{{ $feed['media_url'] }}" alt="Instagram Feed" loading="lazy">
                                                </a>
                                            </li>
                                        @endif
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <div class="container">
                <div class="row align-items-center justify-content-center">
                    <div class="copyright-text text-center">
                        <p>Copyright © <a href="#">Beacon Engineering</a> | All Right Reserved</p>
                        <a href="#">Support Terms & Conditions Privacy Policy.</a>
                    </div>
                </div>
            </div>
        </div>

        {{-- <div class="footer-shape">
            <img src="{{ asset('asset/img/images/footer_shape01.png') }}" alt="" data-aos="fade-right" data-aos-delay="400">
            <img src="{{ asset('asset/img/images/footer_shape02.png') }}" alt="" data-aos="fade-left" data-aos-delay="400">
            <img src="{{ asset('asset/img/images/footer_shape03.png') }}" alt="" data-parallax='{"x" : 100 , "y" : -100 }'>
        </div> --}}
    </div>
{{-- </footer> --}}
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const successAlert = document.getElementById('success-alert');
        const form = document.getElementById('contact-form');

        // console.log('successAlert:', successAlert); // cek apakah alert ditemukan

        if (successAlert) {
            setTimeout(() => {
                successAlert.style.display = 'none';
            }, 3000);

            if (form) {
                form.reset();
            }
        }
    });
</script>



