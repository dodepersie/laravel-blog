@extends('layouts.main')

@push('meta')
    <meta name="description" content="Berisi tentang Informasi seputar dunia Web Developer dan juga pengalamlan saya!">
    <meta name="keywords"
        content="HTML, CSS, JavaScript, Laravel, React, Blog, Mahadi Saputra, Mahadi, Saputra, Dode, Dode Mahadi, Web Developer, Fullstack Web Developer, Front End Web Developer, Back End Web Developer">
    <meta name="author" content="I Dewa Gede Mahadi Saputra">
    
    <!-- Facebook Meta Tags -->
    <meta property="og:url" content="https://mahadisaputra.my.id/">
    <meta property="og:type" content="website">
    <meta property="og:title" content="Mahadi Saputra's Blog | {{ $title }}">
    <meta property="og:description" content="Berisi tentang Informasi seputar dunia Web Developer dan juga pengalamlan saya!">
    <meta property="og:image" content="{{ asset('assets/img/1.png') }}">
    
    <!-- Twitter Meta Tags -->
    <meta name="twitter:card" content="summary_large_image">
    <meta property="twitter:domain" content="mahadisaputra.my.id">
    <meta property="twitter:url" content="https://mahadisaputra.my.id/">
    <meta name="twitter:title" content="Mahadi Saputra's Blog | {{ $title }}">
    <meta name="twitter:description" content="Berisi tentang Informasi seputar dunia Web Developer dan juga pengalamlan saya!">
    <meta name="twitter:image" content="{{ asset('assets/img/1.png') }}">
@endpush

