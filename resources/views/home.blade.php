@extends('layouts.main')

@push('meta')
    <meta name="description" content="Berisi tentang Informasi seputar dunia Web Developer dan juga pengalamlan saya!">
    <meta name="keywords"
        content="HTML, CSS, JavaScript, Laravel, React, Blog, Mahadi Saputra, Mahadi, Saputra, Dode, Dode Mahadi, Web Developer, Fullstack Web Developer, Front End Web Developer, Back End Web Developer">
    <meta name="author" content="I Dewa Gede Mahadi Saputra">
@endpush

@section('container')
    <main class="container max-w-screen-sm md:max-w-screen-md lg:max-w-screen-xl mt-3 mx-auto overflow-hidden select-none">
        <div class="flex flex-col md:flex-row justify-between items-center mx-auto w-full lg:py-16 gap-4 md:gap-10 lg:gap-4 mt-20 py-8">
            <div class="flex flex-col justify-center" data-aos="fade-right">
                <h1
                    class="mb-4 text-5xl font-extrabold tracking-tight leading-none text-gray-900 lg:text-6xl dark:text-white">{{ __('home.welcome') }}</h1>
                <p class="font-normal text-xl text-gray-500 dark:text-gray-400 lg:text-left mb-3 leading-relaxed">
                    {{ __('home.description') }}</p>
                <div class="flex flex-col lg:flex-row">
                    <a href="{{ '/' . app()->getLocale() . '/posts' }}"
                        class="inline-flex justify-center items-center py-3 px-5 text-base font-medium text-center text-white rounded-lg bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 dark:focus:ring-blue-900">
                        {{ __('home.get_started') }}
                        <svg aria-hidden="true" class="ml-2 -mr-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </a>
                </div>
            </div>
            <div class="lg:mt-10 lg:max-w-xs" data-aos="fade-left">
                <img class="transition-shadow duration-700 hover:shadow-xl dark:shadow-slate-500/25 rounded-xl"
                    src="{{ asset('/img/1.png') }}" alt="Mahadi Saputra">
            </div>
        </div>
    </main>
@endsection
