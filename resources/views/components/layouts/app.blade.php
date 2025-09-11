<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" href="{{ asset('img/logo.png') }}" type="image/x-icon">

        <title>{{ $title ?? 'My App' }}</title>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        @livewireStyles
    </head>
    <body>

        <main>
            {{ $slot }}
        </main>

        @livewireScripts
    </body>
</html>
