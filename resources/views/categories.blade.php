@extends('layouts.main')

@push('meta')
    <meta name="description" content="Berisi tentang Informasi seputar dunia Web Developer dan juga pengalamlan saya!">
    <meta name="keywords"
        content="HTML, CSS, JavaScript, Laravel, React, Blog, Mahadi Saputra, Mahadi, Saputra, Dode, Dode Mahadi, Web Developer, Fullstack Web Developer, Front End Web Developer, Back End Web Developer">
    <meta name="author" content="I Dewa Gede Mahadi Saputra">
@endpush

@section('container')
    {{ Breadcrumbs::render('categories') }}

    <main class="container max-w-6xl mx-auto px-4 lg:px-0">

        <h1
            class="my-4 md:my-7 text-4xl md:text-5xl lg:text-6xl font-extrabold text-gray-900 dark:text-gray-50 leading-relaxed">
            <span
                class="text-transparent bg-clip-text bg-gradient-to-r from-sky-400 to-sky-600">{{ __('category.categories') }}</span>
            {{ __('category.categories_y') }}</h1>

        <div class="grid grid-cols-1 gap-5 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 auto-rows-max">
            @foreach ($categories->sortBy('name') as $category)
                <figure
                    class="relative max-w-screen-sm transition-all duration-300 cursor-pointer filter grayscale hover:grayscale-0">
                    <a href="{{ '/' . app()->getLocale() . '/posts?category=' . $category->slug }}">
                        <img class="rounded-lg" src="https://source.unsplash.com/600x600?{{ $category->name }}"
                            alt="{{ $category->name }}">
                    </a>
                    <figcaption class="absolute px-4 text-xl font-bold text-gray-50 bottom-6">
                        <p>{{ $category->name }}</p>
                    </figcaption>
                </figure>
            @endforeach
        </div>
    </main>
@endsection
