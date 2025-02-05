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
    <p>अवुल पकिर जैनुलाब्दीन अब्दुल कलाम बीआर 15 अक्टूबर 1931 - 27 जुलाई 2015 एक भारतीय एयरोस्पेस वैज्ञानिक और राजनेता थे, जिन्होंने 2002 से 2007 तक भारत के 11वें राष्ट्रपति के रूप में कार्य किया। उनका जन्म और पालन-पोषण रामेश्वरम, तमिलनाडु में हुआ ।</p>

    <table class="table table-bordered">
        <tr>
            <th>ID</th>
            <th> Name</th>
            <th>Email</th>
            <th>Phone Number</th>
            <th>Gender</th>
            <th>Created At</th>
        </tr>
        @foreach($users as $user)
        <tr>
            <td>{{ $user->id }}</td>
            <td>{{ $user->first_name }} {{ $user->last_name }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->phone_number }}</td>
            <td>{{ $user->gender }}</td>
            <td>{{ $user->created_at }}</td>
        </tr>
        @endforeach
    </table>
</body>
</html>
