<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RolesDefault extends Model
{
    protected $table = 'roles_default';

    public function authorizations()
    {
        return $this->hasMany('App\Models\Resources');
    }

    public function roles()
    {
        return $this->belongsTo('App\Models\Roles');
    }
}
