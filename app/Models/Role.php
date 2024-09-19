<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Permission\Models\Role as SpatieRole;
use Spatie\Permission\Traits\HasRoles;

class Role extends SpatieRole
{
    use HasFactory;
    protected $primaryKey = 'id';
    public function model_has_role()
    {
        return $this->hasMany(ModelHasRole::class, 'role_id');
    }

    public function roles()
    {
        return $this->roles; // This is a magic property provided by the HasRoles trait
    }
}
