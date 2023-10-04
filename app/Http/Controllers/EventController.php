<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
class EventController extends Controller
{
  
        public function index()
        {
            $events = Event::all();
            return view('events.index', compact('events'));
        }
    
        public function create()
        {
            return view('events.create');
        }
    
        public function store(Request $request)
        {
            $event = Event::create($request->all());
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
