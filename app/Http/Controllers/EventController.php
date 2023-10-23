<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Mail;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Venue;
use Illuminate\Support\Facades\Validator;
use App\Models\User; // Import the User model
use App\Mail\EventCreated; // Import the mailable class
class EventController extends Controller
{

        public function index()
        {
            $events = Event::all();
            return view('events.index', compact('events'));
        }
        public function index2()
        {
            $events = Event::all();
            return view('events.index2', compact('events'));
        }
        public function create()
        {

            $venues = Venue::all();
            return view('events.create',compact('venues'));
        }

        public function store(Request $request)
        {
            // Define the validation rules
            $rules = [
                'name' => 'required|string',
                'description' => 'required|string',
                'date' => [
                    'required',
                    'date',
                    function ($attribute, $value, $fail) {
                        $today = now()->format('Y-m-d');
                        if ($value < $today) {
                            $fail("The $attribute must be today or a future date.");
                        }
                    },
                ],
                'location' => 'required|string',
                'ticket_price' => 'required|numeric|min:0',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
                'status' => 'required|in:upcoming,ongoing,past,canceled',
                'venue_id' => 'required|exists:venues,id',
            ];

            // Custom error messages
            $customMessages = [
                'name.required' => 'The name field is required.',
                // Add other custom error messages here
            ];

            // Validate the request with custom error messages
            $validator = Validator::make($request->all(), $rules, $customMessages);

            if ($validator->fails()) {
                return redirect()
                    ->route('events.create')
                    ->withErrors($validator)
                    ->withInput();
            }

            // Handle the image upload
            if ($request->hasFile('image')) {
                $imagePath = $request->file('image')->store('events_photos', 'public');
                $validatedData['photo'] = $imagePath;
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
                'image' => $validatedData['photo'],
                'status' => $request->input('status'),
                'venue_id' => $request->input('venue_id'), // Set the venue_id
            ]);

            $event->save();
 // Send email to all users
 $users = User::all(); // Assuming you have a User model
 $eventMail = new EventCreated($event); // Pass the event data to the mailable
 foreach ($users as $user) {
     Mail::to($user->email)->send($eventMail);
 }
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
            // Define the validation rules
            $rules = [
                'name' => 'required|string',
                'description' => 'required|string',
                'date' => [
                    'required',
                    'date',
                    function ($attribute, $value, $fail) {
                        $today = now()->format('Y-m-d');
                        if ($value < $today) {
                            $fail("The $attribute must be today or a future date.");
                        }
                    },
                ],
                'location' => 'required|string',
                'ticket_price' => 'required|numeric|min:0',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
                'status' => 'required|in:upcoming,ongoing,past,canceled',
                'venue_id' => 'required|exists:venues,id',
            ];

            // Custom error messages
            $customMessages = [
                'name.required' => 'The name field is required.',
                // Add other custom error messages here
            ];

            // Validate the request with custom error messages
            $validator = Validator::make($request->all(), $rules, $customMessages);

            if ($validator->fails()) {
                return redirect()
                    ->route('events.edit', $id)
                    ->withErrors($validator)
                    ->withInput();
            }

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
