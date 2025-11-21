<x-layout>
    <h1 class="text-2xl font-bold mb-6 text-pink-700">Manage Products</h1>

    <a href="{{ route('admin.products.create') }}" 
       class="mb-4 inline-block px-4 py-2 bg-pink-500 text-white rounded hover:bg-pink-600">
       Add Product
    </a>

    <table class="w-full bg-white shadow rounded">
        <thead>
            <tr class="bg-pink-100 text-pink-700">
                <th class="px-4 py-2">Name</th>
                <th class="px-4 py-2">Description</th>
                <th class="px-4 py-2">Price</th>
                <th class="px-4 py-2">Stock</th>
                <th class="px-4 py-2">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($products as $product)
                <tr>
                    <td class="border px-4 py-2">{{ $product->name }}</td>
                    <td class="border px-4 py-2">{{ $product->description }}</td>
                    <td class="border px-4 py-2">£{{ number_format($product->price, 2) }}</td>
                    <td class="border px-4 py-2">{{ $product->stock }}</td>
                    <td class="border px-4 py-2">
                        <a href="{{ route('admin.products.edit', $product) }}" 
                           class="text-blue-600 hover:underline">Edit</a>
                        <form action="{{ route('admin.products.destroy', $product) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:underline">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="border px-4 py-2 text-center">No products found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</x-layout>

