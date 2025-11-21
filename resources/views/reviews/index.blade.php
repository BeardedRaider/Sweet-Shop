<x-layout>
    <section class="mt-8">
        <h2 class="text-2xl font-bold mb-6 text-center">Customer Reviews</h2>

        @forelse ($reviews as $review)
            @include('reviews.item', ['review' => $review])
        @empty
            <p class="text-center text-gray-600">No reviews yet.</p>
        @endforelse
    </section>
</x-layout>
