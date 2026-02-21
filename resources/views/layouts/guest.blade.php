<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Scholaria') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=josefin-sans:300,400,500,600,700&display=swap" rel="stylesheet" />

    <!-- Vite -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased">
    <!-- FULL BACKGROUND -->
    <div
        class="min-h-screen w-full flex items-center justify-center
               bg-gradient-to-br from-[#D9ECE2] via-[#D6D7EB] to-[#F9E1ED]">

        <!-- PAGE CONTENT -->
        <div class="w-full max-w-6xl px-6">
            {{ $slot }}
        </div>

    </div>
</body>
</html>
