<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{ $title ?? 'SweetShop' }}</title>

        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <noscript><link rel="stylesheet" href="/app.css"></noscript>
    </head>
    {{-- possible bg color options 
    Artisan-#FFF8F2 
    Pale sherbet-#FFFBEA 
    Bisque-#FFE5B4 
    Bisque2-#FFE4C4--}}
    <body class="text-slate-900 bg-[#FFE4C4] ">
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
