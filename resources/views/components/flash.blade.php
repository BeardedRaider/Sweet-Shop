@if (session('success'))
    <div class="mb-4 px-4 py-2 rounded bg-green-100 text-green-800 border border-green-300">
        {{ session('success') }}
    </div>
@endif

@if (session('error'))
    <div class="mb-4 px-4 py-2 rounded bg-red-100 text-red-800 border border-red-300">
        {{ session('error') }}
    </div>
@endif

@if (session('warning'))
    <div class="mb-4 px-4 py-2 rounded bg-yellow-100 text-yellow-800 border border-yellow-300">
        {{ session('warning') }}
    </div>
@endif

@if (session('info'))
    <div class="mb-4 px-4 py-2 rounded bg-blue-100 text-blue-800 border border-blue-300">
        {{ session('info') }}
    </div>
@endif