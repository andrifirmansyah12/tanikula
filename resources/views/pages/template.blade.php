{{-- Header --}}
@include('components.pages.header')

<body class="leading-normal tracking-normal text-gray-600" style="font-family: 'Source Sans Pro', sans-serif;">

    <div class="h-screen pb-14 bg-right bg-cover">

        {{-- Navbar --}}
        @include('components.pages.navbar')

        {{-- Submenu --}}
        @include('components.pages.submenu')

        {{-- Submenu --}}
        @include('components.pages.banner')

        <!--Main-->
        <div class="container px-6 mx-auto">
            
            {{-- Konten --}}
            @yield('content')

            <!--Footer-->
            @include('components.pages.footer')

        </div>

    </div>


</body>

</html>