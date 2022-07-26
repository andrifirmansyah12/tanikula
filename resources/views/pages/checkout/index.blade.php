@extends('pages.template3')
@section('title', 'Checkout')

@section('style')
<meta name="csrf-token" content="{{ csrf_token() }}">
<link rel='stylesheet'
    href='https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.5.0/font/bootstrap-icons.min.css' />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/css/iziToast.css"
    integrity="sha256-pODNVtK3uOhL8FUNWWvFQK0QoQoV3YA9wGGng6mbZ0E=" crossorigin="anonymous" />
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
    .page-error-address {
        height: 100%;
        width: 100%;
        text-align: center;
        display: table;
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
<section class="item-details mt-md-4 section bg-white overflow-hidden">
    <div class="container">
        <div class="bg-white">
            <h2 class="mb-3 fs-3 mb-md-4">Checkout</h2>
            <form action="{{ url('cart/shipment/place-order') }}" method="POST">
            @csrf
                <div class="row">
                    <div class="col-12 col-xl-8 mb-3 mb-xl-0 mb-5 mb-md-0">
                        <h6 class="">Alamat Pengiriman</h6>
                        <div class="mb-12 py-3 mt-3 border-top border-bottom" id="product_data">
                            <div class="row align-items-center mb-6 mb-md-3">
                                <div class="col-12 col-md-12 col-lg-12 mb-6 mb-md-0">
                                    @if ($address->count() > 0)
                                    @foreach ($address as $item)
                                    <div class="row align-items-center">
                                        <div>
                                            <p class="fw-bold text-black mb-2">{{ $item->recipients_name }} <span class="fw-normal">({{$item->address_label}}) </span> <svg class="text-success" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-patch-check-fill" viewBox="0 0 16 16">
                                            <path d="M10.067.87a2.89 2.89 0 0 0-4.134 0l-.622.638-.89-.011a2.89 2.89 0 0 0-2.924 2.924l.01.89-.636.622a2.89 2.89 0 0 0 0 4.134l.637.622-.011.89a2.89 2.89 0 0 0 2.924 2.924l.89-.01.622.636a2.89 2.89 0 0 0 4.134 0l.622-.637.89.011a2.89 2.89 0 0 0 2.924-2.924l-.01-.89.636-.622a2.89 2.89 0 0 0 0-4.134l-.637-.622.011-.89a2.89 2.89 0 0 0-2.924-2.924l-.89.01-.622-.636zm.287 5.984-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7 8.793l2.646-2.647a.5.5 0 0 1 .708.708z"/>
                                            </svg></p>
                                        </div>
                                        <div class="col-12 mt-2 mt-md-0">
                                            <p class="mb-2 fw-bold text-black">{{$item->telp}}</p>
                                            <p>{{$item->city}}, {{$item->postal_code}} [TaniKula Note: {{$item->complete_address}} {{$item->note_for_courier}}]</p>
                                            <p>{{$item->city}}, {{$item->postal_code}}.</p>
                                        </div>
                                    </div>
                                    @endforeach
                                    @else
                                    <div id="app">
                                        <section class="section p-5">
                                            <div class="container">
                                                <div class="page-error-address">
                                                    <div class="page-inner-address">
                                                        <div class="page-description-address">
                                                            Alamat belum ada, silahkan pilih alamat!
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
                        <div class="mt-3">
                            <button type="button" class="btn border btn-light" data-bs-toggle="modal" data-bs-target="#PilihAlamat">
                                Pilih Alamat Lain
                            </button>
                        </div>
                        @php
                            $total = 0;
                            $totalPrice = 0;
                            $totalQty = 0;
                        @endphp
                        @if ($cartItem->count() > 0)
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
                                                @if ($item->product->photo_product->count() > 0)
                                                    @foreach ($item->product->photo_product->take(1) as $photos)
                                                        @if ($photos->name)
                                                            <img class="img-fluid" style="object-fit: contain;"
                                                                src="{{ asset('../storage/produk/'.$photos->name) }}"
                                                                alt="{{ $item->product->name }}">
                                                        @else
                                                            <img class="img-fluid" style="object-fit: contain;"
                                                                src="{{ asset('img/no-image.png') }}"
                                                                alt="{{ $item->product->name }}">
                                                        @endif
                                                    @endforeach
                                                @else
                                                    <img class="img-fluid" style="object-fit: contain;"
                                                        src="{{ asset('img/no-image.png') }}"
                                                        alt="{{ $item->product->name }}">
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-6 mt-2 mt-md-0">
                                            <h3 class="mb-2 fs-6 fw-bold"><a style="color:#16A085;"
                                                    href="{{ url('home/'.$item->product->slug) }}">{{ $item->product->name }}</a>
                                            </h3>
                                            {{-- <p class="fw-bold">Type Produk</p> --}}
                                            <p style="font-size: 13px;">{{ $item->product_qty }} Barang</p>
                                            <p class="mb-0 fs-6 fw-bold mt-2">Rp.
                                                {{ number_format($item->product->price, 0) }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @php
                            if($result_cost) {
                                foreach($result_cost as $result) {
                                    if ($result['service'] == $data_service) {
                                        $subTotal = $item->product->price * $item->product_qty;
                                        $total += $item->product->price * $item->product_qty;
                                        $totalService = $total + $result['cost'][0]['value'];
                                        $totalQty += $item->product_qty;
                                        $valueService = $result['cost'][0]['value'];
                                    }
                                }
                            } else {
                                $subTotal = $item->product->price * $item->product_qty;
                                $total += $item->product->price * $item->product_qty;
                                $totalQty += $item->product_qty;
                            }
                        @endphp
                        <div class="my-2">
                            <div class="d-flex justify-content-between">
                                <div class="fw-bold">Subtotal ({{$item->product_qty}} Barang)</div>
                                <div>Rp. {{ number_format($subTotal, 0) }}</div>
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
                                                Tidak ada produk untuk melakukan checkout!
                                            </div>
                                            <div class="mt-3 d-inline-flex">
                                                <a class="btn w-100 text-uppercase text-white" style="background: #16A085;" href="{{ url('new-product') }}">Belanja Sekarang</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                        </div>
                        @endif
                    </div>
                    <div class="col-12 col-xl-4">
                        <div class="m-0 m-xl-4 p-4 border">
                            <h3 class="mb-3 fs-4">Ringkasan Belanja</h3>
                            <div
                                class="mb-8 pb-3 border-bottom border-info-light">
                                <div class="d-flex align-items-center justify-content-between">
                                    <span class="">Total Harga({{$totalQty}} Barang)</span>
                                    <span class="fs-6 fw-bold">Rp. {{ number_format($total, 0) }}</span>
                                </div>
                                <div class="d-flex align-items-center justify-content-between">
                                    <span class="">Ongkir</span>
                                    <span class="fs-6 fw-bold">
                                        @if ($result_cost)
                                            @if ($cartItem->count() > 0)
                                                Rp. {{ number_format($valueService, 0) }}
                                            @else
                                                Rp. 0
                                            @endif
                                        @else
                                            Rp. 0
                                        @endif
                                    </span>
                                </div>
                            </div>
                            <div class="d-flex mb-10 mt-3 justify-content-between align-items-center">
                                <span class="fw-bold">Total Tagihan</span>
                                <span class="fs-6 fw-bold">
                                    @if ($result_cost)
                                        @if ($cartItem->count() > 0)
                                            Rp. {{ number_format($totalService, 0) }}
                                        @else
                                            Rp. 0
                                        @endif
                                    @else
                                        Rp. {{ number_format($total, 0) }}
                                    @endif
                                </span>
                            </div>
                            <div class="col-12">
                                @if($result_cost)
                                <div>
                                    <p for="courier" class="py-2 fw-bold">Estimasi</p>
                                    <div class="border p-2 mb-2 rounded">
                                    @foreach($result_cost as $result)
                                        @if ($result['service'] == $data_service)
                                            <input type="hidden" name="priceService" value="{{$result['cost'][0]['value']}}">
                                            <div class="px-2">
                                                <p>{{$result['service']}} - {{$result['description']}} {{$result['cost'][0]['value']}}</p>
                                                <p>({{$result['cost'][0]['etd']}} Hari)</p>
                                            </div>
                                            <p style="cursor: pointer;" class="px-2 text-end fw-bold" data-bs-toggle="modal" data-bs-target="#PilihCourier">Ganti Kurir</p>
                                        @endif
                                    @endforeach
                                    </div>
                                </div>
                                @else
                                    @if ($cartItem->count() > 0)
                                    <div class="mb-2">
                                        <label for="courier" class="py-2">Pilih Kurir</label>
                                        <a style="background: #16A085; color: white" class="d-flex justify-content-center btn btn-light border" data-bs-toggle="modal" data-bs-target="#PilihCourier">Pilih Kurir</a>
                                    </div>
                                    @endif
                                @endif
                                @if (!$result_cost)
                                    <button disabled class="btn border col-12" style="background: #16A085; color: white;" data-bs-toggle="modal" data-bs-target="#PilihPembayaran">
                                        Buat Pesanan
                                    </button>
                                @else
                                    @if ($address->count() < 1 )
                                        <button disabled class="btn border col-12" style="background: #16A085; color: white;" data-bs-toggle="modal" data-bs-target="#PilihPembayaran">
                                            Buat Pesanan
                                        </button>
                                    @else
                                        @if ($cartItem->count() > 0)
                                            <button type="submit" class="btn border col-12" style="background: #16A085; color: white;" data-bs-toggle="modal" data-bs-target="#PilihPembayaran">
                                                Buat Pesanan
                                            </button>
                                        @else
                                            <button disabled class="btn border col-12" style="background: #16A085; color: white;" data-bs-toggle="modal" data-bs-target="#PilihPembayaran">
                                                Buat Pesanan
                                            </button>
                                        @endif
                                    @endif
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>

<!-- Modal Pilih Alamat -->
<div class="modal fade" id="PilihCourier" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            {{-- <form action="#" id="checkCourier" method="GET">
                @csrf --}}
                <div class="modal-body">
                    {{-- @if($result_cost)
                    <div>
                        <label for="service" class="py-2">Pilih Pengiriman</label>
                        <select name="service" required class="form-control">
                            <option value="" selected disabled holder>Pilih Pengiriman</option>
                            @foreach($result_cost as $result)
                            <option>{{$result['service']}} - {{$result['description']}} {{$result['cost'][0]['value']}}
                                ({{$result['cost'][0]['etd']}} Hari)</span></option>
                            @endforeach
                        </select>
                    </div>
                    @else --}}
                    <form action="{{ url('/cart/shipment') }}" method="get">
                        @csrf
                        <div class="my-2">
                            <p class="py-2">Pilih Kurir</p>
                            <select name="courier" required class="form-control">
                                <option value="" selected disabled holder>Pilih Kurir</option>
                                <option value="jne">JNE</option>
                                <option value="tiki">TIKI</option>
                                <option value="pos">POS</option>
                            </select>
                            <button id="btn-check" class="my-2 border btn btn-light col-12">Check Kurir</button>
                        </div>

                        <div class="form-group mt-5">
                            <h1 class="text-center">ESTIMASI</h1>
                            <p class="py-2">Pilih Estimasi</p>
                            <select name="service" id="service" class="form-control" required>
                                <option value="" disabled selected holder>Pilih Estimasi</option>
                            </select>
                            <button type="submit" style="background: #16A085; color: white" id="btnDisabled" disabled
                                class="my-2 border btn btn-light col-12">Simpan</button>
                        </div>
                    </form>
                    {{-- @endif --}}
                </div>
            {{-- </form> --}}
        </div>
    </div>
</div>

<!-- Modal Pilih Alamat -->
<div class="modal fade" id="PilihAlamat" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Pilih Alamat Pengiriman</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <button type="button" class="btn btn-light col-12 border" data-bs-toggle="modal"
                    data-bs-target="#TambahAlamat" data-bs-dismiss="modal">
                    Tambah Alamat Baru
                </button>
                <div class="mt-5" id="show_all_employees">

                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Edit Alamat -->
<div class="modal fade" id="EditAlamat" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Alamat</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="#" method="POST" id="edit_employee_form" enctype="multipart/form-data">
                    @csrf
                    <div>
                        <input type="hidden" name="emp_id" id="emp_id">
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Nama
                                Penerima:</label>
                            <input type="text" name="recipients_name" id="recipients_name" class="form-control"
                                id="recipient-name">
                        </div>
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">No. Hp:</label>
                            <input type="tel" name="telp" id="telp" class="form-control" id="recipient-name">
                        </div>
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Label Alamat:</label>
                            <input type="text" name="address_label" id="address_label" class="form-control"
                                id="recipient-name">
                            <small class="d-flex text-danger pb-1">*Contoh: Rumah, Kantor</small>
                        </div>
                        <div class="row">
                            <div class="mb-3 col-8">
                                <label for="recipient-name" class="col-form-label">Kec, Kab
                                    dan Provinsi:</label>
                                <input type="text" name="city" id="city" class="form-control" id="recipient-name">
                                <small class="d-flex text-danger pb-1">*Contoh: Kec Sindang, Kab Indramayu, Jawa
                                    Barat</small>
                            </div>
                            <div class="mb-3 col-4">
                                <label for="recipient-name" class="col-form-label">Kode Pos:</label>
                                <input type="text" name="postal_code" id="postal_code" class="form-control"
                                    id="recipient-name">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="message-text" class="col-form-label">Alamat Lengkap:</label>
                            <textarea class="form-control" name="complete_address" id="complete_address" rows="3"
                                id="message-text"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Catatan untuk
                                kurir:</label>
                            <input type="text" name="note_for_courier" id="note_for_courier" class="form-control">
                            <small class="d-flex text-danger pb-1">Warna rumah, patokan, pesan khusus, dll.</small>
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-text bg-white" id="main_address">

                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
                        <button type="submit" id="edit_employee_btn" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal Tambah Alamat -->
<div class="modal fade" id="TambahAlamat" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Alamat Baru</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="#" method="POST" id="add_employee_form" accept-charset="utf-8"
                    enctype="multipart/form-data">
                    @csrf
                    <div>
                        <div class="mb-3">
                            <label for="recipients_name" class="col-form-label">Nama Penerima:</label>
                            <input type="text" name="recipients_name" class="form-control" id="recipient-name">
                        </div>
                        <div class="mb-3">
                            <label for="telp" class="col-form-label">No. Hp:</label>
                            <input type="tel" name="telp" class="form-control" id="recipient-name">
                        </div>
                        <div class="mb-3">
                            <label for="address_label" class="col-form-label">Label Alamat:</label>
                            <input type="text" name="address_label" class="form-control" id="recipient-name">
                            <small class="d-flex text-danger pb-1">*Contoh: Rumah, Kantor</small>
                        </div>
                        <div class="row">
                            <div class="mb-3 col-8">
                                <label for="city" class="col-form-label">Kec, Kab
                                    dan Provinsi:</label>
                                <input type="text" name="city" class="form-control" id="recipient-name">
                                <small class="d-flex text-danger pb-1">*Contoh: Kec Sindang, Kab Indramayu, Jawa
                                    Barat</small>
                            </div>
                            <div class="mb-3 col-4">
                                <label for="postal_code" class="col-form-label">Kode Pos:</label>
                                <input type="text" name="postal_code" class="form-control" id="recipient-name">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="complete_address" class="col-form-label">Alamat Lengkap:</label>
                            <textarea class="form-control" name="complete_address" rows="3"
                                id="message-text"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="note_for_courier" class="col-form-label">Catatan untuk kurir:</label>
                            <input type="text" name="note_for_courier" class="form-control" id="recipient-name">
                            <small class="d-flex text-danger pb-1">Warna rumah, patokan, pesan khusus, dll.</small>
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-text bg-white">
                                <input class="form-check-input mt-0" type="checkbox" name="main_address">
                                <span class="px-3">Jadikan Alamat Utama</span>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
                        <button type="submit" id="add_employee_btn" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"
    integrity="sha256-sPB0F50YUDK0otDnsfNHawYmA5M0pjjUf4TvRJkGFrI=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/js/iziToast.js"
    integrity="sha256-siqh9650JHbYFKyZeTEAhq+3jvkFCG8Iz+MHdr9eKrw=" crossorigin="anonymous"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script type="text/javascript">
    //CSRF TOKEN PADA HEADER
    //Script ini wajib krn kita butuh csrf token setiap kali mengirim request post, patch, put dan delete ke server
    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    });

    $(document).ready(function(){
    //ajax check ongkir
        $('#btn-check').click(function (e) {
            e.preventDefault();

            let token = $("meta[name='csrf-token']").attr("content");
            let courier = $('select[name=courier]').val();

            $.ajax({
                url: "/ongkir",
                data: {
                    _token: token,
                    courier: courier,
                },
                dataType: "JSON",
                type: "POST",
                success: function (response) {
                    if (response) {
                        $('select[name="service"]').empty();
                        $("#btnDisabled").prop('disabled', false);
                        var increment = 0;
                        $.each(response, function (key, value) {
                            $('select[name="service"]').append('<option value="'+value.service+'"><strong>'+value.service+'</strong> - Rp. '+value.cost[0].value+' ('+value.cost[0].etd+' hari)</option>')
                        });
                    }
                }
            });
        });
    });

    $(function() {

        // add new employee ajax request
            $("#add_employee_form").submit(function(e) {
                e.preventDefault();
                var formData = new FormData(this);
                $("#add_employee_btn").text('Tunggu..');
                $("#add_employee_btn").prop('disabled', true);
                $.ajax({
                url: '{{ route('add-alamat-costumer') }}',
                method: 'post',
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                dataType: 'json',
                success: function(response) {
                    if (response.status == 400) {
                        showError('recipients_name', response.messages.recipients_name);
                        showError('telp', response.messages.telp);
                        showError('address_label', response.messages.address_label);
                        showError('postal_code', response.messages.postal_code);
                        showError('complete_address', response.messages.complete_address);
                        showError('note_for_courier', response.messages.note_for_courier);
                        $("#add_employee_btn").text('Simpan');
                        $("#add_employee_btn").prop('disabled', false);
                    } else if (response.status == 200){
                        Swal.fire(
                            'Menambahkan!',
                            'Alamat Berhasil Ditambahkan!',
                            'success'
                        )
                        fetchAllEmployees();
                        $("#TambahAlamat").modal('hide');
                        $("#add_employee_form")[0].reset();
                        $("#add_employee_btn").text('Simpan');
                        $("#add_employee_btn").prop('disabled', false);
                        window.location.reload();
                    }
                }
                });
            });

        // edit employee ajax request
        $(document).on('click', '.editAlamat', function (e) {
            e.preventDefault();
            let id = $(this).attr('id');
            $.ajax({
                url: '{{ route('edit.alamat.costumer') }}',
                method: 'get',
                data: {
                    id: id,
                    _token: '{{ csrf_token() }}'
                },
                success: function (response) {
                    $("#recipients_name").val(response.recipients_name);
                    $("#telp").val(response.telp);
                    $("#address_label").val(response.address_label);
                    $("#city").val(response.city);
                    $("#postal_code").val(response.postal_code);
                    $("#complete_address").val(response.complete_address);
                    $("#note_for_courier").val(response.note_for_courier);
                    $("#main_address").html(`
                        <input class="form-check-input mt-0" type="checkbox" ${response.main_address ? 'checked' : ''} name="main_address">
                        <span class="px-3">Jadikan Alamat Utama</span>
                    `);
                    $("#emp_id").val(response.id);
                }
            });
        });

        // update employee ajax request
        $("#edit_employee_form").submit(function (e) {
            e.preventDefault();

            var formData = new FormData(this);
            $("#edit_employee_btn").text('Tunggu..');
            $("#edit_employee_btn").prop('disabled', true);
            $.ajax({
                url: '{{ route('update.alamat.costumer') }}',
                method: 'post',
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                dataType: 'json',
                success: function (response) {
                    if (response.status == 400) {
                        showError('recipients_name', response.messages.recipients_name);
                        showError('telp', response.messages.telp);
                        showError('address_label', response.messages.address_label);
                        showError('postal_code', response.messages.postal_code);
                        showError('complete_address', response.messages.complete_address);
                        showError('note_for_courier', response.messages.note_for_courier);
                        $("#edit_employee_btn").text('Simpan');
                        $("#edit_employee_btn").prop('disabled', false);
                    } else if (response.status == 200) {
                        Swal.fire(
                            'Memperbarui!',
                            'Alamat Berhasil diperbarui!',
                            'success'
                        )
                        fetchAllEmployees();
                        $("#EditAlamat").modal('hide');
                        $("#edit_employee_form")[0].reset();
                        $("#edit_employee_btn").text('Simpan');
                        $("#edit_employee_btn").prop('disabled', false);
                        window.location.reload();
                    }
                }
            });
        });

         // delete employee ajax request
        $(document).on('click', '.updateMainAddress', function(e) {
            e.preventDefault();
            let id = $(this).attr('id');
            let csrf = '{{ csrf_token() }}';
            Swal.fire({
            title: 'Apa kamu yakin?',
            text: "Ingin menjadikan alamat utama!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Jadikan alamat utama!',
            cancelButtonText: 'Kembali!'
            }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                url: '{{ route('updateMainAddress.pembeli.alamat') }}',
                method: 'POST',
                data: {
                    id: id,
                    _token: csrf
                },
                success: function(response) {
                    if (response.status == 200) {
                        Swal.fire(
                            'Berhasil!',
                            'Berhasil menjadikan alamat utama!',
                            'success'
                        )
                        window.setTimeout(function(){location.reload()},1000)
                    }
                }
                });
            }
            })
        });

        // fetch all employees ajax request
        fetchAllEmployees();

        function fetchAllEmployees() {
            $.ajax({
            url: '{{ route('alamat-fetchAll') }}',
            method: 'get',
            success: function(response) {
                $("#show_all_employees").html(response);
            }
            });
        }
    });
</script>
@endsection
