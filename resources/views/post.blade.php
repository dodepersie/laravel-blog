@extends('layouts.main')

@push('meta')
<meta name="description" content="{{ $post->excerpt }}">
    <meta name="keywords" content="HTML, CSS, JavaScript, Laravel, React, Blog, Mahadi Saputra, Mahadi, Saputra, Dode, Dode Mahadi, Web Developer, Fullstack Web Developer, Front End Web Developer, Back End Web Developer, {{ $post->category->name }}">
    <meta name="author" content="I Dewa Gede Mahadi Saputra">
@endpush

@section('container')

<!-- Breadcrumbs -->
<div class="max-w-screen-xl mt-24 mx-auto">
  {{ Breadcrumbs::render('post', $post) }}

  <!-- Col-->
  <div class="flex flex-col lg:flex-row justify-center w-full gap-7">
    <div class="lg:w-11/12">
      <!--Section: Post Detail-->
      <section>
        <h3 class="text-3xl font-bold dark:text-white mt-5 mb-3">{{ $post->title }}</h3>
    
        <hr class="h-px my-5 bg-gray-200 border-0 dark:bg-gray-700">
  
        <div data-tooltip-target="tooltip-image-alt">
          @if ($post->image)
            <img class="h-auto sm:h-3/5 max-w-full lg:min-w-lg rounded-lg mx-auto" src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}">
          @else
            <img class="h-auto max-w-full rounded-lg mx-auto" src="https://source.unsplash.com/1200x400?{{ $post->category->name }}" alt="{{ $post->title }}">
          @endif
          <div id="tooltip-image-alt" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
            {{ $post->title }}
          </div>
        </div>
  
        <div class="flex flex-col sm:flex-row items-center mt-3 dark:text-white">
          <div class="flex items-center justify-center sm:justify-start">
            @if($post->author->avatar)
            <img src="{{ asset('storage/user-images/' . $post->author->avatar) }}" class="w-10 h-10 rounded" alt="{{ $post->author->name }}" />
            @else
            <img src="/img/noprofile.jpg" class="w-10 h-10 rounded" alt="{{ $post->author->name }}" />
            @endif
            <small class="ml-2 leading-loose">
              {{ __('post.published') }} <u>{{ \Carbon\Carbon::parse($post->created_at)->format('d.m.Y') }}</u>
              {{ __('post.by')}} <a href="{{ '/' . app()->getLocale() . '/posts/?author=' . $post->author->username}}" class="text-blue-500 hover:text-blue-700">{{ $post->author->name }}</a>
              {{ __('post.in') }} <a href="{{ '/' . app()->getLocale() . '/posts/?category=' . $post->category->slug}}" class="text-blue-500 hover:text-blue-700">{{ $post->category->name }}</a>
            </small>
          </div>
        </div> 
      </section>
      <!--Section: Post Detail-->
  
      <hr class="h-px mt-3 mb-5 bg-gray-200 border-0 dark:bg-gray-700">
  
      <!--Section: Text-->
      <section class="revert-list font-normal leading-loose text-gray-900 dark:text-white select-none">
        {!! $post->body !!}
      </section>
      <!--Section: Text-->
  
      <hr class="h-px my-5 bg-gray-200 border-0 dark:bg-gray-700">
  
      <!--Section: Author-->
      <section class="flex flex-col sm:flex-row items-center mt-5 pb-auto md:pb-2 dark:text-white leading-loose">
        <div class="flex items-center justify-center sm:justify-start mb-3 sm:mb-0 gap-4">
  
          @if($post->author->avatar)
          <img src="{{ asset('storage/user-images/' . $post->author->avatar) }}" class="w-40 h-40 rounded" alt="{{ $post->author->name }}" data-tooltip-target="tooltip-author" />
          @else
          <img src="/img/noprofile.jpg" class="w-40 h-40 rounded" alt="{{ $post->author->name }}" data-tooltip-target="tooltip-author" />
          @endif
  
          <div id="tooltip-author" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
            {{ __('post.author') . ': ' . $post->author->name . ' - ' . __('post.joined') . ' ' . $post->author->created_at->diffForHumans() }}
          </div>
  
          <span>
            <p class="hidden sm:block mb-2 font-bold">{{ $post->author->name }}</p>
            <p class="hidden sm:block mb-4 lg:mb-0 ">
                {{ $post->author->description }}
            </p>
          </span>
        </div>
        <p class="sm:hidden mb-2 font-bold">{{ $post->author->name }}</p>
        <p class="sm:hidden mb-0 text-center">
          {{ $post->author->description }}
        </p>
      </section>
      <!--Section: Author-->
  
      <hr class="h-px my-5 bg-gray-200 border-0 dark:bg-gray-700">
  
      <!--Section: Comments-->
      <section class="border-bottom mb-3 text-gray-700 dark:text-white">
        <p class="text-left mb-5">
          <strong>
            @if(count($post->comments) == 0)
              {{ __('post.no_comment') }}
            @elseif(count($post->comments) > 1)
              {{ count($post->comments) }} {{ __('post.comments') }} {{ __('post.on') }} {{ $post->title }}
            @else
              {{ count($post->comments) }} {{ __('post.comment') }} {{ __('post.on') }} {{ $post->title }}
            @endif
          </strong>
        </p>
  
        <!-- Alert -->
        @if ($errors->has('comment_message'))
        <div class="flex p-4 mb-5 text-sm text-red-800 border border-red-300 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400 dark:border-red-800" role="alert">
          <svg aria-hidden="true" class="flex-shrink-0 inline w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
          <span class="sr-only">Info</span>
          <div>
            {{ $errors->first('comment_message') }}
          </div>
        </div>
        @endif
        
        @if(session()->has('comment_force_edit_error'))
        <div class="flex p-4 mb-5 text-sm text-red-800 border border-red-300 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400 dark:border-red-800" role="alert">
          <svg aria-hidden="true" class="flex-shrink-0 inline w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
          <span class="sr-only">Info</span>
          <div>
            {{ session('comment_force_edit_error') }}
          </div>
        </div>
        @endif
  
        @if(session()->has('comment_success'))
        <div class="flex p-4 mb-5 text-sm text-green-800 border border-green-300 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400 dark:border-green-800" role="alert">
          <svg aria-hidden="true" class="flex-shrink-0 inline w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
          <span class="sr-only">Info</span>
          <div>
            {{ session('comment_success') }}
          </div>
        </div>
        @endif
        <!-- Alert -->
  
        <!-- Comment -->
        @foreach($post->comments->where('comment_parent_id', 0) as $comment)
        <div class="flex flex-row mb-1">
          <div class="w-16 md:w-1/12">
            @if(!$comment->comment_avatar)
            <img src="/storage/user-images/{{ $comment->commentar_avatar }}" class="object-cover rounded" alt="{{ $comment->comment_user_name }}" />
            @else
            <img src="/storage/user-images/{{ $comment->comment_avatar }}" class="object-cover rounded" alt="{{ $comment->comment_user_name }}" />
            @endif
          </div>    
  
          <div class="w-11/12 ml-5 mb-5">
            <p class="mb-2 text-gray-900 dark:text-white">
              <strong>
                {{ $comment->comment_user_name }}
              </strong>
  
              @if($comment->comment_user_id === $post->user_id)
              <span class="bg-blue-100 text-blue-800 text-sm font-medium mr-1 px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300">{{ __('post.author') }}</span>
              @endif
  
              <small title="{{ __('post.comment_at') }} {{ $comment->created_at }}">
                {{ $comment->created_at->diffForHumans() }}
              </small>
            </p>
            <div class="revert-list text-gray-900 dark:text-white">
              <p class="leading-loose">{!! $comment->comment_message !!}</p>
            </div>
  
            <!-- Reply section-->
            @if(count($comment->childs) == 0)
            @else
            <div class="mt-2 p-4 pb-0 bg-gray-100 dark:bg-gray-700 rounded-lg text-gray-900 dark:text-white text-base shadow-md">
            @foreach($comment->childs as $child)
            <div class="flex flex-space-1">

              <div class="w-16 md:w-1/12 mr-3 hidden md:block">
                @if(!$child->comment_avatar)
                <img src="/storage/user-images/{{ $child->commentar_avatar }}" class="object-cover rounded" alt="{{ $child->comment_user_name }}" />
                @else
                <img src="/storage/user-images/{{ $child->comment_avatar }}" class="object-cover rounded" alt="{{ $child->comment_user_name }}" />
                @endif
              </div>  

              <div class="mb-2 w-full">
                <span>
                  <strong>
                    {{ $child->comment_user_name }}
                  </strong>

                  @if($child->comment_user_id === $post->user_id)
                  <span class="bg-blue-100 text-blue-800 text-sm font-medium mr-1 px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300">@lang('post.author')</span>
                  @endif

                <small title="{{ __('post.replied_at') . $child->created_at }}">
                  {{ $child->created_at->diffForHumans() }}
                </small>

                <div class="revert-list bg-gray-200 dark:bg-gray-800 dark:text-white p-4 m-3 ml-0 rounded-lg">
                    <p class="leading-loose">{!! $child->comment_message !!}</p>
                </div>
              </span>
            </div>
            </div>
            @endforeach
            </div>
            @endif

            <div>
              <!-- Reply button-->
              <button type="button" class="comment-btn text-white bg-[#2557D6] hover:bg-[#2557D6]/90 focus:ring-4 focus:ring-[#2557D6]/50 focus:outline-none font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:focus:ring-[#2557D6]/50 m-4 mb-0 ml-0">
                {{ __('post.reply') }}
              </button>
  
              @guest
              <form action="" method="post" style="display:none;" class="comment-message mt-4">
                @csrf
                <!-- Name input -->
                <div class="mb-3">
                  <label for="comment_user_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('post.your_name') }}</label>
                  <input type="text" id="comment_user_name" name="comment_user_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Martin Garrix" required>
                </div>
  
                <!-- Email input -->
                <div class="mb-3">
                  <label for="comment_user_email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('post.your_email') }}</label>
                  <input type="email" id="comment_user_email" name="comment_user_email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="name@company.com" required>
                </div>
  
                <!-- Required Input -->
                <input type="hidden" name="post_id" id="post_id" value={{ $post->id }} />
                <input type="hidden" id="comment_parent_id" name="comment_parent_id" value={{ $comment->id }} />
                <input type="hidden" id="comment_avatar" name="comment_avatar" value="noprofile.jpg" />
                <input type="hidden" id="comment_user_id" name="comment_user_id" value="0" />
  
                <!-- Message input -->
                <div class="w-full mb-3 border border-gray-200 rounded-lg bg-gray-50 dark:bg-gray-700 dark:border-gray-600">
                  <div class="px-4 py-2 bg-white rounded-t-lg dark:bg-gray-800">
                      <label for="comment" class="sr-only">{{ __('post.comment_button') }}</label>
                      <textarea id="comment_message" name="comment_message" rows="4" class="w-full px-0 text-sm text-gray-900 bg-white border-0 dark:bg-gray-800 focus:ring-0 dark:text-white dark:placeholder-gray-400" placeholder="Lorem ipsum dolor sit amet consectetur adipisicing elit. Amet, officia!" required></textarea>
                  </div>
                  <div class="flex items-center justify-between px-3 py-2 border-t dark:border-gray-600">
                      <button type="submit" class="inline-flex items-center py-2.5 px-4 text-xs font-medium text-center text-white bg-blue-700 rounded-lg focus:ring-4 focus:ring-blue-200 dark:focus:ring-blue-900 hover:bg-blue-800">
                        {{ __('post.post_comment') }}
                      </button>
                  </div>
                </div>
              </form>
              @else
              <form action="" method="post" style="display:none;" class="comment-message mt-4">
                @csrf
                <!-- Required Input -->
                <input type="hidden" name="comment_user_name" id="comment_user_name" value="{{ Auth::user()->name }}" />
                <input type="hidden" name="comment_user_email" id="comment_user_email" value={{ Auth::user()->email }} />
                <input type="hidden" name="post_id" id="post_id" value={{ $post->id }} />
                <input type="hidden" id="comment_parent_id" name="comment_parent_id" value={{ $comment->id }} />
                <input type="hidden" id="comment_avatar" name="comment_avatar" value="{{ Auth::user()->avatar ? Auth::user()->avatar : 'noprofile.jpg' }}" />
                <input type="hidden" id="comment_user_id" name="comment_user_id" value="{{ Auth::user()->id }}" />
        
                <!-- Message input -->
                <div class="w-full mb-3 border border-gray-200 rounded-lg bg-gray-50 dark:bg-gray-700 dark:border-gray-600">
                  <div class="px-4 py-2 bg-white rounded-t-lg dark:bg-gray-800">
                      <label for="comment" class="sr-only">Comment</label>
                      <textarea id="comment_message" name="comment_message" rows="4" class="w-full px-0 text-sm text-gray-900 bg-white border-0 dark:bg-gray-800 focus:ring-0 dark:text-white dark:placeholder-gray-400" placeholder="Lorem ipsum dolor sit amet consectetur adipisicing elit. Amet, officia!" required></textarea>
                  </div>
                  <div class="flex items-center justify-between px-3 py-2 border-t dark:border-gray-600">
                      <button type="submit" class="inline-flex items-center py-2.5 px-4 text-xs font-medium text-center text-white bg-blue-700 rounded-lg focus:ring-4 focus:ring-blue-200 dark:focus:ring-blue-900 hover:bg-blue-800">
                          {{ __('post.post_comment') }}
                      </button>
                  </div>
                </div>
              </form>
              @endguest
            </div>  
          </div>
        </div>
        @endforeach
      </section>
      <!--Section: Comments-->
  
      <hr class="h-px mb-5 bg-gray-200 border-0 dark:bg-gray-700">
  
      <!--Section: Comment Form-->
      <section>
        <!-- Comment button-->
        <button type="button" class="comment-btn text-white bg-[#2557D6] hover:bg-[#2557D6]/90 focus:ring-4 focus:ring-[#2557D6]/50 focus:outline-none font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:focus:ring-[#2557D6]/50 m-0">
          {{ __('post.comment_button') }}
        </button>
  
        @guest
        <form action="" method="post" style="display: none;" class="comment-message mt-4">
          @csrf
          <div class="flex p-4 mb-4 mt-2 text-sm text-blue-800 border border-blue-300 rounded-lg bg-blue-50 dark:bg-gray-800 dark:text-blue-400 dark:border-blue-800" role="alert">
            <svg aria-hidden="true" class="flex-shrink-0 inline w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
            <span class="sr-only">Info</span>
            <div>
              {{ __('post.comment_info') }}
            </div>
          </div>
  
          <!-- Name input -->
          <div class="mb-3">
            <label for="comment_user_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('post.your_name') }}</label>
            <input type="text" id="comment_user_name" name="comment_user_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Martin Garrix" required>
          </div>
  
          <!-- Email input -->
          <div class="mb-3">
            <label for="comment_user_email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('post.your_email') }}</label>
            <input type="email" id="comment_user_email" name="comment_user_email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="name@company.com" required>
          </div>
  
          <!-- Required Input -->
          <input type="hidden" name="post_id" id="post_id" value={{ $post->id }} />
          <input type="hidden" id="comment_parent_id" name="comment_parent_id" value="0" />
          <input type="hidden" id="comment_avatar" name="comment_avatar" value="noprofile.jpg" />
          <input type="hidden" id="comment_user_id" name="comment_user_id" value="0" />
  
          <!-- Message input -->
          <div class="w-full mb-3 border border-gray-200 rounded-lg bg-gray-50 dark:bg-gray-700 dark:border-gray-600">
            <div class="px-4 py-2 bg-white rounded-t-lg dark:bg-gray-800">
                <label for="comment" class="sr-only">{{ __('post.comment_button') }}</label>
                <textarea id="comment_message" name="comment_message" rows="4" class="w-full px-0 text-sm text-gray-900 bg-white border-0 dark:bg-gray-800 focus:ring-0 dark:text-white dark:placeholder-gray-400" placeholder="Lorem ipsum dolor sit amet consectetur adipisicing elit. Amet, officia!" required></textarea>
            </div>
            <div class="flex items-center justify-between px-3 py-2 border-t dark:border-gray-600">
                <button type="submit" class="inline-flex items-center py-2.5 px-4 text-xs font-medium text-center text-white bg-blue-700 rounded-lg focus:ring-4 focus:ring-blue-200 dark:focus:ring-blue-900 hover:bg-blue-800">
                    {{ __('post.post_comment') }}
                </button>
            </div>
        </div>
        </form>
        @else
        <form action="" method="post" style="display:none;" class="comment-message mt-4">
          @csrf
          <!-- Required Input -->
          <input type="hidden" name="comment_user_name" id="comment_user_name" value="{{ Auth::user()->name }}" />
          <input type="hidden" name="comment_user_email" id="comment_user_email" value={{ Auth::user()->email }} />
          <input type="hidden" name="post_id" id="post_id" value={{ $post->id }} />
          <input type="hidden" id="comment_parent_id" name="comment_parent_id" value="0" />
          <input type="hidden" id="comment_avatar" name="comment_avatar" value="{{ Auth::user()->avatar ? Auth::user()->avatar : 'noprofile.jpg' }}" />
          <input type="hidden" id="comment_user_id" name="comment_user_id" value="{{ Auth::user()->id }}" />
  
          <div class="w-full mb-3 border border-gray-200 rounded-lg bg-gray-50 dark:bg-gray-700 dark:border-gray-600">
              <div class="px-4 py-2 bg-white rounded-t-lg dark:bg-gray-800">
                  <label for="comment" class="sr-only">Comment</label>
                  <textarea id="comment_message" name="comment_message" rows="4" class="w-full px-0 text-sm text-gray-900 bg-white border-0 dark:bg-gray-800 focus:ring-0 dark:text-white dark:placeholder-gray-400" placeholder="Lorem ipsum dolor sit amet consectetur adipisicing elit. Amet, officia!" required></textarea>
              </div>
              <div class="flex items-center justify-between px-3 py-2 border-t dark:border-gray-600">
                  <!-- Send comment button-->
                  <button type="submit" class="inline-flex items-center py-2.5 px-4 text-xs font-medium text-center text-white bg-blue-700 rounded-lg focus:ring-4 focus:ring-blue-200 dark:focus:ring-blue-900 hover:bg-blue-800">
                      {{ __('post.post_comment') }}
                  </button>
              </div>
          </div>
        </form>
        @endguest
      </section>
      <!--Section: Comment Form-->
    </div>
  
    <div class="lg:w-1/3">
      <!-- Side -->
      <section class="sticky grid grid-cols-1 md:grid-cols-2 lg:grid-cols-1 gap-3 md:gap-5 lg:gap-3" style="top: 85px;">
        <!--Section: Latest Post -->
        <section class="text-left pb-4 mb-2">  
          <h5 class="text-xl font-bold dark:text-white mb-3">{{ __('post.side_1') }}</h5>
          
          <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
            <a href="{{ '/' . app()->getLocale() . '/posts/' . $posts->slug }}">
                @if ($posts->image)
                <div style="max-height: 180px; background-size: cover;" class="hover:opacity-75 rounded-t-lg overflow-hidden">
                  <img src="{{ asset('storage/' . $posts->image) }}" class="object-cover w-full h-full" alt="{{ $posts->title }}">
                </div>
                @else
                <div style="max-height: 150px; background-size: cover;" class="hover:opacity-75 rounded-t-lg overflow-hidden">
                  <img src="https://source.unsplash.com/1200x400?{{ $posts->category->name }}" class="object-cover w-full h-full" alt="{{ $posts->title }}">
                </div>
                @endif
            </a>
            <div class="p-5">
                <a href="#">
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $posts->title }}</h5>
                </a>
                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400 truncate">{{ $posts->excerpt }}</p>
                <a href="{{ '/' . app()->getLocale() . '/posts/' . $posts->slug }}" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    {{ __('posts.readmore') }}
                    <svg aria-hidden="true" class="w-4 h-4 ml-2 -mr-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                </a>
            </div>
          </div>
        </section>
        <!--Section: Latest Post -->
  
        <!--Section: Video-->
        <section class="text-left pb-4 mb-2">  
          <h5 class="text-xl font-bold dark:text-white mb-3">{{ __('post.side_2') }}</h5>
          
          <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
            <iframe class="w-full h-full" src="https://www.youtube.com/embed/mnwj6KxAvFc" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
            <div class="p-5">
              <h5 class="mb-2 text-xl font-bold tracking-tight text-gray-900 dark:text-white">Best Cover of</h5>
              <p class="font-normal text-gray-700 dark:text-gray-400 truncate">Harutya 春茶</p>
            </div>
        </section>
        <!--Section: Video--> 
      </section>
    </div>
  </div>
  <!-- Col -->
</div>

@endsection

@push('script')
<script>
      $(document).ready(function(){
        $(".comment-btn").click(function(){
          // close all other open reply forms
          $(".comment-message").not($(this).next(".comment-message")).slideUp();
          // toggle the reply form for the current button
          $(this).next(".comment-message").slideToggle();
        });
      });
    </script>
@endpush