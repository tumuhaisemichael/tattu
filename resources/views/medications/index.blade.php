<!-- resources/views/medications/index.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Your Medications</h1>
    <a href="{{ route('medications.create') }}" class="btn btn-primary">Add New Medication</a>

    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Dosage</th>
                <th>Start Date</th>
                <th>End Date</th>
            </tr>
        </thead>
        <tbody>
            @foreach($medications as $medication)
            <tr>
                <td>{{ $medication->name }}</td>
                <td>{{ $medication->dosage }}</td>
                <td>{{ $medication->start_date }}</td>
                <td>{{ $medication->end_date ?? 'Ongoing' }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
