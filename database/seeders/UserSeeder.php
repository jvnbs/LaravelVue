<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Carbon\Carbon;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
      User::create([
        'name' => 'Demo', 
        'email' => 'demo@gmail.com', // Email
        'phone_number' => 'System@123', // Phone Number
        'gender' => 'Male',
        'password' => bcrypt('System@123'),
    ]);

      User::factory()->count(5)->create();        
    }
}