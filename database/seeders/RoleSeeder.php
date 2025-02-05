<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role;
class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
          Role::create([
            'name' => 'Admin',
            'description' => 'Has full access to all functionalities of the application.'
        ]);
        
        Role::create([
            'name' => 'Editor',
            'description' => 'Can edit content but has limited administrative access.'
        ]);

        Role::create([
            'name' => 'Viewer',
            'description' => 'Can only view content, no editing privileges.'
        ]);

    }
}
