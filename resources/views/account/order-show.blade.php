<x-layout :title="'Order Details'">
    <section class="max-w-3xl mx-auto bg-white shadow rounded p-6 mt-10">
        <h1 class="text-2xl font-bold text-pink-700 mb-6">Order #{{ $order->id }}</h1>

        {{-- Order metadata --}}
        <div class="space-y-2 mb-6">
            <p><span class="font-semibold text-pink-700">Date:</span> {{ $order->created_at->format('d M Y') }}</p>
            <p><span class="font-semibold text-pink-700">Total:</span> £{{ number_format($order->total, 2) }}</p>
            <p><span class="font-semibold text-pink-700">Status:</span>
                <span class="
                    px-2 py-1 rounded text-sm
                    @if($order->status === 'completed') bg-green-100 text-green-700
                    @elseif($order->status === 'pending') bg-yellow-100 text-yellow-700
                    @elseif($order->status === 'cancelled') bg-red-100 text-red-700
                    @else bg-gray-100 text-gray-700
                    @endif
                ">
                    {{ ucfirst($order->status) }}
                </span>
            </p>
        </div>

        {{-- Order items --}}
        <table class="w-full bg-white shadow rounded mb-6">
            <thead>
                <tr class="bg-pink-100 text-pink-700">
                    <th class="px-4 py-2 text-left">Product</th>
                    <th class="px-4 py-2 text-left">Quantity</th>
                    <th class="px-4 py-2 text-left">Price</th>
                    <th class="px-4 py-2 text-left">Subtotal</th>
                </tr>
            </thead>
            <tbody>
                @php $calculatedTotal = 0; @endphp
                @foreach($order->items as $item)
                    @php $subtotal = $item->quantity * $item->price; $calculatedTotal += $subtotal; @endphp
                    <tr>
                        <td class="border px-4 py-2">{{ $item->product->name }}</td>
                        <td class="border px-4 py-2">{{ $item->quantity }}</td>
                        <td class="border px-4 py-2">£{{ number_format($item->price, 2) }}</td>
                        <td class="border px-4 py-2">£{{ number_format($subtotal, 2) }}</td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr class="bg-gray-100 font-semibold">
                    <td colspan="3" class="px-4 py-2 text-right">Calculated Total:</td>
                    <td class="px-4 py-2">£{{ number_format($calculatedTotal, 2) }}</td>
                </tr>
            </tfoot>
        </table>

        <div class="flex justify-between">
            <a href="{{ route('account.orders') }}" 
               class="px-4 py-2 bg-gray-200 text-black rounded hover:bg-gray-300">
                Back to Orders
            </a>
        </div>
    </section>
</x-layout>

