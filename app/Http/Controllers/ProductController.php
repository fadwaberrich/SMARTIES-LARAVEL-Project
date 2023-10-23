<?php

namespace App\Http\Controllers;

use App\Models\Annonce;
use App\Models\ReviewRating;
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
        $validatedData = $request->validate([
            'product_name' => 'required|string|max:255',
            'weight' => 'required|numeric',
            'price' => 'required|numeric',
            'units' => 'required|string|max:255',
            'description' => 'required|string',
            'address' => 'required|string|max:255',
            'photo' => 'required|image',
            'annonce_id' => 'required',
        ], [
            'product_name.required' => 'The product name is required.',
            'product_name.string' => 'The product name must be a string.',
            'product_name.max' => 'The product name may not be greater than :max characters.',
            
            'weight.required' => 'The weight is required.',
            'weight.numeric' => 'The weight must be a number.',
            
            'price.required' => 'The price is required.',
            'price.numeric' => 'The price must be a number.',
            
            'units.required' => 'The units are required.',
            'units.string' => 'The units must be a string.',
            'units.max' => 'The units may not be greater than :max characters.',
            
            'description.string' => 'The description must be a string.',
            'description.required' => 'The description is required',
            'description.max' => 'The description may not be greater than :max characters.',

            
            'address.string' => 'The address must be a string.',
            'address.max' => 'The address may not be greater than :max characters.',
            'address.required' => 'The adress is required',

            'photo.image' => 'The file must be an image.',
            'photo.required'=>'The image is required'
            
        ]);
    
        if ($request->hasFile('photo')) {
            $imagePath = $request->file('photo')->store('annonce_photos', 'public');
            $validatedData['photo'] = $imagePath;
        }
    
        $product = Product::create($validatedData);
        $product->save();
    
        return redirect()->route('products.index')->with('success', 'Product created successfully.');
    }
    
    

    // Display the specified product
    public function show(Product $product)
    {
        $product = $product->load('reviews');

          $ratingsCount = ReviewRating::where('product_id', $product->id)
        ->selectRaw('star_rating, COUNT(*) as count')
        ->groupBy('star_rating')
        ->pluck('count', 'star_rating');

    return view('products.show', compact('product', 'ratingsCount'));
    }
    

    // Show the form for editing the specified product
    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }

    // Update the specified product in the database
    public function update(Request $request, Product $product)
    {
        try {
    
            $validatedData = $request->validate([
                'product_name' => 'required|string|max:255',
                'weight' => 'required|numeric',
                'price' => 'required|numeric',
                'units' => 'required|string|max:255',
                'description' => 'required|string',
                'address' => 'required|string|max:255',
                'photo' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
               
            ], [
                'product_name.required' => 'The product name is required.',
                'product_name.string' => 'The product name must be a string.',
                'product_name.max' => 'The product name may not be greater than :max characters.',
            
                'weight.required' => 'The weight is required.',
                'weight.numeric' => 'The weight must be a number.',
            
                'price.required' => 'The price is required.',
                'price.numeric' => 'The price must be a number.',
            
                'units.required' => 'The units are required.',
                'units.string' => 'The units must be a string.',
                'units.max' => 'The units may not be greater than :max characters.',
            
                'description.required' => 'The description is required.',
                'description.string' => 'The description must be a string.',
            
                'address.required' => 'The address is required.',
                'address.string' => 'The address must be a string.',
                'address.max' => 'The address may not be greater than :max characters.',
            
                'image.required' => 'The image is required.',
                'image.image' => 'The file must be an image.',
                'image.mimes' => 'The image must be of type: :mimes.',
                'image.max' => 'The image may not be greater than :max kilobytes.',
            ]);
    
        
    
            if ($request->hasFile('photo')) {
                $imagePath = $request->file('photo')->store('annonce_photos', 'public');
                $validatedData['photo'] = $imagePath;
            }
    
            $product->update($validatedData);
    
            return redirect()->route('products.index')
                ->with('success', 'Product updated successfully.');
        } catch (\Exception $e) {
            // Log the exception for further investigation
            \Log::error($e);
    
            // Return a response or redirect as needed
            return view('products.edit', compact('product'));
        }
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
