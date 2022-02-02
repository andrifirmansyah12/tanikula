{{-- Header --}}
@include('components.poktan.header')

<body>
    <div class="container-scroller">

        {{-- Sidebar --}}
        @include('components.poktan.sidebar')

        <!-- partial -->
        <div class="container-fluid page-body-wrapper">

            {{-- Navbar --}}
            @include('components.poktan.navbar')

            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper pb-0">
                    <div class="page-header flex-wrap">
                        <div class="header-left">
                            <button class="btn btn-primary mb-2 mb-md-0 mr-2"> Create new document </button>
                            <button class="btn btn-outline-primary bg-white mb-2 mb-md-0"> Import documents </button>
                        </div>
                        <div class="header-right d-flex flex-wrap mt-2 mt-sm-0">
                            <div class="d-flex align-items-center">
                                <a href="#">
                                    <p class="m-0 pr-3">Dashboard</p>
                                </a>
                                <a class="pl-3 mr-4" href="#">
                                    <p class="m-0">ADE-00234</p>
                                </a>
                            </div>
                            <button type="button" class="btn btn-primary mt-2 mt-sm-0 btn-icon-text">
                                <i class="mdi mdi-plus-circle"></i> Add Prodcut </button>
                        </div>
                    </div>
                    
                    {{-- Content --}}
                    @yield('content')

                </div>

                

                {{-- Footer --}}
                @include('components.poktan.footer')

            </div>
        </div>
    </div>

    {{-- FooterJS --}}
    @include('components.poktan.footerJS')

</body>

</html>