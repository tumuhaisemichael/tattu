<?php

// app/Http/Controllers/BloodSugarLogController.php
namespace App\Http\Controllers;

use App\Models\BloodSugarLog;
use Illuminate\Http\Request;

class BloodSugarLogController extends Controller
{
    // [Blood Sugar Logs Page]
    public function index()
    {
        $logs = BloodSugarLog::where('patient_id', auth()->user()->id)->get();
        return view('bloodsugar.index', compact('logs'));
    }

    // [Create New Blood Sugar Log Page]
    public function create()
    {
        return view('bloodsugar.create');
    }

    // [Store New Blood Sugar Log]
    public function store(Request $request)
    {
        $request->validate([
            'level' => 'required|numeric',
            'log_date' => 'required|date',
        ]);

        BloodSugarLog::create([
            'patient_id' => auth()->user()->id,
            'level' => $request->level,
            'log_date' => $request->log_date,
        ]);

        return redirect()->route('bloodsugar.index')->with('success', 'Blood sugar log added successfully.');
    }
}

