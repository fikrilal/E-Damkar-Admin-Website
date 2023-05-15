@extends('backend/layouts.template')
@section('content')

<main id="main" class="main">

    <div class="pagetitle">
      <h1>Pengaturan</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="">Home</a></li>
          <li class="breadcrumb-item active">Pengaturan</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    @if (session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
    @endif

    <section class="section">
    <div class="col-lg-8">

<div class="card">
  <div class="card-body">
    <h5 class="card-title">Kelola Data</h5>
    @foreach($pengaturan as $p)
    <!-- Vertical Form -->
    <form class="row g-3" id="pengaturan_form" method="POST" action="/" enctype="multipart/form-data">

    {!! csrf_field() !!}
    {!! isset($pengaturan) ? method_field('PUT') : '' !!}
      <div class="col-12">
        <label for="inputNanme4" class="form-label">Jumlah Unit Mobil</label>
        <input type="number" class="form-control" value="{{$p->jumlah_mobil}}" name="jumlah_mobil" id="jumlah_mobil">
      </div>
      <div class="col-12">
        <label for="inputEmail4" class="form-label">Jumlah Personil</label>
        <input type="number" class="form-control" value="{{$p->jumlah_personil}}" name="jumlah_personil" id="jumlah_personil">
      </div>
      <div class="col-12">
        <label for="inputPassword4" class="form-label">Jumlah Kantor</label>
        <input type="number" class="form-control" value="{{$p->jumlah_kantor}}" name="jumlah_kantor" id="jumlah_kantor">
      </div>
     
      <div class="text-center">
        <button type="submit" class="btn btn-primary">Simpan</button>
      </div>
    </form><!-- Vertical Form -->

    @endforeach

  </div>
</div>
    </section>

  </main><!-- End #main -->

  @endsection