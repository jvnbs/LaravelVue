<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Acl;
use Carbon\Carbon;

class AclSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        // Root Module: Dashboard
        Acl::create([
            'parent_id' => 0, // Root Module (parent_id = 0)
            'title' => 'Dashboard',
            'path' => 'adminpnlx/dashboard',
            'module_order' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        // Root Module: User Management
        Acl::create([
            'parent_id' => 0, // Root Module (parent_id = 0)
            'title' => 'User Management',
            'path' => 'javascript:void(0);', // Placeholder path for dropdown navigation
            'module_order' => 2,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        // Submodules under User Management
        $userManagementId = 2; // ID of User Management root module

        Acl::create([
            'parent_id' => $userManagementId, // Linking to User Management
            'title' => 'User',
            'path' => 'adminpnlx/users',
            'module_order' => 3,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        Acl::create([
            'parent_id' => $userManagementId, // Linking to User Management
            'title' => 'Staffs',
            'path' => 'adminpnlx/staffs',
            'module_order' => 4,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        Acl::create([
            'parent_id' => $userManagementId, // Linking to User Management
            'title' => 'Role',
            'path' => 'adminpnlx/roles',
            'module_order' => 5,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        // Root Module: Product Management
        Acl::create([
            'parent_id' => 0, // Root Module (parent_id = 0)
            'title' => 'Product Management',
            'path' => 'javascript:void(0);', // Placeholder path for dropdown navigation
            'module_order' => 6,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        // Submodules under Product Management
        $productManagementId = 6; // ID of Product Management root module

        Acl::create([
            'parent_id' => $productManagementId, // Linking to Product Management
            'title' => 'Category',
            'path' => 'adminpnlx/categories',
            'module_order' => 7,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        Acl::create([
            'parent_id' => $productManagementId, // Linking to Product Management
            'title' => 'Product',
            'path' => 'adminpnlx/products',
            'module_order' => 8,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        // Root Module: Home Management
        Acl::create([
            'parent_id' => 0, // Root Module (parent_id = 0)
            'title' => 'Home Management',
            'path' => 'javascript:void(0);', // Placeholder path for dropdown navigation
            'module_order' => 10,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        // Submodules under Home Management
        $homeManagementId = 9; // ID of Home Management root module

        Acl::create([
            'parent_id' => $homeManagementId, // Linking to Home Management
            'title' => 'Blog',
            'path' => 'adminpnlx/blogs',
            'module_order' => 11,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        Acl::create([
            'parent_id' => $homeManagementId, // Linking to Home Management
            'title' => 'News',
            'path' => 'adminpnlx/news',
            'module_order' => 12,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        Acl::create([
            'parent_id' => $homeManagementId, // Linking to Home Management
            'title' => 'Banner',
            'path' => 'adminpnlx/home-banners',
            'module_order' => 13,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
