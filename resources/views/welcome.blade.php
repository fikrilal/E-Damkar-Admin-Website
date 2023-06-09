@extends('frontend/layouts.template')
@section('content')

<!-- ======= Hero Section ======= -->
<section id="" class="hero d-flex align-items-center">

    <div class="container">
        <div class="row">
            <div class="col-lg-6 d-flex flex-column justify-content-center">
                <h1 data-aos="fade-up">Menjawab Panggilan Selama Lebih dari 100 Tahun</h1>
                <h2 data-aos="fade-up" data-aos-delay="400">Selamat datang di situs web kami, tempat dimana keselamatan
                    dan keamanan menjadi prioritas utama. Kami adalah perusahaan
                    pemadam kebakaran yang berkomitmen untuk memberikan
                    layanan cepat, efektif, dan efisien dalam menangani kebakaran</h2>
                <div data-aos="fade-up" data-aos-delay="600">
                    <div class="text-center text-lg-start">
                        <a href="#about"
                            class="btn-get-started scrollto d-inline-flex align-items-center justify-content-center align-self-center">
                            <span>Unduh Aplikasi</span>
                            <i class="bi bi-arrow-down-circle"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 hero-img" data-aos="zoom-out" data-aos-delay="200">
                <img src="{{ asset('frontend2/assets/img/homegambar.png')}}" class="img-fluid" alt="">
            </div>
        </div>
    </div>

</section><!-- End Hero -->
<section id="hero" class="counts">
    <div class="container" data-aos="fade-up">

    @foreach ($data as $item)

        <div class="row gy-4">

            <div class="col-lg-3 col-md-6">
                <div class="count-box">
                    <i class="bi bi-car-front-fill"></i>
                    <div>
                        <span data-purecounter-start="0" data-purecounter-end="{{ $item->jumlah_mobil }}" data-purecounter-duration="1"
                            class="purecounter"></span>
                        <p>Unit Mobil</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="count-box">
                    <i class="bi bi-people" i></i>
                    <div>
                        <span data-purecounter-start="30" data-purecounter-end="{{ $item->jumlah_personil }}" data-purecounter-duration="1"
                            class="purecounter"></span>
                        <p>Personil</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="count-box">
                    <i class="bi bi-journal-richtext"></i>
                    <div>
                        <span data-purecounter-start="0" data-purecounter-end="{{ $data1 }}" data-purecounter-duration="1"
                            class="purecounter"></span>
                        <p>Laporan Selesai</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="count-box">
                    <i class="bi bi-buildings"></i>
                    <div>
                        <span data-purecounter-start="0" data-purecounter-end="{{ $item->jumlah_kantor }}" data-purecounter-duration="1"
                            class="purecounter"></span>
                        <p>Kantor Damkar</p>
                    </div>
                </div>
            </div>


            @endforeach
        </div>

    </div>
</section><!-- End Counts Section -->


