<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoomFacilitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $roomFacilities = [
            [
                'room_type' => 'Standard',
                'facilities' => [
                    'Tempat tidur single atau double',
                    'Kamar mandi dengan shower',
                    'TV',
                    'Wi-Fi gratis',
                    'AC atau kipas angin',
                ],
            ],
            [
                'room_type' => 'Superior',
                'facilities' => [
                    'Tempat tidur lebih nyaman',
                    'Kamar mandi dengan shower dan amenities',
                    'TV layar datar',
                    'Wi-Fi gratis',
                    'AC',
                    'Balkon atau jendela dengan pemandangan',
                ],
            ],
            [
                'room_type' => 'Deluxe',
                'facilities' => [
                    'Ruangan lebih luas',
                    'Tempat tidur king size atau twin bed',
                    'Kamar mandi dengan bathtub dan shower',
                    'TV layar datar lebih besar',
                    'Wi-Fi gratis dengan kecepatan lebih tinggi',
                    'AC',
                    'Minibar',
                    'Balkon dengan pemandangan',
                ],
            ],
            [
                'room_type' => 'Twin',
                'facilities' => [
                    'Dua tempat tidur single',
                    'Kamar mandi dengan shower',
                    'TV',
                    'Wi-Fi gratis',
                    'AC',
                ],
            ],
            [
                'room_type' => 'Double',
                'facilities' => [
                    'Kasur ukuran queen atau king',
                    'Kamar mandi dengan shower dan bathtub',
                    'TV layar datar',
                    'Wi-Fi gratis',
                    'AC',
                    'Minibar',
                ],
            ],
            [
                'room_type' => 'Family',
                'facilities' => [
                    'Kasur ukuran besar dan tempat tidur tambahan',
                    'Kamar mandi dengan bathtub dan shower',
                    'TV layar datar',
                    'Wi-Fi gratis',
                    'AC',
                    'Meja makan',
                    'Sofa',
                ],
            ],
            [
                'room_type' => 'Junior Suite',
                'facilities' => [
                    'Ruang tidur dan ruang tamu dalam satu area',
                    'Kasur ukuran king',
                    'Sofa dan meja kerja',
                    'TV layar datar besar',
                    'Wi-Fi gratis',
                    'AC',
                    'Minibar',
                    'Kamar mandi dengan bathtub dan shower',
                ],
            ],
            [
                'room_type' => 'Suite Room',
                'facilities' => [
                    'Ruang tidur dan ruang tamu terpisah',
                    'Kasur ukuran king',
                    'Sofa dan meja kerja',
                    'TV layar datar besar',
                    'Wi-Fi gratis',
                    'AC',
                    'Minibar',
                    'Kamar mandi mewah dengan bathtub dan shower',
                ],
            ],
            [
                'room_type' => 'Presidential Suite',
                'facilities' => [
                    'Kamar dengan luas terbesar',
                    'Ruang tamu, ruang makan, dan ruang tidur terpisah',
                    'Kasur ukuran king dengan linen mewah',
                    'Sofa premium dan meja kerja',
                    'TV layar besar di setiap ruangan',
                    'Wi-Fi premium',
                    'AC dengan pengaturan suhu',
                    'Minibar eksklusif',
                    'Jacuzzi atau bathtub mewah',
                    'Pelayanan kamar eksklusif 24 jam',
                ],
            ],
            [
                'room_type' => 'Connecting Room',
                'facilities' => [
                    'Dua kamar yang terhubung dengan pintu dalam',
                    'Kasur ukuran queen atau king',
                    'Kamar mandi dengan bathtub dan shower',
                    'TV layar datar',
                    'Wi-Fi gratis',
                    'AC',
                    'Cocok untuk keluarga besar',
                ],
            ],
            [
                'room_type' => 'Murphy Room',
                'facilities' => [
                    'Tempat tidur lipat atau sofa bed',
                    'Kamar multifungsi',
                    'TV layar datar',
                    'Wi-Fi gratis',
                    'AC',
                    'Kamar mandi dengan shower',
                ],
            ],
        ];

        foreach ($roomFacilities as $facility) {
            \App\Models\RoomFacility::create([
                'room_type' => $facility['room_type'],
                'facilities' => json_encode($facility['facilities']),
            ]);
        }
    }
}
