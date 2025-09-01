<?php

namespace Database\Seeders;

use App\Models\officer;
use App\Models\payment;
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
            'role' => 'warga',
            // 'foto' => 'tangkal.jpg'
        ]);
          User::create([
            'name' => 'Dhiya',
            'username' => 'hamdi',
            'password' => bcrypt('123'),
            'phone' => '085123456789',
            'address' => 'Jl. Raya No. 123',
            'role' => 'officer',
            // 'foto' => 'tangkal.jpg'
        ]);
        officer::create([
            'id_user' => '1',
        ]);
        payment::create([
            'id_user' => '1',
            'nominal' => '10000',
            'period' => 'bulanan',
            'id_petugas'=> '1',
        ]);
    }
}
