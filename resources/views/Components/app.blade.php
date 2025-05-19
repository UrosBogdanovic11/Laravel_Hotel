<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel</title>
    @vite('resources/css/app.css')
    <script src="https://unpkg.com/@heroicons/v2.0.18/24/outline/index.js"></script>
</head>
<body class="font-sans">
   @include('inc.navbar')
   
   @yield('content')
   @include('inc.footer')

   @stack('scripts')
</body>
</html>