@extends('layout.master')

@section('title')
  @parent
  - Orden de compra (Ingreso manual)
@stop

@section('content')

    <div id="page-wrapper" style="min-height: 497px;">
        <div class="container-fluid">
            <div class="row">

                <div class="col-lg-12">
                    <h1 class="page-header">Lista de Ordenes</h1>



                    <div class="panel panel-default">

                        <!-- panel-heading -->
                        <div class="panel-heading">

                            <!-- toolbar -->
                            <div class="input-group">
                                <input type="text" class="form-control" aria-label="Search" placeholder="Search...">
                                <div class="input-group-btn">
                                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Action <span class="caret"></span></button>
                                    <ul class="dropdown-menu dropdown-menu-right">
                                        <li><a href="#" id="action_order_create"><i class="fa fa-plus insert-icon"> </i> Create</a></li>
                                        <li><a href="#" id="action_order_import"><i class="fa fa-file-o"> </i> Export</a></li>
                                        <li role="separator" class="divider"></li>
                                        <li><a href="#" id="action_order_delete"><i class="fa fa-trash delete-icon"> </i> Delete </a></li>
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
                                            <th class="md"><input type="checkbox" id="checkall"></th>
                                            <th>Tipo de orden</th>
                                            <th>Numero</th>
                                            <th>Descripcion</th>
                                            <th>Usuario</th>
                                            <th>Creada</th>
                                            <th>Actualizada</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($orders as $order )
                                            <tr data-id="{{$order->id}}">
                                                <td><input type="checkbox" class="checkbox-selection"></td>
                                                <td>{{$order->ordertype->label}}</td>
                                                <td><a href="#">{{$order->serie}}</a></td>
                                                <td>{{$order->description}}</td>
                                                <td>{{$order->user->name}}</td>
                                                <td>{{$order->created_at}}</td>
                                                <td>{{$order->updated_at}}</td>
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

                    <!-- pagination -->
                    {!! $orders->appends(['sort' => 'updated_atlaravel'])->render() !!}
                    <!-- pagination -->



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

@stop
