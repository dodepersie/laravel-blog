@extends('layouts.main')

@section('container')

<!-- Breadcrumbs -->
<div class="w-full max-w-sm mt-24 mx-auto">
    {{ Breadcrumbs::render('register') }}
</div>

<div class="flex justify-center mt-5">
    <div class="w-full max-w-sm p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-6 md:p-8 dark:bg-gray-800 dark:border-gray-700 mb-4">
        <form class="space-y-6" action="/register" method="POST">
            @csrf
            <h5 class="text-xl font-medium text-gray-900 dark:text-white">{{ __('register.register') }}</h5>
            <div>
                <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('register.name') }}</label>
                <input type="name" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="Martin Garrix" value="{{ old('name') }}" required>
                @error('name')
                <div class="text-sm text-pink-700 mt-2">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div>
                <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                <input type="email" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="name@company.com" value="{{ old('email') }}" required>
                @error('email')
                <div class="text-sm text-pink-700 mt-2">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div>
                <label for="username" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('register.username') }}</label>
                <input type="username" name="username" id="username" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="mrbeast6000" value="{{ old('username') }}" required>
                @error('username')
                <div class="text-sm text-pink-700 mt-2">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div>
                <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('register.password') }}</label>
                <input type="password" name="password" id="password" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required>
                @error('password')
                <div class="text-sm text-pink-700 mt-2">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <button type="submit" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Register</button>
            <div class="text-sm text-center font-medium text-gray-500 dark:text-gray-300">
                {{ __('register.already_have') }} <a href="{{ '/' . app()->getLocale() . '/login' }}" class="text-blue-700 hover:underline dark:text-blue-500">{{ __('register.login') }}</a>
            </div>
        </form>
    </div>
</div>
@endsection