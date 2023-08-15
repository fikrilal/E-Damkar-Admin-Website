@extends('frontend/layouts.template')
@section('content')

<main id="main">
    <!-- ======= Recent Blog Posts Section ======= -->
    <section id="recent-blog-posts" class="recent-blog-posts">
        <div class="container" data-aos="fade-up">
            <header class="section-header">
                <h3>{{ $berita->judul_berita }}</h3>
            </header>
            <p>{{ \Carbon\Carbon::parse($berita->tgl_berita)->locale('id')->isoFormat('dddd, D MMMM YYYY') }}</p>

            <!-- Headline section -->
            <div class="container mt-3">
                <img class="rounded-4"
                    style="object-fit: cover; width: 100%; max-height: 400px"
                    src="{{ asset('img-berita/' . $berita->foto_artikel_berita) }}"
                    alt="">
                <style>
                        .justify {
                            text-align: justify;
                            text-justify: inter-word;
                        }
                    </style>
                    <p class="mt-3 justify">
                    {!! nl2br(e($berita->deskripsi_berita)) !!}
                    </p>            </div>
        
            <!-- List news section -->
            <div class="container mt-5 artikelhide">
                <h3>Artikel Lainnya</h3>
                <div class="row">
                    @foreach($artikel1 as $artikel)
                    <div class="col-md-3 col-sm-6"><!-- Adjusted column classes -->
                        <a href="{{ route('detailberita.show', ['id_berita' => $artikel->id_berita]) }}" style="color: black;">
                            <img class="rounded-4"
                                style="object-fit: cover; width: 100%; max-height: 200px" src="{{ asset('img-berita/' . $artikel->foto_artikel_berita) }}"
                                alt="">
                            <p class="mt-3">
                                <b>{{ $artikel->judul_berita }}</b> <br />
                                {{ Str::limit($artikel->deskripsi_berita, 50, ' ...') }}
                            </p>
                        </a>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section><!-- End Recent Blog Posts Section -->
</main>


<!-- End #main -->
@endsection