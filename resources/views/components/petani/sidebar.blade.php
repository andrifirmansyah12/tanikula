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
            <a href="{{ url('petani') }}" class="nav-link"><i
                    class=""></i><span>Dashboard</span></a>
        </li>
        <li class="menu-header">Manajamen</li>
        <li class="nav-item dropdown">
            <a href="{{ url('petani/edukasi') }}" class="nav-link "><i class=""></i>
                <span>Edukasi</span></a>
        </li>
        <li class="nav-item dropdown">
            <a href="{{ url('petani/kegiatan') }}" class="nav-link "><i class=""></i>
                <span>Kegiatan</span></a>
        </li>
        <li class="menu-header">Melaporkan</li>
        <li class="nav-item dropdown">
            <a href="{{ url('petani/tandur') }}" class="nav-link"><i class=""></i>
                <span>Tandur</span></a>
        </li>
        <li class="nav-item dropdown">
            <a href="{{ url('petani/panen') }}" class="nav-link"><i class=""></i>
                <span>Panen</span></a>
        </li>
        <li class="menu-header">Profile Saya</li>
        <li class="nav-item dropdown">
            <a href="{{ url('petani/pengaturan') }}" class="nav-link"><i class=""></i>
                <span>Pengaturan</span></a>
        </li>

    </ul>
</aside>
