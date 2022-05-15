<!-- Sidebar -->
<div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
            <img src="{{ asset('plus-admin/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
            <a href="#" class="d-block">{{ auth()->user()->name }}</a>
        </div>
    </div>

    <!-- SidebarSearch Form -->
    <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
            <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
            <div class="input-group-append">
                <button class="btn btn-sidebar">
                    <i class="fas fa-search fa-fw"></i>
                </button>
            </div>
        </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            <li class="nav-item menu-open">
                <a href="{{ url('admin') }}" class="nav-link active">
                    <i class="nav-icon mdi mdi-compass-outline"></i>
                    <p>
                        Dashboard
                    </p>
                </a>
            </li>
            <li class="nav-header">MANAJEMEN</li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon mdi mdi-bookmark-outline"></i>
                    <p>
                        Kategori
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ url('admin/kategori-produk') }}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Produk</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('admin/kategori-edukasi') }}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Edukasi</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('admin/kategori-kegiatan') }}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Kegiatan</p>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a href="{{ url('admin/produk') }}" class="nav-link">
                    <i class="nav-icon mdi mdi-shopping"></i>
                    <p>
                        Produk
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ url('admin/edukasi') }}" class="nav-link">
                    <i class="nav-icon mdi mdi-movie"></i>
                    <p>
                        Edukasi
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ url('admin/kegiatan') }}" class="nav-link">
                    <i class="nav-icon mdi mdi-clipboard-text"></i>
                    <p>
                        Kegiatan
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon mdi mdi-account-circle"></i>
                    <p>
                        Akun
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ url('admin/daftar-gapoktan') }}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Gapoktan</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('admin/daftar-poktan') }}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Poktan</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('admin/daftar-petani') }}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Petani</p>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-header">Laporan</li>
            <li class="nav-item">
                <a href="{{ url('admin/tandur') }}" class="nav-link">
                    <i class="nav-icon mdi mdi-calendar-text"></i>
                    <p>
                        Tandur
                        <span class="badge badge-info right">2</span>
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ url('admin/panen') }}" class="nav-link">
                    <i class="nav-icon mdi mdi-calendar-multiple-check"></i>
                    <p>
                        Panen
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ url('admin/rekap-penjualan') }}" class="nav-link">
                    <i class="nav-icon mdi mdi-chart-bar"></i>
                    <p>
                        Rekap Penjualan
                    </p>
                </a>
            </li>
            <li class="nav-header">Profile Saya</li>
            <li class="nav-item">
                <a href="{{ url('admin/pengaturan') }}" class="nav-link">
                    <i class="nav-icon mdi mdi-settings"></i>
                    <p>Pengaturan</p>
                </a>
            </li>
        </ul>
    </nav>
    <!-- /.sidebar-menu -->
</div>
<!-- /.sidebar -->
