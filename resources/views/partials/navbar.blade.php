<nav class="fixed top-0 z-20 w-full bg-white dark:bg-[#020817]">
    <div class="container mx-auto max-w-6xl flex flex-wrap items-center justify-between px-4 pt-3 pb-1">
        <a href="{{ route('home') }}" class="flex items-center">
            <img src="{{ asset('assets/img/logo-1000px-black.png') }}" class="block dark:hidden h-[24px]"
                alt="Mahadi Saputra's Logo" />
            <img src="{{ asset('assets/img/logo-1000px-white.png') }}" class="hidden dark:block h-[24px]"
                alt="Mahadi Saputra's Logo" />
        </a>

        <div class="flex flex-wrap items-center justify-between gap-2 lg:gap-4 lg:order-2">
            <div class="relative hidden lg:block">
                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                    </svg>
                </div>

                <!-- LG screen size Search Bar -->
                <form action="{{ route('posts') }}">
                    @if (request('category'))
                        <input type="hidden" name="category" value="{{ request('category') }}">
                    @endif
                    @if (request('author'))
                        <input type="hidden" name="author" value="{{ request('author') }}">
                    @endif
                    <input type="search" id="search-navbar-lg"
                        class="block w-full p-2 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-sky-500 focus:border-sky-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-sky-500 dark:focus:border-sky-500"
                        placeholder="{{ __('Cari Artikel...') }}" value="{{ request('search') }}" name="search"
                        autocomplete="off" />
                </form>
            </div>

            @auth
                <button type="button" class="flex text-sm bg-gray-800 rounded-full" id="user-menu-button"
                    aria-expanded="false" data-dropdown-toggle="user-dropdown" data-dropdown-placement="bottom">
                    <span class="sr-only">Open user menu</span>
                    @if (auth()->user()->avatar)
                        <img class="w-8 h-8 rounded-full" src="{{ asset('user_images/' . auth()->user()->avatar) }}"
                            alt="{{ auth()->user()->name }}" />
                    @else
                        <img class="w-8 h-8 rounded-full"
                            src="https://ui-avatars.com/api/?name={{ urlencode(auth()->user()->name) }}"
                            alt="{{ auth()->user()->name }}" />
                    @endif
                </button>

                <!-- Dropdown menu -->
                <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow dark:bg-gray-700 dark:divide-gray-600"
                    id="user-dropdown">
                    <div class="px-4 py-3">
                        <span class="block text-sm text-gray-900 dark:text-white">{{ auth()->user()->name }}</span>
                        <span
                            class="block text-sm  text-gray-500 truncate dark:text-gray-400">{{ auth()->user()->email }}</span>
                    </div>
                    <ul class="py-2" aria-labelledby="user-menu-button">
                        <li>
                            <a href="{{ route('dashboard.home') }}"
                                class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">{{ __('Dashboard') }}</a>
                        </li>
                        <li>
                            <a href="{{ route('profile.index') }}"
                                class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">{{ __('Edit Profil') }}</a>
                        </li>
                        <div class="py-1">
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit"
                                    class="flex justify-start px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-400 dark:hover:text-white w-full">{{ __('Keluar') }}</button>
                            </form>
                        </div>
                    </ul>
                </div>
            @else
                <button type="button" class="text-sm bg-gray-800 rounded-full" id="user-menu-button" aria-expanded="false"
                    data-dropdown-toggle="user-dropdown" data-dropdown-placement="bottom">
                    <span class="sr-only">Open user menu</span>
                    <img class="w-8 h-8 rounded-full" src="{{ asset('assets/img/noprofile.jpg') }}" alt="Guest">
                </button>

                <!-- Dropdown menu -->
                <div class="z-50 hidden my-4 text-base list-none bg-white rounded-lg shadow dark:bg-gray-700"
                    id="user-dropdown">
                    <ul class="py-2" aria-labelledby="user-menu-button">
                        <li>
                            <a href="{{ route('login') }}"
                                class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">{{ __('Masuk') }}</a>
                        </li>
                        <li>
                            <a href="{{ route('register') }}"
                                class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">{{ __('Daftar') }}</a>
                        </li>
                    </ul>
                </div>
            @endauth

            <button id="xs-menu" type="button"
                class="inline-flex items-center p-2 ml-1 transition-colors duration-150 text-sm text-gray-500 rounded-lg lg:hidden hover:bg-gray-300/50 dark:text-gray-400 dark:hover:bg-gray-700/50"
                aria-controls="mobile-menu-2" aria-expanded="false">
                <span class="sr-only">Open main menu</span>
                <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                        clip-rule="evenodd"></path>
                </svg>
            </button>

            <!-- Theme Toggler -->
            <button id="theme-toggle" class="transition-colors duration-150 text-gray-500 dark:text-gray-400">
                <span class="sr-only">Toggle Theme</span>
                <svg id="theme-toggle-dark-icon" class="hidden w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path>
                </svg>
                <svg id="theme-toggle-light-icon" class="hidden w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z"
                        fill-rule="evenodd" clip-rule="evenodd"></path>
                </svg>
            </button>
        </div>

        <div class="items-center justify-between hidden w-full lg:flex lg:w-auto lg:order-1" id="navbar">
            <ul
                class="flex flex-col lg:justify-center lg:items-center p-4 lg:p-0 mt-4 font-medium rounded-lg bg-transparent lg:flex-row gap-2 lg:mt-0 lg:border-0 lg:dark:bg-transparent dark:border-gray-700 w-full">
                <li>
                    <a href="{{ route('home') }}"
                        class="px-5 py-3 transition-all duration-150 rounded-lg text-slate-900 dark:text-white {{ Request::is('/') ? 'font-bold' : 'text-black dark:text-gray-50' }}
            ">
                        Beranda
                    </a>
                </li>
                <li>
                    <a href="{{ route('posts') }}"
                        class="px-5 py-3 transition-all duration-150 rounded-lg text-slate-900 dark:text-white {{ Request::is('posts*') ? 'font-bold' : 'text-black dark:text-gray-50' }}
            ">
                        Artikel
                    </a>
                </li>
                <li>
                    <button id="mega-menu-button"
                        class="ms-2 flex items-center justify-between w-full py-2 pl-3 pr-4 text-gray-900 rounded md:w-auto md:border-0 md:p-0 dark:text-white dark:border-gray-700">Kategori
                        <svg class="w-2.5 h-2.5 ml-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" d="m1 1 4 4 4-4" />
                        </svg></button>
                </li>
            </ul>
        </div>
    </div>

    <!-- Mega menu -->
    <div class="mt-1 bg-[#f4f4f5] shadow dark:bg-gray-600">
        <div class="hidden" id="mega-menu">
            <div class="max-w-6xl py-5 mx-auto text-sm text-gray-900 dark:text-gray-50 lg:px-4">
                <div class="flex justify-center items-center gap-3">
                    <div
                        class="hidden lg:flex flex-col justify-center items-center border-r border-gray-300 dark:border-gray-500 p-3">
                        <div class="border-b border-gray-300 dark:border-gray-500 h-72">
                            <img class="object-contain h-80" src="{{ asset('assets/img/coding_category.png') }}"
                                alt="Category">
                        </div>

                        <div class="p-4">
                            <a href="{{ route('categories') }}" class="flex items-center hover:underline ml-2">
                                <span class="uppercase text-sm font-normal tracking-normal mr-2">Lihat semua
                                    kategori</span>
                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 18 18">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M15 11v4.833A1.166 1.166 0 0 1 13.833 17H2.167A1.167 1.167 0 0 1 1 15.833V4.167A1.166 1.166 0 0 1 2.167 3h4.618m4.447-2H17v5.768M9.111 8.889l7.778-7.778" />
                                </svg>
                            </a>
                        </div>
                    </div>

                    <div class="w-full px-4 lg:px-0">
                        <h1
                            class="uppercase tracking-normal text-xl font-bold border-b border-gray-300 dark:border-gray-500 p-2">
                            Kategori</h1>
                        <div class="grid grid-cols-1 lg:grid-cols-12 px-2 py-4 space-y-5 lg:space-y-0">
                            <ul class="space-y-6 col-span-6 me-10" aria-labelledby="mega-menu-button">
                                <li>
                                    <a href="/posts?category=sharing">
                                        <h1 class="font-bold text-lg hover:underline dark:text-white">Sharing</h1>
                                    </a>
                                    <h2 class="font-normal text-md text-gray-500 dark:text-gray-300">Berbagi beberapa
                                        pengalaman saya yang mungkin menarik.</h2>
                                </li>
                                <li>
                                    <a href="/posts?category=tips-n-trick">
                                        <h1 class="font-bold text-lg hover:underline dark:text-white">Tips & Trick</h1>
                                    </a>
                                    <h2 class="font-normal text-md text-gray-500 dark:text-gray-300">Berbagi tips dan
                                        trik
                                        seputar Web Development seperti SEO.</h2>
                                </li>
                                <li>
                                    <a href="/posts?category=web-development">
                                        <h1 class="font-bold text-lg hover:underline dark:text-white">Web Development
                                        </h1>
                                    </a>
                                    <h2 class="font-normal text-md text-gray-500 dark:text-gray-300">Berbagi informasi
                                        seputar Web Development terutama Laravel</h2>
                                </li>
                            </ul>
                            <ul class="space-y-6 col-span-6 me-10">
                                <li>
                                    <a href="#">
                                        <h1 class="font-bold text-lg hover:underline dark:text-white">Coming Soon!</h1>
                                    </a>
                                    <h2 class="font-normal text-md text-gray-500 dark:text-gray-300">Apa lagi?</h2>
                                </li>
                                <li>
                                    <a href="#">
                                        <h1 class="font-bold text-lg hover:underline dark:text-white">Coming Soon!</h1>
                                    </a>
                                    <h2 class="font-normal text-md text-gray-500 dark:text-gray-300">Apa lagi?</h2>
                                </li>
                                <li>
                                    <a href="#">
                                        <h1 class="font-bold text-lg hover:underline dark:text-white">Coming Soon!</h1>
                                    </a>
                                    <h2 class="font-normal text-md text-gray-500 dark:text-gray-300">Apa lagi?</h2>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>

