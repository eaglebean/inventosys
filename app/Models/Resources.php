<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Resources extends Model
{
    protected $table = 'resources';

    public function authorizations()
    {
        return $this->hasMany('App\Models\Authorizations');
    }

    public function roles()
    {
        return $this->hasMany('App\Models\RolesDefault');
    }
}
