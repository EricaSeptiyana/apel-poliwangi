@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <!-- <div class="form-group row col-md-6 offset-md-3 text-md-center">
                            <h6> {{ __('Aplikasi Administrasi Pelayanan Surat Kegiatan Di Politeknik Negeri Banyuwangi') }} </h6>
                        </div> -->
                        <div class="form-group">
                            <div class="sidebar-brand sidebar-brand-sm text-md-center">
                            <img alt="image" src="{{ asset('public/assets/img/logo_poliwangi.png')}}" width="150">   
                                <a class="navbar-brand" href="./"></a>
                            </div>
                            <!-- <div class="col-md-6 offset-md-3 text-md-center">
                               <h6> {{ __('Aplikasi Administrasi Pelayanan Surat Kegiatan Di Politeknik Negeri Banyuwangi') }} </h6>
                            </div> -->
                        </div>
                        <div class="form-group" style="color:blue">
                            <div class="text-md-center">
                               <h5> {{ __('Aplikasi Administrasi Pelayanan Surat Kegiatan') }} </h5>
                               <h5> {{ __('Di Politeknik Negeri Banyuwangi') }} </h5>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