<main id="main">
    <!-- ======= About Section ======= -->
    <section id="hero" class="about">

        <div class="container" data-aos="fade-up">
            <div class="row gx-0">

                <div class="col-lg-6 d-flex flex-column justify-content-center" data-aos="fade-up" data-aos-delay="200">

                    <img src="{{ asset('frontend2/assets/img/edamkar1.png')}}" class="img-fluid" alt="">
                </div>

                <div class="col-lg-6 d-flex align-items-center" data-aos="zoom-out" data-aos-delay="200">
                    <div class="content">
                        <h2 style="text-align: justify;">Apa itu E-Damkar Nganjuk?</h2>
                        <p style="text-align: justify; font-size: 14px;">
                        E-DAMKAR merupakan sebuah sistem informasi yang inovatif yang dikembangkan oleh Dinas Pemadam Kebakaran dan Penyelamatan 
                        Kabupaten Nganjuk. Sistem ini dirancang sebagai solusi modern untuk memfasilitasi kegiatan operasional dan penanganan keadaan darurat. 
                        E-DAMKAR menggunakan pendekatan berbasis mobile, memungkinkan petugas pemadam kebakaran dan penyelamatan untuk mengakses informasi dan 
                        melakukan tindakan dengan cepat dan efektif di lapangan.
                        </p>
                        <p style="text-align: justify; font-size: 14px;">
                        Selain itu, E-DAMKAR juga terintegrasi dengan website resmi Dinas Pemadam Kebakaran dan Penyelamatan Kabupaten Nganjuk. 
                        Hal ini memungkinkan masyarakat luas dan pihak terkait untuk mendapatkan akses yang mudah dan cepat terhadap informasi 
                        terkini, pengaduan, serta fitur-fitur lainnya yang disediakan oleh sistem ini.
                        </p>
                        <p style="text-align: justify; font-size: 14px;">
                        Dengan adanya integrasi antara aplikasi berbasis mobile dan website, E-DAMKAR memastikan bahwa informasi yang diperlukan 
                        dapat diperoleh dengan mudah dan dalam waktu nyata oleh semua pihak yang terlibat. Sistem ini menjadi langkah maju dalam 
                        meningkatkan kesiapsiagaan dan penanganan keadaan darurat di Kabupaten Nganjuk, menjadikan masyarakat lebih aman dan terlindungi.
                        </p>
                    </div>
                </div>

            </div>
        </div>
    </section><!-- End About Section -->

    <section id="hero" class="about">

        <div class="container" data-aos="fade-up">
            <div class="row gx-0">

            <div class="col-lg-6 d-flex align-items-center justify-content-center" data-aos="zoom-out" data-aos-delay="200">
                    <div class="content">
                        <h2 style="text-align: justify;">Bagaimana Cara Kerja E-Damkar?</h2>
                        <p style="text-align: justify; font-size: 14px;  margin-bottom: 10px;">
                        E-Damkar bekerja sebagai sistem informasi yang mengintegrasikan teknologi mobile dan website untuk 
                        memfasilitasi kegiatan operasional dan penanganan keadaan darurat oleh Dinas Pemadam Kebakaran dan 
                        Penyelamatan Kabupaten Nganjuk. Berikut adalah cara kerja E-Damkar secara umum:
                        </p>
                        <p style="text-align: justify; font-size: 14px;  margin-bottom: 10px;">
                        Melalui mobile, masyarakat dapat melaporkan kejadian, mengajukan permintaan bantuan, atau mendapatkan 
                        informasi mengenai upaya penanggulangan kebakaran dan penyelamatan, serta menggunakan fitur-fitur lain 
                        yang disediakan oleh sistem ini. Dan melalui website petugas pemadam kebakaran dan penyelamatan dapat 
                        mengakses informasi dan melakukan tindakan dengan cepat dan efektif di lapangan. Selain itu, website ini 
                        juga menjadi sumber informasi bagi pihak terkait, seperti masyarakat umum yang ingin mengetahui informasi 
                        terkini seputar pemadam kebakaran dan penyelamatan di Kabupaten Nganjuk.
                        </p>
                        <p style="text-align: justify; font-size: 14px;">
                        Dengan cara kerjanya yang terintegrasi dan berbasis teknologi, E-Damkar bertujuan untuk meningkatkan 
                        kesiapsiagaan, efisiensi, dan efektivitas dalam penanganan keadaan darurat, serta memberikan akses informasi 
                        yang mudah dan cepat kepada masyarakat luas.
                        </p>
                    </div>
                </div>
                <div class="col-lg-6 d-flex flex-column justify-content-center" data-aos="fade-up" data-aos-delay="200">
                    <img src="{{ asset('frontend2/assets/img/edamkar2.png')}}" class="img-fluid" alt="">
                </div>

            </div>
        </div>
    </section><!-- End About Section -->

    <!-- ======= Features Section ======= -->
    <section id="layanan" class="features">
        <!-- Feature Icons -->
        <div class="row feature-icons" data-aos="fade-up">
            <h3>Layanan E-Damkar</h3>

            <div class="row">

                <div class="col-xl-4 text-center" data-aos="fade-right" data-aos-delay="100">
                    <img src="{{ asset('frontend2/assets/img/features-3.png')}}" class="img-fluid p-4" alt="">
                </div>

                <div class="col-xl-8 d-flex content">
                    <div class="row align-self-center gy-4">

                        <div class="col-md-6 icon-box" data-aos="fade-up">
                        <img src="{{ asset('frontend2/assets/img/kebakaran.png')}}" class="img-fluid" alt="" style="width: 50px; height: 50px; margin-right: 10px;"">
                        <div>
                            <h4 style="text-align: justify;">Laporan Kebakaran</h4>
                            <p style="text-align: justify;">E-Damkar akan melayani laporan dari masyarakat yang melaporkan kejadian Kebakaran dari berbagai lokasi di wilayah Kabupaten Nganjuk</p>
                        </div>
                        </div>

                        <div class="col-md-6 icon-box" data-aos="fade-up" data-aos-delay="100">
                        <img src="{{ asset('frontend2/assets/img/hewanbuas.png')}}" class="img-fluid" alt="" style="width: 50px; height: 50px; margin-right: 10px;"">
                        <div>
                            <h4 style="text-align: justify;">Laporan Hewan Buas</h4>
                            <p style="text-align: justify;">E-Damkar akan melayani laporan dari masyarakat yang melaporkan kejadian Evakuasi Penangkapan Hewan Buas dari berbagai lokasi di wilayah Kabupaten Nganjuk</p>
                        </div>
                        </div>

                        <div class="col-md-6 icon-box" data-aos="fade-up" data-aos-delay="200">
                        <img src="{{ asset('frontend2/assets/img/bencanaalam.png')}}" class="img-fluid" alt="" style="width: 50px; height: 50px; margin-right: 10px;"">
                        <div>
                            <h4 style="text-align: justify;">Laporan Bencana Alam</h4>
                            <p style="text-align: justify;">E-Damkar akan melayani laporan dari masyarakat yang melaporkan kejadian Evakuasi Bencana Alam dari berbagai lokasi di wilayah Kabupaten Nganjuk</p>
                        </div>
                        </div>

                        <div class="col-md-6 icon-box" data-aos="fade-up" data-aos-delay="300">
                        <img src="{{ asset('frontend2/assets/img/penyelamatan.png')}}" class="img-fluid" alt="" style="width: 50px; height: 50px; margin-right: 10px;"">
                        <div>
                            <h4 style="text-align: justify;">Laporan Penyelamatan</h4>
                            <p style="text-align: justify;">E-Damkar akan melayani laporan dari masyarakat yang melaporkan kejadian Evakuasi Penyelamatan dari berbagai lokasi di wilayah Kabupaten Nganjuk</p>
                        </div>
                        </div>

                    </div>
                </div>
            </div>

        </div><!-- End Feature Icons -->

        </div>

    </section><!-- End Features Section -->
    <!-- ======= Recent Blog Posts Section ======= -->
    <section id="berita" class="recent-blog-posts">

        <div class="container" data-aos="fade-up">

            <header class="section-header">
                <p>Artikel Terbaru</p>
            </header>

            <div class="row">
                @foreach($artikel as $item)
                    <div class="col-lg-4 p-3">
                        <div class="post-box">
                            <div class="post-img">
                                <img src="{{ asset('img-berita/' . $item->foto_artikel_berita) }}" class="img-fluid" alt="{{ $item->judul_berita }}" style="width: 1000px; height: 400px;">
                            </div>
                            <span class="post-date">{{ \Carbon\Carbon::parse($item->tgl_berita)->locale('id')->isoFormat('dddd, D MMMM YYYY') }}</span>
                            <h3 class="post-title">{{ $item->judul_berita }}</h3>
                            <p>
                                @php
                                    $deskripsi = explode(' ', $item->deskripsi_berita);
                                    $deskripsi = array_slice($deskripsi, 0, 10);
                                    $deskripsi = implode(' ', $deskripsi);
                                    $deskripsi = rtrim($deskripsi, ',.!?:;'); // Menghapus tanda baca di akhir kalimat
                                    $deskripsi .= ' ...'; // Menambahkan tanda elipsis sebagai penanda akhir kalimat
                                @endphp
                                {{ $deskripsi }}
                            </p>
                            <a href="{{ route('detailberita.show', ['id_berita' => $item->id_berita]) }}" class="readmore stretched-link mt-auto">
                                <span>Baca selengkapnya</span><i class="bi bi-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>


            <div class="row d-flex justify-content-center">
                <a href="/landingberita" class="button" style="background-color: #ff0000; color: #ffffff; width: 200px; height: 50px; 
                text-align: center; line-height: 50px; border-radius: 25px;">Lihat Selengkapnya <i class="bi bi-arrow-right"></i></a>
            </div>

        </div>

    </section><!-- End Recent Blog Posts Section -->
    <section id="maps" class="features">
        <!-- Feature Icons -->
        <div class="row feature-icons" data-aos="fade-up">
            <h3>Lokasi Kantor</h3>



            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1785.959770844521!2d111.88662212053033!3d-7.589568221003955!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e784ae413ea7907%3A0xf813251cb8a3e740!2sKantor%20UPTD%20PEMADAM%20KEBAKARAN!5e0!3m2!1sen!2sid!4v1680766611819!5m2!1sen!2sid"
                width="1000" height="400" style="border:0;" allowfullscreen="" loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"></iframe>



        </div><!-- End Feature Icons -->

        </div>

    </section><!-- End Features Section -->



</main><!-- End #main -->
@endsection
