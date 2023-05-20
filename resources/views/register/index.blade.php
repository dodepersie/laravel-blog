@extends('layouts.main')

@section('container')
    <main class='container max-w-screen-sm mt-24 mx-auto'>
        <!-- Breadcrumbs -->
        {{ Breadcrumbs::render('register') }}

            <div
                class="p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-6 md:p-8 dark:bg-gray-800 dark:border-gray-700 mb-4">
                <form class="space-y-6" action="/register" method="POST">
                    @csrf
                    <h5 class="text-xl font-medium text-gray-900 dark:text-white">{{ __('register.register') }}</h5>
                    <div>
                        <label for="name"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('register.name') }}</label>
                        <input type="name" name="name" id="name"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                            placeholder="Martin Garrix" value="{{ old('name') }}" required>
                        @error('name')
                            <div class="text-sm text-pink-700 mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div>
                        <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                        <input type="email" name="email" id="email"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                            placeholder="name@company.com" value="{{ old('email') }}" required>
                        @error('email')
                            <div class="text-sm text-pink-700 mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div>
                        <label for="username"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('register.username') }}</label>
                        <input type="username" name="username" id="username"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                            placeholder="mrbeast6000" value="{{ old('username') }}" required>
                        @error('username')
                            <div class="text-sm text-pink-700 mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div>
                        <label for="password" class="flex items-center mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            {{ __('register.password') }}
                            <button data-popover-target="popover-description" data-popover-placement="bottom-end"
                                type="button"><svg class="w-4 h-4 ml-2 text-gray-400 hover:text-gray-500" aria-hidden="true"
                                    fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-3a1 1 0 00-.867.5 1 1 0 11-1.731-1A3 3 0 0113 8a3.001 3.001 0 01-2 2.83V11a1 1 0 11-2 0v-1a1 1 0 011-1 1 1 0 100-2zm0 8a1 1 0 100-2 1 1 0 000 2z"
                                        clip-rule="evenodd"></path>
                                </svg><span class="sr-only">Show information</span></button>
                        </label>
                        <div data-popover id="popover-description" role="tooltip"
                            class="absolute z-10 invisible inline-block text-sm text-gray-500 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 w-72 dark:bg-gray-800 dark:border-gray-600 dark:text-gray-400">
                            <div class="p-5 space-y-2">
                                <h3 class="font-semibold text-gray-900 dark:text-white">
                                    {{ @__('register.password_must') }}
                                </h3>
                                <ol>
                                    <li>{{ @__('register.rules1') }}</li>
                                    <li>{{ @__('register.rules2') }}</li>
                                    <li>{{ @__('register.rules3') }}</li>
                                    <li>{{ @__('register.rules4') }}</li>
                                    <li>{{ @__('register.rules5') }}</li>
                                </ol>
                            </div>
                            <div data-popper-arrow></div>
                        </div>
                        <div class="relative">
                            <input type="password" name="password" id="password" placeholder="••••••••"
                                class="block bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                required>
                            <button type="button"
                                class="text-slate-900 dark:text-white absolute right-2.5 bottom-1"
                                id="showPwd" onclick="togglePasswordVisibility()" disabled>
                                <span class="material-symbols-outlined">
                                    visibility
                                </span>
                            </button>
                        </div>
                        @error('password')
                            <div class="text-sm text-pink-700 mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <button type="submit"
                        class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Register</button>
                    <div class="text-sm text-center font-medium text-gray-500 dark:text-gray-300">
                        {{ __('register.already_have') }} <a href="{{ '/' . app()->getLocale() . '/login' }}"
                            class="text-blue-700 hover:underline dark:text-blue-500">{{ __('register.login') }}</a>
                    </div>
                </form>
            </div>
        
    </main>
@endsection

@push('script')
    <script>
        let passwordInput = document.getElementById('password');
        let showPwd = document.getElementById('showPwd');

        function togglePasswordVisibility() {
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                showPwd.innerHTML = '<span class="material-symbols-outlined">visibility_off</span>';
            } else {
                passwordInput.type = 'password';
                showPwd.innerHTML = '<span class="material-symbols-outlined">visibility</span>';
            }
        }

        passwordInput.addEventListener("keyup", function() {
            if (passwordInput.value) {
                showPwd.removeAttribute("disabled");
            } else {
                showPwd.setAttribute("disabled", "disabled");
            }
        });
    </script>
@endpush
