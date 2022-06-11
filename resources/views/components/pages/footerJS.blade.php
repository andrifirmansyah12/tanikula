<!-- ========================= JS here ========================= -->
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js'></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/js/iziToast.js"
        integrity="sha256-siqh9650JHbYFKyZeTEAhq+3jvkFCG8Iz+MHdr9eKrw=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/tiny-slider.js') }}"></script>
<script src="{{ asset('js/glightbox.min.js') }}"></script>
<script src="{{ asset('js/main.js') }}"></script>
<script src="{{ asset('js/market.js') }}"></script>
@yield('script')
<script type="text/javascript">
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
<script>
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
            })
        }
    })
</script>
