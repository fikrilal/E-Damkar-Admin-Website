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

            <h5 class="card-title">Artikel Berita</h5>
            <p>Berikut adalah daftar berita yang sudah dipublikasikan.</p> 
           
             <!-- Large Modal -->
             <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#largeModal">
             <i class="bi bi-plus"></i> Tambahkan Berita
              </button>

              <div class="modal fade" id="largeModal" tabindex="-1">
                <div class="modal-dialog modal-xl">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">Tambahkan Berita</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <!-- General Form Elements -->
              <form class="form-validate" id="artikelberita_form" method="POST" action="{{ route('berita.store') }}" enctype="multipart/form-data">
               {!! csrf_field() !!}
               <input type="hidden" name="id" value="{{ Auth::user()->id_damkar }}"></br>
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Judul*</label>
                  <div class="col-sm-10">
                    <input type="text" name="judul" id="judul" class="form-control" value="{{ old('judul') }}">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="inputNumber" class="col-sm-2 col-form-label">Foto*</label>
                  <div class="col-sm-10">
                    <input class="form-control" name="foto" id="foto" type="file" id="formFile"  accept="image/png, image/jpeg">
                  </div>
                </div>
           
                
                <div class="row mb-3">
                  <label for="inputEmail" class="col-sm-2 col-form-label">Isi Artikel*</label>
                  <div class="col-sm-10">
                    <textarea type="text" name="isi_artikel" id="isi_artikel" class="form-control quill-editor-full"  value="{{ old('isi_artikel') }}"></textarea>
                  </div>
                </div>
                
           
                <div class="row mb-3">
                </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Keluar</button>
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
                    <th scope="col">Judul</th>
                    <th scope="col">Tanggal Terbit</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                @php $no = 1; @endphp
                @foreach($berita as $berita)
                  <tr>
                    <th scope="row">{{ $no++ }}</th>
                    <td>{{$berita->judul_berita}}</td>
                    <td>{{$berita->tgl_berita}}</td>
                    <td><a href="#" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#largeModalEdit{{ $berita->id_berita }}"><i class="bi bi-pen"></i> Edit</a>
                    <a href="#" type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#largeModalHapus{{ $berita->id_berita }}"><i class="bi bi-trash"></i> Hapus</a>

                    </td>


           <!-- Tampilan Modal -->
            <div class="modal fade" id="largeModalHapus{{ $berita->id_berita }}" tabindex="-1">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Konfirmasi Hapus Artikel</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            Apakah anda yakin ingin menghapus artikel ini?
                            <form action="{{ route('berita.destroy', $berita->id_berita) }}" method="POST">
                                @csrf
                                @method('DELETE')
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Keluar</button>
                            <button type="submit" class="btn btn-primary">Hapus</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

<!-- End Basic Modal-->
                    
              <div class="modal fade" id="largeModalEdit{{ $berita->id_berita }}" tabindex="-1">
                <div class="modal-dialog modal-xl">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">Update Berita</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <!-- General Form Elements -->
              <form class="form-validate" id="artikelberita_form" method="POST" action="{{ isset($berita) ? route('berita.update',$berita->id_berita) :
              route('berita.store') }}" enctype="multipart/form-data">
               {!! csrf_field() !!}
               {!! isset($berita) ? method_field('PUT') : '' !!}

                <input type="hidden" name="id" value="{{ $berita->id_berita }}"></br>
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Judul*</label>
                  <div class="col-sm-10">
                    <input type="text" name="judul" id="judul" value="{{ isset($berita) ? $berita->judul_berita : '' }}" class="form-control" required>
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="inputNumber" class="col-sm-2 col-form-label">Foto*</label>
                  <div class="col-sm-10">
                  <img src="{{ asset('img-berita/'.$berita->foto_artikel_berita	) }}" width="20%">
                  <p></p>
                    <input class="form-control" name="foto" id="foto" type="file">
                  </div>
                </div>
           
                
                <div class="row mb-3">
                  <label for="inputEmail" class="col-sm-2 col-form-label">Isi Artikel*</label>
                  <div class="col-sm-10">
                  <textarea name="isi_artikel" id="isi_artikel" class="form-control quill-editor-full" required>{{ isset($berita) ? $berita->deskripsi_berita : '' }}</textarea>
                  </div>
                </div>
                
           
                <div class="row mb-3">
</div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Keluar</button>
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