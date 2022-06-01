<nav class="navbar navbar-expand-lg main-navbar">
    <form class="form-inline mr-auto">
        <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
            <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a></li>
        </ul>
        <div class="search-element">
            <input class="form-control" type="search" placeholder="Search" aria-label="Search" data-width="250">
            <button class="btn" type="submit"><i class="fas fa-search"></i></button>
            <div class="search-backdrop"></div>
            <div class="search-result">
                <div class="search-header">
                    Histories
                </div>
                <div class="search-item">
                    <a href="#">How to hack NASA using CSS</a>
                    <a href="#" class="search-close"><i class="fas fa-times"></i></a>
                </div>
                <div class="search-item">
                    <a href="#">Kodinger.com</a>
                    <a href="#" class="search-close"><i class="fas fa-times"></i></a>
                </div>
                <div class="search-item">
                    <a href="#">#Stisla</a>
                    <a href="#" class="search-close"><i class="fas fa-times"></i></a>
                </div>
                <div class="search-header">
                    Result
                </div>
                <div class="search-item">
                    <a href="#">
                        <img class="mr-3 rounded" width="30"
                            src="{{ asset('assets/img/products/product-3-50.png') }}" alt="product">
                        oPhone S9 Limited Edition
                    </a>
                </div>
                <div class="search-item">
                    <a href="#">
                        <img class="mr-3 rounded" width="30"
                            src="{{ asset('assets/img/products/product-2-50.png') }}" alt="product">
                        Drone X2 New Gen-7
                    </a>
                </div>
                <div class="search-item">
                    <a href="#">
                        <img class="mr-3 rounded" width="30"
                            src="{{ asset('assets/img/products/product-1-50.png') }}" alt="product">
                        Headphone Blitz
                    </a>
                </div>
                <div class="search-header">
                    Projects
                </div>
                <div class="search-item">
                    <a href="#">
                        <div class="search-icon bg-danger text-white mr-3">
                            <i class="fas fa-code"></i>
                        </div>
                        Stisla Admin Template
                    </a>
                </div>
                <div class="search-item">
                    <a href="#">
                        <div class="search-icon bg-primary text-white mr-3">
                            <i class="fas fa-laptop"></i>
                        </div>
                        Create a new Homepage Design
                    </a>
                </div>
            </div>
        </div>
    </form>
    <ul class="navbar-nav navbar-right">
        @php
            $countNotificationActivity = App\Models\NotificationActivity::join('activities', 'notification_activities.activity_id', '=', 'activities.id')
                                                                ->join('users', 'activities.user_id', '=', 'users.id')
                                                                ->leftJoin('farmers', function ($join) {
                                                                        $join->on('users.id', '=', 'farmers.user_id');
                                                                    })
                                                                ->leftJoin('poktans', function ($join) {
                                                                        $join->on('farmers.poktan_id', '=', 'poktans.id');
                                                                    })
                                                                ->leftJoin('gapoktans', function ($join) {
                                                                        $join->on('poktans.gapoktan_id', '=', 'gapoktans.id');
                                                                    })
                                                                ->where('notification_activities.read_at', '=', null)
                                                                ->orderBy('notification_activities.updated_at', 'desc')
                                                                ->count();

        @endphp
        <li class="dropdown dropdown-list-toggle"><a href="#" data-toggle="dropdown"
                class="nav-link notification-toggle nav-link-lg {{ $countNotificationActivity == null ? '' : 'beep' }}"><i class="far fa-bell"></i><span class="position-absolute">{{ $countNotificationActivity }}</span></a>
            <div class="dropdown-menu dropdown-list dropdown-menu-right">
                <div class="dropdown-header">Notifikasi
                    {{-- <div class="float-right">
                        <a href="#">Mark All As Read</a>
                    </div> --}}
                </div>
                <div class="dropdown-list-content dropdown-list-icons">
                    @php
                        $notificationActivity = App\Models\NotificationActivity::join('activities', 'notification_activities.activity_id', '=', 'activities.id')
                                                                    ->join('users', 'activities.user_id', '=', 'users.id')
                                                                    ->leftJoin('farmers', function ($join) {
                                                                            $join->on('users.id', '=', 'farmers.user_id');
                                                                        })
                                                                    ->leftJoin('poktans', function ($join) {
                                                                            $join->on('farmers.poktan_id', '=', 'poktans.id');
                                                                        })
                                                                    ->leftJoin('gapoktans', function ($join) {
                                                                            $join->on('poktans.gapoktan_id', '=', 'gapoktans.id');
                                                                        })
                                                                    ->select('notification_activities.*', 'activities.title as name')
                                                                    ->orderBy('notification_activities.updated_at', 'desc')
                                                                    ->get();
                    @endphp

                    @if ($notificationActivity->count() > 0)

                    @foreach ($notificationActivity as $item)
                        <div class="dropdown-item {{ $item->read_at == null ? 'dropdown-item-unread' : '' }}">
                            <div class="dropdown-item-icon bg-info text-white">
                                <i class="fas fa-user-plus"></i>
                            </div>
                            <div class="dropdown-item-desc">
                                <b>{{ $item->name }}</b> telah mendaftarkan akun sebagai anggota anda.
                                <div class="time">{{$item->created_at->diffForHumans()}}</div>
                                <a href="#" id="{{ $item->id }}" class="notifActivity float-right mx-1">Lihat</a>
                            </div>
                        </div>
                    @endforeach

                    @else
                        <div id="app">
                            <section class="section">
                                <div class="container">
                                    <div class="page-error-notification">
                                        <div class="page-inner-notification">
                                            <img src="{{ asset('img/undraw_empty_re_opql.svg') }}" alt="">
                                            <div class="page-description-notification">
                                                Tidak ada notifikasi!
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                        </div>
                    @endif
                </div>
                <div class="dropdown-footer text-center">
                    <a href="#">View All <i class="fas fa-chevron-right"></i></a>
                </div>
            </div>
        </li>
        <li class="dropdown"><a href="#" data-toggle="dropdown"
                class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                <img alt="image" src="{{ asset('assets/img/avatar/avatar-1.png') }}"
                    class="rounded-circle mr-1') }}">
                <div class="d-sm-none d-lg-inline-block">{{ Auth::user()->name }}</div>
            </a>
            <div class="dropdown-menu dropdown-menu-right">
                {{-- <div class="dropdown-title">Logged in 5 min ago</div>
                <a href="features-profile.html" class="dropdown-item has-icon">
                    <i class="far fa-user"></i> Profile
                </a>
                <a href="features-activities.html" class="dropdown-item has-icon">
                    <i class="fas fa-bolt"></i> Activities
                </a> --}}
                <a href="{{ url('gapoktan/pengaturan') }}" class="dropdown-item has-icon">
                    <i class="fas fa-cog"></i> Pengaturan
                </a>
                <div class="dropdown-divider"></div>
                <a href="{{ route('logout-petani') }}" class="dropdown-item has-icon text-danger" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                    <i class="fas fa-sign-out-alt"></i> Keluar

                    <form id="logout-form" action="{{ route('logout-petani') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </a>
            </div>
        </li>
    </ul>
</nav>
