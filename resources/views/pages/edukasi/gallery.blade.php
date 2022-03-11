@extends('components.pages.edukasi')
@section('title','Galeri')

@section('content')

<!-- component -->
<div class="pt-12 flex justify-center items-center">
    <!--- more free and premium Tailwind CSS components at https://tailwinduikit.com/ --->
    <div class="2xl:mx-auto 2xl:container lg:pt-16 md:pt-12 pt-9 w-96 sm:w-auto">
        <div role="main" class="flex flex-col items-center justify-center">
            <h1 class="text-4xl font-semibold leading-9 text-center text-green-gapoktan dark:text-gray-50">Galeri</h1>
            {{-- <p class="text-base leading-normal text-center text-green-gapoktan dark:text-white mt-4 lg:w-1/2 md:w-10/12 w-11/12">Dokumentasi berupa foto</p> --}}
        </div>
        <div class="lg:flex items-stretch md:mt-12 mt-8">
            <div class="lg:w-1/2">
                <div class="sm:flex items-center justify-between xl:gap-x-8 gap-x-6">
                    <div class="sm:w-1/2 relative">
                        <div>
                            <p class="p-6 text-xs font-medium leading-3 text-white absolute top-0 right-0">12 April 2021
                            </p>
                            <div class="absolute bottom-0 left-0 p-6">
                                <h2 class="text-xl font-semibold 5 text-white">The Decorated Ways</h2>
                                <p class="text-base leading-4 text-white mt-2">Dive into minimalism</p>
                                <a href="javascript:void(0)"
                                    class="focus:outline-none focus:underline flex items-center mt-4 cursor-pointer text-white hover:text-gray-200 hover:underline">
                                    <p class="pr-2 text-sm font-medium leading-none">Read More</p>
                                    <svg class="fill-stroke" width="16" height="16" viewBox="0 0 16 16" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path d="M5.75 12.5L10.25 8L5.75 3.5" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                        <img src="https://images.unsplash.com/photo-1614157606535-2f3990b919a6?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=464&q=80" class="w-full" alt="chair" />
                    </div>
                    <div class="sm:w-1/2 sm:mt-0 mt-4 relative">
                        <div>
                            <p class="p-6 text-xs font-medium leading-3 text-white absolute top-0 right-0">12 April 2021
                            </p>
                            <div class="absolute bottom-0 left-0 p-6">
                                <h2 class="text-xl font-semibold 5 text-white">The Decorated Ways</h2>
                                <p class="text-base leading-4 text-white mt-2">Dive into minimalism</p>
                                <a href="javascript:void(0)"
                                    class="focus:outline-none focus:underline flex items-center mt-4 cursor-pointer text-white hover:text-gray-200 hover:underline">
                                    <p class="pr-2 text-sm font-medium leading-none">Read More</p>
                                    <svg class="fill-stroke" width="16" height="16" viewBox="0 0 16 16" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path d="M5.75 12.5L10.25 8L5.75 3.5" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                        <img src="https://images.unsplash.com/photo-1545830790-68595959c491?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=435&q=80" class="w-full" alt="wall design" />
                    </div>
                </div>
                <div class="relative">
                    <div>
                        <p class="md:p-10 p-6 text-xs font-medium leading-3 text-white absolute top-0 right-0">12 April
                            2021</p>
                        <div class="absolute bottom-0 left-0 md:p-10 p-6">
                            <h2 class="text-xl font-semibold 5 text-white">The Decorated Ways</h2>
                            <p class="text-base leading-4 text-white mt-2">Dive into minimalism</p>
                            <a href="javascript:void(0)"
                                class="focus:outline-none focus:underline flex items-center mt-4 cursor-pointer text-white hover:text-gray-200 hover:underline">
                                <p class="pr-2 text-sm font-medium leading-none">Read More</p>
                                <svg class="fill-stroke" width="16" height="16" viewBox="0 0 16 16" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path d="M5.75 12.5L10.25 8L5.75 3.5" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </a>
                        </div>
                    </div>
                    <img src="https://images.unsplash.com/photo-1492496913980-501348b61469?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=387&q=80" alt="sitting place"
                        class="w-full mt-8 md:mt-6 hidden sm:block" />
                    <img class="w-full mt-4 sm:hidden" src="https://i.ibb.co/6XYbN7f/Rectangle-29.png"
                        alt="sitting place" />
                </div>
            </div>
            <div class="lg:w-1/2 xl:ml-8 lg:ml-4 lg:mt-0 md:mt-6 mt-4 lg:flex flex-col justify-between">
                <div class="relative">
                    <div>
                        <p class="md:p-10 p-6 text-xs font-medium leading-3 text-white absolute top-0 right-0">12 April
                            2021</p>
                        <div class="absolute bottom-0 left-0 md:p-10 p-6">
                            <h2 class="text-xl font-semibold 5 text-white">The Decorated Ways</h2>
                            <p class="text-base leading-4 text-white mt-2">Dive into minimalism</p>
                            <a href="javascript:void(0)"
                                class="focus:outline-none focus:underline flex items-center mt-4 cursor-pointer text-white hover:text-gray-200 hover:underline">
                                <p class="pr-2 text-sm font-medium leading-none">Read More</p>
                                <svg class="fill-stroke" width="16" height="16" viewBox="0 0 16 16" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path d="M5.75 12.5L10.25 8L5.75 3.5" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </a>
                        </div>
                    </div>
                    <img src="https://images.unsplash.com/photo-1505471768190-275e2ad7b3f9?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=387&q=80" alt="sitting place" class="w-full sm:block hidden" />
                    <img class="w-full sm:hidden" src="https://i.ibb.co/dpXStJk/Rectangle-29.png" alt="sitting place" />
                </div>
                <div class="sm:flex items-center justify-between xl:gap-x-8 gap-x-6 md:mt-6 mt-4">
                    <div class="relative w-full">
                        <div>
                            <p class="p-6 text-xs font-medium leading-3 text-white absolute top-0 right-0">12 April 2021
                            </p>
                            <div class="absolute bottom-0 left-0 p-6">
                                <h2 class="text-xl font-semibold 5 text-white">The Decorated Ways</h2>
                                <p class="text-base leading-4 text-white mt-2">Dive into minimalism</p>
                                <a href="javascript:void(0)"
                                    class="focus:outline-none focus:underline flex items-center mt-4 cursor-pointer text-white hover:text-gray-200 hover:underline">
                                    <p class="pr-2 text-sm font-medium leading-none">Read More</p>
                                    <svg class="fill-stroke" width="16" height="16" viewBox="0 0 16 16" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path d="M5.75 12.5L10.25 8L5.75 3.5" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                        <img src="https://images.unsplash.com/photo-1614157606535-2f3990b919a6?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=464&q=80" class="w-full" alt="chair" />
                    </div>
                    <div class="relative w-full sm:mt-0 mt-4">
                        <div>
                            <p class="p-6 text-xs font-medium leading-3 text-white absolute top-0 right-0">12 April 2021
                            </p>
                            <div class="absolute bottom-0 left-0 p-6">
                                <h2 class="text-xl font-semibold 5 text-white">The Decorated Ways</h2>
                                <p class="text-base leading-4 text-white mt-2">Dive into minimalism</p>
                                <a href="javascript:void(0)"
                                    class="focus:outline-none focus:underline flex items-center mt-4 cursor-pointer text-white hover:text-gray-200 hover:underline">
                                    <p class="pr-2 text-sm font-medium leading-none">Read More</p>
                                    <svg class="fill-stroke" width="16" height="16" viewBox="0 0 16 16" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path d="M5.75 12.5L10.25 8L5.75 3.5" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                        <img src="https://images.unsplash.com/photo-1545830790-68595959c491?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=435&q=80" class="w-full" alt="wall design" />
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection