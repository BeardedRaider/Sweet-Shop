<x-layout :title="'Order Details'">
    <section class="bg-pink-50 border border-pink-200 shadow rounded-lg p-6 max-w-3xl mx-auto">
        <h1 class="text-2xl font-bold text-pink-700 mb-6">
            Order #{{ $order->id }}
        </h1>

        {{-- Order details --}}
        <div class="space-y-2 text-sm text-gray-700 mb-6">
            <p><strong>Customer:</strong> {{ $order->name ?? '—' }}</p>
            <p><strong>Address:</strong> {{ $order->address ?? '—' }}</p>
            <p><strong>Payment Method:</strong> {{ ucfirst($order->method) }}</p>
            <p><strong>Total:</strong> £{{ number_format($order->total, 2) }}</p>
            <p><strong>Status:</strong>
                <span class="inline-block px-2 py-1 rounded text-xs font-semibold
                    @if($order->status === 'completed') bg-green-100 text-green-700
                    @elseif($order->status === 'pending') bg-yellow-100 text-yellow-700
                    @elseif($order->status === 'cancelled') bg-red-100 text-red-700
                    @else bg-gray-100 text-gray-700
                    @endif">
                    {{ ucfirst($order->status) }}
                </span>
            </p>
            <p><strong>Placed On:</strong> {{ $order->created_at->format('d M Y, H:i') }}</p>
        </div>

        {{-- Admin actions --}}
@if($order->status === 'pending')
    <h2 class="text-lg font-semibold text-pink-700 mb-3">Update Status</h2>
    <div>
        {{-- Complete button --}}
        <form action="{{ route('admin.orders.updateStatus', $order) }}" method="POST" class="inline-block mr-3">
            @csrf
            @method('PUT')
            <input type="hidden" name="status" value="completed">
            <button type="submit"
                class="inline-block px-4 py-2 bg-pink-500 text-white rounded hover:bg-pink-600 text-sm">
                ✔ Mark Completed
            </button>
        </form>

        {{-- Decline button --}}
        <form action="{{ route('admin.orders.updateStatus', $order) }}" method="POST" class="inline-block">
            @csrf
            @method('PUT')
            <input type="hidden" name="status" value="cancelled">
            <button type="submit"
                class="inline-block px-4 py-2 bg-pink-500 text-white rounded hover:bg-pink-600 text-sm">
                ✖ Decline Order
            </button>
        </form>
    </div>
@endif


        {{-- Back link --}}
        <div class="mt-6">
            <a href="{{ route('admin.orders.index') }}" 
               class="inline-block px-4 py-2 bg-gray-200 text-black rounded hover:bg-gray-300 text-sm">
                Back to Orders
            </a>
        </div>
    </section>
</x-layout>
