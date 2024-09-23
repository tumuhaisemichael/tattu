<?php

// app/Http/Controllers/PatientController.php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BloodSugarLog;
use App\Models\Medication;
use App\Models\ExerciseLog;
use App\Models\DietLog;


class PatientController extends Controller
{
    /**
     * Show the patient dashboard.
     *
     * [Dashboard Page]
     */
    public function dashboard()
    {
        // Fetch the patient's data to display on the dashboard
        $userId = auth()->user()->id;

        // Fetch latest blood sugar logs and medications (as an example)
        $bloodSugarLogs = BloodSugarLog::where('patient_id', $userId)
            ->latest('log_date')
            ->take(5)
            ->get();

        $medications = Medication::where('patient_id', $userId)
            ->latest('start_date')
            ->take(5)
            ->get();

        $dietLogs = DietLog::where('patient_id', $userId)
            ->latest('log_date')
            ->take(5)
            ->get();

        $exerciseLogs = ExerciseLog::where('patient_id', $userId)
            ->latest('log_date')
            ->take(5)
            ->get();

            return view('dashboard', compact('bloodSugarLogs', 'medications', 'dietLogs', 'exerciseLogs'));
        }

    /**
     * Show the patient profile.
     *
     * [Profile Page] (Optional)
     */
    public function profile()
    {
        $patient = auth()->user();
        return view('profile', compact('patient'));
    }

    /**
     * Show general settings for the patient.
     *
     * [Settings Page] (Optional)
     */
    public function settings()
    {
        return view('settings');
    }
}
