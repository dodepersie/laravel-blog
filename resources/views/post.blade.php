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
    <div class="border-b border-gray-100 dark:border-gray-700/50">
        <div class="relative z-10">
            {{ Breadcrumbs::render('post', $post) }}
        </div>
        <div class="-mt-24 lg:mt-[-9rem] max-w-[74.5rem] mx-auto">
            <div class="relative isolate pt-14">
                <div class="absolute inset-x-0 -top-40 -z-10 transform-gpu overflow-hidden blur-3xl sm:-top-80">
                    <div class="relative left-[calc(50%-11rem)] aspect-[1155/678] w-[36.125rem] -translate-x-1/2 rotate-[30deg] bg-gradient-to-tr from-sky-800/90 to-blue-800/90 opacity-20 sm:left-[calc(50%-30rem)] sm:w-[72.1875rem]"
                        style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%);">
                    </div>
                </div>

                <div class="mx-auto pt-16 sm:px-6 sm:py-24 md:flex md:justify-between md:items-center md:gap-x-10 md:py-40">
                    <div class="mx-auto px-4 lg:mx-0 lg:flex-auto lg:px-0">
                        <div
                            class="inline-flex items-center rounded-full border px-2.5 py-0.5 text-xs tracking-tight font-medium transition-colors focus:outline-none focus:ring-2 focus:ring-ring focus:ring-offset-2 border-transparent bg-sky-500/10 text-sky-500 mb-4">
                            <a
                                href="{{ '/' . app()->getLocale() . '/posts/?category=' . $post->category->slug }}">{{ $post->category->name }}</a>
                        </div>
                        <h1
                            class="max-w-lg text-2xl font-bold tracking-tighter text-gray-900 dark:text-gray-50 sm:text-3xl md:text-4xl">
                            {{ ucfirst($post->title) }}</h1>
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

                    <div class="mt-6 sm:mt-16 md:mt-24 lg:mt-0 px-4 lg:px-0 object-cover"
                        data-tooltip-target="tooltip-image-alt">
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
        <div class="lg:grid grid-cols-12 justify-start items-start gap-0 lg:gap-8 w-full mx-auto sm:px-6 lg:px-8">
            <!-- Side -->
            <aside class="hidden lg:block lg:sticky top-[75px] col-span-2 mt-14">
                <!--Section: Share -->
                <section class="flex justify-center text-left pb-4 mb-2 dark:text-gray-50" id="share">
                    <button id="share_button" data-dropdown-toggle="share_button_show"
                        class="h-7 px-2.5 text-xs flex items-center justify-between gap-x-2 rounded-full transition-colors duration-150 bg-blue-200/50 hover:bg-blue-200 dark:bg-blue-700/50 dark:hover:bg-blue-700/75"
                        type="button"><svg class="w-2.5 h-2.5 mr-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="currentColor" viewBox="0 0 18 18">
                            <path
                                d="M14.419 10.581a3.564 3.564 0 0 0-2.574 1.1l-4.756-2.49a3.54 3.54 0 0 0 .072-.71 3.55 3.55 0 0 0-.043-.428L11.67 6.1a3.56 3.56 0 1 0-.831-2.265c.006.143.02.286.043.428L6.33 6.218a3.573 3.573 0 1 0-.175 4.743l4.756 2.491a3.58 3.58 0 1 0 3.508-2.871Z" />
                        </svg>{{ __('post.share') }} <svg class="w-2.5 h-2.5 ml-2.5" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 4 4 4-4" />
                        </svg></button>

                    <!-- Dropdown menu -->
                    <div id="share_button_show"
                        class="z-10 hidden bg-white shadow divide-y divide-gray-100 rounded-lg border dark:border-gray-500/50 w-48 dark:bg-[#020817] dark:divide-gray-600">
                        <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="share_button">
                            <li>
                                <button
                                    class="share-button flex items-center gap-2 px-4 py-2 w-full hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white"
                                    data-platform="facebook"><svg width="48" height="48" viewBox="0 0 48 48"
                                        fill="none" xmlns="http://www.w3.org/2000/svg"
                                        class="stroke-[1.25] shrink-0 mr-2 h-3.5 w-3.5">
                                        <g clip-path="url(#clip0_17_61)">
                                            <path
                                                d="M48 24C48 10.7452 37.2548 0 24 0C10.7452 0 0 10.7452 0 24C0 35.9789 8.77641 45.908 20.25 47.7084V30.9375H14.1562V24H20.25V18.7125C20.25 12.6975 23.8331 9.375 29.3152 9.375C31.9402 9.375 34.6875 9.84375 34.6875 9.84375V15.75H31.6613C28.68 15.75 27.75 17.6002 27.75 19.5V24H34.4062L33.3422 30.9375H27.75V47.7084C39.2236 45.908 48 35.9789 48 24Z"
                                                fill="currentColor"></path>
                                        </g>
                                        <defs>
                                            <clipPath>
                                                <rect width="48" height="48" fill="currentColor"></rect>
                                            </clipPath>
                                        </defs>
                                    </svg> Facebook</button>
                            </li>
                            <li>
                                <button
                                    class="share-button flex items-center gap-2 px-4 py-2 w-full hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white"
                                    data-platform="whatsapp"><svg width="48" height="48" viewBox="0 0 48 48"
                                        fill="none" xmlns="http://www.w3.org/2000/svg"
                                        class="stroke-[1.25] shrink-0 mr-2 h-3.5 w-3.5">
                                        <path
                                            d="M0 48L3.374 35.674C1.292 32.066 0.198 27.976 0.2 23.782C0.206 10.67 10.876 0 23.986 0C30.348 0.002 36.32 2.48 40.812 6.976C45.302 11.472 47.774 17.448 47.772 23.804C47.766 36.918 37.096 47.588 23.986 47.588C20.006 47.586 16.084 46.588 12.61 44.692L0 48ZM13.194 40.386C16.546 42.376 19.746 43.568 23.978 43.57C34.874 43.57 43.75 34.702 43.756 23.8C43.76 12.876 34.926 4.02 23.994 4.016C13.09 4.016 4.22 12.884 4.216 23.784C4.214 28.234 5.518 31.566 7.708 35.052L5.71 42.348L13.194 40.386ZM35.968 29.458C35.82 29.21 35.424 29.062 34.828 28.764C34.234 28.466 31.312 27.028 30.766 26.83C30.222 26.632 29.826 26.532 29.428 27.128C29.032 27.722 27.892 29.062 27.546 29.458C27.2 29.854 26.852 29.904 26.258 29.606C25.664 29.308 23.748 28.682 21.478 26.656C19.712 25.08 18.518 23.134 18.172 22.538C17.826 21.944 18.136 21.622 18.432 21.326C18.7 21.06 19.026 20.632 19.324 20.284C19.626 19.94 19.724 19.692 19.924 19.294C20.122 18.898 20.024 18.55 19.874 18.252C19.724 17.956 18.536 15.03 18.042 13.84C17.558 12.682 17.068 12.838 16.704 12.82L15.564 12.8C15.168 12.8 14.524 12.948 13.98 13.544C13.436 14.14 11.9 15.576 11.9 18.502C11.9 21.428 14.03 24.254 14.326 24.65C14.624 25.046 18.516 31.05 24.478 33.624C25.896 34.236 27.004 34.602 27.866 34.876C29.29 35.328 30.586 35.264 31.61 35.112C32.752 34.942 35.126 33.674 35.622 32.286C36.118 30.896 36.118 29.706 35.968 29.458Z"
                                            fill="currentColor"></path>
                                    </svg> WhatsApp</button>
                            </li>
                            <li>
                                <button
                                    class="share-button flex items-center gap-2 px-4 py-2 w-full hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white"
                                    data-platform="x"><svg width="48" height="48" viewBox="0 0 48 48" fill="none"
                                        xmlns="http://www.w3.org/2000/svg" class="mr-2 h-4 w-4">
                                        <path
                                            d="M36.6526 3.8078H43.3995L28.6594 20.6548L46 43.5797H32.4225L21.7881 29.6759L9.61989 43.5797H2.86886L18.6349 25.56L2 3.8078H15.9222L25.5348 16.5165L36.6526 3.8078ZM34.2846 39.5414H38.0232L13.8908 7.63406H9.87892L34.2846 39.5414Z"
                                            fill="currentColor"></path>
                                    </svg> X</button>
                            </li>
                        </ul>
                        <div class="py-2">
                            <button id="copyLink"
                                class="block px-4 py-2 w-full text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white text-left">{{ __('post.copy_link') }}</button>
                        </div>
                    </div>
                </section>
                <!--Section: Share -->
            </aside>

            <!-- Content -->
            <div class="pb-4 pt-10 lg:px-12 col-span-7">

                <!--Section: Text-->
                <section id="contents" class="content text-lg leading-loose text-gray-900 dark:text-gray-50 pb-5">
                    {!! $post->body !!}
                </section>
                <!--Section: Text-->

                <!--Section: Related Posts-->
                <section class="leading-loose text-gray-900 dark:text-gray-50 mt-2 space-y-2">
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
                                        class="text-gray-500 hover:text-black dark:text-gray-400 hover:dark:text-gray-50">{{ ucfirst($related_posts->title) }}</a>
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
                                                    class="object-cover rounded"
                                                    alt="{{ $comment->comment_user_name }}" />
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
            <aside class="hidden lg:block sticky top-[75px] mt-16 min-h-screen col-span-3">
                <!--Section: ToC -->
                <section class="text-left pb-4 mb-2 dark:text-gray-50" id="toc">
                    <h1 class="text-[1.1rem] font-bold mb-3">{{ __('post.side_1') }}</h1>

                    <div id="tableOfContents" class="text-sm"></div>

                    <div class="hidden lg:block transition-opacity duration-150 opacity-0" id="scrollToTop">
                        <hr class="h-px my-4 bg-gray-200 border-0 dark:bg-gray-700">
                        <button id="scrollTopLink" class="flex items-center gap-2 dark:text-gray-50 text-sm">Scroll to Top
                            <svg class="w-2 h-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="currentColor" viewBox="0 0 16 10">
                                <path
                                    d="M9.207 1A2 2 0 0 0 6.38 1L.793 6.586A2 2 0 0 0 2.207 10H13.38a2 2 0 0 0 1.414-3.414L9.207 1Z" />
                            </svg></button>
                    </div>
                </section>
                <!--Section: ToC -->
            </aside>
        </div>
        <!-- Col -->
    </main>
