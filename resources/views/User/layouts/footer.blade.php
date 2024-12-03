{{-- <footer id="footer" class="footer"> --}}

    <div class="footer-newsletter">
    <div class="container">
        <div class="row justify-content-center text-center">
        <div class="col-lg-6">
            <h4>Join Our Newsletter</h4>
            <p>Subscribe to our newsletter and receive the latest news about our products and services!</p>
            <form action="forms/newsletter.php" method="post" class="php-email-form">
            <div class="newsletter-form"><input type="email" name="email"><input type="submit" value="Subscribe"></div>
            <div class="loading">Loading</div>
            <div class="error-message"></div>
            <div class="sent-message">Your subscription request has been sent. Thank you!</div>
            </form>
        </div>
        </div>
    </div>
    </div>
    <style>
        .logo-small {
        width: 100px;
        height: auto;
    }
    </style>
<div class="container footer-top">
    <div class="row">
        <div class="col-lg-4 col-md-6 footer-about">
            <a href="index.html" class="d-flex align-items-center">
                <img src="{{ asset('assets/dist/img/logo_be2.png') }}" alt="Logo" class="logo-small">
            </a>
            <div class="footer-contact pt-3 ">
                <p>PT Arta Teknologi Comunindo dengan merk dagang Beacon Engineering merupakan perusahaan yang bergerak dibidang produksi dan pengadaan perangkat telemetri.</p>
                <div class="social-links d-flex">
                    <a href=""><i class="bi bi-twitter-x"></i></a>
                    <a href=""><i class="bi bi-facebook"></i></a>
                    <a href=""><i class="bi bi-instagram"></i></a>
                    <a href=""><i class="bi bi-linkedin"></i></a>
                </div>
            </div>
        </div>

        <div class="col-lg-4 col-md-6 footer-links">
            <h4>Information</h4>
            <ul class="information-links">
                <li><i class="bi bi-telephone"></i> <a href="#">(0274) 4986899</a></li>
                <li><i class="bi bi-envelope"></i> <a href="#">info@bejogja.com</a></li>
                <li><i class="bi bi-pin-map"></i> <a href="#">Perum Pesona Bandara No. C-54, Cupuwatu I Purwomartani, Kec. Kalasan, Kabupaten Sleman, Daerah Istimewa Yogyakarta</a></li>
            </ul>
        </div>

        <div class="col-lg-4 col-md-12">
            <h4>Instagram Post</h4>
            <div class="social-post d-flex">
                <!-- Instagram posts will appear here -->
            </div>
        </div>
    </div>
</div>


    <div class="container copyright text-center mt-4">
    <p><span>Copyright </span>©<strong class="px-1 sitename">Beacon Engineering</strong> <span>| All Right Reserve</span></p>
    <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you've purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: [buy-url] -->
        <p>Support terms and conditions privacy policy</p>
    </div>
    </div>

{{-- </footer> --}}
