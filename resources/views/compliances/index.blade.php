<!DOCTYPE html>
<html>
<head>
    <title>Compliance Management</title>
</head>
<body>
    <h1>Compliance Policies</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Policy Name</th>
                <th>Details</th>
                <th>Effective Date</th>
            </tr>
        </thead>
        <tbody>
            @foreach($compliances as $compliance)
            <tr>
                <td>{{ $compliance->id }}</td>
                <td>{{ $compliance->policy_name }}</td>
                <td>{{ $compliance->details }}</td>
                <td>{{ $compliance->effective_date }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <form action="{{ route('compliances.store') }}" method="POST">
        @csrf
        <label for="policy_name">Policy Name:</label>
        <input type="text" name="policy_name" required>
        <label for="details">Details:</label>
        <textarea name="details" required></textarea>
        <label for="effective_date">Effective Date:</label>
        <input type="date" name="effective_date" required>
        <button type="submit">Add Compliance</button>
    </form>
</body>
</html>
