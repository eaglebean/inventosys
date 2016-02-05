@extends('layout.master')

@section('title')
  @parent
  - Productos
@stop

@section('content')

    <div id="page-wrapper" style="min-height: 497px;">
        <div class="container-fluid" id="products_app">
            <div class="row">

                <div class="col-lg-12">
                    <h1 class="page-header">Importar Productos</h1>

                    <div id="products_app">

                        <div class="panel panel-default">
                            <!-- panel-heading -->
                            <div class="panel-heading">
                               Informacion del producto
                            </div>
                            <!-- /.panel-heading -->

                            <!-- panel-body -->
                            <div class="panel-body">
                                <!-- <div class="form-group"> -->
                                <div class="alert alert-info" role="alert">
                                    <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                                    Columnas permitidas: contpaq_id, codigo_barras, estilo, tipo_calzado_id, unidad_id, descripcion, color_id, talla_id, qty_contenedor

                                </div>
                                    <textarea
                                        id="productscsv"
                                        placeholder="Copia y pega una lista de valores separados por coma"
                                        class="form-control"

                                        v-model="rawlist">
                                    </textarea>

                                <!-- </div> -->
                            </div>
                            <!-- /.panel-body -->
                        </div>

                        <div class="clearfix"></div>
                        <button type="button" class="btn btn-primary pull-right" @click="importar" :disabled="!allowImport">Importar</button>

                        <pre>@{{$data | json}}</pre>
                    </div>


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
    <script src="/js/products.import.js"></script>

@stop
