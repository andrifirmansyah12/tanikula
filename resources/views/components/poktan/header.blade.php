<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Poktan | @yield('title')</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('img/Logo TaniKula.svg') }}" />

    @yield('style')

    <!-- General CSS Files -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    {{-- <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
        integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous"> --}}

    <!-- CSS Libraries -->
    {{-- <link rel="stylesheet" href="../node_modules/jqvmap/dist/jqvmap.min.css">
    <link rel="stylesheet" href="../node_modules/weathericons/css/weather-icons.min.css">
    <link rel="stylesheet" href="../node_modules/weathericons/css/weather-icons-wind.min.css">
    <link rel="stylesheet" href="../node_modules/summernote/dist/summernote-bs4.css"> --}}

    <style>
        /* 4.3 Page */
        .page-error-notification {
            height: 100%;
            width: 100%;
            padding-top: 60px;
            text-align: center;
            display: table;
        }

        .page-error-notification .page-inner-notification {
            display: table-cell;
            width: 100%;
            vertical-align: middle;
        }

        .page-error-notification img {
            width: 10rem;
        }

        .page-error-notification .page-description-notification {
            padding-top: 30px;
            font-size: 18px;
            font-weight: 400;
            color: color: var(--primary);;
        }

        @media (max-width: 575.98px) {
            .page-error-notification {
                padding-top: 0px;
            }
        }

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

        .page-error img {
            width: 10rem;
        }

        .page-error .page-description {
            padding-top: 30px;
            font-size: 18px;
            font-weight: 400;
            color: color: var(--primary);;
        }

        .spinner-loader {
            font-size: 28px;
            position: relative;
            display: inline-block;
        }

        .spinner-loader .spinner-center {
            position: absolute;
            left: 0;
            right: 0;
            top: 0;
            bottom: 0;
            margin: auto;
        }

        .spinner-loader .spinner-loader-blade {
            position: absolute;
            left: 0.4629em;
            bottom: 0;
            width: 0.074em;
            height: 0.2777em;
            border-radius: 0.0555em;
            background-color: transparent;
            -webkit-transform-origin: center -0.2222em;
            -ms-transform-origin: center -0.2222em;
            transform-origin: center -0.2222em;
            animation: spinner-loader-fade9234 1s infinite linear;
        }

        .spinner-loader .spinner-loader-blade:nth-child(1) {
            -webkit-animation-delay: 0s;
            animation-delay: 0s;
            -webkit-transform: rotate(0deg);
            -ms-transform: rotate(0deg);
            transform: rotate(0deg);
        }

        .spinner-loader .spinner-loader-blade:nth-child(2) {
            -webkit-animation-delay: 0.083s;
            animation-delay: 0.083s;
            -webkit-transform: rotate(30deg);
            -ms-transform: rotate(30deg);
            transform: rotate(30deg);
        }

        .spinner-loader .spinner-loader-blade:nth-child(3) {
            -webkit-animation-delay: 0.166s;
            animation-delay: 0.166s;
            -webkit-transform: rotate(60deg);
            -ms-transform: rotate(60deg);
            transform: rotate(60deg);
        }

        .spinner-loader .spinner-loader-blade:nth-child(4) {
            -webkit-animation-delay: 0.249s;
            animation-delay: 0.249s;
            -webkit-transform: rotate(90deg);
            -ms-transform: rotate(90deg);
            transform: rotate(90deg);
        }

        .spinner-loader .spinner-loader-blade:nth-child(5) {
            -webkit-animation-delay: 0.332s;
            animation-delay: 0.332s;
            -webkit-transform: rotate(120deg);
            -ms-transform: rotate(120deg);
            transform: rotate(120deg);
        }

        .spinner-loader .spinner-loader-blade:nth-child(6) {
            -webkit-animation-delay: 0.415s;
            animation-delay: 0.415s;
            -webkit-transform: rotate(150deg);
            -ms-transform: rotate(150deg);
            transform: rotate(150deg);
        }

        .spinner-loader .spinner-loader-blade:nth-child(7) {
            -webkit-animation-delay: 0.498s;
            animation-delay: 0.498s;
            -webkit-transform: rotate(180deg);
            -ms-transform: rotate(180deg);
            transform: rotate(180deg);
        }

        .spinner-loader .spinner-loader-blade:nth-child(8) {
            -webkit-animation-delay: 0.581s;
            animation-delay: 0.581s;
            -webkit-transform: rotate(210deg);
            -ms-transform: rotate(210deg);
            transform: rotate(210deg);
        }

        .spinner-loader .spinner-loader-blade:nth-child(9) {
            -webkit-animation-delay: 0.664s;
            animation-delay: 0.664s;
            -webkit-transform: rotate(240deg);
            -ms-transform: rotate(240deg);
            transform: rotate(240deg);
        }

        .spinner-loader .spinner-loader-blade:nth-child(10) {
            -webkit-animation-delay: 0.747s;
            animation-delay: 0.747s;
            -webkit-transform: rotate(270deg);
            -ms-transform: rotate(270deg);
            transform: rotate(270deg);
        }

        .spinner-loader .spinner-loader-blade:nth-child(11) {
            -webkit-animation-delay: 0.83s;
            animation-delay: 0.83s;
            -webkit-transform: rotate(300deg);
            -ms-transform: rotate(300deg);
            transform: rotate(300deg);
        }

        .spinner-loader .spinner-loader-blade:nth-child(12) {
            -webkit-animation-delay: 0.913s;
            animation-delay: 0.913s;
            -webkit-transform: rotate(330deg);
            -ms-transform: rotate(330deg);
            transform: rotate(330deg);
        }

        @keyframes spinner-loader-fade9234 {
            0% {
                background-color: #69717d;
            }

            100% {
                background-color: transparent;
            }
        }
    </style>

    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/components.css') }}">
</head>
