@extends('components.auth.template')
@section('title', 'Reset Password')

@section('style')
<meta name="csrf-token" content="{{ csrf_token() }}">
<!-- MULAI STYLE CSS -->

<!-- AKHIR STYLE CSS -->
@endsection

@section('content')

<section class="section">
    <div class="container" style="margin-top: 80px; margin-bottom: 70px;">
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
                        <div id="reset_alert"></div>
                        <form method="POST" action="#" id="reset_form">
                            @csrf
                            <input type="hidden" name="email" value="{{ $email }}">
                            <input type="hidden" name="token" value="{{ $token }}">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input id="email" type="email" class="form-control" name="email" disabled value="{{ $email }}" placeholder="E-mail"
                                    required autofocus>
                                <div class="invalid-feedback">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="password" class="control-label">Password Baru</label>
                                <input id="npass" type="password" class="form-control" name="npass"
                                    placeholder="Password Baru" required>
                                <div class="invalid-feedback">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="password" class="control-label">Konfirmasi Password Baru</label>
                                <input id="cnpass" type="password" class="form-control" name="cnpass"
                                    placeholder="Konfirmasi Password Baru" required>
                                <div class="invalid-feedback">
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
    $(function() {
        $("#reset_form").submit(function(e) {
            e.preventDefault();
            $("#reset_btn").val('Silahkan Tunggu..');
            $("#reset_btn").prop('disabled', true);
            $.ajax({
                url: '{{ route('resetPassword') }}',
                method: 'POST',
                data: $(this).serialize(),
                dataType: 'json',
                success: function(res){
                    if (res.status == 400) {
                        showError('npass', res.messages.npass);
                        showError('cnpass', res.messages.cnpass);
                        $("#reset_btn").val("Update Password");
                        $("#reset_btn").prop('disabled', false);
                    } else if (res.status == 401){
                        // $("#forgot_alert").html(showMessage('danger', res.messages));
                        iziToast.warning({ //tampilkan iziToast dengan notif data berhasil disimpan pada posisi kanan bawah
                            title: 'Peringatan',
                            message: res.messages,
                            position: 'topRight'
                        });
                        $("#reset_btn").val("Update Password");
                        $("#reset_btn").prop('disabled', false);
                        removeValidationClasses("#reset_form");
                    } else {
                        $("#reset_form")[0].reset();
                        $("#reset_alert").html(showMessage('success', res.success));
                        iziToast.success({ //tampilkan iziToast dengan notif data berhasil disimpan pada posisi kanan bawah
                            title: 'Berhasil',
                            message: res.messages,
                            position: 'topRight'
                        });
                        $("#reset_btn").val("Update Password");
                        $("#reset_btn").prop('disabled', false);
                    }
                }
            });
        });
    });

</script>
@endsection
