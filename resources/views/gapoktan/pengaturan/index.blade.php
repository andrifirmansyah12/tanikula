@extends('gapoktan.template')
@section('title', 'Biodata Diri')

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
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <ul class="nav nav-tabs">
                                    <li class="nav-item">
                                        <a class="nav-link active" href="{{ url('gapoktan/pengaturan') }}">Biodata
                                            Diri</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ url('gapoktan/daftar-poktan') }}">Daftar
                                            Poktan</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ url('gapoktan/daftar-petani') }}">Daftar
                                            Petani</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="card-body row mt-sm-4">
                                <div class="col-12 col-md-12 col-lg-5">
                                    <div class="card align-items-center justify-content-center">
                                        <div class="card-body">
                                            <div class="chocolat-parent">
                                                <a href="" class="chocolat-image" title="Just an example">
                                                    <div data-crop-image="285">
                                                        <img alt="image"
                                                            src="{{ asset('stisla/assets/img/example-image.jpg') }}"
                                                            class="img-fluid">
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="card-body">
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" id="customFile">
                                                    <label class="custom-file-label" for="customFile">Choose file</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-12 col-lg-7">
                                    <div class="">
                                        <form method="post" class="needs-validation" novalidate="">
                                            <div class="card-header">
                                                <h4>Ubah Biodata Diri</h4>
                                            </div>
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="form-group col-md-12 col-12">
                                                        <label>Nama</label>
                                                        <input type="text" class="form-control" value="Ujang" required="">
                                                        <div class="invalid-feedback">
                                                            Please fill in the first name
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="form-group col-md-12 col-12">
                                                        <label>Email</label>
                                                        <input type="email" class="form-control" value="ujang@maman.com"
                                                            required="">
                                                        <div class="invalid-feedback">
                                                            Please fill in the email
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="form-group col-md-7 col-12">
                                                        <label>Tanggal Lahir</label>
                                                        <input type="tel" class="form-control"
                                                            value="Kamis 23 - januari - 2021">
                                                    </div>
                                                    <div class="form-group col-md-5 col-12">
                                                        <label>Jenis Kelamin</label>
                                                        <input type="tel" class="form-control" value="Laki-laki">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-footer text-right">
                                                <button class="btn btn-primary">Save Changes</button>
                                            </div>
                                        </form>
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

@section('script')
    <script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
@endsection
