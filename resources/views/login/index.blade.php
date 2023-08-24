@extends('layouts.main')

@section('container')
    <!-- Breadcrumbs -->
    {{ Breadcrumbs::render('login') }}

    <main class="container w-full lg:w-1/3 mx-auto px-4 lg:px-0" data-aos="fade-up">

        <div
            class="p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-6 md:p-8 dark:bg-gray-800 dark:border-gray-700">
            @if (session()->has('success'))
                <div class="flex p-4 mb-4 text-sm text-green-800 border border-green-300 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400 dark:border-green-800"
                    role="alert">
                    <svg aria-hidden="true" class="flex-shrink-0 inline w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                            clip-rule="evenodd"></path>
                    </svg>
                    <span class="sr-only">Info</span>
                    <div>
                        <span class="font-medium">{{ session('success') }}</span>
                    </div>
                </div>
            @endif

            @if ($errors->any())
                <div class="flex p-4 mb-4 text-sm text-red-800 border border-red-300 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400 dark:border-red-800"
                    role="alert">
                    <svg aria-hidden="true" class="flex-shrink-0 inline w-5 h-5 mr-3" fill="currentColor"
                        viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                            clip-rule="evenodd"></path>
                    </svg>
                    <span class="sr-only">Info</span>
                    <div>
                        @foreach ($errors->all() as $error)
                            <span class="font-medium">{{ $error }}</span>
                        @endforeach
                    </div>
                </div>
            @endif

            <form class="space-y-6" action="{{ route('loginAuth') }}" method="POST">
                @csrf
                <h5 class="text-xl font-medium text-gray-900 dark:text-gray-50">{{ __('Masuk ke Dashboard') }}</h5>
                <div>
                    <input type="email" name="email" id="email"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-sky-500 focus:border-sky-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-gray-50"
                        placeholder="name@company.com" value="{{ old('email') }}" autofocus required autocomplete="off">
                </div>
                <div class="relative">
                    <input type="password" name="password" id="password" placeholder="••••••••"
                        class="block bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-sky-500 focus:border-sky-500 w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-gray-50"
                        required>
                    <button type="button" class="text-slate-900 dark:text-gray-50 absolute right-2.5 bottom-1"
                        id="showPwd" onclick="togglePasswordVisibility()">
                        <span class="material-symbols-outlined">
                            visibility
                        </span>
                    </button>
                </div>
                <button type="submit"
                    class="w-full text-gray-50 bg-sky-700 hover:bg-sky-800 focus:ring-4 focus:outline-none focus:ring-sky-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-sky-600 dark:hover:bg-sky-700 dark:focus:ring-sky-800">{{ __('Masuk') }}</button>
                <div class="text-sm text-center font-medium text-gray-500 dark:text-gray-300">
                    {{ __('Belum punya akun?') }} <a href="{{ route('register') }}"
                        class="text-sky-700 hover:underline dark:text-sky-500">{{ __('Daftar') }}</a>
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
        };
    </script>
@endpush
