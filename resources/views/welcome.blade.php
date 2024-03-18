<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel Pesapal Playground</title>

        @vite('resources/css/app.css')

    </head>
    <body class="font-sans antialiased bg-base-200 flex flex-col space-y-6 pt-8 pb-24 min-h-dvh">

    <h1 class="text-center text-2xl md:text-3xl font-bold px-6">
        <a
            href="https://github.com/njoguamos/laravel-pesapal"
            target="_blank"
        >
            Laravel Pesapal Package Playground
        </a>
    </h1>

    @if (session('status'))
    <x-container>
        <div role="alert" class="alert alert-info bg-info/50">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="stroke-current shrink-0 w-6 h-6"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
            <span>{{ session('status') }}</span>
        </div>
    </x-container>
    @endif

    <livewire:pesapal-config />

    <livewire:pesapal-tokens />

    <livewire:pesapal-ipns />

    <livewire:pesapal-ipns-api />

    <livewire:create-pesapal-ipn />

    </body>
</html>
