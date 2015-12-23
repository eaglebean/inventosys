<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\OrderItems;


class OrderItems extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
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
        $order_id = $request->input('order_id');
        $model = $request->input('item_model');
        $qty = $request->input('item_qty', 0);
        $description = $request->input('item_description', null);
        $status_id = $request->input('item_status_id', 0);

        // Save order items
        $order_items = new OrderItems;
        $order_items->order_id = $order_id;
        $order_items->model = $model;
        $order_items->qty = $qty;
        $order_items->description = $description;
        $order_items->status_id = $status_id;
        $order_items->save();

        return [
            'status' => true,
            'message' => "Items were inserted",
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
}
