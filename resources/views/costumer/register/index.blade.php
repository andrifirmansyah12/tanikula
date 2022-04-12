@extends('components.auth.template')
@section('title', 'Daftar')

@section('style')
<meta name="csrf-token" content="{{ csrf_token() }}">
<!-- MULAI STYLE CSS -->

<!-- AKHIR STYLE CSS -->
@endsection

@section('content')
<section class="section">
    <div class="container mt-5 mb-5">
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
                    <div class="d-flex card-header">
                        <div class="">
                            <h4>Daftar</h4>
                            <div class="">
                                Sudah punya akun? <a href="{{ route('login') }}">Masuk</a>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <div id="show_success_alert"></div>
                        <form method="POST" action="#" id="register_form">
                            @csrf
                            <div class="form-group">
                                <label for="name">Nama</label>
                                <input id="name" type="name" class="form-control" name="name" placeholder="Nama" autofocus>
                                <div class="invalid-feedback">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="email">Email</label>
                                <input id="email" type="email" class="form-control" name="email" placeholder="E-mail" autofocus>
                                <div class="invalid-feedback">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="d-block">
                                    <label for="password" class="control-label">Password</label>
                                </div>
                                <input id="password" type="password" class="form-control" name="password"
                                    placeholder="Password">
                                <div class="invalid-feedback">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="d-block">
                                    <label for="password" class="control-label">Konfirmasi Password</label>
                                </div>
                                <input type="password" class="form-control" name="cpassword"
                                    id="cpassword" placeholder="Konfirmasi Password">
                                <div class="invalid-feedback">
                                </div>
                            </div>

                            <div class="form-group">
                                <input type="submit" value="Daftar" id="register_btn"
                                    class="btn btn-primary btn-lg btn-block">
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
    $(function () {
        $("#register_form").submit(function (e) {
            e.preventDefault();
            $("#register_btn").val('Silahkan Tunggu...');
            $("#register_btn").prop('disabled', true);
            $.ajax({
                url: '{{ route('registerPembeli-pembeli') }}',
                method: 'POST',
                data: $(this).serialize(),
                dataType: 'json',
                success: function (res) {
                    if (res.status == 400) {
                        showError('name', res.messages.name);
                        showError('email', res.messages.email);
                        showError('password', res.messages.password);
                        showError('cpassword', res.messages.cpassword);
                        $("#register_btn").val('Daftar');
                        $("#register_btn").prop('disabled', false);
                    } else if (res.status == 200) {
                        // $("#show_success_alert").html(showMessage('success', res.messages));
                        iziToast.success({ //tampilkan iziToast dengan notif data berhasil disimpan pada posisi kanan bawah
                            title: 'Berhasil',
                            message: res.messages,
                            position: 'topRight'
                        });
                        $("#register_form")[0].reset();
                        removeValidationClasses("#register_form");
                        $("#register_btn").val('Daftar');
                        $("#register_btn").prop('disabled', false);
                    }
                }
            });
        });
    });
</script>
@endsection
