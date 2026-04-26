<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Image;

class ProductController extends Controller
{
    /**
     * Public product controller.
     *
     * Handles listing, creating and updating products for the public/admin
     * sections where appropriate. Methods use Eloquent models and simple
     * validation; image uploads are stored to the `public` disk.
     */
    // Show all products
    public function index()
    {
        // Eager-load images so each product has its images available
        $products = Product::with('images')->get();
        return view('products.index', compact('products'));
    }

    // Show create form
    public function create()
    {
        return view('products.create');
    }

    // Store product with optional image upload
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'        => 'required|string|max:255',
            'description' => 'nullable|string',
            'price'       => 'required|numeric',
            'stock'       => 'required|integer',
            'image'       => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // Create product
        $product = Product::create($validated);

        // If an image was uploaded, store it and create an Image record
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('images/products', 'public');

            Image::create([
                'product_id' => $product->id,
                'path'       => $path,
                'alt_text'   => $product->name,
            ]);
        }

        return redirect()->route('admin.products.index')
                         ->with('success', 'Product created successfully.');
    }

    // Show edit form
    public function edit(Product $product)
    {
        // Load images for this product so they can be displayed/edited
        $product->load('images');
        return view('products.edit', compact('product'));
    }

    // Update product with optional new image upload
    public function update(Request $request, Product $product)
    {
        $validated = $request->validate([
            'name'        => 'required|string|max:255',
            'description' => 'nullable|string',
            'price'       => 'required|numeric',
            'stock'       => 'required|integer',
            'image'       => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $product->update($validated);

        // If a new image was uploaded, store it and attach to product
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('images/products', 'public');

            Image::create([
                'product_id' => $product->id,
                'path'       => $path,
                'alt_text'   => $product->name,
            ]);
        }

        return redirect()->route('admin.products.index')
                         ->with('success', 'Product updated successfully.');
    }
}

