<footer class="bg-pink-50 border-t mt-10">
    {{-- Container: smaller padding for a thinner, cleaner footer --}}
    <div class="max-w-7xl mx-auto px-4 py-6 text-center text-sm text-pink-700">

        {{-- Newsletter --}}
        <div class="mb-4">
            <p class="text-pink-700 font-medium">Subscribe for sweet updates 🍬</p>

            <form class="mt-2 flex justify-center items-center gap-3">
                <input type="email" placeholder="Your email"
                       class="px-3 py-1.5 border border-pink-300 rounded-lg focus:outline-none focus:ring focus:ring-pink-200 text-sm">
                <button type="submit"
                        class="px-4 py-1.5 bg-pink-500 text-white rounded-lg hover:bg-pink-600 transition text-sm">
                    Join
                </button>
            </form>
        </div>

        {{-- Core info --}}
        <p class="text-pink-700">&copy; {{ date('Y') }} SweetShop. Made with 💖 and sugar.</p>

        {{-- Legal links --}}
        <p class="mt-2 space-x-3">
            <a href="/privacy" class="hover:text-pink-500 transition">Privacy Policy</a>
            <span class="text-pink-400">•</span>
            <a href="/terms" class="hover:text-pink-500 transition">Terms of Service</a>
        </p>
        
        {{-- Navigation --}}
        <nav class="mt-3 space-x-3">
            <a href="{{ route('home') }}" class="hover:text-pink-500 transition">Home</a>
            <span class="text-pink-400">•</span>
            <a href="{{ route('products.index') }}" class="hover:text-pink-500 transition">Products</a>
            <span class="text-pink-400">•</span>
            <a href="{{ route('reviews.index') }}" class="hover:text-pink-500 transition">Reviews</a>
            <span class="text-pink-400">•</span>
            <a href="{{ route('contact') }}" class="hover:text-pink-500 transition">Contact</a>
        </nav>
    </div>
</footer>
