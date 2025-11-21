<x-layout>
    <h1 class="text-2xl font-bold mb-6 text-pink-700">Edit Review</h1>

    <form action="{{ route('admin.reviews.update', $review) }}" method="POST" class="space-y-4 max-w-lg mx-auto bg-white p-6 rounded shadow">
        @csrf
        @method('PUT')

        <div>
            <label for="body" class="block font-semibold text-gray-700">Review Text</label>
            <textarea id="body" name="body"
                      class="w-full border rounded px-3 py-2 focus:ring-pink-500 focus:border-pink-500"
                      required>{{ old('body', $review->body) }}</textarea>
            @error('body') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
        </div>

        <div>
            <label for="rating" class="block font-semibold text-gray-700">Rating</label>
            <select id="rating" name="rating"
                    class="w-full border rounded px-3 py-2 focus:ring-pink-500 focus:border-pink-500" required>
                @for ($i = 1; $i <= 5; $i++)
                    <option value="{{ $i }}" {{ old('rating', $review->rating) == $i ? 'selected' : '' }}>
                        {{ $i }}
                    </option>
                @endfor
            </select>
            @error('rating') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
        </div>

        <div class="flex justify-between">
            <a href="{{ route('admin.reviews.index') }}" class="px-4 py-2 bg-gray-200 rounded hover:bg-gray-300">Cancel</a>
            <button type="submit" class="px-4 py-2 bg-pink-500 text-white rounded hover:bg-pink-600">Update Review</button>
        </div>
    </form>
</x-layout>