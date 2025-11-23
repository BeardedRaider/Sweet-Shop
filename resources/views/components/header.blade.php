{{-- Promo bar: lightweight announcement strip above the header --}}
<div class="bg-yellow-100 text-yellow-800 text-center text-sm py-2">
    🎉 Free delivery on orders over £20 this week!
</div>

{{-- Header component: site-wide navigation and branding --}}
<header class="bg-pink-100 border-b shadow-sm">
    <div class="max-w-7xl mx-auto px-4 py-4 flex items-center justify-between">
        
        {{-- Logo / brand link: always visible, takes user back to homepage --}}
        <a href="{{ route('home') }}" 
           class="text-2xl font-bold text-pink-600 tracking-wide">
            🍬 SweetShop
        </a>

        {{-- Navigation links: flex container with spacing and hover transitions --}}
        <nav class="flex gap-6 text-sm font-medium text-pink-700">

            {{-- Always visible: Home link, highlights when on home route --}}
            <a href="{{ route('home') }}" 
               class="{{ request()->routeIs('home') ? 'text-pink-600 font-bold border-b-2 border-pink-600' : 'hover:text-pink-500 transition' }}">
               Home
            </a>

            {{-- Guest-only links (visible when no user is logged in) --}}
            @guest
                <a href="{{ route('products.index') }}" 
                   class="{{ request()->routeIs('products.index') ? 'text-pink-600 font-bold border-b-2 border-pink-600' : 'hover:text-pink-500 transition' }}">
                   Products
                </a>
                <a href="{{ route('reviews.index') }}" 
                   class="{{ request()->routeIs('reviews.index') ? 'text-pink-600 font-bold border-b-2 border-pink-600' : 'hover:text-pink-500 transition' }}">
                   Reviews
                </a>
                <a href="{{ route('contact') }}" 
                   class="{{ request()->routeIs('contact') ? 'text-pink-600 font-bold border-b-2 border-pink-600' : 'hover:text-pink-500 transition' }}">
                   Contact
                </a>
                <a href="{{ route('login') }}" 
                   class="{{ request()->routeIs('login') ? 'text-pink-600 font-bold border-b-2 border-pink-600' : 'hover:text-pink-500 transition font-semibold' }}">
                   Login
                </a>
            @endguest

            {{-- Authenticated users --}}
            @auth
                {{-- Admin-only links --}}
                @if(Auth::user()->hasRole('admin'))
                    <a href="{{ route('admin.dashboard') }}" 
                       class="{{ request()->routeIs('admin.dashboard') ? 'text-pink-600 font-bold border-b-2 border-pink-600' : 'hover:text-pink-500 transition' }}">
                       Admin Dashboard
                    </a>
                    <a href="{{ route('admin.products.index') }}" 
                       class="{{ request()->routeIs('admin.products.*') ? 'text-pink-600 font-bold border-b-2 border-pink-600' : 'hover:text-pink-500 transition' }}">
                       Manage Products
                    </a>
                    <a href="{{ route('admin.reviews.index') }}" 
                       class="{{ request()->routeIs('admin.reviews.*') ? 'text-pink-600 font-bold border-b-2 border-pink-600' : 'hover:text-pink-500 transition' }}">
                       Manage Reviews
                    </a>
                    <a href="{{ route('admin.users.index') }}" 
                       class="{{ request()->routeIs('admin.users.*') ? 'text-pink-600 font-bold border-b-2 border-pink-600' : 'hover:text-pink-500 transition' }}">
                       Manage Users
                    </a>
                    <a href="{{ route('account') }}" 
                       class="{{ request()->routeIs('account') ? 'text-pink-600 font-bold border-b-2 border-pink-600' : 'hover:text-pink-500 transition' }}">
                       Account
                    </a>
                    <form action="{{ route('logout') }}" method="POST" class="inline">
                        @csrf
                        <button type="submit" class="hover:text-pink-500 transition">Logout</button>
                    </form>
                @else
                    {{-- Regular user links --}}
                    <a href="{{ route('products.index') }}" 
                       class="{{ request()->routeIs('products.index') ? 'text-pink-600 font-bold border-b-2 border-pink-600' : 'hover:text-pink-500 transition' }}">
                       Products
                    </a>
                    <a href="{{ route('reviews.index') }}" 
                       class="{{ request()->routeIs('reviews.index') ? 'text-pink-600 font-bold border-b-2 border-pink-600' : 'hover:text-pink-500 transition' }}">
                       Reviews
                    </a>
                    <a href="{{ route('contact') }}" 
                       class="{{ request()->routeIs('contact') ? 'text-pink-600 font-bold border-b-2 border-pink-600' : 'hover:text-pink-500 transition' }}">
                       Contact
                    </a>
                    <a href="{{ route('account') }}" 
                       class="{{ request()->routeIs('account') ? 'text-pink-600 font-bold border-b-2 border-pink-600' : 'hover:text-pink-500 transition' }}">
                       Account
                    </a>
                    <a href="{{ route('checkout') }}" 
                       class="{{ request()->routeIs('checkout') ? 'text-pink-600 font-bold border-b-2 border-pink-600 flex items-center gap-1' : 'hover:text-pink-500 transition flex items-center gap-1' }}">
                       🛒 <span>Checkout</span>
                    </a>
                    <form action="{{ route('logout') }}" method="POST" class="inline">
                        @csrf
                        <button type="submit" class="hover:text-pink-500 transition">Logout</button>
                    </form>
                @endif
            @endauth
        </nav>
    </div>
</header>
