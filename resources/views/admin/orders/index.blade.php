<x-layout :title="'Manage Orders'">
    <section class="bg-white shadow rounded p-6">
        <h1 class="text-2xl font-bold text-pink-700 mb-6">Manage Orders</h1>

        {{-- Flash messages --}}
        @if(session('success'))
            <div class="bg-green-100 text-green-800 p-4 rounded mb-4 text-sm">
                {{ session('success') }}
            </div>
        @endif
        @if(session('error'))
            <div class="bg-red-100 text-red-800 p-4 rounded mb-4 text-sm">
                {{ session('error') }}
            </div>
        @endif

        {{-- Orders table --}}
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
    @forelse($orders as $order)
        <div class="bg-pink-50 border border-pink-200 rounded-lg shadow p-6">
            <h2 class="text-lg font-bold text-pink-700 mb-3">
                Order #{{ $order->id }}
            </h2>
            <p class="text-sm text-gray-700 mb-1"><strong>Customer:</strong> {{ $order->name ?? '—' }}</p>
            <p class="text-sm text-gray-700 mb-1"><strong>Total:</strong> £{{ number_format($order->total, 2) }}</p>
            <p class="text-sm text-gray-700 mb-1"><strong>Status:</strong>
                <span class="inline-block px-2 py-1 rounded text-xs font-semibold
                    @if($order->status === 'completed') bg-green-100 text-green-700
                    @elseif($order->status === 'pending') bg-yellow-100 text-yellow-700
                    @elseif($order->status === 'cancelled') bg-red-100 text-red-700
                    @else bg-gray-100 text-gray-700
                    @endif">
                    {{ ucfirst($order->status) }}
                </span>
            </p>
            <p class="text-sm text-gray-700 mb-3"><strong>Placed On:</strong> {{ $order->created_at->format('d M Y, H:i') }}</p>

            <div class="mt-4">
                <a href="{{ route('admin.orders.show', $order) }}"
                   class="inline-block px-4 py-2 bg-pink-500 text-white rounded hover:bg-pink-600 text-sm">
                   View Order
                </a>
            </div>
        </div>
    @empty
        <p class="text-gray-500 text-sm">No orders found.</p>
    @endforelse
</div>


        {{-- Pagination --}}
        <div class="mt-6">
            {{ $orders->links() }}
        </div>
    </section>
</x-layout>
