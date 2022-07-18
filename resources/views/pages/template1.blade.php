@include('components.pages.header')

<body>
    <!--[if lte IE 9]>
      <p class="browserupgrade">
        You are using an <strong>outdated</strong> browser. Please
        <a href="https://browsehappy.com/">upgrade your browser</a> to improve
        your experience and security.
      </p>
    <![endif]-->

    <!-- Preloader -->
    {{-- <div class="preloader">
        <div class="preloader-inner">
            <div class="preloader-icon">
                <span></span>
                <span></span>
            </div>
        </div>
    </div> --}}
    <!-- /End Preloader -->

    <!-- Start Header Area -->
    <header class="header navbar-area shadow">
        <!-- Start Topbar -->
        @if (Request::is('/', 'home'))
        <div class="topbar" style="border-bottom: 1px solid #eee;">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-4 col-md-4 col-12">
                        <div class="top-left">
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-12">
                        <div class="top-middle">
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-12">
                        <div class="top-end">
                        @auth
                            <a onclick="pembeli('{{ route('pembeli') }}')" href="#" class="user">
                                <i class="lni lni-user"></i>
                                {{ auth()->user()->name }}
                            </a>
                        @else
                            <ul class="user-login">
                                <li>
                                    <a onclick="login('{{ route('login') }}')" href="#">Masuk</a>
                                </li>
                                <li>
                                    <a onclick="register('{{ route('register-pembeli') }}')" href="#">Daftar</a>
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
                        <a class="navbar-brand" onclick="home('{{ url('home') }}')" href="#">
                            <h3 style="color: #16A085">TaniKula</h3>
                        </a>
                        <!-- End Header Logo -->
                    </div>
                    <div class="col-lg-5 col-md-7 d-xs-none">
                        <!-- Start Main Menu Search -->
                        <div class="main-menu-search">
                            <!-- navbar search start -->
                            <form action="{{ url('/search-product') }}">
                                <div class="navbar-search search-style-5">

                                    <div class="search-input">
                                        <input type="search" class="form-control typeaheadProduct"
                                            value="{{ request('pencarian') }}" name="pencarian"
                                            placeholder="Pencarian produk" autocomplete="off">
                                    </div>
                                    <div class="search-btn">
                                        <button type="submit"><i class="lni lni-search-alt"></i></button>
                                    </div>
                                </div>
                            </form>
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
                                        <span class="total-items cart-count">0</span>
                                    </a>

                                    <div class="shopping-item">
                                        <div class="dropdown-cart-header">
                                            <span>Keranjang ({{ $cartItem->count() }})</span>
                                            <a style="color:#16A085;" href="{{ url('cart') }}">Lihat Sekarang</a>
                                        </div>
                                        @php
                                        $total = 0;
                                        @endphp
                                        @if ($cartItem->count())
                                        @foreach ($cartItem as $item)
                                        <ul class="shopping-list" id="product_data">
                                            <li>
                                                <input type="hidden" value="{{ $item->product_id }}" id="prod_id">
                                                {{-- <button class="remove delete-cart-item" title="Remove this item"><i
                                                    class="lni lni-close"></i></button> --}}
                                                <div class="cart-img-head">
                                                    <a class="cart-img" href="{{ url('home/'.$item->product->slug) }}">
                                                        @if ($item->product->photo_product->count() > 0)
                                                            @foreach ($item->product->photo_product->take(1) as $photos)
                                                                @if ($photos->name)
                                                                    <img src="{{ asset('../storage/produk/'.$photos->name) }}" alt="{{ $item->product->name }}"
                                                                        style="width: 10rem; height: 5rem; -o-object-fit: cover; object-fit: cover; -o-object-position: center; object-position: center;">
                                                                @else
                                                                    <img src="{{ asset('img/no-image.png') }}" alt="{{ $item->product->name }}"
                                                                        style="width: 10rem; height: 5rem; -o-object-fit: cover; object-fit: cover; -o-object-position: center; object-position: center;">
                                                                @endif
                                                            @endforeach
                                                        @else
                                                            <img src="{{ asset('img/no-image.png') }}" alt="{{ $item->product->name }}"
                                                                style="width: 10rem; height: 5rem; -o-object-fit: cover; object-fit: cover; -o-object-position: center; object-position: center;">
                                                        @endif
                                                    </a>
                                                </div>

                                                <div class="content">
                                                    <h4><a style="color:#16A085; display: -webkit-box; -webkit-box-orient: vertical; -webkit-line-clamp: 2; overflow: hidden;" href="{{ url('home/'.$item->product->slug) }}">
                                                            {{ $item->product->name }}</a></h4>
                                                    <p class="quantity">{{ $item->product_qty }}x - <span
                                                            class="amount">Rp.
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
                                                <a href="{{ url('new-product') }}" class="btn animate">Belanja
                                                    Sekarang</a>
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
                            @php
                            $category_product = App\Models\ProductCategory::where('is_active', '=', 1)->get();
                            @endphp
                            <a href="#" class="nav-link text-black fw-bold" data-bs-display="static" data-bs-toggle="dropdown"><i class="lni lni-menu text-black fw-bold pe-2"></i>Semua Kategori</a>
                            <div class="dropdown-menu" >
                                <div class="row" style="width: 32rem">
                                    @foreach ($category_product as $item)
                                    <div class="col-4">
                                        <a href="{{ url('product-category/'.$item->slug) }}" class="dropdown-item">{{ $item->name }}</a>
                                    </div>
                                    @endforeach
                                    <div class="col-4">
                                        <a href="{{ url('product-category/all-category') }}" class="dropdown-item">Semua Kategori</a>
                                    </div>
                                </div>
                            </div>
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
                                        <a onclick="home('{{ url('home') }}')" href="#" class="{{ Request::is('home') ? 'active' : '' }}" aria-label="Toggle navigation">Home</a>
                                    </li>
                                    <li class="nav-item">
                                        <a onclick="hubungi_kami('{{ url('hubungi-kami') }}')" href="#" class="{{ Request::is('hubungi-kami') ? 'active' : '' }}" aria-label="Toggle navigation">Hubungi kami</a>
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
        <!-- Start Breadcrumbs -->
        <div class="breadcrumbs border-top shadow-none">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-md-6 col-12">
                        <div class="breadcrumbs-content">
                            <h1 class="page-title">
                                @if ( request('pencarian') )
                                    <h1 class="page-title">{{ substr(request('pencarian'), 0, 20). '...' }}</h1>
                                @else
                                    @yield('breadcrumb-subTitle')
                                @endif
                            </h1>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-12">
                        <ul class="breadcrumb-nav">
                            <li><a href="{{ url('home') }}"><i class="lni lni-home"></i> Home</a></li>
                            <li>@yield('breadcrumb-title')</li>
                            @if ( request('pencarian') )
                                <li>{{ substr(request('pencarian'), 0, 20). '...' }}</li>
                            @else
                                <li class="fw-bold" >@yield('breadcrumb-subTitle')</li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Breadcrumbs -->
    </header>
    <!-- End Header Area -->


    @yield('content')

    @include('components.pages.footer')

    <!-- ========================= scroll-top ========================= -->
    <a href="#" class="scroll-top border border-white">
        <i class="lni lni-chevron-up"></i>
    </a>

    @include('components.pages.footerJS')
</body>

</html>
