<?php

namespace Database\Seeders;

use App\Models\RoomType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class RoomTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roomTypes = [
            ['name' => 'Standard', 'description' => 'Kamar hotel yang paling umum dan memiliki fasilitas terbatas', 'image' => 'standar.jpg'],
            ['name' => 'Superior', 'description' => 'Kamar hotel yang sedikit lebih baik dari standard room', 'image' => 'superior.jpg'],
            ['name' => 'Deluxe', 'description' => 'Kamar hotel yang lebih besar dan lebih baik daripada superior room', 'image' => 'delux.jpg'],
            ['name' => 'Twin', 'description' => 'Kamar hotel yang memiliki dua tempat tidur ukuran single yang terpisah', 'image' => 'twin.jpg'],
            ['name' => 'Double', 'description' => 'Kamar hotel yang umumnya memiliki kasur berukuran besar seperti king size', 'image' => 'double.jpg'],
            ['name' => 'Family', 'description' => 'Kamar hotel yang khusus untuk keluarga atau tamu yang ingin menginap bersama dua orang lebih', 'image' => 'family.jpg'],
            ['name' => 'Junior Suite', 'description' => 'Kamar hotel yang memiliki ruang tamu yang menjadi satu dengan ruang tidur', 'image' => 'juniorsuite.jpg'],
            ['name' => 'Suite Room', 'description' => 'Kamar hotel yang memiliki ruang tamu', 'image' => 'suiteroom.jpg'],
            ['name' => 'Presidential Suite', 'description' => 'Kamar hotel yang paling bagus dan paling mahal', 'image' => 'presidential.jpg'],
            ['name' => 'Connecting Room', 'description' => 'Kamar hotel yang cocok untuk tamu yang berlibur bersama keluarga besar', 'image' => 'connecting.jpg'],
            ['name' => 'Murphy Room', 'description' => 'Kamar hotel yang memiliki sofa bed', 'image' => 'murphy.jpg'],
        ];

        foreach ($roomTypes as $room) {
            $imagePath = $this->storeImage('room-type', $room['image']);
            RoomType::create([
                'name' => $room['name'],
                'description' => $room['description'],
                'image' => $imagePath,
            ]);
        }
    }
    private function storeImage($folder, $filename)
    {
        $sourcePath = database_path("seeders/images/room-type/{$filename}");
        $destinationPath = "public/{$folder}/" . Str::random(10) . "-{$filename}";

        if (file_exists($sourcePath)) {
            Storage::copy($sourcePath, $destinationPath);
            return str_replace('public/', '', $destinationPath);
        } else {
            echo "File {$filename} tidak ditemukan di database/seeders/images/\n";
            return null;
        }
    }
}
