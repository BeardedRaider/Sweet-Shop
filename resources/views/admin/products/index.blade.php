<x-layout>
    <h1 class="text-2xl font-bold mb-6 text-pink-700">Manage Products</h1>

    <a href="{{ route('admin.products.create') }}" class="px-4 py-2 bg-pink-500 text-white rounded hover:bg-pink-600">Add Product</a>

    <div class="mt-6 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
        @forelse ($products as $product)
            <article class="bg-white shadow rounded-lg p-4">
                <h3 class="text-lg font-semibold">{{ $product->name }}</h3>
                <p class="text-gray-700 mb-2">{{ $product->description }}</p>
                <p class="text-pink-600 font-bold">£{{ number_format($product->price, 2) }}</p>

                <div class="mt-2 flex gap-2">
                    <a href="{{ route('admin.products.edit', $product) }}" class="px-3 py-1 bg-blue-500 text-white rounded">Edit</a>
                    <form action="{{ route('admin.products.destroy', $product) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="px-3 py-1 bg-red-500 text-white rounded">Delete</button>
                    </form>
                </div>
            </article>
        @empty
            <p>No products found.</p>
        @endforelse
    </div>
</x-layout>
