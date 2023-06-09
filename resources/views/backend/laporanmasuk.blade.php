@extends('backend/layouts.template')
@section('content')

<main id="main" class="main">

    <div class="pagetitle">
      <h1>Laporan</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="">Home</a></li>
          <li class="breadcrumb-item active">Laporan</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    @if (session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
    @endif

    {{-- menampilkan error validasi --}}
    @if ($errors->any())
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
      <ul>
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Laporan Masuk</h5>
              <p>Berikut adalah data laporan yang baru masuk.</p>

              <!-- Table with stripped rows -->
              <table class="table datatable">
                <thead>
                  <tr>
                    <th scope="col">No</th>
                    <th scope="col">Tanggal</th>
                    <th scope="col">Nama Pelapor</th>
                    <th scope="col">Urgensi</th>
                    <th scope="col">Deskripsi Laporan</th>
                    <th scope="col">Bukti</th>
                    <th scope="col">Status</th>
                  </tr>
                </thead>

              
                <tbody>
                @php $no = 1; @endphp
                @foreach($data as $laporan)

                  <tr>
                    <th scope="row">{{ $no++ }}</th>
                    <td>{{ date('d-m-Y', strtotime($laporan->tgl_lap)) }}</td>
                    <td>{{$laporan->user_listdata->namaLengkap}}</td> 
                    <td>{{$laporan->urgensi}}</td>
                    <td>{{$laporan->deskripsi_laporan}}</td>
                
                    <td><a href="#" type="button" class="btn btn-primary" data-bs-toggle="modal" 
                    data-bs-target="#largeModalTampil{{ $laporan->idLaporan}}">Cek Detail</td>
                    <td>
                      @if($laporan->status_riwayat_id == 1)
                          <button type="button" class="btn btn-warning">{{$laporan->statusRiwayat->nama_status}}</button>
                      @elseif($laporan->status_riwayat_id == 2)
                          <button type="button" class="btn btn-secondary">{{$laporan->statusRiwayat->nama_status}}</button>
                      @else
                          <button type="button" class="btn btn-default">{{$laporan->statusRiwayat->nama_status}}</button>
                      @endif
                  </td>


                  <!-- End Basic Modal-->
                    
              <div class="modal fade" id="largeModalTampil{{  $laporan->idLaporan }}" tabindex="-1">
                <div class="modal-dialog modal-xl">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">Detail Laporan <small>({{$laporan->KategoriLaporan->nama_kategori}})</small></h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <!-- General Form Elements -->
              <form class="form-validate" id="artikeledukasi_form" method="POST" action="{{ route('laporan.update-status', $laporan->idLaporan) }}" 
              enctype="multipart/form-data">
               {!! csrf_field() !!}
               {!! isset($berita) ? method_field('PUT') : '' !!}

                <input type="hidden" name="id" value="{{ $laporan->idLaporan}}"/></br>

                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Nama Pelapor</label>
                  <div class="col-sm-10">
                    <input type="text" name="deskripsi_laporan" value="{{ isset($laporan) ? $laporan->user_listdata->namaLengkap : '' }}"
                     class="form-control" disabled>
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">No Hp</label>
                  <div class="col-sm-10">
                    <input type="text" name="deskripsi_laporan" value="{{ isset($laporan) ? $laporan->user_listdata->noHp : '' }}"
                     class="form-control" disabled>
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Deskripsi Laporan</label>
                  <div class="col-sm-10">
                    <input type="text" name="deskripsi_laporan" value="{{ isset($laporan) ? $laporan->deskripsi_laporan : '' }}" class="form-control"
                     disabled>
                  </div>
                </div>
              
                <div class="row mb-3">
                <label for="inputText" class="col-sm-2 col-form-label">Alamat Kejadian</label>
                <div class="col-sm-8">
                  <input type="text" name="alamat_kejadian" value="{{ isset($laporan) ? $laporan->alamat_kejadian : '' }}" class="form-control" disabled>
                </div>
                <div class="col-sm-2">
                  @if(!empty($laporan->latitude) && !empty($laporan->longitude))
                    <a href="https://www.google.com/maps/search/?api=1&query={{ $laporan->latitude}},{{ $laporan->longitude}}" target="_blank" class="btn btn-primary btn-block">Cek Lokasi</a>
                  @else
                    <a href="javascript:void(0);" style="display: none;" class="btn btn-primary btn-block">Cek Lokasi</a>
                  @endif
                </div>
              </div>

                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Bukti Kejadian</label>
                  <div class="col-sm-10">
                    <!-- <img src="storage/gambar_pelaporan/kebakaran.jpeg" width="60%"> -->
                    <img src="{{ ('storage/gambar_pelaporans/'.$laporan->gambar_bukti_pelaporan.".jpg") }}" width="60%">
                  </div>
                </div>

                @if($laporan->status_riwayat_id == 2)
              <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Upload Bukti Penangganan</label>
                  <div class="col-sm-10">
                      <input type="file" name="bukti_penanganan" id="bukti_penanganan" class="form-control"  accept="image/png, image/jpeg">
                  </div>
              </div>
                @else
                    <!-- Tidak menampilkan input field jika kategori_laporan_id tidak sama dengan 4 -->
                @endif
                <div class="row mb-3">
</div>
                    </div>
                    <div class="modal-footer">
                    @csrf
                    @method('GET')
                    @if($laporan->status_riwayat_id == 2)
                        <button type="submit" class="btn btn-success" name="status" value="selesai">Selesai</button>
                    @else
                        <button type="submit" class="btn btn-dark" name="status" value="proses">Proses</button>
                        <button type="submit" class="btn btn-danger" name="status" value="tolak">Tolak</button>
                    @endif
                    </div>
                      </form><!-- End General Form Elements -->
                  </div>
                </div>
              </div><!-- End Large Modal-->
                  </tr>
                  @endforeach
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