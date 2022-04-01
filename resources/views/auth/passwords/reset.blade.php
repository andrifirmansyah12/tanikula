{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Reset Password') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf

                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Reset Password') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}


@extends('components.auth.template')
@section('title', 'Masuk')

@section('style')
<meta name="csrf-token" content="{{ csrf_token() }}">
<!-- MULAI STYLE CSS -->

<!-- AKHIR STYLE CSS -->
@endsection

@section('content')

<section class="section">
    <div class="container mt-5">
        <div class="login-brand mb-5">
            <a href="{{ url('home') }}">
                <h4>Sri Makmur</h4>
            </a>
        </div>
        <div class="row align-items-center">

            <div class="col-lg-7 col-md-6 col-12">
                <div class="">
                    <div class="card-body">
                        <img src="{{ asset('img/image-login.jpg') }}" alt="#" class="img-fluid">
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h4>Reset Password</h4>
                    </div>

                    <div class="card-body">
                        {{-- <form method="POST" action="{{ route('login') }}" class="needs-validation" novalidate="">
                        --}}
                        <form method="POST" action="#" id="reset_form" class="needs-validation" novalidate="">
                            @csrf
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input id="email" type="email" class="form-control" name="email" tabindex="1"
                                    placeholder="E-mail" required autofocus>
                                <div class="invalid-feedback">
                                    Email yang ada masukkan salah!
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="password" class="control-label">Password Baru</label>
                                <input id="npass" type="password" class="form-control" name="npass"
                                    tabindex="2" placeholder="Password Baru" required>
                                <div class="invalid-feedback">
                                    Password yang ada masukkan salah!
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="password" class="control-label">Konfirmasi Password Baru</label>
                                <input id="cnpass" type="password" class="form-control" name="cnpass"
                                    tabindex="2" placeholder="Konfirmasi Password Baru" required>
                                <div class="invalid-feedback">
                                    Password yang ada masukkan salah!
                                </div>
                            </div>

                            <div class="form-group">
                                <input type="submit" value="Perbarui Password" id="reset_btn"
                                    class="btn btn-primary btn-lg btn-block" tabindex="4">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

@section('script')
<!-- LIBARARY JS -->



<!-- AKHIR LIBARARY JS -->

<!-- JAVASCRIPT -->
<script>


</script>
@endsection
