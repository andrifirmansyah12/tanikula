{{-- Header --}}
@include('components.pages.header')

<body class="leading-normal tracking-normal text-gray-600" style="font-family: 'Source Sans Pro', sans-serif;">

    {{-- Navbar --}}
    @include('components.pages.navbar')

    {{-- Submenu --}}
    @include('components.pages.submenu')

    @yield('content')

    {{-- Footer --}}
    @include('components.pages.footer')

</body>

</html>