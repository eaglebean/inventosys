<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class RackSection extends Model
{
    protected $table = 'rack_section';
    protected $fillable = ['rack_location_id', 'label', 'description', 'qty'];

    public function rack()
    {
        return $this->belongsTo('App\Models\RackLocation', 'id', 'rack_location_id');
    }
}
