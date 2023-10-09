<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Form; 
use App\Models\Report;

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
            'senderName' => 'required|string',
            'receiverName' => 'required|string',
            'description' => 'required|string',
            'report' => 'required|boolean',

        ]);

        Form::create($data);

        return redirect()->route('forms.index')->with('success', 'Form created successfully.');
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
            'senderName' => 'required|string',
            'receiverName' => 'required|string',
            'description' => 'required|string',
            'report' => 'required|boolean',
        ]);

        $form->update($data);

        return redirect()->route('forms.index')->with('success', 'Form updated successfully.');
    }

    public function destroy(Form $form)
    {
        $form->delete();

        return redirect()->route('forms.index')->with('success', 'Form deleted successfully.');
    }
}