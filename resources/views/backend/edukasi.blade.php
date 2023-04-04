@extends('backend/layouts.template')
@section('content')

<main id="main" class="main">

    <div class="pagetitle">
      <h1>Edukasi</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="">Home</a></li>
          <li class="breadcrumb-item active">Edukasi</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Artikel Edukasi</h5>
              <p>Berikut adalah daftar artikel edukasi yang sudah dipublikasikan.</p>
              <button type="button" class="btn btn-primary "><i class="bi bi-pen"></i>  Tambahkan Artikel</button>

              <!-- Table with stripped rows -->
              <table class="table datatable">
             
                <thead>
                  <tr>
                    <th scope="col">No</th>
                    <th scope="col">Judul</th>
                    <th scope="col">Tanggal Terbit</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th scope="row">1</th>
                    <td>Tips Mengatasi Kebakaran Pemula</td>
                    <td>04-04-2023</td>
                    <td><button type="button" class="btn btn-primary"><i class="bi bi-pen"></i> Edit</button>
                    <button type="button" class="btn btn-danger"><i class="bi bi-trash"></i> Hapus</button>
                    </td>
                  </tr>
                  <tr>
                    <th scope="row">2</th>
                    <td>Pencegahan Kebakaran Pemula</td>
                    <td>04-04-2023</td>
                    <td><button type="button" class="btn btn-primary"><i class="bi bi-pen"></i> Edit</button>
                    <button type="button" class="btn btn-danger"><i class="bi bi-trash"></i> Hapus</button>
                    </td>
                  </tr>
                  <tr>
                    <th scope="row">3</th>
                    <td>KebSlametakaran Terkini di Ladang Pak </td>
                    <td>04-04-2023</td>
                    <td><button type="button" class="btn btn-primary"><i class="bi bi-pen"></i> Edit</button>
                    <button type="button" class="btn btn-danger"><i class="bi bi-trash"></i> Hapus</button>
                    </td>
                  </tr>
                  <tr>
                    <th scope="row">4</th>
                    <td>Kebakaran Terkini Gudang Milik Pak Sam</td>
                    <td>04-04-2023</td>
                    <td><button type="button" class="btn btn-primary"><i class="bi bi-pen"></i> Edit</button>
                    <button type="button" class="btn btn-danger"><i class="bi bi-trash"></i> Hapus</button>
                    </td>
                  </tr>
                  <tr>
                    <th scope="row">5</th>
                    <td>Kebakaran Terkini Sawah Milik Pak Paijo</td>
                    <td>04-04-2023</td>
                    <td><button type="button" class="btn btn-primary"><i class="bi bi-pen"></i> Edit</button>
                    <button type="button" class="btn btn-danger"><i class="bi bi-trash"></i> Hapus</button>
                    </td>
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