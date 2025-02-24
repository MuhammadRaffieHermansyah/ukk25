<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Visitor 1',
            'email' => 'visitor1@gmail.com',
            'password' => bcrypt('visitor111'),
            'role' => 'visitor',
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
