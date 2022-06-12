@extends('pages.template1')
@section('title', 'Semua Kategori Produk')

@section('style')
    <style>
        /*  */
    </style>
@endsection

@section('content')
    <!-- Start Breadcrumbs -->
    <div class="breadcrumbs">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="breadcrumbs-content">
                        <h1 class="page-title">@yield('title')</h1>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                    <ul class="breadcrumb-nav">
                        <li><a href="index.html"><i class="lni lni-home"></i> Home</a></li>
                        <li><a href="index.html">Kategori Produk</a></li>
                        <li>@yield('title')</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumbs -->

    <!-- Start Trending Product Area -->
    <section class="section" style="margin-top: 12px;">
        <div class="container">
            <div class="row">
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
            </div>
        </div>
    </section>
    <!-- End Trending Product Area -->

@endsection

@section('script')
<script>
    //
</script>
@endsection
