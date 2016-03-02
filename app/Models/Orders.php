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

    /**
     * Get type of order
     */
    public function ordertype()
    {
        return $this->hasOne('App\Models\Metadata', 'id', 'order_type_id');
    }

    /**
     * Search an order by number
     * @param string $identifier
     * @return array of Orders
     */
    public static function findByNumber($identifier)
    {
        $orders = Orders::where("serie", "LIKE", "%{$identifier}%")
            ->orWhere("folio", "LIKE", "%{$identifier}%")
            ->orWhere("making", "LIKE", "%{$identifier}%")
            ->get();

        foreach ($orders as $order) {
            $order->user;
            $order->ordertype;
            $items = $order->items;

            foreach ($items as $item) {
                $item->user;
                $item->product;
                $item->status = $item->getStatus();
                $item->product->footweartype = $item->product->getFootweartype();
                $item->product->color = $item->product->getColor();
                $item->product->size = $item->product->getSize();
                $item->product->unit = $item->product->getUnit();
            }
        }

        return $orders;
    }
}
