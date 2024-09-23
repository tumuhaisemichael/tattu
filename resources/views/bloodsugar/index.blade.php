<!-- resources/views/bloodsugar/index.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Your Blood Sugar Logs</h1>
    <a href="{{ route('bloodsugar.create') }}" class="btn btn-primary">Add New Log</a>

    <table class="table">
        <thead>
            <tr>
                <th>Date</th>
                <th>Level</th>
            </tr>
        </thead>
        <tbody>
            @foreach($logs as $log)
            <tr>
                <td>{{ $log->log_date }}</td>
                <td>{{ $log->level }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
