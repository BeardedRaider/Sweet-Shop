<x-layout :title="'Checkout'">
    <section class="max-w-2xl mx-auto bg-white shadow rounded p-6 mt-10">
        <h1 class="text-2xl font-bold text-pink-700 mb-6">Checkout</h1>

        {{-- Placeholder: show cart summary --}}
        <div class="mb-6">
            <h2 class="text-lg font-semibold mb-2">Your Cart</h2>
            <p class="text-gray-700">Cart functionality will be added here.</p>
        </div>

        {{-- Placeholder: show billing/shipping form --}}
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
