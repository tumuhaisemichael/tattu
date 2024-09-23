@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Diet Logs</h1>

    @if($dietLogs->isEmpty())
        <p>No diet logs available.</p>
    @else
        <table class="table">
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Meal</th>
                    <th>Calories</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($dietLogs as $log)
                    <tr>
                        <td>{{ $log->log_date }}</td>
                        <td>{{ $log->meal }}</td>
                        <td>{{ $log->calories }}</td>
                        <td>
                            <!-- Add a form to delete the diet log -->
                            <form action="{{ route('diet.destroy', $log->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this log?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Paginate the results -->
        {{ $dietLogs->links() }}
    @endif

    <a href="{{ route('diet.create') }}" class="btn btn-primary">Add New Diet Log</a>
</div>
@endsection
