@extends('layouts.main')

@push('meta')
<meta name="description" content="Berisi tentang Informasi seputar dunia Web Developer dan juga pengalamlan saya!">
    <meta name="keywords" content="HTML, CSS, JavaScript, Laravel, React, Blog, Mahadi Saputra, Mahadi, Saputra, Dode, Dode Mahadi, Web Developer, Fullstack Web Developer, Front End Web Developer, Back End Web Developer">
    <meta name="author" content="I Dewa Gede Mahadi Saputra">
@endpush

@section('container')
<main class="container max-w-screen-xl mt-24 mx-auto px-4">
@if ($posts->count())
    
    {{ Breadcrumbs::render('posts') }}

    <!-- Latest Post -->
    <div class="w-full bg-white border border-gray-200 rounded-lg dark:bg-gray-800 dark:border-gray-700 shadow-sm shadow-gray-500/50 dark:shadow-sm mb-3">
        <a href="{{ '/' . app()->getLocale() . '/posts/' . $posts[0]->slug }}">
          @if($posts[0]->image)
          <div class="h-64 bg-cover bg-center">
            <img class="h-full w-full object-cover rounded-t-lg" src="{{ asset('storage/' . $posts[0]->image) }}" alt="{{ $posts[0]->title }}" />
          </div>          
          @else
          <div class="h-64 bg-cover bg-center">
            <img class="h-full w-full object-cover rounded-t-lg" src="https://source.unsplash.com/1200x600?{{ $posts[0]->category->name }}" alt="{{ $posts[0]->title }}" />
          </div>
          @endif
      </a>
      <div class="p-5">
          <div class="mb-3">
            <a href="{{ '/' . app()->getLocale() . '/posts/?category=' . $posts[0]->category->slug }}"><span class="bg-blue-100 text-blue-800 text-sm font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300">{{ $posts[0]->category->name }}</span></a>

            <span class="bg-gray-100 text-gray-800 text-sm font-medium mr-1 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-gray-300">{{ \Carbon\Carbon::parse($posts[0]->created_at)->format('d.m.Y') }}</span>
          </div>
          <a href="{{ '/' . app()->getLocale() . '/posts/' . $posts[0]->slug }}">
              <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $posts[0]->title }}</h5>
          </a>
          <p class="mb-3 font-normal text-gray-700 dark:text-gray-400 leading-loose">{{ $posts[0]->excerpt }}</p>
          <a href="{{ '/' . app()->getLocale() . '/posts/' . $posts[0]->slug }}" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
              {{ __('posts.readmore') }}
              <svg aria-hidden="true" class="w-4 h-4 ml-2 -mr-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
          </a>
      </div>
    </div>

    <!--Section: Content-->
    <section>
      <div class="grid grid-cols-1 sm:gap-5 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 auto-rows-max">
      @foreach($posts->skip(1) as $post)
      <div class="w-full bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 mt-4">
        <a href="{{'/' . app()->getLocale() . '/posts/' . $post->slug }}">
            @if($post->image)
            <div class="h-56 bg-cover bg-center">
              <img class="h-full w-full object-cover rounded-t-lg" src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}" />
            </div>      
            @else
            <img class="rounded-t-lg" src="https://source.unsplash.com/1200x600?{{ $post->category->name }}" alt="{{ $post->title }}" />
            @endif
        </a>
        <div class="p-5">
            <div class="mb-3">
              <a href="{{ '/' . app()->getLocale() . '/posts/?category=' . $post->category->slug }}"><span class="bg-blue-100 text-blue-800 text-sm font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300">{{ $post->category->name }}</span></a>
              
              <span class="bg-gray-100 text-gray-800 text-sm font-medium mr-1 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-gray-300 mb-2">{{ \Carbon\Carbon::parse($post->created_at)->format('d.m.Y') }}</span>
            </div>
            
            <a href="{{'/' . app()->getLocale() . '/posts/' . $post->slug }}">
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $post->title }}</h5>
            </a>
            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400 truncate">{{ $post->excerpt }}</p>
            <a href="{{'/' . app()->getLocale() . '/posts/' . $post->slug }}" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                {{ __('posts.readmore') }}
                <svg aria-hidden="true" class="w-4 h-4 ml-2 -mr-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
            </a>
        </div>
      </div>
      @endforeach
      </div>
    </section>
    <!--Section: Content-->

    <!-- Pagination -->
    {{ $posts->links('partials.paginator') }}

    @else
    
    <div class="text-center">
      <h1 class="mb-4 text-4xl font-extrabold leading-none tracking-tight text-gray-900 md:text-5xl lg:text-6xl dark:text-white">{{ __('posts.not_found') }}</h1>
      <p class="mb-6 text-lg font-normal text-gray-500 lg:text-xl sm:px-16 xl:px-48 dark:text-gray-400">{{ __('posts.not_found_desc') }}</p>
      <button onclick="window.history.back()"class="inline-flex items-center justify-center px-5 py-3 text-base font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 dark:focus:ring-blue-900">
        <svg class="w-5 h-5 mr-2 rotate-180" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
        {{ __('posts.back') }}
      </button>
    </div>
    
</main>
@endif
@endsection