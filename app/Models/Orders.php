<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    protected $table = 'orders';
    protected $fillable = ['serie', 'folio', 'making', 'description', 'order_type_id', 'user_id'];

    /**
     * Get the items for the order.
     */
    public function items()
    {
        return $this->hasMany('App\Models\OrderItems', 'order_id');
    }

    /**
     * Get user information
     */
    public function user()
    {
        return $this->hasOne('App\Models\User', 'id', 'user_id');
    }
}
