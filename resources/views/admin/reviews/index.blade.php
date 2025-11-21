<x-layout>
    <h1 class="text-2xl font-bold mb-6 text-pink-700">Manage Reviews</h1>

    <table class="w-full bg-white shadow rounded">
        <thead>
            <tr class="bg-pink-100 text-pink-700">
                <th class="px-4 py-2">User</th>
                <th class="px-4 py-2">Product</th>
                <th class="px-4 py-2">Rating</th>
                <th class="px-4 py-2">Review</th>
                <th class="px-4 py-2">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($reviews as $review)
                <tr>
                    <td class="border px-4 py-2">{{ $review->user->name ?? 'Unknown User' }}</td>
                    <td class="border px-4 py-2">{{ $review->product->name ?? 'Unknown Product' }}</td>
                    <td class="border px-4 py-2">{{ $review->rating }}/5</td>
                    <td class="border px-4 py-2">{{ $review->body }}</td>
                    <td class="border px-4 py-2">
                        <a href="{{ route('admin.reviews.edit', $review) }}" class="text-blue-600 hover:underline">Edit</a>
                        <form action="{{ route('admin.reviews.destroy', $review) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:underline">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</x-layout>