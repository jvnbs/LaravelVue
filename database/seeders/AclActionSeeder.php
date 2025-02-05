<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\AclAction;
use Carbon\Carbon;
use DB;

class AclActionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        // Dashboard Actions
        $DashboardAcl = DB::table('acls')->where('title', 'Dashboard')->first();
        if ($DashboardAcl) {
            $DashboardAclActions = [
                'index' => 'Show Dashboard',
                'profile' => 'Profile',
            ];

            foreach ($DashboardAclActions as $key => $action) {
                AclAction::create([
                    'acl_module_id' => $DashboardAcl->id,
                    'name' => $action,
                    'function_name' => 'DashboardController@' . $key,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]);
            }
        }

        // User Management Actions
        $UserAcl = DB::table('acls')->where('title', 'User')->first();
        if ($UserAcl) {
            $UserAclActions = [
                'index' => 'Listing',
                'create' => 'Create',
                'show' => 'Show',
                'edit' => 'Update',
                'delete' => 'Delete',
                'changeStatus' => 'Change Status',
            ];

            foreach ($UserAclActions as $key => $action) {
                AclAction::create([
                    'acl_module_id' => $UserAcl->id,
                    'name' => $action,
                    'function_name' => 'UserController@' . $key,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]);
            }
        }

        // Staff (Admin) Actions
        $AdminAcl = DB::table('acls')->where('title', 'Staffs')->first();
        if ($AdminAcl) {
            $AdminActions = [
                'index' => 'Listing',
                'create' => 'Create',
                'show' => 'Show',
                'edit' => 'Update',
                'delete' => 'Delete',
                'changeStatus' => 'Change Status',
            ];

            foreach ($AdminActions as $key => $action) {
                AclAction::create([
                    'acl_module_id' => $AdminAcl->id,
                    'name' => $action,
                    'function_name' => 'StaffController@' . $key,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]);
            }
        }

        // Product Management Actions
        $ProductAcl = DB::table('acls')->where('title', 'Product')->first();
        if ($ProductAcl) {
            $ProductActions = [
                'index' => 'Listing',
                'create' => 'Create',
                'show' => 'Show',
                'edit' => 'Update',
                'delete' => 'Delete',
                'changeStatus' => 'Change Status',
            ];

            foreach ($ProductActions as $key => $action) {
                AclAction::create([
                    'acl_module_id' => $ProductAcl->id,
                    'name' => $action,
                    'function_name' => 'ProductController@' . $key,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]);
            }
        }

        // Category Actions
        $CategoryAcl = DB::table('acls')->where('title', 'Category')->first();
        if ($CategoryAcl) {
            $CategoryActions = [
                'index' => 'Listing',
                'create' => 'Create',
                'show' => 'Show',
                'edit' => 'Update',
                'delete' => 'Delete',
                'changeStatus' => 'Change Status',
            ];

            foreach ($CategoryActions as $key => $action) {
                AclAction::create([
                    'acl_module_id' => $CategoryAcl->id,
                    'name' => $action,
                    'function_name' => 'CategoryController@' . $key,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]);
            }
        }

       

        // Blog Actions
        $BlogAcl = DB::table('acls')->where('title', 'Blog')->first();
        if ($BlogAcl) {
            $BlogActions = [
                'index' => 'Listing',
                'create' => 'Create',
                'show' => 'Show',
                'edit' => 'Update',
                'delete' => 'Delete',
                'changeStatus' => 'Change Status',
            ];

            foreach ($BlogActions as $key => $action) {
                AclAction::create([
                    'acl_module_id' => $BlogAcl->id,
                    'name' => $action,
                    'function_name' => 'BlogController@' . $key,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]);
            }
        }

         // Banner Actions
         $BannerAcl = DB::table('acls')->where('title', 'Banner')->first();
         if ($BannerAcl) {
             $BannerActions = [
                 'index' => 'Listing',
                 'create' => 'Create',
                 'show' => 'Show',
                 'edit' => 'Update',
                 'delete' => 'Delete',
                 'changeStatus' => 'Change Status',
             ];
 
             foreach ($BannerActions as $key => $action) {
                 AclAction::create([
                     'acl_module_id' => $BannerAcl->id,
                     'name' => $action,
                     'function_name' => 'BannerController@' . $key,
                     'created_at' => Carbon::now(),
                     'updated_at' => Carbon::now(),
                 ]);
             }
         }
         
    }
}
