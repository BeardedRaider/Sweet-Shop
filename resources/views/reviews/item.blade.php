<div class="bg-white rounded-lg shadow-sm p-3 hover:shadow-md transition-shadow text-center w-full">
    {{-- Product image --}}
    @if($review->product && $review->product->images->isNotEmpty())
        <img src="{{ asset('storage/' . $review->product->images->first()->path) }}" 
             alt="{{ $review->product->name }}" 
             class="w-full h-48 object-cover rounded mb-2 mx-auto">
    @else
        <div class="w-full h-48 bg-gray-200 flex items-center justify-center rounded mb-2 mx-auto">
            <span class="text-gray-500 text-xs">No image</span>
        </div>
    @endif

    {{-- Product name --}}
    <h3 class="text-sm font-semibold text-pink-700 mb-1">{{ $review->product->name }}</h3>

    {{-- Review title --}}
    @if(!empty($review->title))
        <p class="text-xs font-medium text-gray-800 mb-1">"{{ $review->title }}"</p>
    @endif

    {{-- used to debug rating type --}}
    {{-- 
    <p class="text-xs text-red-500">Rating: {{ $review->rating }} ({{ gettype($review->rating) }})</p> --}}

    {{-- Star rating --}}
    <div>
        Rating: {{ $review->rating }}
        <br>
        Stars:
        @for ($i = 1; $i <= 5; $i++)
            @if ($i <= (int) $review->rating)
                ★
            @else
                ☆
            @endif
        @endfor
    </div>


    {{-- Review body --}}
    <p class="text-gray-700 italic text-xs">“{{ $review->body }}”</p>

    {{-- Reviewer name --}}
    <p class="mt-1 text-xs text-gray-500">— {{ $review->user->name ?? 'Anonymous' }}</p>

    {{-- Review date --}}
    <p class="text-xs text-gray-400">{{ $review->created_at->format('d M Y') }}</p>
</div>
