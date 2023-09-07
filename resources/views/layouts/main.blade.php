<!doctype html>
<html lang="{{ Carbon\Carbon::getLocale() }}">

<head>
    <meta charset="utf-8">
    @stack('meta')
    <meta name="robots" content="index,follow" inertia="robots">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">

    <!-- jQuery JavaScript Library -->
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.js"
        integrity="sha512-8Z5++K1rB3U+USaLKG6oO8uWWBhdYsM3hmdirnOEWp8h2B1aOikj5zBzlXs8QOrvY9OxEnD2QDkbSKKpfqcIWw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- Dark / Light Mode -->
    <script type="text/javascript" src="{{ asset('assets/js/style.js') }}"></script>

    <!-- Vite Resource Import -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- AOS (Animate On Scroll) Stylesheet and JavaScript -->
    <link rel="stylesheet" href="//unpkg.com/aos@2.3.1/dist/aos.css" />
    <script type="text/javascript" src="//unpkg.com/aos@2.3.1/dist/aos.js"></script>

    <!-- Animate.css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

    <!-- Highlight.js JavaScript and Styles -->
    <link rel="stylesheet"
        href="//cdn.jsdelivr.net/gh/highlightjs/cdn-release@11.8.0/build/styles/github-dark.min.css" />
    <script type="text/javascript" src="//cdn.jsdelivr.net/gh/highlightjs/cdn-release@11.8.0/build/highlight.min.js"></script>
    <script type="text/javascript" src="//unpkg.com/highlightjs-copy/dist/highlightjs-copy.min.js"></script>
    <link rel="stylesheet" href="//unpkg.com/highlightjs-copy/dist/highlightjs-copy.min.css" />

    <!-- SweetAlert 2 JavaScript Library -->
    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @stack('swal_delete')

    <title>{{ ucfirst($title) ?? config('app.name') }} / Mahadi Saputra</title>
</head>

<body class="dark:bg-[#020817] selection:bg-blue-700 selection:text-gray-50">
    @include('partials.navbar')
    @yield('container')
    @include('partials.footer')

    <!-- Additional Scripts -->
    <script type="text/javascript" src="{{ asset('assets/js/switch-mode.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/aos-init.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/mega-menu.js') }}"></script>
    @stack('script')
</body>

</html>
