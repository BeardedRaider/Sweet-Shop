<x-layout :title="'Checkout'">
    <section class="max-w-2xl mx-auto bg-white shadow rounded p-6 mt-10">
        <h1 class="text-2xl font-bold text-pink-700 mb-6">Checkout</h1>

        {{-- Cart summary --}}
        <div class="mb-6">
            <h2 class="text-lg font-semibold mb-2">Your Cart</h2>

            {{-- Pull cart from session. Controller stores product_id => quantity (integer). --}}
            @php $cart = session('cart', []); @endphp

            @if(empty($cart))
                {{-- If cart is empty, show message --}}
                <p class="text-gray-700">Your cart is empty.</p>
            @else
                <ul class="divide-y divide-pink-200">
                    {{-- Initialise total accumulator --}}
                    @php $total = 0; @endphp

                    {{-- Loop through cart entries: $id = product_id, $quantity = integer --}}
                    @foreach($cart as $id => $quantity)
                        {{-- Look up product details fresh from DB using the ID --}}
                        @php 
                            $product = \App\Models\Product::find($id); 
                            $qty = is_numeric($quantity) ? (int)$quantity : 0; 
                        @endphp

                        {{-- Only render if product exists and quantity is valid --}}
                        @if($product && $qty > 0)
                            {{-- Calculate line total for this product --}}
                            @php 
                                $lineTotal = $product->price * $qty; 
                                $total += $lineTotal; 
                            @endphp

                            <li class="py-2 flex justify-between">
                                {{-- Show product name and quantity --}}
                                <span>{{ $product->name }} (x{{ $qty }})</span>
                                {{-- Show line total price --}}
                                <span>£{{ number_format($lineTotal, 2) }}</span>
                            </li>
                        @endif
                    @endforeach
                </ul>

                {{-- Cart total --}}
                <p class="mt-4 text-right font-bold text-pink-700">
                    Total: £{{ number_format($total, 2) }}
                </p>
            @endif
        </div>

        {{-- Billing/shipping form --}}
        <div class="mb-6">
            <h2 class="text-lg font-semibold mb-2">Billing Details</h2>
            <form>
                {{-- Name field --}}
                <div class="mb-4">
                    <label class="block text-pink-700">Name</label>
                    <input type="text" class="w-full border rounded px-3 py-2" placeholder="Your Name">
                </div>

                {{-- Address field --}}
                <div class="mb-4">
                    <label class="block text-pink-700">Address</label>
                    <input type="text" class="w-full border rounded px-3 py-2" placeholder="Street Address">
                </div>

                {{-- Payment method dropdown --}}
                <div class="mb-4">
                    <label class="block text-pink-700">Payment Method</label>
                    <select class="w-full border rounded px-3 py-2">
                        <option>Credit Card</option>
                        <option>PayPal</option>
                        <option>Gift Card</option>
                    </select>
                </div>

                {{-- Submit button --}}
                <button type="submit" class="w-full bg-pink-500 text-white py-2 rounded hover:bg-pink-600">
                    Place Order
                </button>
            </form>
        </div>
    </section>
</x-layout>

