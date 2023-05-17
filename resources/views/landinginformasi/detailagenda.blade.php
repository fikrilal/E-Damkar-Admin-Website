@extends('frontend/layouts.template')
@section('content')

    <main id="main">
   
        <!-- ======= Recent Blog Posts Section ======= -->
        <section id="recent-blog-posts" class="recent-blog-posts">
            <div class="container" data-aos="fade-up">
            <header class="section-header">
                <h3>
                    <p>{{ $agenda->judul_agenda }}</p>
                </h3>
            </header>

            <p>{{ \Carbon\Carbon::parse($agenda->tgl_agenda)->locale('id')->isoFormat('dddd, D MMMM YYYY') }}</p>

            <!-- this is headline section -->
            <div class="container mt-3">
                    <img class="rounded-4"
                    style="object-fit: cover; width: 100%; height: 400px"
                    class="rounded-4" src="{{ asset('img-agenda/' . $agenda->foto_artikel_agenda) }}" alt="">
                <h6 class="mt-3">
                {{ $agenda->deskripsi }}
                </h6>
            </div>
        
            <!-- this is list news section -->
            <div class="container mt-5">
              <h3>Artikel Lainnya</h3>
              <div class="row">
                
                <div class="col-3">
                  <img
                    class="rounded-4"
                    style="object-fit: cover; width: 100%; aspect-ratio: 1/1"
                    src="https://cdn.pixabay.com/photo/2014/05/21/22/28/old-newspaper-350376__340.jpg"
                    alt=""
                  />
                  <p class="mt-3">
                    <b>Jhon Due | 20-08-2022</b> <br />
                    Lorem ipsum dolor sit amet consectetur adipisicing elit Soluta
                    accusantium praesentium ducimus
                  </p>
                </div>
                
              </div>
            </div>

        </section><!-- End Recent Blog Posts Section -->

    </main><!-- End #main -->
@endsection