<?php

namespace App\Http\Controllers;

use App\Models\ResponseToRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BarterRequest;
class ResponseController extends Controller
{
    /**
     * Display a listing of the responses.
     */
    public function index()
    {
        $responses = ResponseToRequest::latest()->get();

        // Pass the responses to the view
        return view("responses.index", compact("responses"));
    }

    /**
     * Show the form for creating a new response.
     */
    public function create()
    {
        $barterRequests = BarterRequest::all();

        return view('responses.create', compact('barterRequests'));
    }

    /**
     * Store a newly created response in storage.
     */
    public function store(Request $request)
    {
        // Define validation rules for creating a response
        $rules = [
            'message' => 'required|string',
            'status' => 'required',
            'barter_request_id' => 'required|exists:barter_requests,id',
            // Add more validation rules for other fields if needed
        ];

        // Custom error messages for validation
        $customMessages = [
            'barter_request_id.exists' => 'The selected barter request is invalid.',
            // Add custom error messages for other fields as needed
        ];

        // Validate the request data
        $request->validate($rules, $customMessages);

        // Store the response data in the database
        ResponseToRequest::create($request->all());

        return redirect()->route('responses.index')
            ->with('success', 'Response created successfully.');
    }


    /**
     * Display the specified response.
     */
    public function show(ResponseToRequest $response)
    {
        return view('responses.show', compact('response'));
    }

    /**
     * Show the form for editing the specified response.
     */
    public function edit(ResponseToRequest $response)
    {
        $barterRequests = BarterRequest::all();

        return view('responses.edit', compact('response','barterRequests'));
    }

    /**
     * Update the specified response in storage.
     */
    public function update(Request $request, ResponseToRequest $response)
    {
        // Define validation rules for updating a response
        $rules = [
            'message' => 'required|string',
            'barter_request_id' => 'required|exists:barter_requests,id',
            // Add more validation rules for other fields if needed
        ];

        // Custom error messages for validation
        $customMessages = [
            'barter_request_id.exists' => 'The selected barter request is invalid.',
            // Add custom error messages for other fields as needed
        ];

        // Validate the request data
        $request->validate($rules, $customMessages);

        // Update the response data in the database
        $response->update($request->all());

        return redirect()->route('responses.index')
            ->with('success', 'Response updated successfully.');
    }

    /**
     * Remove the specified response from storage.
     */
    public function destroy(ResponseToRequest $response)
    {
        $response->delete();

        return redirect()->route('responses.index')
            ->with('success', 'Response deleted successfully.');
    }
}
