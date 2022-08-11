@extends('gapoktan.template')
@section('title', 'Detail Pesanan')

@section('style')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- MULAI STYLE CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/css/bootstrap-datepicker.css" />
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
    <link rel='stylesheet'
        href='https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.5.0/font/bootstrap-icons.min.css' />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/css/iziToast.css"
        integrity="sha256-pODNVtK3uOhL8FUNWWvFQK0QoQoV3YA9wGGng6mbZ0E=" crossorigin="anonymous" />
    <!-- AKHIR STYLE CSS -->
    <style>
        /* STYLE CSS */
        .dt-buttons {
            display: none;
        }
    </style>
@endsection

@section('content')
    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>@yield('title')</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item">Gapoktan</div>
                    <div class="breadcrumb-item active"><a href="#">@yield('title')</a></div>
                </div>
            </div>

            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body p-4">
                                <div class="d-md-flex justify-content-between align-items-center mb-4">
                                    <p class="fw-normal mb-0" style="font-size: 18px">Invoice ID :</p>
                                    <p class="font-weight-bold mb-0" style="font-size: 18px">#{{ $order->code }}</p>
                                </div>
                                <div class="card shadow-0 border mb-4">
                                    <div class="card-body">
                                        <h5>Pesanan {{ $order->address->recipients_name }}</h5>
                                        <hr style="background-color: #e0e0e0; opacity: 1;">
                                        <div>
                                            <p class="font-weight-bold text-black text-uppercase mb-2">Alamat Tagihan</p>
                                            <div>
                                                <p class="text-black m-0">{{ $order->address->recipients_name }}
                                                    <span class="fw-normal">({{$order->address->address_label}})
                                                    </span>
                                                </p>
                                            </div>
                                            <div>
                                                <p class="text-black m-0">
                                                    @if ($order->address->village_id && $order->address->district_id && $order->address->city_id && $order->address->province_id != null)
                                                        {{ $order->address->village->name }}, Kecamatan {{ $order->address->district->name }}, {{ $order->address->city->name }}, Provinsi {{ $order->address->province->name }}
                                                    @endif, {{$order->address->postal_code}}. [TaniKula Note: {{$order->address->complete_address}} {{$order->address->note_for_courier}}].</p>
                                                <p class="text-black m-0">
                                                    @if ($order->address->district_id != null)
                                                        {{ $order->address->district->name }},
                                                    @endif{{$order->address->postal_code}}.
                                                </p>
                                                <p class="text-black m-0 pt-3"><span> Email : </span>
                                                    {{$order->user->email}}</p>
                                                <p class="text-black m-0"><span> No Telp : </span>
                                                    {{$order->address->telp}}</p>
                                                <p class="text-black m-0"><span> Kode Pos : </span>
                                                    {{$order->address->postal_code}}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card shadow-0 border mb-4">
                                    <div class="card-body">
                                        <!-- End Navbar -->
                                        <div class="card-body px-0 pb-2">
                                            <div class="table-responsive p-0">
                                                <table class="table align-items-center mb-0">
                                                    <thead>
                                                        <tr>
                                                            <th
                                                                class="text-uppercase text-black text-xxs font-weight-bolder">
                                                                Foto Produk</th>
                                                            <th
                                                                class="text-uppercase text-black text-xxs font-weight-bolder ps-2">
                                                                Nama Produk</th>
                                                            <th
                                                                class="text-center text-uppercase text-black text-xxs font-weight-bolder">
                                                                Qty</th>
                                                            <th
                                                                class="text-center text-uppercase text-black text-xxs font-weight-bolder">
                                                                Harga Satuan</th>
                                                            <th
                                                                class="text-center text-uppercase text-black text-xxs font-weight-bolder">
                                                                Subtotal</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @php
                                                        $total = 0;
                                                        $totalPrice = 0;
                                                        $totalQty = 0;
                                                        @endphp
                                                        @foreach ($order->orderItems as $orderitem)
                                                        <tr>
                                                            <td>
                                                                <div class="d-flex px-2 py-1">
                                                                    @if ($orderitem->product->photo_product->count() > 0)
                                                                    @foreach ($orderitem->product->photo_product->take(1) as
                                                                    $photos)
                                                                    @if ($photos->name)
                                                                    <img src="{{ asset('../storage/produk/'.$photos->name) }}"
                                                                        class="img-fluid"
                                                                        style="width: 10rem; height: 12rem; -o-object-fit: cover; object-fit: cover; -o-object-position: center; object-position: center;"
                                                                        alt="{{ $orderitem->product->name }}">
                                                                    @else
                                                                    <img src="{{ asset('img/no-image.png') }}" class="img-fluid"
                                                                        style="width: 10rem; -o-object-fit: cover; object-fit: cover; -o-object-position: center; object-position: center;"
                                                                        alt="{{ $orderitem->product->name }}">
                                                                    @endif
                                                                    @endforeach
                                                                    @else
                                                                    <img src="{{ asset('img/no-image.png') }}" class="img-fluid"
                                                                        style="width: 10rem; -o-object-fit: cover; object-fit: cover; -o-object-position: center; object-position: center;"
                                                                        alt="{{ $orderitem->product->name }}">
                                                                    @endif
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <p class="text-xs font-weight-bold mb-0">{{ $orderitem->product->name }}</p>
                                                            </td>
                                                            <td class="align-middle text-center">
                                                                <span
                                                                    class="text-secondary text-xs font-weight-bold">{{ $orderitem->qty }}</span>
                                                            </td>
                                                            <td class="align-middle text-center">
                                                                <span
                                                                    class="text-secondary text-xs font-weight-bold">Rp. {{ number_format($orderitem->price, 0) }}</span>
                                                            </td>
                                                            @php
                                                                $subTotal = $orderitem->price * $orderitem->qty;
                                                                $total += $orderitem->price * $orderitem->qty;
                                                                $totalQty += $orderitem->product_qty;
                                                                $ongkirTotal = $order->total_price - $total;
                                                            @endphp
                                                            <td class="align-middle text-center">
                                                                <span
                                                                    class="text-secondary text-xs font-weight-bold">Rp.{{ number_format($subTotal, 0) }}</span>
                                                            </td>
                                                        </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="d-md-flex justify-content-between pt-2">
                                    <div>
                                        <p class="font-weight-bold mb-0">Rincian Pesanan</p>

                                        <p class="text-muted mb-0">Invoice ID : #{{ $order->code }}</p>
                                        <p class="text-muted mb-0">Tanggal Pemesanan :
                                            {{ \App\Helpers\General::datetimeFormat($order->order_date) }}</p>
                                        <p class="text-muted mb-0 text-capitalize">Status Pesanan :
                                            {{$order->status}}</p>
                                        <p class="text-muted mb-0 text-capitalize">Status Pembayaran :
                                            {{$order->payment_status}}</p>
                                    </div>

                                    <div class="mt-3 mt-md-0">
                                        <p class="text-muted mb-0"><span class="font-weight-bold me-4">Total</span> Rp.
                                            {{ number_format($total, 0) }}</p>
                                        <p class="text-muted mb-0"><span class="fw-bold me-4">Ongkir</span> Rp. {{ number_format($ongkirTotal, 0) }}</p>
                                        <p class="text-muted mb-0"><span class="font-weight-bold me-4">Discount</span> 0</p>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer border-0 px-4 bg-primary shadow-primary border-radius-lg py-5 d-md-flex align-items-center justify-content-between">
                                <h5 class="text-white text-uppercase mb-0">Total
                                    Pembayaran: <span class="d-flex h2 mb-0 text-white text-capitalize">Rp.
                                        {{ number_format($order->total_price, 0) }}</span></h5>
                                @if ($order->status == 'confirmed')
                                    <div class="d-block mt-3 mt-md-0">
                                        <form action="#" method="POST" id="edit_employee_form">
                                            @csrf
                                            <input type="hidden" value="{{$order->id}}" name="emp_id">
                                            <button type="submit" class="d-inline-flex btn border" style="background: #ffff; color: #16A085;">
                                                Pesanan Siap Dikirim
                                            </button>
                                        </form>
                                    </div>
                                @endif
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@section('script')
    <!-- LIBARARY JS -->
    {{-- <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js'></script> --}}
    <!-- DataTable -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/js/bootstrap-datepicker.js"></script>
    <script type="text/javascript" language="javascript"
        src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>

    <script type="text/javascript" language="javascript"
        src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js" type="text/javascript"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.flash.min.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js" type="text/javascript"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.html5.min.js" type="text/javascript"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.print.min.js" type="text/javascript"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"
        integrity="sha256-sPB0F50YUDK0otDnsfNHawYmA5M0pjjUf4TvRJkGFrI=" crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/js/iziToast.js"
        integrity="sha256-siqh9650JHbYFKyZeTEAhq+3jvkFCG8Iz+MHdr9eKrw=" crossorigin="anonymous"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- AKHIR LIBARARY JS -->

    <!-- JAVASCRIPT -->
    <script>
    //CSRF TOKEN PADA HEADER
    //Script ini wajib krn kita butuh csrf token setiap kali mengirim request post, patch, put dan delete ke server
    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    });

    $(function() {
        // update employee ajax request
        $("#edit_employee_form").submit(function (e) {
            e.preventDefault();

            var formData = new FormData(this);
            $.ajax({
                url: '{{ route('gapoktan.updateOrder') }}',
                method: 'post',
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                dataType: 'json',
                success: function (response) {
                    if (response.status == 400) {
                        showError('cancellation_note', response.messages.cancellation_note);
                    } else if (response.status == 200) {
                        window.setTimeout(function(){location.reload()},1000)
                    }
                }
            });
        });
    });
    </script>
@endsection
