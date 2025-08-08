<?php

namespace Database\Seeders;

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
        User::create([
            'name' => 'Sajidan',
            'username' => 'sajidan',
            'password' => bcrypt('sajidan123'),
            'phone' => '085123456789',
            'address' => 'Jl. Raya No. 123',
            'role' => 'admin',
            // 'foto' => 'sajidan.png'
        ]
    );
        User::create([
            'name' => 'Dhiya',
            'username' => 'diya',
            'password' => bcrypt('123'),
            'phone' => '085123456789',
            'address' => 'Jl. Raya No. 123',
            // 'foto' => 'tangkal.jpg'
        ]);
    }
}
