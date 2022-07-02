@extends('pages.template1')
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
                <div class="col-12 col-xl-8 mb-3 mb-xl-0 CartItems">
                    @php
                        $total = 0;
                        $totalPrice = 0;
                        $totalQty = 0;
                    @endphp
                    @if ($cartItem->count())
                    @foreach ($cartItem as $item)
                        <div class="p-5 mt-4 shadow rounded" id="product_data">
                            <h2 class="mb-3 fs-3 mb-md-4">Keranjang</h2>
                            <div class="row align-items-center mb-6 mb-md-3">
                                <div class="col-12 col-md-12 col-lg-12 mb-6 mb-md-0">
                                    <div class="row align-items-center">
                                        <div>
                                            <p class="fw-bold mb-2"><i class="bi bi-shop"></i> {{ $item->product->user->name }}</p>
                                        </div>
                                        <div class="col-12 col-md-3 col-lg-3">
                                            <div class="d-flex align-items-center justify-content-center bg-light"
                                                style="width: 160px; height: 150px;">
                                                @foreach ($item->product->photo_product->take(1) as $photos)
                                                <img class="img-fluid" style="object-fit: contain;"
                                                    src="{{ asset('../storage/produk/'.$photos->name) }}" alt="{{ $item->product->name }}">
                                                @endforeach
                                            </div>
                                        </div>
                                        <div class="col-6 mt-2 mt-md-0">
                                            <h3 class="mb-2 fs-6 fw-bold"><a class="text-black" href="{{ url('home/'.$item->product->slug) }}">{{ $item->product->name }}</a></h3>
                                            {{-- <label for="color">Tipe</label>
                                            <div class="dropdown mt-1">
                                                <button class="btn border dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                                    Pilih Tipe
                                                </button>
                                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                                    <li><a class="dropdown-item" href="#">Tipe A</a></li>
                                                    <li><a class="dropdown-item" href="#">Tipe B</a></li>
                                                    <li><a class="dropdown-item" href="#">Tipe C</a></li>
                                                </ul>
                                            </div> --}}
                                            <p class="mb-0 fs-6 fw-bold mt-2">Rp. {{ number_format($item->product->price, 0) }}</p>
                                        </div>
                                        <div class="col-12 mt-3 mt-md-0">
                                            <div class="d-flex flex-md-row flex-column-reverse justify-content-end align-items-end align-items-md-center">
                                                <div class="d-flex flex-row mt-2 mt-md-0">
                                                    <div class="border-end text-black border-dark pe-3">
                                                        <button class="btn btn-success" id="addToWishlistBtn">+
                                                            Wishlist</button>
                                                    </div>
                                                    <div>
                                                        <button class="delete-cart-item btn btn-danger ms-3"><i
                                                            class="lni lni-trash-can"></i></button>
                                                    </div>
                                                </div>
                                                <div class="col-8 col-md-3 form-group ps-0 ps-md-3">
                                                    <input type="hidden" value="{{ $item->product_id }}" id="prod_id">
                                                    <div class="d-flex justify-content-between">
                                                        <button
                                                            class="input-group-text changeQuantity decrement-btn me-1">-</button>
                                                        <input type="text" name="quantity"
                                                            class="form-control qty-input text-center"
                                                            value="{{ $item->product_qty }}">
                                                        @if ($item->product->stoke >= $item->product_qty)
                                                        <button
                                                            class="input-group-text changeQuantity increment-btn ms-1">+</button>
                                                        @else
                                                        <button disabled
                                                            class="input-group-text changeQuantity increment-btn ms-1">+</button>
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
