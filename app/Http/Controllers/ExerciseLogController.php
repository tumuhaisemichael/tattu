<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ExerciseLog; // Ensure the model is imported
use Illuminate\Support\Facades\Auth;

class ExerciseLogController extends Controller
{
    /**
     * Display a listing of the exercise logs for the authenticated patient.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Get the currently authenticated user's exercise logs
        $exerciseLogs = ExerciseLog::where('patient_id', Auth::id())->latest()->paginate(10); // Pagination can be used here

        // Return the view with the exercise logs
        return view('exercise.index', compact('exerciseLogs'));
    }

    /**
     * Show the form for creating a new exercise log.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('exercise.create');
    }

    /**
     * Store a newly created exercise log in the database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'exercise_type' => 'required|string|max:255',
            'duration' => 'required|integer|min:1',
            'log_date' => 'required|date',
        ]);

        // Create a new exercise log
        ExerciseLog::create([
            'patient_id' => Auth::id(),
            'exercise_type' => $request->input('exercise_type'),
            'duration' => $request->input('duration'),
            'log_date' => $request->input('log_date'),
        ]);

        // Redirect back to the exercise logs index
        return redirect()->route('exercise.index')->with('success', 'Exercise log added successfully.');
    }

    /**
     * Remove an exercise log.
     *
     * @param  \App\Models\ExerciseLog  $exerciseLog
     * @return \Illuminate\Http\Response
     */
    public function destroy(ExerciseLog $exerciseLog)
    {
        // Ensure the log belongs to the authenticated user
        if ($exerciseLog->patient_id == Auth::id()) {
            $exerciseLog->delete();
            return redirect()->route('exercise.index')->with('success', 'Exercise log deleted successfully.');
        } else {
            return redirect()->route('exercise.index')->with('error', 'Unauthorized action.');
        }
    }
}
