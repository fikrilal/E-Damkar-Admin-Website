@extends('frontend/layouts.template')
@section('content')

<main id="main">

<!-- ======= Recent Blog Posts Section ======= -->
<section id="recent-blog-posts" class="recent-blog-posts">
    <div class="container" data-aos="fade-up">
        <header class="section-header">
            <h3>{{ $edukasi->judul_edukasi }}</h3>
        </header>

        <!-- this is headline section -->
        <div class="container mt-3">
            
        <p><i class="bi bi-clock"></i> {{ \Carbon\Carbon::parse($edukasi->tgl_edukasi)->locale('id')->isoFormat('dddd, D MMMM YYYY') }}</p>

            <img class="rounded-4 img-fluid"
                style="object-fit: cover; width: 100%; height: auto"
                src="{{ asset('img-edukasi/' . $edukasi->foto_artikel_edukasi) }}" alt="">
            <style>
                .justify {
                    text-align: justify;
                    text-justify: inter-word;
                }
            </style>
            <p class="mt-3 justify">
                {!! nl2br(e($edukasi->deskripsi)) !!}
            </p>
        </div>

        <!-- this is list news section -->
        <div class="container mt-5 artikelhide">
            <h3>Artikel Lainnya</h3>
            <div class="row">
                @foreach($artikel1 as $artikel)
                <div class="col-md-3 col-sm-6 mb-4">
                    <a href="{{ route('detailedukasi.show', ['id_edukasi' => $artikel->id_edukasi]) }}"
                        style="color: black;">
                        <img class="rounded-4 img-fluid"
                            style="object-fit: cover; width: 100%; aspect-ratio: 1/1"
                            src="{{ asset('img-edukasi/' . $artikel->foto_artikel_edukasi) }}" alt="">
                        <p class="mt-3">
                            <b>{{ $artikel->judul_edukasi }}</b> <br>
                            {{ Str::limit($artikel->deskripsi, 50, ' ...') }}
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