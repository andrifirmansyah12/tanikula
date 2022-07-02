@extends('costumer.template')
@section('title','Wishlist')

@section('style')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- MULAI STYLE CSS -->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
    <link rel='stylesheet'
        href='https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.5.0/font/bootstrap-icons.min.css' />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/css/iziToast.css"
        integrity="sha256-pODNVtK3uOhL8FUNWWvFQK0QoQoV3YA9wGGng6mbZ0E=" crossorigin="anonymous" />
    <!-- AKHIR STYLE CSS -->
    <style>
        input[type='file'] {
            opacity:0
        }
        /* 4.3 Page */
    .page-error {
        height: 100%;
        width: 100%;
        padding-top: 60px;
        padding-bottom: 60px;
        text-align: center;
        display: table;
    }

    .page-error .page-inner {
        display: table-cell;
        width: 100%;
        vertical-align: middle;
    }

    .page-error .page-description {
        padding-top: 30px;
        font-size: 18px;
        font-weight: 400;
        color: color: var(--primary);;
    }

    @media (max-width: 575.98px) {
        .page-error {
            padding-top: 0px;
        }
    }
    </style>
@endsection

@section('content')
<div class="container-fluid px-2 px-md-4 mb-5">
    <div class="page-header min-height-300 border-radius-xl mt-4"
        style="background-image: url('https://images.unsplash.com/photo-1531512073830-ba890ca4eba2?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1920&q=80');">
        <span class="mask  bg-primary  opacity-6"></span>
    </div>
    <div class="card card-body mx-3 mx-md-4 mt-n6">
        <div class="row gx-4 mb-2">
            <div class="col-auto">
                <div class="avatar avatar-xl position-relative">
                    @if ($userInfo->image)
                    <img id="image_preview" src="{{asset('../storage/profile/'. $userInfo->image)}}" alt="profile_image"
                        class="border-radius-lg shadow-sm" style="width: 92px; height: 72px; -o-object-fit: cover; object-fit: cover; -o-object-position: center; object-position: center;">
                    @else
                    <img id="image_preview" src="{{ asset('stisla/assets/img/example-image.jpg') }}" alt="profile_image"
                        class="border-radius-lg shadow-sm" style="width: 92px; height: 72px; -o-object-fit: cover; object-fit: cover; -o-object-position: center; object-position: center;">
                    @endif
                </div>
            </div>
            <div class="col-auto my-auto">
                <div class="h-100">
                    <h5 class="mb-1">
                        {{$userInfo->user->name}}
                    </h5>
                </div>
                <div>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input hidden" style="width: 0px;" accept="image/*" id="image" name="image">
                        <label class="custom-file-label" for="image"><i class="bi bi-camera h-4"></i> Ubah foto</label>
                    </div>
                </div>
            </div>
            <input type="hidden" name="id" id="id" value="{{ $userInfo->id }}">
            <div class="col-lg-4 col-md-6 my-sm-auto ms-sm-auto me-sm-0 mx-auto mt-3">
                <div class="nav-wrapper position-relative end-0">
                    <ul class="nav nav-fill p-1">
                        <li class="nav-item">
                            <a class="btn {{ Request::is('pembeli') ? 'active text-white bg-primary' : '' }}" onclick="pembeli_dashboard('{{ url('pembeli') }}')" href="#">
                                <span class="ms-1 fw-bold">Biodata Diri</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="btn {{ Request::is('pembeli/alamat*') ? 'active text-white bg-primary' : '' }}" onclick="pembeli_alamat('{{ url('pembeli/alamat') }}')" href="#">
                                <span class="ms-1 fw-bold">Daftar Alamat</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="row">
                <div class="col-12 mt-4">
                    <div class="mb-2 ps-3">
                        <h6 class="mb-1">Wishlist</h6>
                        <p class="text-sm">Produk favorit yang dipilih.</p>
                    </div>
                    <div class="row WishlistItems">
                        @if ($wishlist->count())
                        @foreach ($wishlist as $item)
                        <div class="col-xl-3 col-md-6 mb-xl-0 mb-4 mt-5" id="product_data">
                            <div class="card card-blog card-plain">
                                <div class="card-header p-0 mt-n4 mx-3">
                                    <a class="d-block shadow-xl border-radius-xl">
                                        @foreach ($item->product->photo_product->take(1) as $photos)
                                            <img class="img-fluid" style="object-fit: contain;"
                                            src="{{ asset('../storage/produk/'.$photos->name) }}" alt="{{ $item->product->name }}">
                                        @endforeach
                                    </a>
                                </div>
                                <div class="card-body p-3">
                                    <p class="mb-0 text-sm"><a href="{{ url('product-category/'.$item->product->product_category->slug) }}">{{ $item->product->product_category->name }}</a></p>
                                    <a href="{{ url('home/'.$item->product->slug) }}">
                                        <h5>
                                            {{ $item->product->name }}
                                        </h5>
                                    </a>
                                    <p class="mb-4 text-sm">
                                        Rp. {{ number_format($item->product->price, 0) }}
                                    </p>
                                    <input type="hidden" name="quantity" class="form-control qty-input text-center" value="1">
                                    <input type="hidden" value="{{ $item->product_id }}" id="prod_id">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <button type="button" id="addToCartBtn" class="btn btn-outline-primary btn-sm mb-0">+
                                            Keranjang</button>
                                        <button type="button" id="delete-cart-wishlistItem" class="btn btn-outline-primary btn-sm mb-0">
                                            <i class="bi bi-trash h-5 text-danger"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        @else
                        <div id="app">
                            <section class="section">
                                <div class="container">
                                    <div class="page-error">
                                        <div class="page-inner">
                                            <div class="page-description">
                                                Tidak ada produk favorit yang dipilih!
                                            </div>
                                            <div class="mt-3">
                                                <a href="{{ url('new-product') }}" class="btn btn-outline-primary btn-sm mb-0">
                                                    Belanja Sekarang
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
    <!-- LIBARARY JS -->
    <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
    <script type="text/javascript" language="javascript"
        src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>

    <script type="text/javascript" language="javascript"
        src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"
        integrity="sha256-sPB0F50YUDK0otDnsfNHawYmA5M0pjjUf4TvRJkGFrI=" crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/js/iziToast.js"
        integrity="sha256-siqh9650JHbYFKyZeTEAhq+3jvkFCG8Iz+MHdr9eKrw=" crossorigin="anonymous"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- AKHIR LIBARARY JS -->

    <!-- JAVASCRIPT -->
    <script>
    $(document).ready(function () {
        $("#image").change(function(e) {
            const file = e.target.files[0];
            let url = window.URL.createObjectURL(file);
            $("#image_preview").attr('src', url);
            let fd = new FormData();
            fd.append('image', file);
            fd.append('id', $("#id").val());
            fd.append('_token', '{{ csrf_token() }}');
            $.ajax({
                url: '{{ route('pembeli.pengaturan.image') }}',
                method: 'POST',
                data: fd,
                cache: false,
                processData: false,
                contentType: false,
                dataType: 'json',
                success: function(res){
                    if(res.status == 200) {
                        // $("#profile_alert").html(showMessage('success', res.messages));
                        iziToast.success({ //tampilkan iziToast dengan notif data berhasil disimpan pada posisi kanan bawah
                            title: 'Berhasil',
                            message: res.messages,
                            position: 'topRight'
                        });
                        $("#image").val('');
                    }
                }
            });
        });

        // $('#delete-cart-wishlistItem').click(function (e) {
        $(document).on('click', '#delete-cart-wishlistItem', function (e) {
            e.preventDefault();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            var product_id = $(this).closest('#product_data').find('#prod_id').val();

            $.ajax({
                method: "POST",
                url: "/delete-cart-wishlist",
                data: {
                    'product_id': product_id,
                },
                success: function (response) {
                    window.location.reload();
                    // $('.WishlistItems').load(location.href + '.WishlistItems');
                    iziToast.success({ //tampilkan iziToast dengan notif data berhasil disimpan pada posisi kanan bawah
                        title: 'Berhasil',
                        message: response.status,
                        position: 'topRight'
                    });
                }
            });
        });
    });
    </script>
@endsection
