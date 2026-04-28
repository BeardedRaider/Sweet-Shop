<div class="p-6">

    {{-- Product image --}}
    <div class="w-full h-56 overflow-hidden rounded-lg shadow mb-4">
        @if($review->product && $review->product->images->isNotEmpty())
            <img src="{{ asset('storage/' . $review->product->images->first()->path) }}"
                 class="w-full h-full object-cover">
        @else
            <div class="w-full h-full bg-gray-200 flex items-center justify-center rounded-lg">
                <span class="text-gray-500 text-xs">No image</span>
            </div>
        @endif
    </div>

    {{-- Product name --}}
    <h2 class="text-2xl font-bold text-pink-700 mb-2">
        {{ $review->product->name }}
    </h2>

    {{-- Stars --}}
    <div class="text-yellow-500 text-xl mb-3">
        @for ($i = 1; $i <= 5; $i++)
            @if ($i <= (int) $review->rating)
                ★
            @else
                ☆
            @endif
        @endfor
    </div>

    {{-- Review body --}}
    <p class="text-pink-900 text-sm mb-4">
        “{{ $review->body }}”
    </p>

    {{-- Reviewer + Date --}}
    <p class="text-sm text-pink-700">
        — {{ $review->user->name ?? 'Anonymous' }}  
        <br>
        <span class="text-pink-500">{{ $review->created_at->format('d M Y') }}</span>
    </p>

</div>
