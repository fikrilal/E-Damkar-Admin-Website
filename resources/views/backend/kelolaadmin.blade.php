@extends('backend/layouts.template')
@section('content')

<main id="main" class="main">

    <div class="pagetitle">
      <h1>Kelola Admin</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="">Home</a></li>
          <li class="breadcrumb-item active">Kelola Admin</li>
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
                        <!-- Large Modal -->
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="#largeModal">
                            <i class="bi bi-plus"></i> Tambahkan Admin
                        </button>

                        <div class="modal fade" id="largeModal" tabindex="-1">
                            <div class="modal-dialog modal-xl">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Tambahkan Admin</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">

                                        <!-- General Form Elements -->
                                        <form class="form-validate" id="artikeledukasiform" method="POST"
                                            action="{{ route('admin.store') }}" enctype="multipart/form-data">
                                            @csrf
                                            <input type="hidden" name="id" value="{{ Auth::user()->id }}"></br>
                                            <div class="row mb-3">
                                                <label for="inputText" class="col-sm-2 col-form-label">Nama</label>
                                                <div class="col-sm-10">
                                                    <input type="text" name="nama_admin" id="nama_admin"
                                                        class="form-control" value="{{ old('nama_admin') }}">
                                                </div>
                                            </div>

                                            <div class="row mb-3">
                                                <label for="inputText" class="col-sm-2 col-form-label">Email</label>
                                                <div class="col-sm-10">
                                                    <input type="text" name="email" id="email" class="form-control"
                                                        value="{{ old('email') }}">
                                                </div>
                                            </div>


                                            <div class="row mb-3">
                                                <label for="inputText" class="col-sm-2 col-form-label">Kata
                                                    Sandi</label>
                                                <div class="col-sm-10">
                                                    <input type="text" name="password" id="password"
                                                        class="form-control" value="{{ old('password') }}">
                                                </div>
                                            </div>

                                            <div class="row mb-3">
                                                <label for="inputText" class="col-sm-2 col-form-label">Nomor
                                                    Telepon</label>
                                                <div class="col-sm-10">
                                                    <input type="text" name="noHp" id="noHp" class="form-control"
                                                        value="{{ old('noHp') }}">
                                                </div>
                                            </div>

                                            <div class="row mb-3">
                                                <!-- Any additional form fields you have -->
                                            </div>

                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Keluar</button>
                                                <button type="submit" class="btn btn-primary">Konfirmasi</button>
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
                                        <th scope="col">Nama Lengkap</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $no = 1; @endphp
                                    @foreach($admin as $kelolaadmin)
                                    <tr>
                                        <th scope="row">{{ $no++ }}</th>
                                        <td>{{$kelolaadmin->nama_lengkap}}</td>
                                        <td>{{$kelolaadmin->email}}</td>
                                        <td><a href="#" type="button" class="btn btn-primary"
                                                data-bs-toggle="modal"
                                                data-bs-target="#largeModalEdit{{ $kelolaadmin->id }}"><i
                                                    class="bi bi-pen"></i> Edit</a>

                                        </td>

                                    </tr>

                                    <div class="modal fade" id="largeModalEdit{{ $kelolaadmin->id }}" tabindex="-1">
                                        <div class="modal-dialog modal-xl">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Update Data Admin</h5>
                                                    <button type="button" class="btn-close"
                                                        data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <!-- General Form Elements -->
                                                    <form action="{{ route('admin.update') }}" method="POST">
                                                      @method('POST')
                                                      @csrf
                                                        <input type="hidden" name="id"
                                                            value="{{ $kelolaadmin->id }}">
                                                        <div class="row mb-3">
                                                            <label for="inputText"
                                                                class="col-sm-2 col-form-label">Nama</label>
                                                            <div class="col-sm-10">
                                                                <input type="text" name="nama_admin" id="nama_admin"
                                                                    value="{{ $kelolaadmin->nama_admin }}"
                                                                    class="form-control">
                                                            </div>
                                                        </div>

                                                        <div class="row mb-3">
                                                            <label for="inputText"
                                                                class="col-sm-2 col-form-label">Email</label>
                                                            <div class="col-sm-10">
                                                                <input type="text" name="email" id="email"
                                                                    value="{{ $kelolaadmin->email }}"
                                                                    class="form-control">
                                                            </div>
                                                        </div>

                                                        <div class="row mb-3">
                                                            <!-- Any additional form fields you have -->
                                                        </div>

                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Keluar</button>
                                                                <button type="submit">Simpan</button>
                                                    </form>
                                                    <!-- End General Form Elements -->
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Large Modal-->
                                        @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
