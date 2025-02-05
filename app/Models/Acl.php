<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Acl extends Model
{
    use HasFactory;

    public function get_module_action()
    {
        return $this->hasMany(AclAction::class, 'acl_module_id', 'id');
    }
    public function admin_module_actions()
    {
        return $this->hasMany(AclAction::class, 'acl_module_id', 'id');
    }

    public function admin_sub_modules()
    {
        return $this->hasMany(Acl::class, 'parent_id', 'id');
    }


    public function admin_sub_module_actions()
    {
        return $this->hasMany(AclAction::class, 'acl_module_id', 'id');
    }

    public function getAclAction()
    {
        return $this->hasMany(Acl::class, 'parent_id', 'id');
    }

    public function getAclSubModules()
    {
        return $this->hasMany(Acl::class, 'parent_id', 'id');
    }
}
