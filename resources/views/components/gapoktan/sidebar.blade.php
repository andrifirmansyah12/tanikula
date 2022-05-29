<aside id="sidebar-wrapper">
    <div class="sidebar-brand">
        <a href="index.html">Sri Makmur</a>
    </div>
    <div class="sidebar-brand sidebar-brand-sm">
        <a href="index.html">Sm</a>
    </div>
    <ul class="sidebar-menu">
        <li class="menu-header">Dashboard</li>
        <li class="nav-item dropdown {{ Request::is('gapoktan') ? 'active' : '' }}">
            <a href="{{ url('gapoktan') }}" class="nav-link">
                <i class="fas fa-thin fa-gauge"></i>
                <span>Dashboard</span>
            </a>
        </li>
        <li class="menu-header">Kotak Masuk</li>
        <li class="nav-item dropdown {{ Request::is('gapoktan/chat*') ? 'active' : '' }}">
            <a href="{{ url('gapoktan/chat') }}" class="nav-link">
                <i class="fas fa-solid fa-comment-dots"></i>
                <span>Chat</span>
            </a>
        </li>
        <li class="menu-header">Manajemen</li>
        <li class="nav-item dropdown {{ Request::is('gapoktan/kategori*') ? 'active' : '' }}">
            <a href="#" class="nav-link has-dropdown bg-white" data-toggle="dropdown">
                <i class="fas fa-solid fa-bookmark"></i>
                <span>Kategori</span>
            </a>
            <ul class="dropdown-menu">
                <li class="{{ Request::is('gapoktan/kategori-produk*') ? 'active' : '' }}"><a class="nav-link {{ Request::is('gapoktan/kategori-produk*') ? '' : 'bg-white' }}" href="{{ url('gapoktan/kategori-produk') }}">Kategori Produk</a></li>
                <li class="{{ Request::is('gapoktan/kategori-edukasi*') ? 'active' : '' }}"><a class="nav-link {{ Request::is('gapoktan/kategori-edukasi*') ? '' : 'bg-white' }}" href="{{ url('gapoktan/kategori-edukasi') }}">Kategori Edukasi</a></li>
                <li class="{{ Request::is('gapoktan/kategori-kegiatan*') ? 'active' : '' }}"><a class="nav-link {{ Request::is('gapoktan/kategori-kegiatan*') ? '' : 'bg-white' }}" href="{{ url('gapoktan/kategori-kegiatan') }}">Kategori Kegiatan</a></li>
            </ul>
        </li>
        <li class="nav-item dropdown {{ Request::is('gapoktan/produk*') ? 'active' : '' }}">
            <a href="{{ url('gapoktan/produk') }}" class="nav-link ">
                <i class="fas fa-solid fa-cart-plus"></i>
                <span>Produk</span>
            </a>
        </li>
        <li class="nav-item dropdown {{ Request::is('gapoktan/edukasi*') ? 'active' : '' }}">
            <a href="{{ url('gapoktan/edukasi') }}" class="nav-link ">
                <i class="fas fa-solid fa-clapperboard"></i>
                <span>Edukasi</span>
            </a>
        </li>
        <li class="nav-item dropdown {{ Request::is('gapoktan/kegiatan*') ? 'active' : '' }}">
            <a href="{{ url('gapoktan/kegiatan') }}" class="nav-link ">
                <i class="fas fa-solid fa-clipboard"></i>
                <span>Kegiatan</span>
            </a>
        </li>
        <li class="nav-item dropdown {{ Request::is('gapoktan/daftar*') ? 'active' : '' }}">
            <a href="#" class="nav-link has-dropdown bg-white" data-toggle="dropdown">
                <i class="fas fa-solid fa-user"></i>
                <span>Akun</span>
            </a>
            <ul class="dropdown-menu">
                <li class="{{ Request::is('gapoktan/daftar-poktan*') ? 'active' : '' }}"><a class="nav-link {{ Request::is('gapoktan/daftar-poktan*') ? '' : 'bg-white' }}" href="{{ url('gapoktan/daftar-poktan') }}">Daftar Poktan</a></li>
                <li class="{{ Request::is('gapoktan/daftar-petani*') ? 'active' : '' }}"><a class="nav-link {{ Request::is('gapoktan/daftar-petani*') ? '' : 'bg-white' }}" href="{{ url('gapoktan/daftar-petani') }}">Daftar Petani</a></li>
            </ul>
        </li>
        <li class="menu-header">Laporan</li>
        <li class="nav-item dropdown {{ Request::is('gapoktan/tandur*') ? 'active' : '' }}">
            <a href="{{ url('gapoktan/tandur') }}" class="nav-link">
                <i class="fas fa-solid fa-calendar-days"></i>
                <span>Tandur</span>
            </a>
        </li>
        <li class="nav-item dropdown {{ Request::is('gapoktan/panen*') ? 'active' : '' }}">
            <a href="{{ url('gapoktan/panen') }}" class="nav-link">
                <i class="fas fa-solid fa-calendar-check"></i>
                <span>Panen</span>
            </a>
        </li>
        <li class="nav-item dropdown {{ Request::is('gapoktan/rekap-penjualan*') ? 'active' : '' }}">
            <a href="{{ url('gapoktan/rekap-penjualan') }}" class="nav-link">
                <i class="fas fa-solid fa-chart-line"></i>
                <span>Rekap Penjualan</span>
            </a>
        </li>
        <li class="menu-header">Profile Saya</li>
        <li class="nav-item dropdown {{ Request::is('gapoktan/pengaturan*') ? 'active' : '' }}">
            <a href="{{ url('gapoktan/pengaturan') }}" class="nav-link">
                <i class="fas fa-solid fa-gear"></i>
                <span>Pengaturan</span>
            </a>
        </li>
    </ul>

    <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
        <a href="https://getstisla.com/docs" class="btn btn-primary btn-lg btn-block btn-icon-split">
            <i class="fas fa-rocket"></i> Documentation
        </a>
    </div>
</aside>
