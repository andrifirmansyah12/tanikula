<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('img/Logo TaniKula.svg') }}" />
    {{-- <link rel="apple-touch-icon" sizes="76x76" href="{{asset('../costumer/assets/img/apple-icon.png')}}"> --}}
    {{-- <link rel="icon" type="image/png" href="{{asset('../costumer/assets/img/favicon.png')}}"> --}}
    <title>
        Tanikula | @yield('title')
    </title>

    @yield('style')
    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css"
        href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
    <!-- Nucleo Icons -->
    <link href="{{ asset('../costumer/assets/css/nucleo-icons.css') }}" rel="stylesheet" />
    <link href="{{ asset('../costumer/assets/css/nucleo-svg.css') }}" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset('css/LineIcons.3.0.css') }}" />
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
    <!-- CSS Files -->
    <link id="pagestyle" href="{{ asset('../costumer/assets/css/material-dashboard.css?v=3.0.') }}" rel="stylesheet" />

    {{-- <script src="https://www.gstatic.com/firebasejs/8.3.2/firebase-app.js"></script>
    <script src="https://www.gstatic.com/firebasejs/8.3.2/firebase-messaging.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script>
        // Your web app's Firebase configuration
        var firebaseConfig = {
            apiKey: "AIzaSyB_V08q4UmDxg0folXvu52K2pyWrCu1cRE",
            authDomain: "gapoktanapp.firebaseapp.com",
            projectId: "gapoktanapp",
            storageBucket: "gapoktanapp.appspot.com",
            messagingSenderId: "314161819154",
            appId: "1:314161819154:web:02ffebe39462bd7b8232cb",
            measurementId: "G-D6KMVM4LJ8"
        };
        // Initialize Firebase
        firebase.initializeApp(firebaseConfig);
    </script> --}}
    <style>
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
</head>
