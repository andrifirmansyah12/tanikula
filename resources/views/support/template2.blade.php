<!-- Header -->
@include('components.support.header')

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Preloader -->
        {{-- <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="{{ asset('plus-admin/dist/img/AdminLTELogo.png') }}" alt="AdminLTELogo" height="60" width="60">
        </div> --}}

        <!-- Navbar -->
        @include('components.support.navbar')

        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <a href="index3.html" class="brand-link">
                <img src="{{ asset('img/Logo TaniKula.svg') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
                    style="opacity: .8">
                <span class="brand-text font-weight-light">Tanikula</span>
            </a>

            <!-- Sidebar -->
            @include('components.support.sidebar')

        </aside>

        <div class="content-wrapper">

            @yield('content')

        </div>

        <!-- Footer -->
        @include('components.support.footer')


        <aside class="control-sidebar control-sidebar-dark">
        </aside>
    </div>

    <!-- Footer JS -->
    @include('components.support.footerJS')


</body>

</html>
