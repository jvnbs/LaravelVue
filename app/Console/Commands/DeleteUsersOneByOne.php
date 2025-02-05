<?php

namespace App\Console\Commands;
use Illuminate\Console\Command;
use App\Models\User;
class DeleteUsersOneByOne extends Command
{
    protected $signature = 'app:delete-users-one-by-one';
    protected $description = 'Command description';
    public function handle()
    {
        $users = User::limit(2)->get();

        if ($users->isEmpty()) {
            $this->info('No users to delete.');
            return 0; 
        }

        foreach ($users as $user) {
            $user->delete(); 
            $this->info("Deleted user: {$user->id}");
        }

        $this->info('All users have been deleted.');
        return 0;
    }
}
