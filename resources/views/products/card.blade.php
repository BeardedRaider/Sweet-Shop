<div class="bg-white rounded-lg shadow hover:shadow-md transition p-4 text-center">
    <img src="{{ $product->image_url }}" alt="{{ $product->name }}" class="w-full h-40 object-cover rounded">
    <h3 class="mt-3 text-lg font-semibold text-pink-700">{{ $product->name }}</h3>
    <p class="text-sm text-pink-900 mt-1">{{ Str::limit($product->description, 60) }}</p>
    <p class="mt-2 font-bold text-pink-600">£{{ number_format($product->price, 2) }}</p>
</div>
