<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
       public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        DB::table('acls')->truncate();
        DB::table('acl_actions')->truncate();
        DB::table('admins')->truncate();
        DB::table('users')->truncate();
        DB::table('roles')->truncate();
        DB::table('permissions')->truncate();
        DB::table('permission_actions')->truncate();
        DB::table('categories')->truncate();
        DB::table('products')->truncate();
        DB::table('banners')->truncate();
        DB::table('blogs')->truncate();

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

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
            BannerSeeder::class,
            BlogSeeder::class,
        ]);
    }
}
