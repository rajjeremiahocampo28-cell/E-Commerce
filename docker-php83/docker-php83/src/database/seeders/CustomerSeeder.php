<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Customers;

class CustomerSeeder extends Seeder
{
    public function run(): void
    {
        Customers::insert([
            [
                'name' => 'Crystller B. Ortiz',
                'email' => 'ocrystller55@gmail.com',
                'password' => Hash::make('password1'),
                'role' => 'customer',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Cyrus Ken D. Orilleneda',
                'email' => 'cyrusken123@gmail.com',
                'password' => Hash::make('password12'),
                'role' => 'customer',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'John Rafael G.Magbutay ',
                'email' => 'johnraf678@gmail.com',
                'password' => Hash::make('password123'),
                'role' => 'customer',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'John Mark D. Cosmiano',
                'email' => 'mjcosmi890@gmail.com',
                'password' => Hash::make('password1234'),
                'role' => 'customer',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Cyron Jake O. Arendain',
                'email' => 'cyrcarmm1531@gmail.com',
                'password' => Hash::make('password12345'),
                'role' => 'customer',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Princess',
                'email' => 'cessy1234@gmail.com',
                'password' => Hash::make('ilovec'),
                'role' => 'customer',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Eugen Alas',
                'email' => 'euggege@gmail.com',
                'password' => Hash::make('ilovekian'),
                'role' => 'customer',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
