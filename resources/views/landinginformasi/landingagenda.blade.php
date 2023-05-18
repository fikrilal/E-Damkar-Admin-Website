@extends('frontend/layouts.template')

@section('content')

<main id="main">

    <!-- ======= Recent Blog Posts Section ======= -->
    <section id="recent-blog-posts" class="recent-blog-posts">

        <div class="container" data-aos="fade-up">

            <header class="section-header">
                <h2></h2>
                <p>Artikel Agenda</p>
            </header>

<<<<<<< HEAD
            <div class="box">
                <div class="container-1">
                    <span class="icon"><i class="bi bi-search"></i></span>
                    <form action="{{ route('landingagenda.index') }}" method="GET"> <!-- Form pencarian -->
                        <input type="search" name="search" id="search" class="rounded-pill" placeholder="Cari artikel agenda" 
                        value="{{ $search ?? '' }}"/>
                    </form>
=======
            <div class="search-box p-4">
                <div class="icon">
                    <i class="bi bi-search"></i>
>>>>>>> 6dbf9903d4125ad4c0fe223a4d298b99bdb9f28e
                </div>
                <form action="{{ route('landingagenda.index') }}" method="GET">
                    <input type="search" name="search" id="search" class="rounded-pill" placeholder="Cari artikel agenda" value="{{ $search ?? '' }}">
                </form>
            </div>

            <div class="row">
                @forelse($artikel as $item)
                <div class="col-lg-4 p-3">
                    <div class="post-box">
                        <div class="post-img"><img src="{{ asset('img-agenda/' . $item->foto_artikel_agenda) }}" class="img-fluid" 
                        alt="{{ $item->judul_agenda }}" style="width: 1000px; height: 400px;"></div>
                        <span class="post-date">{{ \Carbon\Carbon::parse($item->tgl_agenda)->locale('id')->isoFormat('dddd, D MMMM YYYY') }}

                        </span>
                        <h3 class="cc">{{ $item->judul_agenda }}</h3>
<<<<<<< HEAD
                        <p>{{ $item->deskripsi }}</p>
                        <a href="{{ route('detailagenda.show', ['id_agenda' => $item->id_agenda]) }}" class="readmore stretched-link mt-auto">
                            <span>Baca Selengkapnya</span><i
=======
                        <p>{{ Str::limit($item->deskripsi, 100, '...') }}</p>
                        <a href="{{ route('detailagenda.show', ['id_agenda' => $item->id_agenda]) }}" class="readmore stretched-link mt-auto"><span>Baca Selengkapnya</span><i
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
