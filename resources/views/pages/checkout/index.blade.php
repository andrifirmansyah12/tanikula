@extends('pages.template1')
@section('title', 'Checkout')

@section('style')
<style>

</style>
@endsection

@section('content')

<!-- Start Item Details -->
<section class="item-details section bg-white overflow-hidden">
    <div class="container">
        <div class="bg-white">
            <h2 class="mb-3 fs-3 mb-md-4">Checkout</h2>
            <div class="row">
                <div class="col-12 col-xl-8 mb-3 mb-xl-0">
                    <h6 class="">Alamat Pengiriman</h6>
                    <div class="mb-12 py-3 mt-3 border-top border-bottom" id="product_data">
                        <div class="row align-items-center mb-6 mb-md-3">
                            <div class="col-12 col-md-12 col-lg-12 mb-6 mb-md-0">
                                <div class="row align-items-center">
                                    <div>
                                        <p class="fw-bold text-black mb-2">Nama Pembeli <span class="fw-normal">(Rumah) </span> <svg class="text-success" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-patch-check-fill" viewBox="0 0 16 16">
                                        <path d="M10.067.87a2.89 2.89 0 0 0-4.134 0l-.622.638-.89-.011a2.89 2.89 0 0 0-2.924 2.924l.01.89-.636.622a2.89 2.89 0 0 0 0 4.134l.637.622-.011.89a2.89 2.89 0 0 0 2.924 2.924l.89-.01.622.636a2.89 2.89 0 0 0 4.134 0l.622-.637.89.011a2.89 2.89 0 0 0 2.924-2.924l-.01-.89.636-.622a2.89 2.89 0 0 0 0-4.134l-.637-.622.011-.89a2.89 2.89 0 0 0-2.924-2.924l-.89.01-.622-.636zm.287 5.984-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7 8.793l2.646-2.647a.5.5 0 0 1 .708.708z"/>
                                        </svg></p>
                                    </div>
                                    <div class="col-12 mt-2 mt-md-0">
                                        <p class="mb-2 fw-bold text-black">08943435723</p>
                                        <p>C, Sindang, Kabupaten Indramayu, Jawa Barat, 45225 [Tokopedia Note: Desa Panyindangan Wetan Blok C Rt.24 Rw.05 Depan Poskamling]
                                        Sindang, Kab. Indramayu, 45225</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mt-3">
                        <button type="button" class="btn border btn-light" data-bs-toggle="modal" data-bs-target="#PilihAlamat">
                            Pilih Alamat Lain
                        </button>
                        <!-- Modal -->
                        <div class="modal fade" id="PilihAlamat" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        ...
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-primary">Save changes</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @php
                        $total = 0;
                        $totalPrice = 0;
                        $totalQty = 0;
                    @endphp
                    @foreach ($cartItem as $item)
                    <div class="mb-12 py-3 mt-3 border-top border-bottom" id="product_data">
                        <div class="row align-items-center mb-6 mb-md-3">
                            <div class="col-12 col-md-12 col-lg-12 mb-6 mb-md-0">
                                <div class="row align-items-center">
                                    <div>
                                        <p class="fw-bold mb-2"><i class="bi bi-shop"></i>
                                            {{ $item->product->user->name }}</p>
                                    </div>
                                    <div class="col-12 col-md-3 col-lg-3">
                                        <div class="d-flex align-items-center justify-content-center bg-light"
                                            style="width: 160px; height: 150px;">
                                            @foreach ($item->product->photo_product->take(1) as $photos)
                                            <img class="img-fluid" style="object-fit: contain;"
                                                src="{{ asset('../storage/produk/'.$photos->name) }}"
                                                alt="{{ $item->product->name }}">
                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="col-6 mt-2 mt-md-0">
                                        <h3 class="mb-2 fs-6 fw-bold"><a class="text-black"
                                                href="{{ url('home/'.$item->product->slug) }}">{{ $item->product->name }}</a>
                                        </h3>
                                        <p class="fw-bold">Type Produk</p>
                                        <p style="font-size: 13px;">Type Produk <span>{{ $item->product_qty }} Barang</span></p>
                                        <p class="mb-0 fs-6 fw-bold mt-2">Rp.
                                            {{ number_format($item->product->price, 0) }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @php
                        $total = $item->product->price * $item->product_qty;
                        $totalQty += $item->product_qty;
                        $totalPrice += $item->product->price;
                    @endphp
                    <div class="my-2">
                        <div class="d-flex justify-content-between">
                            <div class="fw-bold">Subtotal ({{$item->product_qty}} Barang)</div>
                            <div>Rp. {{ number_format($total, 0) }}</div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="col-12 col-xl-4">
                    <div class="m-0 m-xl-4 p-4 border">
                        <h3 class="mb-3 fs-4">Ringkasan Belanja</h3>
                        <div
                            class="d-flex mb-8 align-items-center justify-content-between pb-3 border-bottom border-info-light">
                            <span class="">Total Harga({{$totalQty}} Barang)</span>
                            <span class="fs-6 fw-bold">Rp. {{ number_format($totalPrice, 0) }}</span>
                        </div>
                        <div class="d-flex mb-10 mt-3 justify-content-between align-items-center">
                            <span class="fw-bold">Total Tagihan</span>
                            <span class="fs-6 fw-bold">Rp. {{ number_format($total, 0) }}</span>
                        </div>
                        <div class="col-12">
                            <button type="button" class="btn border col-12" style="background: #16A085; color: white;" data-bs-toggle="modal" data-bs-target="#PilihPembayaran">
                                Pilih Pembayaran
                            </button>
                            {{-- Modal --}}
                            <div class="modal fade" id="PilihPembayaran" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            ...
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-primary">Save changes</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

@section('script')
<script type="text/javascript">

</script>
@endsection
