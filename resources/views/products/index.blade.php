<x-layout :title="'Browse Our Sweets'">

    {{-- Hero / Intro section --}}
    <section class="text-center mt-10 bg-pink-100 rounded-lg py-10 px-4 shadow-sm">
        <h1 class="text-4xl font-bold text-pink-700">Step Into the Sweet Aisle</h1>

        <p class="mt-4 text-lg text-pink-900">
            Bright colours, bold flavours, and dangerously snackable treats — explore at your own risk.
        </p>
    </section>




    {{-- PRODUCT GRID --}}
    <section class="mt-10 px-4">
        <div class="max-w-6xl mx-auto bg-white/70 backdrop-blur-sm rounded-lg shadow-sm border border-pink-200 p-6">

            <h1 class="text-3xl font-bold text-center text-pink-700 mb-8">
                All Our Sweets
            </h1>

            @if ($products->count())
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 cols-4-1080 gap-8 justify-items-center">
                    @foreach ($products as $product)
                        @include('products.card', ['product' => $product])
                    @endforeach
                </div>
            @else
                <p class="text-center text-pink-900">No products available at the moment.</p>
            @endif

        </div>
    </section>

</x-layout>
