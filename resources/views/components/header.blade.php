{{-- Promo bar: lightweight announcement strip above the header --}}
<div class="bg-yellow-100 text-yellow-800 text-center text-sm py-2">
    🎉 Free delivery on orders over £20 this week!
</div>

{{-- Header component: site-wide navigation and branding --}}
<header class="bg-pink-100 border-b shadow-sm">
    <div class="max-w-7xl mx-auto px-4 py-4 flex items-center justify-between">
        
        {{-- Logo / brand link: always visible, takes user back to homepage --}}
        <a href="{{ route('home') }}" class="text-2xl font-bold text-pink-600 tracking-wide">
            🍬 SweetShop
        </a>

        {{-- Navigation links: flex container with spacing and hover transitions --}}
        <nav class="flex gap-6 text-sm font-medium text-pink-700">
            
            {{-- Public links: always visible to guests and logged-in users --}}
            <a href="{{ route('products.index') }}" class="hover:text-pink-500 transition">Products</a>
            <a href="{{ route('reviews.index') }}" class="hover:text-pink-500 transition">Reviews</a>
            <a href="{{ route('contact') }}" class="hover:text-pink-500 transition">Contact</a>

            {{-- Guest-only link: shown when no user is logged in --}}
            @guest
                <a href="{{ route('login') }}" class="hover:text-pink-500 transition font-semibold">Login</a>
            @endguest

            {{-- Authenticated user links: shown when a user is logged in --}}
            @auth
                <a href="{{ route('account') }}" class="hover:text-pink-500 transition">Account</a>

                {{-- Checkout link with cart icon --}}
                <a href="{{ route('checkout') }}" class="hover:text-pink-500 transition flex items-center gap-1">
                    🛒 <span>Checkout</span>
                </a>

                {{-- Logout form --}}
                <form action="{{ route('logout') }}" method="POST" class="inline">
                    @csrf
                    <button type="submit" class="hover:text-pink-500 transition">Logout</button>
                </form>
            @endauth

            {{-- Admin-only links: shown if logged-in user has role "admin" --}}
            @if(Auth::check() && Auth::user()->role === 'admin')
                <a href="{{ route('admin.dashboard') }}" class="hover:text-pink-500 transition">Admin</a>
                <a href="{{ route('admin.products.index') }}" class="hover:text-pink-500 transition">Manage Products</a>
                <a href="{{ route('admin.users.index') }}" class="hover:text-pink-500 transition">Manage Users</a>
                <a href="{{ route('admin.reviews.index') }}" class="hover:text-pink-500 transition">Manage Reviews</a>
            @endif
        </nav>
    </div>
</header>

