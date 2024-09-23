<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BloodSugarLogController;
use App\Http\Controllers\MedicationController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\ExerciseLogController;
use App\Http\Controllers\DietLogController;



Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

route::get('admin/dashboard',[HomeController::class,'index'])->middleware(['auth','admin']);

Route::middleware('auth')->group(function() {
    // [Patient Dashboard Page]
    Route::get('/dashboard', [PatientController::class, 'dashboard'])->name('dashboard');

    // [Blood Sugar Logs Routes]
    Route::resource('bloodsugar', BloodSugarLogController::class);

    // [Medications Routes]
    Route::resource('medications', MedicationController::class);
    Route::resource('diet', DietLogController::class);
    Route::resource('exercise', ExerciseLogController::class);




});
// Route::get('/diet', [DietLogController::class, 'index'])->name('diet.index')->middleware('auth');
// Route::get('/exercise', [ExerciseLogController::class, 'index'])->name('exercise.index')->middleware('auth');
