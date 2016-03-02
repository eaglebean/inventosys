<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderItems extends Model
{
    protected $table = 'orders_items';

    protected $fillable = array('order_id', 'user_id', 'product_id', 'contpaq_id', 'qty', 'description', 'status_id');

    /**
     * Get the order that owns the items.
     */
    public function order()
    {
        return $this->belongsTo('App\Models\Orders', 'id');
    }

    public function user()
    {
        return $this->hasOne('App\Models\User', 'id', 'user_id');
    }

    public function product()
    {
        return $this->hasOne('App\Models\Products', 'id', 'product_id');
    }

    public function getStatus()
    {
        return Metadata::getLabel($this->status_id);
    }

}
