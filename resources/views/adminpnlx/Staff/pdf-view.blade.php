<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        @font-face {
            font-family: 'Poppins';
            font-style: normal;
            font-weight: 400;
            src: url('{{ public_path('fonts/Poppins-Regular.ttf') }}') format('truetype');
        }

        body {
            font-family: 'Poppins', sans-serif;
        }

        h1 {
            color: #333;
        }

        p {
            font-size: 14px;
        }
    </style>
</head>
<body>
    <p> ### {{ $title }} ### </p>

     <h2>Admin Record</h2>
    <table class="table table-bordered">
        <tr>
            <th>ID</th>
            <th> Name</th>
            <th>Email</th>
            <th>Phone Number</th>
            <th>Gender</th>
            <th>Created At</th>
        </tr>
        @foreach($admins as $admin)
        <tr>
            <td>{{ $admin->id ?? '' }}</td>
            <td>{{ $admin->first_name }} {{ $admin->last_name }}</td>
            <td>{{ $admin->email }}</td>
            <td>{{ $admin->phone_number }}</td>
            <td>{{ $admin->gender }}</td>
            <td>{{ $admin->created_at }}</td>
        </tr>
        @endforeach
    </table>
</body>
</html>
