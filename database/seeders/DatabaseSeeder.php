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
        ]);

        User::create([
            'name' => 'Dhiya',
            'username' => 'diya',
            'password' => bcrypt('123'),
            'phone' => '085123456789',
            'address' => 'Jl. Raya No. 123',
            'role' => 'warga',
        ]);

        User::create([
            'name' => 'Hamdi',
            'username' => 'hamdi',
            'password' => bcrypt('123'),
            'phone' => '085123456789',
            'address' => 'Jl. Raya No. 123',
            'role' => 'officer',
        ]);

        officer::create([
            'id_user' => '3', // harusnya id user officer (hamdi), bukan '1'
        ]);

        payment::create([
            'id_user'   => '2', // warga (Dhiya)
            'nominal'   => '10000',
            'period'    => 'bulanan',
            'id_petugas'=> '1', // officer yang baru dibuat
        ]);
    }
}
