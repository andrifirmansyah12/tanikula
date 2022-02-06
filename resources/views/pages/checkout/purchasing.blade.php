@extends('pages.template3')
@section('title','Terima kasih')

@section('content')

<div class="mx-auto p-5">
    <div class="pt-16 lg:pt-24 pb-10">
        <h1 class="text-center text-4xl">Thank You For Purchasing</h1>
    </div>
    <div class="flex flex-col lg:flex-row">
        <div class="w-full lg:w-3/4 border mr-16">
            <div class="px-5 sm:px-10 py-10">
                <div class="pb-6 flex flex-col lg:flex-row justify-between">
                    <div class="text-2xl">Shopping Details</div>
                    <div class="text-sm">dh</div>
                </div>
                <div class="grid grid-cols-1 lg:grid-cols-3 text-lg py-5">
                    <div class="flex">
                        <p class="uppercase">Beras Organik</p>
                    </div>
                    <div>
                        <p class="text-gray-500 pl-2">2 X</p>
                    </div>
                    <div>
                        <p class="tracking-widest text-gray-500 text-right">
                            Rp. 50.000,-
                        </p>
                    </div>
                </div>
                <div class=" text-lg pt-10">
                    <div>
                        <p class="text-gray-500 text-sm">Promo</p>
                    </div>
                    <div class="flex justify-between text-xs pt-3">
                        <p class="text-gray-500 pl-7">-</p>
                        <p class="tracking-widest text-red-600">Rp. 0,-</p>
                    </div>
                </div>
                <div class=" text-lg pt-5 border-b border-blue-lemme pb-5">
                    <div>
                        <p class="text-gray-500 text-sm">Shipping Fee</p>
                    </div>
                    <div class="flex justify-between text-xs pt-3">
                        <p class="text-gray-500 pl-7">
                            alamat
                        </p>
                        <p class="tracking-widest text-gray-500">Rp. 10.000,-</p>
                    </div>
                </div>
                <div class=" text-lg py-5">
                    <div class="flex justify-between text-sm">
                        <p class="text-gray-500">Total Price</p>
                        <p class="tracking-widest text-gray-500">Rp. 50.000,-
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="w-full lg:w-1/3 mt-10 lg:mt-0 flex items-center justify-center">
            <div class="">
                <div class="bg-gray-200 p-10">
                    <h1 class="text-2xl mb-6 text-center">Your Payment</h1>
                    <div class=space-y-4">
                        <div class="relative">
                            <input class="text-4xl w-80 text-center" value="0888754443" disabled />
                        </div>
                        <div class=text-sm space-y-2">
                            <span class="text-gray-500 block text-center">Please Pay Before</span>
                            <span class="block text-center">Jumat, 28 Agustus 2020</span>
                        </div>
                        <div class="flex justify-between text-sm pt-5  ">
                            <div class="w-1/2 items-center space-y-2">
                                <div class="text-gray-500 ">Payment of</div>
                                <div class="text-black font-extrabold">Rp.
                                    50.000,-</div>
                            </div>
                            <div class="w-1/2 space-y-2">
                                <div class="text-gray-500 text-right">On behalf of</div>
                                <div class="text-black font-extrabold text-right">2</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection