<nav
    class="container fixed mx-auto w-[98%] sm:max-w-full md:max-w-screen-md lg:max-w-screen-xl bg-white dark:bg-gray-900 z-20 top-3 left-0 right-0 shadow-md rounded-xl dark:shadow-slate-500/25 border border-gray-300 dark:border-gray-600" data-aos="fade-down">
    <div class="flex flex-wrap items-center justify-between p-4">
        <a href="{{ '/' . app()->getLocale() }}" class="flex items-center">
            <span
                class="text-xl font-semibold transition-all duration-200 text-black dark:text-gray-50 hover:text-gray-50 hover:bg-blue-500 px-3 py-2 rounded-lg">Mahadi Saputra</span>
        </a>

        <div class="flex flex-wrap items-center justify-between gap-4 lg:order-2">
            <div class="relative hidden md:block">
                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                    <svg class="w-5 h-5 text-gray-500" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                            clip-rule="evenodd"></path>
                    </svg>
                    <span class="sr-only">Search icon</span>
                </div>

                <!-- LG screen size Search Bar -->

                <form action="{{ '/' . app()->getLocale() . '/posts' }}">
                    @if (request('category'))
                        <input type="hidden" name="category" value="{{ request('category') }}">
                    @endif
                    @if (request('author'))
                        <input type="hidden" name="author" value="{{ request('author') }}">
                    @endif
                    <input type="search" id="search-navbar"
                        class="block w-full p-2 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="{{ __('navbar.search_article') }}" value="{{ request('search') }}"
                        name="search" />
                </form>
            </div>

            @auth
                <button type="button"
                    class="flex text-sm bg-gray-800 rounded-full"
                    id="user-menu-button" aria-expanded="false" data-dropdown-toggle="user-dropdown"
                    data-dropdown-placement="bottom">
                    <span class="sr-only">Open user menu</span>
                    <img class="w-8 h-8 rounded-full"
                        src="{{ auth()->user()->avatar ? '/storage/user-images/' . auth()->user()->avatar : '/img/noprofile.jpg' }}"
                        alt="{{ auth()->user()->name }}">
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
                                class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">{{ __('navbar.dashboard') }}</a>
                        </li>
                        <li>
                            <a href="{{ route('dashboard.profile') }}"
                                class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">{{ __('navbar.edit_profile') }}</a>
                        </li>
                        <div class="py-1">
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit"
                                    class="flex justify-start px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-400 dark:hover:text-white w-full">{{ __('navbar.logout') }}</button>
                            </form>
                        </div>
                    </ul>
                </div>
            @else
                <button type="button"
                    class="text-sm bg-gray-800 rounded-full"
                    id="user-menu-button" aria-expanded="false" data-dropdown-toggle="user-dropdown"
                    data-dropdown-placement="bottom">
                    <span class="sr-only">Open user menu</span>
                    <img class="w-8 h-8 rounded-full" src="/img/noprofile.jpg" alt="Guest">
                </button>

                <!-- Dropdown menu -->
                <div class="z-50 hidden my-4 text-base list-none bg-white rounded-lg shadow dark:bg-gray-700"
                    id="user-dropdown">
                    <ul class="py-2" aria-labelledby="user-menu-button">
                        <li>
                            <a href="{{ '/' . app()->getLocale() . '/login' }}"
                                class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">{{ __('navbar.login') }}</a>
                        </li>
                        <li>
                            <a href="{{ '/' . app()->getLocale() . '/register' }}"
                                class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">{{ __('navbar.register') }}</a>
                        </li>
                    </ul>
                </div>
            @endauth
            <button data-collapse-toggle="navbar-search" type="button"
                class="inline-flex items-center p-2 ml-1 text-sm text-gray-500 rounded-lg lg:hidden hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-700"
                aria-controls="mobile-menu-2" aria-expanded="false">
                <span class="sr-only">Open main menu</span>
                <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                        clip-rule="evenodd"></path>
                </svg>
            </button>

            <button id="theme-toggle" type="button"
                class="text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 rounded-lg text-sm p-2.5">
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

        <div class="items-center justify-between hidden w-full lg:flex lg:w-auto lg:order-1" id="navbar-search">
            <div class="relative mt-3 lg:hidden">
                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                    <svg class="w-5 h-5 text-gray-500" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                            clip-rule="evenodd"></path>
                    </svg>
                </div>

                <!-- Mobile Search Bar -->
                <form action="{{ '/' . app()->getLocale() . '/posts' }}">
                    @if (request('category'))
                        <input type="hidden" name="category" value="{{ request('category') }}">
                    @endif
                    @if (request('author'))
                        <input type="hidden" name="author" value="{{ request('author') }}">
                    @endif
                    <input type="search" id="search-navbar"
                        class="block w-full p-2 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="{{ __('navbar.search_article') }}" value="{{ request('search') }}"
                        name="search" />
                </form>
            </div>
            <ul
                class="flex flex-col lg:justify-center lg:items-center p-4 lg:p-0 mt-4 font-medium border border-gray-100 rounded-lg bg-gray-50 lg:flex-row gap-2 lg:mt-0 lg:border-0 lg:bg-transparent dark:bg-gray-800 lg:dark:bg-gray-900 dark:border-gray-700 w-full">
                <li>
                    <a href="{{ '/' . app()->getLocale() . '/' }}"
                        class="block py-2 pl-3 pr-4 {{ Request::is('en', 'id') ? 'text-white bg-blue-500 md:px-3 md:py-2 rounded-lg' : 'text-black dark:text-gray-50 transition-all duration-200 hover:bg-blue-500 hover:text-gray-50 md:px-3 md:py-2 rounded-lg' }}
          ">
                        {{ __('navbar.home') }}
                    </a>
                </li>
                <li>
                    <a href="{{ '/' . app()->getLocale() . '/posts' }}"
                        class="block py-2 pl-3 pr-4 {{ Request::is(app()->getLocale() . '/posts*') ? 'text-white bg-blue-500 md:px-3 md:py-2 rounded-lg' : 'text-black dark:text-gray-50 transition-all duration-200 hover:bg-blue-500 hover:text-gray-50 md:px-3 md:py-2 rounded-lg' }}
          ">
                        {{ __('navbar.posts') }}
                    </a>
                </li>
                <li>
                    <a href="{{ '/' . app()->getLocale() . '/categories' }}"
                        class="block py-2 pl-3 pr-4 {{ Request::is(app()->getLocale() . '/categories*') ? 'text-white bg-blue-500 md:px-3 md:py-2 rounded-lg' : 'text-black dark:text-gray-50 transition-all duration-200 hover:bg-blue-500 hover:text-gray-50 md:px-3 md:py-2 rounded-lg' }}">
                        {{ __('navbar.category') }}
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
