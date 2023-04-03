@extends('backend/layouts.template')
@section('content')

<main id="main" class="main">

    <div class="pagetitle">
      <h1>Laporan</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">Laporan</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Laporan Selesai</h5>
              <p>Berikut adalah data laporan yang sudah selesai dilaksanakan.</p>

              <!-- Table with stripped rows -->
              <table class="table datatable">
                <thead>
                  <tr>
                    <th scope="col">No</th>
                    <th scope="col">Tanggal</th>
                    <th scope="col">Masalah Yang Diterima</th>
                    <th scope="col">Bukti Foto</th>
                    <th scope="col">Status</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th scope="row">1</th>
                    <td>03-04-2023</td>
                    <td>Kebakaran</td>
                    <td><button type="button" class="btn btn-primary">Cek Bukti</button></td>
                    <td><button type="button" class="btn btn-success">Selesai</button></td>
                  </tr>
                  <tr>
                  <th scope="row">2</th>
                    <td>03-04-2023</td>
                    <td>Ular Dalam Rumah</td>
                    <td><button type="button" class="btn btn-primary">Cek Bukti</button></td>
                    <td><button type="button" class="btn btn-success">Selesai</button></td>
                  </tr>
                  <tr>
                  <th scope="row">3</th>
                    <td>03-04-2023</td>
                    <td>Kebakaran</td>
                    <td><button type="button" class="btn btn-primary">Cek Bukti</button></td>
                    <td><button type="button" class="btn btn-success">Selesai</button></td>
                  </tr>
                  <tr>
                  <th scope="row">4</th>
                    <td>03-04-2023</td>
                    <td>Ular Dalam Rumah</td>
                    <td><button type="button" class="btn btn-primary">Cek Bukti</button></td>
                    <td><button type="button" class="btn btn-success">Selesai</button></td>
                  </tr>
                  <tr>
                  <th scope="row">5</th>
                    <td>03-04-2023</td>
                    <td>Tawon Didalam Rumah</td>
                    <td><button type="button" class="btn btn-primary">Cek Bukti</button></td>
                    <td><button type="button" class="btn btn-success">Selesai</button></td>
                  </tr>
                </tbody>
              </table>
              <!-- End Table with stripped rows -->

            </div>
          </div>

        </div>
      </div>
    </section>

  </main><!-- End #main -->

  @endsection