{{-- Promo bar: lightweight announcement strip above the header --}}
<div class="bg-yellow-100 text-yellow-800 text-center text-sm py-2">
    🎉 Free delivery on orders over £20 this week!
</div>

{{-- Header: simplified, modern Tailwind styling --}}
<header class="bg-pink-100 border-b shadow-sm">
    <div class="max-w-7xl mx-auto px-4 py-4 flex items-center justify-between">

        {{-- Logo --}}
        <a href="{{ route('home') }}" 
           class="text-2xl font-bold text-pink-600 tracking-wide">
            🍬 SweetShop
        </a>

        {{-- Navigation --}}
        <nav class="flex gap-6 text-sm font-medium text-pink-700">

            {{-- Helper: clean active/inactive classes --}}
            @php
                $active = 'text-pink-600 font-semibold';
                $inactive = 'text-pink-700 hover:text-pink-500 transition';
            @endphp

            {{-- Home (guest + non-admin users) --}}
            @guest
                <a href="{{ route('home') }}" 
                   class="{{ request()->routeIs('home') ? $active : $inactive }}">
                    Home
                </a>
            @endguest

            @auth
                @unless(Auth::user()->hasRole('admin'))
                    <a href="{{ route('home') }}" 
                       class="{{ request()->routeIs('home') ? $active : $inactive }}">
                        Home
                    </a>
                @endunless
            @endauth

            {{-- Guest-only links --}}
            @guest
                <a href="{{ route('products.index') }}" 
                   class="{{ request()->routeIs('products.index') ? $active : $inactive }}">
                    Products
                </a>

                <a href="{{ route('reviews.index') }}" 
                   class="{{ request()->routeIs('reviews.index') ? $active : $inactive }}">
                    Reviews
                </a>

                <a href="{{ route('contact') }}" 
                   class="{{ request()->routeIs('contact') ? $active : $inactive }}">
                    Contact
                </a>

                <a href="{{ route('login') }}" 
                   class="{{ request()->routeIs('login') ? $active : $inactive }}">
                    Login
                </a>
            @endguest

            {{-- Authenticated users --}}
            @auth

                {{-- Admin-only links --}}
                @if(Auth::user()->hasRole('admin'))
                    <a href="{{ route('admin.dashboard') }}" 
                       class="{{ request()->routeIs('admin.dashboard') ? $active : $inactive }}">
                        Admin Dashboard
                    </a>

                    <a href="{{ route('admin.products.index') }}" 
                       class="{{ request()->routeIs('admin.products.*') ? $active : $inactive }}">
                        Manage Products
                    </a>

                    <a href="{{ route('admin.reviews.index') }}" 
                       class="{{ request()->routeIs('admin.reviews.*') ? $active : $inactive }}">
                        Manage Reviews
                    </a>

                    <a href="{{ route('admin.users.index') }}" 
                       class="{{ request()->routeIs('admin.users.*') ? $active : $inactive }}">
                        Manage Users
                    </a>

                    <a href="{{ route('admin.orders.index') }}" 
                       class="{{ request()->routeIs('admin.orders.*') ? $active : $inactive }}">
                        Manage Orders
                    </a>

                @else
                    {{-- Regular user links --}}
                    <a href="{{ route('products.index') }}" 
                       class="{{ request()->routeIs('products.index') ? $active : $inactive }}">
                        Products
                    </a>

                    <a href="{{ route('reviews.index') }}" 
                       class="{{ request()->routeIs('reviews.index') ? $active : $inactive }}">
                        Reviews
                    </a>

                    <a href="{{ route('contact') }}" 
                       class="{{ request()->routeIs('contact') ? $active : $inactive }}">
                        Contact
                    </a>

                    <a href="{{ route('checkout') }}" 
                       class="flex items-center gap-1 {{ request()->routeIs('checkout') ? $active : $inactive }}">
                        🛒 <span>Checkout</span>
                    </a>
                @endif

                {{-- Account + role badge --}}
                <span class="flex items-center gap-2">
                    <a href="{{ route('account') }}" 
                       class="{{ request()->routeIs('account') ? $active : $inactive }}">
                        {{ Auth::user()->name }}
                    </a>

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

                {{-- Logout --}}
                <form action="{{ route('logout') }}" method="POST" class="inline">
                    @csrf
                    <button type="submit" class="text-pink-700 hover:text-pink-500 transition">
                        Logout
                    </button>
                </form>

            @endauth
        </nav>
    </div>
</header>
