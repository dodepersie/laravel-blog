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
    
    <!-- Facebook Meta Tags -->
    <meta property="og:url" content="https://mahadisaputra.my.id/">
    <meta property="og:type" content="website">
    <meta property="og:title" content="Mahadi Saputra's Blog | {{ $title }}">
    <meta property="og:description" content="Berisi tentang Informasi seputar dunia Web Developer dan juga pengalamlan saya!">
    <meta property="og:image" content="{{ asset('/img/1.png') }}">
    
    <!-- Twitter Meta Tags -->
    <meta name="twitter:card" content="summary_large_image">
    <meta property="twitter:domain" content="mahadisaputra.my.id">
    <meta property="twitter:url" content="https://mahadisaputra.my.id/">
    <meta name="twitter:title" content="Mahadi Saputra's Blog | {{ $title }}">
    <meta name="twitter:description" content="Berisi tentang Informasi seputar dunia Web Developer dan juga pengalamlan saya!">
    <meta name="twitter:image" content="{{ asset('/img/1.png') }}">

    <!-- Tailwind Property -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Font-->
    <style>
        @font-face {
            font-family: "GT Walsheim Pro";
            src: url('/assets/font/GTWalsheimPro-Regular.ttf');
        }
    </style>

    <!-- Style -->
    <script type="text/javascript" src="{{ asset('/js/style.js') }}"></script>

    <title>Mahadi Saputra's Blog | {{ $title }}</title>
</head>

<body class="dark:bg-[#020817]">
    <div class="relative min-h-screen flex justify-center items-center">
        <div class="max-w-screen-xl mx-auto px-4 flex flex-col lg:flex-row items-center justify-between">

            <div class="absolute inset-x-0 top-4 -z-10 transform-gpu overflow-hidden blur-3xl">
                <div class="hidden aspect-[1108/632] w-[69.25rem] flex-none bg-gradient-to-r from-blue-600 to-indigo-800 opacity-25 dark:block"
                    style="clip-path: polygon(73.6% 51.7%, 91.7% 11.8%, 100% 46.4%, 97.4% 82.2%, 92.5% 84.9%, 75.7% 64%, 55.3% 47.5%, 46.5% 49.4%, 45% 62.9%, 50.3% 87.2%, 21.3% 64.1%, 0.1% 100%, 5.4% 51.1%, 21.4% 63.9%, 58.9% 0.2%, 73.6% 51.7%);">
                </div>
            </div>

            <div class="w-full lg:w-2/3 p-4 flex flex-col items-start">
                <h1 class="text-5xl font-extrabold dark:text-slate-50 mb-4">MsB<small
                        class="ml-2 font-semibold text-slate-500 dark:text-slate-400">{{ $title }}</small></h1>

                <p class="text-lg font-normal text-slate-500 lg:text-xl dark:text-slate-400 lg:text-left mb-5">Silahkan
                    pilih bahasa untuk melanjutkan — Please choose language to continue</p>

                <div>
                    <a href="/id"
                        class="inline-flex items-center text-blue-700 hover:text-slate-50 border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:border-blue-500 dark:text-slate-50 dark:hover:text-slate-50 dark:hover:bg-blue-500 dark:focus:ring-blue-800">
                        <span class="mr-2">
                            <img style="border: 1px solid #555;" width="20px" src="/img/id.svg" alt="Indonesia Flag">
                        </span>
                        Ke Halaman Utama
                    </a>
                    <a href="/en"
                        class="inline-flex items-center text-blue-700 hover:text-slate-50 border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:border-blue-500 dark:text-slate-50 dark:hover:text-slate-50 dark:hover:bg-blue-500 dark:focus:ring-blue-800">
                        <span class="mr-2">
                            <img style="border: 1px solid #555;" width="20px" src="/img/gb.svg"
                                alt="Great Britain Flag">
                        </span>
                        To Main Page
                    </a>

                    <div class="mt-5 font-bold text-slate-500 dark:text-slate-400">
                        <p>By Mahadi Saputra @ {{ now()->year }}</p>
                    </div>
                </div>
            </div>

            <div class="w-full lg:w-1/3 p-4 hidden lg:block">
                <img class="h-auto max-w-full shadow-lg rounded-xl" src="{{ asset('/img/1.png') }}"
                    alt="Mahadi Saputra">
            </div>
        </div>
    </div>
</body>

</html>