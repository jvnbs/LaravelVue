<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;
use App\Models\PermissionAction;
class PermissionActionSeeder extends Seeder
{
    public function run(): void
    {
        // User PermissionActions
        PermissionAction::create(['permission_id' => '1', 'name' => 'User', 'action' => 'Listing']);
        PermissionAction::create(['permission_id' => '1', 'name' => 'User', 'action' => 'Create']);
        PermissionAction::create(['permission_id' => '1', 'name' => 'User', 'action' => 'View']);
        PermissionAction::create(['permission_id' => '1', 'name' => 'User', 'action' => 'Update']);
        PermissionAction::create(['permission_id' => '1', 'name' => 'User', 'action' => 'Delete']);
        PermissionAction::create(['permission_id' => '1', 'name' => 'User', 'action' => 'ChangeStatus']);


        // Staff PermissionActions
        PermissionAction::create(['permission_id' => '2', 'name' => 'Staff', 'action' => 'Listing']);
        PermissionAction::create(['permission_id' => '2', 'name' => 'Staff', 'action' => 'Create']);
        PermissionAction::create(['permission_id' => '2', 'name' => 'Staff', 'action' => 'View']);
        PermissionAction::create(['permission_id' => '2', 'name' => 'Staff', 'action' => 'Update']);
        PermissionAction::create(['permission_id' => '2', 'name' => 'Staff', 'action' => 'Delete']);
        PermissionAction::create(['permission_id' => '2', 'name' => 'Staff', 'action' => 'ChangeStatus']);


          // Roles PermissionActions
          PermissionAction::create(['permission_id' => '3', 'name' => 'Roles', 'action' => 'Listing']);
          PermissionAction::create(['permission_id' => '3', 'name' => 'Roles', 'action' => 'Create']);
          PermissionAction::create(['permission_id' => '3', 'name' => 'Roles', 'action' => 'View']);
          PermissionAction::create(['permission_id' => '3', 'name' => 'Roles', 'action' => 'Update']);
          PermissionAction::create(['permission_id' => '3', 'name' => 'Roles', 'action' => 'Delete']);
          PermissionAction::create(['permission_id' => '3', 'name' => 'Roles', 'action' => 'ChangeStatus']);


        // Banner PermissionActions
        PermissionAction::create(['permission_id' => '4', 'name' => 'Banner', 'action' => 'Listing']);
        PermissionAction::create(['permission_id' => '4', 'name' => 'Banner', 'action' => 'Create']);
        PermissionAction::create(['permission_id' => '4', 'name' => 'Banner', 'action' => 'View']);
        PermissionAction::create(['permission_id' => '4', 'name' => 'Banner', 'action' => 'Update']);
        PermissionAction::create(['permission_id' => '4', 'name' => 'Banner', 'action' => 'Delete']);
        PermissionAction::create(['permission_id' => '4', 'name' => 'Banner', 'action' => 'ChangeStatus']);

        // Product PermissionActions
        PermissionAction::create(['permission_id' => '5', 'name' => 'Product', 'action' => 'Listing']);
        PermissionAction::create(['permission_id' => '5', 'name' => 'Product', 'action' => 'Create']);
        PermissionAction::create(['permission_id' => '5', 'name' => 'Product', 'action' => 'View']);
        PermissionAction::create(['permission_id' => '5', 'name' => 'Product', 'action' => 'Update']);
        PermissionAction::create(['permission_id' => '5', 'name' => 'Product', 'action' => 'Delete']);
        PermissionAction::create(['permission_id' => '5', 'name' => 'Product', 'action' => 'ChangeStatus']);



        // Category PermissionActions
        PermissionAction::create(['permission_id' => '6', 'name' => 'Category', 'action' => 'Listing']);
        PermissionAction::create(['permission_id' => '6', 'name' => 'Category', 'action' => 'Create']);
        PermissionAction::create(['permission_id' => '6', 'name' => 'Category', 'action' => 'View']);
        PermissionAction::create(['permission_id' => '6', 'name' => 'Category', 'action' => 'Update']);
        PermissionAction::create(['permission_id' => '6', 'name' => 'Category', 'action' => 'Delete']);
        PermissionAction::create(['permission_id' => '6', 'name' => 'Category', 'action' => 'ChangeStatus']);
    }
}