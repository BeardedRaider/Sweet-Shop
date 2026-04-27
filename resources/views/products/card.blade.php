<div class="bg-white rounded-xl shadow-md border border-pink-200 p-5 w-full max-w-xs
            transition-all duration-300 hover:shadow-pink-300 hover:shadow-lg hover:-translate-y-1">

    {{-- Entire clickable area (image + title) --}}
    <button 
        @click="
            fetch('{{ route('products.show', $product->id) }}', {
                headers: { 'X-Requested-With': 'XMLHttpRequest' }
            })
            .then(res => res.text())
            .then(html => { content = html; open = true })
        "
        class="w-full text-left"
    >
        {{-- Product image --}}
        <div class="w-full h-48 overflow-hidden rounded-lg shadow-sm">
            @if($product->images->isNotEmpty())
                <img src="{{ asset('storage/' . $product->images->first()->path) }}"
                     alt="{{ $product->name }}"
                     class="w-full h-full object-cover transform hover:scale-105 transition duration-300 ease-in-out">
            @else
                <img src="{{ asset('images/default-product.jpg') }}"
                     alt="Default product image"
                     class="w-full h-full object-cover opacity-50">
            @endif
        </div>

        {{-- Product name --}}
        <h3 class="mt-4 text-xl font-bold text-pink-700 tracking-tight">
            {{ $product->name }}
        </h3>
    </button>

    {{-- Short description --}}
    <p class="text-sm text-pink-900/80 mt-1">
        {{ Str::limit($product->description, 60) }}
    </p>

    {{-- Playful price tag --}}
    <div class="mt-4 inline-block bg-pink-100 border border-pink-300 text-pink-700 
                px-4 py-1 rounded-full font-extrabold shadow-sm">
        £{{ number_format($product->price, 2) }}
    </div>

    {{-- Add to Cart (only for logged-in users) --}}
    @auth
    <form action="{{ route('cart.add', $product->id) }}" method="POST"
          class="mt-6 flex flex-col items-center gap-4 px-4 py-4 bg-pink-50 rounded-lg shadow-inner border border-pink-200">
        @csrf

        <div class="flex items-center gap-4">
            {{-- Decrease --}}
            <button type="button"
                    class="px-3 py-1 bg-pink-500 text-white rounded-full shadow hover:bg-pink-600 transition cursor-pointer"
                    onclick="
                        const hidden = this.nextElementSibling.nextElementSibling;
                        const display = this.nextElementSibling;
                        let val = Math.max(1, parseInt(hidden.value) - 1);
                        hidden.value = val;
                        display.textContent = val;
                    ">−</button>

            {{-- Display --}}
            <span class="flex-none w-12 h-12 grid place-items-center bg-white border border-pink-300 rounded font-semibold text-pink-800 text-sm tabular-nums select-none overflow-hidden">
                1
            </span>

            {{-- Hidden input --}}
            <input type="hidden" name="quantity" value="1" />

            {{-- Increase --}}
            <button type="button"
                    class="px-3 py-1 bg-pink-500 text-white rounded-full shadow hover:bg-pink-600 transition cursor-pointer"
                    onclick="
                        const hidden = this.previousElementSibling;
                        const display = hidden.previousElementSibling;
                        let val = parseInt(hidden.value) + 1;
                        hidden.value = val;
                        display.textContent = val;
                    ">+</button>
        </div>

        {{-- Add to Cart button --}}
        <button type="submit"
                class="w-full px-6 py-3 bg-pink-500 text-white rounded-full shadow hover:bg-pink-600 transition">
            Add to Cart
        </button>
    </form>
    @endauth
</div>
