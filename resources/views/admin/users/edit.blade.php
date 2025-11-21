<x-layout>
    <h1 class="text-2xl font-bold mb-6 text-pink-700">Edit User</h1>

    <form action="{{ route('admin.users.update', $user) }}" method="POST" class="space-y-4 max-w-lg mx-auto bg-white p-6 rounded shadow">
        @csrf
        @method('PUT')

        <div>
            <label for="name" class="block font-semibold text-gray-700">Name</label>
            <input type="text" id="name" name="name" value="{{ old('name', $user->name) }}"
                   class="w-full border rounded px-3 py-2 focus:ring-pink-500 focus:border-pink-500" required>
            @error('name') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
        </div>

        <div>
            <label for="email" class="block font-semibold text-gray-700">Email</label>
            <input type="email" id="email" name="email" value="{{ old('email', $user->email) }}"
                   class="w-full border rounded px-3 py-2 focus:ring-pink-500 focus:border-pink-500" required>
            @error('email') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
        </div>

        <div>
            <label for="role" class="block font-semibold text-gray-700">Role</label>
            <select id="role" name="role"
                    class="w-full border rounded px-3 py-2 focus:ring-pink-500 focus:border-pink-500">
                <option value="customer" {{ old('role', $user->role) === 'customer' ? 'selected' : '' }}>Customer</option>
                <option value="admin" {{ old('role', $user->role) === 'admin' ? 'selected' : '' }}>Admin</option>
            </select>
            @error('role') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
        </div>

        <div class="flex justify-between">
            <a href="{{ route('admin.users.index') }}" class="px-4 py-2 bg-gray-200 rounded hover:bg-gray-300">Cancel</a>
            <button type="submit" class="px-4 py-2 bg-pink-500 text-white rounded hover:bg-pink-600">Update User</button>
        </div>
    </form>
</x-layout>