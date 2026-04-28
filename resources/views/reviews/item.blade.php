<button 
    @click="
        fetch('{{ route('reviews.show', $review->id) }}', {
            headers: { 'X-Requested-With': 'XMLHttpRequest' }
        })
        .then(res => res.text())
        .then(html => { content = html; open = true })
    "
    class="w-full text-left cursor-pointer"
>
    <div class="bg-white rounded-xl shadow-md border border-pink-200 p-5 w-full max-w-xs
                transition-all duration-300 hover:shadow-pink-300 hover:shadow-lg hover:-translate-y-1">

        {{-- Product image --}}
        <div class="w-full h-48 overflow-hidden rounded-lg shadow-sm mb-3">
            @if($review->product && $review->product->images->isNotEmpty())
                <img src="{{ asset('storage/' . $review->product->images->first()->path) }}"
                     alt="{{ $review->product->name }}"
                     class="w-full h-full object-cover transform hover:scale-105 transition duration-300 ease-in-out">
            @else
                <div class="w-full h-full bg-gray-200 flex items-center justify-center rounded-lg">
                    <span class="text-gray-500 text-xs">No image</span>
                </div>
            @endif
        </div>

        {{-- Product name --}}
        <h3 class="text-xl font-bold text-pink-700 tracking-tight mb-1">
            {{ $review->product->name }}
        </h3>

        {{-- Review title --}}
        @if(!empty($review->title))
            <p class="text-sm font-medium text-pink-900/80 mb-2">
                “{{ $review->title }}”
            </p>
        @endif

        {{-- Star rating --}}
        <div class="text-yellow-500 text-lg mb-3">
            @for ($i = 1; $i <= 5; $i++)
                @if ($i <= (int) $review->rating)
                    ★
                @else
                    ☆
                @endif
            @endfor
        </div>

        {{-- Review body (limited + fixed height) --}}
        <p class="text-pink-900/90 text-sm italic mb-2 min-h-16">
            “{{ Str::limit($review->body, 80) }}”
        </p>

        {{-- Read more cue --}}
        <span class="text-pink-600 text-xs underline">
            Read more
        </span>

        {{-- Reviewer + Date --}}
        <div class="flex justify-between text-xs text-pink-700 mt-3">
            <span>— {{ $review->user->name ?? 'Anonymous' }}</span>
            <span>{{ $review->created_at->format('d M Y') }}</span>
        </div>

    </div>
</button>
