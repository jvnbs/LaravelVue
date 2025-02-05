<?php 
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Permission;
use DB;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Permission::create(['name' => 'User', 'action' => 'Listing']);
        Permission::create(['name' => 'Staff', 'action' => 'Listing']);
        Permission::create(['name' => 'Roles', 'action' => 'Listing']);
        Permission::create(['name' => 'Banner', 'action' => 'Listing']);
        Permission::create(['name' => 'Product', 'action' => 'Listing']);
        Permission::create(['name' => 'Category', 'action' => 'Listing']);
    }
}
