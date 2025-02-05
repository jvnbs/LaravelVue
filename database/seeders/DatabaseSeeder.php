<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\AdminSeeder;
use Database\Seeders\UserSeeder;
use Database\Seeders\RoleSeeder;
use Database\Seeders\PermissionSeeder;
use Database\Seeders\AclSeeder;
use Database\Seeders\AclActionSeeder; 
use Database\Seeders\CategorySeeder;
use Database\Seeders\ProductSeeder;
use Database\Seeders\BannerSeeder; 

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // You can call individual seeders here
        $this->call([
            AclSeeder::class,
            AclActionSeeder::class,
            AdminSeeder::class,
            UserSeeder::class,
            RoleSeeder::class,
            PermissionSeeder::class,
            PermissionActionSeeder::class,
            CategorySeeder::class,
            ProductSeeder::class,
            BannerSeeder::class
        ]);
    }
}
