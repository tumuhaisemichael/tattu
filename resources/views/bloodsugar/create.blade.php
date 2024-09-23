<!-- resources/views/bloodsugar/create.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Add Blood Sugar Log</h1>

    <form action="{{ route('bloodsugar.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="level">Blood Sugar Level</label>
            <input type="number" class="form-control" id="level" name="level" required>
        </div>

        <div class="form-group">
            <label for="log_date">Date</label>
            <input type="date" class="form-control" id="log_date" name="log_date" required>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection
