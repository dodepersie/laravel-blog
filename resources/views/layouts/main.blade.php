<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Required meta tags -->
    <meta charset="utf-8">
    @stack('meta')
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">

    <!-- Tailwind Property -->
    @vite('resources/css/app.css')
    
    <!-- Google Font-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&display=swap" rel="stylesheet">

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>

    <!-- Style -->
    <script type="text/javascript" src="{{ asset('/js/style.js') }}"></script>

    <title>Mahadi Saputra's Blog | {{ $title }}</title>
  </head>
  <body class="dark:bg-gray-900 selection:bg-blue-700 selection:text-gray-50">

    <div class="container mx-auto">
      @include('partials.navbar')
      @yield('container')
      @include('partials.footer')
    </div>

    <!-- Optional JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.js"></script>
    @vite('resources/js/app.js')
    

    <!-- Dark/Light Mode -->
    <script type="text/javascript" src="{{ asset('/js/switchMode.js') }}"></script>

    @stack('script')
  </body>
</html>