{{-- Products index view
     - Uniform image area with fixed height and object-cover
     - Equal-height cards using flex column and mt-auto on price --}}
<x-layout>
    <section class="mt-8">
        <h2 class="text-2xl font-bold mb-6 text-center">Our Sweets</h2>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
            @forelse ($products as $product)
                <article class="bg-white shadow rounded-lg overflow-hidden p-4">
                    <h3 class="text-lg font-semibold text-blue-600 mb-2">
                        <a href="{{ route('products.show', $product->id) }}">
                            {{ $product->name }}
                        </a>
                    </h3>
                    <p class="text-gray-700 mb-2">{{ $product->description }}</p>
                    <p class="text-pink-600 font-bold">£{{ number_format($product->price, 2) }}</p>
                </article>
            @empty
                <p class="text-center text-gray-600">No products available yet.</p>
            @endforelse
        </div>
    </section>
</x-layout>
