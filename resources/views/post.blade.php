@extends('layouts.main')

@push('meta')
    <meta name="description" content="{{ $post->excerpt }}">
    <meta name="keywords"
        content="HTML, CSS, JavaScript, Laravel, React, Blog, Mahadi Saputra, Mahadi, Saputra, Dode, Dode Mahadi, Web Developer, Fullstack Web Developer, Front End Web Developer, Back End Web Developer, {{ $post->category->name }}">
    <meta name="author" content="I Dewa Gede Mahadi Saputra, {{ $post->author->name }}">
@endpush

@push('swal_delete')
    <script type="text/javascript">
        $(function() {
            $(document).on('click', '#delete_comment', function(e) {
                e.preventDefault();
                e.stopPropagation();
                var button = $(this);
                Swal.fire({
                    title: '{{ __('post.are_you_sure') }}',
                    text: "{{ __('post.you_wont_be_able_to_revert_this') }}",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: '{{ __('post.yes_delete_it') }}'
                }).then((result) => {
                    if (result.isConfirmed) {
                        Swal.fire(
                            '{{ __('post.deleted') }}',
                            '{{ __('post.your_comment_has_been_deleted') }}',
                            'success'
                        ).then(() => {
                            button.closest('form')
                                .submit();
                        });
                    }
                });
            });
        });
    </script>
@endpush

