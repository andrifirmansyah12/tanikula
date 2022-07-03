@extends('pages.template')
@section('title', 'Home')

@section('style')
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
</style>
@endsection

@section('content')
<section class="featured-categories section">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-title">
                    <h2>Kategori Produk</h2>
                </div>
            </div>
        </div>
        <div class="row">
            @if ($category_product->count())
            @foreach ($category_product as $item)
            <div class="col-lg-4 col-md-6 col-12">
                <div class="single-category shadow rounded bg-body">
                    <h3 class="heading"><a class="text-black" href="{{ url('product-category/'.$item->slug) }}"> {{ $item->name }}</a></h3>
                    <ul>
                        @foreach ($product_new->take(3) as $product_category)
                            @if ($product_category->category_product_id == $item->id)
                                <li><a href="{{ url('home/'.$product_category->slug) }}">{{ $product_category->name }}</a></li>
                            @endif
                        @endforeach
                        <li><a href="{{ url('product-category/'.$item->slug) }}">Lainnya</a></li>
                    </ul>
                    <div class="images d-block">
                        @if ($item->id == '1')
                            <img src="{{ asset('img/kategori-produk/beras.png') }}" class="img-fluid pe-4" style="width: 8rem; height: 6rem;"
                                alt="{{$item->name}}">
                        @elseif ($item->id == '2')
                            <img src="{{ asset('img/kategori-produk/buah.png') }}" class="img-fluid pe-4" style="width: 8rem; height: 6rem;"
                                alt="{{$item->name}}">
                        @elseif ($item->id == '3')
                            <img src="{{ asset('img/kategori-produk/olahan-buah.png') }}" class="img-fluid pe-4" style="width: 8rem; height: 6rem;"
                                alt="{{$item->name}}">
                        @elseif ($item->id == '4')
                            <img src="{{ asset('img/kategori-produk/bibit-sayuran.png') }}" class="img-fluid pe-4" style="width: 8rem; height: 6rem;"
                                alt="{{$item->name}}">
                        @elseif ($item->id == '5')
                            <img src="{{ asset('img/kategori-produk/sayuran.png') }}" class="img-fluid pe-4" style="width: 8rem; height: 6rem;"
                                alt="{{$item->name}}">
                        @elseif ($item->id == '6')
                            <img src="{{ asset('img/kategori-produk/roti.png') }}" class="img-fluid pe-4" style="width: 8rem; height: 6rem;"
                                alt="{{$item->name}}">
                        @elseif ($item->id == '7')
                            <img src="{{ asset('img/kategori-produk/jamu.png') }}" class="img-fluid pe-4" style="width: 8rem; height: 6rem;"
                                alt="{{$item->name}}">
                        @elseif ($item->id == '8')
                            <img src="{{ asset('img/kategori-produk/suau-kedelai.png') }}" class="img-fluid pe-4" style="width: 8rem; height: 6rem;"
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
        <div class="row">
            @if ($product_new->count())
            @foreach ($product_new as $item)
            <div class="col-lg-3 col-md-6 col-12">
                <!-- Start Single Product -->
                <div class="single-product">
                    <div class="product-image">
                        <a href="{{ url('home/'.$item->slug) }}">
                            @foreach ($item->photo_product->take(1) as $photos)
                                @if ($photos->name)
                                <img src="{{ asset('../storage/produk/'.$photos->name) }}" alt="{{ $item->name }}"
                                    style="width: 27rem; height: 15rem; -o-object-fit: cover; object-fit: cover; -o-object-position: center; object-position: center;">
                                @else
                                <img src="{{ asset('img/no-image.png') }}" alt="{{ $item->name }}"
                                    style="width: 27rem; height: 10rem; -o-object-fit: cover; object-fit: cover; -o-object-position: center; object-position: center;">
                                @endif
                            @endforeach
                        </a>
                        {{-- <div class="button">
                            <button id="addToCartBtn" class="btn"><i class="lni lni-cart"></i>
                                Keranjang</button>
                        </div> --}}
                    </div>
                    <div class="product-info">
                        <a href="{{ url('product-category/'.$item->product_category->slug) }}">
                            <span class="category">{{ $item->category_name }}</span>
                        </a>
                        <h4 class="title">
                            <a href="{{ url('home/'.$item->slug) }}">{{ $item->name }}</a>
                        </h4>
                        <ul class="review">
                            <li><i class="lni lni-star-filled"></i></li>
                            <li><i class="lni lni-star-filled"></i></li>
                            <li><i class="lni lni-star-filled"></i></li>
                            <li><i class="lni lni-star-filled"></i></li>
                            <li><i class="lni lni-star"></i></li>
                            <li><span>4.0 Ulasan(40)</span></li>
                        </ul>
                        <div class="price">
                            <span>Rp. {{ number_format($item->price, 0) }}</span>
                        </div>
                    </div>
                </div>
                <!-- End Single Product -->
            </div>
            @endforeach
            @else
            <div id="app">
                <section class="section">
                    <div class="container">
                        <div class="page-error">
                            <div class="page-inner">
                                <img src="{{ asset('img/undraw_empty_re_opql.svg') }}" alt="">
                                <div class="page-description text-white">
                                    Tidak ada produk terbaru!
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
<!-- End Trending Product Area -->

