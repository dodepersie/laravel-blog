@extends('layouts.main')

@push('meta')
    <meta name="description" content="Berisi tentang Informasi seputar dunia Web Developer dan juga pengalamlan saya!">
    <meta name="keywords"
        content="HTML, CSS, JavaScript, Laravel, React, Blog, Mahadi Saputra, Mahadi, Saputra, Dode, Dode Mahadi, Web Developer, Fullstack Web Developer, Front End Web Developer, Back End Web Developer">
    <meta name="author" content="I Dewa Gede Mahadi Saputra">

    <!-- Facebook Meta Tags -->
    <meta property="og:url" content="https://mahadisaputra.my.id/">
    <meta property="og:type" content="website">
    <meta property="og:title" content="{{ $title }} / Mahadi Saputra">
    <meta property="og:description" content="Kategori yang tersedia di blog saya!">
    <meta property="og:image" content="{{ asset('assets/img/1.png') }}">

    <!-- Twitter Meta Tags -->
    <meta name="twitter:card" content="summary_large_image">
    <meta property="twitter:domain" content="mahadisaputra.my.id">
    <meta property="twitter:url" content="https://mahadisaputra.my.id/">
    <meta name="twitter:title" content="{{ $title }} / Mahadi Saputra">
    <meta name="twitter:description" content="Kategori yang tersedia di blog saya!">
    <meta name="twitter:image" content="{{ asset('assets/img/1.png') }}">
@endpush

@section('container')
    {{ Breadcrumbs::render('categories') }}
    <main>
        <div class="flex flex-col justify-center items-center p-10 -mt-4 gap-4 bg-[#FDE3E2] dark:bg-[#2A323E]">
            <svg class="w-16 h-16 text-gray-800 dark:text-white" aria-hidden="true"
                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M6.143 1H1.857A.857.857 0 0 0 1 1.857v4.286c0 .473.384.857.857.857h4.286A.857.857 0 0 0 7 6.143V1.857A.857.857 0 0 0 6.143 1Zm10 0h-4.286a.857.857 0 0 0-.857.857v4.286c0 .473.384.857.857.857h4.286A.857.857 0 0 0 17 6.143V1.857A.857.857 0 0 0 16.143 1Zm-10 10H1.857a.857.857 0 0 0-.857.857v4.286c0 .473.384.857.857.857h4.286A.857.857 0 0 0 7 16.143v-4.286A.857.857 0 0 0 6.143 11Zm10 0h-4.286a.857.857 0 0 0-.857.857v4.286c0 .473.384.857.857.857h4.286a.857.857 0 0 0 .857-.857v-4.286a.857.857 0 0 0-.857-.857Z" />
            </svg>

            <h1 class="uppercase text-3xl text-center font-extrabold text-gray-900 dark:text-gray-50">
                {{ $title }}
            </h1>

            <p class="text-lg text-center font-normal text-gray-900 dark:text-gray-50">
                Cari artikel yang kamu suka berdasarkan kategori yang ada.
            </p>
        </div>

        <section class="bg-[#E9E9E9] dark:bg-[#444A54] shadow-inner" id="category">
            <div
                class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 justify-start items-center gap-7 max-w-6xl px-4 lg:px-0 py-8 mx-auto">
                @foreach ($categories->sortBy('name') as $category)
                    <figure class="relative transition-all duration-300 cursor-pointer filter grayscale hover:grayscale-0">
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
        </section>
    </main>
@endsection
