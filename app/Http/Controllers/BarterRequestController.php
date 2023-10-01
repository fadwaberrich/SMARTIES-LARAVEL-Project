<?php

namespace App\Http\Controllers;

use App\Models\BarterRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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
        // Validation rules for the form fields
        $rules = [
            'message' => 'required|string',
            'barter_id' => 'nullable|exists:barters,id', // Assuming barter_id should exist in the barters table
            'user_id' => 'nullable|exists:users,id', // Assuming user_id should exist in the users table
        ];
    
        $request->validate($rules);
    
        // Create a new BarterRequest record
        BarterRequest::create($request->all());
    
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
  // Validation rules for the form fields
  $rules = [
    'message' => 'required', // Add your specific validation rules here
    'barter_id' => 'nullable|exists:barters,id',
    'user_id' => 'nullable|exists:users,id',
];

// Validate the request data
$request->validate($rules);

// Update the BarterRequest record
$barterRequest->update($request->all());

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
