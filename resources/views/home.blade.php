<x-layout :title="'Welcome to SweetShop'">

    {{-- Hero / Intro section --}}
    <section class="text-center mt-10 bg-pink-100 rounded-lg py-10 px-4 shadow-sm">
        <h1 class="text-4xl font-bold text-pink-700">Welcome to SweetShop</h1>
        <p class="mt-4 text-lg text-pink-900">
            Scotland’s first Asian pastry shop — discover our delicious sweets, browse reviews, and manage your orders.
        </p>

        <div class="mt-6 flex flex-col sm:flex-row justify-center gap-4">
            <a href="{{ route('products.index') }}"
               class="px-6 py-3 bg-pink-500 text-white rounded-full shadow hover:bg-pink-600 transition">
               Browse Products
            </a>
            <a href="{{ route('reviews.index') }}"
               class="px-6 py-3 bg-white text-pink-700 border border-pink-300 rounded-full shadow hover:bg-pink-50 transition">
               Read Reviews
            </a>
        </div>
    </section>

    {{-- About Us --}}
    <section class="mt-12 bg-pink-50 py-8 px-6 rounded-lg shadow-sm text-center">
        <h2 class="text-2xl font-bold text-pink-700">Our Story</h2>
        <p class="mt-4 text-pink-900 max-w-xl mx-auto">
            Born in Paisley, SweetShop brings authentic Asian pastries to Scotland. 
            We blend tradition with creativity to make every bite memorable.
        </p>
    </section>

        {{-- Featured Sweets --}}
        @if (!empty($products ?? []))
            <section class="mt-12">
                <h2 class="text-xl font-semibold text-center text-pink-700 mb-6">Featured Sweets of the Week</h2>

                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
                    @foreach ($products as $product)
                        @include('products.card', ['product' => $product])
                    @endforeach
                </div>

                <div class="text-center mt-6">
                    <a href="{{ route('products.index') }}"
                    class="bg-pink-500 text-white px-6 py-2 rounded-full hover:bg-pink-600 transition">
                        View all
                    </a>
                </div>
            </section>
        @endif

        {{-- Reviews Teaser --}}
        @if (!empty($reviews ?? []))
            <section class="mt-12 bg-pink-50 py-8 px-4 rounded-lg shadow-sm">
                <h2 class="text-xl font-semibold text-center text-pink-700 mb-6">What our customers say</h2>
                <div class="space-y-4 max-w-2xl mx-auto">
                    @foreach ($reviews as $review)
                        @include('reviews.item', ['review' => $review])
                    @endforeach
                </div>
            </section>
        @endif

</x-layout>
