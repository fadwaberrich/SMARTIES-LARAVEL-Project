<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Form; 
use App\Models\Report;
use Illuminate\Support\Facades\Storage;

class FormController extends Controller
{
    public function index()
    {
        $forms = Form::all();
        return view('forms.index', compact('forms'));
    }

    public function create()
    {
        return view('forms.create');
    }


    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Validate the image here
        ]);
    
        // Handle image upload
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
            $data['image'] = $imagePath;
        }
    
        $form = Form::create($data);
    
        // Redirect to the show route for the newly created form
        return redirect()->route('forms.show', ['form' => $form->id])->with('success', 'Form created successfully.');
    }
    
   
    public function show( Form $form)
{
    return view('forms.show', compact('form'));

}
public function createReport(Form $form)
{
    // Check if a report already exists for this form
    if ($form->report) {
        return redirect()->route('forms.show', $form)->with('error', 'A report already exists for this form.');
    }

    // Create a new report for the form
    $report = new Report();
    $report->form_id = $form->id;
    $report->save();

    return redirect()->route('forms.show', $form)->with('success', 'Report created successfully.');
}




    public function edit(Form $form)
    {
        return view('forms.edit', compact('form'));
    }

    public function update(Request $request, Form $form)
    {
        $data = $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validate image upload (optional)
        ]);
    
        // Handle image upload if a new image is provided
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
            $data['image'] = $imagePath;
        } else {
            // If no new image is provided, keep the existing image data
            $data['image'] = $form->image;
        }
    
        $form->update($data);
        session()->flash('success', 'Form edited successfully.');

        return redirect()->route('forms.index')->with('success', 'Form updated successfully.');
    }
    
    

    public function destroy(Form $form)
    {
        // Delete the associated image file if it exists
        if (!empty($form->image)) {
            \Storage::disk('public')->delete($form->image);
        }
    
        $form->delete();
        session()->flash('success', 'Form deleted successfully.');
    
        return redirect()->route('forms.index');
    }
    
    
    
}