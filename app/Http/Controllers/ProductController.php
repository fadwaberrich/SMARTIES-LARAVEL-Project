<?php

namespace App\Http\Controllers;

use App\Models\Annonce;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    // Display a listing of products
    public function index()
    {
        $products = Product::all();
        return view('products.index', compact('products'));
    }

    // Show the form for creating a new product
    public function create(Request $request)
    {
        $Annonce = Annonce::find($request->annonce_id);
        return view('products.create',compact('Annonce'));;
    }

    // Store a newly created product in the database
    public function store(Request $request)
    {
         $request->validate([
            'product_name' => 'required|string|max:255',
            'weight' => 'required|numeric',
            'category' => 'required|string|max:255',
            'price' => 'required|numeric',
            'units' => 'required|string|max:255',
            'description' => 'nullable|string',
            'address' => 'nullable|string|max:255',
            'photo' => 'nullable|image',
        ]);
    
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('produits_photos', 'public');
            $request['image'] = $imagePath;
        }

      
    
        $product = new Product($request->all());
        $product->save();
    
        return redirect()->route('products.index')->with('success', 'Product created successfully.');
    }
    
    

    // Display the specified product
    public function show(Product $product)
    {
        $product = $product->load('reviews');
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

    public function showReviews(Product $product)
    {
        // Load reviews related to the product
        $reviews = $product->reviews;

        return view('products.reviews', compact('product', 'reviews'));
    }
}
