<!-- ========================= JS here ========================= -->
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js'></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/js/iziToast.js"
        integrity="sha256-siqh9650JHbYFKyZeTEAhq+3jvkFCG8Iz+MHdr9eKrw=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/tiny-slider.js') }}"></script>
<script src="{{ asset('js/glightbox.min.js') }}"></script>
<script src="{{ asset('js/main.js') }}"></script>
{{-- <script src="{{ asset('js/market.js') }}"></script> --}}
@yield('script')
<script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.1/bootstrap3-typeahead.min.js"></script>
<script type="text/javascript">
    // Route Link
    // Home
    function home(url) {
        window.location = url;
    }
    // Hubungi Kami
    function hubungi_kami(url) {
        window.location = url;
    }
    // // Cart
    // function cart(url) {
    //     window.location = url;
    // }
    // // Produk Detail
    // function product_detail(url) {
    //     window.location = url;
    // }
    // // Shipment
    // function shipment(url) {
    //     window.location = url;
    // }
    // // New Product
    // function new_product(url) {
    //     window.location = url;
    // }
    // // Nama Kategori
    // function category_name(url) {
    //     window.location = url;
    // }
    // // Semua Kategori
    // function all_category(url) {
    //     window.location = url;
    // }
    // Pembeli Dashboard
    function pembeli(url) {
        window.location = url;
    }
    // Login
    function login(url) {
        window.location = url;
    }
    // Register
    function register(url) {
        window.location = url;
    }

    //========= Hero Slider
    tns({
        container: '.hero-slider',
        slideBy: 'page',
        autoplay: true,
        autoplayButtonOutput: false,
        mouseDrag: true,
        gutter: 0,
        items: 1,
        nav: false,
        controls: true,
        controlsText: ['<i class="lni lni-chevron-left"></i>', '<i class="lni lni-chevron-right"></i>'],
    });

    //======== Brand Slider
    tns({
        container: '.brands-logo-carousel',
        autoplay: true,
        autoplayButtonOutput: false,
        mouseDrag: true,
        gutter: 15,
        nav: false,
        controls: false,
        responsive: {
            0: {
                items: 1,
            },
            540: {
                items: 3,
            },
            768: {
                items: 5,
            },
            992: {
                items: 6,
            }
        }
    });
</script>
{{-- <script>
    $(document).ready(function () {

        $('#dynamic_content').html(make_skeleton())

        // jalankan fungsi load content setelah 2 detik
        setTimeout(function(){
            load_content()
        }, 2000);

        function make_skeleton() {
            var output = '';
            for (var count = 0; count < 6; count++) {
                output += '<div class="col-4">';
                output += '<div class="ph-item">';
                output += '<div class="ph-col-12">';
                output += '<div class="ph-picture"></div>';
                output += '<div class="ph-row">';
                output += '<div class="ph-col-6 big"></div>';
                output += '<div class="ph-col-4 empty big"></div>';
                output += '<div class="ph-col-12"></div>'
                output += '<div class="ph-col-12"></div>'
                output += '</div>';
                output += '</div>';
                output += '</div>';
                output += '</div>';
            }
            return output;
        }

        //membuat fungsi load data dari data.php
        function load_content(limit){
            $.ajax({
                url: 'data.php',
                method: 'POST',
                data:{limit:limit},

                //jika sukses maka gantilah skeleton loader dengan data.php
                success:function(data){
                    $('#dynamic_content').html(data);
                }
            });
        }
    });
</script> --}}
<script>
    var path = "{{ route('productListAjax')  }}";
    $('input.typeaheadProduct').typeahead({
        source: function (query, process) {
            return $.get(path, {
                term: query
            }, function (data) {
                return process(data);
            });
        }
    });

    // var availableTags = [];
    // $.ajax({
    //     url: "/product-list",
    //     method: "GET",
    //     success: function (response) {
    //         // console.log(response);
    //         startAutoComplete(response);
    //     }
    // });

    // function startAutoComplete(availableTags) {
    //     $("#search_product").autocomplete({
    //         source: availableTags
    //     });
    // }
</script>
<script>
    $(document).ready(function () {

    LoadCart();

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    function LoadCart()
    {
        $.ajax({
            method: "GET",
            url: "/load-cart",
            success: function (response) {
                $('.cart-count').html('');
                $('.cart-count').html(response.count);
                // alert(response.count);
            }
        });
    }

    $('#addToCartBtn').click(function (e) {
        e.preventDefault();

        var product_id = $(this).closest('#product_data').find('#prod_id').val();
        var product_qty = $(this).closest('#product_data').find('.qty-input').val();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            method: "POST",
            url: "/add-to-cart",
            data: {
                'product_id': product_id,
                'product_qty': product_qty,
            },
            success: function (response) {
                if (response.status == 'Silahkan login!') {
                    window.location = '/login';
                } else {
                    iziToast.success({ //tampilkan iziToast dengan notif data berhasil disimpan pada posisi kanan bawah
                        title: 'Berhasil',
                        message: response.status,
                        position: 'topRight'
                    });
                    window.setTimeout(function(){location.reload()},1000)
                }
            }
        });
    });

    $('#addToWishlistBtn').click(function (e) {
        e.preventDefault();

        var product_id = $(this).closest('#product_data').find('#prod_id').val();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            method: "POST",
            url: "/add-to-wishlist",
            data: {
                'product_id': product_id,
            },
            success: function (response) {
                if (response.status == 'Silahkan login!') {
                    window.location = '/login';
                } else {
                    // window.location.reload();
                    iziToast.success({ //tampilkan iziToast dengan notif data berhasil disimpan pada posisi kanan bawah
                        title: 'Berhasil',
                        message: response.status,
                        position: 'topRight'
                    });
                }
            }
        });
    });

    $('.delete-cart-item').click(function (e) {
        e.preventDefault();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        var product_id = $(this).closest('#product_data').find('#prod_id').val();

        $.ajax({
            method: "POST",
            url: "delete-cart-item",
            data: {
                'product_id': product_id,
            },
            success: function (response) {
                LoadCart();
                iziToast.success({ //tampilkan iziToast dengan notif data berhasil disimpan pada posisi kanan bawah
                    title: 'Berhasil',
                    message: response.status,
                    position: 'topRight'
                });
                window.setTimeout(function(){location.reload()},3000)
            }
        });
    });

    $('.changeQuantity').click(function (e) {
        e.preventDefault();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        var product_id = $(this).closest('#product_data').find('#prod_id').val();
        var qty = $(this).closest('#product_data').find('.qty-input').val();

        $.ajax({
            method: "POST",
            url: "update-cart-item",
            data: {
                'product_id': product_id,
                'product_qty': qty,
            },
            success: function (response) {
                window.location.reload();
            }
        });
    });
});
</script>
