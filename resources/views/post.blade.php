@extends('layouts.main')

@push('meta')
    <meta name="description" content="{{ $post->excerpt }}">
    <meta name="keywords"
        content="HTML, CSS, JavaScript, Laravel, React, Blog, Mahadi Saputra, Mahadi, Saputra, Dode, Dode Mahadi, Web Developer, Fullstack Web Developer, Front End Web Developer, Back End Web Developer, {{ $post->category->name }}">
    <meta name="author" content="I Dewa Gede Mahadi Saputra, {{ $post->author->name }}">

    <!-- Facebook Meta Tags -->
    <meta property="og:url" content="https://mahadisaputra.my.id/{{ Request::path(), 3 }}" />
    <meta property="og:type" content="article" />
    <meta property="og:title" content="{{ $post->title }}" />
    <meta property="og:description" content="MAHADISAPUTRA.MY.ID - {{ $post->excerpt }}" />
    <meta property="og:image"
        content="{{ $post->image ? asset('storage/' . $post->image) : 'https://source.unsplash.com/500x285?' . $post->category->name }}" />
    <meta property="og:locale" content="id_ID" />

    <!-- Twitter Meta Tags -->
    <meta name="twitter:card" content="summary_large_image">
    <meta property="twitter:domain" content="mahadisaputra.my.id">
    <meta property="twitter:url" content="https://mahadisaputra.my.id/{{ Request::path(), 3 }}">
    <meta name="twitter:title" content="{{ $post->title }}">
    <meta name="twitter:description" content="MAHADISAPUTRA.MY.ID - {{ $post->excerpt }}">
    <meta name="twitter:image"
        content="{{ $post->image ? asset('storage/' . $post->image) : 'https://source.unsplash.com/500x285?' . $post->category->name }}">
@endpush

@if (count($post->comments) > 0)
    @push('swal_delete')
        <script src="{{ asset('assets/js/swal-delete.js') }}"></script>
    @endpush
@endif

