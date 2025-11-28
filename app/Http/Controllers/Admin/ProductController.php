<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Image;
use Illuminate\Support\Facades\Log; // Import Log facade for logging

class ProductController extends Controller
{
    // Show all products in admin index
    public function index()
    {
        $products = Product::all();
        return view('admin.products.index', compact('products'));
    }

    // Show create form
    public function create()
    {
        return view('admin.products.create');
    }

    // Store new product
    public function store(Request $request)
    {
        // Validate input including image size/type
        $validated = $request->validate([
            'name'        => 'required|string|max:255',
            'description' => 'nullable|string',
            'price'       => 'required|numeric|min:0',
            'stock'       => 'required|integer|min:0',
            'image'       => 'nullable|image|mimes:jpg,jpeg,png|max:10240',
        ]);

        // Create product record
        $product = Product::create($validated);

        // Handle image upload if present
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('images/products', 'public');

            $product->images()->create([
                'path'     => $path,
                'alt_text' => $product->name,
            ]);

            // Log upload event
            Log::info('Image uploaded', [
                'product_id' => $product->id,
                'path'       => $path,
                'user_id'    => auth()->id(),
            ]);
        }

        return redirect()->route('admin.products.index')
                         ->with('success', 'Product created successfully!');
    }

    // Show edit form
    public function edit(Product $product)
    {
        return view('admin.products.edit', compact('product'));
    }

    // Update product
    public function update(Request $request, Product $product)
    {
        // Validate input
        $validated = $request->validate([
            'name'        => 'required|string|max:255',
            'description' => 'nullable|string',
            'price'       => 'required|numeric|min:0',
            'stock'       => 'required|integer|min:0',
            'image'       => 'nullable|image|mimes:jpg,jpeg,png|max:10240',
        ]);

        // Update product record
        $product->update($validated);

        // Handle new image upload
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('images/products', 'public');

            $product->images()->create([
                'path'     => $path,
                'alt_text' => $product->name,
            ]);

            // Log upload event
            Log::info('Image uploaded', [
                'product_id' => $product->id,
                'path'       => $path,
                'user_id'    => auth()->id(),
            ]);
        }

        return redirect()->route('admin.products.edit', $product)
                         ->with('success', 'Product updated successfully!');
    }

    // Delete product
    public function destroy(Product $product)
    {
        $product->delete();

        Log::info('Product deleted', [
            'product_id' => $product->id,
            'user_id'    => auth()->id(),
        ]);

        return redirect()->route('admin.products.index')
                         ->with('success', 'Product deleted successfully!');
    }

    // Delete an image
    public function deleteImage(Image $image)
    {
        // Delete file from storage if exists
        if ($image->path && \Storage::disk('public')->exists($image->path)) {
            \Storage::disk('public')->delete($image->path);

            // Log file deletion
            Log::info('Image file deleted from storage', [
                'image_id'   => $image->id,
                'path'       => $image->path,
                'user_id'    => auth()->id(),
            ]);
        }

        // Delete DB record
        $image->delete();

        // Log DB record deletion
        Log::info('Image record deleted from database', [
            'image_id'   => $image->id,
            'product_id' => $image->product_id,
            'user_id'    => auth()->id(),
        ]);

        return redirect()->back()->with('success', 'Image deleted successfully!');
    }
}
