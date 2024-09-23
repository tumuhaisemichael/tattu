<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DietLog; // Ensure the model is imported
use Illuminate\Support\Facades\Auth;

class DietLogController extends Controller
{
    /**
     * Display a listing of the diet logs for the authenticated patient.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Get the currently authenticated user's diet logs
        $dietLogs = DietLog::where('patient_id', Auth::id())->latest()->paginate(10); // Pagination can be used here

        // Return the view with the diet logs
        return view('diet.index', compact('dietLogs'));
    }

    /**
     * Show the form for creating a new diet log.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('diet.create');
    }

    /**
     * Store a newly created diet log in the database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'meal' => 'required|string|max:255',
            'calories' => 'required|integer|min:1',
            'log_date' => 'required|date',
        ]);

        // Create a new diet log
        DietLog::create([
            'patient_id' => Auth::id(),
            'meal' => $request->input('meal'),
            'calories' => $request->input('calories'),
            'log_date' => $request->input('log_date'),
        ]);

        // Redirect back to the diet logs index
        return redirect()->route('diet.index')->with('success', 'Diet log added successfully.');
    }

    /**
     * Remove a diet log.
     *
     * @param  \App\Models\DietLog  $dietLog
     * @return \Illuminate\Http\Response
     */
    public function destroy(DietLog $dietLog)
    {
        // Ensure the log belongs to the authenticated user
        if ($dietLog->patient_id == Auth::id()) {
            $dietLog->delete();
            return redirect()->route('diet.index')->with('success', 'Diet log deleted successfully.');
        } else {
            return redirect()->route('diet.index')->with('error', 'Unauthorized action.');
        }
    }
}
