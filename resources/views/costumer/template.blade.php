{{-- Header --}}
@include('components.costumer.header')

<body>
    <div id="app">
        <div class="main-wrapper">
            <div class="navbar-bg"></div>

            {{-- Navbar --}}
            @include('components.costumer.navbar')

            {{-- Sidebar --}}
            @include('components.costumer.sidebar')

            @yield('content')

            {{-- FooterJS --}}
            @include('components.costumer.footer')

        </div>
    </div>

    {{-- FooterJS --}}
    @include('components.costumer.footerJS')

</body>

</html>