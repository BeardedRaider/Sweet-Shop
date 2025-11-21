<x-layout>
    <h1 class="text-2xl font-bold mb-6 text-pink-700">Manage Users</h1>

    <table class="w-full bg-white shadow rounded">
        <thead>
            <tr class="bg-pink-100 text-pink-700">
                <th class="px-4 py-2">Name</th>
                <th class="px-4 py-2">Email</th>
                <th class="px-4 py-2">Role</th>
                <th class="px-4 py-2">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td class="border px-4 py-2">{{ $user->name }}</td>
                    <td class="border px-4 py-2">{{ $user->email }}</td>
                    <td class="border px-4 py-2">
                        @if($user->roles->isNotEmpty())
                            {{ $user->roles->pluck('name')->join(', ') }}
                        @else
                            customer
                        @endif
                    </td>                    
                    <td class="border px-4 py-2">
                        <a href="{{ route('admin.users.edit', $user) }}" class="text-blue-600 hover:underline">Edit</a>
                        <form action="{{ route('admin.users.destroy', $user) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:underline">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</x-layout>