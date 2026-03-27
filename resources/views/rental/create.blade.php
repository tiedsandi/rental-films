<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create Rental</title>
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
            max-width: 500px;
            margin: 0 auto;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 1px 4px rgba(0, 0, 0, 0.1);
            padding: 30px;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 24px;
        }

        h1 {
            font-size: 1.4rem;
            color: #2c3e50;
        }

        .btn-back {
            background-color: #95a5a6;
            color: #fff;
            text-decoration: none;
            padding: 7px 14px;
            border-radius: 5px;
            font-size: 0.85rem;
        }

        .btn-back:hover {
            background-color: #7f8c8d;
        }

        .form-group {
            margin-bottom: 18px;
        }

        label {
            display: block;
            font-size: 0.9rem;
            font-weight: bold;
            margin-bottom: 6px;
            color: #2c3e50;
        }

        select {
            width: 100%;
            padding: 9px 12px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 0.9rem;
            background-color: #fafafa;
            appearance: none;
        }

        select:focus {
            outline: none;
            border-color: #3498db;
            background-color: #fff;
        }

        .btn-submit {
            width: 100%;
            padding: 10px;
            background-color: #3498db;
            color: #fff;
            border: none;
            border-radius: 5px;
            font-size: 0.95rem;
            cursor: pointer;
            margin-top: 6px;
        }

        .btn-submit:hover {
            background-color: #2980b9;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <h1>Create Rental</h1>
            <a href="{{ route('rental.index') }}" class="btn-back">&larr; Back</a>
        </div>

        <form action="{{ route('rental.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="address_id">Address &amp; Customer:</label>
                <select name="address_id" id="address_id" required>
                    <option value="" disabled selected>-- Select Customer --</option>
                    @foreach ($addresses as $address)
                        <option value="{{ $address->id }}">{{ $address->customers->salutation }}
                            {{ $address->customers->full_name }} -
                            {{ $address->address }}</option>
                    @endforeach
                </select>
                @error('address_id')
                    <div class="alert-error">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="movie_id">Movies to Rent:</label>
                <select name="movie_id" id="movie_id" required>
                    <option value="" disabled selected>-- Select Movie --</option>
                    @foreach ($movies as $movie)
                        <option value="{{ $movie->id }}">{{ $movie->title }}</option>
                    @endforeach
                </select>
                @error('movie_id')
                    <div class="alert-error">{{ $message }}</div>
                @enderror

            </div>

            <button type="submit" class="btn-submit">Create Rental</button>
        </form>
    </div>
</body>

</html>
