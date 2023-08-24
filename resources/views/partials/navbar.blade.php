<nav class="fixed top-0 z-20 w-full backdrop-blur bg-white/50 dark:bg-[#020817]/50 px-4 py-2">
    <div class="flex flex-wrap items-center justify-between">
        <a href="{{ route('home') }}" class="flex items-center">
            <span class="text-xl font-semibold transition-all duration-150 text-black dark:text-gray-50 hover:bg-slate-500/50 hover:text-gray-50 dark:hover:bg-slate-700 px-3 py-2 rounded-lg">Mahadi Saputra</span>
        </a>

        <div class="flex flex-wrap items-center justify-between gap-4 lg:order-2">
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
                    <input type="search" id="search-navbar"
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

            <button data-drawer-target="drawer-navigation" data-drawer-show="drawer-navigation" data-drawer-placement="top" aria-controls="drawer-navigation" type="button"
                class="inline-flex items-center p-2 ml-1 text-sm text-gray-500 rounded-lg lg:hidden hover:bg-gray-300/50 dark:text-gray-400 dark:hover:bg-gray-700"
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
            <button id="theme-toggle"
                class="text-gray-500 dark:text-gray-400 hover:bg-gray-300/50 dark:hover:bg-gray-700 rounded-lg text-sm p-2.5">
                <svg id="theme-toggle-dark-icon" class="hidden w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path>
                </svg>
                <svg id="theme-toggle-light-icon" class="hidden w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
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
                        class="px-5 py-3 transition-all duration-150 rounded-lg text-slate-900 dark:text-white hover:text-gray-50 hover:bg-slate-500/50 dark:hover:bg-slate-700 {{ Request::is('/') ? 'bg-slate-300/25 dark:bg-slate-600 dark:text-white' : 'text-black dark:text-gray-50' }}
            ">
                        {{ __('Beranda') }}
                    </a>
                </li>
                <li>
                    <a href="{{ route('posts') }}"
                        class="px-5 py-3 transition-all duration-150 rounded-lg text-slate-900 dark:text-white hover:text-gray-50 hover:bg-slate-500/50 dark:hover:bg-slate-700 {{ Request::is('posts*') ? 'bg-slate-300/25 dark:bg-slate-600 dark:text-white' : 'text-black dark:text-gray-50' }}
            ">
                        {{ __('Artikel') }}
                    </a>
                </li>
                <li>
                    <a href="{{ route('categories') }}"
                        class="px-5 py-3 transition-all duration-150 rounded-lg text-slate-900 dark:text-white hover:text-gray-50 hover:bg-slate-500/50 dark:hover:bg-slate-700 {{ Request::is('categories*') ? 'bg-slate-300/25 dark:bg-slate-600 dark:text-white' : 'text-black dark:text-gray-50' }}">
                        {{ __('Kategori') }}
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- Navbar Drawer -->
<div id="drawer-navigation"
    class="fixed top-0 right-0 z-40 w-full min-h-screen p-4 transition-transform -translate-y-full bg-white dark:bg-slate-900"
    aria-labelledby="drawer-navigation-label">
    <button type="button" data-drawer-hide="drawer-navigation" aria-controls="drawer-navigation"
        class="text-slate-400 bg-transparent hover:bg-slate-200 hover:text-slate-900 rounded-lg text-sm p-1.5 absolute top-2.5 right-2.5 inline-flex items-center dark:hover:bg-slate-600 dark:hover:text-white">
        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
            xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd"
                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                clip-rule="evenodd"></path>
        </svg>
        <span class="sr-only">Close menu</span>
    </button>

    <div class="flex justify-center items-center min-h-screen">
        <div class="space-y-5 w-full">
            <ul class="space-y-5 text-xl font-medium uppercase">
                <li>
                    <a href="{{ route('home') }}"
                        class="flex justify-center items-center transition-all duration-150 p-2 text-slate-900 dark:text-white hover:text-gray-50 hover:bg-slate-500 dark:hover:bg-slate-800 rounded-lg {{ Request::is('/') ? 'bg-slate-200 dark:bg-slate-700 dark:text-white' : 'text-black dark:text-gray-50' }} group">
                        <span>{{ __('Beranda') }}</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('posts') }}"
                        class="flex justify-center items-center transition-all duration-150 p-2 text-slate-900 dark:text-white hover:text-gray-50 hover:bg-slate-500 dark:hover:bg-slate-800 rounded-lg {{ Request::is('posts*') ? 'bg-slate-200 dark:bg-slate-700 dark:text-white' : 'text-black dark:text-gray-50' }} group">
                        <span>{{ __('Artikel') }}</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('categories') }}"
                        class="flex justify-center items-center transition-all duration-150 p-2 text-slate-900 dark:text-white hover:text-gray-50 hover:bg-slate-500 dark:hover:bg-slate-800 rounded-lg {{ Request::is('categories*') ? 'bg-slate-200 dark:bg-slate-700 dark:text-white' : 'text-black dark:text-gray-50' }} group">
                        <span>{{ __('Kategori') }}</span>
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
                            placeholder="{{ __('Cari Artikel...') }}" value="{{ request('search') }}"
                            name="search" autocomplete="off" />
                    </div>
                </form>
        </div>
    </div>
</div>
