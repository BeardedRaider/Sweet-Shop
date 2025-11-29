{{-- resources/views/index.blade.php --}}
<x-layout>
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

