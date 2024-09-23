<!-- resources/views/medications/create.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Add Medication</h1>

    <form action="{{ route('medications.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Medication Name</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>

        <div class="form-group">
            <label for="dosage">Dosage</label>
            <input type="text" class="form-control" id="dosage" name="dosage" required>
        </div>

        <div class="form-group">
            <label for="start_date">Start Date</label>
            <input type="date" class="form-control" id="start_date" name="start_date" required>
        </div>

        <div class="form-group">
            <label for="end_date">End Date (optional)</label>
            <input type="date" class="form-control" id="end_date" name="end_date">
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection
