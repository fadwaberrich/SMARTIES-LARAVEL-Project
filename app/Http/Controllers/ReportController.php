<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Report;
use App\Models\Form; // Import the Form model

class ReportController extends Controller
{
    public function index()
    {
        // Retrieve all reports from the database
        $reports = Report::all();

        return view('reports.index', compact('reports'));
    }

    public function create(Form $form)
    {
        return view('reports.create', compact('form'));
    }
    

    public function store(Request $request)
    {
        $data = $request->validate([
            'form_id' => 'required|exists:forms,id', // Ensure the form ID exists in the database.
            'title' => 'required|string',
            'description' => 'required|string',
        ]);
    
        // Create a new report associated with the specified form.
        Report::create($data);
    
        // Update the 'report' attribute in the 'Form' model to indicate that it has been reported.
        $form = Form::find($data['form_id']);
        $form->report = true;
        $form->save();
    
        return redirect()->route('forms.index')->with('success', 'Report created successfully.');
    }
    



    public function show(Report $report)
    {
        return view('reports.show', compact('report'));
    }

    public function edit(Report $report)
    {
        return view('reports.edit', compact('report'));
    }

    public function update(Request $request, Report $report)
    {
        // Validate and update the report data
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        $report->update($validatedData);

        return redirect()->route('reports.index')->with('success', 'Report updated successfully.');
    }

    public function destroy(Report $report)
    {
        $report->delete();

        return redirect()->route('reports.index')->with('success', 'Report deleted successfully.');
    }}
