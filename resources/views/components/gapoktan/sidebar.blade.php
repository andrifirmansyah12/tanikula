<aside id="sidebar-wrapper">
    <div class="sidebar-brand">
        <a href="index.html">Sri Makmur</a>
    </div>
    <div class="sidebar-brand sidebar-brand-sm">
        <a href="index.html">Sm</a>
    </div>
    <ul class="sidebar-menu">
        <li class="menu-header">Dashboard</li>
        <li class="nav-item dropdown active">
            <a href="{{ url('gapoktan') }}" class="nav-link"><i
                    class=""></i><span>Dashboard</span></a>
        </li>
        <li class="menu-header">Kotak Masuk</li>
        <li class="nav-item dropdown">
            <a href="{{ url('gapoktan/chat') }}" class="nav-link"><i class=""></i>
                <span>Chat</span></a>
        </li>
        <li class="menu-header">Manajemen</li>
        <li class="nav-item dropdown">
            <a href="{{ url('gapoktan/kategori-edukasi') }}" class="nav-link "><i class=""></i>
                <span>Kategori Edukasi</span></a>
        </li>
        <li class="nav-item dropdown">
            <a href="{{ url('gapoktan/edukasi') }}" class="nav-link "><i class=""></i>
                <span>Edukasi</span></a>
        </li>
        <li class="nav-item dropdown">
            <a href="{{ url('gapoktan/kategori-kegiatan') }}" class="nav-link "><i class=""></i>
                <span>Kategori Kegiatan</span></a>
        </li>
        <li class="nav-item dropdown">
            <a href="{{ url('gapoktan/kegiatan') }}" class="nav-link "><i class=""></i>
                <span>Kegiatan</span></a>
        </li>
        <li class="nav-item dropdown">
            <a href="{{ url('gapoktan/kategori-produk') }}" class="nav-link "><i class=""></i>
                <span>Kategori Produk</span></a>
        </li>
        <li class="nav-item dropdown">
            <a href="{{ url('gapoktan/produk') }}" class="nav-link "><i class=""></i>
                <span>Produk</span></a>
        </li>
        <li class="menu-header">Laporan</li>
        <li class="nav-item dropdown">
            <a href="{{ url('gapoktan/tandur') }}" class="nav-link"><i class=""></i>
                <span>Tandur</span></a>
        </li>
        <li class="nav-item dropdown">
            <a href="{{ url('gapoktan/panen') }}" class="nav-link"><i class=""></i>
                <span>Panen</span></a>
        </li>
        <li class="nav-item dropdown">
            <a href="{{ url('gapoktan/rekap-penjualan') }}" class="nav-link"><i class=""></i>
                <span>Rekap Penjualan</span></a>
        </li>
        <li class="menu-header">Profile Saya</li>
        <li class="nav-item dropdown">
            <a href="{{ url('gapoktan/pengaturan') }}" class="nav-link"><i class=""></i>
                <span>Pengaturan</span></a>
        </li>

    </ul>

    <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
        <a href="https://getstisla.com/docs" class="btn btn-primary btn-lg btn-block btn-icon-split">
            <i class="fas fa-rocket"></i> Documentation
        </a>
    </div>
</aside>
