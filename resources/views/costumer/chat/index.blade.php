@extends('costumer.template')
@section('title','Chat')

@section('content')
<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>@yield('title')</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="#">Components</a></div>
                <div class="breadcrumb-item">@yield('title')</div>
            </div>
        </div>

        <div class="section-body">
            <h2 class="section-title">@yield('title')</h2>
            <div class="card">
                <div class="mt-4 card-body row align-items-center justify-content-center">
                    <div class="col-12 col-sm-6 col-lg-5">
                        <div class="">
                            <div class="card-header">
                                <h4>Chat</h4>
                            </div>
                            <div class="card-body">
                                <ul class="list-unstyled list-unstyled-border">
                                    <li class="media">
                                        <img alt="image" class="mr-3 rounded-circle" width="50"
                                            src="{{ asset('stisla/assets/img/avatar/avatar-1.png') }}">
                                        <div class="media-body">
                                            <div class="mt-0 mb-1 font-weight-bold">Hasan Basri</div>
                                            <div class="text-success text-small font-600-bold">
                                                Apakah barang sudah ready?</div>
                                        </div>
                                    </li>
                                    <li class="media">
                                        <img alt="image" class="mr-3 rounded-circle" width="50"
                                            src="{{ asset('stisla/assets/img/avatar/avatar-2.png') }}">
                                        <div class="media-body">
                                            <div class="mt-0 mb-1 font-weight-bold">Bagus Dwi Cahya</div>
                                            <div class="text-success text-small font-600-bold">
                                                Apakah barang sudah ready?</div>
                                        </div>
                                    </li>
                                    <li class="media">
                                        <img alt="image" class="mr-3 rounded-circle" width="50"
                                            src="{{ asset('stisla/assets/img/avatar/avatar-3.png') }}">
                                        <div class="media-body">
                                            <div class="mt-0 mb-1 font-weight-bold">Wildan Ahdian</div>
                                            <div class="text-success text-small font-600-bold">
                                                Apakah barang sudah ready?</div>
                                        </div>
                                    </li>
                                    <li class="media">
                                        <img alt="image" class="mr-3 rounded-circle" width="50"
                                            src="{{ asset('stisla/assets/img/avatar/avatar-4.png') }}">
                                        <div class="media-body">
                                            <div class="mt-0 mb-1 font-weight-bold">Rizal Fakhri</div>
                                            <div class="text-success text-small font-600-bold">
                                                Apakah barang sudah ready?</div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-lg-7">
                        <div class="card chat-box" id="mychatbox2">
                            <div class="card-body card-header">
                                <h4><img alt="image" class="mr-3 rounded-circle" width="50"
                                        src="{{ asset('stisla/assets/img/avatar/avatar-1.png') }}">
                                    Hasan Basri</h4>
                            </div>
                            <div class="card-body chat-content">
                            </div>
                            <div class="card-footer chat-form">
                                <form id="chat-form2">
                                    <input type="text" class="form-control" placeholder="Type a message">
                                    <button class="btn btn-primary">
                                        <i class="far fa-paper-plane"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection