@extends('pages.template3')
@section('title', 'Hubungi Kami')

@section('style')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        /* CSS */
        /* ================================================== Loading Spinner ================================= */

        .body-spinner {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            z-index: 999999999;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            overflow: hidden;
        }

        .content-spinner {
            position: absolute;
            top: 50%;
            left: 50%;
            -webkit-transform: translate(-50%, -50%);
            transform: translate(-50%, -50%);
        }

        .pl {
            width: 6em;
            height: 6em;
        }

        .pl__ring {
            animation: ringA 2s linear infinite;
        }

        .pl__ring--a {
            stroke: #16A085;
        }

        .pl__ring--b {
            animation-name: ringB;
            stroke: #ffff;
        }

        .pl__ring--c {
            animation-name: ringC;
            stroke: #ffff;
        }

        .pl__ring--d {
            animation-name: ringD;
            stroke: #16A085;
        }

        /* Animations */
        @keyframes ringA {

            from,
            4% {
                stroke-dasharray: 0 660;
                stroke-width: 20;
                stroke-dashoffset: -330;
            }

            12% {
                stroke-dasharray: 60 600;
                stroke-width: 30;
                stroke-dashoffset: -335;
            }

            32% {
                stroke-dasharray: 60 600;
                stroke-width: 30;
                stroke-dashoffset: -595;
            }

            40%,
            54% {
                stroke-dasharray: 0 660;
                stroke-width: 20;
                stroke-dashoffset: -660;
            }

            62% {
                stroke-dasharray: 60 600;
                stroke-width: 30;
                stroke-dashoffset: -665;
            }

            82% {
                stroke-dasharray: 60 600;
                stroke-width: 30;
                stroke-dashoffset: -925;
            }

            90%,
            to {
                stroke-dasharray: 0 660;
                stroke-width: 20;
                stroke-dashoffset: -990;
            }
        }

        @keyframes ringB {

            from,
            12% {
                stroke-dasharray: 0 220;
                stroke-width: 20;
                stroke-dashoffset: -110;
            }

            20% {
                stroke-dasharray: 20 200;
                stroke-width: 30;
                stroke-dashoffset: -115;
            }

            40% {
                stroke-dasharray: 20 200;
                stroke-width: 30;
                stroke-dashoffset: -195;
            }

            48%,
            62% {
                stroke-dasharray: 0 220;
                stroke-width: 20;
                stroke-dashoffset: -220;
            }

            70% {
                stroke-dasharray: 20 200;
                stroke-width: 30;
                stroke-dashoffset: -225;
            }

            90% {
                stroke-dasharray: 20 200;
                stroke-width: 30;
                stroke-dashoffset: -305;
            }

            98%,
            to {
                stroke-dasharray: 0 220;
                stroke-width: 20;
                stroke-dashoffset: -330;
            }
        }

        @keyframes ringC {
            from {
                stroke-dasharray: 0 440;
                stroke-width: 20;
                stroke-dashoffset: 0;
            }

            8% {
                stroke-dasharray: 40 400;
                stroke-width: 30;
                stroke-dashoffset: -5;
            }

            28% {
                stroke-dasharray: 40 400;
                stroke-width: 30;
                stroke-dashoffset: -175;
            }

            36%,
            58% {
                stroke-dasharray: 0 440;
                stroke-width: 20;
                stroke-dashoffset: -220;
            }

            66% {
                stroke-dasharray: 40 400;
                stroke-width: 30;
                stroke-dashoffset: -225;
            }

            86% {
                stroke-dasharray: 40 400;
                stroke-width: 30;
                stroke-dashoffset: -395;
            }

            94%,
            to {
                stroke-dasharray: 0 440;
                stroke-width: 20;
                stroke-dashoffset: -440;
            }
        }

        @keyframes ringD {

            from,
            8% {
                stroke-dasharray: 0 440;
                stroke-width: 20;
                stroke-dashoffset: 0;
            }

            16% {
                stroke-dasharray: 40 400;
                stroke-width: 30;
                stroke-dashoffset: -5;
            }

            36% {
                stroke-dasharray: 40 400;
                stroke-width: 30;
                stroke-dashoffset: -175;
            }

            44%,
            50% {
                stroke-dasharray: 0 440;
                stroke-width: 20;
                stroke-dashoffset: -220;
            }

            58% {
                stroke-dasharray: 40 400;
                stroke-width: 30;
                stroke-dashoffset: -225;
            }

            78% {
                stroke-dasharray: 40 400;
                stroke-width: 30;
                stroke-dashoffset: -395;
            }

            86%,
            to {
                stroke-dasharray: 0 440;
                stroke-width: 20;
                stroke-dashoffset: -440;
            }
        }
    </style>
