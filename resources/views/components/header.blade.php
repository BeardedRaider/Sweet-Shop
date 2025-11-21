{{-- Promo bar --}}
<div class="bg-yellow-100 text-yellow-800 text-center text-sm py-2">
    🎉 Free delivery on orders over £20 this week!
</div>




{{-- Header component: site-wide navigation and branding --}}
<header class="bg-pink-100 border-b shadow-sm">
    <div class="max-w-7xl mx-auto px-4 py-4 flex items-center justify-between">
        <a href="{{ route('home') }}" class="text-2xl font-bold text-pink-600 tracking-wide">
            🍬 SweetShop
        </a>

        <nav class="flex gap-6 text-sm font-medium text-pink-700">
            <a href="{{ route('products.index') }}" class="hover:text-pink-500 transition">Products</a>
            <a href="{{ route('reviews.index') }}" class="hover:text-pink-500 transition">Reviews</a>
            <a href="{{ route('contact') }}" class="hover:text-pink-500 transition">Contact</a>
            <a href="{{ route('admin.dashboard') }}" class="hover:text-pink-500 transition">Admin</a>
        </nav>
    </div>
</header>
