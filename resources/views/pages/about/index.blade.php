@extends('pages.template3')
@section('title', 'Tentang Kami')

@section('style')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css"
        integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        .text-blk {
            margin-top: 0px;
            margin-right: 0px;
            margin-bottom: 0px;
            margin-left: 0px;
            line-height: 25px;
            padding-top: 0px;
            padding-right: 0px;
            padding-bottom: 0px;
            padding-left: 0px;
        }

        .responsive-cell-block {
            min-height: 75px;
        }

        .responsive-container-block {
            min-height: 75px;
            height: fit-content;
            width: 100%;
            padding-top: 10px;
            padding-right: 10px;
            padding-bottom: 10px;
            padding-left: 10px;
            display: flex;
            flex-wrap: wrap;
            margin-top: 0px;
            margin-right: auto;
            margin-bottom: 0px;
            margin-left: auto;
            justify-content: flex-start;
        }

        .responsive-container-block.bigContainer {
            padding-top: 0px;
            padding-right: 50px;
            padding-bottom: 0px;
            padding-left: 50px;
            margin-top: 80px;
            margin-right: 0px;
            margin-bottom: 80px;
            margin-left: 0px;
        }

        .responsive-container-block.Container {
            max-width: 1320px;
            justify-content: space-evenly;
            align-items: center;
            padding-top: 10px;
            padding-right: 10px;
            padding-bottom: 0px;
            padding-left: 10px;
            position: relative;
            overflow-x: hidden;
            overflow-y: hidden;
            margin-top: 0px;
            margin-right: auto;
            margin-bottom: 0px;
            margin-left: auto;
        }

        .mainImg {
            width: 100%;
            height: 800px;
            object-fit: cover;
        }

        .blueDots {
            position: absolute;
            top: 150px;
            right: 15%;
            z-index: -1;
            left: auto;
            width: 80%;
            height: 500px;
            object-fit: cover;
        }

        .imgContainer {
            position: relative;
            width: 48%;
        }

        .responsive-container-block.textSide {
            width: 48%;
            padding-top: 0px;
            padding-right: 0px;
            padding-bottom: 0px;
            padding-left: 0px;
            z-index: 100;
        }

        .text-blk.heading {
            color: #16A085;
            font-size: 36px;
            line-height: 40px;
            font-weight: 700;
            margin-top: 0px;
            margin-right: 0px;
            margin-bottom: 20px;
            margin-left: 0px;
        }

        .text-blk.subHeading {
            font-size: 18px;
            line-height: 26px;
            margin-top: 0px;
            margin-right: 0px;
            margin-bottom: 20px;
            margin-left: 0px;
        }

        .cardImg {
            padding: 5px;
        }

        .cardImgContainer {
            padding-top: 20px;
            padding-right: 20px;
            padding-bottom: 20px;
            padding-left: 20px;
            border-top-width: 1px;
            border-right-width: 1px;
            border-bottom-width: 1px;
            border-left-width: 1px;
            border-top-style: solid;
            border-right-style: solid;
            border-bottom-style: solid;
            border-left-style: solid;
            border-top-color: rgb(229, 229, 229);
            border-right-color: rgb(229, 229, 229);
            border-bottom-color: rgb(229, 229, 229);
            border-left-color: rgb(229, 229, 229);
            border-image-source: initial;
            border-image-slice: initial;
            border-image-width: initial;
            border-image-outset: initial;
            border-image-repeat: initial;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
            border-bottom-right-radius: 10px;
            border-bottom-left-radius: 10px;
            margin-top: 0px;
            margin-right: 10px;
            margin-bottom: 0px;
            margin-left: 0px;
        }

        .responsive-cell-block.wk-desk-6.wk-ipadp-6.wk-tab-12.wk-mobile-12 {
            display: flex;
            justify-content: start;
            align-items: center;
        }

        .text-blk.cardHeading {
            font-size: 18px;
            line-height: 28px;
            font-weight: 700;
            margin-top: 0px;
            margin-right: 0px;
            margin-bottom: 10px;
            margin-left: 0px;
        }

        .text-blk.cardSubHeading {
            color: rgb(153, 153, 153);
            line-height: 22px;
        }

        .explore {
            font-size: 18px;
            line-height: 20px;
            font-weight: 700;
            color: white;
            background-color: rgb(244, 152, 146);
            box-shadow: rgba(244, 152, 146, 0.25) 0px 10px 20px;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
            border-bottom-right-radius: 10px;
            border-bottom-left-radius: 10px;
            cursor: pointer;
            border-top-width: 0px;
            border-right-width: 0px;
            border-bottom-width: 0px;
            border-left-width: 0px;
            border-top-style: initial;
            border-right-style: initial;
            border-bottom-style: initial;
            border-left-style: initial;
            border-top-color: initial;
            border-right-color: initial;
            border-bottom-color: initial;
            border-left-color: initial;
            border-image-source: initial;
            border-image-slice: initial;
            border-image-width: initial;
            border-image-outset: initial;
            border-image-repeat: initial;
            padding-top: 17px;
            padding-right: 40px;
            padding-bottom: 17px;
            padding-left: 40px;
        }

        .explore:hover {
            background-image: initial;
            background-position-x: initial;
            background-position-y: initial;
            background-size: initial;
            background-repeat-x: initial;
            background-repeat-y: initial;
            background-attachment: initial;
            background-origin: initial;
            background-clip: initial;
            background-color: rgb(244, 182, 176);
        }

        #ixvck {
            margin-top: 60px;
            margin-right: 0px;
            margin-bottom: 0px;
            margin-left: 0px;
        }

        .redDots {
            opacity: 50%;
            position: absolute;
            bottom: -350px;
            right: -100px;
            height: 500px;
            width: 400px;
            object-fit: cover;
            top: auto;
        }

        @media (max-width: 1024px) {
            .responsive-container-block.Container {
                position: relative;
                align-items: flex-start;
                justify-content: center;
            }

            .mainImg {
                bottom: 0px;
            }

            .imgContainer {
                position: absolute;
                bottom: 0px;
                left: 0px;
                height: auto;
                width: 60%;
            }

            .responsive-container-block.textSide {
                margin-top: 0px;
                margin-right: 0px;
                margin-bottom: 0px;
                margin-left: auto;
                width: 70%;
            }

            .responsive-container-block.Container {
                flex-direction: column-reverse;
            }

            .imgContainer {
                position: relative;
                width: auto;
                margin-top: 0px;
                margin-right: auto;
                margin-bottom: 0px;
                margin-left: auto;
            }

            .responsive-container-block.textSide {
                margin-top: 0px;
                margin-right: 0px;
                margin-bottom: 20px;
                margin-left: 0px;
                width: 100%;
            }

            .responsive-container-block.Container {
                flex-direction: row-reverse;
            }

            .responsive-container-block.Container {
                flex-direction: column-reverse;
            }
        }

        @media (max-width: 768px) {
            .responsive-container-block.textSide {
                width: 100%;
                align-items: center;
                flex-direction: column;
                justify-content: center;
            }

            .responsive-cell-block.wk-desk-6.wk-ipadp-6.wk-tab-12.wk-mobile-12 {
                margin-left: 25%;
                margin-right: 25%;
            }

            .text-blk.subHeading {
                text-align: center;
                font-size: 17px;
                max-width: 520px;
            }

            .text-blk.heading {
                text-align: center;
            }

            .imgContainer {
                opacity: 0.8;
            }

            .imgContainer {
                height: 500px;
            }

            .imgContainer {
                width: 30px;
            }

            .responsive-container-block.Container {
                flex-direction: column-reverse;
            }

            .responsive-container-block.Container {
                flex-wrap: nowrap;
            }

            .responsive-container-block.textSide {
                width: 100%;
                margin-top: 0px;
                margin-right: 0px;
                margin-bottom: 20px;
                margin-left: 0px;
            }

            .imgContainer {
                width: 90%;
            }

            .imgContainer {
                height: 450px;
                margin-top: 5px;
                margin-right: 33.9062px;
                margin-bottom: 0px;
                margin-left: 33.9062px;
            }

            .redDots {
                display: none;
            }

            .explore {
                font-size: 16px;
                line-height: 14px;
            }
        }

        @media (max-width: 500px) {
            .imgContainer {
                position: static;
                height: 450px;
            }

            .mainImg {
                height: 100%;
            }

            .blueDots {
                width: 100%;
                left: 0px;
                top: 0px;
                bottom: auto;
                right: auto;
            }

            .imgContainer {
                width: 100%;
            }

            .responsive-container-block.textSide {
                margin-top: 0px;
                margin-right: 0px;
                margin-bottom: 0px;
                margin-left: 0px;
            }

            .responsive-container-block.Container {
                padding-top: 0px;
                padding-right: 0px;
                padding-bottom: 0px;
                padding-left: 0px;
                overflow-x: visible;
                overflow-y: visible;
            }

            .responsive-container-block.bigContainer {
                padding-top: 10px;
                padding-right: 20px;
                padding-bottom: 10px;
                padding-left: 20px;
                padding: 0 30px 0 30px;
                margin-top: 25px;
                margin-bottom: 50px
            }

            .redDots {
                display: none;
            }

            .text-blk.subHeading {
                font-size: 16px;
                line-height: 23px;
            }

            .text-blk.heading {
                font-size: 28px;
                line-height: 28px;
            }

            .responsive-container-block.textSide {
                margin-top: 40px;
                margin-right: 0px;
                margin-bottom: 50px;
                margin-left: 0px;
            }

            .imgContainer {
                margin-top: 5px;
                margin-right: auto;
                margin-bottom: 0px;
                margin-left: auto;
                width: 100%;
                position: relative;
            }

            .explore {
                padding-top: 17px;
                padding-right: 0px;
                padding-bottom: 17px;
                padding-left: 0px;
                width: 100%;
            }

            #ixvck {
                width: 90%;
                margin-top: 40px;
                margin-right: 0px;
                margin-bottom: 0px;
                margin-left: 0px;
                font-size: 15px;
            }

            .blueDots {
                bottom: 0px;
                width: 100%;
                height: 80%;
                top: 10%;
            }

            .text-blk.cardHeading {
                font-size: 16px;
                margin-top: 0px;
                margin-right: 0px;
                margin-bottom: 8px;
                margin-left: 0px;
                line-height: 25px;
            }

            .responsive-cell-block.wk-desk-6.wk-ipadp-6.wk-tab-12.wk-mobile-12 {
                margin-left: 0%;
                margin-right: 0%;
            }
        }
    </style>
