<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WarehouseLocation extends Model
{
    protected $table = 'warehouse_location';
    protected $fillable = ['product_id', 'label', 'description', 'active'];

    /**
     * Get the locations
     */
    public function rackLocation()
    {
        return $this->hasMany('App\Models\RackLocation', 'rack_location_id');
    }

    public function inventory()
    {
        return $this->belongsTo('App\Models\Inventory', 'id');
    }

    public function label()
    {
        return $this->hasOne('App\Models\Metadata', 'id', 'metadata_id');
    }
}
