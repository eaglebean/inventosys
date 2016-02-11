<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    protected $table = 'inventory';
    protected $fillable = ['product_id', 'metadata_id', 'total', 'active'];

    /**
     * Get the locations
     */
    public function warehouseLocations()
    {
        return $this->hasMany('App\Models\WarehouseLocation', 'inventory_id');
    }

    public function product()
    {
        return $this->belongsTo('App\Models\Product', 'id', 'product_id');
    }

    public function label()
    {
        return $this->hasOne('App\Models\Metadata', 'id', 'metadata_id');
    }
}
