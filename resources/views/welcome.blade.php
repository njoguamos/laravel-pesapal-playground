<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel Pesapal Playground</title>

        @vite('resources/css/app.css')

        @livewireStyles
    </head>
    <body class="font-sans antialiased bg-base-200 flex flex-col space-y-6 py-8 min-h-dvh">

    <h1 class="text-center text-2xl md:text-3xl font-bold">
        <a
            href="https://github.com/njoguamos/laravel-pesapal"
            target="_blank"
        >
            Laravel Pesapal Package Playground
        </a>
    </h1>

    <livewire:pesapal-config />

    <livewire:pesapal-tokens />

    @livewireScripts
    </body>
</html>
