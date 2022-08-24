@extends('pages.template')
@section('title', 'Menyediakan produk hasil tani organik')

@section('style')
<meta name="csrf-token" content="{{ csrf_token() }}">
<link rel="stylesheet" href="https://unpkg.com/placeholder-loading/dist/css/placeholder-loading.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
<style>
    .featured-categories .section-title {
        margin-top: 60px;
    }

    @media (max-width: 767px) {
        .section-title h2 {
            font-size: 20px;
            line-height: 30px;
        }

        .featured-categories .section-title {
            margin-top: 0px;
        }

        .featured-categories .single-category {
            margin-top: 0px;
        }
    }

    .featured-categories .single-category {
        padding: 40px;
        height: 200px;
        margin-top: 30px;
        position: relative;
        background: #fff;
        z-index: 0;
    }

    .featured-categories .single-category .heading {
        font-size: 17px;
        font-weight: 700;
        color: #081828;
    }

    .featured-categories .single-category ul {
        margin-top: 20px;
    }

    .featured-categories .single-category ul li {
        display: block;
        margin-bottom: 4px;
    }

    .featured-categories .single-category img {
        position: absolute;
        right: 0;
        top: 50%;
        -webkit-transform: translateY(-50%);
        transform: translateY(-50%);
        z-index: -1;
    }

    .featured-categories .single-category ul li a {
        color: var(--primary);
    }

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
        text-align: center;
        display: table;
    }

    .page-error .page-inner {
        display: table-cell;
        width: 100%;
        vertical-align: middle;
    }

    .page-error img {
        width: 10rem;
    }

    .page-error .page-description {
        padding-top: 30px;
        font-size: 18px;
        font-weight: 400;
        color: var(--primary);
    }

    @media (max-width: 575.98px) {
        .page-error {
            padding-top: 0px;
        }
    }

    .opacity-90 {
        opacity: 90%;
    }
</style>
@endsection

@section('content')
<section class="featured-categories section">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-title">
                    <h2 style="color: #16A085">Kategori Produk</h2>
                </div>
            </div>
        </div>
        <div class="row">
            @if ($category_product->count())
            @foreach ($category_product as $item)
            <div class="col-lg-3 col-md-6 col-12">
                <div class="single-category shadow rounded bg-body">
                    <h4 class="heading"><a style="color:#16A085;" href="{{ url('product-category/'.$item->slug) }}"> {{ $item->name }}</a></h4>
                    <div class="images d-block">
                        @if ($item->id == '1')
                            <img src="{{ asset('img/kategori-produk/beras.png') }}" class="img-fluid pt-3 pe-4" style="width: 6rem; height: 4rem; margin-right: 70px"
                                alt="{{$item->name}}">
                        @elseif ($item->id == '2')
                            <img src="{{ asset('img/kategori-produk/buah.png') }}" class="img-fluid pt-3 pe-4" style="width: 6rem; height: 4rem; margin-right: 70px"
                                alt="{{$item->name}}">
                        @elseif ($item->id == '3')
                            <img src="{{ asset('img/kategori-produk/olahan-buah.png') }}" class="img-fluid pt-3 pe-4" style="width: 6rem; height: 4rem; margin-right: 70px"
                                alt="{{$item->name}}">
                        @elseif ($item->id == '4')
                            <img src="{{ asset('img/kategori-produk/bibit-sayuran.png') }}" class="img-fluid pt-3 pe-4" style="width: 6rem; height: 4rem; margin-right: 70px"
                                alt="{{$item->name}}">
                        @elseif ($item->id == '5')
                            <img src="{{ asset('img/kategori-produk/sayuran.png') }}" class="img-fluid pt-3 pe-4" style="width: 6rem; height: 4rem; margin-right: 70px"
                                alt="{{$item->name}}">
                        @elseif ($item->id == '6')
                            <img src="{{ asset('img/kategori-produk/roti.png') }}" class="img-fluid pt-3 pe-4" style="width: 6rem; height: 4rem; margin-right: 70px"
                                alt="{{$item->name}}">
                        @elseif ($item->id == '7')
                            <img src="{{ asset('img/kategori-produk/jamu.png') }}" class="img-fluid pt-3 pe-4" style="width: 6rem; height: 4rem; margin-right: 70px"
                                alt="{{$item->name}}">
                        @elseif ($item->id == '8')
                            <img src="{{ asset('img/kategori-produk/suau-kedelai.png') }}" class="img-fluid pt-3 pe-4" style="width: 6rem; height: 4rem; margin-right: 70px"
                                alt="{{$item->name}}">
                        @endif
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
                                    Tidak ada Kategori Produk!
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
            @endif
        </div>
    </div>
</section>

