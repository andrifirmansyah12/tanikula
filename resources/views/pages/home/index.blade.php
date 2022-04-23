@extends('pages.template')
@section('title', 'Home')

@section('content')
    <section class="section" style="background-color: white;">
        <div class="container pt-5">
            <div class="card shadow bg-body rounded-full">
                <div class="row">
                    <div class="col-12">
                        <div class="section-title" style="margin-top: 30px; margin-left: 30px">
                            <h2>Kategori Produk</h2>
                        </div>
                    </div>
                    @foreach ($category_product as $item)
                    <div class="col-xl-3 col-lg-4 col-md-6 col-12">
                        <a style="color: #081828" href="{{ url('product-category/'.$item->slug) }}">
                            <div class="card text-center single-product mx-5" style="margin-bottom: 30px;">
                                <div class="card-body product-image">
                                    <img src="{{ asset('img/Fibers.svg') }}" alt="#" class="img-fluid"
                                        style="width: 5rem; height: 5rem;">
                                    <p class="card-title pt-2">{{ $item->name }}</p>
                                </div>
                            </div>
                        </a>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <!-- Start Trending Product Area -->
    <section class="section" style="margin-top: 12px;">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="d-flex align-items-center section-title">
                        <h2>Produk Terbaru</h2>
                        <a href="">Lihat semua</a>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach ($product_new as $item)
                <div class="col-lg-3 col-md-6 col-12">
                    <!-- Start Single Product -->
                    <div class="single-product">
                        <div class="product-image">
                            <a href="">
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
                            <span class="category">{{ $item->product_category->name }}</span>
                            <h4 class="title">
                                <a href="">{{ $item->name }}</a>
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
    <section class="section">
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
                            @if ($item->image)
                                <img src="{{ asset('../storage/produk/'.$item->image) }}" alt="{{ $item->name }}" style="width: 27rem; height: 15rem; -o-object-fit: cover; object-fit: cover; -o-object-position: center; object-position: center;">
                            @else
                                <img src="{{ asset('img/no-image.png') }}" alt="{{ $item->name }}" style="width: 27rem; height: 10rem; -o-object-fit: cover; object-fit: cover; -o-object-position: center; object-position: center;">
                            @endif
                            <div class="button">
                                <a href="product-details.html" class="btn"><i class="lni lni-cart"></i>
                                    Keranjang</a>
                            </div>
                        </div>
                        <div class="product-info">
                            <span class="category">{{ $item->product_category->name }}</span>
                            <h4 class="title">
                                <a href="product-grids.html">{{ $item->name }}</a>
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

    <!-- Start Call Action Area -->
    {{-- <section class="call-action section">
        <div class="container">
            <div class="row ">
                <div class="col-lg-8 offset-lg-2 col-12">
                    <div class="inner">
                        <div class="content">
                            <h2 class="wow fadeInUp" data-wow-delay=".4s">Currently You are using free<br>
                                Lite version of ShopGrids</h2>
                            <p class="wow fadeInUp" data-wow-delay=".6s">Please, purchase full version of the
                                template
                                to get all pages,<br> features and commercial license.</p>
                            <div class="button wow fadeInUp" data-wow-delay=".8s">
                                <a href="javascript:void(0)" class="btn">Purchase Now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}
    <!-- End Call Action Area -->

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
                        <h5>Free Shipping</h5>
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
