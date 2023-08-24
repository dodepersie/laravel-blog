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
    <meta property="og:description" content="Kategori yang tersedia di blog saya!">
    <meta property="og:image" content="{{ asset('assets/img/1.png') }}">
    
    <!-- Twitter Meta Tags -->
    <meta name="twitter:card" content="summary_large_image">
    <meta property="twitter:domain" content="mahadisaputra.my.id">
    <meta property="twitter:url" content="https://mahadisaputra.my.id/">
    <meta name="twitter:title" content="Mahadi Saputra's Blog | {{ $title }}">
    <meta name="twitter:description" content="Kategori yang tersedia di blog saya!">
    <meta name="twitter:image" content="{{ asset('assets/img/1.png') }}">
@endpush

@section('container')
    {{ Breadcrumbs::render('categories') }}

    <main class="container max-w-6xl mx-auto px-4 lg:px-0">

        <h1
            class="my-4 md:my-7 text-4xl md:text-5xl lg:text-6xl font-extrabold text-gray-900 dark:text-gray-50 leading-relaxed">
            <span
                class="text-transparent bg-clip-text bg-gradient-to-r from-sky-400 to-sky-600">{{ __('Kategori') }}</span>
            {{ __('yang mungkin kamu suka') }}</h1>

        <div class="grid grid-cols-1 gap-5 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 auto-rows-max">
            @foreach ($categories->sortBy('name') as $category)
                <figure
                    class="relative max-w-screen-sm transition-all duration-300 cursor-pointer filter grayscale hover:grayscale-0">
                    <a href="{{ '/posts?category=' . $category->slug }}">
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
