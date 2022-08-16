@extends('gapoktan.template')
@section('title', 'Produk')

@section('style')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- MULAI STYLE CSS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
    <link rel='stylesheet'
        href='https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.5.0/font/bootstrap-icons.min.css' />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/css/iziToast.css"
        integrity="sha256-pODNVtK3uOhL8FUNWWvFQK0QoQoV3YA9wGGng6mbZ0E=" crossorigin="anonymous" />
    <!-- AKHIR STYLE CSS -->
    <style>
        .preview-image img {
            padding: 10px;
            width: 7rem;
            height: 7rem;
            -o-object-fit: cover;
            object-fit: cover;
            -o-object-position: center;
            object-position: center;
        }

        .preview-image-edit img {
            padding: 10px;
            width: 7rem;
            height: 7rem;
            -o-object-fit: cover;
            object-fit: cover;
            -o-object-position: center;
            object-position: center;
        }
    </style>
@endsection

@section('content')

    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>@yield('title')</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item">Gapoktan</div>
                    <div class="breadcrumb-item active"><a href="#">@yield('title')</a></div>
                </div>
            </div>

            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <button type="button" style="border-radius: 5px;" class="btn shadow-none py-1 btn-primary" data-toggle="modal"
                                    data-target="#addEmployeeModal">Tambah
                                    @yield('title')</button>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive" id="show_all_employees">
                                    <h1 class="text-center text-secondary my-5">Memuat..</h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="addEmployeeModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Produk</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="#" method="POST" id="add_employee_form" accept-charset="utf-8" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body p-4">
                        <div class="form-group my-2">
                            <label for="name">Nama Produk</label>
                            <input type="text" name="name" class="nameCheck form-control" placeholder="Nama Produk" required>
                        </div>
                        <div class="form-group my-2">
                            <label>Kategori Produk</label>
                            @if ($category->count() > 0)
                            <select class="form-control select2" name="category_product_id" required>
                                <option selected value="" disabled>Pilih Kategori</option>
                                    @foreach ($category as $item)
                                        @if ( old('category_product_id') == $item->id )
                                            <option value="{{ $item->id }}" selected>{{ $item->name }}</option>
                                        @else
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endif
                                    @endforeach
                            </select>
                            @else
                            <select class="form-control select2" disabled required>
                                    <option selected disabled>Tidak ada kategori</option>
                            </select>
                            @endif
                        </div>
                        <div class="row my-2 form-group">
                            <div class="col-md-4">
                                <label for="stoke" style="font-size: 12px">Stok</label>
                                <input type="number" name="stoke" class="form-control" placeholder="Stok" required>
                            </div>
                            <div class="col-md-8">
                                <label for="price" style="font-size: 12px">Harga</label>
                                <input type="number" name="price" class="form-control" placeholder="Harga" required>
                            </div>
                        </div>
                        <div class="row my-2 form-group">
                            <div class="col-md-6">
                                <label for="stoke" style="font-size: 12px">Berat (gram)</label>
                                <input type="number" name="weight" class="form-control" placeholder="Berat" required>
                            </div>
                            <div class="col-md-6">
                                <label for="stoke" style="font-size: 12px">Diskon (Persen)</label>
                                <input type="number" name="discount" value="0" class="form-control" placeholder="Diskon" required>
                            </div>
                        </div>
                        <div class="my-2 form-group">
                            <label for="desc">Deskripsi</label>
                            <textarea class="form-control" style="height: 8rem" name="desc" rows="3" required placeholder="Deskripsi"></textarea>
                        </div>
                        <div class="my-2 form-group">
                            <label for="is_active">Status Produk</label>
                            <div>
                                <label class="custom-switch">
                                    <input type="checkbox" name="is_active" class="custom-switch-input">
                                    <span class="custom-switch-indicator"></span>
                                </label>
                            </div>
                        </div>
                        {{-- <div class="my-2 form-group">
                            <label for="image">Unggah Foto</label>
                            <small class="d-flex text-danger pb-1">*Unggah berupa foto produk</small>
                            <div>
                                <div class="tab-content" id="myTabContent2">
                                    <div class="tab-pane fade show active" id="home3" role="tabpanel"
                                        aria-labelledby="home-tab3">
                                        <div class="preview-image"> </div> --}}
                                        {{-- <img id="preview" class="img-fluid img-thumbnail image"
                                        src="{{ asset('stisla/assets/img/example-image.jpg') }}" alt="edukasi"
                                        style="width: 20rem; height: 10rem; -o-object-fit: cover; object-fit: cover; -o-object-position: center; object-position: center;"> --}}
                                    {{-- </div>
                                </div>
                            </div>
                            <input type="file" id="images" name="images[]" multiple class="form-control" accept="image/*" required>
                        </div> --}}
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
                        <button type="submit" id="add_employee_btn" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="editEmployeeModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Produk</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="#" method="POST" id="edit_employee_form" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="emp_id" id="emp_id">
                    <input type="hidden" name="emp_avatar" id="emp_avatar">
                    <div class="modal-body p-4">
                        <div class="form-group my-2">
                            <label for="name">Nama</label>
                            <input type="text" name="name" id="name" class="nameCheck form-control" placeholder="Nama" required>
                        </div>
                        <div class="form-group my-2">
                            <label>Kategori Produk</label>
                            @if ($category->count() > 0)
                            <select class="form-control select2" id="category_product_id" name="category_product_id">
                                <option selected disabled>Pilih Kategori</option>
                                @foreach ($category as $item)
                                    @if ( old('category_product_id') == $item->id )
                                        <option value="{{ $item->id }}" selected>{{ $item->name }}</option>
                                    @else
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endif
                                @endforeach
                            </select>
                            @else
                            <select class="form-control select2" disabled required>
                                <option selected disabled>Tidak ada kategori</option>
                            </select>
                            @endif
                        </div>
                        <div class="row my-2 form-group">
                            <div class="col-md-4">
                                <label for="stoke" style="font-size: 12px">Stok</label>
                                <input type="number" name="stoke" id="stoke" class="form-control" placeholder="Stok" required>
                            </div>
                            <div class="col-md-8">
                                <label for="price" style="font-size: 12px">Harga</label>
                                <input type="number" name="price" id="price" class="form-control" placeholder="Harga" required>
                            </div>
                        </div>
                        <div class="row my-2 form-group">
                            <div class="col-md-6">
                                <label for="stoke" style="font-size: 12px">Berat (gram)</label>
                                <input type="number" name="weight" id="weight" class="form-control" placeholder="Berat" required>
                            </div>
                            <div class="col-md-6">
                                <label for="stoke" style="font-size: 12px">Diskon (Persen)</label>
                                <input type="number" name="discount" id="discount" class="form-control" placeholder="Diskon" required>
                            </div>
                        </div>
                        <div class="my-2 form-group">
                            <label for="desc">Deskripsi</label>
                            <textarea class="form-control" style="height: 8rem" name="desc" id="desc" rows="3" required placeholder="Deskripsi"></textarea>
                        </div>
                        <div class="my-2 form-group">
                            <label for="is_active">Status Produk</label>
                            <div id="is_active">

                            </div>
                        </div>
                        {{-- <div class="my-2 form-group">
                            <label for="image">Unggah Foto</label>
                            <small class="d-flex text-danger pb-1">*Unggah berupa foto produk</small>
                            <div>
                                <div class="tab-content" id="myTabContent2">
                                    <div class="tab-pane fade show active" id="home3" role="tabpanel"
                                        aria-labelledby="home-tab3">
                                        <div class="preview-image-edit"> </div>
                                        <div class="tab-content editFile" id="myTabContent2">

                                        </div>
                                        {{-- <img id="preview" class="img-fluid img-thumbnail image"
                                        src="{{ asset('stisla/assets/img/example-image.jpg') }}" alt="edukasi"
                                        style="width: 20rem; height: 10rem; -o-object-fit: cover; object-fit: cover; -o-object-position: center; object-position: center;"> --}}
                                    {{-- </div>
                                </div>
                            </div>
                            <input type="file" id="imagesEdit" name="images[]" multiple class="form-control" accept="image/*">
                        </div> --}}
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
                        <button type="submit" id="edit_employee_btn" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="addPhotoProduct" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Foto Produk</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="#" method="POST" id="addPhotoProductForm" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" id="id">
                    <input type="hidden" name="photoProduct" id="photoProduct">
                    <div class="modal-body p-4">
                        <input hidden type="text" name="name" id="namaProduct" class="form-control" placeholder="Nama" required>
                        <div class="form-group">
                            <label for="image">Unggah Foto</label>
                            <small class="d-flex text-danger pb-1">*Unggah berupa foto produk</small>
                            <div>
                                <div class="tab-content" id="myTabContent2">
                                    <div class="tab-pane fade show active" id="home3" role="tabpanel"
                                        aria-labelledby="home-tab3">
                                        <div class="preview-image-edit"> </div>
                                        {{-- <img id="preview" class="img-fluid img-thumbnail image"
                                        src="{{ asset('stisla/assets/img/example-image.jpg') }}" alt="edukasi"
                                        style="width: 20rem; height: 10rem; -o-object-fit: cover; object-fit: cover; -o-object-position: center; object-position: center;"> --}}
                                    </div>
                                </div>
                            </div>
                            <input type="file" id="imagesEdit" name="images[]" multiple class="form-control" accept="image/*">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
                        <button type="submit" id="addPhotoProductBtn" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="viewPhotoProduct" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Kelola Foto Produk</h5>
                    <button type="button" id="closeBtnPhoto" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body p-4">
                    <div class="form-group">
                        <div class="tab-content" id="myTabContent2">
                            <div class="tab-pane fade show active" id="home3" role="tabpanel"
                                aria-labelledby="home-tab3">
                                <div class="editFile"> </div>
                                {{-- <img id="preview" class="img-fluid img-thumbnail image"
                                        src="{{ asset('stisla/assets/img/example-image.jpg') }}" alt="edukasi"
                                style="width: 20rem; height: 10rem; -o-object-fit: cover; object-fit: cover;
                                -o-object-position: center; object-position: center;"> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('script')
    <!-- LIBARARY JS -->
    {{-- <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js'></script> --}}
    <script type="text/javascript" language="javascript"
        src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>

    <script type="text/javascript" language="javascript"
        src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"
        integrity="sha256-sPB0F50YUDK0otDnsfNHawYmA5M0pjjUf4TvRJkGFrI=" crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/js/iziToast.js"
        integrity="sha256-siqh9650JHbYFKyZeTEAhq+3jvkFCG8Iz+MHdr9eKrw=" crossorigin="anonymous"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- AKHIR LIBARARY JS -->

    <!-- JAVASCRIPT -->
    <script>
        $('.nameCheck').change(function(e) {
            $.get('{{ route('gapoktan-produk-checkSlug') }}',
            { 'name': $(this).val() },
                function( data ) {
                    $('.slugCheck').val(data.slug);
                }
            );
        });

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
            // Multiple images preview with JavaScript
            var multiImgPreview = function(input, imgPreviewPlaceholder) {
                if (input.files) {
                    var filesAmount = input.files.length;
                    for (i = 0; i < filesAmount; i++) {
                        var reader = new FileReader();
                        reader.onload = function(event) {
                            $($.parseHTML('<img>')).attr('src', event.target.result).appendTo(imgPreviewPlaceholder)
                        }
                        reader.readAsDataURL(input.files[i]);
                    }
                }
            };
            $('#images').on('change', function() {
                multiImgPreview(this, 'div.preview-image');
            });

            // Multiple images preview with JavaScript
            var multiImgPreviewEdit = function(input, imgPreviewPlaceholder) {
                if (input.files) {
                    var filesAmount = input.files.length;
                    for (i = 0; i < filesAmount; i++) {
                        var reader = new FileReader();
                        reader.onload = function(event) {
                            $($.parseHTML('<img>')).attr('src', event.target.result).appendTo(imgPreviewPlaceholder);
                        }
                        reader.readAsDataURL(input.files[i]);
                    }
                }
            };
            $('#imagesEdit').on('change', function() {
                multiImgPreviewEdit(this, 'div.preview-image-edit');
            });
        });

        $(function() {

            $("#viewPhotoProduct").on("hidden.bs.modal", function (e) {
                console.log("Modal hidden");
                $(".editFile").html("");
            });

            // add new employee ajax request
            $("#add_employee_form").submit(function(e) {
                e.preventDefault();
                var formData = new FormData(this);
                $("#add_employee_btn").text('Tunggu..');
                $("#add_employee_btn").prop('disabled', true);
                $.ajax({
                url: '{{ route('gapoktan-produk-store') }}',
                method: 'post',
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                dataType: 'json',
                success: function(response) {
                    if (response.status == 400) {
                        showError('name', response.messages.name);
                        showError('category_product_id', response.messages.category_product_id);
                        showError('stoke', response.messages.stoke);
                        showError('price', response.messages.price);
                        showError('desc', response.messages.desc);
                    } else if (response.status == 200){
                        Swal.fire(
                            'Menambahkan!',
                            'Produk Berhasil Ditambahkan!',
                            'success'
                        )
                        fetchAllEmployees();
                        $("#addEmployeeModal").modal('hide');
                        $("#add_employee_form")[0].reset();
                    }
                    $("#add_employee_btn").text('Simpan');
                    $("#add_employee_btn").prop('disabled', false);
                }
                });
            });

            // edit employee ajax request
            $(document).on('click', '.editIcon', function(e) {
                e.preventDefault();
                let id = $(this).attr('id');
                $.ajax({
                url: '{{ route('gapoktan-produk-edit') }}',
                method: 'get',
                data: {
                    id: id,
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    $("#name").val(response.name);
                    $("#category_product_id").val(response.category_product_id);
                    $("#stoke").val(response.stoke);
                    $("#weight").val(response.weight);
                    $("#discount").val(response.discount);
                    $("#price").val(response.price);
                    $("#desc").val(response.desc);
                    $("#is_active").html(
                        `<label class="custom-switch">
                            <input type="checkbox" name="is_active" ${response.is_active ? 'checked' : ''} class="custom-switch-input">
                            <span class="custom-switch-indicator"></span>
                        </label>`);
                    // if (response.file) {
                    //     $(".editFile").html(
                    //         `<div class="tab-pane fade show active" id="home2" role="tabpanel"
                    //             aria-labelledby="home-tab2">
                    //             <img id="preview" class="img-fluid img-thumbnail image"
                    //             src="../storage/edukasi/${response.photo_product}" alt="edukasi"
                    //             style="width: 20rem; height: 10rem; -o-object-fit: cover; object-fit: cover; -o-object-position: center; object-position: center;">
                    //         </div>
                    //         `);
                    // }
                    $("#emp_id").val(response.id);
                    $("#emp_avatar").val(response.photo_product);
                }
                });
            });

            // update employee ajax request
            $("#edit_employee_form").submit(function(e) {
                e.preventDefault();

                var formData = new FormData(this);
                $("#edit_employee_btn").text('Tunggu..');
                $("#edit_employee_btn").prop('disabled', true);
                $.ajax({
                url: '{{ route('gapoktan-produk-update') }}',
                method: 'post',
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                dataType: 'json',
                success: function(response) {
                    if (response.status == 400) {
                        showError('name', response.messages.name);
                        showError('category_product_id', response.messages.category_product_id);
                        showError('stoke', response.messages.stoke);
                        showError('price', response.messages.price);
                        showError('desc', response.messages.desc);
                        showError('images', response.messages.images);
                    } else if (response.status == 200){
                        Swal.fire(
                            'Menambahkan!',
                            'Produk Berhasil diperbarui!',
                            'success'
                        )
                        fetchAllEmployees();
                        $("#editEmployeeModal").modal('hide');
                        $("#edit_employee_form")[0].reset();
                    }
                    $("#edit_employee_btn").text('Simpan');
                    $("#edit_employee_btn").prop('disabled', false);
                }
                });
            });

            // delete employee ajax request
            $(document).on('click', '.deleteIcon', function(e) {
                e.preventDefault();
                let id = $(this).attr('id');
                let csrf = '{{ csrf_token() }}';
                Swal.fire({
                title: 'Apa kamu yakin?',
                text: "Anda tidak akan dapat mengembalikan ini!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, Hapus!',
                cancelButtonText: 'Cancel!'
                }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                    url: '{{ route('gapoktan-produk-delete') }}',
                    method: 'delete',
                    data: {
                        id: id,
                        _token: csrf
                    },
                    success: function(response) {
                        console.log(response);
                        Swal.fire(
                        'Dihapus!',
                        'File Anda telah dihapus.',
                        'success'
                        )
                        fetchAllEmployees();
                    }
                    });
                }
                })
            });

            // edit employee ajax request
            $(document).on('click', '.viewPhotoProductIcon', function(e) {
                e.preventDefault();
                let id = $(this).attr('id');
                $.ajax({
                url: '{{ route('gapoktan-produk-viewPhoto') }}',
                method: 'get',
                data: {
                    id: id,
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    var customHtml = '';
                    // if(response.success){
                    //     var response = response.success;
                    //     for (var i in response) {
                    //         customHtml = customHtml + '<div class="my-2 tab-pane fade show active" id="home2" role="tabpanel"aria-labelledby="home-tab2"><img id="preview" class="img-fluid img-thumbnail image" src="../storage/produk/'+ response[i].name +'" alt="edukasi" style="width: 22rem; height: 10rem; -o-object-fit: cover; object-fit: cover; -o-object-position: center; object-position: center;"><a href="#" id="'+ response[i].id +'" class="text-danger mx-1 deletePhotoProduct">Hapus</a></div>';
                    //     }
                    //     $('.editFile').html(customHtml)
                    // }
                    $.each(response, function (i, item) {
                        customHtml = customHtml + '<div class="my-2 tab-pane fade show active" id="home2" role="tabpanel"aria-labelledby="home-tab2"><img id="preview" class="img-fluid img-thumbnail image" src="../storage/produk/'+ response[i].name +'" alt="edukasi" style="width: 22rem; height: 10rem; -o-object-fit: cover; object-fit: cover; -o-object-position: center; object-position: center;"><a href="#" id="'+ response[i].id +'" class="text-danger mx-1 deletePhotoProduct">Hapus</a></div>';
                        })
                    $('.editFile').append(customHtml);
                }
                });
            });

            // delete employee ajax request
            $(document).on('click', '.deletePhotoProduct', function(e) {
                e.preventDefault();
                let id = $(this).attr('id');
                let csrf = '{{ csrf_token() }}';
                Swal.fire({
                title: 'Apa kamu yakin?',
                text: "Anda tidak akan dapat mengembalikan ini!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, Hapus!',
                cancelButtonText: 'Cancel!'
                }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                    url: '{{ route('gapoktan-produk-deletePhoto') }}',
                    method: 'delete',
                    data: {
                        id: id,
                        _token: csrf
                    },
                    success: function(response) {
                        console.log(response);
                        Swal.fire(
                        'Dihapus!',
                        'File Anda telah dihapus.',
                        'success'
                        )
                        $("#viewPhotoProduct").modal('hide');
                    }
                    });
                }
                })
            });

            // edit employee ajax request
            $(document).on('click', '.addPhotoProductIcon', function(e) {
                e.preventDefault();
                let id = $(this).attr('id');
                $.ajax({
                url: '{{ route('gapoktan-produk-addPhoto') }}',
                method: 'get',
                data: {
                    id: id,
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    $("#namaProduct").val(response.name);
                    $("#id").val(response.id);
                }
                });
            });

            // update employee ajax request
            $("#addPhotoProductForm").submit(function(e) {
                e.preventDefault();

                var formData = new FormData(this);
                let TotalImages = $('#imagesEdit')[0].files.length; //Total Images
                let images = $('#imagesEdit')[0];
                for (let i = 0; i < TotalImages; i++) {
                    formData.append('images' + i, images.files[i]);
                }
                formData.append('TotalImages', TotalImages);

                $("#addPhotoProductBtn").text('Tunggu..');
                $("#addPhotoProductBtn").prop('disabled', true);
                $.ajax({
                url: '{{ route('gapoktan-produk-addPhotoProduct') }}',
                method: 'post',
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                dataType: 'json',
                success: function(response) {
                    if (response.status == 400) {
                        showError('name', response.messages.photo_product.name);
                        $("#addPhotoProductForm")[0].reset();
                    } else if (response.status == 200){
                        Swal.fire(
                            'Menambahkan!',
                            'Foto Produk Berhasil ditambahkan!',
                            'success'
                        )
                        fetchAllEmployees();
                        $("#addPhotoProduct").modal('hide');
                        $("#addPhotoProductForm")[0].reset();
                    } else if (response.status == 401) {
                        Swal.fire(
                            'Gagal!',
                            'Silahkan coba lagi!',
                            'warning'
                        )
                        fetchAllEmployees();
                        $("#addPhotoProduct").modal('hide');
                        $("#addPhotoProductForm")[0].reset();
                        $("#addPhotoProductBtn").prop('disabled', false);
                    }
                    $('.preview-image-edit').html("");
                    $("#addPhotoProductBtn").text('Simpan');
                    $("#addPhotoProductBtn").prop('disabled', false);
                }
                });
            });

            // fetch all employees ajax request
            fetchAllEmployees();

            function fetchAllEmployees() {
                $.ajax({
                url: '{{ route('gapoktan-produk-fetchAll') }}',
                method: 'get',
                success: function(response) {
                    $("#show_all_employees").html(response);
                    $("table").DataTable({
                        order: [0, 'asc']
                    });
                }
                });
            }
        });

    </script>
@endsection