@section('container')
    <main class="relative container max-w-6xl mx-auto mt-28">
        <div class="absolute inset-x-0 top-4 -z-10 transform-gpu overflow-hidden blur-3xl">
            <div class="hidden aspect-[1108/632] w-[69.25rem] flex-none bg-gradient-to-r from-blue-600 to-indigo-800 opacity-25 dark:block" style="clip-path: polygon(73.6% 51.7%, 91.7% 11.8%, 100% 46.4%, 97.4% 82.2%, 92.5% 84.9%, 75.7% 64%, 55.3% 47.5%, 46.5% 49.4%, 45% 62.9%, 50.3% 87.2%, 21.3% 64.1%, 0.1% 100%, 5.4% 51.1%, 21.4% 63.9%, 58.9% 0.2%, 73.6% 51.7%);"></div>
        </div>
        
        <div
            class="flex flex-col md:flex-row justify-between items-center mx-auto w-full mt-10 gap-4 md:gap-10 lg:gap-7 py-8 px-4">
            <div class="flex flex-col justify-center max-w-2xl text-gray-900 dark:text-gray-50" data-aos="fade-right">
                <h1 class="my-4 text-4xl font-extrabold leading-none lg:text-6xl">
                    {{ __('home.welcome') }}</h1>
                <p class="mt-6 text-sm leading-loose text-gray-600 dark:text-gray-400 sm:text-xl sm:leading-8">
                    {{ __('home.description') }}</p>

                    <div class="mt-10">
                        <a href="#projects" class="inline-flex items-center justify-center rounded-full text-sm bg-sky-600 text-gray-50 hover:bg-sky-600/80 h-10 px-4 py-2">
                            {{ __('home.reject_project') }}
                        </a>
                    </div>
            </div>
            <div class="hidden lg:block lg:mt-10 lg:max-w-xs" data-aos="fade-left">
                <img class="transition-shadow duration-700 hover:shadow-xl dark:shadow-slate-500/25 rounded-xl"
                    src="{{ asset('assets/img/1.png') }}" alt="Mahadi Saputra">
            </div>
        </div>

        <section id="projects" data-aos="fade-down">
            <div class="flex flex-col justify-center items-center text-gray-900 dark:text-gray-50 p-4">
                <div
                    class="inline-flex flex-col justify-center items-center text-center tracking-wide space-y-3 max-w-lg mb-10">
                    <h1 class="text-4xl font-bold">{{ __('home.reject_project') }}</h1>
                    <p class="text-gray-600 dark:text-gray-400 leading-loose">{{ __('home.reject_project_desc') }}</p>
                </div>
    
                {{-- 1 --}}
                <div class="inline-flex flex-col lg:flex-row justify-between items-center gap-14 mb-10">
                    {{-- Image --}}
                    <img src="{{ asset('assets/img/projects/mooflixxi.png') }}" class="w-[470px] shadow-lg rounded-lg"
                        alt="MoofliXXI">
    
                    {{-- Description --}}
                    <div class="space-y-5 px-2">
                        <h1 class="text-4xl font-bold mb-3">MoofliXXI</h1>
                        <a href="https://mooflixxi.mahadisaputra.my.id/" target="_blank"
                            class="flex items-center gap-2 text-sky-600 hover:underline">https://mooflixxi.mahadisaputra.my.id/ <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11v4.833A1.166 1.166 0 0 1 13.833 17H2.167A1.167 1.167 0 0 1 1 15.833V4.167A1.166 1.166 0 0 1 2.167 3h4.618m4.447-2H17v5.768M9.111 8.889l7.778-7.778"/>
                              </svg></a>
                        <p class="text-gray-600 dark:text-gray-400 leading-loose">
                            {{ __('home.mooflixxi_desc') }}
                        </p>
    
                        {{-- Tech stack --}}
                        <div class="inline-flex justify-start items-center gap-5">
                            <div class="transition-color duration-300 hover:bg-gray-100 dark:hover:bg-gray-700 p-1 rounded-lg">
                                <img src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/technologies/javascript.svg"
                                    alt="Javascript">
                            </div>
    
                            <div class="transition-color duration-300 hover:bg-gray-100 dark:hover:bg-gray-700 p-1 rounded-lg">
                                <img src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/technologies/react.svg"
                                    alt="React">
                            </div>
                        </div>
                    </div>
    
                </div>
    
                {{-- 2 --}}
                <div class="inline-flex flex-col lg:flex-row-reverse justify-between items-center gap-14">
                    {{-- Image --}}
                    <img src="{{ asset('assets/img/projects/v3portfolio.png') }}" class="w-[470px] shadow-lg rounded-lg"
                        alt="v3 Portfolio">
    
                    {{-- Description --}}
                    <div class="space-y-5 px-2">
                        <h1 class="text-4xl font-bold mb-3">v3 Portfolio</h1>
                        <a href="https://v3.mahadisaputra.my.id/" target="_blank"
                            class="flex items-center gap-2 text-sky-600 hover:underline">https://v3.mahadisaputra.my.id/ <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11v4.833A1.166 1.166 0 0 1 13.833 17H2.167A1.167 1.167 0 0 1 1 15.833V4.167A1.166 1.166 0 0 1 2.167 3h4.618m4.447-2H17v5.768M9.111 8.889l7.778-7.778"/>
                              </svg></a>
                        <p class="text-gray-600 dark:text-gray-400 leading-loose">
                            {{ __('home.v3portfolio_desc') }}
                        </p>
    
                        {{-- Tech stack --}}
                        <div class="inline-flex justify-start items-center gap-5">
    
                            <div class="transition-color duration-300 hover:bg-gray-100 dark:hover:bg-gray-700 p-1 rounded-lg">
                                <img src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/technologies/javascript.svg"
                                    alt="Javascript">
                            </div>
    
                            <div class="transition-color duration-300 hover:bg-gray-100 dark:hover:bg-gray-700 p-1 rounded-lg">
                                <img src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/technologies/react.svg"
                                    alt="React">
                            </div>
    
                            <div class="transition-color duration-300 hover:bg-gray-100 dark:hover:bg-gray-700 p-1 rounded-lg">
                                <img src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/technologies/tailwind-css.svg"
                                    alt="Tailwind">
                            </div>
    
                        </div>
                    </div>
    
                </div>
    
            </div>
        </section>
    </main>
@endsection
