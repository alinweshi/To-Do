<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        // Create 10 users using the factory
        User::factory()->count(10)->create();

        // Create a specific user
        User::create([
            'first_name' => 'John',
            'last_name' => 'Doe',
            'phone' => '1234567890',
            'email' => 'john.doe@example.com',
            'password' => bcrypt('password'),
        ]);
        User::create([
            'first_name' => 'ali',
            'last_name' => 'nweshi',
            'phone' => '01091092848',
            'email' => 'alinweshi@gmail.com',
            'password' => Hash::make('12345678')
        ]);
    }
}