<!-- Navbar Drawer -->
<div id="drawer-navigation" class="fixed z-10 top-[58px] py-4 hidden w-full bg-[#E9E9E9] dark:bg-[#444a54] shadow"
    aria-labelledby="drawer-navigation-label">
    <div class="flex justify-center items-center px-4">
        <div class="space-y-2 w-full">
            <ul class="space-y-2 text-xl font-medium uppercase">
                <li>
                    <a href="{{ route('home') }}"
                        class="flex justify-start items-center transition-all duration-150 p-2 text-slate-900 dark:text-white hover:text-gray-50 hover:bg-slate-400 dark:hover:bg-slate-900 rounded-lg {{ Request::is('/') ? 'bg-slate-500/25 dark:bg-slate-800 dark:text-white' : 'text-black dark:text-gray-50' }} group">
                        <span>Beranda</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('posts') }}"
                        class="flex justify-start items-center transition-all duration-150 p-2 text-slate-900 dark:text-white hover:text-gray-50 hover:bg-slate-400 dark:hover:bg-slate-900 rounded-lg {{ Request::is('posts*') ? 'bg-slate-500/25 dark:bg-slate-800 dark:text-white' : 'text-black dark:text-gray-50' }} group">
                        <span>Artikel</span>
                    </a>
                </li>
                <li id="category-toggle">
                    <a href="{{ route('categories') }}"
                        class="flex justify-start items-center transition-all duration-150 p-2 text-slate-900 dark:text-white hover:text-gray-50 hover:bg-slate-400 dark:hover:bg-slate-900 rounded-lg {{ Request::is('categories*') ? 'bg-slate-500/25 dark:bg-slate-800 dark:text-white' : 'text-black dark:text-gray-50' }} group">
                        <span>Kategori</span>
                    </a>
                </li>
            </ul>

            <form action="{{ route('posts') }}">
                @if (request('category'))
                    <input type="hidden" name="category" value="{{ request('category') }}">
                @endif
                @if (request('author'))
                    <input type="hidden" name="author" value="{{ request('author') }}">
                @endif
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                        </svg>
                    </div>
                    <input type="search" id="search-navbar"
                        class="block w-full p-2 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-sky-500 focus:border-sky-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-sky-500 dark:focus:border-sky-500"
                        placeholder="Cari Artikel..." value="{{ request('search') }}" name="search"
                        autocomplete="off" />
                </div>
            </form>
        </div>
    </div>
</div>

@push('script')
    <script>
        $(document).ready(function() {
            $('#xs-menu').on('click', function(e) {
                e.stopPropagation();
                $('#drawer-navigation').slideToggle();
            });

            $(document).on('click', function(e) {
                if (!$(e.target).closest('#xs-menu').length && !$(e.target).closest('#drawer-navigation')
                    .length) {
                    $('#drawer-navigation').slideUp();
                }
            });
        });
    </script>
@endpush
