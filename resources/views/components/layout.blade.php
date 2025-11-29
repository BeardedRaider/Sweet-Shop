
{{-- Layout component: base HTML scaffold for all pages.
     - Provides the document <head> with meta tags, title, and stylesheet links.
     - Loads critical inline styles immediately to avoid a flash of unstyled content (FOUC).
     - Wraps the visible UI with a site-wide header and footer components.
     - Exposes a $slot where page-specific content is injected by child views. --}}
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

    {{-- Main content container: centers content and applies consistent padding.
         $slot is where child views render their page-specific markup. --}}
    <main class="mx-auto px-4 py-6 max-w-none">
        {{ $slot }}
    </main>

        {{-- This was used to test Tailwind CSS integration and if it was working --}}
        {{-- <div class="bg-pink-100 text-center py-4">
            Tailwind is working!
        </div> --}}

    {{-- Footer component: site-wide footer and legal links --}}
    <x-footer />

</body>
</html>