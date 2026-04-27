<x-layout>
    {{-- Hero --}}
<section class="text-center mt-10 bg-pink-100 rounded-lg py-10 px-4 shadow-sm">
    <h1 class="text-4xl font-bold text-pink-700">What Our Customers Say</h1>

    <p class="mt-4 text-lg text-pink-900">
        Honest thoughts, sweet experiences, and real feedback from candy lovers.
    </p>
</section>

<div class="bg-pink-100 rounded-lg shadow-sm p-6 mb-8 mt-10">
    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">

        {{-- Filter Title --}}
        <h2 class="text-2xl font-bold text-pink-700">
            Find the Sweetest Reviews
        </h2>

        {{-- Filters --}}
        <form method="GET" action="{{ route('reviews.index') }}"
              class="flex flex-col sm:flex-row items-center gap-4">

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

            {{-- Apply --}}
            <button type="submit"
                    class="bg-pink-600 hover:bg-pink-700 text-white font-semibold px-4 py-1.5 rounded-full text-sm transition active:scale-95">
                Apply
            </button>

            {{-- Clear --}}
            @if(request()->has('rating') || request()->has('product_id'))
                <a href="{{ route('reviews.index') }}"
                   class="text-sm text-pink-600 underline">
                    Clear
                </a>
            @endif
        </form>
    </div>
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
                {{ $reviews->links('vendor.pagination.sweetshop') }}
            </div>
        @else
            <p class="text-center text-gray-600">No reviews yet.</p>
        @endif
    </section>
</x-layout>
