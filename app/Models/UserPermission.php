<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserPermission extends Model
{
    use HasFactory;

    public function getAclSubModules()
    {
        return $this->hasMany(UserPermission::class, 'admin_module_id', 'admin_module_id');
    }
    
}
