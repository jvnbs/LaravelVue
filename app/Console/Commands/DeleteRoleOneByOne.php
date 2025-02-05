<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Role;

class DeleteRoleOneByOne extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:delete-role-one-by-one';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // Fetch the first role
        $role = Role::first();
    
        // Check if a role exists
        if (is_null($role)) {
            $this->info('No role to delete.');
            return 0;
        }
    
        // Delete the role
        $role->delete();
        $this->info("Deleted role: {$role->id}");
    
        return 0; // Command executed successfully
    }
    
}