@section('container')
    {{-- Scroll indicator --}}
    <div class="progress fixed top-[60px] left-0 right-0 h-[4px] bg-gray-400 dark:bg-slate-500 z-10"></div>

    {{-- Scroll to Top for xs screen --}}
    <div class="scrollToTop fixed lg:hidden bottom-4 right-3 z-10 opacity-0 transition-opacity">
        <button class="scrollTopLink px-4 h-[46px] bg-blue-700 hover:bg-blue-800 transition-colors rounded-full">
            <svg class="w-3.5 h-3.5 text-gray-50" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                viewBox="0 0 10 6">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M9 5 5 1 1 5" />
            </svg>
        </button>
    </div>

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

                <div class="mx-auto max-w-7xl pt-16 sm:px-6 sm:py-24 lg:flex lg:items-center lg:gap-x-10 lg:px-8 lg:py-40">
                    <div class="mx-auto max-w-2xl px-4 lg:mx-0 lg:flex-auto lg:px-0">
                        <div
                            class="inline-flex items-center rounded-full border px-2.5 py-0.5 text-xs tracking-tight font-medium transition-colors focus:outline-none focus:ring-2 focus:ring-ring focus:ring-offset-2 border-transparent bg-sky-500/10 text-sky-500 mb-4">
                            <a href="{{ '/posts/?category=' . $post->category->slug }}">{{ $post->category->name }}</a>
                        </div>
                        <h1
                            class="max-w-lg text-2xl font-bold tracking-tighter text-gray-900 dark:text-gray-50 sm:text-3xl md:text-4xl">
                            {{ ucfirst($post->title) }}</h1>
                        <p
                            class="mt-2 max-w-xl leading-relaxed text-gray-600 dark:text-gray-400 sm:mt-6 sm:text-lg sm:leading-7">
                            {!! $post->excerpt !!}</p>
                        <p class="mt-8 tracking-tighter text-sm text-gray-600 dark:text-gray-400">
                            {{ __('Di tulis pada') }}
                            {{ \Carbon\Carbon::parse($post->created_at)->translatedFormat('d F Y') }}
                            {{ __('oleh') }} <a href="{{ '/posts/?author=' . $post->author->username }}"
                                class="dark:text-gray-400 dark:hover:text-gray-50 hover:text-gray-900">{{ $post->author->name }}</a>
                        </p>

                        <p class="reading-time text-sm text-gray-600 dark:text-gray-50 py-2"></p>
                    </div>

                    <div class="mt-6 sm:mt-16 md:mt-24 lg:mt-0 lg:flex-shrink-0 lg:flex-grow"
                        data-tooltip-target="tooltip-image-alt">
                        <div
                            class="grid place-content-center overflow-hidden bg-accent font-mono text-xl font-medium tracking-tighter text-accent-foreground dark:shadow-xl sm:rounded-md">
                            <img class="w-full lg:max-w-xl sm:rounded-lg bg-cover"
                                src="{{ $post->image ? asset('storage/' . $post->image) : 'https://source.unsplash.com/500x285?' . $post->category->name }}"
                                alt="{{ ucfirst($post->title) }}">
                        </div>

                        <div id="tooltip-image-alt" role="tooltip"
                            class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-gray-50 transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                            {{ ucfirst($post->title) }}
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <main class="relative max-w-[74.5rem] mx-auto px-4 lg:px-0 text-xl">
        <!-- Col-->
        <div class="lg:grid grid-cols-12 justify-start items-start gap-0 lg:gap-8 w-full mx-auto sm:px-6 lg:px-8">
            <!-- Side -->
            <aside class="hidden lg:block lg:sticky top-[75px] col-span-2 mt-14">
                <!--Section: Share -->
                <section class="relative flex justify-center text-left pb-4 mb-2 dark:text-gray-50" id="share">
                    <button
                        class="share-btn h-7 px-2.5 text-xs flex items-center justify-between gap-x-2 rounded-full transition-colors duration-150 bg-blue-200/50 hover:bg-blue-200 dark:bg-blue-700/50 dark:hover:bg-blue-700/75"
                        type="button"><svg class="w-2.5 h-2.5 mr-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="currentColor" viewBox="0 0 18 18">
                            <path
                                d="M14.419 10.581a3.564 3.564 0 0 0-2.574 1.1l-4.756-2.49a3.54 3.54 0 0 0 .072-.71 3.55 3.55 0 0 0-.043-.428L11.67 6.1a3.56 3.56 0 1 0-.831-2.265c.006.143.02.286.043.428L6.33 6.218a3.573 3.573 0 1 0-.175 4.743l4.756 2.491a3.58 3.58 0 1 0 3.508-2.871Z" />
                        </svg>{{ __('Bagikan') }} <svg class="w-2.5 h-2.5 ml-2.5" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 4 4 4-4" />
                        </svg></button>

                    <!-- Dropdown menu -->
                    <div
                        class="share-btn-show absolute dropdown-above top-10 z-10 hidden bg-white shadow divide-y divide-gray-100 rounded-lg border dark:border-gray-500/50 w-48 dark:bg-[#020817] dark:divide-gray-600">
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
                                    data-platform="x"><svg width="48" height="48" viewBox="0 0 48 48"
                                        fill="none" xmlns="http://www.w3.org/2000/svg" class="mr-2 h-4 w-4">
                                        <path
                                            d="M36.6526 3.8078H43.3995L28.6594 20.6548L46 43.5797H32.4225L21.7881 29.6759L9.61989 43.5797H2.86886L18.6349 25.56L2 3.8078H15.9222L25.5348 16.5165L36.6526 3.8078ZM34.2846 39.5414H38.0232L13.8908 7.63406H9.87892L34.2846 39.5414Z"
                                            fill="currentColor"></path>
                                    </svg> X</button>
                            </li>
                        </ul>
                        <div class="py-2">
                            <button id="copyLink"
                                class="block px-4 py-2 w-full text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white text-left">{{ __('Salin URL') }}</button>
                        </div>
                    </div>
                </section>
                <!--Section: Share -->
            </aside>

            <!-- Content -->
            <div class="pb-4 pt-10 lg:px-12 col-span-7">

                <!--Section: Text-->
                <article class="text-[18px] leading-loose tracking-[-.012em] text-gray-900 dark:text-gray-50">

                    <!--Section: ToC -->
                    <section class="toc block lg:hidden text-left pb-4 dark:text-gray-50 space-y-3">
                        <p class="toc-title font-bold text-[18px]"></p>

                        <div class="toc-body text-sm"></div>
                    </section>
                    <!--Section: ToC -->

                    <div class="content">
                        {!! $post->body !!}
                    </div>
                </article>
                <!--Section: Text-->

                <!--Section: Author-->
                <section class="mt-5 pb-auto md:pb-2 dark:text-gray-50 leading-loose">
                    <div
                        class="flex items-center mb-3 sm:mb-0 gap-4 border border-gray-300 dark:border-gray-700 p-4 rounded-lg">
                        <div>
                            <div class="flex items-center gap-2 text-lg font-bold">{{ $post->author->name }} <svg
                                    class="w-[18px] h-[18px] text-blue-900 dark:text-blue-400" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 21 21">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2"
                                        d="m6.072 10.072 2 2 6-4m3.586 4.314.9-.9a2 2 0 0 0 0-2.828l-.9-.9a2 2 0 0 1-.586-1.414V5.072a2 2 0 0 0-2-2H13.8a2 2 0 0 1-1.414-.586l-.9-.9a2 2 0 0 0-2.828 0l-.9.9a2 2 0 0 1-1.414.586H5.072a2 2 0 0 0-2 2v1.272a2 2 0 0 1-.586 1.414l-.9.9a2 2 0 0 0 0 2.828l.9.9a2 2 0 0 1 .586 1.414v1.272a2 2 0 0 0 2 2h1.272a2 2 0 0 1 1.414.586l.9.9a2 2 0 0 0 2.828 0l.9-.9a2 2 0 0 1 1.414-.586h1.272a2 2 0 0 0 2-2V13.8a2 2 0 0 1 .586-1.414Z" />
                                </svg></div>
                            <p class="mt-1 text-sm text-gray-500 dark:text-gray-400 lg:text-base">
                                {{ $post->author->description }}
                            </p>
                            <div class="mt-6 flex flex-col justify-between gap-y-2 sm:flex-row sm:items-center sm:gap-y-0">
                                <div class="pt-4 font-mono text-sm text-gray-500 dark:text-gray-400">
                                    <p>Ikuti sosial media saya:</p>

                                    <div class="flex items-center space-x-1.5 pt-2">
                                        <a href="https://facebook.com/dodepersie" target="_blank"
                                            class="inline-flex items-center bg-gray-600 text-white p-2 rounded-full">
                                            <svg class="w-4 h-4" viewBox="0 0 48 48" fill="none"
                                                xmlns="http://www.w3.org/2000/svg"
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
                                            </svg>
                                        </a>

                                        <a href="https://github.com/dodepersie" target="_blank"
                                            class="inline-flex items-center bg-gray-600 text-white p-2 rounded-full">
                                            <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd"
                                                    d="M10 .333A9.911 9.911 0 0 0 6.866 19.65c.5.092.678-.215.678-.477 0-.237-.01-1.017-.014-1.845-2.757.6-3.338-1.169-3.338-1.169a2.627 2.627 0 0 0-1.1-1.451c-.9-.615.07-.6.07-.6a2.084 2.084 0 0 1 1.518 1.021 2.11 2.11 0 0 0 2.884.823c.044-.503.268-.973.63-1.325-2.2-.25-4.516-1.1-4.516-4.9A3.832 3.832 0 0 1 4.7 7.068a3.56 3.56 0 0 1 .095-2.623s.832-.266 2.726 1.016a9.409 9.409 0 0 1 4.962 0c1.89-1.282 2.717-1.016 2.717-1.016.366.83.402 1.768.1 2.623a3.827 3.827 0 0 1 1.02 2.659c0 3.807-2.319 4.644-4.525 4.889a2.366 2.366 0 0 1 .673 1.834c0 1.326-.012 2.394-.012 2.72 0 .263.18.572.681.475A9.911 9.911 0 0 0 10 .333Z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        </a>

                                        <a href="https://instagram.com/mahadisptr" target="_blank"
                                            class="inline-flex items-center bg-gray-600 text-white p-2 rounded-full">
                                            <svg viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg"
                                                class="w-4 h-4">
                                                <g clip-path="url(#clip0_17_63)">
                                                    <path
                                                        d="M24 4.32187C30.4125 4.32187 31.1719 4.35 33.6938 4.4625C36.0375 4.56562 37.3031 4.95938 38.1469 5.2875C39.2625 5.71875 40.0688 6.24375 40.9031 7.07812C41.7469 7.92188 42.2625 8.71875 42.6938 9.83438C43.0219 10.6781 43.4156 11.9531 43.5188 14.2875C43.6313 16.8187 43.6594 17.5781 43.6594 23.9813C43.6594 30.3938 43.6313 31.1531 43.5188 33.675C43.4156 36.0188 43.0219 37.2844 42.6938 38.1281C42.2625 39.2438 41.7375 40.05 40.9031 40.8844C40.0594 41.7281 39.2625 42.2438 38.1469 42.675C37.3031 43.0031 36.0281 43.3969 33.6938 43.5C31.1625 43.6125 30.4031 43.6406 24 43.6406C17.5875 43.6406 16.8281 43.6125 14.3063 43.5C11.9625 43.3969 10.6969 43.0031 9.85313 42.675C8.7375 42.2438 7.93125 41.7188 7.09688 40.8844C6.25313 40.0406 5.7375 39.2438 5.30625 38.1281C4.97813 37.2844 4.58438 36.0094 4.48125 33.675C4.36875 31.1438 4.34063 30.3844 4.34063 23.9813C4.34063 17.5688 4.36875 16.8094 4.48125 14.2875C4.58438 11.9437 4.97813 10.6781 5.30625 9.83438C5.7375 8.71875 6.2625 7.9125 7.09688 7.07812C7.94063 6.23438 8.7375 5.71875 9.85313 5.2875C10.6969 4.95938 11.9719 4.56562 14.3063 4.4625C16.8281 4.35 17.5875 4.32187 24 4.32187ZM24 0C17.4844 0 16.6688 0.028125 14.1094 0.140625C11.5594 0.253125 9.80625 0.665625 8.2875 1.25625C6.70312 1.875 5.3625 2.69062 4.03125 4.03125C2.69063 5.3625 1.875 6.70313 1.25625 8.27813C0.665625 9.80625 0.253125 11.55 0.140625 14.1C0.028125 16.6687 0 17.4844 0 24C0 30.5156 0.028125 31.3312 0.140625 33.8906C0.253125 36.4406 0.665625 38.1938 1.25625 39.7125C1.875 41.2969 2.69063 42.6375 4.03125 43.9688C5.3625 45.3 6.70313 46.125 8.27813 46.7344C9.80625 47.325 11.55 47.7375 14.1 47.85C16.6594 47.9625 17.475 47.9906 23.9906 47.9906C30.5063 47.9906 31.3219 47.9625 33.8813 47.85C36.4313 47.7375 38.1844 47.325 39.7031 46.7344C41.2781 46.125 42.6188 45.3 43.95 43.9688C45.2812 42.6375 46.1063 41.2969 46.7156 39.7219C47.3063 38.1938 47.7188 36.45 47.8313 33.9C47.9438 31.3406 47.9719 30.525 47.9719 24.0094C47.9719 17.4938 47.9438 16.6781 47.8313 14.1188C47.7188 11.5688 47.3063 9.81563 46.7156 8.29688C46.125 6.70312 45.3094 5.3625 43.9688 4.03125C42.6375 2.7 41.2969 1.875 39.7219 1.26562C38.1938 0.675 36.45 0.2625 33.9 0.15C31.3313 0.028125 30.5156 0 24 0Z"
                                                        fill="currentColor"></path>
                                                    <path
                                                        d="M24 11.6719C17.1938 11.6719 11.6719 17.1938 11.6719 24C11.6719 30.8062 17.1938 36.3281 24 36.3281C30.8062 36.3281 36.3281 30.8062 36.3281 24C36.3281 17.1938 30.8062 11.6719 24 11.6719ZM24 31.9969C19.5844 31.9969 16.0031 28.4156 16.0031 24C16.0031 19.5844 19.5844 16.0031 24 16.0031C28.4156 16.0031 31.9969 19.5844 31.9969 24C31.9969 28.4156 28.4156 31.9969 24 31.9969Z"
                                                        fill="currentColor"></path>
                                                    <path
                                                        d="M39.6937 11.1843C39.6937 12.778 38.4 14.0624 36.8156 14.0624C35.2219 14.0624 33.9375 12.7687 33.9375 11.1843C33.9375 9.59053 35.2313 8.30615 36.8156 8.30615C38.4 8.30615 39.6937 9.5999 39.6937 11.1843Z"
                                                        fill="currentColor"></path>
                                                </g>
                                                <defs>
                                                    <clipPath>
                                                        <rect width="48" height="48" fill="currentColor"></rect>
                                                    </clipPath>
                                                </defs>
                                            </svg>
                                        </a>

                                    </div>
                                </div>

                                <div class="pt-4 font-mono text-sm text-gray-500 dark:text-gray-400">
                                    <p>Support saya:</p>

                                    <div class="flex items-center space-x-1.5 pt-2">
                                        <a href="https://saweria.co/mahadisaputra" target="_blank"
                                            class="inline-flex items-center bg-gray-600 text-white p-2 rounded-full">
                                            <img src="https://saweria.co/_next/image?url=%2F_next%2Fstatic%2Fmedia%2Fcapy_happy.603c7293.svg&w=384&q=75"
                                                class="w-4 h-4 mr-2" /> Saweria
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <img src="{{ $post->author->avatar ? asset('user_images/' . $post->author->avatar) : 'https://ui-avatars.com/api/?name=' . urlencode($post->author->name) }}"
                            class="w-14 h-14 rounded-full" alt="{{ $post->author->name }}"
                            data-tooltip-target="tooltip-author" />

                        <div id="tooltip-author" role="tooltip"
                            class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-gray-50 transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                            {{ __('Penulis:') . ': ' . $post->author->name . ' - ' . __('Bergabung pada:') . ' ' . $post->author->created_at->diffForHumans() }}
                        </div>

                    </div>
                </section>
                <!--Section: Author-->

                <!--Section: Related Posts-->
                <section class="leading-loose mt-2 space-y-2">
                    <div class="border border-gray-300 dark:border-gray-700 rounded-lg">
                        <div class="mb-3 border-b border-gray-300 dark:border-gray-700 p-4">
                            <h1 class="text-xl font-semibold leading-6 tracking-tighter text-gray-900 dark:text-gray-50">
                                {{ __('Artikel Terkait') }}</h1>

                            <p class="mt-1.5 text-sm text-gray-500 dark:text-gray-400">
                                Baca artikel lain yang mungkin menarik pada Kategori {{ $post->category->name }}. Atau cari
                                artikel lain di <a href="{{ route('posts') }}"
                                    class="font-medium text-gray-900 hover:text-gray-900/50 dark:text-white dark:hover:text-white/50">halaman
                                    artikel</a>.</p>
                        </div>

                        <ol class="grid gap-x-16 gap-y-3 sm:grid-cols-2 text-sm sm:text-[0.95rem] p-4">
                            @forelse($related_posts->take(20) as $related_posts)
                                <li class="mb-2 text-gray-500 dark:text-gray-400 truncate">
                                    <a href="{{ $related_posts->slug }}"
                                        class="text-gray-500 hover:text-black dark:text-gray-400 hover:dark:text-gray-50">{{ ucfirst($related_posts->title) }}</a>
                                </li>
                            @empty
                                <li class="text-gray-500 hover:text-black dark:text-gray-400 hover:dark:text-gray-50">
                                    {{ __('Tidak ada artikel ditemukan.. :(') }}</li>
                            @endforelse
                        </ol>
                    </div>
                </section>
                <!--Section: Related Post-->

                <!--Section: Comments-->
                <section class="mt-3 text-gray-900 dark:text-gray-50" id="comments">
                    <div class="border border-gray-300 dark:border-gray-700 rounded-lg">
                        <div
                            class="flex justify-between items-center border-b border-gray-300 dark:border-gray-700 text-xl p-4 mb-3">
                            <strong>
                                @if (count($post->comments) == 0)
                                    0 Komentar
                                @else
                                    {{ count($post->comments) }} Komentar
                                @endif
                            </strong>

                            <div>
                                {{ $comments->links('pagination::simple-tailwind') }}
                            </div>
                        </div>

                        <!-- Comment -->
                        <div class="@if (count($post->comments) > 0) p-2 @endif">
                            <div class="px-2 overflow-auto max-h-96 space-y-3">
                                @foreach ($comments as $comment)
                                    <div class="bg-gray-200/50 dark:bg-slate-700/50 rounded-lg p-4 space-y-3">
                                        <div class="flex justify-between items-center mb-1">
                                            <div class="inline-flex items-center gap-1 text-gray-900 dark:text-gray-200">
                                                <img src="{{ !$comment->comment_avatar ? 'https://ui-avatars.com/api/?name=' . urlencode($comment->comment_user_name) : asset($comment->comment_avatar) }}"
                                                    class="w-6 h-6 rounded-full"
                                                    alt="{{ $comment->comment_user_name }}" />

                                                <span class="font-bold text-sm">
                                                    {{ $comment->comment_user_name }}
                                                </span>

                                                @if ($comment->comment_user_id === $post->user_id)
                                                    <div
                                                        class="bg-sky-300 text-sky-800 px-1.5 py-0.5 rounded dark:bg-sky-900 dark:text-sky-300 text-xs">
                                                        {{ __('Penulis') }}
                                                    </div>
                                                @endif

                                                <div class="text-xs">
                                                    {{ $comment->created_at->diffForHumans() }}
                                                </div>
                                            </div>

                                            @auth
                                                @if (intval($comment->comment_user_id) === auth()->user()->id)
                                                    <form method="POST">
                                                        @method('delete')
                                                        @csrf
                                                        <input type="hidden" name="comment_id" value="{{ $comment->id }}">
                                                        <button type="submit" id="delete_comment"><svg
                                                                class="w-4 h-4 text-red-500" aria-hidden="true"
                                                                xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                                                viewBox="0 0 18 20">
                                                                <path
                                                                    d="M17 4h-4V2a2 2 0 0 0-2-2H7a2 2 0 0 0-2 2v2H1a1 1 0 0 0 0 2h1v12a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V6h1a1 1 0 1 0 0-2ZM7 2h4v2H7V2Zm1 14a1 1 0 1 1-2 0V8a1 1 0 0 1 2 0v8Zm4 0a1 1 0 0 1-2 0V8a1 1 0 0 1 2 0v8Z" />
                                                            </svg></button>
                                                    </form>
                                                @endif
                                            @endauth
                                        </div>

                                        <div
                                            class="comment-body text-gray-900 dark:text-gray-200 leading-loose text-[16px] mb-3">
                                            {!! clean($comment->comment_message) !!}
                                        </div>

                                        <div>
                                            <!-- Reply button-->
                                            <button type="button"
                                                class="comment-btn flex items-center text-sm text-gray-500 hover:underline dark:text-gray-400 mt-2">
                                                <svg aria-hidden="true" class="mr-1 w-4 h-4" fill="none"
                                                    stroke="currentColor" viewBox="0 0 24 24"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z">
                                                    </path>
                                                </svg>

                                                {{ __('Balas') }}
                                            </button>

                                            <div class="comment-message" style="display:none;">

                                                @auth
                                                    @if (auth()->user()->email_verified_at)
                                                        <!-- Reply input-->
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
                                                                class="w-full -mt-2 mb-3 border border-gray-200 rounded-lg bg-gray-50 dark:bg-gray-700 dark:border-gray-600">
                                                                <div class="px-4 py-2 bg-white rounded-t-lg dark:bg-gray-800">
                                                                    <label for="comment"
                                                                        class="sr-only">{{ __('Kirim komentar') }}</label>
                                                                    <textarea name="comment_message" rows="4"
                                                                        class="w-full px-0 text-sm text-gray-900 bg-white border-0 dark:bg-gray-800 focus:ring-0 dark:text-gray-50 dark:placeholder-gray-400 resize-none"
                                                                        placeholder="Lorem ipsum dolor sit amet consectetur adipisicing elit. Amet, officia!" required></textarea>
                                                                </div>
                                                                <div
                                                                    class="flex flex-col justify-between items-start gap-2 px-3 py-2 border-t dark:border-gray-600">
                                                                    {!! NoCaptcha::display() !!}
                                                                    {!! NoCaptcha::renderJs() !!}
                                                                    <button type="submit"
                                                                        class="py-2.5 px-4 text-xs font-medium text-center text-gray-50 rounded-lg bg-blue-700 hover:bg-blue-700/80 transition-colors">
                                                                        {{ __('Kirim komentar') }}
                                                                    </button>
                                                                </div>
                                                            </div>
                                                            <p id="helper-text-explanation"
                                                                class="mt-2 text-sm text-gray-500 dark:text-gray-400 tracking-normal">
                                                                Tag yang
                                                                diperbolehkan: b, strong, i, em, u, a, ul, ol, li, p, span,
                                                                img
                                                            </p>
                                                        </form>
                                                        <!-- Reply input-->
                                                    @endif
                                                @endauth
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Reply section-->
                                    @if (count($comment->childs) > 0)
                                        <div class="pl-10 text-gray-900 dark:text-gray-200">
                                            <div class="space-y-3">
                                                @foreach ($comment->childs as $child)
                                                    <div
                                                        class="bg-gray-200/50 dark:bg-slate-700/50 rounded-lg p-4 space-y-3">
                                                        <div class="flex justify-between items-center">
                                                            <div
                                                                class="inline-flex justify-center items-center gap-1 mb-2">

                                                                <img src="{{ !$child->comment_avatar ? 'https://ui-avatars.com/api/?name=' . urlencode($child->comment_user_name) : asset($child->comment_avatar) }}"
                                                                    class="w-6 h-6 rounded-full"
                                                                    alt="{{ $child->comment_user_name }}" />

                                                                <span class="font-bold text-sm">
                                                                    {{ $child->comment_user_name }}
                                                                </span>

                                                                @if ($child->comment_user_id === $post->user_id)
                                                                    <div
                                                                        class="bg-sky-300 text-sky-800 px-1.5 py-0.5 rounded dark:bg-sky-900 dark:text-sky-300 text-xs">
                                                                        {{ __('Penulis') }}
                                                                    </div>
                                                                @endif

                                                                <div class="text-xs">
                                                                    {{ $child->created_at->diffForHumans() }}</div>
                                                            </div>
                                                            @auth
                                                                @if (intval($child->comment_user_id) === auth()->user()->id)
                                                                    <form method="POST">
                                                                        @method('delete')
                                                                        @csrf
                                                                        <input type="hidden" name="comment_id"
                                                                            value="{{ $child->id }}">
                                                                        <button type="submit" id="delete_comment"><svg
                                                                                class="w-4 h-4 text-red-500"
                                                                                aria-hidden="true"
                                                                                xmlns="http://www.w3.org/2000/svg"
                                                                                fill="currentColor" viewBox="0 0 18 20">
                                                                                <path
                                                                                    d="M17 4h-4V2a2 2 0 0 0-2-2H7a2 2 0 0 0-2 2v2H1a1 1 0 0 0 0 2h1v12a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V6h1a1 1 0 1 0 0-2ZM7 2h4v2H7V2Zm1 14a1 1 0 1 1-2 0V8a1 1 0 0 1 2 0v8Zm4 0a1 1 0 0 1-2 0V8a1 1 0 0 1 2 0v8Z" />
                                                                            </svg></button>
                                                                    </form>
                                                                @endif
                                                            @endauth
                                                        </div>
                                                        <div
                                                            class="comment-body text-gray-900 dark:text-gray-200 rounded-lg text-[16px]">
                                                            <p class="leading-loose">{!! clean($child->comment_message) !!}</p>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>

                        <!-- Comment Form -->
                        <div class="pb-4 px-4">
                            <button type="button"
                                class="comment-btn flex items-center text-sm text-gray-500 hover:underline dark:text-gray-400 mt-2">
                                <svg aria-hidden="true" class="mr-1 w-4 h-4" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z">
                                    </path>
                                </svg>

                                {{ __('Komentar') }}
                            </button>

                            <div class="comment-message" style="display: none;">
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
                                                class="w-full -mt-2 mb-3 border border-gray-200 rounded-lg bg-gray-50 dark:bg-gray-700 dark:border-gray-600">
                                                <div class="px-4 py-2 bg-white rounded-t-lg dark:bg-gray-800">
                                                    <label for="comment" class="sr-only">{{ __('Kirim komentar') }}</label>
                                                    <textarea name="comment_message" rows="4"
                                                        class="w-full px-0 text-sm text-gray-900 bg-white border-0 dark:bg-gray-800 focus:ring-0 dark:text-gray-50 dark:placeholder-gray-400 resize-none"
                                                        placeholder="Lorem ipsum dolor sit amet consectetur adipisicing elit. Amet, officia!" required></textarea>
                                                </div>
                                                <div
                                                    class="flex flex-col justify-between items-start gap-2 px-3 py-2 border-t dark:border-gray-600">
                                                    {!! NoCaptcha::display() !!}
                                                    {!! NoCaptcha::renderJs() !!}
                                                    <button type="submit"
                                                        class="py-2.5 px-4 text-xs font-medium text-center text-gray-50 rounded-lg bg-blue-700 hover:bg-blue-700/80 transition-colors">
                                                        {{ __('Kirim komentar') }}
                                                    </button>
                                                </div>
                                            </div>
                                            <p id="helper-text-explanation"
                                                class="mt-2 text-sm text-gray-500 dark:text-gray-400 tracking-normal">
                                                Tag yang diperbolehkan: b, strong, i, em, u, a, ul, ol, li, p, span, img</p>
                                        </form>
                                    @endif
                                @endauth
                            </div>
                        </div>
                    </div>
                </section>
                <!--Section: Comments-->
            </div>

            <!-- Side -->
            <aside class="hidden lg:block sticky top-[75px] mt-14 col-span-3">
                <!--Section: ToC -->
                <section class="toc text-left pb-4 dark:text-gray-50 space-y-3">
                    <h1 class="toc-title text-[1.1rem] font-bold" id="toc-title"></h1>

                    <div class="toc-body text-sm"></div>

                    <div class="scrollToTop transition-opacity duration-150 opacity-0">
                        <button class="scrollTopLink flex items-center gap-2 dark:text-gray-50 text-sm">Kembali ke atas
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

        @if ($errors->any())
            <!-- Toast Error Alert -->
            <div class="toast-error fixed flex items-center w-full max-w-xs p-4 space-x-4 text-gray-50 bg-red-500 shadow left-5 bottom-5 space-x opacity-0 transition-opacity"
                role="alert">
                <div class="flex items-center text-[16px] tracking-normal font-normal">
                    <svg aria-hidden="true" class="flex-shrink-0 inline w-5 h-5 mr-3" fill="currentColor"
                        viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                            clip-rule="evenodd"></path>
                    </svg>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @endif

        @if (session()->has('success'))
            <!-- Alert -->
            <div class="toast-notification fixed flex items-center w-full max-w-xs p-4 space-x-4 text-gray-50 bg-green-500 rounded-lg shadow left-5 bottom-5 space-x opacity-0 transition-opacity"
                role="alert">
                <div class="flex items-center text-[16px] tracking-normal font-normal">
                    <svg aria-hidden="true" class="flex-shrink-0 inline w-5 h-5 mr-3" fill="currentColor"
                        viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                            clip-rule="evenodd"></path>
                    </svg>
                    {{ session('success') }}
                </div>
            </div>
            <!-- Alert -->
        @endif

        @guest
            <!-- Toast Notification -->
            <div class="toast-notification fixed flex items-center w-full max-w-xs p-4 space-x-4 text-gray-50 bg-red-500 divide-x divide-gray-200 rounded-lg shadow left-5 bottom-5 space-x opacity-0 transition-opacity"
                role="alert">
                <div class="flex items-center text-[16px] tracking-normal font-normal">
                    <svg aria-hidden="true" class="flex-shrink-0 inline w-5 h-5 mr-3" fill="currentColor"
                        viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                            clip-rule="evenodd"></path>
                    </svg>
                    Silahkan masuk atau daftar untuk berkomentar!
                </div>
            </div>
        @endguest

        @auth
            @if (!auth()->user()->email_verified_at)
                <!-- Toast Notification -->
                <div class="toast-notification fixed flex items-center w-full max-w-xs p-4 space-x-4 text-gray-50 bg-red-500 divide-x divide-gray-200 rounded-lg shadow left-5 bottom-5 space-x opacity-0 transition-opacity"
                    role="alert">
                    <div class="flex items-center text-[16px] tracking-normal font-normal">
                        <svg aria-hidden="true" class="flex-shrink-0 inline w-5 h-5 mr-3" fill="currentColor"
                            viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                                clip-rule="evenodd"></path>
                        </svg>
                        Silahkan melakukan verifikasi email terlebih dahulu!
                    </div>
                </div>
            @endif
        @endauth
    </main>
