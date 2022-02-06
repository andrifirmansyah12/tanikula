@extends('pages.template2')
@section('title','Checkout')

@section('content')

<div class="flex flex-col lg:flex-row p-5 lg:mx-10 lg:mb-10">
    <a href="{{ url()->previous() }}" class="shadow-md rounded-md px-3 absolute top-36">
        <div class="flex flex-row-reverse">
            <p class="pl-2 tracking-widest">
                Back
            </p>
            <img src="{{ asset('img/back.svg') }}" class="w-5" alt="back">
        </div>
    </a>
    <div class="w-full lg:w-2/3 px-5 lg:pl-5 lg:pr-20">
        <div class="flex justify-between items-center pt-4 lg:pt-0">
            <h1 class="text-2xl">Your Bag (2)</h1>
            <div>
                <button class="flex items-center gap-x-2 px-6 py-1 text-red-800">
                    <svg class="svg-icon w-5" viewBox="0 0 20 20">
                        <path fill="none" d="M7.083,8.25H5.917v7h1.167V8.25z M18.75,3h-5.834V1.25c0-0.323-0.262-0.583-0.582-0.583H7.667
                                    c-0.322,0-0.583,0.261-0.583,0.583V3H1.25C0.928,3,0.667,3.261,0.667,3.583c0,0.323,0.261,0.583,0.583,0.583h1.167v14
                                    c0,0.644,0.522,1.166,1.167,1.166h12.833c0.645,0,1.168-0.522,1.168-1.166v-14h1.166c0.322,0,0.584-0.261,0.584-0.583
                                    C19.334,3.261,19.072,3,18.75,3z M8.25,1.833h3.5V3h-3.5V1.833z M16.416,17.584c0,0.322-0.262,0.583-0.582,0.583H4.167
                                    c-0.322,0-0.583-0.261-0.583-0.583V4.167h12.833V17.584z M14.084,8.25h-1.168v7h1.168V8.25z M10.583,7.083H9.417v8.167h1.167V7.083
                                    z"></path>
                    </svg>
                    <span class="text-sm">
                        Remove All Cart
                    </span>
                </button>
            </div>
        </div>
        <div class="mt-5">
            <div class="flex flex-col lg:flex-row justify-between gap-x-5 xl:gap-x-0 border-gray-200 border-b border-t">
                <div class="flex flex-col lg:flex-row items-center space-x-3 space-y-5 lg:space-y-0 py-12  ">
                    <div>
                        <img src="{{ asset('img/farmer2.svg') }}"
                            class="h-32 w-32 object-center object-cover lg:h-16 lg:w-16" alt="product" />
                    </div>
                    <div class="space-y-5 lg:space-y-0 pl-7">
                        <h1 class="text-sm lg:text-lg lg:text-left truncate w-32 lg:w-auto">Bag</h1>
                        <div class="flex items-center space-x-3">
                            <div class="flex gap-y-3 lg:gap-y-0 flex-row items-center gap-x-5">
                                <button class="text-gray-500 focus:outline-none focus:text-gray-600">
                                    <svg class="h-5 w-5" fill="none" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                                        <path d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z">
                                        </path>
                                    </svg>
                                </button>
                                <span class="text-gray-700 mx-2">2</span>
                                <button class="text-gray-500 focus:outline-none focus:text-gray-600">
                                    <svg class="h-5 w-5" fill="none" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                                        <path d="M15 12H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex flex-col justify-center lg:justify-end my-auto lg:my-0 pb-10 lg:pb-20">
                    <div>
                        <div>
                            <input type="hidden" value="" name="id">
                            <button type="submit" class="text-red-600 cursor-pointer text-xs">Remove</button>
                        </div>
                    </div>
                    <div>
                        <p class="tracking-widest text-lg lg:text-2xl">Rp. 50.000</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="w-full lg:w-1/3 flex pt-12 lg:pt-0 justify-center">
        <div>
            <div class="bg-green-gapoktan text-white p-10">
                <h1 class="font-luxia text-2xl mb-6">Order Summary</h1>
                <div class=" space-y-4">
                    <div class="flex justify-between text-md">
                        <span>Total</span>
                        <span>Rp. 50.000</span>
                    </div>
                    <div class="bg-gray-600 text-white w-full py-1 text-center cursor-pointer">
                        <a href="/shipping-payment">
                            Checkout
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

@endsection