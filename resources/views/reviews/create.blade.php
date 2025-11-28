<x-layout :title="'Leave a Review'">
    <section class="max-w-2xl mx-auto bg-white shadow rounded p-6 mt-10">
        <h1 class="text-2xl font-bold text-pink-700 mb-6">Leave a Review</h1>

        <form action="{{ route('reviews.store') }}" method="POST" class="space-y-4">
            @csrf

            {{-- Product selector (from order items) --}}
            <div>
                <label for="product_id" class="block font-semibold text-gray-700">Product</label>
                <select name="product_id" id="product_id" class="w-full border rounded px-3 py-2">
                    @foreach($order->items as $item)
                        <option value="{{ $item->product->id }}">{{ $item->product->name }}</option>
                    @endforeach
                </select>
            </div>

            {{-- Title --}}
            <div>
                <label for="title" class="block font-semibold text-gray-700">Title</label>
                <input type="text" id="title" name="title" 
                       class="w-full border rounded px-3 py-2 focus:ring-pink-500 focus:border-pink-500"
                       value="{{ old('title') }}" required>
                @error('title') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
            </div>

            {{-- Body --}}
            <div>
                <label for="body" class="block font-semibold text-gray-700">Review</label>
                <textarea id="body" name="body" rows="4"
                          class="w-full border rounded px-3 py-2 focus:ring-pink-500 focus:border-pink-500"
                          required>{{ old('body') }}</textarea>
                @error('body') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
            </div>

            {{-- Rating --}}
            <div>
                <label for="rating" class="block font-semibold text-gray-700">Rating</label>
                <select id="rating" name="rating" class="w-full border rounded px-3 py-2" required>
                    <option value="">Select rating</option>
                    @for($i = 1; $i <= 5; $i++)
                        <option value="{{ $i }}">{{ $i }} Star{{ $i > 1 ? 's' : '' }}</option>
                    @endfor
                </select>
                @error('rating') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
            </div>

            <div class="flex justify-end">
                <button type="submit"
                        class="px-4 py-2 bg-pink-500 text-white rounded hover:bg-pink-600">
                    Submit Review
                </button>
            </div>
        </form>
    </section>
</x-layout>
