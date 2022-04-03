@extends('costumer.template')
@section('title','Biodata Diri')

@section('content')

<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>@yield('title')</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Pembeli</a></div>
                <div class="breadcrumb-item"><a href="#">@yield('title')</a></div>
            </div>
        </div>

        <div class="section-body">
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
                            <div class="col-12 col-md-12 col-lg-5">
                                <div class="card align-items-center justify-content-center">
                                    <div class="card-body">
                                        <div class="chocolat-parent">
                                            <a href="" class="chocolat-image" title="Just an example">
                                                <div data-crop-image="285">
                                                    <img alt="image"
                                                        src="{{ asset('stisla/assets/img/example-image.jpg') }}"
                                                        class="img-fluid img-thumbnail">
                                                </div>
                                            </a>
                                        </div>
                                        <div class="card-body">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="image" name="image">
                                                <label class="custom-file-label" for="image">Choose file</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-12 col-lg-7">
                                <div class="">
                                    <form method="post" action="#" id="profile_form">
                                    @csrf
                                        <div class="card-header">
                                            <h4>Ubah Biodata Diri</h4>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="form-group col-md-12 col-12">
                                                    <label for="name">Nama</label>
                                                    <input type="text" class="form-control" name="name" id="name" value="{{ Auth::user()->name }}" required="">
                                                    <div class="invalid-feedback">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-md-12 col-12">
                                                    <label for="email">Email</label>
                                                    <input type="email" class="form-control" id="email" name="email" value="{{ Auth::user()->email }}"
                                                        required="">
                                                    <div class="invalid-feedback">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-md-12 col-12">
                                                    <label for="telp">No Handphone</label>
                                                    <input type="tel" class="form-control" id="telp" name="telp" value="0"
                                                        required="">
                                                    <div class="invalid-feedback">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-md-7 col-12">
                                                    <label for="birth">Tanggal Lahir</label>
                                                    <input type="date" name="birth" id="birth" class="form-control" value="Kamis 23 - januari - 2021">
                                                </div>
                                                <div class="form-group col-md-5 col-12">
                                                    <label for="gender">Jenis Kelamin</label>
                                                    <select name="gender" id="gender" class="form-control select2">
                                                        <option value="" selected disabled>Pilih Jenis Kelamin</option>
                                                        <option value="Laki-laki">Laki-Laki</option>
                                                        <option value="Perempuan">Perempuan</option>
                                                        {{-- <option value="Laki-laki" {{ Auth::user()->gender == 'Laki-laki' ? 'selected' : '' }}>Laki-Laki</option>
                                                        <option value="Perempuan" {{ Auth::user()->gender == 'Perempuan' ? 'selected' : '' }}>Perempuan</option> --}}
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-footer text-right">
                                            <input type="submit" id="profile_btn" value="Update Biodata Diri" class="btn btn-primary">
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
