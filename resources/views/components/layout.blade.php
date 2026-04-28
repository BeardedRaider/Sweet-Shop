<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ?? 'SweetShop' }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <noscript>
        <link rel="stylesheet" href="/app.css">
    </noscript>
</head>

{{-- possible bg color options 
    Artisan-#FFF8F2 
    Pale sherbet-#FFFBEA 
    Bisque-#FFE5B4 
    Bisque2-#FFE4C4 --}}

<body x-data="{ open: false, content: '' }" class="text-slate-900 bg-[#FFE4C4]">

    {{-- Global modal for product & review quick-view --}}
    <div 
        x-show="open" 
        x-transition.opacity 
        @click.self="open = false"
        @keydown.escape.window="open = false"
        class="fixed inset-0 bg-black/50 backdrop-blur-sm flex items-center justify-center z-50"
    >
        <div 
            class="bg-white rounded-lg shadow-lg max-w-xl w-full p-6 relative" 
            @click.stop
        >
            {{-- Close button --}}
        <button 
            @click="open = false" class="absolute top-3 right-3 text-pink-600 text-xl font-bold"
        >
            ×
        </button>

            {{-- AJAX-loaded content --}}
            <div x-html="content"></div>
        </div>
    </div>


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
