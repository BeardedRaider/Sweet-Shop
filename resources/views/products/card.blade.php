<div class="bg-white rounded-lg shadow hover:shadow-md transition p-4 text-center">
    {{-- Product image (first from images collection) --}}
    <div class="w-full h-48 overflow-hidden rounded">
        @if($product->images->isNotEmpty())
            <img src="{{ asset('storage/' . $product->images->first()->path) }}"
                 alt="{{ $product->images->first()->alt_text ?? $product->name }}"
                 class="w-full h-full object-cover transform hover:scale-105 transition duration-300 ease-in-out">
        @else
            <img src="{{ asset('images/default-product.jpg') }}"
                 alt="Default product image"
                 class="w-full h-full object-cover opacity-50">
        @endif
    </div>

    {{-- Product name --}}
    <h3 class="mt-3 text-lg font-semibold text-pink-700">{{ $product->name }}</h3>

    {{-- Product description (truncated) --}}
    <p class="text-sm text-pink-900 mt-1">{{ Str::limit($product->description, 60) }}</p>

    {{-- Product price --}}
    <p class="mt-2 font-bold text-pink-600">£{{ number_format($product->price, 2) }}</p>

@auth
  <form action="{{ route('cart.add', $product->id) }}" method="POST"
        class="mt-6 flex flex-col items-center gap-4 px-4 py-4 bg-pink-50 rounded-lg shadow-inner">
    @csrf

<div class="flex items-center gap-4">
  {{-- - button --}}
  <button type="button"
          class="px-3 py-1 bg-pink-500 text-white rounded-full shadow hover:bg-pink-600 transition cursor-pointer"
          onclick="
            const hidden = this.nextElementSibling.nextElementSibling;
            const display = this.nextElementSibling;
            let val = Math.max(1, parseInt(hidden.value) - 1);
            hidden.value = val;
            display.textContent = val;
          ">−</button>

  {{-- Counter display (fixed-size, centered, non-resizable) --}}
  <span class="flex-none w-12 h-12 grid place-items-center bg-white border border-pink-300 rounded font-semibold text-pink-800 text-sm tabular-nums select-none overflow-hidden">
    1
  </span>
  <input type="hidden" name="quantity" value="1" />


  {{-- + button --}}
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


    {{-- Add to Cart button (your exact styling) --}}
    <button type="submit"
            class="w-full px-6 py-3 bg-pink-500 text-white rounded-full shadow hover:bg-pink-600 transition">
      Add to Cart
    </button>
  </form>
@endauth

</div>

