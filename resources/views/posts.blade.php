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
    <meta property="og:description"
        content="Berisi tentang Informasi seputar dunia Web Developer dan juga pengalamlan saya!">
    <meta property="og:image" content="{{ asset('assets/img/1.png') }}">

    <!-- Twitter Meta Tags -->
    <meta name="twitter:card" content="summary_large_image">
    <meta property="twitter:domain" content="mahadisaputra.my.id">
    <meta property="twitter:url" content="https://mahadisaputra.my.id/">
    <meta name="twitter:title" content="{{ $title }} / Mahadi Saputra">
    <meta name="twitter:description"
        content="Berisi tentang Informasi seputar dunia Web Developer dan juga pengalamlan saya!">
    <meta name="twitter:image" content="{{ asset('assets/img/1.png') }}">
@endpush

@section('container')
    {{ Breadcrumbs::render('posts') }}
    <main class="h-full">
        @if ($posts->count())
            <div class="flex flex-col justify-center items-center p-10 -mt-4 gap-4 bg-[#FDE3E2] dark:bg-[#2A323E]">
                <svg class="w-16 h-16 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    fill="currentColor" viewBox="0 0 20 20">
                    <path
                        d="M19 4h-1a1 1 0 1 0 0 2v11a1 1 0 0 1-2 0V2a2 2 0 0 0-2-2H2a2 2 0 0 0-2 2v15a3 3 0 0 0 3 3h14a3 3 0 0 0 3-3V5a1 1 0 0 0-1-1ZM3 4a1 1 0 0 1 1-1h3a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V4Zm9 13H4a1 1 0 0 1 0-2h8a1 1 0 0 1 0 2Zm0-3H4a1 1 0 0 1 0-2h8a1 1 0 0 1 0 2Zm0-3H4a1 1 0 0 1 0-2h8a1 1 0 1 1 0 2Zm0-3h-2a1 1 0 0 1 0-2h2a1 1 0 1 1 0 2Zm0-3h-2a1 1 0 0 1 0-2h2a1 1 0 1 1 0 2Z" />
                    <path d="M6 5H5v1h1V5Z" />
                </svg>

                <h1 class="uppercase text-3xl text-center font-extrabold text-gray-900 dark:text-gray-50">
                    {{ substr($title, 0, 7) }}
                </h1>

                <p class="text-lg text-center text-gray-900 dark:text-gray-50">
                    Baca artikel menarik di blog ini.
                </p>
            </div>

            <section class="bg-[#E9E9E9] dark:bg-[#444A54] shadow-inner" id="content">
                <div
                    class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 justify-center items-center gap-7 max-w-6xl px-4 lg:px-0 py-8 mx-auto ">
                    <!--Section: Content-->
                    @foreach ($posts as $post)
                        <div class="bg-white rounded-lg shadow dark:bg-slate-900 h-full">
                            <div class="flex flex-col h-full">
                                <img class="rounded-t-lg object-cover w-full h-[200px]"
                                    src="{{ $post->image ? asset('post_images/' . $post->image) : 'https://source.unsplash.com/1200x680?' . $post->category->name }}"
                                    alt="{{ $post->title }}" />


                                <div class="flex-auto p-4">
                                    <div class="mb-2">
                                        <a href="{{ '/posts/?category=' . $post->category->slug }}"><span
                                                class="bg-blue-100 text-blue-800 text-sm font-medium px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300">{{ $post->category->name }}</span></a>
                                    </div>

                                    <a href="{{ route('post', $post->slug) }}">
                                        <h5
                                            class="mb-2 text-md font-bold tracking-normal leading-[30px] text-gray-900 dark:text-white">
                                            {{ $post->title }}</h5>
                                    </a>
                                </div>

                                <div
                                    class="flex justify-start items-center gap-2 text-gray-700 dark:text-gray-50 py-3 px-5 border-t border-gray-200 dark:border-gray-600">
                                    <img class="rounded-full w-10 h-10"
                                        src="{{ !$post->author->avatar ? 'https://ui-avatars.com/api/?name=' . urlencode($post->author->name) : asset('user_images/' . $post->author->avatar) }}" alt="{{ $post->author->name }}" />
                                    <p class="tracking-normal">{{ $post->author->name }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <!--Section: Content-->
                    
                </div>

                <!-- Pagination -->
                <div class="pb-0 lg:pb-12">
                    {{ $posts->onEachSide(1)->links() }}
                </div>
            </section>
        @else
            <div class="flex flex-col justify-center items-center bg-[#E9E9E9] dark:bg-[#444A54] -mt-4 p-10">
                <img class="object-contain h-72" src="{{ asset('assets/img/404.png') }}" alt="404 Not Found" />
                <button onclick="window.history.back()"
                    class="inline-flex justify-center items-center px-5 py-3 mt-8 text-base font-medium text-center text-gray-50 bg-blue-700 dark:bg-slate-900 dark:hover:bg-slate-900/50 rounded-lg hover:bg-blue-600/90">
                    <svg class="w-5 h-5 mr-2 rotate-180" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                    Kembali
                </button>
            </div>
        @endif
    </main>
@endsection