<!-- Start Trending Product Area -->
<section class="section" style="background: #16A085;">
    <div class="container mt-3">
        <div class="row">
            <div class="col-12">
                <div class="d-flex align-items-center section-title">
                    <h2>Produk Terbaru</h2>
                    <a class="text-white" href="{{ url('new-product') }}">Lihat semua</a>
                </div>
            </div>
        </div>
        <div class="row" id="homeNewProduct">
            {{-- Content --}}
        </div>
    </div>
</section>
<!-- End Trending Product Area -->

<!-- Start Trending Product Area -->
<section class="section mt-5">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="d-flex align-items-center section-title">
                    <h2>Berdasarkan Pencarianmu</h2>
                    <a href="{{ url('based-on-your-search') }}">Lihat semua</a>
                </div>
            </div>
        </div>
        <div class="row" id="homeSearchProduct">
            {{-- Content --}}
        </div>
    </div>
</section>
<!-- End Trending Product Area -->

<!-- Start Shipping Info -->
{{-- <section class="shipping-info">
    <div class="container">
        <ul>
            <!-- Free Shipping -->
            <li>
                <div class="media-icon">
                    <i class="lni lni-delivery"></i>
                </div>
                <div class="media-body">
                    <h5>Bebas biaya kirim</h5>
                    <span>On order over $99</span>
                </div>
            </li>
            <!-- Money Return -->
            <li>
                <div class="media-icon">
                    <i class="lni lni-support"></i>
                </div>
                <div class="media-body">
                    <h5>24/7 Support.</h5>
                    <span>Live Chat Or Call.</span>
                </div>
            </li>
            <!-- Support 24/7 -->
            <li>
                <div class="media-icon">
                    <i class="lni lni-credit-cards"></i>
                </div>
                <div class="media-body">
                    <h5>Online Payment.</h5>
                    <span>Secure Payment Services.</span>
                </div>
            </li>
            <!-- Safe Payment -->
            <li>
                <div class="media-icon">
                    <i class="lni lni-reload"></i>
                </div>
                <div class="media-body">
                    <h5>Easy Return.</h5>
                    <span>Hassle Free Shopping.</span>
                </div>
            </li>
        </ul>
    </div>
</section> --}}
<!-- End Shipping Info -->
@endsection
@section('script')
<!-- AKHIR LIBARARY JS -->
<script>
    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    });

    $(function() {
        // fetch all employees ajax request
        var displayProduct = 8;
        $('#homeNewProduct').html(createSkeleton(displayProduct));
        $('#homeSearchProduct').html(createSkeleton(displayProduct));

        // jalankan fungsi load content setelah 2 detik
        function createSkeleton(limit)
        {
            var skeletonHTML = '';
            for(var i = 0; i < limit; i++){
                // skeletonHTML += '<div class="row">';
                    skeletonHTML += '<div class="col-lg-3 mt-5 col-md-6 col-12">';
                        skeletonHTML += '<div class="ph-item rounded">';
                            skeletonHTML += '<div class="ph-col-12">';
                                skeletonHTML += '<div class="ph-picture rounded"></div>';
                            skeletonHTML += '</div>';

                            skeletonHTML += '<div>';
                                skeletonHTML += '<div class="ph-row">';
                                    skeletonHTML += '<div class="ph-col-12 rounded"></div>';
                                    skeletonHTML += '<div class="ph-col-12 rounded"></div>';
                                    skeletonHTML += '<div class="ph-col-12 rounded"></div>';
                                    skeletonHTML += '<div class="ph-col-12 empty"></div>';
                                    skeletonHTML += '<div class="ph-col-12 rounded big"></div>';
                                skeletonHTML += '</div>';
                            skeletonHTML += '</div>';

                            skeletonHTML += '<div>';
                                skeletonHTML += '<div class="ph-row">';
                                    skeletonHTML += '<div class="ph-col-12 big rounded"></div>';
                                skeletonHTML += '</div>';
                            skeletonHTML += '</div>';
                        skeletonHTML += '</div>';
                    skeletonHTML += '</div>';
                // skeletonHTML += '</div>';
            }
            return skeletonHTML;
        }

        setTimeout(function(){
            fetchallHomeNewProduct(displayProduct);
            fetchallHomeSearchProduct(displayProduct);
        }, 2000);

        function fetchallHomeNewProduct(limit) {
            $.ajax({
                url: '{{ route('fetchallHomeNewProduct') }}',
                data:{
                    limit:limit,
                },
                method: 'get',
                success: function(response) {
                    $("#homeNewProduct").html(response);
                }
            });
        }

        function fetchallHomeSearchProduct(limit) {
            $.ajax({
                url: '{{ route('fetchallHomeSearchProduct') }}',
                data:{
                    limit:limit,
                },
                method: 'get',
                success: function(response) {
                    $("#homeSearchProduct").html(response);
                }
            });
        }
    });
</script>
@endsection
