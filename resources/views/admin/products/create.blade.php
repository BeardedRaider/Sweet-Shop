<x-layout>
    <h1 class="text-2xl font-bold mb-6 text-pink-700">Add New Product</h1>

    <form action="{{ route('admin.products.store') }}" method="POST" 
          enctype="multipart/form-data"
          class="space-y-4 max-w-lg mx-auto bg-white p-6 rounded shadow">
        @csrf

        {{-- Name --}}
        <div>
            <label for="name" class="block font-semibold text-gray-700">Name</label>
            <input type="text" id="name" name="name" 
                   value="{{ old('name') }}"
                   class="w-full border rounded px-3 py-2 focus:ring-pink-500 focus:border-pink-500" required>
            @error('name') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
        </div>

        {{-- Description --}}
        <div>
            <label for="description" class="block font-semibold text-gray-700">Description</label>
            <textarea id="description" name="description"
                      class="w-full border rounded px-3 py-2 focus:ring-pink-500 focus:border-pink-500">{{ old('description') }}</textarea>
            @error('description') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
        </div>

        {{-- Price --}}
        <div>
            <label for="price" class="block font-semibold text-gray-700">Price (£)</label>
            <input type="number" step="0.01" id="price" name="price" 
                   value="{{ old('price') }}"
                   class="w-full border rounded px-3 py-2 focus:ring-pink-500 focus:border-pink-500" required>
            @error('price') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
        </div>

        {{-- Stock --}}
        <div>
            <label for="stock" class="block font-semibold text-gray-700">Stock</label>
            <input type="number" id="stock" name="stock" 
                   value="{{ old('stock') }}"
                   class="w-full border rounded px-3 py-2 focus:ring-pink-500 focus:border-pink-500" required>
            @error('stock') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
        </div>

        {{-- Image Upload --}}
        <div>
            <label for="image" class="block font-semibold text-gray-700">Product Image</label>
            <input type="file" id="image" name="image"
                   class="w-full border rounded px-3 py-2 focus:ring-pink-500 focus:border-pink-500">
            @error('image') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
        </div>

        {{-- Action buttons --}}
        <div class="flex justify-between">
            <a href="{{ route('admin.products.index') }}" 
               class="px-4 py-2 bg-gray-200 rounded hover:bg-gray-300">Cancel</a>
            <button type="submit" 
                    class="px-4 py-2 bg-pink-500 text-white rounded hover:bg-pink-600">
                Create Product
            </button>
        </div>
    </form>
</x-layout>
