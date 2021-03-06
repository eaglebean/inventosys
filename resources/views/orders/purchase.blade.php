@extends('layout.master')

@section('title')
  @parent
  - Orden de compra (Ingreso manual)
@stop

@section("styles")
@parent
    <link rel="stylesheet" type="text/css" href="/css/selectize.bootstrap3.css">


@stop

@section('content')

    <div id="page-wrapper" style="min-height: 497px;">
        <div class="container-fluid">
            <div class="row" id="purchase_app" >

                <div class="col-lg-12">
                    <h1 class="page-header">Orden de compra</h1>

                    <div class="panel panel-default">

                        <div class="panel-heading">
                            <!-- **************************************************************** -->
                            <!-- CHECK THE BEST WAY TO PASS USER INFO TO VIEWS!!!!  -->
                            <!-- **************************************************************** -->
                            <strong>Informacion de la orden</strong>
                        </div>

                        <div class="panel-body">
                            <div class="row">
                                <div class="form-group form-horizontal">
                                    <label class="col-md-2 control-label" for="order_serie">Serie</label>
                                    <div class="col-md-10 margin-bottom">
                                        <input id="order_serie" name="order_serie" type="text" placeholder="Numero de serie" class="form-control input-md" v-model="order.serie">
                                    </div>

                                    <label class="col-md-2 control-label" for="order_folio">Folio</label>
                                    <div class="col-md-10 margin-bottom">
                                        <input id="order_folio" name="order_folio" type="text" placeholder="Numero de folio" class="form-control input-md" v-model="order.folio">
                                    </div>

                                    <label class="col-md-2 control-label" for="order_making">Numero de factura</label>
                                    <div class="col-md-10 margin-bottom">
                                        <input id="order_making" type="text" placeholder="Numero de factura" class="form-control input-md" v-model="order.making">
                                    </div>

                                    <label class="col-md-2 control-label" for="description">Descripcion</label>
                                    <div class="col-md-10 margin-bottom">
                                        <textarea id="description" name="description"  placeholder="Introduce una breve descripcion" class="form-control input-md" v-model="order.description"> </textarea>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="panel panel-default">

                        <div class="panel-heading clearfix ">
                            <strong class="pull-left">Lista de articulos</strong>
                            <button type="button" class="btn btn-success pull-right" data-toggle="modal" data-target="#add-articles-modal" :disabled="allowAddArticles"><i class="fa fa-plus-circle"></i> Agregar Articulos</button>
                        </div>

                        <div class="panel-body">

                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th class="col-md-1">Cantidad</th>
                                                <th class="col-md-3">Estilo</th>
                                                <th class="col-md-1">Tipo Calzado</th>
                                                <th class="col-md-1">Color</th>
                                                <th class="col-md-1">Talla</th>
                                                <th class="col-md-3">Descripcion</th>
                                                <th class="col-md-1">Usuario</th>
                                                <th class="col-md-1">...</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr v-for="(key, item) in items">
                                                <td>

                                                    <input name="item_qty" type="number" min="1" class="form-control input-md" v-model="item.qty">

                                                </td>
                                                <td>
                                                   @{{item.style}}
                                                </td>

                                                <td>
                                                   @{{item.footweartype}}
                                                </td>

                                                <td>
                                                   @{{item.color}}
                                                </td>

                                                <td>
                                                   @{{item.size}}
                                                </td>

                                                <td>
                                                    <input name="item_descirption" type="text" class="form-control input-md" v-model="item.description">
                                                </td>

                                                <td>
                                                    @{{item.user_id}}
                                                </td>
                                                <td>
                                                    <button type="button" class="btn btn-default" @click="deleteItem(key)"><i class="fa fa-trash-o"></i></button>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                        </div>
                    </div>
                    <hr>

                    <button type="button" class="btn btn-primary pull-right" :disabled="errors" @click="createOrder"><i class="fa fa-floppy-o"></i> Guardar</button>
                </div>
                <!-- /.col-lg-12 -->

                <!-- modals -->
                <div class="modal fade" id="add-articles-modal" tabindex="-1" role="dialog">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">

                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="myModalLabel">Agregar Articulos</h4>
                            </div>

                            <div class="modal-body">
                                <div id="template-add-items" class="row" >

                                    <div class="form-group">
                                        <label class="col-md-12 control-label">Cantidad</label>
                                        <div class="col-md-12 margin-bottom">
                                            <input id="qty" type="number" min="1" placeholder="Cantidad" class="form-control input-md" v-model="qty" value="1">
                                        </div>

                                        <!-- searchbox -->
                                        <label class="col-md-12 control-label">Estilo (nombre del producto)</label>

                                        <div class="col-md-12 margin-bottom">
                                            <select id="select-products" placeholder="Selecciona un articulo..." ></select>
                                        </div>

                                        <label class="col-md-12 control-label">Descripcion</label>
                                        <div class="col-md-12 margin-bottom">
                                            <textarea id="description" type="text" placeholder="Descripcion" class="form-control input-md" v-model="description"></textarea>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                                <button type="button" class="btn btn-primary" @click="addItems" :disabled="errors">Agregar</button>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- modals -->

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
    <script>
        var user_id = {{Auth::user()->id}}
    </script>
    <script src="/js/selectize.min.js"></script>
    <script src="/js/orders.js"></script>
@stop
