<x-layout :title="'My Orders'">
    <section class="max-w-4xl mx-auto bg-white shadow rounded p-6 mt-10">
        <h1 class="text-2xl font-bold text-pink-700 mb-6">Order History</h1>

        @if($orders->isEmpty())
            <p class="text-gray-600">You have no previous orders.</p>
        @else
            <table class="w-full bg-white shadow rounded">
                <thead>
                    <tr class="bg-pink-100 text-pink-700">
                        <th class="px-4 py-2 text-left">Order #</th>
                        <th class="px-4 py-2 text-left">Date</th>
                        <th class="px-4 py-2 text-left">Total</th>
                        <th class="px-4 py-2 text-left">Status</th>
                        <th class="px-4 py-2 text-left">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($orders as $order)
                        <tr>
                            <td class="border px-4 py-2">{{ $order->id }}</td>
                            <td class="border px-4 py-2">{{ $order->created_at->format('d M Y') }}</td>
                            <td class="border px-4 py-2">£{{ number_format($order->total, 2) }}</td>
                            <td class="border px-4 py-2">
                                <span class="
                                    px-2 py-1 rounded text-sm
                                    @if($order->status === 'completed') bg-green-100 text-green-700
                                    @elseif($order->status === 'pending') bg-yellow-100 text-yellow-700
                                    @else bg-gray-100 text-gray-700
                                    @endif
                                ">
                                    {{ ucfirst($order->status) }}
                                </span>
                            </td>
                            <td class="border px-4 py-2">
                                <a href="{{ route('account.orders.show', $order) }}" 
                                   class="text-blue-600 hover:underline">View</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif

        <div class="mt-6">
            <a href="{{ route('account') }}" 
               class="px-4 py-2 bg-gray-200 text-black rounded hover:bg-gray-300">
                Back to My Account
            </a>
        </div>
    </section>
</x-layout>
