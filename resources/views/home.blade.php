<x-layout :title="'Welcome to SweetShop'">

    {{-- Hero / Intro section --}}
    <section class="text-center mt-10 bg-pink-100 rounded-lg py-10 px-4 shadow-sm">
        <h1 class="text-4xl font-bold text-pink-700">Welcome to SweetShop</h1>
        <p class="mt-4 text-lg text-pink-900">
            Scotland’s first Artisan sweet shop — discover our delicious sweets, browse reviews, and manage your orders.
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

    {{-- Our Story --}}
    <section class="mt-12 mb-10 bg-gradient-to-r from-pink-50 via-pink-100 to-pink-50 rounded-lg shadow-lg">
        <div class="p-8 max-w-6xl mx-auto flex flex-col sm:flex-row items-center gap-8">

            {{-- Left: text --}}
            <div class="flex-1 text-left">
            <h2 class="text-3xl font-extrabold text-pink-700 mb-4 tracking-wide">
                🍬 Our Story
            </h2>
            <p class="text-pink-900 text-base leading-relaxed mb-4">
                Born in <span class="font-semibold text-pink-600">Paisley</span>, SweetShop brings authentic
                <span class="underline decoration-pink-400">Artisan sweets</span> to Scotland.
                We blend tradition with creativity to make every bite unforgettable.
            </p>
            <p class="text-pink-900 text-base leading-relaxed">
                Today, SweetShop is proud to serve customers across Renfrewshire and beyond —
                <span class="italic text-pink-700">sharing joy, colour, and flavour</span> in every creation.
            </p>
            <div class="mt-6">
                <a href="{{ route('products.index') }}"
                class="px-6 py-3 bg-pink-500 text-white rounded-full shadow hover:bg-pink-600 transition">
                Taste the Tradition
                </a>
            </div>
            </div>

            {{-- Right: decorative accent (optional image or icon) --}}
            <div class="flex-none hidden sm:block">
            <div class="w-40 h-40 bg-pink-200 rounded-full flex items-center justify-center shadow-md animate-bounce">
                <span class="text-5xl">🍭</span>
            </div>
            </div>

        </div>
    </section>

    {{-- Fun Facts --}}
    <section class="mt-6 bg-pink-100 rounded-lg shadow-inner border-t-4 border-pink-300">
        <div class="max-w-6xl mx-auto px-6 py-6 grid grid-cols-1 sm:grid-cols-3 gap-6 text-center">

            <div class="flex flex-col items-center">
            <span class="text-3xl transition-transform duration-200 hover:scale-125">🎉</span>
            <p class="mt-2 text-pink-900 font-semibold">Founded in Paisley</p>
            <p class="text-sm text-pink-700">Scotland’s first artisan sweet shop</p>
            </div>

            <div class="flex flex-col items-center">
            <span class="text-3xl transition-transform duration-200 hover:scale-125">🍭</span>
            <p class="mt-2 text-pink-900 font-semibold">100+ Sweet Varieties</p>
            <p class="text-sm text-pink-700">From fudge to gummies, all handmade</p>
            </div>

            <div class="flex flex-col items-center">
            <span class="text-3xl transition-transform duration-200 hover:scale-125">🚚</span>
            <p class="mt-2 text-pink-900 font-semibold">Free Delivery</p>
            <p class="text-sm text-pink-700">On orders over £20 this week</p>
            </div>

        </div>
    </section>

    {{-- Featured Sweets --}}
     @if (!empty($products ?? []))
        <section class="mt-12">
            <h2 class="text-2xl font-bold text-center text-pink-700 mb-6">Featured sweets of the week</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 cols-4-1080 gap-6 justify-items-center">
                @foreach ($products as $product)
                    @include('products.card', ['product' => $product])
                @endforeach
            </div>

            <div class="text-center mt-6">
                <a href="{{ route('products.index') }}"
                class="px-6 py-3 bg-pink-500 text-white rounded-full shadow hover:bg-pink-600 transition">
                View all
                </a>
            </div>
        </section>
    @endif

    {{-- Reviews Teaser --}}
    @if (!empty($reviews ?? []))
        <section class="mt-12 bg-pink-50 py-8 px-4 rounded-lg shadow-sm">
            <h2 class="text-xl font-semibold text-center text-pink-700 mb-6">What our customers say</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 cols-4-1080 gap-6 justify-items-center">
                @foreach ($reviews as $review)
                    @include('reviews.item', ['review' => $review])
                @endforeach
            </div>
        </section>
    @endif

</x-layout>
