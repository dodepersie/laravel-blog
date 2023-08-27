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
    @vite('resources/css/app.css')

    <!-- Font-->
    <style>
        @font-face {
            font-family: "GT Walsheim Pro";
            src: url('/assets/font/GTWalsheimPro-Regular.ttf');
        }
    </style>

    <!-- Style -->
    <script type="text/javascript" src="{{ asset('assets/js/style.js') }}"></script>

    <title>Mahadi Saputra's Blog | {{ $title }}</title>
</head>

<body class="dark:bg-[#020817]">
    <main class="flex flex-col items-center justify-center min-h-screen px-4" data-aos="fade-up">

            <div class="p-4 bg-white border border-gray-200 rounded-lg sm:p-6 md:p-8 dark:bg-gray-800 dark:border-gray-700">
                @if (session()->has('message'))
                    <div class="flex p-4 mb-4 text-xl text-green-800 border border-green-300 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400 dark:border-green-800"
                        role="alert">
                        <svg aria-hidden="true" class="flex-shrink-0 inline w-5 h-5 mr-3" fill="currentColor"
                            viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                                clip-rule="evenodd"></path>
                        </svg>
                        <span class="sr-only">Info</span>
                        <div>
                            <span class="font-medium">{{ session('message') }}</span>
                        </div>
                    </div>
                @endif
    
                <div class="flex p-4 mb-4 text-xl text-green-800 border border-green-300 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400 dark:border-green-800"
                    role="alert">
                    <svg aria-hidden="true" class="flex-shrink-0 inline w-5 h-5 mr-3" fill="currentColor"
                        viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                            clip-rule="evenodd"></path>
                    </svg>
                    <span class="sr-only">Info</span>
                    <div>
                        <span class="font-medium">Silahkan cek inbox email untuk melakukan verifikasi!</span>
                    </div>
                </div>
    
                <div class="flex justify-center items-center gap-0.5 text-md dark:text-gray-50">
                    <p>Tidak dapat email?</p>
                    <form action={{ route('verification.send') }} method="POST">
                        @csrf
                        <button class="hover:underline" type="submit">
                            Kirim ulang!
                        </button>
                    </form>
                </div>
            </div>
    
            <p class="py-3 text-center dark:text-gray-50">
                &copy; {{ now()->year }} - {{ config('app.name') }}
            </p>
    </main>

    <!-- Optional JavaScript -->
    @vite('resources/js/app.js')
</body>

</html>
