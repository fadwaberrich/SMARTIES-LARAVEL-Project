<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Venue;

class EventController extends Controller
{
  
        public function index()
        {
            $events = Event::all();
            return view('events.index', compact('events'));
        }
    
        public function create()
        {
            $venues = Venue::all();
            return view('events.create',compact('venues'));
        }
    
        public function store(Request $request)
        {
            $rules = [
                'name' => 'required|string',
                'description' => 'required|string',
                'date' => 'required|date',
                'location' => 'required|string',
                'ticket_price' => 'required|numeric|min:0',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
                'status' => 'required|in:upcoming,ongoing,past,canceled',
                'venue_id' => 'required|exists:venues,id',
            ];
        
            // Custom error messages
            $customMessages = [
                'name.required' => 'The name field is required.',
                'date.date' => 'The date must be a valid date.',
                'ticket_price.numeric' => 'The ticket price must be a numeric value.',
                'ticket_price.min' => 'The ticket price must be a positive number or zero.',
                'image.image' => 'The image must be a valid image file.',
                'image.mimes' => 'The image must be in one of the following formats: jpeg, png, jpg, gif.',
                'image.max' => 'The image file size cannot exceed 2MB.',
                'status.in' => 'The status must be one of: upcoming, ongoing, past, canceled.',
                'venue_id.exists' => 'The selected venue does not exist.',
            ];
        
            // Validate the request with custom error messages
            $request->validate($rules, $customMessages);
            // Handle the image upload
            if ($request->hasFile('image')) {
                $imagePath = $request->file('image')->store('events', 'public');
            } else {
                $imagePath = null;
            }
            // Create a new Event record with the 'venue_id' field
            $event = new Event([

                'name' => $request->input('name'),
                'description' => $request->input('description'),
                'date' => $request->input('date'),
                'location' => $request->input('location'),
                'ticket_price' => $request->input('ticket_price'),
                'image' => $imagePath,
                'status' => $request->input('status'),
                'venue_id' => $request->input('venue_id'), // Set the venue_id
            ]);
            $event->save();
        
            return redirect()->route('events.index');
        }
        
    
        public function show($id)
        {
            $event = Event::findOrFail($id);
            return view('events.show', compact('event'));
        }
    
        public function edit($id)
        {
            $event = Event::findOrFail($id);
            return view('events.edit', compact('event'));
        }
    
        public function update(Request $request, $id)
        {
            $event = Event::findOrFail($id);
            $event->update($request->all());
            return redirect()->route('events.index');
        }
    
        public function destroy($id)
        {
            $event = Event::findOrFail($id);
            $event->delete();
            return redirect()->route('events.index');
        }
    }
