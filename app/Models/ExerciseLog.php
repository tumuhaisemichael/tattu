<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExerciseLog extends Model
{
    use HasFactory;
    protected $fillable = [
        'patient_id', // Add this line
        // other fillable properties
    ];
}
