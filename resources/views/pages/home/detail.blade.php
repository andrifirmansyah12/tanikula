@extends('pages.template1')
@section('title', 'Detail Produk')
@section('breadcrumb-title', $product->product_category->name)
@section('breadcrumb-subTitle', substr($product->name,0,20). '...')

@section('style')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        .ratings-color{
           color: #f0d800;
        }

        .page-error {
            height: 100%;
            width: 100%;
            text-align: center;
            display: table;
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
    <!-- Start Item Details -->
    <section class="item-details section bg-white mt-md-5">
        <div class="container">
            <div class="top-area shadow" id="product_data">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-md-12 col-12">
                        <div class="product-images">
                            <main id="">
                                <div class="main-img">
                                    @if ($product->photo_product->count() > 0)
                                        @foreach ($product->photo_product->take(1) as $photos)
                                            @if ($photos->name)
                                                <img src="{{ asset('../storage/produk/'.$photos->name) }}" id="current" alt="{{ $product->name }}">
                                            @else
                                                <img src="{{ asset('img/no-image.png') }}" id="current" alt="{{ $product->name }}">
                                            @endif
                                        @endforeach
                                    @else
                                        <img src="{{ asset('img/no-image.png') }}" id="current" alt="{{ $product->name }}">
                                    @endif
                                </div>
                                <div class="images">
                                    @foreach ($product->photo_product as $photos)
                                        <img src="{{ asset('../storage/produk/'.$photos->name) }}" class="img" alt="#">
                                    @endforeach
                                </div>
                            </main>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12 col-12">
                        <div class="product-info">
                            <p class="h5 mb-3">
                                @if ($product->stoke < 1)
                                    <label class="badge bg-danger">Habis</label>
                                @elseif($product->stoke < 10)
                                    <label class="badge bg-danger">Tersisa {{ $product->stoke }}</label>
                                @endif
                            </p>
                            <h2 class="title text-capitalize" style="color:#16A085;">{{ $product->name }}</h2>
                            @php
                                $rateNum = number_format($ratingValue)
                            @endphp
                            <div class="pb-3 rating-produk">
                                <div class="star-icon" style="
                                        font-size: 20px;
                                        font-family: sans-serif;
                                        font-weight: 800;
                                        text-transform: uppercase;">
                                    @for ($i = 1; $i <= $rateNum; $i++)
                                        <i class="lni lni-star-filled ratings-color"></i>
                                    @endfor
                                    @for ($j = $rateNum+1; $j <= 5; $j++)
                                        <i class="lni lni-star-filled"></i>
                                    @endfor
                                </div>
                            </div>
                            <p class="category"><i class="lni lni-tag"></i> Kategori:<a
                                    href="{{ url('product-category/'.$product->product_category->slug) }}">{{ $product->product_category->name }}</a></p>
                            {{-- <h3 class="price">Rp. {{ number_format($product->price, 0) }}<span>Rp. {{ number_format(0, 0) }}</span></h3> --}}
                            <h3 class="price" style="color:#16A085;">Rp. {{ number_format($product->price, 0) }}</h3>
                            <p class="info-text">{{ $product->desc }}</p>
                            <div class="row">
                                {{-- <div class="col-lg-4 col-md-4 col-12">
                                    <div class="form-group">
                                        <label for="color">Tipe</label>
                                        <select class="form-control" id="color">
                                            <option>Tipe A</option>
                                            <option>Tipe B</option>
                                            <option>Tipe C</option>
                                        </select>
                                    </div>
                                </div> --}}
                                <div class="col-lg-4 col-md-4 col-12">
                                    <div class="form-group">
                                        <input type="hidden" value="{{ $product->id }}" id="prod_id">
                                        <label for="quantity">Kuantitas</label>
                                        <div class="d-flex">
                                            <script>
                                                var stoke = '{{ $product->stoke }}';
                                            </script>
                                            <button class="input-group-text decrement-btn me-1">-</button>
                                            <input type="text" name="quantity" class="form-control qty-input text-center" value="1">
                                            <button class="input-group-text increment-btn ms-1">+</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-12">
                                    <div class="form-group">
                                        <label for="color">Lainnya</label>
                                        <div class="wish-button">
                                            <button class="btn"><i class="bi bi-chat-dots"></i> Chat</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="bottom-content">
                                <div class="row align-items-end">
                                    @if ($product->stoke < 1)
                                    <div class="col-lg-4 col-md-4 col-12">
                                        <div class="button cart-button">
                                            <button disabled class="btn" id="addToCartBtn" style="width: 100%;">+ Keranjang</button>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-12">
                                        <div class="wish-button">
                                            <button disabled class="btn">Beli Langsung</button>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-12">
                                        <div class="wish-button">
                                            <button disabled class="btn" id="addToWishlistBtn">+ Wishlist</button>
                                        </div>
                                    </div>
                                    @else
                                    <div class="col-lg-4 col-md-4 col-12">
                                        <div class="button cart-button">
                                            <button class="btn" id="addToCartBtn" style="width: 100%;">+ Keranjang</button>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-12">
                                        <div class="wish-button">
                                            <button class="btn">Beli Langsung</button>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-12">
                                        <div class="wish-button">
                                            <button class="btn" id="addToWishlistBtn">+ Wishlist</button>
                                        </div>
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="product-details-info shadow">
                <div class="single-block">
                    <h5 class="mx-2 fw-bold" style="color:#16A085;">Produk Lainnnya</h5>
                    <div class="owl-carousel owl-theme">
                        @foreach ($product_new as $item)
                        <!-- Start Single Product -->
                        <div class="mx-2 single-product shadow-none" style="height: 25.3rem">
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
                            </div>
                            <div class="product-info">
                                <a href="{{ url('product-category/'.$item->product_category->slug) }}">
                                    <span class="category">{{ $item->category_name }}</span>
                                </a>
                                <h4 class="title text-capitalize">
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
                                        $reviewProduct = App\Models\Review::where('product_id', $item->id)->get();
                                        $ratingProductSum = App\Models\Review::where('product_id', $item->id)->sum('stars_rated');
                                        if ($reviewProduct->count() > 0){
                                            $ratingProductValue = $ratingProductSum / $reviewProduct->count();
                                        } else {
                                            $ratingProductValue = 0;
                                        }
                                        $ratingsProduckAll = number_format($ratingProductValue)
                                    @endphp
                                    @for ($i = 1; $i <= $ratingsProduckAll; $i++)
                                        <li><i class="lni lni-star-filled"></i></li>
                                    @endfor
                                    @for ($j = $ratingsProduckAll+1; $j <= 5; $j++)
                                        <li><i class="lni lni-star"></i>
                                        </li>
                                    @endfor
                                </ul>
                                <div class="fw-bold mt-2">
                                    <span style="color:#16A085;">Rp. {{ number_format($item->price, 0) }}</span>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="product-details-info shadow">
                <div class="single-block">
                    <div class="row">
                        <div class="col-lg-6 col-12">
                            <div class="info-body custom-responsive-margin">
                                <h4>Ulasan <span>({{ $showReviews->count() }} Ulasan)</span></h4>
                                <p class="fw-bold text-capitalize col-10">{{ $product->name }}</p>
                                <div class="rating-produk">
                                    <div class="star-icon" style="
                                        font-size: 40px;
                                        font-family: sans-serif;
                                        font-weight: 800;
                                        text-align: center;
                                        text-transform: uppercase;">
                                        @for ($i = 1; $i <= $rateNum; $i++)
                                            <i class="lni lni-star-filled ratings-color"></i>
                                        @endfor
                                        @for ($j = $rateNum+1; $j <= 5; $j++)
                                            <i class="lni lni-star-filled"></i>
                                        @endfor
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 col-12 mt-md-5">
                            <div class="info-body">
                                <h4 class="fw-bold" style="color:#16A085;">Semua Ulasan</h4>
                                @if ($showReviews->count() > 0)
                                    @foreach ($showReviews as $review)
                                    <div class="mt-3 d-lg-flex align-items-center justify-content-start">
                                        <div class="col-8 col-lg-3 col-xl-2">
                                            <div>
                                                @foreach ($review->user->costumer as $potoProfile)
                                                @if ($potoProfile->image)
                                                <img src="{{ asset('../storage/profile/'.$potoProfile->image) }}"
                                                    style="max-width: 4rem;" class="img-fluid img-thumbnail rounded-circle"
                                                    alt="">
                                                @else
                                                <img src="{{ asset('stisla/assets/img/avatar/avatar-1.png') }}"
                                                    style="max-width: 4rem;" class="img-fluid img-thumbnail rounded-circle"
                                                    alt="">
                                                @endif
                                                @endforeach
                                                <span class="ms-1">{{ substr($review->user->name, 0, 12). '...' }}</span>
                                            </div>
                                        </div>
                                        <div class="col-12 col-lg-8 col-xl-10 mt-2 mt-lg-0 ms-0 ms-lg-5">
                                            <ul class="normal-list">
                                                <li>
                                                    <div class="ratings">
                                                        <div class="star-icon" style="
                                                        font-size: 20px;
                                                        font-family: sans-serif;
                                                        font-weight: 800;
                                                        text-transform: uppercase;">
                                                            @for ($i = 1; $i <= $review->stars_rated; $i++)
                                                                <i class="lni lni-star-filled ratings-color"></i>
                                                            @endfor
                                                            @for ($j = $review->stars_rated+1; $j <= 5; $j++) <i
                                                                class="lni lni-star-filled"></i>
                                                            @endfor
                                                        </div>
                                                    </div>
                                                </li>
                                                <span class="me-md-5">
                                                    {{ $review->review }}
                                                </span>
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
                                                    <div class="page-description text-black">
                                                        Belum ada ulasan produk!
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
                </div>
            </div>
        </div>
    </section>
@endsection

@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script type="text/javascript">
        $('.owl-carousel').owlCarousel({
            loop:false,
            responsiveClass:true,
            responsive:{
                0:{
                    items:1,
                },
                480:{
                    items:2,
                },
                600:{
                    items:3,
                },
                1000:{
                    items:4,
                }
            }
        });

        const current = document.getElementById("current");
        const opacity = 0.6;
        const imgs = document.querySelectorAll(".img");
        imgs.forEach(img => {
            img.addEventListener("click", (e) => {
                //reset opacity
                imgs.forEach(img => {
                    img.style.opacity = 1;
                });
                current.src = e.target.src;
                //adding class
                //current.classList.add("fade-in");
                //opacity
                e.target.style.opacity = opacity;
            });
        });

        $(document).ready(function () {

            $('.increment-btn').click(function (e) {
                e.preventDefault();

                var inc_value = $(this).closest('#product_data').find('.qty-input').val();

                var value = parseInt(inc_value, stoke);
                value = isNaN(value) ? stoke : value;
                if (value < stoke) {
                    value++;
                    // $('.qty-input').val(value);
                    $(this).closest('#product_data').find('.qty-input').val(value);
                }
            });

            $('.decrement-btn').click(function (e) {
                e.preventDefault();

                var dec_value = $(this).closest('#product_data').find('.qty-input').val();

                var value = parseInt(dec_value, stoke);
                value = isNaN(value) ? stoke : value;
                if (value > 1) {
                    value--;
                    $(this).closest('#product_data').find('.qty-input').val(value);
                }
            });
        });
    </script>
@endsection
