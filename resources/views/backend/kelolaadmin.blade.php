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
              <h5 class="card-title">Kelola Admin</h5>
              <p>Berikut adalah daftar admin yang sudah ditambahkan.</p>

              <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#largeModal">
             <i class="bi bi-plus"></i> Tambahkan Admin</button>

             <div class="modal fade" id="largeModal" tabindex="-1">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambahkan Admin</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- General Form Elements -->
                <form class="form-validate" id="artikeledukasiform" method="POST" action="{{ route('kelolaadmin.store') }}" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" value="{{ Auth::user()->id }}">
                    <div class="row mb-3">
                        <label for="nama_admin" class="col-sm-2 col-form-label">Nama Lengkap*</label>
                        <div class="col-sm-10">
                            <input type="text" name="nama_admin" id="nama_admin" class="form-control" value="{{ old('nama_admin') }}">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="email" class="col-sm-2 col-form-label">Email*</label>
                        <div class="col-sm-10">
                            <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}">
                        </div>
                    </div>


                    <div class="row mb-3">
                        <label for="noHp" class="col-sm-2 col-form-label">Nomor HP*</label>
                        <div class="col-sm-10">
                            <input type="text" name="noHp" id="noHp" class="form-control" value="{{ old('noHp') }}">
                        </div>
                    </div>

                    
                    <div class="row mb-3">
                        <label for="password" class="col-sm-2 col-form-label">Kata Sandi*</label>
                        <div class="col-sm-10">
                            <input type="password" name="password" id="password" class="form-control">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <!-- Any additional form fields you have -->
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
                        <button type="submit" class="btn btn-primary">Tambahkan</button>
                    </div>
                </form><!-- End General Form Elements -->
            </div>
        </div>
    </div>
</div>

          
              <!-- Table with stripped rows -->
              <table class="table datatable">
             
                <thead>
                  <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama Lengkap</th>
                    <th scope="col">Email</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                @php $no = 1; @endphp
                @foreach($data as $admin)
                  <tr>
                    <th scope="row">{{ $no++ }}</th>
                    <td>{{$admin->nama_lengkap}}</td>
                    <td>{{$admin->email}}</td>
                    <td><a href="#" type="button" class="btn btn-primary"
                                                data-bs-toggle="modal"
                                                data-bs-target="#largeModalEdit{{ $admin->id }}"><i
                                                    class="bi bi-pen"></i> Edit</a>
                    </td>

                    <div class="modal fade" id="largeModalEdit{{ $admin->id }}" tabindex="-1">
                                        <div class="modal-dialog modal-xl">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Update Data Admin</h5>
                                                    <button type="button" class="btn-close"
                                                        data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <!-- General Form Elements -->
                                                    <form action="{{ route('kelolaadmin.update', ['kelolaadmin' => $admin->id]) }}" 
                                                    method="POST">
                                                        @method('PUT')
                                                        @csrf
                                                        <input type="hidden" name="id"
                                                            value="{{ $admin->id }}">
                                                        <div class="row mb-3">
                                                            <label for="inputText"
                                                                class="col-sm-2 col-form-label">Nama Lengkap*</label>
                                                            <div class="col-sm-10">
                                                                <input type="text" name="nama_admin" id="nama_admin"
                                                                    value="{{ $admin->nama_lengkap }}"
                                                                    class="form-control">
                                                            </div>
                                                        </div>

                                                        <div class="row mb-3">
                                                            <label for="inputText"
                                                                class="col-sm-2 col-form-label">Email*</label>
                                                            <div class="col-sm-10">
                                                                <input type="email" name="email" id="email"
                                                                    value="{{ $admin->email }}"
                                                                    class="form-control">
                                                            </div>
                                                        </div>

                                                        <div class="row mb-3">
                                                            <label for="inputText"
                                                                class="col-sm-2 col-form-label">No HP*</label>
                                                            <div class="col-sm-10">
                                                                <input type="text" name="noHp" id="noHp"
                                                                    value="{{ $admin->noHp }}"
                                                                    class="form-control">
                                                            </div>
                                                        </div>

                                                        <div class="row mb-3">
                                                            <label for="inputText"
                                                                class="col-sm-2 col-form-label">Kata Sandi</label>
                                                            <div class="col-sm-10">
                                                                <input type="password" name="password" id="password"
                                                            
                                                                    class="form-control">
                                                            </div>
                                                        </div>


                                                        <div class="row mb-3">
                                                            <!-- Any additional form fields you have -->
                                                        </div>

                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Kembali</button>
                                                                <button type="submit" class="btn btn-primary">Update</button>
                                                    </form>
                                                    <!-- End General Form Elements -->
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Large Modal-->

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