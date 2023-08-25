@extends('layouts.main')

@section('container')
    <!-- Breadcrumbs -->
    {{ Breadcrumbs::render('register') }}
    <main class="container w-full lg:max-w-lg mx-auto px-4 lg:px-0" data-aos="fade-up">

        <div
            class="p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-6 md:p-8 dark:bg-gray-800 dark:border-gray-700">
            <form class="space-y-6" action="{{ route('register') }}" method="POST">
                @csrf
                <h5 class="text-xl font-bold text-gray-900 dark:text-gray-50">{{ __('Daftar') }}</h5>
                <div>
                    <label for="name"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-50">{{ __('Nama') }}</label>
                    <input type="name" name="name" id="name"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-sky-500 focus:border-sky-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-gray-50"
                        placeholder="Martin Garrix" value="{{ old('name') }}" required autocomplete="off">
                    @error('name')
                        <div class="text-sm text-red-700 dark:text-red-300 mt-2">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div>
                    <label for="email"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-50">Email</label>
                    <input type="email" name="email" id="email"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-sky-500 focus:border-sky-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-gray-50"
                        placeholder="name@company.com" value="{{ old('email') }}" required autocomplete="off">
                    @error('email')
                        <div class="text-sm text-red-700 dark:text-red-300 mt-2">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div>
                    <label for="username"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-50">{{ __('Nama pengguna') }}</label>
                    <input type="username" name="username" id="username"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-sky-500 focus:border-sky-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-gray-50"
                        placeholder="mrbeast6000" value="{{ old('username') }}" required autocomplete="off">
                    @error('username')
                        <div class="text-sm text-red-700 dark:text-red-300 mt-2">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div>
                    <label for="password"
                        class="flex items-center mb-2 text-sm font-medium text-gray-900 dark:text-gray-50">
                        {{ __('Kata sandi') }}
                        <button data-popover-target="popover-description" data-popover-placement="bottom-end"
                            type="button"><svg class="w-4 h-4 ml-1 text-gray-400 hover:text-gray-500" aria-hidden="true"
                                fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-3a1 1 0 00-.867.5 1 1 0 11-1.731-1A3 3 0 0113 8a3.001 3.001 0 01-2 2.83V11a1 1 0 11-2 0v-1a1 1 0 011-1 1 1 0 100-2zm0 8a1 1 0 100-2 1 1 0 000 2z"
                                    clip-rule="evenodd"></path>
                            </svg><span class="sr-only">Show information</span></button>
                    </label>
                    <div data-popover id="popover-description" role="tooltip"
                        class="absolute z-10 invisible inline-block text-sm text-gray-500 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 w-72 dark:bg-gray-800 dark:border-gray-600 dark:text-gray-400">
                        <div class="p-5 space-y-2">
                            <h3 class="font-semibold text-gray-900 dark:text-gray-50">
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
                            class="block bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-sky-500 focus:border-sky-500 w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-gray-50"
                            required>
                        <button type="button" class="text-slate-900 dark:text-gray-50 absolute right-2 top-3"
                            id="showPwd" onclick="togglePasswordVisibility()">
                            <svg id="show" class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 20 14">
                                <g stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
                                    <path d="M10 10a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z" />
                                    <path d="M10 13c4.97 0 9-2.686 9-6s-4.03-6-9-6-9 2.686-9 6 4.03 6 9 6Z" />
                                </g>
                            </svg>

                            <svg id="hide" class="w-4 h-4" style="display: none;" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="m2 13.587 3.055-3.055A4.913 4.913 0 0 1 5 10a5.006 5.006 0 0 1 5-5c.178.008.356.026.532.054l1.744-1.744A8.973 8.973 0 0 0 10 3C4.612 3 0 8.336 0 10a6.49 6.49 0 0 0 2 3.587Z" />
                                <path
                                    d="m12.7 8.714 6.007-6.007a1 1 0 1 0-1.414-1.414L11.286 7.3a2.98 2.98 0 0 0-.588-.21l-.035-.01a2.981 2.981 0 0 0-3.584 3.583c0 .012.008.022.01.033.05.204.12.401.211.59l-6.007 6.007a1 1 0 1 0 1.414 1.414L8.714 12.7c.189.091.386.162.59.211.011 0 .021.007.033.01a2.981 2.981 0 0 0 3.584-3.584c0-.012-.008-.023-.011-.035a3.05 3.05 0 0 0-.21-.588Z" />
                                <path
                                    d="M17.821 6.593 14.964 9.45a4.952 4.952 0 0 1-5.514 5.514L7.665 16.75c.767.165 1.55.25 2.335.251 6.453 0 10-5.258 10-7 0-1.166-1.637-2.874-2.179-3.407Z" />
                            </svg>
                        </button>
                    </div>
                    @error('password')
                        <div class="text-sm text-red-700 dark:text-red-300 mt-2">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <button type="submit"
                    class="w-full text-gray-50 bg-sky-700 hover:bg-sky-800 focus:ring-4 focus:outline-none focus:ring-sky-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-sky-600 dark:hover:bg-sky-700 dark:focus:ring-sky-800">{{ __('Daftar') }}</button>
                <div class="text-sm text-center font-medium text-gray-500 dark:text-gray-300">
                    {{ __('Sudah punya akun?') }} <a href="{{ route('login') }}"
                        class="text-sky-700 hover:underline dark:text-sky-500">{{ __('Masuk') }}</a>
                </div>
            </form>
        </div>

    </main>
@endsection

@push('script')
    <script src="{{ asset('assets/js/pwd-toggle.js') }}"></script>
@endpush
