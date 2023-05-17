
@extends('frontend/layouts.template')
    @section('content')

    <main id="main">

        <!-- ======= Recent Blog Posts Section ======= -->
        <section id="recent-blog-posts" class="recent-blog-posts">

            <div class="container" data-aos="fade-up">

                <header class="section-header">
                    <h2></h2>
                    <p>Artikel Berita</p>
                </header>

                <div class="box">
                    <div class="container-1">
                        <span class="icon"><i class="bi bi-search"></i></span>
                        <input type="search" id="search" class="rounded-pill" placeholder="Cari artikel berita"/>
                    </div>
                </div>

              


                <div class="row">
                @foreach($artikel as $item)
                    <div class="col-lg-4 p-3">
                        <div class="post-box">
                            <div class="post-img"><img src="{{ asset('img-berita/' . $item->foto_artikel_berita) }}" class="img-fluid" alt="{{ $item->judul_berita }}" style="width: 1000px; height: 400px;"></div>
                            <span class="post-date">{{ \Carbon\Carbon::parse($item->tgl_berita)->locale('id')->isoFormat('dddd, D MMMM YYYY') }}</span>
                            <h3 class="post-title">{{ $item->judul_berita }}</h3>
                            <p>{{ $item->deskripsi_berita }}</p>
                            <a href="{{ route('detailberita.show', ['id_berita' => $item->id_berita]) }}" class="readmore stretched-link mt-auto"><span>Baca Selengkapnya</span><i
                                    class="bi bi-arrow-right"></i></a>
                        </div>
                    </div>
                @endforeach
                </div>
            </div>

        </section><!-- End Recent Blog Posts Section -->


    </main><!-- End #main -->
@endsection