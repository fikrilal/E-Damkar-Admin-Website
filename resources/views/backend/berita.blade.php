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
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">

            <h5 class="card-title">Artikel Berita</h5>
            <p>Berikut adalah daftar berita yang sudah dipublikasikan.</p> 
            <button type="button" class="btn btn-primary"><i class="bi bi-pen"></i> Tambahkan Berita</button>
              
             
              

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
                    <td>Kebakaran Terkini di Ruko Nganjuk No.19</td>
                    <td>04-04-2023</td>
                    <td><button type="button" class="btn btn-primary"><i class="bi bi-pen"></i> Edit</button>
                    <button type="button" class="btn btn-danger"><i class="bi bi-trash"></i> Hapus</button>
                    </td>
                  </tr>
                  <tr>
                    <th scope="row">2</th>
                    <td>Kebakaran Terkini di Rumah Milik Pak Zam</td>
                    <td>04-04-2023</td>
                    <td><button type="button" class="btn btn-primary"><i class="bi bi-pen"></i> Edit</button>
                    <button type="button" class="btn btn-danger"><i class="bi bi-trash"></i> Hapus</button>
                    </td>
                  </tr>
                  <tr>
                    <th scope="row">3</th>
                    <td>Kebakaran Terkini di Ladang Pak Slamet</td>
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