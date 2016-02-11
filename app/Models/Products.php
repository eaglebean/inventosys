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

    public function getFootweartype()
    {
        return Metadata::getLabel($this->footwear_type_id);
    }

    public function getColor()
    {
        return Metadata::getLabel($this->color_id);
    }

    public function getSize()
    {
        return Metadata::getLabel($this->size_id);
    }

    public function getUnit()
    {
        return Metadata::getLabel($this->unit_id);
    }
}
