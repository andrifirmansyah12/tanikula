@extends('components.pages.edukasi')
@section('title','Semua Kategori')

@section('content')

<section class="pt-24 md:pt-28 text-gray-600 body-font">
    <div class="container px-5 mx-auto">
        <div class="pb-7">
            <p class="text-green-gapoktan w-2xl text-2xl md:text-4xl font-bold">
                Semua Kategori
            </p>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 -m-4">
            <div class="p-4 w-full">
                <div class="h-full border-2 border-gray-200 border-opacity-60 rounded-lg overflow-hidden">
                    <img loading="lazy" class="lg:h-80 h-80 w-full object-cover object-bottom"
                        src="https://images.unsplash.com/photo-1505471768190-275e2ad7b3f9?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=387&q=80"
                        alt="blog" style=" ">
                    <div class="p-6">
                        <h2 class="tracking-widest text-xs title-font font-medium text-gray-400 mb-1">
                            CATEGORY</h2>
                        <h1 class="title-font text-lg font-medium text-gray-900 mb-3">
                            Cara menanam padi yang baik</h1>
                        <p class="leading-relaxed mb-3 line-clamp-2">Photo booth fam kinfolk
                            cold-pressed sriracha leggings jianbing microdosing tousled
                            waistcoat.</p>
                        <div class="flex items-center flex-wrap">
                            <a class="text-indigo-500 inline-flex items-center md:mb-0 lg:mb-0">
                                Learn More
                                <svg class="w-4 h-4 ml-2" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"
                                    fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M5 12h14"></path>
                                    <path d="M12 5l7 7-7 7"></path>
                                </svg>
                            </a>
                            <span
                                class="text-gray-400 mr-3 inline-flex items-center lg:ml-auto md:ml-5 ml-auto leading-none text-sm pr-3 py-1 border-r-2 border-gray-200">
                                <svg class="w-4 h-4 mr-1" stroke="currentColor" stroke-width="2" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                                    <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z">
                                    </path>
                                    <circle cx="12" cy="12" r="3"></circle>
                                </svg>
                                1.2K
                            </span>
                            <span class="text-gray-700 inline-flex items-center leading-none text-sm">
                                <svg class="w-4 h-4 mr-1" stroke="currentColor" stroke-width="2" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                                    <path
                                        d="M21 11.5a8.38 8.38 0 01-.9 3.8 8.5 8.5 0 01-7.6 4.7 8.38 8.38 0 01-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 01-.9-3.8 8.5 8.5 0 014.7-7.6 8.38 8.38 0 013.8-.9h.5a8.48 8.48 0 018 8v.5z">
                                    </path>
                                </svg>
                                6
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="p-4 w-full">
                <div class="h-full border-2 border-gray-200 border-opacity-60 rounded-lg overflow-hidden">
                    <iframe class="object-left w-full lg:object-center" width="360" height="320"
                        src="https://www.youtube.com/embed/nHEaSIr1q4c" frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                        allowfullscreen=""></iframe>
                    <div class="p-6">
                        <h2 class="tracking-widest text-xs title-font font-medium text-gray-400 mb-1">
                            CATEGORY</h2>
                        <h1 class="title-font text-lg font-medium text-gray-900 mb-3">
                            Manfaat dan cara penggunaan pupuk organik</h1>
                        <p class="leading-relaxed mb-3 line-clamp-2">Photo booth fam kinfolk
                            cold-pressed sriracha leggings jianbing microdosing tousled
                            waistcoat.</p>
                        <div class="flex items-center flex-wrap">
                            <a class="text-indigo-700 inline-flex items-center md:mb-0 lg:mb-0">
                                Learn More
                                <svg class="w-4 h-4 ml-2" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"
                                    fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M5 12h14"></path>
                                    <path d="M12 5l7 7-7 7"></path>
                                </svg>
                            </a>
                            <span
                                class="text-gray-400 mr-3 inline-flex items-center lg:ml-auto md:ml-5 ml-auto leading-none text-sm pr-3 py-1 border-r-2 border-gray-200">
                                <svg class="w-4 h-4 mr-1" stroke="currentColor" stroke-width="2" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                                    <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z">
                                    </path>
                                    <circle cx="12" cy="12" r="3"></circle>
                                </svg>
                                1.2K
                            </span>
                            <span class="text-gray-400 inline-flex items-center leading-none text-sm">
                                <svg class="w-4 h-4 mr-1" stroke="currentColor" stroke-width="2" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                                    <path
                                        d="M21 11.5a8.38 8.38 0 01-.9 3.8 8.5 8.5 0 01-7.6 4.7 8.38 8.38 0 01-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 01-.9-3.8 8.5 8.5 0 014.7-7.6 8.38 8.38 0 013.8-.9h.5a8.48 8.48 0 018 8v.5z">
                                    </path>
                                </svg>
                                6
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="p-4 w-full">
                <div class="h-full border-2 border-gray-200 border-opacity-60 rounded-lg overflow-hidden">
                    <iframe class="object-left w-full lg:object-center" width="360" height="320"
                        src="https://www.youtube.com/embed/gb1_hFpEb-c" frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                        allowfullscreen=""></iframe>
                    <div class="p-6">
                        <h2 class="tracking-widest text-xs title-font font-medium text-gray-400 mb-1">
                            CATEGORY</h2>
                        <h1 class="title-font text-lg font-medium text-gray-900 mb-3">
                            Padi organik alam terjaga petani sejahtera</h1>
                        <p class="leading-relaxed mb-3 line-clamp-2">Photo booth fam kinfolk
                            cold-pressed sriracha leggings jianbing microdosing tousled
                            waistcoat.</p>
                        <div class="flex items-center flex-wrap">
                            <a class="text-indigo-700 inline-flex items-center md:mb-0 lg:mb-0">
                                Learn More
                                <svg class="w-4 h-4 ml-2" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"
                                    fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M5 12h14"></path>
                                    <path d="M12 5l7 7-7 7"></path>
                                </svg>
                            </a>
                            <span
                                class="text-gray-400 mr-3 inline-flex items-center lg:ml-auto md:ml-5 ml-auto leading-none text-sm pr-3 py-1 border-r-2 border-gray-200">
                                <svg class="w-4 h-4 mr-1" stroke="currentColor" stroke-width="2" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                                    <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z">
                                    </path>
                                    <circle cx="12" cy="12" r="3"></circle>
                                </svg>
                                1.2K
                            </span>
                            <span class="text-gray-400 inline-flex items-center leading-none text-sm">
                                <svg class="w-4 h-4 mr-1" stroke="currentColor" stroke-width="2" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                                    <path
                                        d="M21 11.5a8.38 8.38 0 01-.9 3.8 8.5 8.5 0 01-7.6 4.7 8.38 8.38 0 01-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 01-.9-3.8 8.5 8.5 0 014.7-7.6 8.38 8.38 0 013.8-.9h.5a8.48 8.48 0 018 8v.5z">
                                    </path>
                                </svg>
                                6
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection