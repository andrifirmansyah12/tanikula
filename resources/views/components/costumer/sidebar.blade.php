<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3 bg-light"
    id="sidenav-main">
    <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
            aria-hidden="true" style="color: black" id="iconSidenav"></i>
        <a class="navbar-brand m-0" href="{{ route('home') }}"
            target="_blank">
            <span class="ms-1 font-weight-bold ">ShopTaniKula</span>
        </a>
    </div>
    <hr class="horizontal light mt-0 mb-2">
    <div class="collapse navbar-collapse w-auto" style="height: 100%" id="sidenav-collapse-main">
        <ul class="navbar-nav">
            <li class="nav-item mt-3">
                <h6 class="ps-4 ms-2 text-uppercase text-xs  font-weight-bolder opacity-8">Kotak Masuk</h6>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('pembeli/chat*') ? 'active bg-gradient-primary' : 'text-dark fw-bold' }}" href="{{ url('pembeli/chat') }}">
                    <div class=" text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="bi bi-chat-dots h-4"></i>
                    </div>
                    <span class="nav-link-text ms-1">Chat</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('pembeli/ulasan*') ? 'active bg-gradient-primary' : 'text-dark fw-bold' }}" href="{{ url('pembeli/ulasan') }}">
                    <div class=" text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="bi bi-star h-4"></i>
                    </div>
                    <span class="nav-link-text ms-1">Ulasan</span>
                </a>
            </li>
            <li class="nav-item mt-3">
                <h6 class="ps-4 ms-2 text-uppercase text-xs  font-weight-bolder opacity-8">Pembelian</h6>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('pembeli/menunggu-pembayaran*') ? 'active bg-gradient-primary' : 'text-dark fw-bold' }}" href="{{ url('pembeli/menunggu-pembayaran') }}">
                    <div class=" text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="bi bi-clock-history h-4"></i>
                    </div>
                    <span class="nav-link-text ms-1">Menunggu Pembayaran</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('pembeli/daftar-transaksi*') ? 'active bg-gradient-primary' : 'text-dark fw-bold' }}" href="{{ url('pembeli/daftar-transaksi') }}">
                    <div class=" text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="bi bi-card-checklist h-4"></i>
                    </div>
                    <span class="nav-link-text ms-1">Daftar Transaksi</span>
                </a>
            </li>
            <li class="nav-item mt-3">
                <h6 class="ps-4 ms-2 text-uppercase text-xs  font-weight-bolder opacity-8">Profile Saya</h6>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('pembeli/wishlist*') ? 'active bg-gradient-primary' : 'text-dark fw-bold' }}" href="{{ route('pembeli.wishlist') }}">
                    <div class=" text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="bi bi-heart-fill h-4"></i>
                    </div>
                    <span class="nav-link-text ms-1">Wishlist</span>
                </a>
            </li>
            {{-- <li class="nav-item">
                <a class="nav-link" href="../pages/profile.html">
                    <div class=" text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="bi bi-chat-left-text h-4"></i>
                    </div>
                    <span class="nav-link-text ms-1">Pengaturan</span>
                </a>
            </li> --}}
        </ul>
    </div>
</aside>
