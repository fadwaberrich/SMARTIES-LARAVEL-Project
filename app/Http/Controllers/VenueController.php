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
        $venue = Venue::create($request->all());
        return redirect()->route('venuess.index');
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
