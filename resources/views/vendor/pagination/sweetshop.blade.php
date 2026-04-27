@if ($paginator->hasPages())
    <nav class="flex justify-center mt-8">
        <ul class="flex items-center gap-2">

            {{-- Previous --}}
            @if ($paginator->onFirstPage())
                <span
                    class="px-3 py-1 rounded-full bg-white border border-pink-300 text-pink-400 opacity-50 cursor-not-allowed">
                    ❮
                </span>
            @else
                <a href="{{ $paginator->previousPageUrl() }}"
                    class="px-3 py-1 rounded-full bg-white border border-pink-300 text-pink-600 hover:bg-pink-50 transition">
                    ❮
                </a>
            @endif

            {{-- Page Numbers --}}
            @foreach ($elements as $element)
                @if (is_string($element))
                    <span class="px-3 py-1 text-pink-700">{{ $element }}</span>
                @endif

                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        {{-- Active page --}}
                        @if ($page == $paginator->currentPage())
                            <span class="px-3 py-1 rounded-lg bg-pink-600 text-white font-semibold shadow">
                                {{ $page }}
                            </span>

                            {{-- Inactive pages --}}
                        @else
                            <a href="{{ $url }}"
                                class="px-3 py-1 rounded-lg bg-pink-200 text-pink-700 hover:bg-pink-300 transition">
                                {{ $page }}
                            </a>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next --}}
            @if ($paginator->hasMorePages())
                <a href="{{ $paginator->nextPageUrl() }}"
                    class="px-3 py-1 rounded-full bg-white border border-pink-300 text-pink-600 hover:bg-pink-50 transition">
                    ❯
                </a>
            @else
                <span
                    class="px-3 py-1 rounded-full bg-white border border-pink-300 text-pink-400 opacity-50 cursor-not-allowed">
                    ❯
                </span>
            @endif

        </ul>
    </nav>
@endif
