<x-layout>
    <h1 class="text-2xl font-bold mb-6 text-pink-700">Edit Product</h1>

    <div class="max-w-2xl mx-auto bg-white p-6 rounded shadow space-y-6">
        <form action="{{ route('admin.products.update', $product) }}" method="POST" enctype="multipart/form-data">
            @csrf
@if ($errors->any())
    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4">
        <strong class="font-bold">There were some problems with your input:</strong>
        <ul class="mt-2 list-disc list-inside">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
            @method('PUT')

            {{-- Product Fields --}}
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label for="name" class="block font-semibold text-gray-700">Name</label>
                    <input type="text" id="name" name="name" 
                           value="{{ old('name', $product->name) }}"
                           class="w-full border rounded px-3 py-2 focus:ring-pink-500 focus:border-pink-500" required>
                    @error('name') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label for="price" class="block font-semibold text-gray-700">Price (£)</label>
                    <input type="number" step="0.01" id="price" name="price" 
                           value="{{ old('price', $product->price) }}"
                           class="w-full border rounded px-3 py-2 focus:ring-pink-500 focus:border-pink-500" required>
                    @error('price') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label for="stock" class="block font-semibold text-gray-700">Stock</label>
                    <input type="number" id="stock" name="stock" 
                           value="{{ old('stock', $product->stock) }}"
                           class="w-full border rounded px-3 py-2 focus:ring-pink-500 focus:border-pink-500" required>
                    @error('stock') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
                </div>

                <div class="col-span-2">
                    <label for="description" class="block font-semibold text-gray-700">Description</label>
                    <textarea id="description" name="description"
                              class="w-full border rounded px-3 py-2 focus:ring-pink-500 focus:border-pink-500">{{ old('description', $product->description) }}</textarea>
                    @error('description') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
                </div>
            </div>

            {{-- Upload New Image --}}
            <div class="pt-6">
                <label for="image" class="block font-semibold text-gray-700 mb-2">Upload New Image</label>
                <input type="file" id="image" name="image"
                       class="w-full border rounded px-3 py-2 focus:ring-pink-500 focus:border-pink-500">
                @error('image') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
            </div>

            {{-- Action buttons --}}
            <div class="flex justify-between pt-6 border-t mt-6">
                <a href="{{ route('admin.products.index') }}" 
                   class="px-4 py-2 bg-gray-200 rounded hover:bg-gray-300">Cancel</a>
                <button type="submit" 
                        class="px-4 py-2 bg-pink-500 text-white rounded hover:bg-pink-600">
                    Update Product
                </button>
            </div>
        </form>

        {{-- Existing Images Grid --}}
        @if($product->images->isNotEmpty())
            <div class="pt-6 border-t">
                <p class="font-semibold text-gray-700 mb-4">Current Images</p>
                <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
                    @foreach($product->images as $image)
                        <div class="bg-gray-50 rounded p-2 shadow-sm flex flex-col items-center">
                            <img src="{{ asset('storage/' . $image->path) }}" 
                                alt="{{ $image->alt_text ?? $product->name }}"
                                class="w-24 h-24 object-cover rounded mb-2">
                            <form action="{{ route('admin.products.images.destroy', $image) }}" method="POST" onsubmit="return confirm('Delete this image?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" 
                                        class="px-3 py-1 bg-red-500 text-black rounded hover:bg-red-600 text-xs">
                                    Delete Image
                                </button>
                            </form>
                        </div>
                    @endforeach
                </div>
            </div>
        @else
            <p class="text-sm text-gray-500 pt-6 border-t">No images uploaded yet.</p>
        @endif

    </div>
</x-layout>
