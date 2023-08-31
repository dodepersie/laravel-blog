<!doctype html>
<html lang="{{ Carbon\Carbon::getLocale() }}">

<head>
    <meta charset="utf-8">
    @stack('meta')
    <meta name="robots" content="index,follow" inertia="robots">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">

    <!-- Dark / Light Mode -->
    <script type="text/javascript" src="{{ asset('assets/js/style.js') }}"></script>

    <!-- Vite Resource Import -->
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

    <!-- AOS (Animate On Scroll) Stylesheet and JavaScript -->
    <link rel="stylesheet" href="//unpkg.com/aos@2.3.1/dist/aos.css">
    <script src="//unpkg.com/aos@2.3.1/dist/aos.js"></script>

    <!-- jQuery JavaScript Library -->
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.js"
        integrity="sha512-8Z5++K1rB3U+USaLKG6oO8uWWBhdYsM3hmdirnOEWp8h2B1aOikj5zBzlXs8QOrvY9OxEnD2QDkbSKKpfqcIWw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <title>{{ ucfirst($title) ?? config('app.name') }} / Mahadi Saputra</title>
</head>

<body class="dark:bg-[#020817] selection:bg-blue-700 selection:text-gray-50">
    <main class="flex flex-col justify-center items-center min-h-screen">
        @yield('container')

        <div>
            <p class="text-gray-900 dark:text-gray-100">&copy {{ now()->year }} - {{ config('app.name') }}</p>
        </div>
    </main>

    <!-- Dark/Light Switch Mode -->
    <script type="text/javascript" src="{{ asset('assets/js/switch-mode.js') }}"></script>

    <!-- Additional Scripts -->
    <script type="text/javascript" src="{{ asset('assets/js/aos-init.js') }}"></script>
    <script src="{{ asset('assets/js/pwd-toggle.js') }}"></script>

</body>

</html>