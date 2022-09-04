@extends('pages.template3')
@section('title', 'Keranjang')

@section('style')
<style>
     /* Style */
    .icon-shape {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    text-align: center;
    vertical-align: middle;
    }

    .icon-sm {
        width: 2rem;
        height: 2rem;

    }

    /* 4.3 Page */
    .page-error {
        height: 100%;
        width: 100%;
        padding-top: 60px;
        /* padding-bottom: 60px; */
        text-align: center;
        display: table;
    }

    .page-error .page-inner {
        display: table-cell;
        width: 100%;
        vertical-align: middle;
    }

    .page-error img {
        width: 30rem;
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
<!-- Start Item Details -->
<section class="item-details section bg-white overflow-hidden">
    <div class="container">
        <div class="bg-white">
            <div class="row">
                <div class="shadow mt-md-4 rounded col-12 col-xl-8 mb-3 mb-xl-0">
                    <div class="p-5 CartItems">
                        <h2 class="mb-3 fs-3 mb-md-4">Keranjang</h2>
                        @php
                            $total = 0;
                            $totalPrice = 0;
                            $totalQty = 0;
                        @endphp
                        @if ($cartItem->count())
                        @foreach ($cartItem as $item)
                            <div class="border-bottom mb-4 pb-4 pb-md-0" id="product_data">
                                <div class="row align-items-center mb-6 mb-md-3">
                                    <div class="col-12 col-md-12 col-lg-12 mb-6 mb-md-0">
                                        <div class="row align-items-center">
                                            <div>
                                                <p class="fw-bold mb-2"><i class="bi bi-shop"></i> {{ $item->product->user->name }}</p>
                                            </div>
                                            <div class="col-12 col-md-3 col-lg-3">
                                                <div class="d-flex align-items-center justify-content-center bg-light"
                                                    style="width: 160px; height: 150px;">
                                                    @if ($item->product->photo_product->count() > 0)
                                                        @foreach ($item->product->photo_product->take(1) as $photos)
                                                            @if ($photos->name)
                                                                <img class="img-fluid rounded" style="width: 9rem; height: 7rem; -o-object-fit: cover; object-fit: cover; -o-object-position: center; object-position: center;"
                                                                    src="{{ asset('../storage/produk/'.$photos->name) }}" alt="{{ $item->product->name }}">
                                                            @else
                                                                <img class="img-fluid rounded" style="width: 9rem; height: 7rem; -o-object-fit: cover; object-fit: cover; -o-object-position: center; object-position: center;"
                                                                    src="{{ asset('img/no-image.png') }}" alt="{{ $item->product->name }}">
                                                            @endif
                                                        @endforeach
                                                    @else
                                                        <img class="img-fluid rounded" style="width: 9rem; height: 7rem; -o-object-fit: cover; object-fit: cover; -o-object-position: center; object-position: center;"
                                                            src="{{ asset('img/no-image.png') }}" alt="{{ $item->product->name }}">
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6 mt-2 ms-md-3 mt-md-0">
                                                @if ($item->product->discount != 0)
                                                    <p class="small mb-2 badge bg-danger">{{ $item->product->discount }}% OFF</p>
                                                @endif
                                                <h3 class="mb-2 fs-6 fw-bold"><a style="color:#16A085;" href="{{ url('home/'.$item->product->slug) }}">{{ $item->product->name }}</a></h3>
                                                <p class="small" style="color:#16A085;">Stok tersisa {{ $item->product->stoke }}</p>
                                                @if ($item->product->price_discount)
                                                    <span class="text-decoration-line-through text-muted text-danger" style="font-size: 13px">Rp. {{ number_format($item->product->price_discount, 0) }} <span class="fs-6 fw-bold" style="color:#16A085;">Rp. {{ number_format($item->product->price, 0) }}</span></span>
                                                @else
                                                    <span>Rp. {{ number_format($item->product->price, 0) }}</span>
                                                @endif
                                                {{-- <p class="mb-0 fs-6 fw-bold mt-2">Rp. {{ number_format($item->product->price, 0) }}</p> --}}
                                            </div>
                                            <input type="hidden" value="{{ $item->product_id }}" id="prod_id">
                                            <div class="col-12 mt-3 mt-md-0">
                                                <div class="d-flex flex-md-row flex-column-reverse justify-content-end align-items-end align-items-md-center">
                                                    <div class="d-flex flex-row mt-2 mt-md-0">
                                                        <div class="text-black pe-3">
                                                            <button class="btn addToWishlistBtn" style="background: #16A085; color: white">+
                                                                Wishlist</button>
                                                        </div>
                                                        <div>
                                                            <button class="delete-cart-item btn btn-danger ms-3"><i
                                                                class="lni lni-trash-can"></i></button>
                                                        </div>
                                                    </div>
                                                    <div class="col-8 col-md-3 form-group ps-0 ps-md-3">
                                                        <div class="d-flex justify-content-between">
                                                            <script>
                                                                var stoke = '{{ $item->product->stoke }}';
                                                            </script>
                                                            <button
                                                                class="input-group-text changeQuantity decrement-btn me-1" style="background: #16A085; color: white">-</button>
                                                            <input type="text" name="quantity"
                                                                class="form-control qty-input text-center"
                                                                value="{{ $item->product_qty }}">
                                                            @if ($item->product->stoke > $item->product_qty)
                                                            <button
                                                                class="input-group-text changeQuantity increment-btn ms-1" style="background: #16A085; color: white">+</button>
                                                            @else
                                                            <button disabled
                                                                class="input-group-text changeQuantity increment-btn ms-1" style="background: #16A085; color: white">+</button>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    @php
                                                    $total += $item->product->price * $item->product_qty;
                                                    $totalQty += $item->product_qty;
                                                    $totalPrice += $item->product->price;
                                                    @endphp
                                                </div>
                                            </div>
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
                                            <img src="{{ asset('img/undraw_empty_re_opql.svg') }}" alt="">
                                            <div class="page-description">
                                                Tidak ada produk dikeranjang!
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                        </div>
                        @endif
                    </div>
                </div>
                <div class="col-12 col-xl-4">
                    <div class="m-0 m-xl-4 p-4 shadow rounded">
                        <h3 class="mb-3 fs-4">Ringkasan Belanja</h3>
                        <div
                            class="d-flex mb-8 align-items-center justify-content-between pb-3 border-bottom border-info-light">
                            <span class="">Total Harga({{$totalQty}} Barang)</span>
                            <span class="fs-6 fw-bold">Rp. {{ number_format($total, 0) }}</span>
                        </div>
                        <div class="d-flex mb-10 mt-3 justify-content-between align-items-center">
                            <span class="fw-bold">Total Harga</span>
                            <span class="fs-6 fw-bold">Rp. {{ number_format($total, 0) }}</span>
                        </div>
                        @if ($cartItem->count())
                            <a class="btn w-100 text-uppercase text-white" style="background: #16A085;" href="{{ url('cart/shipment') }}">Beli ({{$totalQty}})</a>
                        @else
                            <a class="btn w-100 text-uppercase text-white" style="background: #16A085;" href="{{ url('new-product') }}">Belanja Sekarang</a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

@section('script')
<script type="text/javascript">
    $(document).ready(function () {

            $('.increment-btn').click(function (e) {
                e.preventDefault();

                var inc_value = $(this).closest('#product_data').find('.qty-input').val();

                var value = parseInt(inc_value, stoke);
                value = isNaN(value) ? stoke : value;
                if (value < stoke) {
                    value++;
                    // $('.qty-input').val(value);
                    $(this).closest('#product_data').find('.qty-input').val(value);
                }
            });

            $('.decrement-btn').click(function (e) {
                e.preventDefault();

                var dec_value = $(this).closest('#product_data').find('.qty-input').val();

                var value = Number(dec_value, stoke);
                value = isNaN(value) ? stoke : value;
                if (value > 1) {
                    value--;
                    $(this).closest('#product_data').find('.qty-input').val(value);
                }
            });
        });

        $('.addToWishlistBtn').click(function (e) {
            e.preventDefault();

            var product_id = $(this).closest('#product_data').find('#prod_id').val();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                method: "POST",
                url: "/add-to-wishlist",
                data: {
                    'product_id': product_id,
                },
                success: function (response) {
                    if (response.status == 'Silahkan login!') {
                        window.location = '/login';
                    } else {
                        if (response.message == 'gagal')
                        {
                            iziToast.warning({ //tampilkan iziToast dengan notif data berhasil disimpan pada posisi kanan bawah
                                title: 'Gagal',
                                message: response.status,
                                position: 'topRight'
                            });
                        }
                            else if(response.message == 'berhasil')
                        {
                            // window.location.reload();
                            iziToast.success({ //tampilkan iziToast dengan notif data berhasil disimpan pada posisi kanan bawah
                                title: 'Berhasil',
                                message: response.status,
                                position: 'topRight'
                            });
                        }
                    }
                }
            });
        });

    // Script
    // function incrementValue(e) {
    //     e.preventDefault();
    //     var fieldName = $(e.target).data('field');
    //     var parent = $(e.target).closest('div');
    //     var currentVal = parseInt(parent.find('input[name=' + fieldName + ']').val(), 10);

    //     if (!isNaN(currentVal)) {
    //         parent.find('input[name=' + fieldName + ']').val(currentVal + 1);
    //     } else {
    //         parent.find('input[name=' + fieldName + ']').val(0);
    //     }
    // }

    // function decrementValue(e) {
    //     e.preventDefault();
    //     var fieldName = $(e.target).data('field');
    //     var parent = $(e.target).closest('div');
    //     var currentVal = parseInt(parent.find('input[name=' + fieldName + ']').val(), 10);

    //     if (!isNaN(currentVal) && currentVal > 0) {
    //         parent.find('input[name=' + fieldName + ']').val(currentVal - 1);
    //     } else {
    //         parent.find('input[name=' + fieldName + ']').val(0);
    //     }
    // }

    // $('.input-group').on('click', '.button-plus', function(e) {
    //     incrementValue(e);
    // });

    // $('.input-group').on('click', '.button-minus', function(e) {
    //     decrementValue(e);
    // });
</script>
@endsection
