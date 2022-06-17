<!-- Start Header Area -->
<header class="header navbar-area">
    <!-- Start Topbar -->
    @if (Request::is('/', 'home'))
    <div class="topbar" style="border-bottom: 1px solid #eee;">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-4 col-md-4 col-12">
                    <div class="top-left">
                        {{-- <ul class="menu-top-link">
                            <li>
                                <div class="select-position">
                                    <select id="select4">
                                        <option value="0" selected>$ USD</option>
                                        <option value="1">€ EURO</option>
                                        <option value="2">$ CAD</option>
                                        <option value="3">₹ INR</option>
                                        <option value="4">¥ CNY</option>
                                        <option value="5">৳ BDT</option>
                                    </select>
                                </div>
                            </li>
                            <li>
                                <div class="select-position">
                                    <select id="select5">
                                        <option value="0" selected>English</option>
                                        <option value="1">Español</option>
                                        <option value="2">Filipino</option>
                                        <option value="3">Français</option>
                                        <option value="4">العربية</option>
                                        <option value="5">हिन्दी</option>
                                        <option value="6">বাংলা</option>
                                    </select>
                                </div>
                            </li>
                        </ul> --}}
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-12">
                    <div class="top-middle">
                        {{-- <ul class="useful-links">
                            <li><a href="index.html">Home</a></li>
                            <li><a href="about-us.html">About Us</a></li>
                            <li><a href="contact.html">Contact Us</a></li>
                        </ul> --}}
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-12">
                    <div class="top-end">
                    @auth
                        <a href="{{ route('pembeli') }}" class="user">
                            <i class="lni lni-user"></i>
                            {{ auth()->user()->name }}
                        </a>
                    @else
                        <ul class="user-login">
                            <li>
                                <a href="{{ route('login') }}">Masuk</a>
                            </li>
                            <li>
                                <a href="{{ route('register-pembeli') }}">Daftar</a>
                            </li>
                        </ul>
                    @endauth
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif
    <!-- End Topbar -->
    <!-- Start Header Middle -->
    <div class="header-middle">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-3 col-md-3 col-7">
                    <!-- Start Header Logo -->
                    <a class="navbar-brand" href="{{ url('home') }}">
                        <h3> <span style="color: #16A085">Shop</span>TaniKula</h3>
                    </a>
                    <!-- End Header Logo -->
                </div>
                <div class="col-lg-5 col-md-7 d-xs-none">
                    <!-- Start Main Menu Search -->
                    <div class="main-menu-search">
                        <!-- navbar search start -->
                        <div class="navbar-search search-style-5">
                            <div class="search-input">
                                <input type="text" placeholder="Search">
                            </div>
                            <div class="search-btn">
                                <button><i class="lni lni-search-alt"></i></button>
                            </div>
                        </div>
                        <!-- navbar search Ends -->
                    </div>
                    <!-- End Main Menu Search -->
                </div>
                <div class="col-lg-4 col-md-2 col-5">
                    <div class="middle-right-area">
                        <div class="nav-hotline">
                            <i class="lni lni-phone"></i>
                            <h3>Hotline:
                                <span>(+62) 123 456 7890</span>
                            </h3>
                        </div>
                        <div class="navbar-cart">
                            <div class="wishlist">
                                <a href="javascript:void(0)">
                                    <i class="lni lni-alarm"></i>
                                    <span class="total-items">0</span>
                                </a>
                            </div>
                            <div class="cart-items">
                                <!-- Shopping Item -->
                                @php
                                $cartItem = App\Models\Cart::with('product')->where('user_id', Auth::id())->get();
                                @endphp
                                <a href="javascript:void(0)" class="main-btn">
                                    <i class="lni lni-cart"></i>
                                    <span class="total-items">{{ $cartItem->count() }}</span>
                                </a>

                                <div class="shopping-item">
                                    <div class="dropdown-cart-header">
                                        <span>Keranjang ({{ $cartItem->count() }})</span>
                                        <a href="{{ url('cart') }}">Lihat Sekarang</a>
                                    </div>
                                    @php
                                    $total = 0;
                                    @endphp
                                    @if ($cartItem->count())
                                    @foreach ($cartItem as $item)
                                    <ul class="shopping-list" id="product_data">
                                        <li>
                                            <input type="hidden" value="{{ $item->product_id }}" id="prod_id">
                                            <button class="remove delete-cart-item" title="Remove this item"><i
                                                    class="lni lni-close"></i></button>
                                            <div class="cart-img-head">
                                                <a class="cart-img" href="{{ url('home/'.$item->product->slug) }}">
                                                    @foreach ($item->product->photo_product->take(1) as $photos)
                                                        <img src="{{ asset('../storage/produk/'.$photos->name) }}" alt="{{ $item->product->name }}"
                                                            style="width: 10rem; height: 5rem; -o-object-fit: cover; object-fit: cover; -o-object-position: center; object-position: center;">
                                                    @endforeach
                                                </a>
                                            </div>

                                            <div class="content">
                                                <h4><a href="{{ url('home/'.$item->product->slug) }}">
                                                        {{ $item->product->name }}</a></h4>
                                                <p class="quantity">{{ $item->product_qty }}x - <span class="amount">Rp.
                                                        {{ number_format($item->product->price, 0) }}</span></p>
                                            </div>
                                        </li>
                                    </ul>
                                    @php
                                    $total += $item->product->price * $item->product_qty;
                                    @endphp
                                    @endforeach
                                    @else
                                        <div id="app">
                                            <div class="container">
                                                <div class="page-error-notification">
                                                    <div class="page-inner-notification">
                                                        <img src="{{ asset('img/undraw_empty_re_opql.svg') }}" alt="">
                                                        <div class="page-description-notification">
                                                            Tidak ada produk dikeranjang!
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                    <div class="bottom">
                                        <div class="total">
                                            <span>Total</span>
                                            <span class="total-amount">Rp. {{ number_format($total, 0) }}</span>
                                        </div>
                                        <div class="button">
                                            @if ($cartItem->count())
                                                <a href="{{ url('cart/shipment') }}" class="btn animate">Checkout</a>
                                            @else
                                                <a href="{{ url('product-category/allCategory') }}" class="btn animate">Belanja Sekarang</a>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <!--/ End Shopping Item -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Header Middle -->
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8 col-md-6 col-12">
                <div class="nav-inner">
                    <!-- Start Mega Category Menu -->
                    <div class="mega-category-menu">
                        <span class="cat-button"><i class="lni lni-menu"></i>Semua Kategori</span>
                        @php
                        $category_product = App\Models\ProductCategory::where('is_active', '=', 1)->take(5)->get();
                        @endphp
                        <ul class="sub-category">
                            @foreach ($category_product as $item)
                            <li><a href="{{ url('product-category/'.$item->slug) }}">{{ $item->name }} </a></li>
                            @endforeach
                        </ul>
                    </div>
                    <!-- End Mega Category Menu -->
                    <!-- Start Navbar -->
                    <nav class="navbar navbar-expand-lg">
                        <button class="navbar-toggler mobile-menu-btn" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="toggler-icon"></span>
                            <span class="toggler-icon"></span>
                            <span class="toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse sub-menu-bar" id="navbarSupportedContent">
                            <ul id="nav" class="navbar-nav ms-auto">
                                <li class="nav-item">
                                    <a href="{{ url('home') }}" class="active" aria-label="Toggle navigation">Home</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ url('hubungi-kami') }}" aria-label="Toggle navigation">Hubungi kami</a>
                                </li>
                            </ul>
                        </div> <!-- navbar collapse -->
                    </nav>
                    <!-- End Navbar -->
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-12">
                <!-- Start Nav Social -->
                <div class="nav-social">
                    <h5 class="title">Ikuti Kami:</h5>
                    <ul>
                        <li>
                            <a href="javascript:void(0)"><i class="lni lni-facebook-filled"></i></a>
                        </li>
                        <li>
                            <a href="javascript:void(0)"><i class="lni lni-instagram"></i></a>
                        </li>
                        <li>
                            <a href="javascript:void(0)"><i class="lni lni-whatsapp"></i></a>
                        </li>
                    </ul>
                </div>
                <!-- End Nav Social -->
            </div>
        </div>
    </div>
</header>
<!-- End Header Area -->
