<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Laravel')</title>

    <!-- Tailwind CDN (quick fix) -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Compiled app CSS (if present) -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body class="antialiased bg-gray-100 min-h-screen">
    <div class="max-w-6xl mx-auto py-6 px-4">
        @yield('content')
    </div>
</body>
</html>

