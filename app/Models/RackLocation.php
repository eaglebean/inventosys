<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class RackLocation extends Model
{
    protected $table = 'rack_location';
    protected $fillable = ['warehouse_location_id', 'metadata_id', 'total'];

    public function warehouseLocation()
    {
        return $this->belongsTo('App\Models\WarehouseLocation', 'id', 'warehouse_location_id');
    }

    public function section()
    {
        return $this->hasMany('App\Models\RackSection', 'rack_location_id');
    }

    public function label()
    {
        return $this->hasOne('App\Models\Metadata', 'id', 'metadata_id');
    }
}
