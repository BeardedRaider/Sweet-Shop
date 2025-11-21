{{-- Product detail view
     - Uses `x-layout` so this content is injected into the layout's `$slot`.
     - Shows a single product's details passed from the controller as `$product`.
     - Keep the detail view focused on display; forms or purchase controls should be extracted
       into dedicated components for reusability. --}}
<x-layout>
    {{-- Main product container: constrains width and centers the content --}}
    <article class="max-w-xl mx-auto mt-10">
        {{-- Product title --}}
        <h1 class="text-2xl font-bold text-blue-700">{{ $product->name }}</h1>

        {{-- Full product description --}}
        <p class="mt-4 text-gray-700">{{ $product->description }}</p>

        {{-- Price display
             - `number_format` ensures currency is shown with two decimal places.
             - Consider using a localization/currency helper for multi-currency support. --}}
        <p class="mt-2 text-lg font-semibold">£{{ number_format($product->price, 2) }}</p>

        {{-- Navigation: back to products index using a named route --}}
        <a href="{{ route('products.index') }}" class="mt-6 inline-block text-blue-600 hover:underline">
            ← Back to Products
        </a>
    </article>
</x-layout>