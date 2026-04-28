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
    x-trap="open"
    x-init="
        $watch('open', value => {
            document.body.style.overflow = value ? 'hidden' : 'auto';
        })
    "
    class="fixed inset-0 bg-black/50 backdrop-blur-sm flex items-center justify-center z-50"
>
    <div 
        @click.stop
        class="bg-white rounded-xl shadow-xl max-w-xl w-full p-6 relative transform transition-all duration-300
               border-4 border-pink-200 shadow-pink-300"
        x-transition:enter="ease-out duration-300"
        x-transition:enter-start="opacity-0 scale-95"
        x-transition:enter-end="opacity-100 scale-100"
        x-transition:leave="ease-in duration-200"
        x-transition:leave-start="opacity-100 scale-100"
        x-transition:leave-end="opacity-0 scale-95"
    >
        {{-- Close button --}}
        <button 
            @click="open = false" 
            class="absolute top-3 right-3 text-pink-600 text-2xl font-bold hover:text-pink-800 transition"
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
