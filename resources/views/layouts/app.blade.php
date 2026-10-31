<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>MUBS - Student Management System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary mb-4">
        <div class="container">
            <a class="navbar-brand" href="#">MUBS SMS</a>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav me-auto">
                    @auth
                        @hasrole('Administrator')
                            <li class="nav-item"><a class="nav-link" href="{{ route('students.index') }}">Manage Students</a></li>
                        @endhasrole
                        <li class="nav-item"><a class="nav-link" href="{{ route('courses.index') }}">Courses</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('registrations.index') }}">My Registrations</a></li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        <!-- Success/Error Alert Directives (Question 4e) -->
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        @if(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        @yield('content')
    </div>

    <footer class="text-center py-4 mt-5 bg-light border-top">
        <p>&copy; 2026 MUBS - Advanced Web Application Development</p>
    </footer>
</body>
</html>