@endsection

@section('content')
{{-- Load Spinner --}}
<div class="body-spinner" id="spinner_login">
    <div class="content-spinner">
        <svg class="pl" width="240" height="240" viewBox="0 0 240 240">
            <circle class="pl__ring pl__ring--a" cx="120" cy="120" r="105" fill="none" stroke="#000"
                stroke-width="20" stroke-dasharray="0 660" stroke-dashoffset="-330" stroke-linecap="round"></circle>
            <circle class="pl__ring pl__ring--b" cx="120" cy="120" r="35" fill="none" stroke="#000"
                stroke-width="20" stroke-dasharray="0 220" stroke-dashoffset="-110" stroke-linecap="round"></circle>
            <circle class="pl__ring pl__ring--c" cx="85" cy="120" r="70" fill="none"
                stroke="#000" stroke-width="20" stroke-dasharray="0 440" stroke-linecap="round"></circle>
            <circle class="pl__ring pl__ring--d" cx="155" cy="120" r="70" fill="none"
                stroke="#000" stroke-width="20" stroke-dasharray="0 440" stroke-linecap="round"></circle>
        </svg>
    </div>
</div>

<section class="item-details section bg-white overflow-hidden mt-md-5 mt-0">
    <div class="container">
        <div class="row justify-content-center rounded mx-1 mx-md-0" style="border: 1px solid #16A085;">
            <div class="col-md-12 p-md-5 p-2">
                <div class="wrapper">
                    <div class="row no-gutters">
                        <div class="col-12">
                            <div class="contact-wrap w-100 p-md-5 p-4">
                                <h3 class="mb-5 fw-bold" style="color:#16A085;">Hubungi Kami</h3>
                                <form method="POST" action="#" id="contactForm" name="contactForm" class="contactForm" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group mb-4">
                                                <label class="label pb-2" for="name">{{ __('Nama Lengkap') }}</label>
                                                <input type="text" class="form-control @error('name') is-invalid @enderror" name="fullname" id="fullname"
                                                    placeholder="Nama">
                                                <div class="invalid-feedback">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group mb-4">
                                                <label class="label pb-2" for="email">{{ __('Email') }}</label>
                                                <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email"
                                                    placeholder="Email">
                                                <div class="invalid-feedback">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="form-group mb-4">
                                                <label class="label pb-2" for="subject">{{ __('Subjek') }}</label>
                                                <input type="text" class="form-control @error('subject') is-invalid @enderror" name="subject" id="subject"
                                                    placeholder="Subjek">
                                                <div class="invalid-feedback">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group mb-4">
                                                <label class="label pb-2" for="subject">{{ __('Telp') }}</label>
                                                <input type="text" class="form-control @error('phone_number') is-invalid @enderror" name="phone_number" id="phone_number"
                                                    placeholder="Telp">
                                                <div class="invalid-feedback">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group mb-4">
                                                <label class="label pb-2" for="#">{{ __('Pesan') }}</label>
                                                <textarea name="message" class="form-control @error('message') is-invalid @enderror" id="message" cols="30"
                                                    rows="4" placeholder="Pesan"></textarea>
                                                <div class="invalid-feedback">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group mb-4">
                                                <label for="name" class="col-form-label text-md-right">{{ __('Upload Foto') }}</label>
                                                <div class="pb-2">
                                                    <img id="addPreview" class="img-fluid img-thumbnail image"
                                                        src="{{ asset('img/no-data.jpg') }}" alt="edukasi"
                                                        style="width: 20rem; height: 10rem; -o-object-fit: cover; object-fit: cover; -o-object-position: center; object-position: center;">
                                                </div>
                                                <input type="file" accept="image/*" class="form-control @error('screenshot') is-invalid @enderror" id="screenshot" name="screenshot" autofocus>
                                                <div class="invalid-feedback">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <input type="submit" id="send_contact_us" style="background: #16A085;" value="Kirim Pesan" class="btn border border-light text-white">
                                                <div class="submitting"></div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3 pb-md-5 pb-4">
                            <div class="dbox w-100 text-center">
                                <div class="icon d-flex align-items-center justify-content-center">
                                    <span class="fa fa-map-marker"></span>
                                </div>
                                <div class="text">
                                    <p><span>Alamat:</span> Desa Krasak, Kecamatan Jatibarang, Kabupaten Indramayu.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 pb-md-5 pb-4">
                            <div class="dbox w-100 text-center">
                                <div class="icon d-flex align-items-center justify-content-center">
                                    <span class="fa fa-phone"></span>
                                </div>
                                <div class="text">
                                    <p><span>Telp:</span> <a style="color:#16A085;" href="tel://1234567920">(+62) 33 169 7720</a></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 pb-md-5 pb-4">
                            <div class="dbox w-100 text-center">
                                <div class="icon d-flex align-items-center justify-content-center">
                                    <span class="fa fa-paper-plane"></span>
                                </div>
                                <div class="text">
                                    <p><span>Email:</span> <a style="color:#16A085;" href="mailto:info@yoursite.com">tanikula.app@gmail.com</a></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 pb-md-5 pb-4">
                            <div class="dbox w-100 text-center">
                                <div class="icon d-flex align-items-center justify-content-center">
                                    <span class="lni lni-instagram"></span>
                                </div>
                                <div class="text">
                                    <p><span>Instagram:</span><a style="color:#16A085;" href="#">Tanikula</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
                <button onclick="startFCM()"
                    class="btn btn-danger btn-flat">Allow notification
                </button>
            <div class="card mt-3">
                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    <form action="{{ route('send.web-notification') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label>Message Title</label>
                            <input type="text" class="form-control" name="title">
                        </div>
                        <div class="form-group">
                            <label>Message Body</label>
                            <textarea class="form-control" name="body"></textarea>
                        </div>
                        <button type="submit" class="btn btn-success btn-block">Send Notification</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> --}}
