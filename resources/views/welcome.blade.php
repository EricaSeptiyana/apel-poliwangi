@extends('layouts.app')

@section('content')

<!-- <style type="text/css">
    .jumbotron {
        background-image: url(img/poltek2.png)
    }
</style> -->

<div id="app">
    <section class="section">
      <div class="d-flex flex-wrap align-items-stretch">
        <div class="col-lg-4 col-md-6 col-12 order-lg-1 min-vh-100 order-2 bg-white">
          <div class="p-4 m-3">
            <img src="{{ asset('public/assets/img/poltek2.png')}}" alt="logo" width="300" class="shadow-light mb-5 mt-2">
            <h4 class="text-dark font-weight-normal">Selamat datang di... <span class="font-weight-bold"></span></h4>
            <p class="text-muted" style="color:blue">Aplikasi Administrasi Pelayanan Surat Tugas Politeknik Negeri Banyuwangi</p>
            <form method="POST" action="{{ route('login') }}" class="needs-validation" novalidate="">
                @csrf
              <div class="form-group row">
              <!-- <label for="email" class="col-md-12 col-form-label text-md-left">{{ __('E-Mail Address') }}</label>
                <div class="col-md-12">
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
              </div> -->
              <label for="nip" class="col-md-12 col-form-label text-md-left">{{ __('NIP/NIK') }}</label>
                <!-- <label for="nip">nip</label> -->
                <div class="col-md-12">
                    <input id="nip" type="text" class="form-control @error('nip') is-invalid @enderror" name="nip" value="{{ old('nip') }}" required autocomplete="nip" autofocus>

                    @error('nip')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
              </div>
              

              <div class="form-group row">
                    <label for="password" class="col-md-12 col-form-label text-md-left">{{ __('Password') }}</label>

                    <div class="col-md-12">
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                </div>
                <!-- <div class="d-block">
                  <label for="password" class="control-label">Password</label>
                </div>
                <input id="password" type="password" class="form-control" name="password" tabindex="2" required>
                <div class="invalid-feedback">
                  please fill in your password
                </div> -->
              </div>

              <div class="form-group row">
                <div class="col-md-12 offset-md-12">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                        <label class="form-check-label" for="remember">
                            {{ __('Remember Me') }}
                        </label>
                    </div>
                </div>
                <!-- <div class="custom-control custom-checkbox">
                  <input type="checkbox" name="remember" class="custom-control-input" tabindex="3" id="remember" {{ old('remember') ? 'checked' : '' }}>
                  <label class="custom-control-label" for="remember">Remember Me</label>
                </div> -->
              </div>

              <div class="form-group text-right">
                <!-- <a href="auth-forgot-password.html" class="float-left mt-3">
                  Forgot Password?
                </a> -->
                @if (Route::has('password.request'))
                    <a class=" float-left mt-3" href="{{ route('password.request') }}">
                        {{ __('Forgot Your Password?') }}
                    </a>
                @endif

                <button type="submit" class="btn btn-primary">
                    {{ __('Login') }}
                </button>
                <!-- <button type="submit" class="btn btn-primary btn-lg btn-icon icon-right" tabindex="4">
                  Login
                </button> -->
              </div>

              <!-- <div class="mt-5 text-center">
                Don't have an account? <a href="auth-register.html">Create new one</a>
              </div> -->
            </form>

            <!-- <div class="text-center mt-5 text-small">
              Copyright &copy; Your Company. Made with 💙 by Stisla
              <div class="mt-2">
                <a href="#">Privacy Policy</a>
                <div class="bullet"></div>
                <a href="#">Terms of Service</a>
              </div>
            </div> -->
          </div>
        </div>
        

        <!-- <div class="jumbotron jumbotron-fuild"> -->

          <div class="col-lg-8 col-12 order-lg-2 order-1 min-vh-100 background-walk-y position-relative overlay-gradient-bottom" data-background="{{ asset('public/assets/img/logo_poliwangi.png')}}">
            <div class="absolute-bottom-left index-2">
              <div class="text-light p-5 pb-2 ">
                <div class="mb-5 pb-3" style="color:blue">
                  <h1 class="mb-2 display-4 font-weight-bold">Politeknik Negeri Banyuwangi</h1>
                  <h6 class="font-weight-normal text-muted-transparent">Jl. Raya Jember kilometer 13 Labanasem, Kabat, Banyuwangi, 68461 <br> Telepon / Faks : (0333) 636780 <br> Email : poliwangi@poliwangi.ac.id ; Website : http//www.poliwangi.ac.id</h6>
                </div>
                Photo by <a class="text-light bb" target="_blank" href="https://unsplash.com/photos/a8lTjWJJgLA">Justin Kauffman</a> on <a class="text-light bb" target="_blank" href="https://unsplash.com">Unsplash</a>
              </div>
            </div>
          </div>

        <!-- </div> -->
      </div>
    </section>
  </div>
@endsection
