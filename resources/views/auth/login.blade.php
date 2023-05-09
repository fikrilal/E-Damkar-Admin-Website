@extends('layouts.app')

@section('content')

<div class="container">

      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">

          <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

              <div class="card mb-3">

                <div class="card-body">

                  <div class="pt-4 pb-2">
                    <h5 class="card-title text-left pb-0 fs-4">{{ __('Login') }}</h5>
                    <p class="text-left small">Login untuk mengakses halaman admin</p>
                  </div>

                  <!-- menampilkan notifikasi apabila email / password salah -->
                  @if (session('error'))
                  <div class="alert alert-danger">{{ session('error') }}</div>
                  @endif

                  <!-- menampilkan error jika berhasil logout -->
                  @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                      </div>
                  @endif



                  <script>
                    $.ajax({
                    url: "/api/some-endpoint",
                    type: "GET",
                    dataType: "json",
                    success: function(response) {
                        // Handle success response
                    },
                    error: function(xhr, status, error) {
                        var response = xhr.responseJSON;
                        alert(response.error);
                    }
                });

                    </script>

                  <form class="row g-3 needs-validation" method="POST" action="{{ route('login') }}" novalidate>
                    @csrf

                    <div class="col-12">
                      <label for="yourUsername" class="form-label">{{ __('Email User') }}</label>
                      <div class="input-group has-validation">
                        <input id="email" type="text" name="email" class="form-control @error('email') is-invalid @enderror" id="yourUsername" value="{{ old('email') }}" required autocomplete="username" autofocus>
                        @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                      </div>
                    </div>

                    <div class="col-12">
                      <label for="password" class="form-label">{{ __('Kata Sandi') }}</label>
                      <input id="password" type="password" name="password" class="form-control @error('password') is-invalid @enderror" required autocomplete="current-password">
                      @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                    </div>

                    <div class="col-12">
                      <button class="btn btn-danger w-100" type="submit">{{ __('Login') }}</button>
                    </div>
                    <div class="col-12">
                      <p class="small mb-0">Belum punya akun? Hubungi Administrastor</p>
                    </div>
                  </form>

                </div>
              </div>
            </div>

          </div>
        </div>

      </section>

    </div>
@endsection
