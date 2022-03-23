{{-- Header --}}
@include('components.poktan.header')

<body>
    <div id="app">
        <div class="main-wrapper">
            <div class="navbar-bg"></div>

            {{-- Navbar --}}
            @include('components.poktan.navbar')

            {{-- Sidebar --}}
            @include('components.poktan.sidebar')

            @yield('content')

            {{-- FooterJS --}}
            @include('components.poktan.footer')

        </div>
    </div>

    {{-- FooterJS --}}
    @include('components.poktan.footerJS')

</body>

</html>