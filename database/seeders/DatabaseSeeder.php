<?php

namespace Database\Seeders;

use App\Models\HotelFacility;
use App\Models\Room;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $hotelFacilities = [
            [
                'name' => 'Kolam Renang',
                'description' => 'Kolam renang outdoor dan indoor untuk tamu hotel',
                'image' => 'pool.jpg',
            ],
            [
                'name' => 'Restoran',
                'description' => 'Restoran dengan menu lokal dan internasional',
                'image' => 'resto.jpg',
            ],
            [
                'name' => 'Wi-Fi Gratis',
                'description' => 'Akses internet gratis di seluruh area hotel',
                'image' => 'wifi.jpg',
            ],
            [
                'name' => 'Pusat Kebugaran',
                'description' => 'Gym lengkap dengan peralatan modern',
                'image' => 'gym.jpg',
            ],
            [
                'name' => 'Spa & Sauna',
                'description' => 'Layanan spa dan sauna untuk relaksasi',
                'image' => 'spa.jpg',
            ],
            [
                'name' => 'Ruang Rapat',
                'description' => 'Fasilitas ruang rapat dan konferensi dengan peralatan lengkap',
                'image' => 'meeting-room.jpg',
            ],
            [
                'name' => 'Layanan Kamar',
                'description' => 'Layanan kamar 24 jam untuk kenyamanan tamu',
                'image' => 'room-service.jpg',
            ],
            [
                'name' => 'Parkir Gratis',
                'description' => 'Area parkir luas dan aman untuk tamu hotel',
                'image' => 'parking.jpg',
            ],
            [
                'name' => 'Resepsionis 24 Jam',
                'description' => 'Layanan resepsionis yang siap membantu kapan saja',
                'image' => 'receptionist.jpg',
            ],
            [
                'name' => 'Layanan Antar-Jemput',
                'description' => 'Layanan antar-jemput bandara atau tempat wisata',
                'image' => 'shuttle.jpg',
            ],
            [
                'name' => 'Bar & Lounge',
                'description' => 'Bar dan lounge dengan berbagai pilihan minuman',
                'image' => 'bar.jpg',
            ],
            [
                'name' => 'Area Bermain Anak',
                'description' => 'Area bermain anak yang aman dan nyaman',
                'image' => 'kid-zone.jpg',
            ],
            [
                'name' => 'Layanan Laundry',
                'description' => 'Jasa laundry dan dry cleaning tersedia',
                'image' => 'laundry.jpg',
            ],
            [
                'name' => 'ATM & Penukaran Uang',
                'description' => 'Fasilitas ATM dan layanan penukaran mata uang',
                'image' => 'atm.jpg',
            ],
            [
                'name' => 'Keamanan 24 Jam',
                'description' => 'Sistem keamanan dengan CCTV dan petugas keamanan 24 jam',
                'image' => 'security.jpg',
            ],
        ];

        foreach ($hotelFacilities as $facility) {
            HotelFacility::create($facility);
        }

        $roomTypes = [
            [
                'name' => 'Standard',
                'description' => 'Kamar hotel yang paling umum dan memiliki fasilitas terbatas',
                'image' => 'standar.jpg',
            ],
            [
                'name' => 'Superior',
                'description' => 'Kamar hotel yang sedikit lebih baik dari standard room, dengan fasilitas, interior, balkon, atau view yang lebih baik',
                'image' => 'superior.jpg',
            ],
            [
                'name' => 'Deluxe',
                'description' => 'Kamar hotel yang lebih besar dan lebih baik daripada superior room',
                'image' => 'delux.jpg',
            ],
            [
                'name' => 'Twin',
                'description' => 'Kamar hotel yang memiliki dua tempat tidur ukuran single yang terpisah',
                'image' => 'twin.jpg',
            ],
            [
                'name' => 'Double',
                'description' => 'Kamar hotel yang umumnya memiliki kasur berukuran besar seperti king size',
                'image' => 'double.jpg',
            ],
            [
                'name' => 'Family',
                'description' => 'Kamar hotel yang khusus untuk keluarga atau tamu yang ingin menginap bersama dua orang lebih',
                'image' => 'family.jpg',
            ],
            [
                'name' => 'Junior Suite',
                'description' => 'Kamar hotel yang memiliki ruang tamu yang menjadi satu dengan ruang tidur',
                'image' => 'juniorsuite.jpg',
            ],
            [
                'name' => 'Suite Room',
                'description' => 'Kamar hotel yang memiliki ruang tamu',
                'image' => 'suiteroom.jpg',
            ],
            [
                'name' => 'Presidential Suite',
                'description' => 'Kamar hotel yang paling bagus dan paling mahal',
                'image' => 'presidential.jpg',
            ],
            [
                'name' => 'Connecting Room',
                'description' => 'Kamar hotel yang cocok untuk tamu yang berlibur bersama keluarga besar',
                'image' => 'connecting.jpg',
            ],
            [
                'name' => 'Murphy Room',
                'description' => 'Kamar hotel yang memiliki sofa bed',
                'image' => 'murphy.jpg',
            ],
        ];

        foreach ($roomTypes as $roomType) {
            \App\Models\RoomType::create($roomType);
        }

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

        $rooms = [
            'Room 101',
            'Room 102',
            'Room 103',
            'Room 104',
            'Room 105',
            'Room 106',
            'Room 107',
            'Room 108',
            'Room 109',
            'Room 110',
            'Room 111',
        ];

        for ($i = 0; $i < count($rooms); $i++) {
            Room::create([
                'name' => $rooms[$i],
                'room_type_id' => $i + 1,
                'room_facilities_id' => $i + 1,
            ]);
        }

        User::create([
            'name' => 'Visitor 1',
            'email' => 'visitor1@gmail.com',
            'password' => bcrypt('visitor111'),
            'role' => 'viitor',
        ]);

        User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin123'),
            'role' => 'admin',
        ]);

        User::create([
            'name' => 'Receptionist 1',
            'email' => 'receptionist1@gmail.com',
            'password' => bcrypt('receptionist111'),
            'role' => 'receptionist',
        ]);
    }
}
