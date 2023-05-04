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
                <div class="flex">
                    <div role="status" class="max-w-sm animate-pulse mr-4">
                      <div class="h-2.5 bg-gray-200 rounded-full dark:bg-gray-700 w-60 mb-4"></div>
                    </div>

                    <div role="status" class="max-w-sm animate-pulse mr-4">
                        <div class="h-2.5 bg-gray-200 rounded-full dark:bg-gray-700 w-60 mb-4"></div>
                    </div>
                </div>

                <div role="status" class="max-w-sm animate-pulse mr-4">
                    <div class="h-2.5 bg-gray-200 rounded-full dark:bg-gray-700 w-96 mb-4"></div>
                </div>

                <div>
                    <div class="flex">
                        <div role="status" class="max-w-sm animate-pulse mr-2">
                          <div class="h-10 bg-gray-200 rounded-lg dark:bg-gray-700 w-48 mb-4"></div>
                        </div>
    
                        <div role="status" class="max-w-sm animate-pulse">
                            <div class="h-10 bg-gray-200 rounded-lg dark:bg-gray-700 w-40 mb-4"></div>
                        </div>
                    </div>

                    <div role="status" class="max-w-sm animate-pulse mt-5">
                        <div class="h-2.5 bg-gray-200 rounded-full dark:bg-gray-700 w-44 mb-4"></div>
                    </div>
                </div>
            </div>

            <div class="w-full lg:w-1/3 p-4 hidden md:block">
                <div role="status" class="space-y-8 animate-pulse md:space-y-0 md:space-x-8 md:flex md:items-center">
                    <div class="flex items-center justify-center w-full h-80 bg-gray-300 rounded sm:w-96 dark:bg-gray-700">
                        <svg class="w-12 h-12 text-gray-200" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" fill="currentColor" viewBox="0 0 640 512"><path d="M480 80C480 35.82 515.8 0 560 0C604.2 0 640 35.82 640 80C640 124.2 604.2 160 560 160C515.8 160 480 124.2 480 80zM0 456.1C0 445.6 2.964 435.3 8.551 426.4L225.3 81.01C231.9 70.42 243.5 64 256 64C268.5 64 280.1 70.42 286.8 81.01L412.7 281.7L460.9 202.7C464.1 196.1 472.2 192 480 192C487.8 192 495 196.1 499.1 202.7L631.1 419.1C636.9 428.6 640 439.7 640 450.9C640 484.6 612.6 512 578.9 512H55.91C25.03 512 .0006 486.1 .0006 456.1L0 456.1z"/></svg>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.js"></script>
    @vite('resources/js/app.js')
    </body>
</html>