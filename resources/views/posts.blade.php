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
    <meta property="og:description"
        content="Berisi tentang Informasi seputar dunia Web Developer dan juga pengalamlan saya!">
    <meta property="og:image"
        content="{{ $posts[0]->image ? asset('storage/' . $posts[0]->image) : 'https://source.unsplash.com/1200x600?' . $posts[0]->category->name }}">

    <!-- Twitter Meta Tags -->
    <meta name="twitter:card" content="summary_large_image">
    <meta property="twitter:domain" content="mahadisaputra.my.id">
    <meta property="twitter:url" content="https://mahadisaputra.my.id/">
    <meta name="twitter:title" content="Mahadi Saputra's Blog | {{ $title }}">
    <meta name="twitter:description"
        content="Berisi tentang Informasi seputar dunia Web Developer dan juga pengalamlan saya!">
    <meta name="twitter:image"
        content="{{ $posts[0]->image ? asset('storage/' . $posts[0]->image) : 'https://source.unsplash.com/1200x600?' . $posts[0]->category->name }}">
@endpush

@section('container')

    {{ Breadcrumbs::render('posts') }}

    <main class="container max-w-[70rem] mx-auto px-4 lg:px-0">
        @if ($posts->count())
            <!-- Latest Post -->
            <div class="pb-3" data-aos="fade-up">
                <h1 class="mb-3 text-4xl font-extrabold text-gray-900 dark:text-gray-50 md:text-5xl lg:text-4xl">
                    <span class="text-transparent bg-clip-text bg-gradient-to-r from-sky-400 to-sky-600">
                        {{ substr($title, 0, 7) }}
                    </span>
                    {{ substr($title, 8) }}
                </h1>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-7">
                <!--Section: Latest Content-->
                <section id="latest" data-aos="fade-up">
                    <div class="space-y-3">
                        <a href="{{ '/posts/' . $posts[0]->slug }}">
                            <div class="h-64 bg-cover bg-center">
                                <img class="h-full w-full object-cover rounded-lg"
                                    src="{{ $posts[0]->image ? asset('storage/' . $posts[0]->image) : 'https://source.unsplash.com/1200x600?' . $posts[0]->category->name }}"
                                    alt="{{ $posts[0]->title }}" />

                            </div>
                        </a>
                        <div class="flex justify-between items-center space-y-3">
                            <a href="{{ '/posts/?category=' . $posts[0]->category->slug }}"><span
                                    class="bg-sky-100 text-sky-800 text-sm font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-sky-900 dark:text-sky-300">{{ $posts[0]->category->name }}</span></a>

                            <span
                                class="bg-gray-100 text-gray-800 text-sm font-medium mr-1 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-gray-300">{{ \Carbon\Carbon::parse($posts[0]->created_at)->translatedFormat('d F Y') }}</span>
                        </div>
                        <a href="{{ '/posts/' . $posts[0]->slug }}">
                            <h5
                                class="text-2xl font-bold tracking-tight leading-relaxed text-gray-900 dark:text-gray-50 hover:underline">
                                {{ ucfirst($posts[0]->title) }}</h5>
                        </a>
                        <p class="font-normal text-gray-700 dark:text-gray-400 leading-loose">
                            {!! $posts[0]->excerpt !!}
                        </p>
                        <div class="flex justify-between items-center font-semibold">
                            <div class="inline-flex justify-start items-center gap-2 text-gray-700 dark:text-gray-50">
                                <img class="rounded-full w-8 h-8"
                                    src="{{ !$posts[0]->author->avatar ? 'https://ui-avatars.com/api/?name=' . urlencode($posts[0]->author->name) : asset('user_images/' . $posts[0]->author->avatar) }}" />
                                <p>{{ $posts[0]->author->name }}</p>
                            </div>
                            <a href="{{ '/posts/' . $posts[0]->slug }}"
                                class="inline-flex items-center text-center text-sky-500 hover:underline">
                                {{ __('Selengkapnya') }}
                                <svg aria-hidden="true" class="w-4 h-4 ml-2 -mr-1" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </a>
                        </div>
                    </div>
                </section>
                <!--Section: Latest Content-->

                <!--Section: Content-->
                <section id="content" data-aos="fade-up">
                    @foreach ($posts->skip(1) as $post)
                        <div class="space-y-3 mb-7">
                            <div class="flex justify-between items-center mb-3">
                                <a href="{{ '/posts/?category=' . $post->category->slug }}"><span
                                        class="bg-sky-100 text-sky-800 text-sm font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-sky-900 dark:text-sky-300">{{ $post->category->name }}</span></a>

                                <span
                                    class="bg-gray-100 text-gray-800 text-sm font-medium mr-1 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-gray-300">{{ \Carbon\Carbon::parse($post->created_at)->translatedFormat('d F Y') }}</span>
                            </div>

                            <a href="{{ '/posts/' . $post->slug }}">
                                <h5
                                    class="text-2xl font-bold tracking-tight leading-relaxed text-gray-900 dark:text-gray-50 hover:underline">
                                    {{ ucfirst($post->title) }}</h5>
                            </a>
                            <p class="font-normal leading-loose text-gray-700 dark:text-gray-400">
                                {!! $post->excerpt !!}</p>
                            <div class="flex justify-between items-center text-md font-semibold">
                                <div class="inline-flex justify-start items-center gap-2 text-gray-700 dark:text-gray-50">
                                    <img class="rounded-full w-8 h-8"
                                        src="{{ !$post->author->avatar ? 'https://ui-avatars.com/api/?name=' . urlencode($post->author->name) : asset('user_images/' . $post->author->avatar) }}" />
                                    <p>{{ $post->author->name }}</p>
                                </div>
                                <a href="{{ '/posts/' . $post->slug }}"
                                    class="inline-flex items-center text-center text-sky-500 hover:underline">
                                    {{ __('Selengkapnya') }}
                                    <svg aria-hidden="true" class="w-4 h-4 ml-2 -mr-1" fill="currentColor"
                                        viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </section>
                <!--Section: Content-->
            </div>

            <!-- Pagination -->
            {{ $posts->onEachSide(1)->links() }}
        @else
            <div class="text-center" data-aos="fade-up">
                <h1
                    class="py-5 text-4xl font-extrabold leading-relaxed tracking-tight text-gray-900 md:text-5xl lg:text-6xl dark:text-gray-50">
                    {{ __('posts.not_found') }}</h1>
                <p class="text-lg font-normal leading-loose text-gray-500 lg:text-xl sm:px-16 xl:px-48 dark:text-gray-400">
                    {{ __('posts.not_found_desc') }}</p>
                <button onclick="window.history.back()"
                    class="inline-flex items-center justify-center px-5 py-3 my-5 text-base font-medium text-center text-gray-50 bg-sky-700 rounded-lg hover:bg-sky-800 focus:ring-4 focus:ring-sky-300 dark:focus:ring-sky-900">
                    <svg class="w-5 h-5 mr-2 rotate-180" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                    {{ __('posts.back') }}
                </button>
            </div>
        @endif
    </main>
@endsection
