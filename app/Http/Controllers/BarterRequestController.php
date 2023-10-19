<?php

namespace App\Http\Controllers;

use App\Models\BarterRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BarterRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $barterRequests = BarterRequest::latest()->get();

        // On transmet les Post à la vue
        return view("barterRequests.index", compact("barterRequests"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('barterRequests.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validation rules for the form fields in the update method
        $rules = [
            'message' => 'required|string',
            'title' => 'required|string',
            'price' => 'required|numeric|min:0', // Price must be numeric and positive or zero
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Image rules
            // Add other validation rules for additional form fields
        ];

        // Custom error messages for the update method
        $customMessages = [
            'price.numeric' => 'The price must be a numeric value.',
            'price.min' => 'The price must be a positive number or zero.',
            'image.image' => 'The file must be an image.',
            'image.mimes' => 'The image must be in one of the following formats: jpeg, png, jpg, gif.',
            'image.max' => 'The image file size cannot exceed 2MB.',
            // Add custom error messages for other fields as needed
        ];

        $request->validate($rules, $customMessages);

        // Handle the image upload
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('barter_images', 'public'); // Store the image in the "public" disk under the "barter_images" directory
        } else {
            $imagePath = null;
        }

        // Create a new BarterRequest record with the "price" and "image" fields
        $barterRequest = new BarterRequest([
            'message' => $request->input('message'),
            'title' => $request->input('title'),
            'barter_id' => $request->input('barter_id'),
            'user_id' => $request->input('user_id'),
            'price' => $request->input('price'),
            'image' => $imagePath,
        ]);
        $barterRequest->save();

        return redirect()->route('barterRequests.index')
            ->with('success', 'Barter request created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(BarterRequest $barterRequest)
    {
        return view('barterRequests.show', compact('barterRequest'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BarterRequest $barterRequest)
    {
        return view('barterRequests.edit', compact('barterRequest'));
    }

    /**
     * Update the specified resource in storage.
     */

        public function update(Request $request, BarterRequest $barterRequest)
        {
            // Validation rules for the form fields, including "price" and "image"
            $rules = [
                'message' => 'required|string',
                'title' => 'required|string',
                'barter_id' => 'nullable|exists:barters,id',
                'user_id' => 'nullable|exists:users,id',
                'price' => 'required|numeric|min:0', // Assuming "price" is a numeric field
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Assuming "image" is an image file
            ];
        
            // Custom error messages for the update method
            $customMessages = [
                'price.numeric' => 'The price must be a numeric value.',
                'price.min' => 'The price must be a positive number or zero.',
                'image.image' => 'The file must be an image.',
                'image.mimes' => 'The image must be in one of the following formats: jpeg, png, jpg, gif.',
                'image.max' => 'The image file size cannot exceed 2MB.',
                // Add custom error messages for other fields as needed
            ];
        
            $request->validate($rules, $customMessages);
        
            // Handle the image upload if a new image is provided
            if ($request->hasFile('image')) {
                // Store the new image and get the path
                $imagePath = $request->file('image')->store('barter_images', 'public');
        
                // Delete the previous image if it exists
                if ($barterRequest->image) {
                    Storage::disk('public')->delete($barterRequest->image);
                }
            } else {
                // Use the existing image path if no new image is provided
                $imagePath = $barterRequest->image;
            }
        
            // Update the BarterRequest record with the new data
            $barterRequest->update([
                'message' => $request->input('message'),
                'title' => $request->input('title'),
                'barter_id' => $request->input('barter_id'),
                'user_id' => $request->input('user_id'),
                'price' => $request->input('price'),
                'image' => $imagePath,
            ]);
        
            return redirect()->route('barterRequests.index')
                ->with('success', 'Barter request updated successfully.');
        
}
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BarterRequest $barterRequest)
    {
        $barterRequest->delete();
    
        return redirect()->route('barterRequests.index')
            ->with('success', 'Barter request deleted successfully.');
    }
}
