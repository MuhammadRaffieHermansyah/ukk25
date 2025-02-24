<?php

namespace Database\Seeders;

use App\Models\HotelFacility;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class HotelFacilitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $hotelFacilities = [
            ['name' => 'Kolam Renang', 'description' => 'Kolam renang outdoor dan indoor untuk tamu hotel', 'image' => 'pool.jpg'],
            ['name' => 'Restoran', 'description' => 'Restoran dengan menu lokal dan internasional', 'image' => 'resto.jpg'],
            ['name' => 'Wi-Fi Gratis', 'description' => 'Akses internet gratis di seluruh area hotel', 'image' => 'wifi.jpg'],
            ['name' => 'Pusat Kebugaran', 'description' => 'Gym lengkap dengan peralatan modern', 'image' => 'gym.jpg'],
            ['name' => 'Spa & Sauna', 'description' => 'Layanan spa dan sauna untuk relaksasi', 'image' => 'spa.jpg'],
            ['name' => 'Ruang Rapat', 'description' => 'Fasilitas ruang rapat dan konferensi dengan peralatan lengkap', 'image' => 'meeting-room.jpg'],
            ['name' => 'Layanan Kamar', 'description' => 'Layanan kamar 24 jam untuk kenyamanan tamu', 'image' => 'room-service.jpg'],
            ['name' => 'Parkir Gratis', 'description' => 'Area parkir luas dan aman untuk tamu hotel', 'image' => 'parking.jpg'],
            ['name' => 'Resepsionis 24 Jam', 'description' => 'Layanan resepsionis yang siap membantu kapan saja', 'image' => 'receptionist.jpg'],
            ['name' => 'Layanan Antar-Jemput', 'description' => 'Layanan antar-jemput bandara atau tempat wisata', 'image' => 'shuttle.jpg'],
            ['name' => 'Bar & Lounge', 'description' => 'Bar dan lounge dengan berbagai pilihan minuman', 'image' => 'bar.jpg'],
            ['name' => 'Area Bermain Anak', 'description' => 'Area bermain anak yang aman dan nyaman', 'image' => 'kid-zone.jpg'],
            ['name' => 'Layanan Laundry', 'description' => 'Jasa laundry dan dry cleaning tersedia', 'image' => 'laundry.jpg'],
            ['name' => 'ATM & Penukaran Uang', 'description' => 'Fasilitas ATM dan layanan penukaran mata uang', 'image' => 'atm.jpg'],
            ['name' => 'Keamanan 24 Jam', 'description' => 'Sistem keamanan dengan CCTV dan petugas keamanan 24 jam', 'image' => 'security.jpg'],
        ];

        foreach ($hotelFacilities as $facility) {
            $imagePath = $this->storeImage('hotel-facility', $facility['image']);
            HotelFacility::create([
                'name' => $facility['name'],
                'description' => $facility['description'],
                'image' => $imagePath,
            ]);
        }
    }
    private function storeImage($folder, $filename)
    {
        $sourcePath = database_path("seeders/images/hotel-facility/{$filename}");
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
