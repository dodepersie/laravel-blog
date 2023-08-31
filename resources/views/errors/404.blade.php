@extends('layouts.error')

@section('content')
    <div class="space-y-5 min-h-screen w-full bg-white dark:bg-gray-800 p-4 flex flex-col justify-center items-center mx-auto">
        <img class="object-contain h-72" src="{{ asset('assets/img/404.png') }}" alt="404 Not Found" />
        <h1 class="text-5xl font-extrabold dark:text-white">MsB
            <small class="font-semibold text-gray-500 dark:text-gray-400">404</small>
        </h1>

        <p class="text-center text-lg font-normal text-gray-500 lg:text-xl dark:text-gray-400 lg:text-left mb-5">Halaman yang kamu cari
            tidak ditemukan.. :(</p>

        <button onclick="window.history.back()"
            class="inline-flex justify-center items-center px-5 py-3 my-5 text-base font-medium text-center text-gray-50 bg-blue-700 dark:bg-slate-900 dark:hover:bg-slate-900/50 rounded-lg hover:bg-blue-600/90">
            <svg class="w-5 h-5 mr-2 rotate-180" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd"
                    d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                    clip-rule="evenodd"></path>
            </svg>
            Kembali
        </button>
    </div>
@endsection
