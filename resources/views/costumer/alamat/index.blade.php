@extends('costumer.template')
@section('title','Alamat')

@section('content')

<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>@yield('title')</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="#">Bootstrap Components</a></div>
                <div class="breadcrumb-item">@yield('title')</div>
            </div>
        </div>

        <div class="section-body">
            <h2 class="section-title">@yield('title')</h2>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <ul class="nav nav-tabs">
                                <li class="nav-item">
                                    <a class="nav-link active" href="/pembeli">Biodata Diri</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="/pembeli/alamat">Alamat</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">Notifikasi</a>
                                </li>
                            </ul>
                        </div>
                        <div class="card-body row mt-sm-4">
                            <div class="col-12 col-md-12 col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <span class="d-inline-block">
                                            <a href="" class="btn btn-primary text-white">Tambah
                                                Alamat</a>
                                        </span>
                                    </div>
                                    <div class="card-body">
                                        <div id="accordion">
                                            <div class="accordion">
                                                <div class="accordion-header" role="button" data-toggle="collapse"
                                                    data-target="#panel-body-1" aria-expanded="true">
                                                    <h4>Alamat Saya</h4>
                                                </div>
                                                <div class="accordion-body collapse show" id="panel-body-1"
                                                    data-parent="#accordion">
                                                    <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing
                                                        elit, sed do eiusmod
                                                        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad
                                                        minim veniam,
                                                        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
                                                        commodo
                                                        consequat. Duis aute irure dolor in reprehenderit in voluptate
                                                        velit esse
                                                        cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat
                                                        cupidatat non
                                                        proident, sunt in culpa qui officia deserunt mollit anim id est
                                                        laborum.</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@endsection