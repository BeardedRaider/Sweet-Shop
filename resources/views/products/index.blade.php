<x-layout :title="'Browse Our Sweets'">

    {{-- Alpine wrapper MUST wrap the filter component --}}
    <div x-data="{
        search: '',
        suggestions: [],

        fetchSuggestions() {
            if (this.search.length < 2) {
                this.suggestions = [];
                return;
            }

            fetch(`/products/suggest?q=${this.search}`)
                .then(res => res.json())
                .then(data => this.suggestions = data);
        },

        selectSuggestion(name) {
            this.search = name;
            this.suggestions = [];
        }
    }">

        {{-- Hero --}}
        <section class="text-center mt-10 bg-pink-100 rounded-lg py-10 px-4 shadow-sm">
            <h1 class="text-4xl font-bold text-pink-700">Step Into the Sweet Aisle</h1>
            <p class="mt-4 text-lg text-pink-900">
                Bright colours, bold flavours, and dangerously snackable treats — explore at your own risk.
            </p>
        </section>

        {{-- 🔥 Your search + sort bar MUST be inside this wrapper --}}
        <x-product-filter />

        {{-- Product Grid --}}
        <section class="mt-10 px-4">
            <div class="max-w-6xl mx-auto bg-white/70 backdrop-blur-sm rounded-lg shadow-sm border border-pink-200 p-6">

                @if ($products->count())
                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 cols-4-1080 gap-8 justify-items-center">
                        @foreach ($products as $product)
                            @include('products.card', ['product' => $product])
                        @endforeach
                    </div>
                @else
                    <p class="text-center text-pink-900">No products available at the moment.</p>
                @endif

            </div>
        </section>

    </div> {{-- END Alpine wrapper --}}

</x-layout>
