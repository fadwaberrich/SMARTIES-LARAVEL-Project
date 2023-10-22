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
      //  $user = auth()->user();

       // if ($user) {
           // $user_id = $user->id;

           // $barterRequests = BarterRequest::where('user_id', $user_id)
            //    ->latest()
               // ->get();
      //  } else {
          //  $barterRequests = BarterRequest::latest()->get();
       // }
        $barterRequests = BarterRequest::latest()->get();

        // Pass the filtered BarterRequests to the view
        return view("barterRequests.index", compact("barterRequests"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $annonce_id = $request->query('annonce_id');
        session(['annonce_id' => $annonce_id]);

        return view('barterRequests.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        if (auth()->check()) {
            $user = auth()->user(); // Get the authenticated user
            $user_id = $user->id; // Get the user's ID
        }
        $annonce_id = session('annonce_id');

        // Validation rules for the form fields in the update method
        $rules = [
            'message' => 'required|string',
            'title' => 'required|string',
            // Add other validation rules for additional form fields
        ];

        // Custom error messages for the update method
        $customMessages = [
        ];

        $request->validate($rules, $customMessages);


        // Create a new BarterRequest record with the "price" and "image" fields
        $barterRequest = new BarterRequest([
            'message' => $request->input('message'),
            'title' => $request->input('title'),
            'barter_id' => $request->input('barter_id'),
            'user_id' => $request->input('user_id'),
        ]);

    $barterRequest->annonce_id = $annonce_id;
    $barterRequest->user_id = $user_id;

    $barterRequest->save();
    $request->session()->forget('annonce_id');

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
            ];

            // Custom error messages for the update method
            $customMessages = [

            ];

            $request->validate($rules, $customMessages);

            // Update the BarterRequest record with the new data
            $barterRequest->update([
                'message' => $request->input('message'),
                'title' => $request->input('title'),
                'barter_id' => $request->input('barter_id'),
                'user_id' => $request->input('user_id'),
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
