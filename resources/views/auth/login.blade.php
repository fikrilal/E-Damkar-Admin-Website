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

                  <form class="row g-3 needs-validation" method="POST" action="{{ route('login') }}" novalidate>
                    @csrf

                    <div class="col-12">
                      <label for="yourUsername" class="form-label">{{ __('Username/Email') }}</label>
                      <div class="input-group has-validation">
                        <input id="username" type="text" name="username" class="form-control @error('username') is-invalid @enderror" id="yourUsername" value="{{ old('username') }}" required autocomplete="username" autofocus>
                        @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                      </div>
                    </div>

                    <div class="col-12">
                      <label for="password" class="form-label">{{ __('Password') }}</label>
                      <input id="password" type="password" name="password" class="form-control @error('password') is-invalid @enderror" required autocomplete="current-password">
                      @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                    </div>

                    <div class="col-12">
                    <p class="small mb-0 text-right">
                      
                    @if (Route::has('password.request'))
                    
                    <a href="{{ route('password.request') }}"> {{ __('Forgot Your Password?') }}</a>
                    @endif
                  </p>

                    </div>

                    <div class="col-12">
                      <button class="btn btn-danger w-100" type="submit">{{ __('Login') }}</button>
                    </div>
                    <div class="col-12">
                      <p class="small mb-0">Don't have account? <a href="/register">Create an account</a></p>
                    </div>
                  </form>



                </div>
              </div>
            </div>

            <div class="col-md-6 col-lg-6">
              <img src="assets/img/damkar.jpg"
                class="img-fluid" alt="Sample image">
            </div>

          </div>
        </div>

      </section>

    </div>
@endsection
