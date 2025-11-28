<x-layout :title="'My Account'">
    <section class="max-w-2xl mx-auto bg-white shadow rounded p-6 mt-10">
        <h1 class="text-2xl font-bold text-pink-700 mb-6">My Account</h1>

        {{-- @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-2 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif --}}

        <form action="{{ route('account.update') }}" method="POST" class="space-y-4">
            @csrf
            @method('PUT')

            <div>
                <label for="name" class="block font-semibold text-gray-700">Name</label>
                <input type="text" id="name" name="name" value="{{ old('name', auth()->user()->name) }}"
                       class="w-full border rounded px-3 py-2 focus:ring-pink-500 focus:border-pink-500" required>
                @error('name') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
            </div>

            <div>
                <label for="email" class="block font-semibold text-gray-700">Email</label>
                <input type="email" id="email" name="email" value="{{ old('email', auth()->user()->email) }}"
                       class="w-full border rounded px-3 py-2 focus:ring-pink-500 focus:border-pink-500" required>
                @error('email') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
            </div>

            <div>
                <label for="address_line1" class="block font-semibold text-gray-700">Address Line 1</label>
                <input type="text" id="address_line1" name="address_line1" value="{{ old('address_line1', auth()->user()->address_line1) }}"
                       class="w-full border rounded px-3 py-2 focus:ring-pink-500 focus:border-pink-500">
            </div>

            <div>
                <label for="address_line2" class="block font-semibold text-gray-700">Address Line 2</label>
                <input type="text" id="address_line2" name="address_line2" value="{{ old('address_line2', auth()->user()->address_line2) }}"
                       class="w-full border rounded px-3 py-2 focus:ring-pink-500 focus:border-pink-500">
            </div>

            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label for="city" class="block font-semibold text-gray-700">City</label>
                    <input type="text" id="city" name="city" value="{{ old('city', auth()->user()->city) }}"
                           class="w-full border rounded px-3 py-2 focus:ring-pink-500 focus:border-pink-500">
                </div>

                <div>
                    <label for="postcode" class="block font-semibold text-gray-700">Postcode</label>
                    <input type="text" id="postcode" name="postcode" value="{{ old('postcode', auth()->user()->postcode) }}"
                           class="w-full border rounded px-3 py-2 focus:ring-pink-500 focus:border-pink-500">
                </div>
            </div>

            <div>
                <label for="country" class="block font-semibold text-gray-700">Country</label>
                <input type="text" id="country" name="country" value="{{ old('country', auth()->user()->country) }}"
                       class="w-full border rounded px-3 py-2 focus:ring-pink-500 focus:border-pink-500">
            </div>

            <div class="flex justify-between mt-6">
                <a href="{{ route('account.orders') }}"
                   class="px-4 py-2 bg-gray-200 text-black rounded hover:bg-gray-300">
                    View Order History
                </a>
                <button type="submit"
                        class="px-4 py-2 bg-pink-500 text-white rounded hover:bg-pink-600">
                    Save Changes
                </button>
            </div>
        </form>
    </section>
</x-layout>
