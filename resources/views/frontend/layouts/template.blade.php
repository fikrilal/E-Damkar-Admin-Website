<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>{{ $title ?? config('app.name') }} | E-Damkar Nganjuk</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="{{ asset('frontend2/assets/img/logobolo.png')}}" rel="icon">
    <link href="{{ asset('frontend2/assets/img/apple-touch-icon.png')}}" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('frontend2/assets/vendor/aos/aos.css')}}" rel="stylesheet">
    <link href="{{ asset('frontend2/assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{ asset('frontend2/assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
    <link href="{{ asset('frontend2/assets/vendor/glightbox/css/glightbox.min.css')}}" rel="stylesheet">
    <link href="{{ asset('frontend2/assets/vendor/remixicon/remixicon.css')}}" rel="stylesheet">
    <link href="{{ asset('frontend2/assets/vendor/swiper/swiper-bundle.min.css')}}" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{ asset('frontend2/assets/css/style.css')}}" rel="stylesheet">

    <!-- =======================================================
  * Template Name: FlexStart
  * Updated: Mar 10 2023 with Bootstrap v5.2.3
  * Template URL: https://bootstrapmade.com/flexstart-bootstrap-startup-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>
@include('frontend/layouts.navbar')
@yield('content')

    <!-- ======= Footer ======= -->
    <footer id="footer" class="footer">
        <div class="footer-top">
            <div class="container">
                <div class="row gy-4">
                    <div class="col-lg-5 col-md-12 footer-info">
                        <a href="index.html" class="logo d-flex align-items-center">
                            <img src="{{ asset('frontend2/assets/img/logobolo.png')}}" alt="">
                            <span>E-Damkar Nganjuk</span>
                        </a>
                        <p>
                        Dinas Pemadam Kebakaran dan Penyelamatan
                        </p>
                        <p>Jalan Raya Kedondong, Guyangan, Bagor, Sanggrahan, Kedondong, Kec. Nganjuk, Kabupaten Nganjuk.</p>
                        <div class="social-links mt-3">
                            <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
                            <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                            <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                            <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
                        </div>
                    </div>

                    <div class="col-lg-2 col-6 footer-links">
                        <h4>Sumber Daya</h4>
                        <ul>
                            <li><i class="bi bi-chevron-right"></i> <a href="#">Agenda</a></li>
                            <li><i class="bi bi-chevron-right"></i> <a href="#">Berita</a></li>
                            <li><i class="bi bi-chevron-right"></i> <a href="#">Edukasi</a></li>
                        </ul>
                    </div>

                    <div class="col-lg-2 col-6 footer-links">
                        <h4>Media Sosial</h4>
                        <ul>
                            <li><a href="https://wa.me/628516023639">Whatsapp</a> <i class="bi bi-reply"></i></li>
                            <li><a href="https://www.instagram.com/humas_damkarnganjuk/">Instagram</a> <i class="bi bi-chevron-right"></i> </li>
                            <li><a href="#">Facebook</a> <i class="bi bi-chevron-right"></i></li>
                        </ul>
                    </div>

                    <div class="col-lg-2 col-6 footer-links">
                        <h4>Hubungi Kami</h4>
                        <ul>
                            <li><i class="bi bi-telephone"></i> <a href="#">085156023639</a></li>
                            <li><i class="bi bi-envelope"></i> <a href="#">thedamkar@gmail.com</a></li>
                        </ul>
                    </div>

                </div>
            </div>
        </div>

        <div class="container">
            <div class="copyright">
                &copy; Copyright <strong><span>Dinas Pemadam Kebakaran dan Penyelamatan</span></strong>. Kab. Nganjuk
            </div>
           
        </div>
    </footer><!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="{{ asset('frontend2/assets/vendor/purecounter/purecounter_vanilla.js')}}"></script>
    <script src="{{ asset('frontend2/assets/vendor/aos/aos.js')}}"></script>
    <script src="{{ asset('frontend2/assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{ asset('frontend2/assets/vendor/glightbox/js/glightbox.min.js')}}"></script>
    <script src="{{ asset('frontend2/assets/vendor/isotope-layout/isotope.pkgd.min.js')}}"></script>
    <script src="{{ asset('frontend2/assets/vendor/swiper/swiper-bundle.min.js')}}"></script>
    <script src="{{ asset('frontend2/assets/vendor/php-email-form/validate.js')}}"></script>

    <!-- Template Main JS File -->
    <script src="{{ asset('frontend2/assets/js/main.js')}}"></script>

</body>

</html>
