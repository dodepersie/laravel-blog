<!doctype html>
<html lang="{{ Carbon\Carbon::getLocale() }}">

<head>
    <meta charset="utf-8">
    @stack('meta')
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">

    <!-- Dark / Light Mode -->
    <script type="text/javascript" src="{{ asset('assets/js/style.js') }}"></script>

    <!-- Vite Resource Import -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Google Fonts Stylesheet -->
    <link rel="stylesheet"
        href="//fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />

    <!-- Custom Font Style -->
    <style>
        @font-face {
            font-family: "GT Walsheim Pro";
            src: url('/assets/font/GTWalsheimPro-Regular.ttf');
        }
    </style>

    <!-- AOS (Animate On Scroll) Stylesheet and JavaScript -->
    <link rel="stylesheet" href="//unpkg.com/aos@2.3.1/dist/aos.css">
    <script src="//unpkg.com/aos@2.3.1/dist/aos.js"></script>

    <!-- Highlight.js JavaScript and Styles -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/gh/highlightjs/cdn-release@11.8.0/build/styles/github-dark.min.css">
    <script src="//cdn.jsdelivr.net/gh/highlightjs/cdn-release@11.8.0/build/highlight.min.js"></script>
    <script src="//unpkg.com/highlightjs-copy/dist/highlightjs-copy.min.js"></script>
    <link rel="stylesheet" href="//unpkg.com/highlightjs-copy/dist/highlightjs-copy.min.css" />

    <!-- jQuery JavaScript Library -->
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.js"
        integrity="sha512-8Z5++K1rB3U+USaLKG6oO8uWWBhdYsM3hmdirnOEWp8h2B1aOikj5zBzlXs8QOrvY9OxEnD2QDkbSKKpfqcIWw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- SweetAlert 2 JavaScript Library -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @stack('swal_delete')

    <title>{{ ucfirst($title) }} - Mahadi Saputra's Blog</title>
</head>

<body class="dark:bg-[#020817] selection:bg-blue-700 selection:text-gray-50 tracking-tighter">
    @include('partials.navbar')
    @yield('container')
    @include('partials.footer')

    <!-- Dark/Light Switch Mode -->
    <script type="text/javascript" src="{{ asset('assets/js/switch-mode.js') }}"></script>

    <!-- Additional Scripts -->
    <script type="text/javascript" src="{{ asset('assets/js/aos-init.js') }}"></script>
    @stack('script')
</body>

</html>
