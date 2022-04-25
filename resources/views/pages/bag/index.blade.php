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
</style>
@endsection

@section('content')

<!-- Start Item Details -->
<section class="item-details section bg-white overflow-hidden">
    <div class="container">
        <div class="bg-white">
            <h2 class="mb-3 fs-3 mb-md-4">Keranjang</h2>
            <div class="row">
                <div class="col-12 col-xl-8 mb-3 mb-xl-0">
                    @php
                        $total = 0;
                    @endphp
                    @foreach ($cartItem as $item)
                        <div class="mb-12 py-3 mt-3 border-top border-bottom" id="product_data">
                            <div class="row align-items-center mb-6 mb-md-3">
                                <div class="col-12 col-md-12 col-lg-12 mb-6 mb-md-0">
                                    <div class="row align-items-center">
                                        <div>
                                            <p class="fw-bold mb-2"><i class="bi bi-shop"></i> {{ $item->product->user->name }}</p>
                                        </div>
                                        <div class="col-12 col-md-3 col-lg-3">
                                            <div class="d-flex align-items-center justify-content-center bg-light"
                                                style="width: 160px; height: 150px;">
                                                <img class="img-fluid" style="object-fit: contain;"
                                                    src="{{ asset('../storage/produk/'.$item->product->image) }}" alt="">
                                            </div>
                                        </div>
                                        <div class="col-6 mt-2 mt-md-0">
                                            <h3 class="mb-2 fs-6 fw-bold">{{ $item->product->name }}</h3>
                                            <label for="color">Tipe</label>
                                            <div class="dropdown mt-1">
                                                <button class="btn border dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                                    Pilih Tipe
                                                </button>
                                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                                    <li><a class="dropdown-item" href="#">Tipe A</a></li>
                                                    <li><a class="dropdown-item" href="#">Tipe B</a></li>
                                                    <li><a class="dropdown-item" href="#">Tipe C</a></li>
                                                </ul>
                                            </div>
                                            <p class="mb-0 fs-6 fw-bold mt-2">Rp. {{ number_format($item->product->price, 0) }}</p>
                                        </div>
                                        <div class="col-12 mt-3 mt-md-0">
                                            <div class="d-flex flex-row justify-content-end align-items-center">
                                                <h6 class="border-end border-dark pe-3">Favorit</h6>
                                                <button class="delete-cart-item btn btn-danger ms-3"><i class="lni lni-trash-can"></i></button>
                                                {{-- <div class="d-flex justify-content-between">
                                                    <div class="input-group w-auto justify-content-end align-items-center">
                                                        <input type="button" value="-" class="button-minus border rounded-circle icon-shape icon-sm mx-1" data-field="quantity">
                                                        <input type="number" step="1" max="10" value="1" name="quantity" class="quantity-field border-0 text-center w-25">
                                                        <input type="button" value="+" class="button-plus border rounded-circle icon-shape icon-sm" data-field="quantity">
                                                    </div>
                                                </div> --}}
                                                <div class="col-6 col-md-3 form-group" style="margin-left: 10px">
                                                    <input type="hidden" value="{{ $item->product_id }}" id="prod_id">
                                                    <div class="d-flex justify-content-between">
                                                        <button class="input-group-text changeQuantity decrement-btn me-1">-</button>
                                                        <input type="text" name="quantity" class="form-control qty-input text-center" value="{{ $item->product_qty }}">
                                                        <button class="input-group-text changeQuantity increment-btn ms-1">+</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @php
                            $total += $item->product->price * $item->product_qty;
                        @endphp
                    @endforeach
                </div>
                <div class="col-12 col-xl-4">
                    <div class="m-0 m-xl-4 p-4 border">
                        <h3 class="mb-3 fs-4">Ringkasan Belanja</h3>
                        <div
                            class="d-flex mb-8 align-items-center justify-content-between pb-3 border-bottom border-info-light">
                            <span class="">Total Harga(0 Barang)</span>
                            <span class="fs-6 fw-bold">Rp0</span>
                        </div>
                        <div class="d-flex mb-10 mt-3 justify-content-between align-items-center">
                            <span class="fw-bold">Total Harga</span>
                            <span class="fs-6 fw-bold">Rp. {{ number_format($total, 0) }}</span>
                        </div>
                        <a class="btn w-100 text-uppercase text-white" style="background: #16A085;" href="#">Beli (0)</a>
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
