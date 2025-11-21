<x-layout>
    <h1 class="text-2xl font-bold mb-6 text-pink-700">Edit Product</h1>

    <form action="{{ route('admin.products.update', $product) }}" method="POST" class="space-y-4 max-w-lg mx-auto bg-white p-6 rounded shadow">
        @csrf
        @method('PUT')

        <div>
            <label for="name" class="block font-semibold text-gray-700">Name</label>
            <input type="text" id="name" name="name" value="{{ old('name', $product->name) }}"
                   class="w-full border rounded px-3 py-2 focus:ring-pink-500 focus:border-pink-500" required>
        </div>

        <div>
            <label for="description" class="block font-semibold text-gray-700">Description</label>
            <textarea id="description" name="description"
                      class="w-full border rounded px-3 py-2 focus:ring-pink-500 focus:border-pink-500">{{ old('description', $product->description) }}</textarea>
        </div>

        <div>
            <label for="price" class="block font-semibold text-gray-700">Price (£)</label>
            <input type="number" step="0.01" id="price" name="price" value="{{ old('price', $product->price) }}"
                   class="w-full border rounded px-3 py-2 focus:ring-pink-500 focus:border-pink-500" required>
        </div>

        <div>
            <label for="stock" class="block font-semibold text-gray-700">Stock</label>
            <input type="number" id="stock" name="stock" value="{{ old('stock', $product->stock) }}"
                   class="w-full border rounded px-3 py-2 focus:ring-pink-500 focus:border-pink-500" required>
        </div>

        <div class="flex justify-between">
            <a href="{{ route('admin.products.index') }}" class="px-4 py-2 bg-gray-200 rounded hover:bg-gray-300">Cancel</a>
            <button type="submit" class="px-4 py-2 bg-pink-500 text-white rounded hover:bg-pink-600">Update Product</button>
        </div>
    </form>
</x-layout>
