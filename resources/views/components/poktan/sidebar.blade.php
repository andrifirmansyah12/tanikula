<aside id="sidebar-wrapper">
    <div class="sidebar-brand">
        <a href="index.html">Sri Makmur</a>
    </div>
    <div class="sidebar-brand sidebar-brand-sm">
        <a href="index.html">Sm</a>
    </div>
    <ul class="sidebar-menu">
        <li class="menu-header">Dashboard</li>
        <li class="nav-item dropdown {{ Request::is('poktan') ? 'active' : '' }}">
            <a href="{{ url('poktan') }}" class="nav-link">
                <i class="fas fa-thin fa-gauge"></i>
                <span>Dashboard</span>
            </a>
        </li>
        <li class="menu-header">Manajemen</li>
        <li class="nav-item dropdown {{ Request::is('poktan/edukasi*') ? 'active' : '' }}">
            <a href="{{ url('poktan/edukasi') }}" class="nav-link ">
                <i class="fas fa-solid fa-clapperboard"></i>
                <span>Edukasi</span>
            </a>
        </li>
        <li class="nav-item dropdown {{ Request::is('poktan/kegiatan*') ? 'active' : '' }}">
            <a href="{{ url('poktan/kegiatan') }}" class="nav-link ">
                <i class="fas fa-solid fa-clipboard"></i>
                <span>Kegiatan</span>
            </a>
        </li>
        <li class="nav-item dropdown {{ Request::is('poktan/daftar-petani*') ? 'active' : '' }}">
            <a href="{{ url('poktan/daftar-petani') }}" class="nav-link ">
                <i class="fas fa-solid fa-user"></i>
                <span>Akun Petani</span>
            </a>
        </li>
        <li class="menu-header">Laporan</li>
        <li class="nav-item dropdown {{ Request::is('poktan/tandur*') ? 'active' : '' }}">
            <a href="{{ url('poktan/tandur') }}" class="nav-link">
                <i class="fas fa-solid fa-calendar-days"></i>
                <span>Tandur</span>
            </a>
        </li>
        <li class="nav-item dropdown {{ Request::is('poktan/panen*') ? 'active' : '' }}">
            <a href="{{ url('poktan/panen') }}" class="nav-link">
                <i class="fas fa-solid fa-calendar-check"></i>
                <span>Panen</span>
            </a>
        </li>
        <li class="menu-header">Profile Saya</li>
        <li class="nav-item dropdown {{ Request::is('poktan/pengaturan*') ? 'active' : '' }}">
            <a href="{{ url('poktan/pengaturan') }}" class="nav-link">
                <i class="fas fa-solid fa-gear"></i>
                <span>Pengaturan</span>
            </a>
        </li>

    </ul>

    {{-- <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
        <a href="https://getstisla.com/docs" class="btn btn-primary btn-lg btn-block btn-icon-split">
            <i class="fas fa-rocket"></i> Documentation
        </a>
    </div> --}}
</aside>
