@extends('layouts.main')

@push('meta')
<meta name="description" content="Berisi tentang Informasi seputar dunia Web Developer dan juga pengalamlan saya!">
    <meta name="keywords" content="HTML, CSS, JavaScript, Laravel, React, Blog, Mahadi Saputra, Mahadi, Saputra, Dode, Dode Mahadi, Web Developer, Fullstack Web Developer, Front End Web Developer, Back End Web Developer">
    <meta name="author" content="I Dewa Gede Mahadi Saputra">
@endpush

@section('container')
<div class="container max-w-screen-xl mt-24 mx-auto px-4">

  {{ Breadcrumbs::render('categories') }}
  
  <h1 class="mb-8 text-3xl font-extrabold text-gray-900 dark:text-white md:text-5xl lg:text-6xl"><span class="text-transparent bg-clip-text bg-gradient-to-r to-emerald-600 from-sky-400">{{ __('category.categories') }}</span> {{ __('category.categories_y') }}</h1>
  
  <div class="grid grid-cols-1 sm:gap-5 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 auto-rows-max"">
      @foreach ($categories->sortBy('name') as $category)
      <figure class="relative max-w-sm transition-all duration-300 cursor-pointer filter grayscale hover:grayscale-0 mb-4">
        <a href="{{ '/' . app()->getLocale() . '/posts?category=' . $category->slug}}">
          <img class="rounded-lg" src="https://source.unsplash.com/500x500?{{ $category->name }}" alt="{{ $category->name }}">
        </a>
        <figcaption class="absolute px-4 text-xl font-bold text-white bottom-6">
            <p>{{ $category->name }}</p>
        </figcaption>
      </figure>
      @endforeach
  </div>
</div>
@endsection