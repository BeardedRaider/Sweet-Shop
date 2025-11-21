{{-- Products index view
     - Uniform image area with fixed height and object-cover
     - Equal-height cards using flex column and mt-auto on price --}}
<x-layout :title="'Browse Our Sweets'">
    <section class="mt-10 px-4">
        <h1 class="text-3xl font-bold text-center text-pink-700 mb-6">All Our Sweets</h1>

        @if ($products->count())
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
                @foreach ($products as $product)
                    @include('products.card', ['product' => $product])
                @endforeach
            </div>
        @else
            <p class="text-center text-pink-900">No products available at the moment.</p>
        @endif
    </section>
</x-layout>
