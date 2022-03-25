@extends('gapoktan.template')
@section('title', 'Tambah Kegiatan')

@section('content')
    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>@yield('title')</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="#">Modules</a></div>
                    <div class="breadcrumb-item">@yield('title')</div>
                </div>
            </div>

            <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                    <form action="{{ asset('gapoktan/kegiatan') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card-header">
                            <h4>@yield('title')</h4>
                        </div>
                        <div class="card-body">
                            <div class="col-12 col-md-12 col-lg-5">
                                <label>Gambar</label>
                                <div class="card align-items-center justify-content-center">
                                    <div class="card-body">
                                        <div class="chocolat-parent">
                                            <a href="" class="chocolat-image" title="Just an example">
                                                <div data-crop-image="285">
                                                    <img alt="image"
                                                        src="{{ asset('stisla/assets/img/example-image.jpg') }}"
                                                        class="img-fluid img-preview ">
                                                </div>
                                            </a>
                                        </div>
                                        <div class="card-body">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" name="image" id="image">
                                                <label class="custom-file-label" for="customFile">Choose file</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-7 col-12">
                                    <label>Name</label>
                                    <input type="text" class="form-control is-valid" name="name" value="{{ old('name') }}"
                                        required="">
                                </div>

                                <div class="form-group col-md-5 col-12">
                                    <label>Slug</label>
                                    <input type="text" class="form-control is-valid" name="slug" value="{{ old('slug') }}"
                                        required="">
                                </div>
                            </div>
                            <div class="form-group mb-0">
                                <label>Description</label>
                                <textarea class="form-control is-invalid" rows="7" name="description" required=""></textarea>
                            </div>
                        </div>
                        <div class="card-footer text-right">
                            <button class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        $(document).ready(() => {
            $('#image').change(function() {
                const file = this.files[0];
                console.log(file);
                if (file) {
                    let reader = new FileReader();
                    reader.onload = function(event) {
                        console.log(event.target.result);
                        $('.img-preview').attr('src', event.target.result);
                    }
                    reader.readAsDataURL(file);
                }
            });
        });
    </script>
@endsection
