<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => bcrypt('password'),
            'role' => 'admin',
        ]);
    // Create an artiste user
        User::create([
            'name' => 'Artiste',
            'email' => 'artiste@example.com',
            'password' => bcrypt('password'),
            'role' => 'artiste',
        ]);
        
    }
}
