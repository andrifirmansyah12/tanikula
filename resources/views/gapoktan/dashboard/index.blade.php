@extends('gapoktan.template')
@section('title','Dashboard')

@section('content')

<!-- first row starts here -->
<div class="row">
    <div class="col-xl-9 stretch-card grid-margin">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between flex-wrap">
                    <div>
                        <div class="card-title mb-0">Sales Revenue</div>
                        <h3 class="font-weight-bold mb-0">$32,409</h3>
                    </div>
                    <div>
                        <div class="d-flex flex-wrap pt-2 justify-content-between sales-header-right">
                            <div class="d-flex mr-5">
                                <button type="button" class="btn btn-social-icon btn-outline-sales">
                                    <i class="mdi mdi-inbox-arrow-down"></i>
                                </button>
                                <div class="pl-2">
                                    <h4 class="mb-0 font-weight-semibold head-count"> $8,217 </h4>
                                    <span class="font-10 font-weight-semibold text-muted">TOTAL
                                        SALES</span>
                                </div>
                            </div>
                            <div class="d-flex mr-3 mt-2 mt-sm-0">
                                <button type="button" class="btn btn-social-icon btn-outline-sales profit">
                                    <i class="mdi mdi-cash text-info"></i>
                                </button>
                                <div class="pl-2">
                                    <h4 class="mb-0 font-weight-semibold head-count"> 2,804 </h4>
                                    <span class="font-10 font-weight-semibold text-muted">TOTAL
                                        PROFIT</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <p class="text-muted font-13 mt-2 mt-sm-0"> Your sales monitoring dashboard
                    template. <a class="text-muted font-13" href="#"><u>Learn more</u></a>
                </p>
                <div class="flot-chart-wrapper">
                    <div id="flotChart" class="flot-chart">
                        <canvas class="flot-base"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 stretch-card grid-margin">
        <div class="card card-img">
            <div class="card-body d-flex align-items-center">
                <div class="text-white">
                    <h1 class="font-20 font-weight-semibold mb-0"> Get premium </h1>
                    <h1 class="font-20 font-weight-semibold">account!</h1>
                    <p>to optimize your selling prodcut</p>
                    <p class="font-10 font-weight-semibold"> Enjoy the advantage of premium. </p>
                    <button class="btn bg-white font-12">Get Premium</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- chart row starts here -->
<div class="row">
    <div class="col-sm-6 stretch-card grid-margin">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <div class="card-title"> Customers <small class="d-block text-muted">August 01 -
                            August 31</small>
                    </div>
                    <div class="d-flex text-muted font-20">
                        <i class="mdi mdi-printer mouse-pointer"></i>
                        <i class="mdi mdi-help-circle-outline ml-2 mouse-pointer"></i>
                    </div>
                </div>
                <h3 class="font-weight-bold mb-0"> 2,409 <span class="text-success h5">4,5%<i
                            class="mdi mdi-arrow-up"></i></span>
                </h3>
                <span class="text-muted font-13">Avg customers/Day</span>
                <div class="line-chart-wrapper">
                    <canvas id="linechart" height="80"></canvas>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-6 stretch-card grid-margin">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <div class="card-title"> Conversions <small class="d-block text-muted">August 01
                            - August 31</small>
                    </div>
                    <div class="d-flex text-muted font-20">
                        <i class="mdi mdi-printer mouse-pointer"></i>
                        <i class="mdi mdi-help-circle-outline ml-2 mouse-pointer"></i>
                    </div>
                </div>
                <h3 class="font-weight-bold mb-0"> 0.40% <span class="text-success h5">0.20%<i
                            class="mdi mdi-arrow-up"></i></span>
                </h3>
                <span class="text-muted font-13">Avg customers/Day</span>
                <div class="bar-chart-wrapper">
                    <canvas id="barchart" height="80"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection