@extends('layout.master')

@section('title')
  @parent
  - Productos
@stop

@section('content')

    <div id="page-wrapper" style="min-height: 497px;">
        <div class="container-fluid">
            <div class="row">

                <div class="col-lg-12">
                    <h1 class="page-header">Productos</h1>



                    <div class="panel panel-default">

                        <!-- panel-heading -->
                        <div class="panel-heading">

                            <!-- toolbar -->
                            <div class="input-group">
                                <input type="text" class="form-control" aria-label="Search" placeholder="Search...">
                                <div class="input-group-btn">
                                    <button type="button" class="btn btn-default dropdown-toggle fixbutton-height" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Action <span class="caret"></span></button>
                                    <ul class="dropdown-menu dropdown-menu-right">
                                        <li><a href="#" id="action-create" data-toggle="modal" data-target="#modal-AddProducts"><i class="fa fa-plus insert-icon"> </i> Agregar</a></li>
                                        <li><a href="#" id="action-export"><i class="fa fa-file-o"> </i> Exportar</a></li>
                                        <li><a href="#" id="action-import"><i class="fa fa-arrow-circle-o-down"> </i> Importar</a></li>
                                        <li role="separator" class="divider"></li>
                                        <li><a href="#" id="action-delete"><i class="fa fa-trash delete-icon"> </i> Borrar </a></li>
                                    </ul>
                                </div>
                            </div>
                            <!-- /.toolbar -->

                        </div>
                        <!-- /.panel-heading -->

                        <!-- panel-body -->
                        <div class="panel-body">

                            <!-- table -->
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th><input type="checkbox" id="checkall"></th>
                                            <th>Articulo</th>
                                            <th>Unidad</th>
                                            <th>Modelo</th>
                                            <th>Descripcion</th>
                                            <th>Activado</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($products as $product )
                                            <tr data-id="{{$product->id}}">
                                                <td><input type="checkbox" class="checkbox-selection"></td>
                                                <td><button type="button" class="btn btn-link button-edit" data-toggle="modal" data-target="#modal-AddProducts">{{$product->name}}</button></td>
                                                <td>{{$product->unit}}</td>
                                                <td>{{$product->model}}</td>
                                                <td>{{$product->description}}</td>
                                                <td>{{$product->active}}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table -->

                            <!-- pagination -->

                            <!-- ./pagination -->
                        </div>
                        <!-- /.panel-body -->
                    </div>



                </div>
                <!-- /.col-lg-12 -->

            </div>
            <!-- /.row -->


        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /#page-wrapper -->

    <!-- TEMPLATES -->

    <!-- Modal -->
    <div id="products_app">

        <div class="modal fade" id="modal-AddProducts" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">@{{modalTitle}}</h4>
              </div>
              <div class="modal-body">


                <div class="form-group">

                    <div class="form-group " v-bind:class="{'has-error':isName}">
                        <label class="col-md-12 control-label">Nombre del producto</label>
                        <div class="col-md-12 margin-bottom">
                            <input id="prodcut_name" type="text" class="form-control" v-model="product.name">
                            <span id="helpBlock2" class="help-block" v-if="isName">Este campo es requerido!</span>
                        </div>
                    </div>

                    <div class="form-group " v-bind:class="{'has-error':isModel}">
                        <label class="col-md-12 control-label">Modelo</label>
                        <div class="col-md-12 margin-bottom">
                            <input type="text" class="form-control" v-model="product.model">
                            <span id="helpBlock2" class="help-block" v-if="isModel">Este campo es requerido!</span>
                        </div>
                    </div>

                    <label class="col-md-12 control-label">Unidad</label>
                    <div class="col-md-12 margin-bottom">
                        <input type="text" class="form-control" v-model="product.unit">
                    </div>

                    <label class="col-md-12 control-label">Descripcion</label>
                    <div class="col-md-12 margin-bottom">
                        <textarea class="form-control"  v-model="product.description"></textarea>
                    </div>

                    <div class="col-md-12 margin-bottom">
                        <input type="checkbox" v-model="product.active" >
                        <label class="control-label">Activado</label>
                    </div>
                </div>
                <div class="clearfix"></div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" @click="saveAction" :disabled="isName || isModel">Guardar</button>
              </div>
            </div>
          </div>
        </div>

        <pre>@{{$data | json}}</pre>

    </div>
    <!-- TEMPLATES -->


@stop
@section("scripts")
    @parent
    <script src="/js/products.js"></script>

@stop
