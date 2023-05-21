@extends('backend/layouts.template')
@section('content')

<main id="main" class="main">

    <div class="pagetitle">
      <h1>Agenda</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="">Home</a></li>
          <li class="breadcrumb-item active">Agenda</li>
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
              <h5 class="card-title">Agenda</h5>
              <p>Berikut adalah daftar Agenda yang sudah dipublikasikan.</p>
               <!-- Large Modal -->
             <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#largeModal">
             <i class="bi bi-plus"></i> Tambahkan Agenda
              </button>

              <div class="modal fade" id="largeModal" tabindex="-1">
                <div class="modal-dialog modal-xl">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">Tambahkan Agenda</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                      <!-- General Form Elements -->
              <form class="form-validate" id="artikeledukasiform" method="POST" action="{{ route('agenda.store') }}" enctype="multipart/form-data">
               {!! csrf_field() !!}
               <input type="hidden" name="id" value="{{ Auth::user()->id }}"></br>
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Judul Agenda</label>
                  <div class="col-sm-10">
                    <input type="text" name="judul_agenda" id="judul_agenda" class="form-control" value="{{ old('judul') }}">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="inputNumber" class="col-sm-2 col-form-label">Foto Agenda</label>
                  <div class="col-sm-10">
                    <input class="form-control" name="foto" id="foto" type="file" id="formFile"  accept="image/png, image/jpeg">
                  </div>
                </div>
           
                
                <div class="row mb-3">
                  <label for="inputEmail" class="col-sm-2 col-form-label">Deskripsi Agenda</label>
                  <div class="col-sm-10">
                    <textarea type="text" name="deskripsi_agenda" id="deskripsi_agenda" class="form-control quill-editor-full" value="{{ old('isi_artikel') }}"></textarea>
                  </div>
                </div>
                
           
                <div class="row mb-3">
</div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
                      <button type="submit" class="btn btn-primary">Publikasikan</button>
                    </div>
                      </form><!-- End General Form Elements -->
                  </div>
                </div>
              </div><!-- End Large Modal-->


              <!-- Table with stripped rows -->
              <table class="table datatable">
             
                <thead>
                  <tr>
                    <th scope="col">No</th>
                    <th scope="col">Judul Agenda</th>
                    <th scope="col">Tanggal</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                @php $no = 1; @endphp
                @foreach($agenda as $a)
                  <tr>
                    <th scope="row">{{ $no++ }}</th>
                    <td>{{$a->judul_agenda}}</td>
                    <td>{{ date('d-m-Y', strtotime($a->tgl_agenda)) }}</td>
                    <td><a href="#" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#largeModalEdit{{ $a->id_agenda }}"><i class="bi bi-pen"></i> Edit</a>
                    <a href="#" type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#largeModalHapus{{ $a->id_agenda }}"><i class="bi bi-trash"></i> Hapus</a>

                    </td>


           <!-- Tampilan Modal -->
            <div class="modal fade" id="largeModalHapus{{ $a->id_agenda }}" tabindex="-1">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Konfirmasi Hapus Agenda</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            Apakah anda yakin ingin menghapus artikel ini?
                            <form action="{{ route('agenda.destroy', $a->id_agenda) }}" method="POST">
                                @csrf
                                @method('DELETE')
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-primary">Hapus</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

<!-- End Basic Modal-->
                    
              <div class="modal fade" id="largeModalEdit{{ $a->id_agenda }}" tabindex="-1">
                <div class="modal-dialog modal-xl">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">Update Edukasi</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <!-- General Form Elements -->
              <form class="form-validate" id="artikeledukasi_form" method="POST" action="{{ isset($a) ? route('agenda.update',$a->id_agenda) :
              route('agenda.store') }}" enctype="multipart/form-data">
               {!! csrf_field() !!}
               {!! isset($a) ? method_field('PUT') : '' !!}

                <input type="hidden" name="id" value="{{ $a->id_agenda }}"></br>
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Judul Agenda</label>
                  <div class="col-sm-10">
                    <input type="text" name="judul_agenda" id="judul_agenda" value="{{ isset($a) ? $a->judul_agenda : '' }}" class="form-control">
                  </div>
                </div>

                  <div class="row mb-3">
                  <label for="inputNumber" class="col-sm-2 col-form-label">Foto Agenda</label>
                  <div class="col-sm-10">
                  <img src="{{ asset('img-agenda/'.$a->foto_artikel_agenda) }}" width="30%">
                  <p></p>
                    <input class="form-control" name="foto" id="foto" type="file" accept="image/png, image/jpeg">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="inputEmail" class="col-sm-2 col-form-label">Deskripsi Agenda</label>
                  <div class="col-sm-10">
                  <textarea name="deskripsi_agenda" id="deskripsi_agenda" class="form-control quill-editor-full">{{ isset($a) ? $a->deskripsi : '' }}
                  </textarea>
                  </div>
                </div>

              
                <div class="row mb-3">
</div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
                      <button type="submit" class="btn btn-primary">Update</button>
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