<x-layout>
    <section class="mt-10 text-center">
        <h1 class="text-3xl font-bold text-pink-700">Admin Dashboard</h1>
        <p class="mt-4 text-lg text-gray-600">
            Welcome back! Manage your SweetShop inventory, users, customer reviews, and orders from here.
        </p>
    </section>

    <section class="mt-12 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">        
        {{-- Products --}}
        <div class="bg-pink-50 rounded-lg shadow p-6 text-center">
            <h2 class="text-xl font-semibold text-pink-700 mb-4">Products</h2>
            <p class="text-gray-600 mb-4">Add, edit, or remove sweets from the shop.</p>
            <a href="{{ route('admin.products.index') }}"
               class="px-4 py-2 bg-pink-500 text-white rounded hover:bg-pink-600">
               Manage Products
            </a>
        </div>

        {{-- Users --}}
        <div class="bg-pink-50 rounded-lg shadow p-6 text-center">
            <h2 class="text-xl font-semibold text-pink-700 mb-4">Users</h2>
            <p class="text-gray-600 mb-4">View and update customer or admin accounts.</p>
            <a href="{{ route('admin.users.index') }}"
               class="px-4 py-2 bg-pink-500 text-white rounded hover:bg-pink-600">
               Manage Users
            </a>
        </div>

        {{-- Reviews --}}
        <div class="bg-pink-50 rounded-lg shadow p-6 text-center">
            <h2 class="text-xl font-semibold text-pink-700 mb-4">Reviews</h2>
            <p class="text-gray-600 mb-4">Moderate customer feedback and ratings.</p>
            <a href="{{ route('admin.reviews.index') }}"
               class="px-4 py-2 bg-pink-500 text-white rounded hover:bg-pink-600">
               Manage Reviews
            </a>
        </div>

        {{-- Orders --}}
        <div class="bg-pink-50 rounded-lg shadow p-6 text-center">
            <h2 class="text-xl font-semibold text-pink-700 mb-4">Orders</h2>
            <p class="text-gray-600 mb-4">
                Track and manage customer orders.
            </p>
            <p class="text-gray-600 mb-2">
                Pending: {{ \App\Models\Order::where('status', 'pending')->count() }}
            </p>
            <p class="text-gray-600 mb-2">
                Completed: {{ \App\Models\Order::where('status', 'completed')->count() }}
            </p>
            <p class="text-gray-600 mb-4">
                Cancelled: {{ \App\Models\Order::where('status', 'cancelled')->count() }}
            </p>
            <a href="{{ route('admin.orders.index') }}"
               class="px-4 py-2 bg-pink-500 text-white rounded hover:bg-pink-600">
               Manage Orders
            </a>
        </div>
    </section>
</x-layout>
