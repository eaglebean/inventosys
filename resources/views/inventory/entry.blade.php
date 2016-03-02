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
            <div id="app" class="row">

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
                                            <th class="col-md-1">Qty</th>
                                            <th class="col-md-3">Ing</th>
                                            <th class="col-md-3">Estilo</th>
                                            <th class="col-md-1">Tipo Calzado</th>
                                            <th class="col-md-1">Color</th>
                                            <th class="col-md-1">Talla</th>
                                            <th class="col-md-1">Usuario</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr v-for="(key, item) in order.items" v-bind:class="{'text-strike':isClosed(item.status)}" data-index="@{{$index}}">
                                            <td>
                                                <p>@{{item.qty}}</p>
                                            </td>

                                            <td>
                                                <p>@{{item.entered_qty}}</p>
                                            </td>

                                            <td>
                                                <p>@{{item.product.style}}</p>
                                            </td>

                                            <td>
                                                <p>@{{item.product.footweartype}}</p>
                                            </td>

                                            <td>
                                                <p>@{{item.product.color}}</p>
                                            </td>

                                            <td>
                                                <p>@{{item.product.size}}</p>
                                            </td>

                                            <td>
                                                <p>@{{item.user.name}}</p>
                                            </td>
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
                                        <span class="input-group-addon inventory-span-width">Ubicación #</span>
                                        <input type="text" id="location"  class="form-control" placeholder="Ubicación en el rack. GDL-R01-S01">
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
                                        <span class="input-group-addon inventory-span-width">Estilo #</span>
                                        <input type="text" id="seccion"  class="form-control" placeholder="Codigo de barra del producto">
                                    </div>
                                </div>

                                <div class="clearfix"></div>

                                <div class="col-xs-12">
                                    <button type="button" class="btn btn-success pull-right">Ingresar</button>
                                </div>

                            </div>




                        </div>
                    </div>
                    <!-- Inventory info -->



                </div>
                <!-- /.col-lg-12 -->
<pre>@{{$data | json}}</pre>
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
