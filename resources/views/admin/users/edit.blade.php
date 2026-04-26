<x-layout>
    <h1 class="text-2xl font-bold mb-6 text-pink-700">Edit User</h1>

    {{-- Edit form: allows admin to update user details (name, email, address).
         Roles are intentionally excluded to prevent accidental privilege changes. --}}
    <form action="{{ route('admin.users.update', $user) }}" method="POST" 
          class="space-y-4 max-w-lg mx-auto bg-white p-6 rounded shadow">
        @csrf
        @method('PUT')

        {{-- Name field --}}
        <div>
            <label for="name" class="block font-semibold text-gray-700">Name</label>
            <input type="text" id="name" name="name" 
                   value="{{ old('name', $user->name) }}"
                   class="w-full border rounded px-3 py-2 focus:ring-pink-500 focus:border-pink-500" required>
            @error('name') 
                <p class="text-red-600 text-sm">{{ $message }}</p> 
            @enderror
        </div>

        {{-- Email field --}}
        <div>
            <label for="email" class="block font-semibold text-gray-700">Email</label>
            <input type="email" id="email" name="email" 
                   value="{{ old('email', $user->email) }}"
                   class="w-full border rounded px-3 py-2 focus:ring-pink-500 focus:border-pink-500" required>
            @error('email') 
                <p class="text-red-600 text-sm">{{ $message }}</p> 
            @enderror
        </div>

        {{-- Address Line 1 --}}
        <div>
            <label for="address_line1" class="block font-semibold text-gray-700">Address Line 1</label>
            <input type="text" id="address_line1" name="address_line1" 
                   value="{{ old('address_line1', $user->address_line1) }}"
                   class="w-full border rounded px-3 py-2 focus:ring-pink-500 focus:border-pink-500">
            @error('address_line1') 
                <p class="text-red-600 text-sm">{{ $message }}</p> 
            @enderror
        </div>

        {{-- Address Line 2 --}}
        <div>
            <label for="address_line2" class="block font-semibold text-gray-700">Address Line 2</label>
            <input type="text" id="address_line2" name="address_line2" 
                   value="{{ old('address_line2', $user->address_line2) }}"
                   class="w-full border rounded px-3 py-2 focus:ring-pink-500 focus:border-pink-500">
            @error('address_line2') 
                <p class="text-red-600 text-sm">{{ $message }}</p> 
            @enderror
        </div>

        {{-- City --}}
        <div>
            <label for="city" class="block font-semibold text-gray-700">City</label>
            <input type="text" id="city" name="city" 
                   value="{{ old('city', $user->city) }}"
                   class="w-full border rounded px-3 py-2 focus:ring-pink-500 focus:border-pink-500">
            @error('city') 
                <p class="text-red-600 text-sm">{{ $message }}</p> 
            @enderror
        </div>

        {{-- Postcode --}}
        <div>
            <label for="postcode" class="block font-semibold text-gray-700">Postcode</label>
            <input type="text" id="postcode" name="postcode" 
                   value="{{ old('postcode', $user->postcode) }}"
                   class="w-full border rounded px-3 py-2 focus:ring-pink-500 focus:border-pink-500">
            @error('postcode') 
                <p class="text-red-600 text-sm">{{ $message }}</p> 
            @enderror
        </div>

        {{-- Country --}}
        <div>
            <label for="country" class="block font-semibold text-gray-700">Country</label>
            <input type="text" id="country" name="country" 
                   value="{{ old('country', $user->country) }}"
                   class="w-full border rounded px-3 py-2 focus:ring-pink-500 focus:border-pink-500">
            @error('country') 
                <p class="text-red-600 text-sm">{{ $message }}</p> 
            @enderror
        </div>

        {{-- Action buttons --}}
        <div class="flex justify-between">
            <a href="{{ route('admin.users.index') }}" 
               class="px-4 py-2 bg-gray-200 rounded hover:bg-gray-300">Cancel</a>
            <button type="submit" 
                    class="px-4 py-2 bg-pink-500 text-white rounded hover:bg-pink-600">
                Update User
            </button>
        </div>
    </form>
</x-layout>
