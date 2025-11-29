<x-layout :title="'Checkout'">
    <section class="max-w-2xl mx-auto bg-white shadow rounded p-6 mt-10">
        <h1 class="text-2xl font-bold text-pink-700 mb-6">Checkout</h1>

        {{-- Cart summary --}}
        <div class="mb-6">
            <h2 class="text-lg font-semibold mb-2">Your Cart</h2>

            @php $cart = session('cart', []); @endphp

            @if(empty($cart))
                <p class="text-gray-700">Your cart is empty.</p>
            @else
                <ul class="divide-y divide-pink-200">
                    @foreach($cart as $id => $item)
                        <li class="py-2 flex justify-between">
                            <span>{{ $item['name'] }} (x{{ $item['quantity'] }})</span>
                            <span class="font-bold text-pink-600">
                                £{{ number_format($item['price'] * $item['quantity'], 2) }}
                            </span>
                        </li>
                    @endforeach
                </ul>

                {{-- Cart total --}}
                <p class="mt-4 text-right font-bold text-pink-700">
                    Total: £{{ number_format(collect($cart)->sum(fn($i) => $i['price'] * $i['quantity']), 2) }}
                </p>
            @endif
        </div>

        {{-- Billing/shipping form --}}
        <div class="mb-6">
            <h2 class="text-lg font-semibold mb-2">Billing Details</h2>
            <form>
                <div class="mb-4">
                    <label class="block text-pink-700">Name</label>
                    <input type="text" class="w-full border rounded px-3 py-2" placeholder="Your Name">
                </div>
                <div class="mb-4">
                    <label class="block text-pink-700">Address</label>
                    <input type="text" class="w-full border rounded px-3 py-2" placeholder="Street Address">
                </div>
                <div class="mb-4">
                    <label class="block text-pink-700">Payment Method</label>
                    <select class="w-full border rounded px-3 py-2">
                        <option>Credit Card</option>
                        <option>PayPal</option>
                        <option>Gift Card</option>
                    </select>
                </div>
                <button type="submit" class="w-full bg-pink-500 text-white py-2 rounded hover:bg-pink-600">
                    Place Order
                </button>
            </form>
        </div>
    </section>
</x-layout>
