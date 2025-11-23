<x-layout :title="'My Account'">
    <section class="max-w-2xl mx-auto bg-white shadow rounded p-6 mt-10">
        <h1 class="text-2xl font-bold text-pink-700 mb-6">My Account</h1>

        {{-- User details pulled from Auth --}}
        <div class="space-y-4">
            <p><span class="font-semibold text-pink-700">Name:</span> {{ Auth::user()->name }}</p>
            <p><span class="font-semibold text-pink-700">Email:</span> {{ Auth::user()->email }}</p>
            <p><span class="font-semibold text-pink-700">Role:</span> {{ Auth::user()->role }}</p>
        </div>

        {{-- Optional: quick actions --}}
        <div class="mt-6 flex gap-4">
            <a href="{{ route('products.index') }}" 
               class="px-4 py-2 bg-pink-500 text-white rounded hover:bg-pink-600">
               Continue Shopping
            </a>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" 
                        class="px-4 py-2 bg-red-500 text-white rounded hover:bg-red-600">
                    Logout
                </button>
            </form>
        </div>
    </section>
</x-layout>

