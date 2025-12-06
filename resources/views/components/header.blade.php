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

            {{-- Home link: show for guests and non-admin users only --}}
            @guest
                <a href="{{ route('home') }}" 
                   class="{{ request()->routeIs('home') 
                       ? 'text-pink-600 font-bold border-b-2 border-pink-600 transition-all duration-300' 
                       : 'hover:text-pink-500 hover:border-b-2 hover:border-pink-500 transition-all duration-300' }}">
                   Home
                </a>
            @endguest

            @auth
                @unless(Auth::user()->hasRole('admin'))
                    <a href="{{ route('home') }}" 
                       class="{{ request()->routeIs('home') 
                           ? 'text-pink-600 font-bold border-b-2 border-pink-600 transition-all duration-300' 
                           : 'hover:text-pink-500 hover:border-b-2 hover:border-pink-500 transition-all duration-300' }}">
                       Home
                    </a>
                @endunless
            @endauth

            {{-- Guest-only links (visible when no user is logged in) --}}
            @guest
                <a href="{{ route('products.index') }}" 
                   class="{{ request()->routeIs('products.index') 
                       ? 'text-pink-600 font-bold border-b-2 border-pink-600 transition-all duration-300' 
                       : 'hover:text-pink-500 hover:border-b-2 hover:border-pink-500 transition-all duration-300' }}">
                   Products
                </a>
                <a href="{{ route('reviews.index') }}" 
                   class="{{ request()->routeIs('reviews.index') 
                       ? 'text-pink-600 font-bold border-b-2 border-pink-600 transition-all duration-300' 
                       : 'hover:text-pink-500 hover:border-b-2 hover:border-pink-500 transition-all duration-300' }}">
                   Reviews
                </a>
                <a href="{{ route('contact') }}" 
                   class="{{ request()->routeIs('contact') 
                       ? 'text-pink-600 font-bold border-b-2 border-pink-600 transition-all duration-300' 
                       : 'hover:text-pink-500 hover:border-b-2 hover:border-pink-500 transition-all duration-300' }}">
                   Contact
                </a>
                <a href="{{ route('login') }}" 
                   class="{{ request()->routeIs('login') 
                       ? 'text-pink-600 font-bold border-b-2 border-pink-600 transition-all duration-300 font-semibold' 
                       : 'hover:text-pink-500 hover:border-b-2 hover:border-pink-500 transition-all duration-300 font-semibold' }}">
                   Login
                </a>
            @endguest

            {{-- Authenticated users --}}
            @auth
                {{-- Admin-only links --}}
                @if(Auth::user()->hasRole('admin'))
                    <a href="{{ route('admin.dashboard') }}" 
                       class="{{ request()->routeIs('admin.dashboard') 
                           ? 'text-pink-600 font-bold border-b-2 border-pink-600 transition-all duration-300' 
                           : 'hover:text-pink-500 hover:border-b-2 hover:border-pink-500 transition-all duration-300' }}">
                       Admin Dashboard
                    </a>
                    <a href="{{ route('admin.products.index') }}" 
                       class="{{ request()->routeIs('admin.products.*') 
                           ? 'text-pink-600 font-bold border-b-2 border-pink-600 transition-all duration-300' 
                           : 'hover:text-pink-500 hover:border-b-2 hover:border-pink-500 transition-all duration-300' }}">
                       Manage Products
                    </a>
                    <a href="{{ route('admin.reviews.index') }}" 
                       class="{{ request()->routeIs('admin.reviews.*') 
                           ? 'text-pink-600 font-bold border-b-2 border-pink-600 transition-all duration-300' 
                           : 'hover:text-pink-500 hover:border-b-2 hover:border-pink-500 transition-all duration-300' }}">
                       Manage Reviews
                    </a>
                    <a href="{{ route('admin.users.index') }}" 
                       class="{{ request()->routeIs('admin.users.*') 
                           ? 'text-pink-600 font-bold border-b-2 border-pink-600 transition-all duration-300' 
                           : 'hover:text-pink-500 hover:border-b-2 hover:border-pink-500 transition-all duration-300' }}">
                       Manage Users
                    </a>
                    <a href="{{ route('admin.orders.index') }}" 
                       class="{{ request()->routeIs('admin.orders.*') 
                           ? 'text-pink-600 font-bold border-b-2 border-pink-600 transition-all duration-300' 
                           : 'hover:text-pink-500 hover:border-b-2 hover:border-pink-500 transition-all duration-300' }}">
                       Manage Orders
                    </a>
                @else
                    {{-- Regular user links --}}
                    <a href="{{ route('products.index') }}" 
                       class="{{ request()->routeIs('products.index') 
                           ? 'text-pink-600 font-bold border-b-2 border-pink-600 transition-all duration-300' 
                           : 'hover:text-pink-500 hover:border-b-2 hover:border-pink-500 transition-all duration-300' }}">
                       Products
                    </a>
                    <a href="{{ route('reviews.index') }}" 
                       class="{{ request()->routeIs('reviews.index') 
                           ? 'text-pink-600 font-bold border-b-2 border-pink-600 transition-all duration-300' 
                           : 'hover:text-pink-500 hover:border-b-2 hover:border-pink-500 transition-all duration-300' }}">
                       Reviews
                    </a>
                    <a href="{{ route('contact') }}" 
                       class="{{ request()->routeIs('contact') 
                           ? 'text-pink-600 font-bold border-b-2 border-pink-600 transition-all duration-300' 
                           : 'hover:text-pink-500 hover:border-b-2 hover:border-pink-500 transition-all duration-300' }}">
                       Contact
                    </a>
                    <a href="{{ route('checkout') }}" 
                       class="{{ request()->routeIs('checkout') 
                           ? 'text-pink-600 font-bold border-b-2 border-pink-600 transition-all duration-300 flex items-center gap-1' 
                           : 'hover:text-pink-500 hover:border-b-2 hover:border-pink-500 transition-all duration-300 flex items-center gap-1' }}">
                       🛒 <span>Checkout</span>
                    </a>
                @endif

                {{-- Account link with role badge --}}
                <span class="flex items-center gap-2">
                    <a href="{{ route('account') }}" 
                       class="{{ request()->routeIs('account') 
                           ? 'text-pink-600 font-bold border-b-2 border-pink-600 transition-all duration-300' 
                           : 'hover:text-pink-500 hover:border-b-2 hover:border-pink-500 transition-all duration-300' }}">
                       {{ Auth::user()->name }}
                    </a>

                    {{-- Role badge --}}
                    @if(Auth::user()->hasRole('admin'))
                        <span class="px-2 py-0.5 text-xs font-bold rounded bg-red-100 text-red-700 border border-red-300">
                            Admin
                        </span>
                    @elseif(Auth::user()->hasRole('customer'))
                        <span class="px-2 py-0.5 text-xs font-bold rounded bg-blue-100 text-blue-700 border border-blue-300">
                            Customer
                        </span>
                    @endif
                </span>

                {{-- Logout button --}}
                <form action="{{ route('logout') }}" method="POST" class="inline">
                    @csrf
                    <button type="submit" class="hover:text-pink-500 transition">Logout</button>
                </form>
            @endauth
        </nav>
    </div>
    {{-- <script src="//unpkg.com/alpinejs" defer></script> --}}
</header>
