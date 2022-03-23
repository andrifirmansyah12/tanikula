{{-- Header --}}
@include('components.admin.header')

<body>
    <div id="app">
        <div class="main-wrapper">
            <div class="navbar-bg"></div>

            {{-- Navbar --}}
            @include('components.admin.navbar')

            {{-- Sidebar --}}
            @include('components.admin.sidebar')

            @yield('content')

            {{-- FooterJS --}}
            @include('components.admin.footer')

        </div>
    </div>

    {{-- FooterJS --}}
    @include('components.admin.footerJS')

</body>

</html>