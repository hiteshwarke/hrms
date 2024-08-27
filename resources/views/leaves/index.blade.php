<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Leave Management</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-bold mb-4">Leave Management</h1>

        <form action="{{ route('leaves.store') }}" method="POST" class="mb-4">
            @csrf
            <div class="mb-4">
                <label for="type" class="block text-sm font-medium text-gray-700">Leave Type</label>
                <select id="type" name="type" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                    <option value="sick">Sick</option>
                    <option value="vacation">Vacation</option>
                    <option value="personal">Personal</option>
                </select>
            </div>

            <div class="mb-4">
                <label for="start_date" class="block text-sm font-medium text-gray-700">Start Date</label>
                <input type="date" id="start_date" name="start_date" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
            </div>

            <div class="mb-4">
                <label for="end_date" class="block text-sm font-medium text-gray-700">End Date</label>
                <input type="date" id="end_date" name="end_date" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
            </div>

            <div class="mb-4">
                <label for="reason" class="block text-sm font-medium text-gray-700">Reason</label>
                <textarea id="reason" name="reason" rows="3" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required></textarea>
            </div>

            <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded">Apply for Leave</button>
        </form>

        <table class="min-w-full bg-white border border-gray-300 rounded-lg">
            <thead>
                <tr>
                    <th class="px-4 py-2 border-b">ID</th>
                    <th class="px-4 py-2 border-b">Type</th>
                    <th class="px-4 py-2 border-b">Start Date</th>
                    <th class="px-4 py-2 border-b">End Date</th>
                    <th class="px-4 py-2 border-b">Reason</th>
                    <th class="px-4 py-2 border-b">Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach($leaves as $leave)
                <tr>
                    <td class="px-4 py-2 border-b">{{ $leave->id }}</td>
                    <td class="px-4 py-2 border-b">{{ $leave->type }}</td>
                    <td class="px-4 py-2 border-b">{{ $leave->start_date }}</td>
                    <td class="px-4 py-2 border-b">{{ $leave->end_date }}</td>
                    <td class="px-4 py-2 border-b">{{ $leave->reason }}</td>
                    <td class="px-4 py-2 border-b">{{ $leave->status }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
