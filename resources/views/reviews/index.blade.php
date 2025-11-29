{{-- resources/views/index.blade.php --}}
<x-layout>
<div class="w-full flex justify-center mb-8">
    <form method="GET" action="{{ route('reviews.index') }}"
          class="flex items-center gap-4 bg-pink-50 border border-pink-200 px-4 py-3 rounded-full shadow-sm">
        
        {{-- Rating --}}
        <select name="rating"
                class="border border-pink-300 rounded-full px-3 py-1 text-sm bg-white focus:outline-none focus:ring-1 focus:ring-pink-500">
            <option value="">All Ratings</option>
            @for ($i = 1; $i <= 5; $i++)
                <option value="{{ $i }}" {{ request('rating') == $i ? 'selected' : '' }}>
                    {{ $i }} star{{ $i > 1 ? 's' : '' }}
                </option>
            @endfor
        </select>

        {{-- Product --}}
        <select name="product_id"
                class="border border-pink-300 rounded-full px-3 py-1 text-sm bg-white focus:outline-none focus:ring-1 focus:ring-pink-500">
            <option value="">All Products</option>
            @foreach (\App\Models\Product::all() as $product)
                <option value="{{ $product->id }}" {{ request('product_id') == $product->id ? 'selected' : '' }}>
                    {{ $product->name }}
                </option>
            @endforeach
        </select>

        {{-- Filter button --}}
        <button type="submit"
                class="bg-pink-600 hover:bg-pink-700 text-pink-600 font-semibold px-4 py-1.5 rounded-full text-sm transition duration-150 ease-in-out active:scale-95">
            Apply Filters
        </button>

        {{-- Clear filters --}}
        @if(request()->has('rating') || request()->has('product_id'))
            <a href="{{ route('reviews.index') }}"
               class="text-sm text-pink-600 underline">
                Clear
            </a>
        @endif
    </form>
</div>





    <section class="mt-8 px-4">
        <h2 class="text-2xl font-bold mb-6 text-center text-pink-700">Customer Reviews</h2>

        @if($reviews->count())
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 cols-4-1080 gap-6 justify-items-center">
                @foreach ($reviews as $review)
                    @include('reviews.item', ['review' => $review])
                @endforeach
            </div>


            <div class="mt-8">
                {{ $reviews->links() }}
            </div>
        @else
            <p class="text-center text-gray-600">No reviews yet.</p>
        @endif
    </section>
</x-layout>

