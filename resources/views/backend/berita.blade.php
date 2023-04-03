@extends('backend/layouts.template')
@section('content')

<main id="main" class="main">

    <div class="pagetitle">
      <h1>Berita</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="">Home</a></li>
          <li class="breadcrumb-item active">Berita</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
    <div class="col-lg-8">

<div class="card">
  <div class="card-body">
    <h5 class="card-title">Pengaturan Data</h5>

    <!-- Vertical Form -->
    <form class="row g-3">
      <div class="col-12">
        <label for="inputNanme4" class="form-label">Jumlah Unit Mobil</label>
        <input type="text" class="form-control" placeholder="5" id="inputNanme4">
      </div>
      <div class="col-12">
        <label for="inputEmail4" class="form-label">Jumlah Personil</label>
        <input type="text" class="form-control" placeholder="20" id="inputEmail4">
      </div>
      <div class="col-12">
        <label for="inputPassword4" class="form-label">Jumlah Kantor</label>
        <input type="text" class="form-control" placeholder="4" id="inputPassword4">
      </div>
     
      <div class="text-center">
        <button type="submit" class="btn btn-primary">Simpan</button>
      </div>
    </form><!-- Vertical Form -->

  </div>
</div>
    </section>

  </main><!-- End #main -->

  @endsection