@extends('pages.template1')
@section('title', 'Detail Produk')
@section('breadcrumb-title', $product->product_category->name)
@section('breadcrumb-subTitle', $product->name)

@section('style')
    <style>
        /* rating */
        .rating-produk div {
            color: #f0d800;
            font-size: 30px;
            font-family: sans-serif;
            font-weight: 800;
            text-align: center;
            text-transform: uppercase;
            padding: 0 0 50px;
        }

        .rating-produk input {
            display: none;
        }

        .rating-produk input + label {
            font-size: 60px;
            text-shadow: 1px 1px 0 #8f8420;
            cursor: pointer;
        }

        .rating-produk input:checked + label ~ label {
            color: #b4afaf;
        }

        .rating-produk label:active {
            transform: scale(0.8);
            transition: 0.3s ease;
        }

        /* rating */
        .ratings div {
            color: #f0d800;
            font-family: sans-serif;
            font-weight: 800;
            text-transform: uppercase;
        }

        .ratings input {
            display: none;
        }

        .ratings input + label {
            font-size: 20px;
            text-shadow: 1px 1px 0 #8f8420;
            cursor: pointer;
        }

    </style>
@endsection

@section('content')
    <!-- Start Item Details -->
    <section class="item-details section bg-white mt-md-5">
        <div class="container">
            <div class="top-area" id="product_data">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-md-12 col-12">
                        <div class="product-images">
                            <main id="">
                                <div class="main-img">
                                    @foreach ($product->photo_product->take(1) as $photos)
                                        <img src="{{ asset('../storage/produk/'.$photos->name) }}" id="current" alt="{{ $product->name }}">
                                    @endforeach
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
                            <h2 class="title">{{ $product->name }}
                                <span>
                                    @if ($product->stoke < 1)
                                        <label class="mx-3 badge bg-danger">Habis</label>
                                    @elseif($product->stoke < 10)
                                        <label class="mx-3 badge bg-danger">Tersisa {{ $product->stoke }}</label>
                                    @endif
                                </span>
                            </h2>
                            <p class="category">Terjual 40</p>
                            <p class="category"><i class="lni lni-tag"></i> Kategori:<a
                                    href="{{ url('product-category/'.$product->product_category->slug) }}">{{ $product->product_category->name }}</a></p>
                            {{-- <h3 class="price">Rp. {{ number_format($product->price, 0) }}<span>Rp. {{ number_format(0, 0) }}</span></h3> --}}
                            <h3 class="price">Rp. {{ number_format($product->price, 0) }}</h3>
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
                                    @endif
                                    {{-- @foreach ($product->wishlist as $wishlist)
                                        @if ($product->id == $wishlist->product_id)
                                            <div class="col-lg-4 col-md-4 col-12">
                                                <div class="wish-button">
                                                    <button class="btn" id="delete-cart-wishlistItem"><i class="text-danger lni lni-heart-filled"></i> Wishlist</button>
                                                </div>
                                            </div>
                                        @else --}}
                                            <div class="col-lg-4 col-md-4 col-12">
                                                <div class="wish-button">
                                                    <button class="btn" id="addToWishlistBtn">+ Wishlist</button>
                                                </div>
                                            </div>
                                        {{-- @endif
                                    @endforeach --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="product-details-info">
                <div class="single-block">
                    <div class="row">
                        <div class="col-lg-6 col-12">
                            <div class="info-body custom-responsive-margin">
                                <h4>Details</h4>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                    incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                                    exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute
                                    irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat.</p>
                                <h4>Features</h4>
                                <ul class="features">
                                    <li>Capture 4K30 Video and 12MP Photos</li>
                                    <li>Game-Style Controller with Touchscreen</li>
                                    <li>View Live Camera Feed</li>
                                    <li>Full Control of HERO6 Black</li>
                                    <li>Use App for Dedicated Camera Operation</li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-6 col-12">
                            <div class="info-body">
                                <h4>Specifications</h4>
                                <ul class="normal-list">
                                    <li><span>Weight:</span> 35.5oz (1006g)</li>
                                    <li><span>Maximum Speed:</span> 35 mph (15 m/s)</li>
                                    <li><span>Maximum Distance:</span> Up to 9,840ft (3,000m)</li>
                                    <li><span>Operating Frequency:</span> 2.4GHz</li>
                                    <li><span>Manufacturer:</span> GoPro, USA</li>
                                </ul>
                                <h4>Shipping Options:</h4>
                                <ul class="normal-list">
                                    <li><span>Courier:</span> 2 - 4 days, $22.50</li>
                                    <li><span>Local Shipping:</span> up to one week, $10.00</li>
                                    <li><span>UPS Ground Shipping:</span> 4 - 6 days, $18.00</li>
                                    <li><span>Unishop Global Export:</span> 3 - 4 days, $25.00</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="product-details-info">
                <div class="single-block">
                    <div class="row">
                        <div class="col-lg-6 col-12">
                            <div class="info-body custom-responsive-margin">
                                <h4>Ulasan</h4>
                                <p>Nama Produk</p>
                                <div class="rating-produk">
                                    <div class="star-icon">
                                        <input type="radio" value="1" name="product_rating" checked id="rating1">
                                        <label for="rating1" class="lni lni-star-filled"></label>
                                        <input type="radio" value="2" name="product_rating" id="rating2">
                                        <label for="rating2" class="lni lni-star-filled"></label>
                                        <input type="radio" value="3" name="product_rating" id="rating3">
                                        <label for="rating3" class="lni lni-star-filled"></label>
                                        <input type="radio" value="4" name="product_rating" id="rating4">
                                        <label for="rating4" class="lni lni-star-filled"></label>
                                        <input type="radio" value="5" name="product_rating" id="rating5">
                                        <label for="rating5" class="lni lni-star-filled"></label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 col-12">
                            <div class="info-body">
                                <h4>Semua Ulasan</h4>
                                <div class="mt-3 d-lg-flex justify-content-start">
                                    <div class="col-8 col-lg-3 col-xl-2">
                                        <div>
                                            <img src="{{ asset('stisla/assets/img/avatar/avatar-1.png') }}" style="max-width: 4rem;" class="img-fluid img-thumbnail rounded-circle" alt="">
                                            <span class="ms-1">Nama Pembeli</span>
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-8 col-xl-10 mt-2 mt-lg-0 ms-0 ms-lg-5">
                                        <ul class="normal-list">
                                            <li><div class="ratings">
                                                <div class="star-icon">
                                                    <input type="radio" value="1" checked>
                                                    <label class="lni lni-star-filled"></label>
                                                    <input type="radio" value="2">
                                                    <label class="lni lni-star-filled"></label>
                                                    <input type="radio" value="3">
                                                    <label class="lni lni-star-filled"></label>
                                                    <input type="radio" value="4">
                                                    <label class="lni lni-star-filled"></label>
                                                    <input type="radio" value="5">
                                                    <label class="lni lni-star-filled"></label>
                                                </div>
                                            </div></li>
                                            <span class="me-md-5">
                                                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor...
                                            </span>
                                            <li></li>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

@section('script')
    <script type="text/javascript">
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
    </script>
@endsection
