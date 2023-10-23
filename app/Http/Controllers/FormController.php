<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Form; 
use App\Models\Report;
use Illuminate\Support\Facades\Storage;

class FormController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $date = $request->input('date');
        $sort = $request->input('sort', 'desc'); // Default to sorting by newest
    
        $forms = Form::when($search, function ($query) use ($search) {
            return $query->where('title', 'like', '%' . $search . '%');
        })
        ->when($date, function ($query) use ($date) {
            return $query->whereDate('created_at', $date);
        })
        ->orderBy('created_at', $sort) // Sort by 'created_at' in ascending or descending order
        ->get();
    
        return view('forms.index', compact('forms'));
    }
    
    
    

    public function create()
    {
        return view('forms.create');
    }

   
    public function frontForms()
    {
        $forms = Form::all(); // Fetch all forms from your database
    
        return view('forms.front_forms', compact('forms'));
    }
    public function frontIndex(Request $request)
    {
        $search = $request->input('search');
        $sort = $request->input('sort', 'desc'); // Default to sorting by newest
    
        $forms = Form::when($search, function ($query) use ($search) {
            return $query->where('title', 'like', '%' . $search . '%');
        })
        ->orderBy('created_at', $sort)
        ->get();
    
        return view('forms.front_forms', compact('forms'));
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

    // You can redirect to a form where the user provides the title and description for the report
    return view('reports.create', compact('form'));
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