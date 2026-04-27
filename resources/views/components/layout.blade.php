<!DOCTYPE html>
<html lang="en">
    <head>
        {{-- Meta tags --}}
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        {{-- Page title --}}
        <title>{{ $title ?? 'SweetShop' }}</title>

        {{-- Stylesheet --}}
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <noscript><link rel="stylesheet" href="/app.css"></noscript>
    </head>
    <body class="bg-slate-50 text-slate-900">

        {{-- FULL-PAGE FLEX WRAPPER --}}
        <div class="min-h-screen flex flex-col">

            <x-header />
            <x-flash />

            <main class="flex-1 px-4 py-6">
                <div class="w-full max-w-6xl mx-auto">
                    {{ $slot }}
                </div>
            </main>

            <x-footer />

        </div>
    </body>
</html>
