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
            // 'foto' => 'sajidan.png'
        ]
    );
        User::create([
            'name' => 'Dhiya',
            'username' => 'dhiyazahra',
            'password' => bcrypt('123'),
            // 'foto' => 'tangkal.jpg'
        ]);
    }
}
