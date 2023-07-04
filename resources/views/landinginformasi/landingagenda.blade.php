@extends('frontend/layouts.template')

@section('content')

<main id="main">

    <!-- ======= Recent Blog Posts Section ======= -->
    <section id="recent-blog-posts" class="recent-blog-posts">

        <div class="container" data-aos="fade-up">

            <header class="section-header">
                <h2></h2>
                <p>Informasi Agenda</p>
            </header>

            <div class="row">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama Agenda</th>
                        <th scope="col">Tanggal</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($artikel as $index => $item)
                    <tr>
                        <th scope="row">{{ $index + 1 }}</th>
                        <td>{{ $item->judul_agenda }}</td>
                        <td>{{ \Carbon\Carbon::parse($item->tgl_agenda)->locale('id')->isoFormat('dddd, D MMMM YYYY') }}</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="3">Tidak ada data agenda.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>

                </div>

        </div>

    </section><!-- End Recent Blog Posts Section -->

</main><!-- End #main -->
@endsection
