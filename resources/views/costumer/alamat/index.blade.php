@extends('costumer.template')
@section('title','Daftar Alamat')

@section('style')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- MULAI STYLE CSS -->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
    <link rel='stylesheet'
        href='https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.5.0/font/bootstrap-icons.min.css' />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/css/iziToast.css"
        integrity="sha256-pODNVtK3uOhL8FUNWWvFQK0QoQoV3YA9wGGng6mbZ0E=" crossorigin="anonymous" />
    <!-- AKHIR STYLE CSS -->
    <style>
        input[type='file'] {
            opacity:0
        }
        /* 4.3 Page */
    .page-error {
        height: 100%;
        width: 100%;
        padding-top: 60px;
        padding-bottom: 60px;
        text-align: center;
        display: table;
    }

    .page-error .page-inner {
        display: table-cell;
        width: 100%;
        vertical-align: middle;
    }

    .page-error .page-description {
        padding-top: 30px;
        font-size: 18px;
        font-weight: 400;
        color: color: var(--primary);;
    }

    @media (max-width: 575.98px) {
        .page-error {
            padding-top: 0px;
        }
    }
    </style>
@endsection

@section('content')
<div class="container-fluid px-2 px-md-4 mb-5">
    <div class="page-header min-height-300 border-radius-xl mt-4"
        style="background-image: url('https://images.unsplash.com/photo-1531512073830-ba890ca4eba2?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1920&q=80');">
        <span class="mask bg-gradient-primary opacity-6"></span>
    </div>
    <div class="card card-body mx-3 mx-md-4 mt-n6">
        <div class="row gx-4 mb-2">
            <div class="col-auto">
                <div class="avatar avatar-xl position-relative">
                    @if ($userInfo->image)
                    <img id="image_preview" src="{{asset('../storage/profile/'. $userInfo->image)}}" alt="profile_image"
                        class="border-radius-lg shadow-sm" style="width: 92px; height: 72px; -o-object-fit: cover; object-fit: cover; -o-object-position: center; object-position: center;">
                    @else
                    <img id="image_preview" src="{{ asset('stisla/assets/img/example-image.jpg') }}" alt="profile_image"
                        class="border-radius-lg shadow-sm" style="width: 92px; height: 72px; -o-object-fit: cover; object-fit: cover; -o-object-position: center; object-position: center;">
                    @endif
                </div>
            </div>
            <div class="col-auto my-auto">
                <div class="h-100">
                    <h5 class="mb-1">
                        {{$userInfo->user->name}}
                    </h5>
                </div>
                <div>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input hidden" style="width: 0px;" accept="image/*" id="image" name="image">
                        <label class="custom-file-label" for="image"><i class="bi bi-camera h-4"></i> Ubah foto</label>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 my-sm-auto ms-sm-auto me-sm-0 mx-auto mt-3">
                <div class="nav-wrapper position-relative end-0">
                    <ul class="nav nav-fill p-1">
                        <li class="nav-item">
                            <a href="{{ route('pembeli') }}">
                                <span class="ms-1 fw-bold">Biodata Diri</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('pembeli.alamat') }}">
                                <span class="ms-1 fw-bold">Daftar Alamat</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="d-flex flex-row justify-content-end mt-4">
                {{-- <form action="{{ url('/pembeli/alamat') }}">
                    <div class="pt-2 input-group items-align-center justify-content-center">
                        <div class="form-outline">
                            <input class="typeahead form-control px-3 border" value="{{ request('pencarian') }}" name="pencarian"
                                placeholder="Cari alamat ..." style="font-size: 15px; border-color: #16A085;"
                                type="search" autocomplete="off">
                        </div>
                        <button type="submit" class="btn" style="background-color: #16A085; color: white">
                            <i class="bi bi-search"></i>
                        </button>
                    </div>
                </form> --}}
                <button type="button" class="btn btn-light border" data-bs-toggle="modal"
                    data-bs-target="#TambahAlamat" data-bs-dismiss="modal">
                    Tambah Alamat Baru
                </button>
            </div>
            <div class="col-12" id="show_all_employees">
                <div id="app">
                    <section class="section">
                        <div class="container">
                            <div class="page-error">
                                <div class="page-inner">
                                    <div class="page-description">
                                        Silahkan tunggu ..
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Edit Alamat -->
<div class="modal fade" id="EditAlamat" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Alamat</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="#" method="POST" id="edit_employee_form" enctype="multipart/form-data">
                    @csrf
                    <div>
                        <input type="hidden" name="emp_id" id="emp_id">
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Nama
                                Penerima:</label>
                            <input type="text" name="recipients_name" id="recipients_name" class="form-control border px-3"
                                id="recipient-name">
                        </div>
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">No. Hp:</label>
                            <input type="tel" name="telp" id="telp" class="form-control border px-3" id="recipient-name">
                        </div>
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Label Alamat:</label>
                            <input type="text" name="address_label" id="address_label" class="form-control border px-3"
                                id="recipient-name">
                            <small class="d-flex text-danger pb-1">*Contoh: Rumah, Kantor</small>
                        </div>
                        <div class="row">
                            <div class="mb-3 col-8">
                                <label for="recipient-name" class="col-form-label">Kec, Kab
                                    dan Provinsi:</label>
                                <input type="text" name="city" id="city" class="form-control border px-3" id="recipient-name">
                                <small class="d-flex text-danger pb-1">*Contoh: Kec Sindang, Kab Indramayu, Jawa
                                    Barat</small>
                            </div>
                            <div class="mb-3 col-4">
                                <label for="recipient-name" class="col-form-label">Kode Pos:</label>
                                <input type="text" name="postal_code" id="postal_code" class="form-control border px-3"
                                    id="recipient-name">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="message-text" class="col-form-label">Alamat Lengkap:</label>
                            <textarea class="form-control border px-3" name="complete_address" id="complete_address" rows="3"
                                id="message-text"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Catatan untuk
                                kurir:</label>
                            <input type="text" name="note_for_courier" id="note_for_courier" class="form-control border px-3"
                                id="recipient-name">
                            <small class="d-flex text-danger pb-1">Warna rumah, patokan, pesan khusus, dll.</small>
                        </div>
                        <div class="mb-3">
                            <div class="px-3 input-group-text bg-white" id="main_address">

                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
                        <button type="submit" id="edit_employee_btn" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal Tambah Alamat -->
<div class="modal fade" id="TambahAlamat" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tamabah Alamat Baru</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="#" method="POST" id="add_employee_form" accept-charset="utf-8"
                    enctype="multipart/form-data">
                    @csrf
                    <div>
                        <div class="mb-3">
                            <label for="recipients_name" class="col-form-label">Nama Penerima:</label>
                            <input type="text" name="recipients_name" class="form-control border px-3" id="recipient-name">
                        </div>
                        <div class="mb-3">
                            <label for="telp" class="col-form-label">No. Hp:</label>
                            <input type="tel" name="telp" class="form-control border px-3" id="recipient-name">
                        </div>
                        <div class="mb-3">
                            <label for="address_label" class="col-form-label">Label Alamat:</label>
                            <input type="text" name="address_label" class="form-control border px-3" id="recipient-name">
                            <small class="d-flex text-danger pb-1">*Contoh: Rumah, Kantor</small>
                        </div>
                        <div class="row">
                            <div class="mb-3 col-8">
                                <label for="city" class="col-form-label">Kec, Kab
                                    dan Provinsi:</label>
                                <input type="text" name="city" class="form-control border px-3" id="recipient-name">
                                <small class="d-flex text-danger pb-1">*Contoh: Kec Sindang, Kab Indramayu, Jawa
                                    Barat</small>
                            </div>
                            <div class="mb-3 col-4">
                                <label for="postal_code" class="col-form-label">Kode Pos:</label>
                                <input type="text" name="postal_code" class="form-control border px-3" id="recipient-name">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="complete_address" class="col-form-label">Alamat Lengkap:</label>
                            <textarea class="form-control border px-3" name="complete_address" rows="3"
                                id="message-text"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="note_for_courier" class="col-form-label">Catatan untuk kurir:</label>
                            <input type="text" name="note_for_courier" class="form-control border px-3" id="recipient-name">
                            <small class="d-flex text-danger pb-1">Warna rumah, patokan, pesan khusus, dll.</small>
                        </div>
                        <div class="mb-3">
                            <div class="px-3 input-group-text bg-white">
                                <input class="form-check-input mt-0" type="checkbox" name="main_address">
                                <span class="px-3">Jadikan Alamat Utama</span>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
                        <button type="submit" id="add_employee_btn" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
    <!-- LIBARARY JS -->
    <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
    <script type="text/javascript" language="javascript"
        src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>

    <script type="text/javascript" language="javascript"
        src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"
        integrity="sha256-sPB0F50YUDK0otDnsfNHawYmA5M0pjjUf4TvRJkGFrI=" crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/js/iziToast.js"
        integrity="sha256-siqh9650JHbYFKyZeTEAhq+3jvkFCG8Iz+MHdr9eKrw=" crossorigin="anonymous"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.1/bootstrap3-typeahead.min.js"></script>

    <!-- AKHIR LIBARARY JS -->

    <!-- JAVASCRIPT -->
    <script>
    // var path = "{{ route('alamat.autocomplete')  }}";
    // $('input.typeahead').typeahead({
    //     source: function (query, process) {
    //         return $.get(path, {
    //             term: query
    //         }, function (data) {
    //             return process(data);
    //         });
    //     }
    // });

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

        // add new employee ajax request
            $("#add_employee_form").submit(function(e) {
                e.preventDefault();
                var formData = new FormData(this);
                $("#add_employee_btn").text('Tunggu..');
                $("#add_employee_btn").prop('disabled', true);
                $.ajax({
                url: '{{ route('add.pembeli.alamat') }}',
                method: 'post',
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                dataType: 'json',
                success: function(response) {
                    if (response.status == 400) {
                        showError('recipients_name', response.messages.recipients_name);
                        showError('telp', response.messages.telp);
                        showError('address_label', response.messages.address_label);
                        showError('postal_code', response.messages.postal_code);
                        showError('complete_address', response.messages.complete_address);
                        showError('note_for_courier', response.messages.note_for_courier);
                    } else if (response.status == 200){
                        Swal.fire(
                            'Menambahkan!',
                            'Alamat Berhasil Ditambahkan!',
                            'success'
                        )
                        fetchAllEmployees();
                        $("#TambahAlamat").modal('hide');
                        $("#add_employee_form")[0].reset();
                    }
                    $("#add_employee_btn").text('Simpan');
                    $("#add_employee_btn").prop('disabled', false);
                    window.location.reload();
                }
                });
            });

        // edit employee ajax request
        $(document).on('click', '.editAlamat', function (e) {
            e.preventDefault();
            let id = $(this).attr('id');
            $.ajax({
                url: '{{ route('edit.pembeli.alamat') }}',
                method: 'get',
                data: {
                    id: id,
                    _token: '{{ csrf_token() }}'
                },
                success: function (response) {
                    $("#recipients_name").val(response.recipients_name);
                    $("#telp").val(response.telp);
                    $("#address_label").val(response.address_label);
                    $("#city").val(response.city);
                    $("#postal_code").val(response.postal_code);
                    $("#complete_address").val(response.complete_address);
                    $("#note_for_courier").val(response.note_for_courier);
                    $("#main_address").html(`
                        <input class="form-check-input mt-0" type="checkbox" ${response.main_address ? 'checked' : ''} name="main_address">
                        <span class="px-3">Jadikan Alamat Utama</span>
                    `);
                    $("#emp_id").val(response.id);
                }
            });
        });

        // update employee ajax request
        $("#edit_employee_form").submit(function (e) {
            e.preventDefault();

            var formData = new FormData(this);
            $("#edit_employee_btn").text('Tunggu..');
            $("#edit_employee_btn").prop('disabled', true);
            $.ajax({
                url: '{{ route('update.pembeli.alamat') }}',
                method: 'post',
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                dataType: 'json',
                success: function (response) {
                    if (response.status == 400) {
                        showError('recipients_name', response.messages.recipients_name);
                        showError('telp', response.messages.telp);
                        showError('address_label', response.messages.address_label);
                        showError('postal_code', response.messages.postal_code);
                        showError('complete_address', response.messages.complete_address);
                        showError('note_for_courier', response.messages.note_for_courier);
                    } else if (response.status == 200) {
                        Swal.fire(
                            'Memperbarui!',
                            'Alamat Berhasil diperbarui!',
                            'success'
                        )
                        fetchAllEmployees();
                        $("#EditAlamat").modal('hide');
                        $("#edit_employee_form")[0].reset();
                    }
                    $("#edit_employee_btn").text('Simpan');
                    $("#edit_employee_btn").prop('disabled', false);
                    window.location.reload();
                }
            });
        });

        // fetch all employees ajax request
        fetchAllEmployees();

        function fetchAllEmployees() {
            $.ajax({
            url: '{{ route('pembeli.alamat.fetchAll') }}',
            method: 'get',
            success: function(response) {
                $("#show_all_employees").html(response);
            }
            });
        }
    });
    </script>
@endsection
