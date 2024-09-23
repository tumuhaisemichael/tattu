// resources/views/layouts/app.blade.php
<!DOCTYPE html>
<html lang="en">
<head>
    <title>My Application</title>
</head>
<body>
<link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">

    <div class="content">
        @yield('content')
    </div>
</body>
</html>
