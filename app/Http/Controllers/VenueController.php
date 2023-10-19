<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Venue;

class VenueController extends Controller
{
    public function index()
    {
        $venues = Venue::all();
        return view('venues.index', compact('venues'));
    }

    public function create()
    {
        return view('venues.create');
    }

    public function store(Request $request)
    {
        // Validation rules for the form fields
        $rules = [
            'name' => 'required|string',
            'address' => 'required|string',
            'capacity' => 'required|integer|min:0', // Capacity must be an integer and positive or zero
            'description' => 'required|string',
            'website' => 'nullable|url',
            'phone' => 'nullable|string',
            'email' => 'nullable|email',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Image rules
            // Add other validation rules for additional form fields
        ];
    
        // Custom error messages
        $customMessages = [
            'capacity.integer' => 'The capacity must be an integer value.',
            'capacity.min' => 'The capacity must be a positive number or zero.',
            'image.image' => 'The file must be an image.',
            'image.mimes' => 'The image must be in one of the following formats: jpeg, png, jpg, gif.',
            'image.max' => 'The image file size cannot exceed 2MB.',
            // Add custom error messages for other fields as needed
        ];
    
        $request->validate($rules, $customMessages);
    
        // Handle the image upload
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('venues', 'public'); // Store the image in the "public" disk under the "venues" directory
        } else {
            $imagePath = null;
        }
    
        // Create a new Venue record with the "image" field
        $venue = new Venue([
            'name' => $request->input('name'),
            'address' => $request->input('address'),
            'capacity' => $request->input('capacity'),
            'description' => $request->input('description'),
            'website' => $request->input('website'),
            'phone' => $request->input('phone'),
            'email' => $request->input('email'),
            'image' => $imagePath,
        ]);
        $venue->save();
    
        return redirect()->route('venuess.index')
            ->with('success', 'Venue created successfully.');
    }
    

    public function show($id)
    {
        $venue = Venue::findOrFail($id);
        return view('venues.show', compact('venue'));
    }

    public function edit($id)
    {
        $venue = Venue::findOrFail($id);
        return view('venues.edit', compact('venue'));
    }

    public function update(Request $request, $id)
    {
        $venue = Venue::findOrFail($id);
        $venue->update($request->all());
        return redirect()->route('venuess.index');
    }

    public function destroy($id)
    {
        $venue = Venue::findOrFail($id);
        $venue->delete();
        return redirect()->route('venuess.index');
    }
}
