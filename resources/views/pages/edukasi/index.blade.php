@extends('components.pages.edukasi')
@section('title','Edukasi')

@section('content')

<!-- component -->
<div class="pt-12 md:pt-16 flex justify-center items-center">
    <!--- more free and premium Tailwind CSS components at https://tailwinduikit.com/ --->
    <div class="2xl:mx-auto 2xl:container py-12 px-4 sm:px-6 xl:px-6 2xl:px-0 w-full">
        <div class="flex flex-col jusitfy-center items-center space-y-10">
            <div class="flex flex-col justify-center items-center ">
                <h1 class="text-3xl xl:text-4xl font-semibold leading-7 xl:leading-9 text-green-gapoktan dark:text-white">
                    Kategori Edukasi</h1>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 md:gap-x-4 md:gap-x-8 w-full">
                <div class="relative group flex justify-center items-center h-full w-full">
                    <img class="object-center object-cover h-96 md:h-full w-full"
                        src="https://images.unsplash.com/photo-1614157606535-2f3990b919a6?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=464&q=80" alt="semua-kategori" />
                    <a href="semua-kategori"
                        class="dark:bg-gray-800 text-center dark:text-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-400 bottom-4 z-10 absolute text-base font-medium leading-none text-gray-800 py-3 w-36 bg-white">Semua Kategori</a>
                    <div
                        class="absolute opacity-0 group-hover:opacity-100 transition duration-500 bottom-3 py-6 z-0 px-20 w-36 bg-white bg-opacity-50">
                    </div>
                </div>

                <div class="flex flex-col space-y-4 md:space-y-8 mt-4 md:mt-0">
                    <div class="relative group flex justify-center items-center h-full w-full">
                        <img class="object-center object-cover h-96 md:h-full w-full"
                            src="https://images.unsplash.com/photo-1545830790-68595959c491?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=435&q=80"
                            alt="galeri" />
                        <a href="galeri"
                            class="dark:bg-gray-800 text-center dark:text-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-400 bottom-4 z-10 absolute text-base font-medium leading-none text-gray-800 py-3 w-36 bg-white">Galeri</a>
                        <div
                            class="absolute opacity-0 group-hover:opacity-100 transition duration-500 bottom-3 py-6 z-0 px-20 w-36 bg-white bg-opacity-50">
                        </div>
                    </div>
                    <div class="relative group flex justify-center items-center h-full w-full">
                        <img class="object-center object-cover h-96 md:h-full w-full"
                            src="https://images.unsplash.com/photo-1492496913980-501348b61469?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=387&q=80"
                            alt="edukasi" />
                        <a href="edukasi"
                            class="dark:bg-gray-800 text-center dark:text-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-400 bottom-4 z-10 absolute text-base font-medium leading-none text-gray-800 py-3 w-36 bg-white">Edukasi</a>
                        <div
                            class="absolute opacity-0 group-hover:opacity-100 transition duration-500 bottom-3 py-6 z-0 px-20 w-36 bg-white bg-opacity-50">
                        </div>
                    </div>
                </div>

                <div class="relative group justify-center items-center h-full w-full hidden lg:flex">
                    <img class="object-center object-cover h-full w-full"
                        src="https://images.unsplash.com/photo-1505471768190-275e2ad7b3f9?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=387&q=80" alt="kegiatan" />
                    <a href="kegiatan"
                        class="dark:bg-gray-800 text-center dark:text-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-400 bottom-4 z-10 absolute text-base font-medium leading-none text-gray-800 py-3 w-36 bg-white">Kegiatan</a>
                    <div
                        class="absolute opacity-0 group-hover:opacity-100 transition duration-500 bottom-3 py-6 z-0 px-20 w-36 bg-white bg-opacity-50">
                    </div>
                </div>
                <div
                    class="relative group flex justify-center items-center h-full w-full mt-4 md:hidden md:mt-8 lg:hidden">
                    <img class="object-center object-cover h-96 w-full hidden md:block"
                        src="https://images.unsplash.com/photo-1505471768190-275e2ad7b3f9?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=387&q=80" alt="kegiatan" />
                    <img class="object-center object-cover h-96 w-full md:hidden"
                        src="https://images.unsplash.com/photo-1505471768190-275e2ad7b3f9?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=387&q=80"
                        alt="kegiatan" />
                    <a href="kegiatan"
                        class="dark:bg-gray-800 text-center dark:text-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-400 bottom-4 z-10 absolute text-base font-medium leading-none text-gray-800 py-3 w-36 bg-white">Accessories</a>
                    <div
                        class="absolute opacity-0 group-hover:opacity-100 transition duration-500 bottom-3 py-6 z-0 px-20 w-36 bg-white bg-opacity-50">
                    </div>
                </div>
            </div>
            <div class="relative group hidden md:flex justify-center items-center h-full w-full mt-4 md:mt-8 lg:hidden">
                <img class="object-center object-cover h-96 w-full hidden md:block"
                    src="https://images.unsplash.com/photo-1505471768190-275e2ad7b3f9?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=387&q=80" alt="kegiatan" />
                <img class="object-center object-cover h-96 w-full sm:hidden"
                    src="https://images.unsplash.com/photo-1505471768190-275e2ad7b3f9?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=387&q=80"
                    alt="kegiatan" />
                <a href="kegiatan"
                    class="dark:bg-gray-800 text-center dark:text-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-400 bottom-4 z-10 absolute text-base font-medium leading-none text-gray-800 py-3 w-36 bg-white">Accessories</a>
                <div
                    class="absolute opacity-0 group-hover:opacity-100 transition duration-500 bottom-3 py-6 z-0 px-20 w-36 bg-white bg-opacity-50">
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Banner --}}
<div class="pb-14">
    <section class="w-full mx-auto bg-nordic-gray-light flex pt-12 md:pt-0 md:items-center bg-cover bg-right"
        style="max-width:1600px; height: 32rem; background-image: url('https://images.unsplash.com/photo-1623211270166-bc232d744d6a?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=870&q=80');">
        <div class="container mx-auto">
            <div class="flex flex-col w-full lg:w-1/2 justify-center items-start  px-6 tracking-wide">
                <h1 class="text-white text-2xl my-4">Stripy Zig Zag Jigsaw Pillow and Duvet Set</h1>
                <a class="text-xl text-white inline-block no-underline leading-relaxed" href="#">products</a>
            </div>
        </div>
    </section>
