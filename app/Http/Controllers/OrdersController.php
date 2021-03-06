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
        $data = ['orders' => Orders::paginate(2)];

        return view('orders.index', $data);
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
        // Get info from url variables
        $order_array = $request->input('order', []);
        $items_array = $request->input('items', []);

        if (count($order_array) > 0) {
            try {
                // Create order
                $order = Orders::create($order_array);
                $order->find($order->id);

                // Get order items
                if (count($items_array) > 0) {
                    foreach ($items_array as $item) {
                        $items[] = new OrderItems($item);
                    }

                    $order->items()->saveMany($items);
                }

                $status = true;
                $message = 'La orden fue creada exitosamente!';
            } catch (\Illuminate\Database\QueryException $e) {
                $status = false;
                $message = $e->errorInfo;
            }

        } else {
            $status = false;
            $message = 'La orden no tiene suficiente informacion!';
        }

        return [
            'status' => $status,
            'message' => $message,
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
