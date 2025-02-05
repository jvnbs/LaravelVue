<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\User;

class UpdateUserStatusJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $userIds;

   
    public function __construct($result)
    {
        $this->userIds = is_array($result->id) ? $result->id : [$result->id];
    }

   
    public function handle()
    {
        try {
            $deletedRows = User::whereIn('id', $this->userIds)->delete();
    
            \Log::info('Users deleted successfully', [
                'user_ids' => $this->userIds,
                'deleted_count' => $deletedRows,
            ]);
        } catch (\Exception $e) {
            \Log::error('Error in UpdateUserStatusJob', [
                'user_ids' => $this->userIds,
                'error_message' => $e->getMessage(),
            ]);
        }
    
    }
    
}
