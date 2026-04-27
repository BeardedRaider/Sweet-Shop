<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Image;

class ProductController extends Controller
{
    // Show all products (with sorting)
    public function index()
    {
        $query = Product::with('images');

        if (request('search')) {
            $query->where('name', 'like', '%' . request('search') . '%');
        }

        switch (request('sort')) {
            case 'price_asc':
                $query->orderBy('price', 'asc');
                break;

            case 'price_desc':
                $query->orderBy('price', 'desc');
                break;

            case 'name_asc':
                $query->orderBy('name', 'asc');
                break;

            case 'name_desc':
                $query->orderBy('name', 'desc');
                break;
        }

        $products = $query->get();

        return view('products.index', compact('products'));
    }

    // Auto-suggest endpoint
    public function suggest(Request $request)
    {
        $search = $request->get('q', '');

        if (strlen($search) < 2) {
            return response()->json([]);
        }

        $results = Product::where('name', 'like', "%{$search}%")
            ->limit(5)
            ->pluck('name');

        return response()->json($results);
    }

    // Show create form
    public function create()
    {
        return view('products.create');
    }

    // Store product
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'        => 'required|string|max:255',
            'description' => 'nullable|string',
            'price'       => 'required|numeric',
            'stock'       => 'required|integer',
            'image'       => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $product = Product::create($validated);

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
        $product->load('images');
        return view('products.edit', compact('product'));
    }

    // Update product
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
