<footer class="bg-pink-50 border-t mt-10">
    <div class="max-w-7xl mx-auto px-4 py-8 text-center text-sm text-pink-700">

        {{-- Newsletter first --}}
        <div class="mb-6">
            <p class="text-pink-700 font-medium">Subscribe for sweet updates 🍬</p>
            <form class="mt-2 flex justify-center items-center gap-4">
                <input type="email" placeholder="Your email"
                       class="px-3 py-2 border border-pink-300 rounded-lg focus:outline-none focus:ring focus:ring-pink-200">
                <button type="submit"
                        class="px-4 py-2 bg-pink-500 text-white rounded-lg hover:bg-pink-600 transition">
                    Join
                </button>
            </form>
        </div>

        {{-- Divider for clarity, removed as i feel it cluters the footer --}}
        {{-- <hr class="border-pink-200 my-8"> --}}

        {{-- Core info --}}
        <p>&copy; {{ date('Y') }} SweetShop. Made with 💖 and sugar.</p>

        <p class="mt-2 space-x-2">
            <a href="/privacy" class="hover:text-pink-500 transition">Privacy Policy</a>
            <span>|</span>
            <a href="/terms" class="hover:text-pink-500 transition">Terms of Service</a>
        </p>

        {{-- Navigation links --}}
        <nav class="mt-4 space-x-4">
            <a href="{{ route('home') }}" class="hover:text-pink-500 transition">Home</a>
            <span>|</span>
            <a href="{{ route('products.index') }}" class="hover:text-pink-500 transition">Products</a>
            <span>|</span>
            <a href="{{ route('reviews.index') }}" class="hover:text-pink-500 transition">Reviews</a>
            <span>|</span>
            <a href="{{ route('contact') }}" class="hover:text-pink-500 transition">Contact</a>
        </nav>

        {{-- Decorative emojis --}}
        <div class="mt-6 flex justify-center gap-4 text-xl">
            <span>🐱</span>
            <span>🍩</span>
            <span>🍓</span>
            <span>🧁</span>
        </div>
    </div>
</footer>
