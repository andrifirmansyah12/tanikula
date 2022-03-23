{{-- Header --}}
@include('components.petani.header')

<body>
    <div id="app">
        <div class="main-wrapper">
            <div class="navbar-bg"></div>

            {{-- Navbar --}}
            @include('components.petani.navbar')

            {{-- Sidebar --}}
            @include('components.petani.sidebar')

            @yield('content')

            {{-- FooterJS --}}
            @include('components.petani.footer')

        </div>
    </div>

    {{-- FooterJS --}}
    @include('components.petani.footerJS')

</body>

</html>