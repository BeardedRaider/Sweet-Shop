<div class="bg-white rounded-lg shadow hover:shadow-md transition p-4 text-center">
    {{-- Product image (first from images collection) --}}
    <div class="w-full h-48 overflow-hidden rounded">
        @if($product->images->isNotEmpty())
            <img src="{{ asset('storage/' . $product->images->first()->path) }}"
                 alt="{{ $product->images->first()->alt_text ?? $product->name }}"
                 class="w-full h-full object-cover transform hover:scale-105 transition duration-300 ease-in-out">
        @else
            <img src="{{ asset('images/default-product.jpg') }}"
                 alt="Default product image"
                 class="w-full h-full object-cover opacity-50">
        @endif
    </div>

    {{-- Product name --}}
    <h3 class="mt-3 text-lg font-semibold text-pink-700">{{ $product->name }}</h3>

    {{-- Product description (truncated) --}}
    <p class="text-sm text-pink-900 mt-1">{{ Str::limit($product->description, 60) }}</p>

    {{-- Product price --}}
    <p class="mt-2 font-bold text-pink-600">£{{ number_format($product->price, 2) }}</p>
</div>
