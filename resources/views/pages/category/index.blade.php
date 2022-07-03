@extends('pages.template1')
@section('title', 'Kategori Produk')
@section('breadcrumb-title', 'Kategori Produk')
@section('breadcrumb-subTitle', $category_product->name)

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
    <!-- Start Trending Product Area -->
    <section class="section" style="margin-top: 12px;">
        <div class="container">
            <div class="row">
                @if ($product->count())
                @foreach ($product as $item)
                <div class="col-lg-3 col-md-6 col-12">
                    <!-- Start Single Product -->
                    <div class="single-product">
                        <div class="product-image">
                            <a href="{{ url('product-category/'.$category_product->slug.'/'.$item->slug) }}">
                                @foreach ($item->photo_product->take(1) as $photos)
                                    @if ($photos->name)
                                        <img src="{{ asset('../storage/produk/'.$photos->name) }}" alt="{{ $item->name }}" style="width: 27rem; height: 15rem; -o-object-fit: cover; object-fit: cover; -o-object-position: center; object-position: center;">
                                    @else
                                        <img src="{{ asset('img/no-image.png') }}" alt="{{ $item->name }}" style="width: 27rem; height: 10rem; -o-object-fit: cover; object-fit: cover; -o-object-position: center; object-position: center;">
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
                                <a href="{{ url('product-category/'.$category_product->slug.'/'.$item->slug) }}">{{ $item->name }}</a>
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
                                        Tidak ada produk dikategori {{ $category_product->name }}!
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

@endsection

@section('script')
<script>
    //
</script>
@endsection
