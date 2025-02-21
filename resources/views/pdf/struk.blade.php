<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Struk Booking</title>
    <style>
        body { font-family: sans-serif; }
        .container { width: 80%; margin: auto; border: 1px solid #ddd; padding: 20px; }
        h2 { text-align: center; }
        table { width: 100%; border-collapse: collapse; margin-top: 10px; }
        table, th, td { border: 1px solid black; padding: 8px; text-align: left; }
    </style>
</head>
<body>
    <div class="container">
        <h2>Struk Booking</h2>
        <p><strong>Nama:</strong> {{ $bookedRoom->visitor_name }}</p>
        <p><strong>Email:</strong> {{ $bookedRoom->user->email }}</p>
        <p><strong>Telepon:</strong> {{ $bookedRoom->phone }}</p>

        <table>
            <tr>
                <th>Kamar</th>
                <th>Tipe Kamar</th>
                <th>Check-in - Check-out</th>
            </tr>
            <tr>
                <td>{{ $bookedRoom->room->name }}</td>
                <td>{{ $bookedRoom->room->roomType->name }}</td>
                <td>{{ $bookedRoom->check_in }} - {{ $bookedRoom->check_out }}</td>
            </tr>
        </table>
    </div>
</body>
</html>
