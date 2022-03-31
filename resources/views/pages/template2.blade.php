@include('components.pages.header')

<body>
    <!-- Preloader -->
    {{-- <div class="preloader">
        <div class="preloader-inner">
            <div class="preloader-icon">
                <span></span>
                <span></span>
            </div>
        </div>
    </div> --}}
    <!-- /End Preloader -->

    <!-- Start Header Area -->
    <header class="header navbar-area">
        <!-- Start Topbar -->
        <div class="topbar" style="border-bottom: 1px solid #eee;">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-4 col-md-4 col-12">
                        <div class="top-left">
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-12">
                        <div class="top-middle">
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-12">
                        <div class="top-end">
                            <div class="user">
                                <i class="lni lni-user"></i>
                                Hello
                            </div>
                            <ul class="user-login">
                                <li>
                                    <a href="{{ route('login') }}">Masuk</a>
                                </li>
                                <li>
                                    <a href="{{ route('login') }}">Daftar</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Topbar -->
        <!-- Start Header Middle -->
        <div class="header-middle">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-3 col-md-3 col-7">
                        <!-- Start Header Logo -->
                        <a class="navbar-brand" href="index.html">
                            <h3>Sri Makmur</h3>
                        </a>
                        <!-- End Header Logo -->
                    </div>
                </div>
            </div>
        </div>
        <!-- End Header Middle -->
    </header>
    <!-- End Header Area -->


    @yield('content')

    <!-- Start Footer Area -->
    <footer class="footer" style="border-top: 1px solid #eee;">
        <!-- Start Footer Middle -->
        <div class="footer-middle">
            <div class="container">
                <div class="bottom-inner">
                    <div class="row">
                        <div class="col-lg-3 col-md-6 col-12">
                            <!-- Single Widget -->
                            <div class="single-footer f-link">
                                <h3>Social Media</h3>
                                <ul>
                                    <li>
                                        <a href="javascript:void(0)" class="mx-1"><i class="bi bi-facebook h4"></i></a>
                                        <a href="javascript:void(0)" class="mx-1"><i class="bi bi-instagram h4"></i></a>
                                        <a href="javascript:void(0)" class="mx-1"><i class="bi bi-whatsapp h4"></i></a>
                                    </li>
                                </ul>
                            </div>
                            <!-- End Single Widget -->
                        </div>
                        <div class="col-lg-3 col-md-6 col-12">
                            <!-- Single Widget -->
                            <div class="single-footer f-contact">
                                <h3>Hubungi Kami</h3>
                                <p class="phone">Sri Makmur, Desa Krasak</p>
                                <p class="phone">Kec Jatibarang, Kab Indramayu,</p>
                                <p class="phone">Provinsi Jawa Barat.</p>
                                <ul>
                                    <li>
                                        <p class="mail"><a href="mailto:support@shopgrids.com">srimakmur@gmail.com</a></p>
                                    </li>
                                </ul>
                            </div>
                            <!-- End Single Widget -->
                        </div>
                        <div class="col-lg-3 col-md-6 col-12">
                            <!-- Single Widget -->
                            <div class="single-footer f-link">
                            </div>
                            <!-- End Single Widget -->
                        </div>
                        <div class="col-lg-3 col-md-6 col-12">
                            <!-- Single Widget -->
                            <div class="single-footer our-app">
                                <h3>Edukasi SRI MAKMUR</h3>
                            </div>
                            <!-- End Single Widget -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Footer Middle -->
    </footer>
    <!--/ End Footer Area -->


    <!-- ========================= scroll-top ========================= -->
    <a href="#" class="scroll-top">
        <i class="lni lni-chevron-up"></i>
    </a>

    @include('components.pages.footerJS')
</body>

</html>
