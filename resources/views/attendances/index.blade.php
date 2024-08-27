<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Attendance Management</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-bold mb-4">Attendance Management</h1>

        <div class="flex justify-between mb-4">
            <form action="{{ route('attendances.clockIn') }}" method="POST">
                @csrf
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Clock In</button>
            </form>
            <form action="{{ route('attendances.clockOut') }}" method="POST">
                @csrf
                @method('PUT')
                <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded">Clock Out</button>
            </form>
        </div>

        <table class="min-w-full bg-white border border-gray-300 rounded-lg">
            <thead>
                <tr>
                    <th class="px-4 py-2 border-b">ID</th>
                    <th class="px-4 py-2 border-b">Clock In</th>
                    <th class="px-4 py-2 border-b">Clock Out</th>
                </tr>
            </thead>
            <tbody>
                @foreach($attendances as $attendance)
                <tr>
                    <td class="px-4 py-2 border-b">{{ $attendance->id }}</td>
                    <td class="px-4 py-2 border-b">{{ $attendance->clock_in }}</td>
                    <td class="px-4 py-2 border-b">{{ $attendance->clock_out }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