</div>

<section class="text-gray-700 body-font">
    <div class="px-5 pb-7">
        <p class="text-green-gapoktan w-2xl text-2xl md:text-4xl font-bold">
            Video
        </p>
    </div>
    <div class="container flex flex-col items-center px-5 mx-auto lg:px-20 md:flex-row">
        <div class="w-5/6 lg:max-w-lg lg:w-full md:w-1/2 relative">
            <iframe class="object-left w-full mb-10 lg:object-center rounded-lg " width="360" height="300"
                src="https://www.youtube.com/embed/ly54wbcLwuM" frameborder="0"
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                allowfullscreen=""></iframe>
        </div>
        <div
            class="flex flex-col items-center w-full pt-0 mb-0 text-left lg:flex-grow md:w-1/2 lg:pl-24 md:pl-16 md:items-start md:text-left md:mb-0 lg:text-center">
            <h2 class="mb-1 text-xs font-medium tracking-widest text-indigo-600 title-font">
                Selasa 28 Januari 2022
            </h2>
            <h1
                class="mb-8 text-2xl font-bold tracking-tighter text-green-gapoktan text-center bg-clip-text lg:text-left lg:text-7xl title-font">
                Kenapa harus pupuk organik?
            </h1>
            <div class="flex justify-center">
                <a href="#"
                    class="inline-flex items-center font-semibold text-indigo-700 md:mb-2 lg:mb-0 hover:text-blue-400 ">
                    Learn More
                    <svg class="w-4 h-4 ml-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="20"
                        height="20" fill="currentColor">
                        <path fill="none" d="M0 0h24v24H0z"></path>
                        <path d="M16.172 11l-5.364-5.364 1.414-1.414L20 12l-7.778 7.778-1.414-1.414L16.172 13H4v-2z">
                        </path>
                    </svg>
                </a>
            </div>
        </div>

    </div>
</section>

@endsection