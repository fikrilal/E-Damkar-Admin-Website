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
                    <th scope="col">Nama Pelapor</th>
                    <th scope="col">Urgensi</th>
                    <th scope="col">Deskripsi Laporan</th>
                    <th scope="col">Detail</th>
                    <!-- <th scope="col">Dokumen</th> -->
                    <th scope="col">Status</th>
                  
                  </tr>
                </thead>


                <tbody>
                  @php $no = 1; @endphp
                  @foreach($data as $laporan)

                  <tr>
                    <th scope="row">{{ $no++ }}</th>
                    <td>{{ date('d-m-Y', strtotime($laporan->detailLaporanPengguna->tgl_pelaporan)) }} ({{$laporan->detailLaporanPengguna->waktu_pelaporan}} WIB)</td>
                    <td>{{$laporan->detailLaporanPengguna->user_listdata->namaLengkap}}</td>
                    <td>{{$laporan->detailLaporanPengguna->urgensi}}</td>
                    <td>{{$laporan->detailLaporanPengguna->deskripsi_laporan}}</td>

                    <td><a href="#" type="button" class="btn btn-primary" data-bs-toggle="modal" 
                    data-bs-target="#largeModalTampil{{ $laporan->idLaporan}}">Cek Detail</td>

                    <!-- <td> 
                    @if($laporan->status_riwayat_id == 3)
                    <a href="{{ route('cetak-laporan', ['idLaporan' => $laporan->idLaporan]) }}" target="blank" class="btn btn-warning">Unduh
                    </a>
                    @elseif($laporan->status_riwayat_id == 4)
                    <a href="#" class="btn btn-light">Tidak Tersedia
                    </a>
                    @else
                      
                    @endif
                  </td> -->


                    <td>
                      @if($laporan->status_riwayat_id == 4)
                          <button type="button" class="btn btn-success">{{$laporan->statusRiwayat->nama_status}}</button>
                      @elseif($laporan->status_riwayat_id == 5)
                          <button type="button" class="btn btn-danger">{{$laporan->statusRiwayat->nama_status}}</button>
                      @else
                          <button type="button" class="btn btn-default">{{$laporan->statusRiwayat->nama_status}}</button>
                      @endif
                  </td>

              
              
                  <div class="modal fade" id="largeModalTampil{{  $laporan->idLaporan }}" tabindex="-1">
                <div class="modal-dialog modal-xl">
                  <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title">Laporan Selesai <small>({{$laporan->KategoriLaporan->nama_kategori}})</small></h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <!-- General Form Elements -->
              <form class="form-validate" id="artikeledukasi_form" method="POST" action="{{ route('laporan.update-status', $laporan->idLaporan) }}" 
              enctype="multipart/form-data">
               {!! csrf_field() !!}
               {!! isset($berita) ? method_field('PUT') : '' !!}

                <input type="hidden" name="id" value="{{ $laporan->idLaporan}}"/></br>

               <b> Informasi Pelapor</b><hr>

                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Nama Pelapor</label>
                  <div class="col-sm-10">
                    <input type="text" name="deskripsi_laporan" value="{{ isset($laporan) ? $laporan->detailLaporanPengguna->user_listdata->namaLengkap : '' }}"
                     class="form-control" disabled>
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">No Hp</label>
                  <div class="col-sm-10">
                    <input type="text" name="deskripsi_laporan" value="{{ isset($laporan) ? $laporan->detailLaporanPengguna->user_listdata->noHp : '' }}"
                     class="form-control" disabled>
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Deskripsi Laporan</label>
                  <div class="col-sm-10">
                      <textarea style="width: 100%;" disabled>{{ isset($laporan) ? $laporan->detailLaporanPengguna->deskripsi_laporan : '' }}</textarea>
                  </div>

                </div>
              
                <div class="row mb-3">
                <label for="inputText" class="col-sm-2 col-form-label">Alamat Kejadian</label>
                <div class="col-sm-8">
                  <input type="text" name="alamat_kejadian" value="{{ isset($laporan) ? $laporan->detailLaporanPengguna->alamat : '' }}" class="form-control" disabled>
                </div>
                <div class="col-sm-2">
                  @if(!empty($laporan->detailLaporanPengguna->latitude) && !empty($laporan->detailLaporanPengguna->longitude))
                    <a href="https://www.google.com/maps/search/?api=1&query={{ $laporan->detailLaporanPengguna->latitude}},{{ $laporan->detailLaporanPengguna->longitude}}" target="_blank" class="btn btn-primary btn-block">Cek Lokasi</a>
                  @else
                    <a href="javascript:void(0);" style="display: none;" class="btn btn-primary btn-block">Cek Lokasi</a>
                  @endif
                </div>
              </div>

                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Bukti Kejadian</label>
                  <div class="col-sm-10">
                  <img src="{{ asset('storage/gambar_pelaporans/'.$laporan->detailLaporanPengguna->bukti_foto_laporan_pengguna) }}" width="40%">
                  </div>
                </div>