@endsection

@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script type="text/javascript">
        $(function() {
            $('#screenshot').on('change', function() {
                var file = this.files[0];
                var reader = new FileReader();
                reader.onload = viewer.load;
                reader.readAsDataURL(file);
            });

            var viewer = {
                load : function(e) {
                    $('#addPreview').attr('src', e.target.result)
                }
            }
        });

        $(function () {
            $("#contactForm").submit(function(e) {
                e.preventDefault();
                const fd = new FormData(this);
                document.querySelector('.body-spinner').style.display = 'block';
                $("#send_contact_us").text('Silahkan Tunggu..');
                $("#send_contact_us").prop('disabled', true);
                $.ajax({
                url: '{{ route('addContactUs') }}',
                method: 'post',
                data: fd,
                cache: false,
                contentType: false,
                processData: false,
                dataType: 'json',
                success: function(response) {
                    if (response.status == 400)
                    {
                        showError('fullname', response.messages.fullname);
                        showError('email', response.messages.email);
                        showError('subject', response.messages.subject);
                        showError('message', response.messages.message);
                        showError('phone_number', response.messages.phone_number);
                        showError('screenshot', response.messages.screenshot);
                        document.querySelector('.body-spinner').style.display = 'none';
                        $("#send_contact_us").val('Kirim Pesan');
                        $("#send_contact_us").prop('disabled', false);
                    }
                        else if (response.status == 200)
                    {
                        iziToast.success({ //tampilkan iziToast dengan notif data berhasil disimpan pada posisi kanan bawah
                            title: 'Berhasil',
                            message: response.messages,
                            position: 'topRight'
                        });
                        document.querySelector('.body-spinner').style.display = 'none';
                        $("#send_contact_us").val('Kirim Pesan');
                        $("#send_contact_us").prop('disabled', false);
                        window.setTimeout(function(){location.reload()},1000);
                    }
                }
                });
            });
        });

        const current = document.getElementById("current");
        const opacity = 0.6;
        const imgs = document.querySelectorAll(".img");
        imgs.forEach(img => {
            img.addEventListener("click", (e) => {
                //reset opacity
                imgs.forEach(img => {
                    img.style.opacity = 1;
                });
                current.src = e.target.src;
                //adding class
                //current.classList.add("fade-in");
                //opacity
                e.target.style.opacity = opacity;
            });
        });

        // const messaging = firebase.messaging();
        // function startFCM() {
        //     messaging
        //         .requestPermission()
        //         .then(function () {
        //             return messaging.getToken()
        //         })
        //         .then(function (response) {
        //             $.ajaxSetup({
        //                 headers: {
        //                     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        //                 }
        //             });
        //             $.ajax({
        //                 url: '{{ route("store.token") }}',
        //                 type: 'POST',
        //                 data: {
        //                     token: response
        //                 },
        //                 dataType: 'JSON',
        //                 success: function (response) {
        //                     alert('Token stored.');
        //                 },
        //                 error: function (error) {
        //                     alert(error);
        //                 },
        //             });
        //         }).catch(function (error) {
        //             alert(error);
        //         });
        // }

        // messaging.onMessage(function (payload) {
        //     const title = payload.notification.title;
        //     const options = {
        //         body: payload.notification.body,
        //         icon: payload.notification.icon,
        //     };
        //     new Notification(title, options);
        // });
    </script>
@endsection
