<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Form; 

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
        ]);

        Form::create($data);

        return redirect()->route('forms.index')->with('success', 'Form created successfully.');
    }

    public function show(Form $form)
    {
        return view('forms.show', compact('form'));
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