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
        margin-top: 30px;
        border: 2px solid #f0f0f0;
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
            @foreach ($category_product as $item)
            <div class="col-lg-4 col-md-6 col-12">
                <div class="single-category">
                    <h3 class="heading"><a href="{{ url('product-category/'.$item->slug) }}"> {{ $item->name }}</a></h3>
                    <ul>
                        <li><a href="product-grids.html">Smart Television</a></li>
                    </ul>
                    <div class="images d-block">
                        <img src="{{ asset('img/Fibers.svg') }}" class="img-fluid" style="width: 10rem; height: 6rem;"
                            alt="#">
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Start Trending Product Area -->
<section class="section" style="background: #16A085;">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="d-flex align-items-center section-title">
                    <h2>Produk Terbaru</h2>
                    <a class="text-white" href="">Lihat semua</a>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach ($product_new as $item)
            <div class="col-lg-3 col-md-6 col-12">
                <!-- Start Single Product -->
                <div class="single-product">
                    <div class="product-image">
                        <a href="{{ url('home/'.$item->slug) }}">
                            @if ($item->image)
                            <img src="{{ asset('../storage/produk/'.$item->image) }}" alt="{{ $item->name }}"
                                style="width: 27rem; height: 15rem; -o-object-fit: cover; object-fit: cover; -o-object-position: center; object-position: center;">
                            @else
                            <img src="{{ asset('img/no-image.png') }}" alt="{{ $item->name }}"
                                style="width: 27rem; height: 10rem; -o-object-fit: cover; object-fit: cover; -o-object-position: center; object-position: center;">
                            @endif
                        </a>
                        <div class="button">
                            <a href="product-details.html" class="btn"><i class="lni lni-cart"></i>
                                Keranjang</a>
                        </div>
                    </div>
                    <div class="product-info">
                        <span class="category">{{ $item->category_name }}</span>
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
                    <a href="">Lihat semua</a>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach ($product_search as $item)
            <div class="col-lg-3 col-md-6 col-12">
                <!-- Start Single Product -->
                <div class="single-product">
                    <div class="product-image">
                        <a href="{{ url('home/'.$item->slug) }}">
                            @if ($item->image)
                            <img src="{{ asset('../storage/produk/'.$item->image) }}" alt="{{ $item->name }}"
                                style="width: 27rem; height: 15rem; -o-object-fit: cover; object-fit: cover; -o-object-position: center; object-position: center;">
                            @else
                            <img src="{{ asset('img/no-image.png') }}" alt="{{ $item->name }}"
                                style="width: 27rem; height: 10rem; -o-object-fit: cover; object-fit: cover; -o-object-position: center; object-position: center;">
                            @endif
                        </a>
                        <div class="button">
                            <a href="product-details.html" class="btn"><i class="lni lni-cart"></i>
                                Keranjang</a>
                        </div>
                    </div>
                    <div class="product-info">
                        <span class="category">{{ $item->category_name }}</span>
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
