@extends('frontend/layouts.template')
    @section('content')


    <section id="about" class="about section-bg">
        <div class="row about" data-aos="fade-up">
            <header class="section-header">
                <h5>
                    <p>Tentang Kami</p>
                </h5>
            </header>

            <p class="text-center">Profil, Motto, Visi dan Misi serta Struktur Organisasi dari Damkar Nganjuk</p>

        <!-- Tabs navs -->
        <ul class="nav nav-tabs nav-justified mb-3" id="ex1" role="tablist">
            <li class="nav-item" role="presentation">
                <a
                class="nav-link active"
                id="ex3-tab-1"
                data-mdb-toggle="tab"
                href="#ex3-tabs-1"
                role="tab"
                aria-controls="ex3-tabs-1"
                aria-selected="true"
                onclick="changeTab('ex3-tabs-1')"
                >
                Profil
                </a>
            </li>
            <li class="nav-item" role="presentation">
                <a
                class="nav-link"
                id="ex3-tab-2"
                data-mdb-toggle="tab"
                href="#ex3-tabs-2"
                role="tab"
                aria-controls="ex3-tabs-2"
                aria-selected="false"
                onclick="changeTab('ex3-tabs-2')"
                >
                Visi & Misi
                </a>
            </li>
            <li class="nav-item" role="presentation">
                <a
                class="nav-link"
                id="ex3-tab-3"
                data-mdb-toggle="tab"
                href="#ex3-tabs-3"
                role="tab"
                aria-controls="ex3-tabs-3"
                aria-selected="false"
                onclick="changeTab('ex3-tabs-3')"
                >
                Struktur Organisasi
                </a>
            </li>
        </ul>
        <!-- Tabs navs -->

        <!-- Tabs content -->
        <div class="tab-content" id="ex2-content">
            <div id="ex3-tabs-1" class="tab-pane" role="tabpanel" aria-labelledby="ex3-tab-1">
                <!-- Konten untuk Profil -->
                <!-- <h1>Profil</h1>
                <p>Ini adalah halaman Profil.</p> -->
            </div>
            <div id="ex3-tabs-2" class="tab-pane" role="tabpanel" aria-labelledby="ex3-tab-2">
                <!-- Konten untuk Visi & Misi -->
                <h1 class="justify-content-center">Visi</h1>
                <p style="text-align: justify; font-size: 14px;  margin-bottom: 10px;">“Menjadi lembaga yang unggul dalam memberikan perlindungan dan pelayanan kebakaran, penyelamatan, 
                    serta bantuan keadaan darurat yang profesional, tanggap, dan berkesinambungan.”
                </p>
                <h1>Misi</h1>
                <p style="text-align: justify; font-size: 14px;  margin-bottom: 10px;">
                    1. Melindungi masyarakat dari bahaya kebakaran, bencana alam, dan keadaan darurat lainnya dengan upaya pencegahan, 
                    penanggulangan, dan pemulihan. 
                </p>
                <p style="text-align: justify; font-size: 14px;  margin-bottom: 10px;">
                    2. Meningkatkan kesiapsiagaan dan kemampuan personel dalam penanganan keadaan darurat 
                    melalui pelatihan, peningkatan teknologi, dan perencanaan yang baik.
                </p>
                <p style="text-align: justify; font-size: 14px;  margin-bottom: 10px;">
                    3. Membangun kerjasama dan koordinasi dengan pihak terkait serta masyarakat dalam upaya pencegahan, penanggulangan, 
                    dan pemulihan kebakaran, penyelamatan, dan bantuan keadaan darurat.
                </p>
                <p style="text-align: justify; font-size: 14px;  margin-bottom: 10px;">
                    4. Memberikan pelayanan prima kepada masyarakat dalam penanganan keadaan darurat dengan cepat, efektif, dan aman.
                </p>
                <p style="text-align: justify; font-size: 14px;  margin-bottom: 10px;">
                    5. Mengembangkan sistem informasi yang modern dan terintegrasi untuk mendukung operasional Dinas Pemadam Kebakaran 
                    dan Penyelamatan.
                </p>
            </div>
            <div id="ex3-tabs-3" class="tab-pane" role="tabpanel" aria-labelledby="ex3-tab-3">
                <!-- Konten untuk Struktur Organisasi -->
                <!-- <h1>Struktur Organisasi</h1>
                <p>Ini adalah halaman Struktur Organisasi.</p> -->
            </div>
        </div>
        <!-- Tabs content -->
    </section><!-- End About Section -->

    <script>
    function changeTab(tabId) {
        const tabs = document.getElementsByClassName("tab-pane");
        const tabLinks = document.getElementsByClassName("nav-link");
        
        // Menyembunyikan semua konten tab
        for (let i = 0; i < tabs.length; i++) {
        tabs[i].style.display = "none";
        }
        
        // Menghapus kelas active dari semua tab link
        for (let i = 0; i < tabLinks.length; i++) {
        tabLinks[i].classList.remove("active");
        }
        
        // Menampilkan konten tab yang dipilih
        document.getElementById(tabId).style.display = "block";
        
        // Menambahkan kelas active pada tab link yang dipilih
        const activeTabLink = document.querySelector(`a[href="#${tabId}"]`);
        activeTabLink.classList.add("active");
    }
    </script>


</main><!-- End #main -->
@endsection
