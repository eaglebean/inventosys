<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderItems extends Model
{
    protected $table = 'orders_items';

    protected $fillable = array('order_id', 'user_id', 'model', 'qty', 'description', 'status_id');

    /**
     * Get the order that owns the items.
     */
    public function order()
    {
        return $this->belongsTo('App\Models\Orders', 'id');
    }
}
