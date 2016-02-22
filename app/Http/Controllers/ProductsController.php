<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Metadata;
use App\Models\Products;
use Illuminate\Http\Request;
use Response;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $data = [
            'products' => Products::all(),
        ];
        return view('products.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        // Get color metadata
        $colors = Metadata::where('active', true)
            ->where('metadata_group_id', 3)
            ->orderBy('label', 'asc')
            ->get();

        // Get size metadata
        $sizes = Metadata::where('active', true)
            ->where('metadata_group_id', 4)
            ->orderBy('label', 'asc')
            ->get();

        $footweartypes = Metadata::where('active', true)
            ->where('metadata_group_id', 5)
            ->orderBy('label', 'asc')
            ->get();

        $units = Metadata::where('active', true)
            ->where('metadata_group_id', 6)
            ->orderBy('label', 'asc')
            ->get();

        $data = [
            'colors' => $colors,
            'sizes' => $sizes,
            'footweartypes' => $footweartypes,
            'units' => $units,
        ];

        return view('products.add', $data);
    }

    /**
     * Show the form to import new resources.
     *
     * @return Response
     */
    public function import()
    {
        return view('products.import');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        $products = $request->input('products', []);
        $cont = 1;
        $status = true;

        if ($products) {
            foreach ($products as $product) {
                if (Products::create($product)) {
                    $message = ($cont > 1) ? "$cont productos fueron creados con exito!" : "El producto fue creado con exito";
                } else {
                    $status = false;
                    $message = "Error al intentar crear el producto: " . $product["style"];
                    break;
                }
                $cont++;
            }
        } else {
            $status = false;
            $message = "Datos insuficientes para crear el producto";
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
        $product = Products::find($id);
        return Response::json($product);
    }

    /**
     * Display the specified resource by name.
     *
     * @param  string  $keyword
     * @return Response
     */
    public function search($keyword)
    {
        $products = Products::where("style", "LIKE", "%{$keyword}%")->get();

        foreach ($products as $product) {
            $product->footweartype = $product->getFootweartype();
            $product->color = $product->getColor();
            $product->size = $product->getSize();
            $product->unit = $product->getUnit();
        }
        return Response::json($products);
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
        $product_array = $request->input('product', []);

        if (Products::find($id)->update($product_array)) {
            $status = true;
            $message = "El producto " . $product_array['name'] . ", fue actualizado!";
        } else {
            $status = false;
            $message = "El prodcuto no fue actualizado";
        }

        return [
            'status' => $status,
            'message' => $message,
        ];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $ids
     * @return Response
     */
    public function destroy(Request $request)
    {
        $product_array = $request->input('slected_ids', []);
        $status = false;
        $message = "No fue posible borrar el/los productos seleccionados!";

        if (count($product_array) > 0) {
            if (Products::destroy($product_array)) {
                $status = true;
                $message = "La operacion de borrar fue realizada correctamente!";
            }
        }

        return [
            'status' => $status,
            'message' => $message,
        ];
    }
}