@endsection

@section('content')
    <div class="responsive-container-block bigContainer">
        <div class="responsive-container-block Container">
            <div class="imgContainer">
                <img class="blueDots rounded" src="{{ asset('img/T a n i k u l a.png')}}">
                <img class="mainImg rounded" src="{{ asset('img/T a n i k u l a.png')}}">
            </div>
            <div class="responsive-container-block textSide">
                <p class="text-blk heading">
                    Tentang Kami
                </p>
                <p class="text-blk subHeading">
                    Tanikula merupakan sebuah platform yang menyediakan pengalaman berbelanja online produk hasil tani organik yang mudah, aman, dan cepat bagi pelanggan melalui dukungan pembayaran yang efisien dan kuat. Kami percaya bahwa kegiatan belanja online harus terjangkau, mudah, dan menyenangkan.
                </p>
                <div class="row">
                    <div class="responsive-cell-block wk-desk-6 wk-ipadp-6 wk-tab-12 wk-mobile-12">
                        <div class="cardImgContainer">
                            <i class="fa-regular fa-envelope fa-2xl cardImg"></i>
                        </div>
                        <div class="cardText">
                            <p class="text-blk cardHeading">
                                Email
                            </p>
                            <p class="text-blk cardSubHeading">
                                tanikula.app@gmail.com
                            </p>
                        </div>
                    </div>
                    <div class="responsive-cell-block wk-desk-6 wk-ipadp-6 wk-tab-12 wk-mobile-12">
                        <div class="cardImgContainer">
                            <i class="fa-brands fa-instagram fa-2xl cardImg"></i>
                        </div>
                        <div class="cardText">
                            <p class="text-blk cardHeading">
                                Instagram
                            </p>
                            <p class="text-blk cardSubHeading">
                                tanikulaapp
                            </p>
                        </div>
                    </div>
                    <div class="responsive-cell-block wk-desk-6 wk-ipadp-6 wk-tab-12 wk-mobile-12">
                        <div class="cardImgContainer">
                            <i class="fa-brands fa-facebook fa-2xl cardImg"></i>
                        </div>
                        <div class="cardText">
                            <p class="text-blk cardHeading">
                                Facebook
                            </p>
                            <p class="text-blk cardSubHeading">
                                Tanikula App
                            </p>
                        </div>
                    </div>
                    <div class="responsive-cell-block wk-desk-6 wk-ipadp-6 wk-tab-12 wk-mobile-12">
                        <div class="cardImgContainer">
                            <i class="fa-brands fa-tiktok fa-2xl cardImg"></i>
                        </div>
                        <div class="cardText">
                            <p class="text-blk cardHeading">
                                Tiktok
                            </p>
                            <p class="text-blk cardSubHeading">
                                Tanikula App
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <img class="redDots" src="{{ asset('img/corak.png') }}">
        </div>
    </div>
@endsection

@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"
        integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@endsection