@endsection

@push('script')
    <script src="{{ asset('js/toc.js') }}"></script>
    <script src="{{ asset('js/hljs-init.js') }}"></script>
    <script src="{{ asset('js/comment-toggle.js') }}"></script>
    <script src="{{ asset('js/share-toggle.js') }}"></script>

    <script>
        $(document).ready(function() {
            $(".share-button").on("click", function(e) {
                e.preventDefault();

                var shareUrl = window.location.href;
                var platform = $(this).data("platform");

                switch (platform) {
                    case "facebook":
                        window.open("https://www.facebook.com/sharer/sharer.php?u=" + encodeURIComponent(
                            shareUrl));
                        break;
                    case "whatsapp":
                        window.open("https://wa.me/?text={{ $post->title }}: " + encodeURIComponent(
                            shareUrl));
                        break;
                    case "x":
                        window.open("https://twitter.com/intent/tweet?url=" + encodeURIComponent(shareUrl));
                        break;
                }
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            // Handle copy link functionality
            $("#copyLink").on("click", function(e) {
                e.preventDefault();

                var currentUrl = window.location.href;
                copyToClipboard(currentUrl);

                // Optionally provide some visual feedback, like changing the link text
                $(this).text("{{ __('post.link_copied') }}");

                // Reset the link text after a brief delay
                setTimeout(function() {
                    $("#copyLink").text("{{ __('post.copy_link') }}");
                }, 2000); // Reset after 2 seconds
            });

            // Function to copy text to clipboard
            function copyToClipboard(text) {
                var tempInput = document.createElement("input");
                tempInput.value = text;
                document.body.appendChild(tempInput);
                tempInput.select();
                document.execCommand("copy");
                document.body.removeChild(tempInput);
            }
        });
    </script>
@endpush