</br>
                <b>Informasi Petugas</b><hr>

                @if($laporan->kategori_laporan_id == 1 || $laporan->kategori_laporan_id == 2 || $laporan->kategori_laporan_id == 3 || $laporan->kategori_laporan_id == 5)

                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Deskripsi Petugas</label>
                  <div class="col-sm-10">
                    <input type="text" name="deskripsi_laporan" value="{{ isset($laporan) ? $laporan->detailLaporanPetugas->deskripsi_petugas : '' }}"
                     class="form-control" disabled>
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Korban Jiwa</label>
                  <div class="col-sm-10">
                    <input type="text" name="deskripsi_laporan" value="{{ isset($laporan) ? $laporan->detailLaporanPetugas->korban_jiwa : '' }}"
                     class="form-control" disabled>
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Korban Luka</label>
                  <div class="col-sm-10">
                    <input type="text" name="deskripsi_laporan" value="{{ isset($laporan) ? $laporan->detailLaporanPetugas->korban_luka : '' }}"
                     class="form-control" disabled>
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Kerugian</label>
                  <div class="col-sm-10">
                    <input type="text" name="deskripsi_laporan" value="{{ isset($laporan) ? $laporan->detailLaporanPetugas->kerugian : '' }}"
                     class="form-control" disabled>
                  </div>
                </div>
                

                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Bukti Penanganan</label>
                  <div class="col-sm-10">
                  <img src="{{ asset('storage/bukti_penanganan/'.$laporan->detailLaporanPetugas->bukti_foto_laporan_petugas) }}" width="40%">
                  </div>
                </div>

                @else

                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Obyek</label>
                  <div class="col-sm-10">
                    <input type="text" name="deskripsi_laporan" value="{{ isset($laporan) ? $laporan->detailLaporanPengguna->nama_hewan : '' }}"
                     class="form-control" disabled>
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Team Evakuasi</label>
                  <div class="col-sm-10">
                    <input type="text" name="deskripsi_laporan" value="{{ isset($laporan) ?$laporan->detailLaporanPetugas->team_evakuasi : '' }}"
                     class="form-control" disabled>
                  </div>
                </div>


                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Bukti Penanganan</label>
                  <div class="col-sm-10">
                  <img src="{{ asset('storage/bukti_penanganan/'.$laporan->detailLaporanPetugas->bukti_foto_laporan_petugas) }}" width="40%">
                  </div>
                </div>
                @endif

                <div class="row mb-3">
</div>
                    </div>
                    <div class="modal-footer">
                    @if($laporan->status_riwayat_id == 4)
                        <a href="{{ route('cetak-laporan', ['idLaporan' => $laporan->idLaporan]) }}" target="_blank" class="btn btn-warning">
                        <i class="bi bi-printer"></i></i> Cetak Laporan
                        </a>

                        <!-- <a href="{{ route('cetak-pdf', ['idLaporan' => $laporan->idLaporan]) }}" class="btn btn-warning">
                            <i class="bi bi-download"></i> Unduh Laporan
                        </a> -->

                        <a href="" class="btn btn-warning">
                            <i class="bi bi-download"></i> Unduh Laporan
                        </a>

                        
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
        </div>
      </div>
    </section>

  </main><!-- End #main -->

  @endsection
