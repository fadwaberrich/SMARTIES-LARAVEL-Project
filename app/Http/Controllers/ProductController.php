<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Http\ReviewController;

class ProductController extends Controller
{
    // Display a listing of products
    public function index()
    {
        $products = Product::all();
        return view('products.index', compact('products'));
    }

    // Show the form for creating a new product
    public function create()
    {
        return view('products.create');
    }

    // Store a newly created product in the database
    public function store(Request $request)
    {
        try {
        // Debugging: Dump the contents of the $request object
    
        // Validate and store product data
        $request->validate([
            'product_name' => 'required|string|max:255',
        
        ]);
    
        $product = Product::create($request->all());
        } catch (\Exception $e) {
        dd($e->getMessage());
    }

        return redirect()->route('products.index')
            ->with('success', 'Product created successfully.');
            
    }
    

    // Display the specified product
    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }

    // Show the form for editing the specified product
    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }

    // Update the specified product in the database
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'product_name' => 'required|string|max:255',
            'weight' => 'required|numeric',
            'category' => 'required|string|max:255',
            'price' => 'required|numeric',
            'units' => 'required|string|max:255',
            'description' => 'nullable|string',
            'address' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $product->update($request->all());

        return redirect()->route('products.index')
            ->with('success', 'Product updated successfully.');
    }

    // Remove the specified product from the database
    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('products.index')
            ->with('success', 'Product deleted successfully.');
    }
}
