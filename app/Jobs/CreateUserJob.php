<?php

namespace App\Jobs;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use App\Models\User;

class CreateUserJob implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        // Get the last user ID from the database
        $lastUser = User::latest()->value('id'); // Get the last user ID

        // Starting the new user ID
        $startId = $lastUser + 1; // Start from the next available ID
        $endId = $startId + 99; // We need to create 100 users

        // Loop to create 100 new users
        for ($i = $startId; $i <= $endId; $i++) {
            try {
                $user = new User();
                $user->first_name = 'User ' . $i;
                $user->last_name = 'User ' . $i;
                $user->name = 'User ' . $i;
                $user->email = 'user' . $i . '@gmail.com'; // Unique email
                $user->phone_number = '1234566789';
                $user->password = bcrypt('12345678'); // Password encryption
                $user->gender = 'male';
                $user->date_of_birth = '2024-11-11';
                $user->image = null;
                $user->description = 'User ' . $i;
                $user->save();

                // Log successful user creation
                \Log::info('User created successfully', ['user_id' => $i, 'email' => $user->email]);

            } catch (\Exception $e) {
                // Log error if something goes wrong
                \Log::error('Error creating user', ['error' => $e->getMessage(), 'user_index' => $i]);
            }
        }

        // Log completion
        \Log::info('100 users created successfully from ID ' . $startId . ' to ' . $endId);
    }
}
