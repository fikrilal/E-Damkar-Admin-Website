
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

                <div class="search-box p-4">
                    <div class="icon">
                        <i class="bi bi-search"></i>
                    </div>
                    <form action="{{ route('landingberita.index') }}" method="GET">
                        <input type="search" name="search" id="search" class="rounded-pill" placeholder="Cari artikel berita" value="{{ $search ?? '' }}">
                    </form>
                </div>

                <div class="row">
                    @forelse($artikel as $item)
                    <div class="col-lg-4 p-3">
                        <div class="post-box">
<<<<<<< HEAD
                            <div class="post-img"><img src="{{ asset('img-berita/' . $item->foto_artikel_berita) }}" class="img-fluid" 
                            alt="{{ $item->judul_berita }}" style="width: 1000px; height: 400px;"></div>
                            <span class="post-date">{{ \Carbon\Carbon::parse($item->tgl_berita)->locale('id')
                                ->isoFormat('dddd, D MMMM YYYY') }}</span>
                            <h3 class="post-title">{{ $item->judul_berita }}</h3>
                            <p>{{ $item->deskripsi_berita }}</p>
                            <a href="{{ route('detailberita.show', ['id_berita' => $item->id_berita]) }}" class="readmore 
                            stretched-link mt-auto"><span>Baca Selengkapnya</span><i
=======
                            <div class="post-img"><img src="{{ asset('img-berita/' . $item->foto_artikel_berita) }}" class="img-fluid" alt="{{ $item->judul_berita }}" style="width: 1000px; height: 400px;"></div>
                            <span class="post-date">{{ \Carbon\Carbon::parse($item->tgl_berita)->locale('id')->isoFormat('dddd, D MMMM YYYY') }}</span>
                            <h3 class="cc">{{ $item->judul_berita }}</h3>
                            <p>{{ Str::limit($item->deskripsi_berita, 100, '...') }}</p>
                            <a href="{{ route('detailberita.show', ['id_berita' => $item->id_berita]) }}" class="readmore stretched-link mt-auto"><span>Baca Selengkapnya</span><i
>>>>>>> 6dbf9903d4125ad4c0fe223a4d298b99bdb9f28e
                                    class="bi bi-arrow-right"></i></a>
                        </div>
                    </div>
                    @empty
                    <div class="col-lg-12 text-center">
                        <p>Tidak ada artikel yang ditemukan.</p>
                    </div>
                    @endforelse
                </div>

            </div>

        </section><!-- End Recent Blog Posts Section -->
    </main><!-- End #main -->
@endsection