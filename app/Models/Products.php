<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    protected $table = 'products';
    protected $fillable = ['contpaq_id', 'barcode', 'style', 'footwear_type_id', 'unit_id', 'description', 'color_id', 'size_id', 'qty_container', 'active'];

    public function warehouseLocations()
    {
        return $this->hasMany('App\Models\InventoryLocation', 'product_id');
    }
}
