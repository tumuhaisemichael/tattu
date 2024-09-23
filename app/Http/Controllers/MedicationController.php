<?php

// app/Http/Controllers/MedicationController.php
namespace App\Http\Controllers;

use App\Models\Medication;
use Illuminate\Http\Request;

class MedicationController extends Controller
{
    // [Medications Page]
    public function index()
    {
        $medications = Medication::where('patient_id', auth()->user()->id)->get();
        return view('medications.index', compact('medications'));
    }

    // [Create New Medication Page]
    public function create()
    {
        return view('medications.create');
    }

    // [Store New Medication]
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'dosage' => 'required|string|max:255',
            'start_date' => 'required|date',
        ]);

        Medication::create([
            'patient_id' => auth()->user()->id,
            'name' => $request->name,
            'dosage' => $request->dosage,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
        ]);

        return redirect()->route('medications.index')->with('success', 'Medication added successfully.');
    }
}
