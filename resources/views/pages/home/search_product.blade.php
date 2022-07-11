@extends('pages.template1')
@section('title', 'Produk Terbaru')
@section('breadcrumb-title', 'Pencarian')
@section('breadcrumb-subTitle', 'Produk')

@section('style')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
    <style>
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
    <div class="container pt-5 d-flex justify-content-end">
        <div class="dropdown dropstart">
            <button class="btn btn-light dropdown-toggle" style="color:#16A085;" type="button" id="dropdownMenuButton1"
                data-bs-toggle="dropdown" aria-expanded="false">
                Filter Berdasarkan
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                <li>
                    <form action="{{ url('/search-product') }}">
                        <input type="hidden" name="max_price" id="max_price" value="max_price">
                        <button type="submit" id="max_price_btn" class="dropdown-item">Harga Tertinggi</button>
                    </form>
                </li>
                <li>
                    <form action="{{ url('/search-product') }}">
                        <input type="hidden" name="min_price" id="min_price" value="min_price">
                        <button type="submit" id="min_price_btn" class="dropdown-item">Harga Terendah</button>
                    </form>
                </li>
            </ul>
        </div>
    </div>
    <!-- Start Trending Product Area -->
    <section class="section">
        <div class="container">
            <div class="row">
                @foreach ($product_new as $item)
                <div class="col-lg-3 col-md-6 col-12">
                    <!-- Start Single Product -->
                    <div class="single-product" style="height: 24.5rem">
                        <div class="product-image">
                            <a href="{{ url('home/'.$item->slug) }}">
                                @if ($item->photo_product->count() > 0)
                                    @foreach ($item->photo_product->take(1) as $photos)
                                        @if ($photos->name)
                                        <img src="{{ asset('../storage/produk/'.$photos->name) }}" alt="{{ $item->name }}"
                                            style="width: 27rem; height: 12rem; -o-object-fit: cover; object-fit: cover; -o-object-position: center; object-position: center;">
                                        @else
                                        <img src="{{ asset('img/no-image.png') }}" alt="{{ $item->name }}"
                                            style="width: 27rem; height: 12rem; -o-object-fit: cover; object-fit: cover; -o-object-position: center; object-position: center;">
                                        @endif
                                    @endforeach
                                @else
                                    <img src="{{ asset('img/no-image.png') }}" alt="{{ $item->name }}"
                                        style="width: 27rem; height: 12rem; -o-object-fit: cover; object-fit: cover; -o-object-position: center; object-position: center;">
                                @endif
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
                                <a href="{{ url('home/'.$item->slug) }}" style="color:#16A085; display: -webkit-box; -webkit-box-orient: vertical; -webkit-line-clamp: 2; overflow: hidden;">{{ $item->name }}</a>
                            </h4>
                            <ul class="review">
                                <div>
                                    @if ($item->stock_out)
                                        <span>{{$item->stock_out}} Terjual</span>
                                    @else
                                        <span>0 Terjual</span>
                                    @endif
                                </div>
                                @php
                                    $reviews = App\Models\Review::where('product_id', $item->id)->get();
                                    $ratingSum = App\Models\Review::where('product_id', $item->id)->sum('stars_rated');
                                    if ($reviews->count() > 0){
                                        $ratingValue = $ratingSum / $reviews->count();
                                    } else {
                                        $ratingValue = 0;
                                    }
                                    $rateNum = number_format($ratingValue)
                                @endphp
                                @for ($i = 1; $i <= $rateNum; $i++)
                                    <li><i class="lni lni-star-filled"></i></li>
                                @endfor
                                @for ($j = $rateNum+1; $j <= 5; $j++)
                                    <li><i class="lni lni-star"></i>
                                    </li>
                                @endfor
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
{{--  --}}
@endsection
