<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Admin;
use Carbon\Carbon;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Admin::create([
            'first_name' => 'Admin', // First Name
            'last_name' => 'User', // Last Name
            'email' => 'admin@gmail.com', // Email
            'phone_number' => '1234567890', // Phone Number
            'gender' => 'Male', // Gender (or use 'Female' if needed)
            'date_of_birth' => '1999-06-08', // Date of Birth
            'password' => bcrypt('System@123'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
