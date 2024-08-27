<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Timesheets</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-bold mb-4">Timesheets</h1>

        <form action="{{ route('timesheets.store') }}" method="POST" class="mb-4">
            @csrf
            <div class="mb-4">
                <label for="project" class="block text-sm font-medium text-gray-700">Project</label>
                <input type="text" id="project" name="project" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
            </div>

            <div class="mb-4">
                <label for="hours" class="block text-sm font-medium text-gray-700">Hours Worked</label>
                <input type="number" id="hours" name="hours" step="0.01" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
            </div>

            <div class="mb-4">
                <label for="date" class="block text-sm font-medium text-gray-700">Date</label>
                <input type="date" id="date" name="date" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
            </div>

            <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded">Add Timesheet Entry</button>
        </form>

        <table class="min-w-full bg-white border border-gray-300 rounded-lg">
            <thead>
                <tr>
                    <th class="px-4 py-2 border-b">ID</th>
                    <th class="px-4 py-2 border-b">Project</th>
                    <th class="px-4 py-2 border-b">Hours</th>
                    <th class="px-4 py-2 border-b">Date</th>
                </tr>
            </thead>
            <tbody>
                @foreach($timesheets as $timesheet)
                <tr>
                    <td class="px-4 py-2 border-b">{{ $timesheet->id }}</td>
                    <td class="px-4 py-2 border-b">{{ $timesheet->project }}</td>
                    <td class="px-4 py-2 border-b">{{ $timesheet->hours }}</td>
                    <td class="px-4 py-2 border-b">{{ $timesheet->date }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
