@extends('costumer.template')
@section('title','Chat')

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

    .costum-color {
        background-image: linear-gradient(195deg, #EC407A 0%, #D81B60 100%);
    }
    </style>
@endsection

@section('content')
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card my-4" id="tabs">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-primary shadow-primary border-radius-lg pt-4 pb-3">
                        <h6 class="text-white text-capitalize ps-3">@yield('title')</h6>
                    </div>
                </div>
                <section>
                    <div class="container py-5">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card" id="chat3" style="border-radius: 15px;">
                                    <div class="row">
                                            <div class="col-md-6 col-lg-5 col-xl-4 mb-4 mb-md-0">
                                                <div class="p-3">
                                                    <div class="input-group rounded mb-3">
                                                        <input type="search" class="form-control rounded"
                                                            placeholder="Search" aria-label="Search"
                                                            aria-describedby="search-addon" />
                                                        <span class="input-group-text border-0" id="search-addon">
                                                            <i class="fas fa-search"></i>
                                                        </span>
                                                    </div>
                                                    <div>
                                                        <ul class="list-unstyled mb-0">
                                                            <li class="p-2 border-bottom">
                                                                <a href="#!" class="d-flex justify-content-between">
                                                                    <div class="d-flex flex-row">
                                                                        <div>
                                                                            <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava1-bg.webp"
                                                                                alt="avatar"
                                                                                class="d-flex align-self-center me-3"
                                                                                width="60">
                                                                            <span
                                                                                class="badge bg-success badge-dot"></span>
                                                                        </div>
                                                                        <div class="pt-1">
                                                                            <p class="fw-bold mb-0">Marie Horwitz</p>
                                                                            <p class="small text-muted">Hello, Are you
                                                                                there?</p>
                                                                        </div>
                                                                    </div>
                                                                    <div class="pt-1">
                                                                        <p class="small text-muted mb-1">Just now</p>
                                                                        <span
                                                                            class="badge bg-danger rounded-pill float-end">3</span>
                                                                    </div>
                                                                </a>
                                                            </li>
                                                            <li class="p-2 border-bottom">
                                                                <a href="#!" class="d-flex justify-content-between">
                                                                    <div class="d-flex flex-row">
                                                                        <div>
                                                                            <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava2-bg.webp"
                                                                                alt="avatar"
                                                                                class="d-flex align-self-center me-3"
                                                                                width="60">
                                                                            <span
                                                                                class="badge bg-warning badge-dot"></span>
                                                                        </div>
                                                                        <div class="pt-1">
                                                                            <p class="fw-bold mb-0">Alexa Chung</p>
                                                                            <p class="small text-muted">Lorem ipsum
                                                                                dolor sit.</p>
                                                                        </div>
                                                                    </div>
                                                                    <div class="pt-1">
                                                                        <p class="small text-muted mb-1">5 mins ago</p>
                                                                        <span
                                                                            class="badge bg-danger rounded-pill float-end">2</span>
                                                                    </div>
                                                                </a>
                                                            </li>
                                                            <li class="p-2 border-bottom">
                                                                <a href="#!" class="d-flex justify-content-between">
                                                                    <div class="d-flex flex-row">
                                                                        <div>
                                                                            <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava3-bg.webp"
                                                                                alt="avatar"
                                                                                class="d-flex align-self-center me-3"
                                                                                width="60">
                                                                            <span
                                                                                class="badge bg-success badge-dot"></span>
                                                                        </div>
                                                                        <div class="pt-1">
                                                                            <p class="fw-bold mb-0">Danny McChain</p>
                                                                            <p class="small text-muted">Lorem ipsum
                                                                                dolor sit.</p>
                                                                        </div>
                                                                    </div>
                                                                    <div class="pt-1">
                                                                        <p class="small text-muted mb-1">Yesterday</p>
                                                                    </div>
                                                                </a>
                                                            </li>
                                                            <li class="p-2 border-bottom">
                                                                <a href="#!" class="d-flex justify-content-between">
                                                                    <div class="d-flex flex-row">
                                                                        <div>
                                                                            <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava4-bg.webp"
                                                                                alt="avatar"
                                                                                class="d-flex align-self-center me-3"
                                                                                width="60">
                                                                            <span
                                                                                class="badge bg-danger badge-dot"></span>
                                                                        </div>
                                                                        <div class="pt-1">
                                                                            <p class="fw-bold mb-0">Ashley Olsen</p>
                                                                            <p class="small text-muted">Lorem ipsum
                                                                                dolor sit.</p>
                                                                        </div>
                                                                    </div>
                                                                    <div class="pt-1">
                                                                        <p class="small text-muted mb-1">Yesterday</p>
                                                                    </div>
                                                                </a>
                                                            </li>
                                                            <li class="p-2 border-bottom">
                                                                <a href="#!" class="d-flex justify-content-between">
                                                                    <div class="d-flex flex-row">
                                                                        <div>
                                                                            <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava5-bg.webp"
                                                                                alt="avatar"
                                                                                class="d-flex align-self-center me-3"
                                                                                width="60">
                                                                            <span
                                                                                class="badge bg-warning badge-dot"></span>
                                                                        </div>
                                                                        <div class="pt-1">
                                                                            <p class="fw-bold mb-0">Kate Moss</p>
                                                                            <p class="small text-muted">Lorem ipsum
                                                                                dolor sit.</p>
                                                                        </div>
                                                                    </div>
                                                                    <div class="pt-1">
                                                                        <p class="small text-muted mb-1">Yesterday</p>
                                                                    </div>
                                                                </a>
                                                            </li>
                                                            <li class="p-2">
                                                                <a href="#!" class="d-flex justify-content-between">
                                                                    <div class="d-flex flex-row">
                                                                        <div>
                                                                            <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava6-bg.webp"
                                                                                alt="avatar"
                                                                                class="d-flex align-self-center me-3"
                                                                                width="60">
                                                                            <span
                                                                                class="badge bg-success badge-dot"></span>
                                                                        </div>
                                                                        <div class="pt-1">
                                                                            <p class="fw-bold mb-0">Ben Smith</p>
                                                                            <p class="small text-muted">Lorem ipsum
                                                                                dolor sit.</p>
                                                                        </div>
                                                                    </div>
                                                                    <div class="pt-1">
                                                                        <p class="small text-muted mb-1">Yesterday</p>
                                                                    </div>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-6 col-lg-7 col-xl-8">
                                                <div class="pt-3 pe-3 overflow-auto sticky-top"
                                                    style="position: relative; height: 580px">
                                                    <div class="d-flex justify-content-between mb-4">
                                                        <img src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/avatar-6.webp"
                                                            alt="avatar"
                                                            class="rounded-circle d-flex align-self-start me-3 shadow-1-strong"
                                                            width="60">
                                                        <div class="card">
                                                            <div class="card-header d-flex justify-content-between p-3">
                                                                <p class="fw-bold mb-0">Brad Pitt</p>
                                                                <p class="text-muted small mb-0"><i
                                                                        class="far fa-clock"></i> 12 mins ago</p>
                                                            </div>
                                                            <div class="card-body">
                                                                <p class="mb-0">
                                                                    Lorem ipsum dolor sit amet, consectetur adipiscing
                                                                    elit, sed do eiusmod tempor incididunt ut
                                                                    labore et dolore magna aliqua.
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex justify-content-between mb-4">
                                                        <div class="card w-100">
                                                            <div class="card-header d-flex justify-content-between p-3">
                                                                <p class="fw-bold mb-0">Lara Croft</p>
                                                                <p class="text-muted small mb-0"><i
                                                                        class="far fa-clock"></i> 13 mins ago</p>
                                                            </div>
                                                            <div class="card-body">
                                                                <p class="mb-0">
                                                                    Sed ut perspiciatis unde omnis iste natus error sit
                                                                    voluptatem accusantium doloremque
                                                                    laudantium.
                                                                </p>
                                                            </div>
                                                        </div>
                                                        <img src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/avatar-5.webp"
                                                            alt="avatar"
                                                            class="rounded-circle d-flex align-self-start ms-3 shadow-1-strong"
                                                            width="60">
                                                    </div>
                                                    <div class="d-flex justify-content-between mb-4">
                                                        <img src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/avatar-6.webp"
                                                            alt="avatar"
                                                            class="rounded-circle d-flex align-self-start me-3 shadow-1-strong"
                                                            width="60">
                                                        <div class="card">
                                                            <div class="card-header d-flex justify-content-between p-3">
                                                                <p class="fw-bold mb-0">Brad Pitt</p>
                                                                <p class="text-muted small mb-0"><i
                                                                        class="far fa-clock"></i> 10 mins ago</p>
                                                            </div>
                                                            <div class="card-body">
                                                                <p class="mb-0">
                                                                    Lorem ipsum dolor sit amet, consectetur adipiscing
                                                                    elit, sed do eiusmod tempor incididunt ut
                                                                    labore et dolore magna aliqua.
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div
                                                    class="text-muted d-flex justify-content-start align-items-center pe-3 pt-3 mt-2">
                                                    <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava6-bg.webp"
                                                        alt="avatar 3" style="width: 40px; height: 100%;">
                                                    <input type="text" class="form-control form-control-lg"
                                                        id="exampleFormControlInput2" placeholder="Ketikan Pesan...">
                                                    <a class="ms-1 text-muted" href="#!"><i
                                                            class="fas fa-paperclip"></i></a>
                                                    <a class="ms-3 text-muted" href="#!"><i
                                                            class="fas fa-smile"></i></a>
                                                    <a class="ms-3" href="#!"><i class="fas fa-paper-plane"></i></a>
                                                </div>

                                            </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
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

    </script>
@endsection
