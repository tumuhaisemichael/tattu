@extends('layouts.app')

@section('content')
<div class="dashboard-container">
    <!-- Sidebar Section -->
    <div class="sidebar">
        <h2 class="sidebar-title">Dashboard</h2>
        <ul class="nav-links">
            <li><a href="#">Home</a></li>
            <li><a href="{{ route('exercise.index') }}" class="active">Exercise Logs</a></li>
            <li><a href="#">Profile</a></li>
            <li><a href="#">Settings</a></li>
            <li><a href="#">Logout</a></li>
        </ul>
    </div>

    <!-- Main Content Section -->
    <div class="main-content">
        <div class="container">
            <h1 class="page-title">Exercise Logs</h1>

            @if($exerciseLogs->isEmpty())
                <p>No exercise logs available.</p>
            @else
                <div class="table-container">
                    <table class="styled-table">
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>Exercise Type</th>
                                <th>Duration (minutes)</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($exerciseLogs as $log)
                                <tr>
                                    <td>{{ $log->log_date }}</td>
                                    <td>{{ $log->exercise_type }}</td>
                                    <td>{{ $log->duration }}</td>
                                    <td>
                                        <!-- Add a form to delete the exercise log -->
                                        <form action="{{ route('exercise.destroy', $log->id) }}" method="POST" style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn-delete" onclick="return confirm('Are you sure you want to delete this log?')">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <!-- Paginate the results -->
                <div class="pagination">
                    {{ $exerciseLogs->links() }}
                </div>
            @endif

            <a href="{{ route('exercise.create') }}" class="btn-add">Add New Exercise Log</a>
        </div>
    </div>
</div>

<!-- CSS Styles -->
<style>
    .dashboard-container {
        display: flex;
    }

    .sidebar {
        width: 250px;
        background-color: #343a40;
        height: 100vh;
        padding: 20px;
        color: #fff;
        position: fixed;
    }

    .sidebar-title {
        font-size: 22px;
        margin-bottom: 20px;
    }

    .nav-links {
        list-style: none;
        padding: 0;
    }

    .nav-links li {
        margin: 15px 0;
    }

    .nav-links li a {
        color: #fff;
        text-decoration: none;
        font-size: 16px;
        display: block;
    }

    .nav-links li a.active {
        font-weight: bold;
        color: #f8f9fa;
    }

    .main-content {
        margin-left: 260px;
        padding: 40px;
        width: calc(100% - 260px);
    }

    .page-title {
        font-size: 28px;
        margin-bottom: 20px;
    }

    .table-container {
        overflow-x: auto;
        margin-bottom: 20px;
    }

    .styled-table {
        width: 100%;
        border-collapse: collapse;
        background-color: #fff;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .styled-table th, .styled-table td {
        padding: 12px 15px;
        text-align: left;
    }

    .styled-table thead th {
        background-color: #6c757d;
        color: #fff;
    }

    .styled-table tbody tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    .btn-delete {
        padding: 5px 10px;
        background-color: #dc3545;
        color: #fff;
        border: none;
        cursor: pointer;
        border-radius: 3px;
    }

    .btn-delete:hover {
        background-color: #c82333;
    }

    .btn-add {
        display: inline-block;
        background-color: #007bff;
        color: #fff;
        padding: 10px 20px;
        border-radius: 3px;
        text-decoration: none;
    }

    .btn-add:hover {
        background-color: #0056b3;
    }

    .pagination {
        display: flex;
        justify-content: center;
    }

    .pagination ul {
        list-style: none;
        display: flex;
    }

    .pagination ul li {
        margin: 0 5px;
    }

    .pagination ul li a {
        color: #007bff;
        padding: 10px;
        text-decoration: none;
        border: 1px solid #007bff;
        border-radius: 3px;
    }

    .pagination ul li a:hover {
        background-color: #007bff;
        color: #fff;
    }
</style>
@endsection
