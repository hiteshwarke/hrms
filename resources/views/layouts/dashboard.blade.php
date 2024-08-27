<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HRMS Dashboard</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="{{ asset('js/app.js') }}" defer></script>
    <style>
        .sidebar { width: 250px; background-color: #343a40; color: white; height: 100vh; position: fixed; }
        .sidebar a { color: white; text-decoration: none; padding: 15px; display: block; }
        .sidebar a:hover { background-color: #495057; }
        .main-content { margin-left: 250px; padding: 20px; }
        .navbar { background-color: #007bff; color: white; padding: 10px; }
        .navbar .profile { float: right; }
        .notifications { position: absolute; top: 10px; right: 10px; }
        .notifications .badge { background-color: red; color: white; border-radius: 50%; padding: 5px 10px; }
    </style>
</head>
<body>
    <div class="sidebar">
        <div class="navbar">
            <span>HRMS</span>
            <div class="profile">
                <a href="{{ route('profile') }}">Profile</a>
                <a href="{{ route('logout') }}">Logout</a>
            </div>
        </div>
        <a href="{{ route('attendances.index') }}">Attendance</a>
        <a href="{{ route('leaves.index') }}">Leaves</a>
        <a href="{{ route('expenses.index') }}">Expenses</a>
        <a href="{{ route('roster.index') }}">Rostering</a>
        <a href="{{ route('timesheets.index') }}">Timesheets</a>
        <a href="{{ route('payrolls.index') }}">Payroll</a>
        <a href="{{ route('compliance.index') }}">Compliance</a>
        <a href="{{ route('helpdesk.index') }}">Helpdesk</a>
        <a href="{{ route('engagement.index') }}">Engagement</a>
        <a href="{{ route('reports.attendance') }}">Reports</a>
        <a href="{{ route('chat.index') }}">Chat</a>
    </div>
    <div class="main-content">
        @yield('content')
    </div>
</body>
</html>
