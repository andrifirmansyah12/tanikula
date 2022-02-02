@extends('components.pages.landing')
@section('title','Gapoktans')

@section('content')
<!--Left Col-->
<div class="flex flex-col w-full xl:w-2/5 justify-center lg:items-start overflow-y-hidden">
    <h1
        class="my-4 text-3xl md:text-5xl text-purple-800 font-bold pr-28 sm:pr-0 leading-tight text-left slide-in-bottom-h1">
        Selamat datang di website Gapoktan Sri Makmur
    </h1>
    <p class="leading-normal text-base md:text-2xl mb-8 pr-28 sm:pr-0 text-left slide-in-bottom-subtitle">
        Sub-hero message, not too long and not too short. Make it just right!
    </p>

    <p class="text-blue-400 font-bold pb-8 lg:pb-6 text-center md:text-left fade-in">Download our app:</p>
    <div class="flex w-full justify-center md:justify-start pb-24 lg:pb-0 fade-in">
        <img src="{{ asset('img/appStore.svg') }}" class="h-12 pr-4 bounce-top-icons">
        <img src="{{ asset('img/playStore.svg') }}" class="h-12 bounce-top-icons">
    </div>

</div>

<!--Right Col-->
<div class="w-full xl:w-3/5 py-6 overflow-y-hidden">
    <img class="w-5/6 mx-auto lg:mr-0 slide-in-bottom" src="{{ asset('img/devices.svg') }}">
</div>
@endsection