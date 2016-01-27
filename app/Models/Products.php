<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    protected $table = 'products';
    protected $fillable = ['name', 'unit', 'model', 'description', 'active'];

    public function warehouseLocations()
    {
        return $this->hasMany('App\Models\InventoryLocation', 'product_id');
    }
}
