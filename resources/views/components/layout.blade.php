<!DOCTYPE html>
<html lang="en">
<head>
    {{-- Meta tags: charset and responsive viewport for mobile devices --}}
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- Page title: can be made dynamic if needed --}}
    <title>{{ $title ?? 'SweetShop' }}</title>

    {{-- Inline critical styles: ensures background and font load instantly --}}
    <style>
        body { background: bisque; font-family: Arial, sans-serif; }
    </style>

    {{-- Stylesheet link: preload full CSS for faster rendering --}}
    <link rel="preload" href="/app.css" as="style" onload="this.onload=null;this.rel='stylesheet'">
    <noscript><link rel="stylesheet" href="/app.css"></noscript>
</head>
<body class="bg-slate-50 text-slate-900">

    {{-- Header component: contains navigation and branding --}}
    <x-header />
    {{-- Flash message component: displays session-based notifications --}}
    <x-flash />

    <main class="px-4 py-6 flex justify-center">
        <div class="w-full max-w-6xl mx-auto">
            {{ $slot }}
        </div>
    </main>

    {{-- Footer component: site-wide footer and legal links --}}
    <x-footer />

</body>
</html>
