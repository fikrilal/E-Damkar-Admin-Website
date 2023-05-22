
    <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top">
        <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

            <a href="/" class="logo d-flex align-items-center">
                <img src="{{ asset('frontend/assets/img/logobolo.png')}}" alt="">
                <span>E-Damkar Nganjuk</span>
            </a>

            <nav id="navbar" class="navbar">
                <ul>
                <li><a class="nav-link scrollto <?php echo (Request::is('/')) ? 'active' : ''; ?>" href="/">Beranda</a></li>
                <li><a class="nav-link scrollto" href="/#layanan">Layanan</a></li>
                <li><a class="nav-link scrollto <?php echo (Request::is('landingagenda') || Request::is('detailagenda*')) ? 'active' : ''; ?>" href="/landingagenda">Agenda</a></li>
    <li><a class="nav-link scrollto <?php echo (Request::is('landingedukasi') || Request::is('detailedukasi*')) ? 'active' : ''; ?>" href="/landingedukasi">Edukasi</a></li>
    <li><a class="nav-link scrollto <?php echo (Request::is('landingberita') || Request::is('detailberita*')) ? 'active' : ''; ?>" href="/landingberita">Berita</a></li>
    <li><a class="nav-link scrollto <?php echo (Request::is('landingtentang')) ? 'active' : ''; ?>" href="/landingtentang">Tentang Kami</a></li>
                <li><a class="getstarted scrollto" href="/login">Masuk <i class="bi bi-box-arrow-in-right"></i></a></li>
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar -->

        </div>
    </header><!-- End Header -->
