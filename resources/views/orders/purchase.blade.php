@extends('layout.master')

@section('title')
  @parent
  - Orden de compra (Ingreso manual)
@stop

@section('content')

    <div id="page-wrapper" style="min-height: 497px;">
        <div class="container-fluid">
            <div class="row" id="purchase_app" >

                <div class="col-lg-12">
                    <h1 class="page-header">Orden de compra</h1>

                    <div class="panel panel-default">

                        <!-- panel-heading -->
                        <div class="panel-heading">
                            <strong>Crear orden de compra</strong>
                        </div>
                        <!-- /.panel-heading -->

                        <!-- panel-body -->
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <form class="form-horizontal">
                                        <div class="form-group">

                                            <label class="col-md-2 control-label" for="order_serie">Serie</label>
                                            <div class="col-md-10 margin-bottom">
                                                <input id="order_serie" name="order_serie" type="text" placeholder="Numero de serie" class="form-control input-md">
                                            </div>

                                            <label class="col-md-2 control-label" for="order_folio">Folio</label>
                                            <div class="col-md-10 margin-bottom">
                                                <input id="order_folio" name="order_folio" type="text" placeholder="Numero de folio" class="form-control input-md">
                                            </div>

                                            <label class="col-md-2 control-label" for="order_making">Numero de factura</label>
                                            <div class="col-md-10 margin-bottom">
                                                <input id="order_making" name="order_making" type="text" placeholder="Numero de factura" class="form-control input-md">
                                            </div>

                                            <label class="col-md-2 control-label" for="description">Descripcion</label>
                                            <div class="col-md-10 margin-bottom">
                                                <textarea id="description" name="description"  placeholder="Introduce una breve descripcion" class="form-control input-md"> </textarea>
                                            </div>

                                            <div class="col-md-12 margin-bottom">
                                                <hr>
                                                <div class="panel panel-default">
                                                    <div class="panel-heading">
                                                        <div class="row">
                                                            <div class="col-md-2">
                                                                <input id="model" type="text" placeholder="Modelo" class="form-control input-md" v-model="model">
                                                            </div>
                                                            <div class="col-md-2">
                                                                <input id="qty" type="number" placeholder="Cantidad" class="form-control input-md" v-model="qty">
                                                            </div>
                                                            <div class="col-md-2">
                                                                <input id="description" type="text" placeholder="Descripcion" class="form-control input-md" v-model="description">
                                                            </div>
                                                            <div class="col-md-2">
                                                                <input id="status_id" type="number" placeholder="Status" class="form-control input-md" v-model="status_id">
                                                            </div>
                                                            <div class="col-md-2">
                                                                <input id="user_id" type="number" placeholder="Usuario" class="form-control input-md" v-model="user_id">
                                                            </div>
                                                            <div class="col-md-2">
                                                                <button type="button" class="btn btn-primary pull-right" @click="addItems" > Agregar</button>
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <div class="panel-body">
                                                        <table class="table table-hover">
                                                            <thead>
                                                                <tr>
                                                                    <th>modelo</th>
                                                                    <th>Cantidad</th>
                                                                    <th>Descripcion</th>
                                                                    <th>Status</th>
                                                                    <th>Usuario</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                              <tr v-for="item in items">
                                                                <td>
                                                                    <input id="model" type="text" placeholder="Modelo" class="form-control input-md" v-model="item.model">
                                                                </td>
                                                                <td>
                                                                    <input name="item_qty" type="number" class="form-control input-md" v-bind:value="item.qty">
                                                                </td>
                                                                <td>
                                                                    <input name="item_descirption" type="text" class="form-control input-md" v-bind:value="item.description">
                                                                </td>
                                                                <td>
                                                                    <input name="item_status" type="text" class="form-control input-md" v-bind:value="item.status_id">
                                                                </td>
                                                                <td>
                                                                    @{{item.user_id}}
                                                                </td>
                                                              </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                            </div>

                                            </div>

                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- /.panel-body -->
                    </div>



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
    <script src="/js/orders.js"></script>
@stop