@endsection

@push('script')
<script>
        $(document).ready(function() {
            var timeoutId;
            var toastError = $('.toast-error');
            var toastNotification = $('.toast-notification');

            $('.comment-btn').click(function() {
                toastNotification.removeClass('opacity-0');
                toastNotification.addClass('opacity-1');

                // Clear the previous timeout
                clearTimeout(timeoutId);

                // Set a new timeout
                timeoutId = setTimeout(() => {
                    toastNotification.removeClass('opacity-1');
                    toastNotification.addClass('opacity-0');
                }, 2000);
            });

        @if ($errors->any())
            toastError.removeClass('opacity-0');
            toastError.addClass('opacity-1');

            setTimeout(() => {
                toastError.removeClass('opacity-1');
                toastError.addClass('opacity-0');
            }, 2000);
        @endif

        @if (session()->has('success'))
            toastNotification.removeClass('opacity-0');
            toastNotification.addClass('opacity-1');
            
            setTimeout(() => {
                toastNotification.removeClass('opacity-1');
                toastNotification.addClass('opacity-0');
            }, 2000);   
        @endif
});
    </script>

    <script src="{{ asset('assets/js/scroll-progress.js') }}"></script>
    <script src="{{ asset('assets/js/estimated-reading-time.js') }}"></script>
    <script src="{{ asset('assets/js/toc.js') }}"></script>
    <script src="{{ asset('assets/js/hljs-init.js') }}"></script>
    <script src="{{ asset('assets/js/comment-toggle.js') }}"></script>
    <script src="{{ asset('assets/js/share-toggle.js') }}"></script>
    <script src="{{ asset('assets/js/copy-url.js') }}"></script>

    <script>
        $(document).ready(function() {
            $(".share-button").on("click", function(e) {
                e.preventDefault();

                var shareUrl = window.location.href;
                var platform = $(this).data("platform");

                // Calculate window position for centering
                var windowWidth = 600;
                var windowHeight = 300;
                var windowLeft = (window.innerWidth - windowWidth) / 2;
                var windowTop = (window.innerHeight - windowHeight) / 2;

                let params =
                    `scrollbars=no,resizable=no,status=no,location=no,toolbar=no,menubar=no, width=${windowWidth},height=${windowHeight},left=${windowLeft},top=${windowTop}`;

                switch (platform) {
                    case "facebook":
                        window.open("https://www.facebook.com/sharer/sharer.php?u=" + encodeURIComponent(
                            shareUrl), 'Facebook', params);
                        break;
                    case "whatsapp":
                        window.open("https://wa.me/?text={{ $post->title }}: " + encodeURIComponent(
                            shareUrl), 'WhatsApp', params);
                        break;
                    case "x":
                        window.open("https://x.com/intent/tweet?url=" + encodeURIComponent(shareUrl), 'X',
                            params);
                        break;
                }
            });
        });
    </script>
@endpush
