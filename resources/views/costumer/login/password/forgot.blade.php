@extends('components.auth.template')
@section('title', 'Lupa Password')

@section('style')
<meta name="csrf-token" content="{{ csrf_token() }}">
<!-- MULAI STYLE CSS -->

<!-- AKHIR STYLE CSS -->
@endsection

@section('content')
<section class="section">
    <div class="container" style="margin-top: 75px; margin-bottom: 65px;">
        <div class="row">
            <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
                <div class="login-brand">
                    <a href="{{ url('home') }}">
                        <h4>Sri Makmur</h4>
                    </a>
                </div>

                <div class="card card-primary">
                    <div class="card-header">
                        <h4>Lupa Password</h4>
                    </div>

                    <div class="card-body">
                        <div id="forgot_alert"></div>
                        <form method="POST" action="#" id="forgot_form">
                        @csrf
                            <p class="text-muted">Kami akan mengirimkan tautan untuk mengatur ulang kata sandi Anda</p>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input id="email" type="email" class="form-control" name="email" placeholder="E-mail" tabindex="1" required
                                    autofocus>
                            </div>

                            <div class="form-group">
                                <input type="submit" value="Lupa Password" id="forgot_btn" class="btn btn-primary btn-lg btn-block" tabindex="4">
                            </div>
                        </form>
                        <div class="mt-3 text-muted text-center">
                            Kembali ke <a href="{{ route('login') }}" class="text-decoration-none" style="font-weight: bold">Halaman Masuk</a>
                        </div>
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
    $(function() {
        $("#forgot_form").submit(function(e) {
            e.preventDefault();
            $("#forgot_btn").val('Silahkan Tunggu..');
            $("#forgot_btn").prop('disabled', true);
            $.ajax({
                url: '{{ route('forgotPasswordEmail-pembeli') }}',
                method: 'POST',
                data: $(this).serialize(),
                dataType: 'json',
                success: function(res){
                    if (res.status == 400) {
                        showError('email', res.messages.email);
                        $("#forgot_btn").val("Reset Password");
                        $("#forgot_btn").prop('disabled', false);
                    } else if (res.status == 200){
                        // $("#forgot_alert").html(showMessage('success', res.messages));
                        iziToast.success({ //tampilkan iziToast dengan notif data berhasil disimpan pada posisi kanan bawah
                            title: 'Berhasil',
                            message: res.messages,
                            position: 'topRight'
                        });
                        $("#forgot_btn").val("Reset Password");
                        $("#forgot_btn").prop('disabled', false);
                        removeValidationClasses("#forgot_form");
                        $("#forgot_form")[0].reset();
                    } else {
                        $("#forgot_btn").val("Reset Password");
                        $("#forgot_btn").prop('disabled', false);
                        // $("#forgot_alert").html(showMessage('danger', res.messages));
                        iziToast.warning({ //tampilkan iziToast dengan notif data berhasil disimpan pada posisi kanan bawah
                            title: 'Peringatan',
                            message: res.messages,
                            position: 'topRight'
                        });
                    }
                }
            });
        });
    });
</script>
@endsection
