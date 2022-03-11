<div class="fixed bg-white z-50 w-full shadow mx-auto py-2 px-6 md:px-14">
    <div class="w-full flex items-center justify-between">
        <a class="flex items-center text-green-gapoktan no-underline hover:no-underline font-bold text-2xl lg:text-4xl"
            href="#">
            <img class="w-7 mr-2" src="{{ asset('img/farmer.svg') }}" alt="">
            <p class="flex">
                GAPOKTAN <span class="flex text-sm">Market</span>
            </p>
        </a>

        <div class="flex w-1/2 justify-end content-center">
            <a class="inline-block text-green-gapoktan no-underline hover:text-green-800 hover:text-underline text-center h-10 p-2 md:h-auto md:p-4"
                data-tippy-content="@twitter_handle" href="https://twitter.com/intent/tweet?url=#">
                <svg class="fill-current h-6" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                    viewBox="0 0 24 24">
                    <path
                        d="M21,7H7.462L5.91,3.586C5.748,3.229,5.392,3,5,3H2v2h2.356L9.09,15.414C9.252,15.771,9.608,16,10,16h8 c0.4,0,0.762-0.238,0.919-0.606l3-7c0.133-0.309,0.101-0.663-0.084-0.944C21.649,7.169,21.336,7,21,7z M17.341,14h-6.697L8.371,9 h11.112L17.341,14z" />
                    <circle cx="10.5" cy="18.5" r="1.5" />
                    <circle cx="17.5" cy="18.5" r="1.5" />
                </svg>
            </a>
            <a class="inline-block text-green-gapoktan no-underline hover:text-green-800 hover:text-underline text-center h-10 p-2 md:h-auto md:p-4 text-lg"
                href="{{ route('pembeli') }}">
                Andri Firmansyah
            </a>
        </div>
    </div>
</div>