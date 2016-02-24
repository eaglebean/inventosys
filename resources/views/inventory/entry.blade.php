@extends('layout.master')

@section('title')
  @parent
  Inventario - (Ingreso de articulos)
@stop

@section("styles")
  @parent
  <link rel="stylesheet" type="text/css" href="/css/selectize.bootstrap3.css">
@stop

@section('content')

    <div id="page-wrapper" style="min-height: 497px;">
        <div class="container-fluid">
            <div class="row">

                <div class="col-lg-12">
                    <h3 class="page-header">Inventario (ingreso)</h3>

                    <!-- Order info -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <form action="">
                                <div class="input-group">

                                    <!-- <span class="input-group-addon">Orden </span> -->
                                    <!-- <input type="text" id="order"  class="form-control" placeholder="Ingresa el numero de orden"> -->
                                    <select id="select-orders" placeholder="Ingresa el numero de orden..." ></select>


                                  <span class="input-group-btn">
                                    <button class="btn btn-default" type="button">Go!</button>
                                  </span>
                                </div>
                            </form>
                            <div class="clearfix"></div>
                        </div>

                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>Qty</th>
                                            <th>Ingresado</th>
                                            <th>Articulo</th>
                                            <th>Usuario</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                            <tr>
                                                <td>500</td>
                                                <td>0</td>
                                                <td>CalzadoABC</td>
                                                <td>Canito</td>
                                            </tr>

<tr>
                                                <td>500</td>
                                                <td>0</td>
                                                <td>CalzadoABC</td>
                                                <td>Canito</td>
                                            </tr>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- Order info -->

                    <!-- Inventory info -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Inventario
                        </div>

                        <div class="panel-body">
                            <div class="row">
                                <div class="col-xs-12">
                                    <div class="input-group">
                                        <span class="input-group-addon inventory-span-width">Bodega</span>
                                        <select>
                                             @foreach ($warehouses as $warehouse )
                                            <option value=""></option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-xs-12">
                                    <div class="input-group">
                                        <span class="input-group-addon inventory-span-width">Rack #</span>
                                        <input type="text" id="reack"  class="form-control" placeholder="Número de rack">
                                    </div>
                                </div>

                                <div class="col-xs-12">

                                    <div class="input-group">
                                        <span class="input-group-addon inventory-span-width">Sección #</span>
                                        <input type="text" id="seccion"  class="form-control" placeholder="Sección en el rack">
                                    </div>
                                </div>

                                <div class="clearfix"></div>
                                <hr class="divider">

                                <div class="col-xs-12">
                                    <div class="input-group">
                                        <span class="input-group-addon inventory-span-width">Qty #</span>
                                        <input type="number" id="reack"  class="form-control" placeholder="Cantidad a ingresar">
                                    </div>
                                </div>

                                <div class="col-xs-12">
                                    <div class="input-group">
                                        <span class="input-group-addon inventory-span-width">Modelo #</span>
                                        <input type="text" id="seccion"  class="form-control" placeholder="Articulo o modelo">
                                    </div>
                                </div>

                                <div class="clearfix margin-bottom"></div>

                                <div class="col-xs-12">
                                    <button type="button" class="btn btn-success pull-right">Ingresar</button>
                                </div>

                            </div>




                        </div>
                    </div>
                    <!-- Inventory info -->



                </div>
                <!-- /.col-lg-12 -->

            </div>
            <!-- /.row -->

        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /#page-wrapper -->
@stop
@section("scripts")
    @parent
    <script src="/js/selectize.min.js"></script>
    <script src="/js/inventory.entry.js"></script>
@stop
