<div class="bg-white rounded-lg shadow p-4">
    {{-- Product name --}}
    @if($review->product)
        <h3 class="text-lg font-semibold text-pink-700 mb-2">
            {{ $review->product->name }}
        </h3>
    @endif

    {{-- Review content --}}
    <p class="text-pink-900 italic">“{{ $review->body }}”</p>

    {{-- Author / reviewer name --}}
    <p class="mt-2 text-sm text-pink-700">— {{ $review->user->name ?? 'Anonymous' }}</p>


    {{-- Optional: rating stars if you have a rating field --}}
    @if(!empty($review->rating))
        <p class="mt-1 text-yellow-500">
            @for ($i = 0; $i < $review->rating; $i++)
                ★
            @endfor
        </p>
    @endif
</div>