@section('container')
    <div class="border-b border-gray-100 dark:border-gray-700">
        {{ Breadcrumbs::render('post', $post) }}
        <div class="-mt-24 lg:mt-[-9rem] max-w-[74.5rem] mx-auto">
            <div class="relative isolate pt-14">
                <div class="absolute inset-x-0 -top-40 -z-10 transform-gpu overflow-hidden blur-3xl sm:-top-80">
                    <div class="relative left-[calc(50%-11rem)] aspect-[1155/678] w-[36.125rem] -translate-x-1/2 rotate-[30deg] bg-gradient-to-tr from-sky-800/90 to-blue-800/90 opacity-20 sm:left-[calc(50%-30rem)] sm:w-[72.1875rem]"
                        style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%);">
                    </div>
                </div>

                <div class="mx-auto max-w-7xl pt-16 sm:px-6 sm:py-24 md:flex md:justify-between md:items-center md:gap-x-10 md:px-8 md:py-40">
                    <div class="mx-auto max-w-2xl px-4 lg:mx-0 lg:flex-auto lg:px-0">
                        <div
                            class="inline-flex items-center rounded-full border px-2.5 py-0.5 text-xs tracking-tight font-medium transition-colors focus:outline-none focus:ring-2 focus:ring-ring focus:ring-offset-2 border-transparent bg-sky-500/10 text-sky-500 mb-4">
                            <a
                                href="{{ '/' . app()->getLocale() . '/posts/?category=' . $post->category->slug }}">{{ $post->category->name }}</a>
                        </div>
                        <h1
                            class="max-w-lg text-2xl font-bold tracking-tighter text-gray-900 dark:text-gray-50 sm:text-3xl md:text-4xl">
                            {{ $post->title }}</h1>
                        <p
                            class="mt-2 max-w-xl leading-relaxed text-gray-600 dark:text-gray-400 sm:mt-6 sm:text-lg sm:leading-7">
                            {!! $post->excerpt !!}</p>
                        <p class="mt-8 tracking-tighter text-gray-600 dark:text-gray-400">
                            {{ __('post.published') }}
                            {{ \Carbon\Carbon::parse($post->created_at)->format('d F Y') }}
                            {{ __('post.by') }} <a
                                href="{{ '/' . app()->getLocale() . '/posts/?author=' . $post->author->username }}"
                                class="text-sky-500 hover:text-sky-700">{{ $post->author->name }}</a></p>
                    </div>

                    <div class="mt-6 sm:mt-16 md:mt-24 lg:mt-0 p-4 object-cover" data-tooltip-target="tooltip-image-alt">
                        <img class="w-full lg:max-w-xl rounded-lg bg-cover"
                            src="{{ $post->image ? asset('storage/' . $post->image) : 'https://source.unsplash.com/500x285?' . $post->category->name }}"
                            alt="{{ ucfirst($post->title) }}">


                        <div id="tooltip-image-alt" role="tooltip"
                            class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-gray-50 transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                            {{ ucfirst($post->title) }}
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <main class="relative container max-w-[74.5rem] mx-auto px-4 lg:px-0 text-xl">
        <!-- Col-->
        <div
            class="flex flex-col lg:flex-row justify-start items-start gap-6 w-full mx-auto pt-10 sm:px-6 lg:px-8">
            <!-- Content -->
            <div class="w-full lg:w-[70%]">

                <!--Section: Text-->
                <section class="content font-normal text-lg leading-loose text-gray-900 dark:text-gray-50 pb-5">
                    {!! $post->body !!}
                </section>
                <!--Section: Text-->

                <!--Section: Related Posts-->
                <section class="font-normal leading-loose text-gray-900 dark:text-gray-50 mt-2 space-y-2">
                    <div class="border border-gray-300 dark:border-gray-700 rounded-lg">
                        <div class="mb-3 border-b border-gray-300 dark:border-gray-700 p-4">
                            <h1 class="text-2xl font-bold dark:text-gray-50 mb-3 ">
                                {{ __('post.related') }}</h1>

                            <p class="text-gray-500 dark:text-gray-400">{{ __('post.related_desc') }}</p>
                        </div>

                        <ol class="grid gap-x-16 gap-y-3 sm:grid-cols-2 text-sm sm:text-[0.95rem] p-4">
                            @forelse($related_posts->take(20) as $related_posts)
                                <li class="mb-2 truncate">
                                    <a href="{{ $related_posts->slug }}"
                                        class="text-gray-500 hover:text-black dark:text-gray-400 hover:dark:text-gray-50">{{ $related_posts->title }}</a>
                                </li>
                            @empty
                                <li>{{ __('post.no_related_post') }}</li>
                            @endforelse
                        </ol>
                    </div>
                </section>
                <!--Section: Related Post-->

                <!--Section: Author-->
                <section class="mt-5 pb-auto md:pb-2 dark:text-gray-50 leading-loose">
                    <div
                        class="flex items-center mb-3 sm:mb-0 gap-4 border border-gray-300 dark:border-gray-700 p-4 rounded-lg">
                        <div class="text-left">
                            <p class="mb-2 font-bold">{{ $post->author->name }}</p>
                            <p class="mb-0">
                                {{ $post->author->description }}
                            </p>
                        </div>

                        <img src="{{ $post->author->avatar ? asset('user_images/' . $post->author->avatar) : 'https://ui-avatars.com/api/?name=' . urlencode($post->author->name) }}"
                            class="w-14 h-14 rounded-full" alt="{{ $post->author->name }}"
                            data-tooltip-target="tooltip-author" />

                        <div id="tooltip-author" role="tooltip"
                            class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-gray-50 transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                            {{ __('post.author') . ': ' . $post->author->name . ' - ' . __('post.joined') . ' ' . $post->author->created_at->diffForHumans() }}
                        </div>

                    </div>
                </section>
                <!--Section: Author-->

                <!--Section: Comments-->
                <section class="mt-3 text-gray-700 dark:text-gray-50" id="comments">
                    <div class="border border-gray-300 dark:border-gray-700 rounded-lg">
                        <div class="border-b border-gray-300 dark:border-gray-700 text-xl p-4 mb-5">
                            <strong>
                                @if (count($post->comments) == 0)
                                    {{ __('post.no_comment') }}
                                @elseif(count($post->comments) > 1)
                                    {{ count($post->comments) }} {{ __('post.comments') }} {{ __('post.on') }}
                                    {{ ucfirst($post->title) }}
                                @else
                                    {{ count($post->comments) }} {{ __('post.comment') }} {{ __('post.on') }}
                                    {{ ucfirst($post->title) }}
                                @endif
                            </strong>
                        </div>

                        @if (session()->has('comment_force_edit_error'))
                            <!-- Alert -->
                            <div class="pb-4 px-4">
                                <div class="flex p-4 my-5 text-sm text-red-800 border border-red-300 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400 dark:border-red-800"
                                    role="alert">
                                    <svg aria-hidden="true" class="flex-shrink-0 inline w-5 h-5 mr-3" fill="currentColor"
                                        viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                    <span class="sr-only">Info</span>
                                    <div>
                                        {{ session('comment_force_edit_error') }}
                                    </div>
                                </div>
                            </div>
                            <!-- Alert -->
                        @endif

                        @if (session()->has('success'))
                            <!-- Alert -->
                            <div class="pb-4 px-4">
                                <div class="flex p-4 text-sm text-green-800 border border-green-300 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400 dark:border-green-800"
                                    role="alert">
                                    <svg aria-hidden="true" class="flex-shrink-0 inline w-5 h-5 mr-3" fill="currentColor"
                                        viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                    <span class="sr-only">Info</span>
                                    <div>
                                        {{ session('success') }}
                                    </div>
                                </div>
                            </div>
                            <!-- Alert -->
                        @endif

                        <!-- Comment -->
                        <div class="px-4">
                            @foreach ($comments as $comment)
                                <div class="flex items-start">
                                    <div class="w-16">
                                        <div>
                                            @if (!$comment->comment_avatar)
                                                <img src="https://ui-avatars.com/api/?name={{ $comment->comment_user_name }}"
                                                    class="object-cover rounded" alt="{{ $comment->comment_user_name }}" />
                                            @else
                                                <img src="/{{ $comment->comment_avatar }}" class="object-cover rounded"
                                                    alt="{{ $comment->comment_user_name }}" />
                                            @endif
                                        </div>

                                    </div>

                                    <div class="w-11/12 ms-3 mb-5">
                                        <div class="flex justify-start items-center mb-2 space-x-1">
                                            <div class="inline-flex items-center text-gray-900 dark:text-gray-50">
                                                <span class="font-bold">
                                                    {{ $comment->comment_user_name }}
                                                </span>
                                            </div>

                                            <div class="inline-flex items-center text-xs">
                                                @if ($comment->comment_user_id === $post->user_id)
                                                    <div
                                                        class="bg-sky-100 text-sky-800 mx-1.5 px-1.5 py-0.5 rounded dark:bg-sky-900 dark:text-sky-300">
                                                        {{ __('post.author') }}
                                                    </div>
                                                @endif

                                                <div>
                                                    {{ $comment->created_at->diffForHumans() }}
                                                </div>

                                                @auth
                                                    @if (intval($comment->comment_user_id) === auth()->user()->id)
                                                        <form method="POST">
                                                            @method('delete')
                                                            @csrf
                                                            <input type="hidden" name="comment_id"
                                                                value="{{ $comment->id }}">
                                                            <button type="submit"><span
                                                                    class="material-symbols-outlined text-red-500 mt-1 mx-1"
                                                                    style="font-size: 20px;" id="delete_comment">
                                                                    delete
                                                                </span></button>
                                                        </form>
                                                    @endif
                                                @endauth
                                            </div>
                                        </div>

                                        <div class="text-gray-900 dark:text-gray-50 leading-loose">
                                            {!! clean($comment->comment_message) !!}
                                        </div>

                                        <!-- Reply section-->
                                        @if (count($comment->childs) > 0)
                                            <div
                                                class="my-3 p-4 pb-1 bg-gray-100 dark:bg-gray-700 rounded-lg text-gray-900 dark:text-gray-50 leading-loose">
                                                @foreach ($comment->childs as $child)
                                                    <div class="flex justify-start items-center pb-2">
                                                        <div class="w-16 me-3">
                                                            @if (!$child->comment_avatar)
                                                                <img src="https://ui-avatars.com/api/?name={{ $child->comment_user_name }}"
                                                                    class="object-cover rounded"
                                                                    alt="{{ $child->comment_user_name }}" />
                                                            @else
                                                                <img src="/{{ $child->comment_avatar }}"
                                                                    class="object-cover rounded"
                                                                    alt="{{ $child->comment_user_name }}" />
                                                            @endif
                                                        </div>

                                                        <div class="w-full">
                                                            <div
                                                                class="inline-flex justify-start items-center gap-1 mb-2 text-gray-900 dark:text-gray-50">

                                                                <div class="font-bold">
                                                                    {{ $child->comment_user_name }}
                                                                </div>

                                                                @auth
                                                                    <div>
                                                                        @if (intval($child->comment_user_id) === auth()->user()->id)
                                                                            <form method="POST">
                                                                                @method('delete')
                                                                                @csrf
                                                                                <input type="hidden" name="comment_id"
                                                                                    value="{{ $child->id }}">
                                                                                <button type="submit"><span
                                                                                        class="material-symbols-outlined text-red-500 mt-1"
                                                                                        style="font-size: 20px;"
                                                                                        id="delete_comment">
                                                                                        delete
                                                                                    </span></button>
                                                                            </form>
                                                                        @endif
                                                                    </div>
                                                                @endauth
                                                            </div>

                                                            <div class="flex justify-start items-center text-xs mb-3">
                                                                @if ($child->comment_user_id === $post->user_id)
                                                                    <div
                                                                        class="bg-sky-100 text-sky-800 mr-1 px-1.5 py-0.5 rounded dark:bg-sky-900 dark:text-sky-300">
                                                                        {{ __('post.author') }}
                                                                    </div>
                                                                @endif

                                                                <div>
                                                                    {{ $child->created_at->diffForHumans() }}
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div
                                                        class=" bg-gray-200 dark:bg-gray-800 dark:text-gray-50 p-4 mb-5 rounded-lg w-full">
                                                        <p class="leading-loose">{!! clean($child->comment_message) !!}</p>
                                                    </div>
                                                @endforeach
                                            </div>
                                        @endif

                                        <div>
                                            <!-- Reply button-->
                                            <button type="button"
                                                class="comment-btn px-3 py-2 text-xs font-medium text-center rounded-lg text-gray-50 bg-sky-700 hover:bg-sky-800 dark:bg-sky-600 dark:hover:bg-sky-700 my-2">
                                                {{ __('post.reply') }}
                                            </button>

                                            <div class="comment-message" style="display:none;">
                                                @guest
                                                    <div class="flex p-4 mt-4 text-sm text-sky-800 border border-sky-300 rounded-lg bg-sky-50 dark:bg-gray-800 dark:text-sky-400 dark:border-sky-800"
                                                        role="alert">
                                                        <svg aria-hidden="true" class="flex-shrink-0 inline w-5 h-5 mr-3"
                                                            fill="currentColor" viewBox="0 0 20 20"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <path fill-rule="evenodd"
                                                                d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                                                                clip-rule="evenodd"></path>
                                                        </svg>
                                                        <span class="sr-only">Info</span>
                                                        <div>
                                                            {{ __('post.comment_info') }}
                                                        </div>
                                                    </div>
                                                @endguest

                                                @auth
                                                    @if (auth()->user()->email_verified_at)
                                                        <!-- Comment input-->
                                                        <form method="post" class="mt-5">
                                                            @csrf
                                                            <input type="hidden" name="comment_user_name"
                                                                id="comment_user_name" value="{{ auth()->user()->name }}" />
                                                            <input type="hidden" name="comment_user_email"
                                                                id="comment_user_email" value={{ auth()->user()->email }} />
                                                            <input type="hidden" name="post_id" id="post_id"
                                                                value={{ $post->id }} />
                                                            <input type="hidden" id="comment_parent_id"
                                                                name="comment_parent_id" value={{ $comment->id }} />
                                                            @if (auth()->user()->avatar)
                                                                <input type="hidden" id="comment_avatar"
                                                                    name="comment_avatar"
                                                                    value="user_images/{{ auth()->user()->avatar }}" />
                                                            @endif
                                                            <input type="hidden" id="comment_user_id" name="comment_user_id"
                                                                value="{{ auth()->user()->id }}" />

                                                            <!-- Message input-->
                                                            <div
                                                                class="w-full mb-3 border border-gray-200 rounded-lg bg-gray-50 dark:bg-gray-700 dark:border-gray-600">
                                                                <div class="px-4 py-2 bg-white rounded-t-lg dark:bg-gray-800">
                                                                    <label for="comment"
                                                                        class="sr-only">{{ __('post.comment_button') }}</label>
                                                                    <textarea id="comment_message" name="comment_message" rows="4"
                                                                        class="w-full px-0 text-sm text-gray-900 bg-white border-0 dark:bg-gray-800 focus:ring-0 dark:text-gray-50 dark:placeholder-gray-400"
                                                                        placeholder="Lorem ipsum dolor sit amet consectetur adipisicing elit. Amet, officia!" required></textarea>
                                                                </div>
                                                                <div
                                                                    class="flex items-center justify-between px-3 py-2 border-t dark:border-gray-600">
                                                                    <button type="submit"
                                                                        class="py-2.5 px-4 text-xs font-medium text-center text-gray-50 rounded-lg bg-sky-700  hover:bg-sky-800">
                                                                        {{ __('post.post_comment') }}
                                                                    </button>
                                                                </div>
                                                            </div>
                                                            <p id="helper-text-explanation"
                                                                class="mt-2 text-sm text-gray-500 dark:text-gray-400">Allowed
                                                                Tags:
                                                                ol,
                                                                li,
                                                                ul,
                                                                strong, em, u, a, img</p>
                                                        </form>
                                                        <!-- Comment input-->
                                                    @else
                                                        <div class="flex p-4 mt-4 text-sm text-sky-800 border border-sky-300 rounded-lg bg-sky-50 dark:bg-gray-800 dark:text-sky-400 dark:border-sky-800"
                                                            role="alert">
                                                            <svg aria-hidden="true" class="flex-shrink-0 inline w-5 h-5 mr-3"
                                                                fill="currentColor" viewBox="0 0 20 20"
                                                                xmlns="http://www.w3.org/2000/svg">
                                                                <path fill-rule="evenodd"
                                                                    d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                                                                    clip-rule="evenodd"></path>
                                                            </svg>
                                                            <span class="sr-only">Info</span>
                                                            <div>
                                                                {{ __('post.comment_info_2') }}
                                                            </div>
                                                        </div>
                                                    @endif
                                                @endauth
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                            {{ $comments->onEachSide(1)->links() }}
                        </div>

                        <!-- Comment Form -->
                        <div class="pb-4 px-4">
                            <button type="button"
                                class="comment-btn text-gray-50 bg-sky-700 hover:bg-sky-800 dark:bg-sky-600 dark:hover:bg-sky-700 font-medium rounded-lg text-sm px-3 py-2">
                                {{ __('post.comment_button') }}
                            </button>

                            <div class="comment-message" style="display: none;">
                                @guest
                                    <div class="flex p-4 mt-4 text-sm text-sky-800 border border-sky-300 rounded-lg bg-sky-50 dark:bg-gray-800 dark:text-sky-400 dark:border-sky-800"
                                        role="alert">
                                        <svg aria-hidden="true" class="flex-shrink-0 inline w-5 h-5 mr-3" fill="currentColor"
                                            viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd"
                                                d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                        <span class="sr-only">Info</span>
                                        <div>
                                            {{ __('post.comment_info') }}
                                        </div>
                                    </div>
                                @endguest

                                @auth
                                    @if (auth()->user()->email_verified_at)
                                        <form method="post" class="mt-5">
                                            @csrf
                                            <!-- Required Input -->
                                            <input type="hidden" name="comment_user_name" id="comment_user_name"
                                                value="{{ auth()->user()->name }}" />
                                            <input type="hidden" name="comment_user_email" id="comment_user_email"
                                                value={{ auth()->user()->email }} />
                                            <input type="hidden" name="post_id" id="post_id" value={{ $post->id }} />
                                            <input type="hidden" id="comment_parent_id" name="comment_parent_id"
                                                value="0" />
                                            <input type="hidden" id="comment_user_id" name="comment_user_id"
                                                value="{{ auth()->user()->id }}" />
                                            @if (auth()->user()->avatar)
                                                <input type="hidden" id="comment_avatar" name="comment_avatar"
                                                    value="user_images/{{ auth()->user()->avatar }}" />
                                            @endif

                                            <!-- Message input -->
                                            <div
                                                class="w-full mb-3 border border-gray-200 rounded-lg bg-gray-50 dark:bg-gray-700 dark:border-gray-600">
                                                <div class="px-4 py-2 bg-white rounded-t-lg dark:bg-gray-800">
                                                    <label for="comment"
                                                        class="sr-only">{{ __('post.comment_button') }}</label>
                                                    <textarea id="comment_message" name="comment_message" rows="4"
                                                        class="w-full px-0 text-sm text-gray-900 bg-white border-0 dark:bg-gray-800 focus:ring-0 dark:text-gray-50 dark:placeholder-gray-400"
                                                        placeholder="Lorem ipsum dolor sit amet consectetur adipisicing elit. Amet, officia!" required></textarea>
                                                </div>
                                                <div
                                                    class="flex items-center justify-between px-3 py-2 border-t dark:border-gray-600">
                                                    <button type="submit"
                                                        class="py-2.5 px-4 text-xs font-medium text-center text-gray-50 rounded-lg bg-sky-700 hover:bg-sky-800">
                                                        {{ __('post.post_comment') }}
                                                    </button>
                                                </div>
                                            </div>
                                            <p id="helper-text-explanation"
                                                class="mt-2 text-sm text-gray-500 dark:text-gray-400">
                                                Allowed
                                                Tags: ol, li, ul, strong, em, u, a, img</p>
                                        </form>
                                    @else
                                        <div class="flex p-4 mt-4 text-sm text-sky-800 border border-sky-300 rounded-lg bg-sky-50 dark:bg-gray-800 dark:text-sky-400 dark:border-sky-800"
                                            role="alert">
                                            <svg aria-hidden="true" class="flex-shrink-0 inline w-5 h-5 mr-3"
                                                fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd"
                                                    d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                                                    clip-rule="evenodd"></path>
                                            </svg>
                                            <span class="sr-only">Info</span>
                                            <div>
                                                {{ __('post.comment_info_2') }}
                                            </div>
                                        </div>
                                    @endif
                                @endauth
                            </div>
                        </div>

                    </div>
                </section>
                <!--Section: Comments-->
            </div>

            <!-- Side -->
            <aside class="w-full lg:w-[30%] sticky top-[70px]">
                <!--Section: Latest Post -->
                <section class="text-left pb-4 mb-2">
                    <h1 class="text-2xl font-bold dark:text-gray-50 mb-3">{{ __('post.side_1') }}</h1>
                    <div
                        class="w-full sm:max-w-screen-sm bg-white border border-gray-300 rounded-lg dark:bg-gray-800 dark:border-gray-700">
                        <a href="{{ '/' . app()->getLocale() . '/posts/' . $posts->slug }}">
                            <div class="hover:opacity-75 rounded-t-lg overflow-hidden">
                                <img class="rounded-t-lg object-cover h-40 w-full"
                                    src="{{ $posts->image ? asset('storage/' . $posts->image) : 'https://source.unsplash.com/1200x400?' . $posts->category->name }}"
                                    alt="{{ $posts->title }}">
                            </div>
                        </a>
                        <div class="p-5">
                            <a href="{{ '/' . app()->getLocale() . '/posts/' . $posts->slug }}">
                                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-gray-50">
                                    {{ $posts->title }}</h5>
                            </a>
                            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400 truncate">
                                {{ $posts->excerpt }}</p>
                            <a href="{{ '/' . app()->getLocale() . '/posts/' . $posts->slug }}"
                                class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-gray-50 rounded-lg bg-sky-700 hover:bg-sky-800 dark:bg-sky-600 dark:hover:bg-sky-700">
                                {{ __('posts.readmore') }}
                                <svg aria-hidden="true" class="w-4 h-4 ml-2 -mr-1" fill="currentColor"
                                    viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </a>
                        </div>
                    </div>
                </section>
                <!--Section: Latest Post -->

                <!--Section: Video-->
                <section class="text-left pb-4 mb-2">
                    <h1 class="text-2xl font-bold dark:text-gray-50 mb-3">{{ __('post.side_2') }}</h1>

                    <div
                        class="w-full sm:max-w-screen-sm bg-white border border-gray-300 rounded-lg dark:bg-gray-800 dark:border-gray-700">
                        <iframe class="w-full h-full" src="https://www.youtube.com/embed/kyw64mHwPHw"
                            title="YouTube video player" frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                            allowfullscreen></iframe>
                        <div class="p-5">
                            <h5 class="mb-2 text-lg font-bold tracking-tight text-gray-900 dark:text-gray-50">女の子は強い</h5>
                            <p class="text-sm font-normal text-gray-700 dark:text-gray-400">高嶺のなでしこ</p>
                        </div>
                </section>
                <!--Section: Video-->
            </aside>
        </div>
        <!-- Col -->
    </main>
@endsection

@push('script')
    <script>
        $(document).ready(function() {
            hljs.addPlugin(new CopyButtonPlugin());
            hljs.highlightAll();
        });
    </script>

    <script>
        $(document).ready(function() {
            $(".comment-btn").click(function() {
                $(".comment-message").not($(this).next(".comment-message")).slideUp();
                $(this).next(".comment-message").slideToggle();
            });
        });
    </script>
@endpush
