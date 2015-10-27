<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Authorizations extends Model
{
    protected $table = 'authorizations';

    public function resources()
    {
        return $this->hasMany('App\Models\Resources');
    }
}
