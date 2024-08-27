<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payroll</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-bold mb-4">Payroll</h1>

        <form action="{{ route('payrolls.store') }}" method="POST" class="mb-4">
            @csrf
            <div class="mb-4">
                <label for="basic_salary" class="block text-sm font-medium text-gray-700">Basic Salary</label>
                <input type="number" id="basic_salary" name="basic_salary" step="0.01" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
            </div>

            <div class="mb-4">
                <label for="allowances" class="block text-sm font-medium text-gray-700">Allowances</label>
                <input type="number" id="allowances" name="allowances" step="0.01" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
            </div>

            <div class="mb-4">
                <label for="deductions" class="block text-sm font-medium text-gray-700">Deductions</label>
                <input type="number" id="deductions" name="deductions" step="0.01" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
            </div>

            <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded">Generate Payroll</button>
        </form>

        <table class="min-w-full bg-white border border-gray-300 rounded-lg">
            <thead>
                <tr>
                    <th class="px-4 py-2 border-b">ID</th>
                    <th class="px-4 py-2 border-b">Basic Salary</th>
                    <th class="px-4 py-2 border-b">Allowances</th>
                    <th class="px-4 py-2 border-b">Deductions</th>
                    <th class="px-4 py-2 border-b">Net Salary</th>
                </tr>
            </thead>
            <tbody>
                @foreach($payrolls as $payroll)
                <tr>
                    <td class="px-4 py-2 border-b">{{ $payroll->id }}</td>
                    <td class="px-4 py-2 border-b">{{ $payroll->basic_salary }}</td>
                    <td class="px-4 py-2 border-b">{{ $payroll->allowances }}</td>
                    <td class="px-4 py-2 border-b">{{ $payroll->deductions }}</td>
                    <td class="px-4 py-2 border-b">{{ $payroll->net_salary }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
