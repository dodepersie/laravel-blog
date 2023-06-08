<!doctype html>
<html lang="{{ Carbon\Carbon::getLocale() }}">

<head>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="description" content="Berisi tentang Informasi seputar dunia Web Developer dan juga pengalamlan saya!">
    <meta name="keywords"
        content="HTML, CSS, JavaScript, Laravel, React, Blog, Mahadi Saputra, Mahadi, Saputra, Dode, Dode Mahadi, Web Developer, Fullstack Web Developer, Front End Web Developer, Back End Web Developer">
    <meta name="author" content="I Dewa Gede Mahadi Saputra">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Tailwind Property -->
    @vite('resources/css/app.css')

    <!-- Google Font-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Karla&display=swap" rel="stylesheet">

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E="
        crossorigin="anonymous"></script>

    <!-- Style -->
    <script type="text/javascript" src="{{ asset('/js/style.js') }}"></script>

    <title>Mahadi Saputra's Blog | {{ $title }}</title>
</head>

<body class="dark:bg-gray-900 select-none" style="font-family: 'Karla', sans-serif;">
    <div class="min-h-screen w-full bg-white dark:bg-gray-800 p-4 flex flex-col justify-center items-center mx-auto">
        <h1 class="text-5xl font-extrabold dark:text-white mb-4">MsB<small
                class="ml-2 font-semibold text-gray-500 dark:text-gray-400">{{ $title }}</small></h1>

        <p class="text-lg font-normal text-gray-500 lg:text-xl dark:text-gray-400 lg:text-left mb-5">
            {{ @__('404.description') }}</p>

        <button onclick="window.history.back()"
            class="text-blue-700 hover:text-white border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:border-blue-500 dark:text-white dark:hover:text-white dark:hover:bg-blue-500 dark:focus:ring-blue-800">
            {{ @__('404.back') }}
        </button>
    </div>

    <!-- Optional JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.js"></script>
    @vite('resources/js/app.js')
</body>

</html>
