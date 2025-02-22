<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-50 p-4">

    <div class="max-w-sm mx-auto bg-white p-6 rounded-lg shadow-lg">
      <!-- Header -->
      <div class="text-center mb-4">
        <h2 class="text-2xl font-bold">Struk Pemesanan</h2>
        <p class="text-sm text-gray-500">Hotel Prima</p>
      </div>

      <!-- Visitor Details -->
      <div class="mb-4">
        <p class="font-semibold">Nama Pengunjung:</p>
        <p class="text-gray-700">{{ $bookedRoom->visitor_name }}</p>
        <p class="font-semibold">Telepon:</p>
        <p class="text-gray-700">{{ $bookedRoom->phone }}</p>
      </div>

      <!-- Reservation Details -->
      <div class="mb-4">
        <p class="font-semibold">Check-in:</p>
        <p class="text-gray-700">{{ $bookedRoom->check_in }}</p>
        <p class="font-semibold">Check-out:</p>
        <p class="text-gray-700">{{ $bookedRoom->check_out }}</p>
        <p class="font-semibold">Jumlah Kamar:</p>
        <p class="text-gray-700">{{ $bookedRoom->number_of_rooms }}</p>
      </div>

      <!-- Room Details -->
      <div class="mb-4">
        <p class="font-semibold">Nama Kamar:</p>
        <p class="text-gray-700">{{ $bookedRoom->room->name }}</p>
        <p class="font-semibold">Tipe Kamar:</p>
        <p class="text-gray-700">{{ $bookedRoom->room->roomType->name }}</p>
        <p class="font-semibold">Fasilitas Kamar:</p>
        <ul class="text-gray-700">
            @foreach (json_decode($bookedRoom->room->roomFacilities->facilities) as $facilities)
            <li> - {{ $facilities }}</li>
            @endforeach
        </ul>
      </div>

      <!-- User Details -->
      <div class="mb-4">
        <p class="font-semibold">Nama Pengguna:</p>
        <p class="text-gray-700">{{ $bookedRoom->user->name }}</p>
        <p class="font-semibold">Email:</p>
        <p class="text-gray-700">{{ $bookedRoom->user->email }}</p>
      </div>

      <!-- Footer -->
      <div class="text-center mt-6">
        <button class="no-print bg-blue-500 text-white px-4 py-2 rounded-full" onclick="window.print()">Cetak Struk</button>
      </div>
    </div>
  </body>
</html>
