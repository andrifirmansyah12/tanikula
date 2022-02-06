<div class="pt-24 md:pt-28 pb-10 flex items-center justify-center space-x-5 md:space-x-10">
    <div class="{{ Request::is('checkout*') ? 'active font-bold border-b border-gray-600 text-center w-40 md:w-52' : '' }}">
        <a href="">
            Your Bag
        </a>
    </div>
    <div class="{{ Request::is('payment*') ? 'active font-bold border-b border-gray-600 text-center w-40 md:w-52' : '' }}">
        <a href="">
            Shipping & Payment
        </a>
    </div>
</div>