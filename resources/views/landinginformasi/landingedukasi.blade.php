
@extends('frontend/layouts.template')
    @section('content')

    <main id="main">

        <!-- ======= Recent Blog Posts Section ======= -->
        <section id="recent-blog-posts" class="recent-blog-posts">

            <div class="container" data-aos="fade-up">

                <header class="section-header">
                    <h2></h2>
                    <p>Artikel Edukasi</p>
                </header>

                <div class="search-box p-4">
                    <div class="icon">
                        <i class="bi bi-search"></i>
                    </div>
                    <form action="{{ route('landingedukasi.index') }}" method="GET">
                        <input type="search" name="search" id="search" class="rounded-pill" placeholder="Cari artikel edukasi" value="{{ $search ?? '' }}">
                    </form>
                </div>

                <div class="row">
                    @forelse($artikel as $item)
                    <div class="col-lg-4 p-3">
                        <div class="post-box">
                            <div class="post-img"><img src="{{ asset('img-edukasi/' . $item->foto_artikel_edukasi) }}" class="img-fluid" alt="{{ $item->judul_edukasi }}" style="width: 1000px; height: 400px;"></div>
                            <span class="post-date">{{ \Carbon\Carbon::parse($item->tgl_edukasi)->locale('id')->isoFormat('dddd, D MMMM YYYY') }}</span>
                            <h3 class="cc">{{ $item->judul_edukasi }}</h3>
                            <p>@php
                        $deskripsi = explode(' ', $item->deskripsi);
                        $deskripsi = array_slice($deskripsi, 0, 10);
                        $deskripsi = implode(' ', $deskripsi);
                        $deskripsi = rtrim($deskripsi, ',.!?:;'); // Menghapus tanda baca di akhir kalimat
                        $deskripsi .= ' ...'; // Menambahkan tanda elipsis sebagai penanda akhir kalimat
                    @endphp
                    {{ $deskripsi }}</p>
                            <a href="{{ route('detailedukasi.show', ['id_edukasi' => $item->id_edukasi]) }}" class="readmore stretched-link mt-auto"><span>Baca Selengkapnya</span><i
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