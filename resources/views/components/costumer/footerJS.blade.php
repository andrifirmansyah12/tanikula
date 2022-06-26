{{-- Js --}}
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js'></script>
<!--   Core JS Files   -->
<script src="/costumer/assets/js/core/popper.min.js"></script>
<script src="/costumer/assets/js/core/bootstrap.min.js"></script>
<script src="/costumer/assets/js/plugins/perfect-scrollbar.min.js"></script>
<script src="/costumer/assets/js/plugins/smooth-scrollbar.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
<script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
        var options = {
            damping: '0.5'
        }
        Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
</script>
<!-- Github buttons -->
<script async defer src="https://buttons.github.io/buttons.js"></script>
<!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
<script src="/costumer/assets/js/material-dashboard.min.js?v=3.0.0"></script>
<script src="{{ asset('js/market.js') }}"></script>
@yield('script')
