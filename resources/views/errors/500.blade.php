<!doctype html>
<html lang="{{ Carbon\Carbon::getLocale() }}">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="description" content="Berisi tentang Informasi seputar dunia Web Developer dan juga pengalamlan saya!">
    <meta name="keywords"
        content="HTML, CSS, JavaScript, Laravel, React, Blog, Mahadi Saputra, Mahadi, Saputra, Dode, Dode Mahadi, Web Developer, Fullstack Web Developer, Front End Web Developer, Back End Web Developer">
    <meta name="author" content="I Dewa Gede Mahadi Saputra">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Tailwind Property -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])


    <!-- Custom Font Style -->
    <style>
        @font-face {
            font-family: "GT Walsheim Pro";
            src: url('/assets/font/GTWalsheimPro-Regular.ttf');
        }

        @font-face {
            font-family: "GT Walsheim Pro";
            src: url('/assets/font/GTWalsheimPro-Bold.ttf');
            font-weight: bold;
        }
    </style>

    <!-- jQuery -->
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.js"
        integrity="sha512-8Z5++K1rB3U+USaLKG6oO8uWWBhdYsM3hmdirnOEWp8h2B1aOikj5zBzlXs8QOrvY9OxEnD2QDkbSKKpfqcIWw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- Style -->
    <script type="text/javascript" src="{{ asset('assets/js/style.js') }}"></script>

    <title>500 - {{ config('app.name') }}</title>
</head>

<body class="dark:bg-gray-900 select-none">
    <div class="min-h-screen w-full bg-white dark:bg-gray-800 p-4 flex flex-col justify-center items-center mx-auto">
        <h1 class="text-5xl font-extrabold dark:text-white mb-4">MsB<small
                class="ml-2 font-semibold text-gray-500 dark:text-gray-400">500</small></h1>

        <p class="text-lg font-normal text-gray-500 lg:text-xl dark:text-gray-400 lg:text-left mb-5">Ada masalah dalam server, tunggu beberapa saat lagi..</p>
    </div>
</body>

</html>
