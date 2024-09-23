<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <!-- Tailwind CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <!-- Font Awesome CDN for Icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <style>
        /* Custom styles (if needed) */
        .dashboard-container {
            display: flex;
            flex-direction: column;
            height: 100vh;
        }

        @media (min-width: 768px) {
            .dashboard-container {
                flex-direction: row;
            }
        }

        .sidebar {
            background-color: #1a202c; /* Dark gray */
            color: #f7fafc; /* White */
        }

        .nav-links a {
            display: block;
            padding: 1rem;
            color: #a0aec0; /* Lighter gray */
            text-decoration: none;
        }

        .nav-links a:hover {
            background-color: #2d3748; /* Darker gray */
            color: #f7fafc;
        }

        .dropdown-menu {
            display: none;
        }

        .dropdown-menu.show {
            display: block;
        }

        /* Hide the dashboard content on small screens */
        @media (max-width: 767px) {
            .dashboard-content {
                display: none;
            }

            .mobile-menu {
                display: block;
            }
        }
    </style>
</head>
<body class="bg-gray-100">
<div class="dashboard-container">
    <!-- Sidebar -->
    <div class="sidebar w-full md:w-64 h-full shadow-lg p-4">
        <div class="profile-section text-center">
            <img src="{{ asset('path/to/profile.jpg') }}" alt="Profile Picture" class="w-16 h-16 rounded-full mx-auto mb-2">
            <p class="text-xl font-semibold">Esther Howard</p>
            <p class="text-sm text-gray-400">Pro</p>
        </div>
        <nav class="nav-links mt-6">
            <ul>
                <li>
                    <a href="{{ route('exercise.index') }}">
                        <i class="fas fa-dumbbell"></i> Exercise
                    </a>
                </li>
                <li>
                    <a href="{{ route('diet.index') }}">
                        <i class="fas fa-apple-alt"></i> Diet
                    </a>
                </li>
                <li>
                    <a href="{{ route('medications.index') }}">
                        <i class="fas fa-pills"></i> Medications
                    </a>
                </li>
                <li>
                    <a href="{{ route('bloodsugar.index') }}">
                        <i class="fas fa-heartbeat"></i> Blood Sugar
                    </a>
                </li>
            </ul>
        </nav>
    </div>

    <!-- Main Content -->
    <div class="main-content flex-1 p-6">
        <div class="top-bar flex justify-end mb-4">
            <div class="relative">
                <button class="focus:outline-none" onclick="toggleDropdown()">
                    <img src="{{ asset('path/to/profile-icon.jpg') }}" alt="Profile Icon" class="w-8 h-8 rounded-full">
                </button>
                <div id="dropdown-menu" class="dropdown-menu absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg z-20">
                    <a href="{{ route('profile.edit') }}" class="block px-4 py-2 text-gray-800 hover:bg-gray-100">Profile</a>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="block w-full text-left px-4 py-2 text-gray-800 hover:bg-gray-100">Log Out</button>
                    </form>
                </div>
            </div>
        </div>

        <!-- Dashboard Content -->
        <div class="dashboard-content">
            <!-- Top Cards -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
                <div class="bg-blue-500 text-white p-4 rounded shadow">
                    <div class="text-2xl">2</div>
                    <div class="text-sm">Diet</div>
                </div>
                <div class="bg-purple-500 text-white p-4 rounded shadow">
                    <div class="text-2xl">18</div>
                    <div class="text-sm">Exercise</div>
                </div>
                <div class="bg-red-500 text-white p-4 rounded shadow">
                    <div class="text-2xl">2</div>
                    <div class="text-sm">Medications</div>
                </div>
            </div>
            <!-- Charts and Map -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
                <div class="bg-white p-4 rounded shadow">
                    <!-- Chart 1 -->
                </div>
                <div class="bg-white p-4 rounded shadow">
                    <!-- Chart 2 -->
                </div>
            </div>
            <!-- Bottom Cards -->
            <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-6">
                <div class="bg-white p-4 rounded shadow">
                    <div class="text-blue-500">
                        <i class="fas fa-apple-alt"></i>
                    </div>
                    <div class="text-sm">Diet</div>
                </div>
                <div class="bg-white p-4 rounded shadow">
                    <div class="text-yellow-500">
                        <i class="fas fa-dumbbell"></i>
                    </div>
                    <div class="text-sm">Exercise</div>
                </div>
                <div class="bg-white p-4 rounded shadow">
                    <div class="text-red-500">
                        <i class="fas fa-pills"></i>
                    </div>
                    <div class="text-sm">Medications</div>
                </div>
                <div class="bg-white p-4 rounded shadow">
                    <div class="text-green-500">
                        <i class="fas fa-heartbeat"></i>
                    </div>
                    <div class="text-sm">Blood Sugar</div>
                </div>
            </div>
            <!-- Tables -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                <div class="bg-white p-4 rounded shadow">
                    <div class="text-lg font-bold mb-4">Diet: Recent Activity</div>
                    <ul>
                        <li class="border-b py-2">Meal 1</li>
                        <li class="border-b py-2">Meal 2</li>
                        <li class="border-b py-2">Meal 3</li>
                        <li class="border-b py-2">Meal 4</li>
                        <li class="border-b py-2">Meal 5</li>
                    </ul>
                </div>
                <div class="bg-white p-4 rounded shadow">
                    <div class="text-lg font-bold mb-4">Exercise: Recent Activity</div>
                    <ul>
                        <li class="border-b py-2">Workout 1</li>
                        <li class="border-b py-2">Workout 2</li>
                        <li class="border-b py-2">Workout 3</li>
                        <li class="border-b py-2">Workout 4</li>
                        <li class="border-b py-2">Workout 5</li>
                    </ul>
                </div>
                <div class="bg-white p-4 rounded shadow">
                    <div class="text-lg font-bold mb-4">Medications: Recent Activity</div>
                    <ul>
                        <li class="border-b py-2">Medication 1</li>
                        <li class="border-b py-2">Medication 2</li>
                        <li class="border-b py-2">Medication 3</li>
                        <li class="border-b py-2">Medication 4</li>
                        <li class="border-b py-2">Medication 5</li>
                    </ul>
                </div>
                <div class="bg-white p-4 rounded shadow">
                    <div class="text-lg font-bold mb-4">Blood Sugar: Recent Activity</div>
                    <ul>
                        <li class="border-b py-2">Reading 1</li>
                        <li class="border-b py-2">Reading 2</li>
                        <li class="border-b py-2">Reading 3</li>
                        <li class="border-b py-2">Reading 4</li>
                        <li class="border-b py-2">Reading 5</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- Mobile Menu -->
        <div class="mobile-menu hidden md:hidden">
            <select class="w-full p-2 rounded shadow" onchange="navigateToSection(this.value)">
                <option value="">Select Section</option>
                <option value="diet">Diet</option>
                <option value="exercise">Exercise</option>
                <option value="medications">Medications</option>
                <option value="bloodsugar">Blood Sugar</option>
            </select>
        </div>
    </div>
</div>

<script>
    function toggleDropdown() {
        const dropdownMenu = document.getElementById('dropdown-menu');
        dropdownMenu.classList.toggle('show');
    }

    function navigateToSection(section) {
        if (section) {
            window.location.href = section + ".html"; // Adjust URL according to your routing setup
        }
    }
</script>
</body>
</html>
