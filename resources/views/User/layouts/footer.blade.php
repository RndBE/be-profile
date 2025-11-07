
<!-- call-back-area-end -->
<div class="footer-area">
    <div class="footer-top">
        <div class="container">
            <div class="row">
                <div class="col-xl-4 col-lg-4 col-md-6">
                    <div class="footer-widget">
                        <div class="fw-logo mb-25">
                            <a href="/" aria-label="Logo PT Arta Teknologi Comunindo"><img src="{{ asset('assets/dist/img/logo_be2.png') }}" alt=""></a>
                        </div>
                        <div class="footer-content">
                            <p>PT Arta Teknologi Comunindo dengan merk dagang Beacon Engineering merupakan perusahaan yang bergerak dibidang produksi dan pengadaan perangkat telemetri.</p>
                            <div class="footer-social">
                                <ul class="list-wrap">
                                    <li><a href="https://www.youtube.com/@beacon_engineering" aria-label="Akun youtube PT Arta Teknologi Comunindo" target="_blank" rel="noopener noreferrer"><i class="fab fa-youtube"></i></a></li>
                                    <li><a href="https://www.instagram.com/beacon_engineering" aria-label="Akun instagram PT Arta Teknologi Comunindo" target="_blank" rel="noopener noreferrer"><i class="fab fa-instagram"></i></a></li>
                                    <li>
                                        <a href="https://www.linkedin.com/company/beaconen-gineering" aria-label="Akun linkedin PT Arta Teknologi Comunindo" target="_blank" rel="noopener noreferrer">
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
                                        <a href="tel:02744986899" aria-label="No telepon PT Arta Teknologi Comunindo">(0274) 4986899</a>
                                    </div>
                                </li>
                                <li>
                                    <div class="icon">
                                        <img src="{{ asset('asset/img/images/email.png') }}" alt="">
                                    </div>
                                    <div class="content">
                                        <a href="mailto:info@bejogja.com" aria-label="Email PT Arta Teknologi Comunindo">info@bejogja.com</a>
                                    </div>
                                </li>
                                <li>
                                    <div class="icon-loc">
                                        <img src="{{ asset('asset/img/images/location.png') }}" alt="">
                                    </div>
                                    <div class="content">
                                        <a href="https://maps.app.goo.gl/iSEeHkWqByRoxwxA8" aria-label="Alamat kantor PT Arta Teknologi Comunindo" target="__blank">Kadirojo I, Purwomartani, Kec. Kalasan, Kabupaten Sleman, Daerah Istimewa Yogyakarta</a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
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
                    <p>Copyright © <a href="/">Beacon Engineering</a> | All Right Reserved</p>
                    <a href="/">Support Terms & Conditions Privacy Policy.</a>
                </div>
            </div>
        </div>
    </div>
</div>
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



