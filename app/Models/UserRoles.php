<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserRoles extends Model
{
    protected $table = 'users_roles';

    public function roles()
    {
        return $this->hasOne('App\Models\Roles');
    }
}
