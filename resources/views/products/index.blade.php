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
                                            <th>Codigo (Contpaq)</th>
                                            <th>Estilo (Nombre)</th>
                                            <th>Tipo Calzado</th>
                                            <th>Color</th>
                                            <th>Talla</th>
                                            <th>Tipo Unidad</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($products as $product )
                                            <tr data-id="{{$product->id}}">
                                                <td><input type="checkbox" class="checkbox-selection"></td>
                                                <td>{{$product->contpaq_id}}</td>
                                                <td><button type="button" class="btn btn-link button-edit" data-toggle="modal" data-target="#modal-AddProducts">{{$product->style}}</button></td>
                                                <td>{{$product->getFootweartype()}}</td>
                                                <td>{{$product->getColor()}}</td>
                                                <td>{{$product->getSize()}}</td>
                                                <td>{{$product->getUnit()}}</td>
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


@stop
@section("scripts")
    @parent
    <script src="/js/list.js"></script>
    <script src="/js/products.js"></script>

@stop
