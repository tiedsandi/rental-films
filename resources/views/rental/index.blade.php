<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Rental Films</title>
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #f4f6f8;
            color: #333;
            padding: 30px;
        }

        .container {
            max-width: 900px;
            margin: 0 auto;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        h1 {
            font-size: 1.6rem;
            color: #2c3e50;
        }

        .btn-create {
            background-color: #3498db;
            color: #fff;
            text-decoration: none;
            padding: 9px 18px;
            border-radius: 5px;
            font-size: 0.9rem;
        }

        .btn-create:hover {
            background-color: #2980b9;
        }

        .alert-success {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
            border-radius: 5px;
            padding: 10px 15px;
            margin-bottom: 16px;
            font-size: 0.9rem;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background-color: #fff;
            border-radius: 6px;
            overflow: hidden;
            box-shadow: 0 1px 4px rgba(0, 0, 0, 0.1);
        }

        thead {
            background-color: #3498db;
            color: #fff;
        }

        th,
        td {
            padding: 12px 15px;
            text-align: left;
            font-size: 0.9rem;
        }

        tbody tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tbody tr:hover {
            background-color: #eaf4fb;
        }

        td {
            border-bottom: 1px solid #eee;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <h1>Rental Films</h1>
            <a href="{{ route('rental.create') }}" class="btn-create">+ New Rental</a>
        </div>

        @if (session('success'))
            <div class="alert-success">{{ session('success') }}</div>
        @endif

        <table>
            <thead>
                <tr>
                    <th>Full Name</th>
                    <th>Physical Address</th>
                    <th>Movies Rented</th>
                    <th>Salutation</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($datas as $data)
                    <tr>
                        <td>{{ $data->customers->full_name }}</td>
                        <td>{{ $data->address }}</td>
                        <td>{{ $data->rentals->pluck('movies.title')->join(', ') }}</td>
                        <td>{{ $data->customers->salutation }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>

</html>
