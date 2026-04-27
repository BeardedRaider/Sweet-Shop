{{-- If loaded via AJAX (modal), return only the inner content --}}
@if(request()->ajax())

    {{-- Product title --}}
    <h1 class="text-2xl font-bold text-pink-700">
        {{ $product->name }}
    </h1>

    {{-- Product image --}}
    @if($product->images->isNotEmpty())
        <img src="{{ asset('storage/' . $product->images->first()->path) }}"
             alt="{{ $product->name }}"
             class="w-full h-48 object-cover rounded-lg mt-4 mb-4 shadow">
    @endif

    {{-- Description --}}
    <p class="text-pink-900 leading-relaxed">
        {{ $product->description }}
    </p>

    {{-- Price --}}
    <p class="mt-4 text-xl font-semibold text-pink-600">
        £{{ number_format($product->price, 2) }}
    </p>

@else

    {{-- Full page fallback --}}
    <x-layout>
        <article class="max-w-2xl mx-auto mt-12 bg-white/70 backdrop-blur-sm p-8 rounded-lg shadow-md border border-pink-200">

            {{-- Product image --}}
            @if($product->images->isNotEmpty())
                <img src="{{ asset('storage/' . $product->images->first()->path) }}"
                     alt="{{ $product->name }}"
                     class="w-full h-64 object-cover rounded-lg shadow mb-6">
            @endif

            {{-- Product title --}}
            <h1 class="text-3xl font-bold text-pink-700">
                {{ $product->name }}
            </h1>

            {{-- Description --}}
            <p class="mt-4 text-pink-900 leading-relaxed">
                {{ $product->description }}
            </p>

            {{-- Price --}}
            <p class="mt-4 text-xl font-semibold text-pink-600">
                £{{ number_format($product->price, 2) }}
            </p>

            {{-- Back link --}}
            <a href="{{ route('products.index') }}"
               class="mt-8 inline-block text-pink-600 hover:text-pink-800 font-medium">
                ← Back to Products
            </a>
        </article>
    </x-layout>

@endif
