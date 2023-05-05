<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Tailwind Property -->
    @vite('resources/css/app.css')

    <!-- Google Font-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Karla&display=swap" rel="stylesheet">

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>

    <title>Mahadi Saputra's Blog | {{ $title }}</title>
</head>
<body class="dark:bg-gray-900 select-none" style="font-family: 'Karla', sans-serif;">
    <div class="min-h-screen flex items-center justify-center bg-white dark:bg-gray-800">
        <div class="max-w-screen-xl mx-auto px-4 flex flex-col lg:flex-row items-center justify-between">
            <div class="w-full lg:w-2/3 p-4 flex flex-col items-center lg:items-start">
                <h1 class="text-5xl font-extrabold dark:text-white mb-4">MsB<small class="ml-2 font-semibold text-gray-500 dark:text-gray-400">{{ $title }}</small></h1>

                <p class="text-lg font-normal text-gray-500 lg:text-xl dark:text-gray-400 lg:text-left mb-5">Silahkan pilih bahasa untuk melanjutkan — Please choose language to continue</p>

                <div>
                    <a href="/id" class="inline-flex items-center text-blue-700 hover:text-white border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-500 dark:focus:ring-blue-800">
                        <span class="mr-2">
                            <img style="border: 1px solid #555;" width="20px" src="/img/id.svg" alt="Indonesia Flag">
                        </span>
                        Ke Halaman Utama
                    </a>                    
                    <a href="/en" class="inline-flex items-center text-blue-700 hover:text-white border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-500 dark:focus:ring-blue-800">
                        <span class="mr-2">
                            <img style="border: 1px solid #555;" width="20px" src="/img/gb.svg" alt="Great Britain Flag">
                        </span>
                        To Main Page
                    </a>

                    <div class="mt-5 font-bold text-gray-500 dark:text-gray-400">
                        <p>By Mahadi Saputra @ 2023</p>
                    </div>
                </div>
            </div>

            <div class="w-full lg:w-1/3 p-4 hidden md:block">
                <img class="h-auto max-w-full" src="https://source.unsplash.com/500x500?Bali" alt="Right image">
            </div>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.js"></script>
    @vite('resources/js/app.js')
    </body>
</html>