<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>
        {{ @$title != '' ? "$title |" : '' }} {{ settings()->get('app_name', 'My APP') }}
    </title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="{{ \Storage::url(settings('app_logo')) }}" rel="icon">

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('mentor') }}/assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="{{ asset('niceadmin') }}/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('niceadmin') }}/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="{{ asset('mentor') }}/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{ asset('mentor') }}/assets/css/style.css" rel="stylesheet">

    <!-- =======================================================
  * Template Name: Mentor - v4.9.0
  * Template URL: https://bootstrapmade.com/mentor-free-education-bootstrap-theme/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top">
        <div class="container d-flex align-items-center">

            <h1 class="logo me-auto">
                <img src="{{ \Storage::url(settings()->get('app_logo')) }}">
                <a href="#">{{ settings()->get('app_name') }}</a>
            </h1>
            <!-- Uncomment below if you prefer to use an image logo -->
            <!-- <a href="index.html" class="logo me-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

            <nav id="navbar" class="navbar order-last order-lg-0">
                <ul>
                    <li><a class="active" href="#hero">Beranda</a></li>
                    <li><a href="#about1">Fasilitas dan Layanan</a></li>
                    <li><a href="#about2">Visi Misi</a></li>
                    <li><a href="#map">Lokasi</a></li>
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar -->
        </div>
    </header><!-- End Header -->

    <!-- ======= Hero Section ======= -->
    <section id="hero" class="d-flex justify-content-center align-items-center">
        <div class="container position-relative" data-aos="zoom-in" data-aos-delay="100">
            <h1>Selamat Datang,<br>Di {{ settings()->get('app_name') }}</h1>
            <h2>Kami menyediakan informasi seputar {{ settings()->get('app_name') }}
                <br> dan menyediakan sistem pembayaran spp
            </h2>
            <a href="{{ route('login') }}" class="btn-get-started">Login Pembayaran SPP</a>
        </div>
    </section><!-- End Hero -->

    <main id="main">

        <!-- ======= About Section ======= -->
        <section id="about1" class="about pb-0 pb-md-5">
            <div class="container" data-aos="fade-up">
                <div class="row">
                    <div class="col-lg-6 order-1 order-lg-2" data-aos="fade-left" data-aos-delay="100">
                        <img src="{{ asset('mentor') }}/assets/img/bg2.jpg" class="img-fluid" alt="">
                    </div>
                    <div class="col-lg-6 pt-4 pt-lg-0 order-2 order-lg-1 content">
                        <h3>Program Keahlian.</h3>
                        <ul>
                            <li><i class="bi bi-check-circle"></i> Teknik Komputer dan Jaringan</li>
                            <li><i class="bi bi-check-circle"></i> Teknik Pemesinan</li>
                            <li><i class="bi bi-check-circle"></i> Teknik Instalasi Tenaga Listrik</li>
                            <li><i class="bi bi-check-circle"></i> Teknik Sepeda Motor</li>
                            <li><i class="bi bi-check-circle"></i> Teknik Kendaraan Ringan</li>
                            <li><i class="bi bi-check-circle"></i> Kuliner</li>
                            <li><i class="bi bi-check-circle"></i> Perhotelan</li>
                        </ul>
                        <h3>Fasilitas Pendidikan.</h3>
                        <ul>
                            <li><i class="bi bi-check-circle"></i> Ruang kelas yang nyaman.</li>
                            <li><i class="bi bi-check-circle"></i> Perpustakaan.</li>
                            <li><i class="bi bi-check-circle"></i> Ruang komputer dan internet.</li>
                            <li><i class="bi bi-check-circle"></i> Lapangan olahraga.</li>
                        </ul>
                        <h3>Alamat Sekolah.</h3>
                        <ul>
                            <li>Jl. Pemandian, Blabak, Mungkid</li>
                        </ul>
                    </div>
                </div>
            </div>
        </section><!-- End About Section -->

        <!-- ======= About Section ======= -->
        <section id="about2" class="about py-0 py-md-5">
            <div class="container" data-aos="fade-up">
                <div class="row">
                    <div class="col-lg-6 order-2 order-lg-1">
                        <img src="{{ asset('mentor') }}/assets/img/bg1.jpg" class="img-fluid" alt="">
                    </div>
                    <div class="col-lg-6 pt-4 pt-lg-0 order-2 order-lg-1 content" data-aos="fade-right"
                        data-aos-delay="100">
                        <h3>Visi.</h3>
                        <ul>
                            <li><i class="bi bi-check-circle"></i> Menciptakan tamatan yang berakhlak mulia, unggul,
                                terampil, mandiri dan profesional berdasarkan imtan dan iptek.</li>
                        </ul>
                        <h3>Misi.</h3>
                        <ul>
                            <li><i class="bi bi-check-circle"></i> Meningkatkan ketaqwaan terhadap Tuhan Yang Maha Esa.
                            </li>
                            <li><i class="bi bi-check-circle"></i> Menyiapkan tamatan agar mampu bekerja mandiri,
                                produktif, kreatif, serta memiliki moral yang baik.</li>
                            <li><i class="bi bi-check-circle"></i> Meningkatkan keterampilan dan ketelitian siswa.</li>
                        </ul>
                    </div>
                </div>
            </div>
        </section><!-- End About Section -->

        <section id="map" class="contact my-5">
            <div style="overflow:hidden;width: 100%;position: relative;">
                <iframe width="1366" height="350" src="https://maps.google.com/maps?width=1366&amp;height=350&amp;hl=en&amp;q=SMK%20Muhammadiyah%20Mungkid+(SMK%20Muhammadiyah%20Mungkid)&amp;ie=UTF8&amp;t=&amp;z=12&amp;iwloc=B&amp;output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0">
                </iframe>
                <div style="position: absolute;width: 80%;bottom: 10px;left: 0;right: 0;margin-left: auto;margin-right: auto;color: #000;text-align: center;">
                    <small style="line-height: 1.8;font-size: 2px;background: #fff;">Powered by <a href="https://embedgooglemaps.com/">Embed Google Maps</a>
                    </small>
                </div>
                <style>#gmap_canvas img{max-width:none!important;background:none!important}</style>
            </div><br />
        </section>

    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer">

        <div class="footer-top">
            <div class="container">
                <div class="row">

                    <div class="col-lg-3 col-md-6 footer-contact">
                        <h3>{{ settings()->get('app_name') }}</h3>
                        <p>
                            Jalan Pemandian<br>
                            Desa Mungkid<br>
                            Kecamatan Mungkid, Magelang <br><br>
                            <strong>Phone:</strong> {{ settings()->get('app_phone') }} atau
                            {{ settings()->get('no_wa_operator') }}<br>
                            <strong>Email:</strong> {{ settings()->get('app_email') }}<br>
                        </p>
                    </div>

                    <div class="col-lg-4 col-md-6 footer-newsletter">
                        <h4>Informasi Lebih Lanjut</h4>
                        <p>Silahkan hubungi nomor telepon / wa serta alamat email yang tertera, terima kasih.</p>
                    </div>

                </div>
            </div>
        </div>

        <div class="container d-md-flex py-4">

            <div class="me-md-auto text-center text-md-start" style="font-size: 13px;">
                <div class="copyright">
                    Build with Laravel
                </div>
                <div class="credits">
                    Tema: <a href="#">BootstrapMade</a> & Mentor
                </div>
            </div>
        </div>
    </footer><!-- End Footer -->

    <div id="preloader"></div>
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="{{ asset('mentor') }}/assets/vendor/purecounter/purecounter_vanilla.js"></script>
    <script src="{{ asset('mentor') }}/assets/vendor/aos/aos.js"></script>
    <script src="{{ asset('niceadmin') }}/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('mentor') }}/assets/vendor/swiper/swiper-bundle.min.js"></script>

    <!-- Template Main JS File -->
    <script src="{{ asset('mentor') }}/assets/js/main.js"></script>

</body>

</html>
