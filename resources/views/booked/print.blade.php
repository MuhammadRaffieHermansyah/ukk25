<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Struk Pemesanan</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>

    <style>
        /* Style khusus untuk cetakan struk */
        .struk-container {
            max-width: 300px;
            background: white;
            padding: 10px;
            font-family: monospace;
            border: 1px solid #ddd;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
        }

        .struk-header,
        .struk-footer {
            text-align: center;
        }

        .struk-content p {
            margin: 4px 0;
        }
    </style>
</head>

<body class="bg-gray-100 flex flex-col justify-center items-center min-h-screen">

    <div class="struk-container" id="struk">
        <!-- Header Struk -->
        <div class="struk-header py-3">
            <h2 class="text-lg font-bold">HOTEL PRIMA</h2>
            <p class="text-sm">Jl. Raya Utama No. 123, Kota Indah, Indonesia</p>
            <p class="text-sm">+62 812-3456-7890 <br> ✉ contact@hotelprima.com</p>
        </div>
        <hr>

        <!-- Detail Pengunjung -->
        <div class="struk-content p-1">
            <p><strong>Nama:</strong> {{ $bookedRoom->visitor_name }}</p>
            <p><strong>Telepon:</strong> {{ $bookedRoom->phone }}</p>
            <p><strong>Check-in:</strong> {{ $bookedRoom->check_in }}</p>
            <p><strong>Check-out:</strong> {{ $bookedRoom->check_out }}</p>
            <p><strong>Jumlah Kamar:</strong> {{ $bookedRoom->number_of_rooms }}</p>
            <p><strong>Kamar:</strong> {{ $bookedRoom->room->name }} ({{ $bookedRoom->room->roomType->name }})</p>
            <p><strong>Fasilitas:</strong></p>
            <ul>
                @foreach (json_decode($bookedRoom->room->roomType->facilities) as $facilities)
                    <li>- {{ $facilities }}</li>
                @endforeach
            </ul>
            <p><strong>Pemesan:</strong> {{ $bookedRoom->user->name }}</p>
            <p><strong>Email:</strong> {{ $bookedRoom->user->email }}</p>
        </div>

        <hr>
        <!-- Footer Struk -->
        <div class="struk-footer py-3">
            <p class="text-sm">Thank you for ordering!</p>
            <p class="text-sm">- Hotel Prima -</p>
        </div>
    </div>

    <!-- Tombol Download -->
    <div class="text-center mt-4">
        <button class="bg-blue-500 text-white px-4 py-2 rounded-full"
            onclick="downloadStruk({{ json_encode($bookedRoom->visitor_name) }})">Download Struk</button>
    </div>

    <script>
        function downloadStruk(name) {
            const strukElement = document.getElementById('struk');

            html2canvas(strukElement, {
                scale: 2,
                backgroundColor: "#ffffff"
            }).then(canvas => {
                let link = document.createElement('a');
                link.href = canvas.toDataURL('image/png');
                link.download = `${name}-${new Date().toISOString()}.png`;
                link.click();
            });
        }
    </script>

</body>

</html>
