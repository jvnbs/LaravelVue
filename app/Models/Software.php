<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Software extends Model
{
    use HasFactory;

    public function subSoftwares()
    {
        return $this->hasMany(Software::class, 'parent_id', 'id');
    }
}