<!-- Start Banner Area -->
{{-- <section class="banner">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="single-banner"
                        style="background-image:url('{{ asset('assets/images/banner/banner-1-bg.jpg') }}')">
<div class="content">
    <h2>Smart Watch 2.0</h2>
    <p>Space Gray Aluminum Case with <br>Black/Volt Real Sport Band </p>
    <div class="button">
        <a href="product-grids.html" class="btn">View Details</a>
    </div>
</div>
</div>
</div>
<div class="col-lg-6 col-md-6 col-12">
    <div class="single-banner custom-responsive-margin"
        style="background-image:url('{{ asset('assets/images/banner/banner-2-bg.jpg') }}')">
        <div class="content">
            <h2>Smart Headphone</h2>
            <p>Lorem ipsum dolor sit amet, <br>eiusmod tempor
                incididunt ut labore.</p>
            <div class="button">
                <a href="product-grids.html" class="btn">Shop Now</a>
            </div>
        </div>
    </div>
</div>
</div>
</div>
</section> --}}
<!-- End Banner Area -->

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
        <div class="row">
            @if ($product_search->count())
            @foreach ($product_search as $item)
            <div class="col-lg-3 col-md-6 col-12">
                <!-- Start Single Product -->
                <div class="single-product">
                    <div class="product-image">
                        <a href="{{ url('home/'.$item->slug) }}">
                            @foreach ($item->photo_product->take(1) as $photos)
                                @if ($photos->name)
                                <img src="{{ asset('../storage/produk/'.$photos->name) }}" alt="{{ $item->name }}"
                                    style="width: 27rem; height: 15rem; -o-object-fit: cover; object-fit: cover; -o-object-position: center; object-position: center;">
                                @else
                                <img src="{{ asset('img/no-image.png') }}" alt="{{ $item->name }}"
                                    style="width: 27rem; height: 10rem; -o-object-fit: cover; object-fit: cover; -o-object-position: center; object-position: center;">
                                @endif
                            @endforeach
                        </a>
                        {{-- <div class="button">
                            <a href="product-details.html" class="btn"><i class="lni lni-cart"></i>
                                Keranjang</a>
                        </div> --}}
                    </div>
                    <div class="product-info">
                        <a href="{{ url('product-category/'.$item->product_category->slug) }}">
                            <span class="category">{{ $item->category_name }}</span>
                        </a>
                        <h4 class="title">
                            <a href="{{ url('home/'.$item->slug) }}">{{ $item->name }}</a>
                        </h4>
                        <ul class="review">
                            <li><i class="lni lni-star-filled"></i></li>
                            <li><i class="lni lni-star-filled"></i></li>
                            <li><i class="lni lni-star-filled"></i></li>
                            <li><i class="lni lni-star-filled"></i></li>
                            <li><i class="lni lni-star"></i></li>
                            <li><span>4.0 Ulasan(40)</span></li>
                        </ul>
                        <div class="price">
                            <span>Rp. {{ number_format($item->price, 0) }}</span>
                        </div>
                    </div>
                </div>
                <!-- End Single Product -->
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
                                    Tidak ada produk berdasarkan pencarianmu!
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
