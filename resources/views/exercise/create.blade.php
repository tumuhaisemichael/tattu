@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Add New Exercise Log</h1>

    <!-- Display validation errors -->
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Form to add a new exercise log -->
    <form action="{{ route('exercise.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="exercise_type">Exercise Type:</label>
            <input type="text" name="exercise_type" class="form-control" value="{{ old('exercise_type') }}" required>
        </div>

        <div class="form-group">
            <label for="duration">Duration (minutes):</label>
            <input type="number" name="duration" class="form-control" value="{{ old('duration') }}" required>
        </div>

        <div class="form-group">
            <label for="log_date">Date:</label>
            <input type="date" name="log_date" class="form-control" value="{{ old('log_date') }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Save Exercise Log</button>
    </form>
</div>
@endsection
