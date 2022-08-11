@extends('poktan.template')
@section('title', 'Dashboard')

@section('style')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('content')
    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>@yield('title')</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item">Poktan</div>
                    <div class="breadcrumb-item active"><a href="#">@yield('title')</a></div>
                </div>
            </div>
            <div class="row" id="show_all_employees">
                {{-- Content --}}
            </div>
            <div class="row">
                <div class="col-lg-12 col-md-12 col-12 col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <canvas id="harvestCount" height="280" width="600"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>
    <script>
        var year = <?php echo $year; ?>;
        var harvest = <?php echo $harvest; ?>;
        var plant = <?php echo $plant; ?>;
        var fields = <?php echo $fields; ?>;
        var barChartData = {
            labels: year,
            datasets: [{
                label: 'Lahan yang disediakan',
                backgroundColor: "brown",
                data: fields,
            }, {
                label: 'Tanam',
                backgroundColor: "orange",
                data: plant,
            }, {
                label: 'Panen',
                backgroundColor: "green",
                data: harvest,
            }]
        };

        window.onload = function() {
            var ctx = document.getElementById("harvestCount").getContext("2d");
            window.myBar = new Chart(ctx, {
                type: 'bar',
                data: barChartData,
                options: {
                    elements: {
                        rectangle: {
                            borderWidth: 2,
                            borderColor: '#c1c1c1',
                            borderSkipped: 'bottom'
                        }
                    },
                    responsive: true,
                    title: {
                        display: true,
                        text: 'Data tanam dan panen yang direkap dalam per tahun.'
                    },
                }
            });
        };
    </script>
    <script>
        //CSRF TOKEN PADA HEADER
        //Script ini wajib krn kita butuh csrf token setiap kali mengirim request post, patch, put dan delete ke server
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        });

        $(function() {

            // fetch all employees ajax request
            fetchAllEmployees();

            function fetchAllEmployees() {
                $.ajax({
                url: '{{ route('poktan-fetchAll') }}',
                method: 'get',
                success: function(response) {
                    $("#show_all_employees").html(response);
                }
                });
            }

        });

    </script>
@endsection
