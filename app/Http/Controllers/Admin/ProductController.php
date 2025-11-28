<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request; // Added for handling HTTP requests
use App\Models\Image; // Added for image handling

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        return view('admin.products.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'        => 'required|string|max:255',
            'description' => 'nullable|string',
            'price'       => 'required|numeric|min:0',
            'stock'       => 'required|integer|min:0',
            'image'       => 'nullable|image|mimes:jpg,jpeg,png|max:10240',
        ]);

        $product = Product::create($validated);

        // Handle image upload if present
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('images/products', 'public');

            $product->images()->create([
                'path'     => $path,
                'alt_text' => $product->name,
            ]);
        }

        return redirect()->route('admin.products.index')
                        ->with('success', 'Product created successfully!');
    }

    public function edit(Product $product)
    {
        // Show the edit form for a specific product
        return view('admin.products.edit', compact('product'));
    }

    public function update(Request $request, Product $product)
    {
    $validated = $request->validate([
        'name'        => 'required|string|max:255',
        'description' => 'nullable|string',
        'price'       => 'required|numeric|min:0',
        'stock'       => 'required|integer|min:0',
        'image'       => 'nullable|image|mimes:jpg,jpeg,png|max:10240',
    ]);

    $product->update($validated);

    // Handle new image upload
    if ($request->hasFile('image')) {
        $path = $request->file('image')->store('images/products', 'public');

        $product->images()->create([
            'path'     => $path,
            'alt_text' => $product->name,
        ]);
    }

    return redirect()->route('admin.products.edit', $product)
                     ->with('success', 'Product updated successfully!');
}

    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('admin.products.index')
                         ->with('success', 'Product deleted successfully!');
    }

    // New method to delete an image
    public function deleteImage(Image $image)
{
    // Optionally delete the file from storage too
    if ($image->path && \Storage::disk('public')->exists($image->path)) {
        \Storage::disk('public')->delete($image->path);
    }

    $image->delete();

    return redirect()->back()->with('success', 'Image deleted successfully!');
}
}
