@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Add New Diet Log</h1>

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

    <!-- Form to add a new diet log -->
    <form action="{{ route('diet.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="meal">Meal:</label>
            <input type="text" name="meal" class="form-control" value="{{ old('meal') }}" required>
        </div>

        <div class="form-group">
            <label for="calories">Calories:</label>
            <input type="number" name="calories" class="form-control" value="{{ old('calories') }}" required>
        </div>

        <div class="form-group">
            <label for="log_date">Date:</label>
            <input type="date" name="log_date" class="form-control" value="{{ old('log_date') }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Save Diet Log</button>
    </form>
</div>
@endsection
