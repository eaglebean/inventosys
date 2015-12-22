<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\OrderItems;
use App\Models\Orders;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return Orders::all();

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        // Get url variables
        $number = $request->input('order_number');
        $description = $request->input('order_description');
        $type = $request->input('order_type');

        // user_id = 2 is contpaq if any other system is creating orders throug the api,
        // the user_id should be passed through the API
        $user_id = $request->input('user_id', 2);

        $items = $request->input('order_items');

        // Save order
        $order = new Orders;
        $order->number = $number;
        $order->description = $description;
        $order->order_type_id = $type;
        $order->user_id = $user_id;
        $order->save();

        $order->find($order->id);

        // Get Items
        $items = new OrderItems(['model' => 'a001', 'qty' => 10, 'description' => 'Chancletas abc 123', 'status_id' => 1]);

        $order->items()->saveMany(array($items));

        return [
            'status' => true,
            'message' => 'Order was created',
        ];
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }

    /*
    |--------------------------------------------------------------------------
    | Views
    |--------------------------------------------------------------------------
    |
    | Only views methods
    |
     */
    public function purchase()
    {
        $orders = Orders::all();

        $data = [
            'orders' => $orders,
        ];

        return view('orders.purchase', $data);
    }
}
