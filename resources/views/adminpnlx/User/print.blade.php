<!DOCTYPE html>
<html lang="hi-IN">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>प्रिंट</title>
    <style>
    /* सामान्य स्टाइल */
    body {
        font-family: Arial, sans-serif;
        margin: 20px;
    }

    h1 {
        text-align: center;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }

    th,
    td {
        padding: 8px;
        text-align: center;
        border: 1px solid #ddd;
    }

    th {
        background-color: #f2f2f2;
    }

    .print-button {
        display: block;
        margin: 20px auto;
        padding: 10px 20px;
        background-color: green;
        color: white;
        border: none;
        cursor: pointer;
        text-align: center;
    }

    .print-button:hover {
        background-color: darkgreen;
    }

    /* प्रिंट-विशिष्ट स्टाइल */
    @media print {
        body {
            margin: 0;
            padding: 0;
        }

        h1 {
            font-size: 18px;
            margin-bottom: 10px;
            color: red;
        }

        table {
            width: 100%;
            border: 1px solid #000;
        }

        th,
        td {
            font-size: 12px;
            padding: 5px;
            border: 1px solid #000;
        }

        th {
            background-color: #ccc;
        }

        tr {
            page-break-inside: avoid;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tr:nth-child(odd) {
            background-color: #fff;
        }

        td {
            word-wrap: break-word;
        }

        .print-button {
            display: none;
        }
    }
    </style>
</head>

<body>
    <h1>प्रिंट उपयोगकर्ता रिकॉर्ड</h1>
    <button class="print-button" onclick="window.print()">प्रिंट करें</button>
    <table>
        <thead>
            <tr>
                <th>नाम</th>
                <th>ईमेल</th>
                <th>फोन नंबर</th>
                <th>लिंग</th>
                <th>जोड़ा गया</th>
            </tr>
        </thead>
        <tbody>
            @if($results->isNotEmpty())
            @foreach($results as $result)
            <tr>
                <td class="text-center">{{ $result->first_name ?? '' }}
                    {{ $result->last_name ?? '' }}
                </td>
                <td class="text-center">{{ $result->email ?? '' }}</td>
                <td class="text-center">{{ $result->phone_number ?? '' }}</td>
                <td class="text-center">{{ $result->gender ?? '' }}</td>
                <td class="text-center">{{ $result->created_at ?? '' }}</td>
                <td class="text-center">
                    @if($result->is_active == 1)
                    <span class="badge badge-success" style="color:green;">Activated</span>
                    @else
                    <span class="badge badge-danger" style="color:red;">Deactivated</span>
                    @endif
                </td>
            </tr>
            @endforeach
            @else
            <tr>
                <td class="text-center text-danger"> Record Not Found. </td>
            </tr>
            @endif
        </tbody>
    </table>
</body>

</html>