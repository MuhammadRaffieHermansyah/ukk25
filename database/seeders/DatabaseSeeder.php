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
        // $hotelFacilities = [
        //     [
        //         'name' => 'Kolam Renang',
        //         'description' => 'Kolam renang outdoor dan indoor untuk tamu hotel',
        //         'image' => asset('assets/images/hotel-facility/pool.jpg'),
        //     ],
        //     [
        //         'name' => 'Restoran',
        //         'description' => 'Restoran dengan menu lokal dan internasional',
        //         'image' => asset('assets/images/hotel-facility/resto.jpg'),
        //     ],
        //     [
        //         'name' => 'Wi-Fi Gratis',
        //         'description' => 'Akses internet gratis di seluruh area hotel',
        //         'image' => asset('assets/images/hotel-facility/wifi.jpg'),
        //     ],
        //     [
        //         'name' => 'Pusat Kebugaran',
        //         'description' => 'Gym lengkap dengan peralatan modern',
        //         'image' => asset('assets/images/hotel-facility/gym.jpg'),
        //     ],
        //     [
        //         'name' => 'Spa & Sauna',
        //         'description' => 'Layanan spa dan sauna untuk relaksasi',
        //         'image' => asset('assets/images/hotel-facility/spa.jpg'),
        //     ],
        //     [
        //         'name' => 'Ruang Rapat',
        //         'description' => 'Fasilitas ruang rapat dan konferensi dengan peralatan lengkap',
        //         'image' => asset('assets/images/hotel-facility/meeting-room.jpg'),
        //     ],
        //     [
        //         'name' => 'Layanan Kamar',
        //         'description' => 'Layanan kamar 24 jam untuk kenyamanan tamu',
        //         'image' => asset('assets/images/hotel-facility/room-service.jpg'),
        //     ],
        //     [
        //         'name' => 'Parkir Gratis',
        //         'description' => 'Area parkir luas dan aman untuk tamu hotel',
        //         'image' => asset('assets/images/hotel-facility/parking.jpg'),
        //     ],
        //     [
        //         'name' => 'Resepsionis 24 Jam',
        //         'description' => 'Layanan resepsionis yang siap membantu kapan saja',
        //         'image' => asset('assets/images/hotel-facility/receptionist.jpg'),
        //     ],
        //     [
        //         'name' => 'Layanan Antar-Jemput',
        //         'description' => 'Layanan antar-jemput bandara atau tempat wisata',
        //         'image' => asset('assets/images/hotel-facility/shuttle.jpg'),
        //     ],
        //     [
        //         'name' => 'Bar & Lounge',
        //         'description' => 'Bar dan lounge dengan berbagai pilihan minuman',
        //         'image' => asset('assets/images/hotel-facility/bar.jpg'),
        //     ],
        //     [
        //         'name' => 'Area Bermain Anak',
        //         'description' => 'Area bermain anak yang aman dan nyaman',
        //         'image' => asset('assets/images/hotel-facility/kid-zone.jpg'),
        //     ],
        //     [
        //         'name' => 'Layanan Laundry',
        //         'description' => 'Jasa laundry dan dry cleaning tersedia',
        //         'image' => asset('assets/images/hotel-facility/laundry.jpg'),
        //     ],
        //     [
        //         'name' => 'ATM & Penukaran Uang',
        //         'description' => 'Fasilitas ATM dan layanan penukaran mata uang',
        //         'image' => asset('assets/images/hotel-facility/atm.jpg'),
        //     ],
        //     [
        //         'name' => 'Keamanan 24 Jam',
        //         'description' => 'Sistem keamanan dengan CCTV dan petugas keamanan 24 jam',
        //         'image' => asset('assets/images/hotel-facility/security.jpg'),
        //     ],
        // ];

        // foreach ($hotelFacilities as $facility) {
        //     HotelFacility::create($facility);
        // }

        // $roomTypes = [
        //     [
        //         'name' => 'Standard',
        //         'description' => 'Kamar hotel yang paling umum dan memiliki fasilitas terbatas',
        //         'image' => asset('assets/images/room-type/standar.jpg'),
        //     ],
        //     [
        //         'name' => 'Superior',
        //         'description' => 'Kamar hotel yang sedikit lebih baik dari standard room, dengan fasilitas, interior, balkon, atau view yang lebih baik',
        //         'image' => asset('assets/images/room-type/superior.jpg'),
        //     ],
        //     [
        //         'name' => 'Deluxe',
        //         'description' => 'Kamar hotel yang lebih besar dan lebih baik daripada superior room',
        //         'image' => asset('assets/images/room-type/delux.jpg'),
        //     ],
        //     [
        //         'name' => 'Twin',
        //         'description' => 'Kamar hotel yang memiliki dua tempat tidur ukuran single yang terpisah',
        //         'image' => asset('assets/images/room-type/twin.jpg'),
        //     ],
        //     [
        //         'name' => 'Double',
        //         'description' => 'Kamar hotel yang umumnya memiliki kasur berukuran besar seperti king size',
        //         'image' => asset('assets/images/room-type/double.jpg'),
        //     ],
        //     [
        //         'name' => 'Family',
        //         'description' => 'Kamar hotel yang khusus untuk keluarga atau tamu yang ingin menginap bersama dua orang lebih',
        //         'image' => asset('assets/images/room-type/family.jpg'),
        //     ],
        //     [
        //         'name' => 'Junior Suite',
        //         'description' => 'Kamar hotel yang memiliki ruang tamu yang menjadi satu dengan ruang tidur',
        //         'image' => asset('assets/images/room-type/juniorsuite.jpg'),
        //     ],
        //     [
        //         'name' => 'Suite Room',
        //         'description' => 'Kamar hotel yang memiliki ruang tamu',
        //         'image' => asset('assets/images/room-type/suiteroom.jpg'),
        //     ],
        //     [
        //         'name' => 'Presidential Suite',
        //         'description' => 'Kamar hotel yang paling bagus dan paling mahal',
        //         'image' => asset('assets/images/room-type/presidential.jpg'),
        //     ],
        //     [
        //         'name' => 'Connecting Room',
        //         'description' => 'Kamar hotel yang cocok untuk tamu yang berlibur bersama keluarga besar',
        //         'image' => asset('assets/images/room-type/connecting.jpg'),
        //     ],
        //     [
        //         'name' => 'Murphy Room',
        //         'description' => 'Kamar hotel yang memiliki sofa bed',
        //         'image' => asset('assets/images/room-type/murphy.jpg'),
        //     ],
        // ];

        // foreach ($roomTypes as $roomType) {
        //     \App\Models\RoomType::create($roomType);
        // }

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

        $rooms1 = [
            'Room 1',
            'Room 2',
            'Room 3',
            'Room 4',
            'Room 5',
            'Room 6',
            'Room 7',
            'Room 8',
            'Room 9',
            'Room 10',
            'Room 11',
        ];

        $rooms2 = [
            'Room 51',
            'Room 52',
            'Room 53',
            'Room 54',
            'Room 55',
            'Room 56',
            'Room 57',
            'Room 58',
            'Room 59',
            'Room 60',
            'Room 61',
        ];

        for ($i = 0; $i < count($rooms); $i++) {
            Room::create([
                'name' => $rooms[$i],
                'room_type_id' => rand(1,2),
                'room_facilities_id' => rand(1,2),
            ]);
        }

        for ($i = 0; $i < count($rooms1); $i++) {
            Room::create([
                'name' => $rooms1[$i],
                'room_type_id' => rand(1,2),
                'room_facilities_id' => rand(1,2),
            ]);
        }

        for ($i = 0; $i < count($rooms2); $i++) {
            Room::create([
                'name' => $rooms2[$i],
                'room_type_id' => rand(1,2),
                'room_facilities_id' => rand(1,2),
            ]);
        }

        // $this->call([
        //     HotelFacilitySeeder::class,
        //     RoomTypeSeeder::class,
        // ]);
    }
}
