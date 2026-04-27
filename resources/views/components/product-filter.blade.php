<div class="bg-pink-100 rounded-lg shadow-sm p-6 mb-8 mt-10">
    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">

        {{-- Title --}}
        <h2 class="text-2xl font-bold text-pink-700">
            Browse Our Sweets
        </h2>

        {{-- Search + Sort --}}
        <div class="flex flex-col sm:flex-row gap-4">

            {{-- Search --}}
            <form method="GET" action="{{ route('products.index') }}" class="relative">
                <input 
                    type="text"
                    name="search"
                    placeholder="Search sweets..."
                    class="px-4 py-2 rounded-full border border-pink-300 bg-white shadow-sm focus:ring-2 focus:ring-pink-400 focus:outline-none w-64"
                    x-model="search"
                    @input.debounce.300ms="fetchSuggestions"
                >

                {{-- Keep sort when searching --}}
                <input type="hidden" name="sort" value="{{ request('sort') }}">

                {{-- Suggestions --}}
                <div 
                    x-show="suggestions.length > 0"
                    class="absolute left-0 right-0 bg-white border border-pink-200 rounded-lg shadow-md mt-1 z-20"
                >
                    <template x-for="item in suggestions" :key="item">
                        <div 
                            class="px-4 py-2 hover:bg-pink-50 cursor-pointer text-pink-800"
                            @click="selectSuggestion(item, $event)"
                            x-text="item"
                        ></div>
                    </template>
                </div>
            </form>

            {{-- Sort --}}
            <form method="GET" action="{{ route('products.index') }}">
                <select 
                    name="sort"
                    class="px-4 py-2 rounded-full border border-pink-300 bg-white shadow-sm focus:ring-2 focus:ring-pink-400 focus:outline-none"
                    onchange="this.form.submit()"
                >
                    <option value="">Sort By</option>
                    <option value="price_asc"  {{ request('sort') === 'price_asc'  ? 'selected' : '' }}>Price: Low → High</option>
                    <option value="price_desc" {{ request('sort') === 'price_desc' ? 'selected' : '' }}>Price: High → Low</option>
                    <option value="name_asc"   {{ request('sort') === 'name_asc'   ? 'selected' : '' }}>Name: A → Z</option>
                    <option value="name_desc"  {{ request('sort') === 'name_desc'  ? 'selected' : '' }}>Name: Z → A</option>
                </select>
            </form>

        </div>
    </div>
</div>
