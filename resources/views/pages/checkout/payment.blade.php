@extends('pages.template2')
@section('title','Pembayaran')

@section('content')

<div class="flex flex-col lg:flex-row p-5 lg:mx-10">
    <a href="{{ url()->previous() }}" class="shadow-md rounded-md px-3 absolute top-36">
        <div class="flex flex-row-reverse">
            <p class="pl-2 tracking-widest">
                Back
            </p>
            <img src="{{ asset('img/back.svg') }}" class="w-5" alt="back">
        </div>
    </a>
    <div class="w-full lg:w-2/3 px-5 lg:pl-5 lg:pr-20">
        <h1 class="text-2xl">Shipping information </h1>
        <form>
            <div class="text-sm tracking-widest">
                <div class="py-3">
                    <label class="block" htmlFor="full_name">Full Name</label>
                    <input type="text" class="w-full border-gray-300
                        border-2 h-10 px-2 shadow-sm focus:outline-none" name="email" />
                </div>
                <div class="py-3">
                    <label class="block" htmlFor="receiver_phone_number">Phone number</label>
                    <input type="text" class="w-full border-gray-300
                        border-2 h-10 px-2 shadow-sm focus:outline-none" name="email" />
                </div>

                <div class="py-3">
                    <label class="block" htmlFor="email">Email Address</label>
                    <input type="text" class="w-full border-gray-300
                        border-2 h-10 px-2 shadow-sm focus:outline-none" name="email" />
                </div>

                <div class="w-full py-3">
                    <label class="block" htmlFor="address_id">Address</label>
                    <input type="text" class="w-full border-gray-300
                        border-2 h-10 px-2 shadow-sm focus:outline-none" name="email" />
                </div>
                <div class="w-full py-3">
                    <label class="block" htmlFor="courier">Shipping</label>
                    <input type="text" class="w-full border-gray-300
                        border-2 h-10 px-2 shadow-sm focus:outline-none" name="email" />
                </div>
                <div class="w-full py-3">
                    <label class="block" htmlFor="payment_method">Payment</label>
                    <input type="text" class="w-full border-gray-300
                        border-2 h-10 px-2 shadow-sm focus:outline-none" name="email" />
                </div>

            </div>
        </form>
    </div>
    <div class="w-full lg:w-1/3 flex pt-12 justify-center">
        <div>
            <div class="bg-green-gapoktan text-white p-10">
                <h1 class="text-2xl mb-6">Order Summary</h1>
                <div class="space-y-4">
                    <div class="flex justify-between text-md">
                        <span>Products</span>
                        <span>Bag</span>
                    </div>
                    <div class="flex justify-between text-md">
                        <div class="w-1/2">Shipping Estimation</div>
                        <div class="w-1/2 text-right">shippingEtd</div>
                    </div>
                    <div class="flex justify-between text-md">
                        <span>Sub Total</span>
                        <span>Rp. 50.000</span>
                    </div>
                    <div class="flex justify-between text-md">
                        <div class="w-1/2">Payment Method</div>
                        <div class="w-1/2 text-right">Bank BRI</div>
                    </div>

                    <div>
                        <button class="flex bg-gray-600
                            items-center justify-center gap-x-2 text-white w-full py-1 text-center">
                            PROCESS
                        </button>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

@endsection