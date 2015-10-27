@extends('layout.master')

@section('title')
  @parent
  - Dashboard 2
@stop

@section('content')

    <div id="page-wrapper" style="min-height: 497px;">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Users</h1>

                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Hover Rows
                        </div>

                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Nombre</th>
                                            <th>Email</th>
                                            <th>Creado</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>Juanito Banana</td>
                                            <td>juanito.banana@gmail.com</td>
                                            <td>01-01-2015 9:55 AM</td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>1</td>
                                            <td>Juanito Banana</td>
                                            <td>juanito.banana@gmail.com</td>
                                            <td>01-01-2015 9:55 AM</td>
                                        </tr>
                                        <tr>
                                            <td>1</td>
                                            <td>Juanito Banana</td>
                                            <td>juanito.banana@gmail.com</td>
                                            <td>01-01-2015 9:55 AM</td>
                                        </tr>
                                    </tbody>
                                </table>

                                <nav>
                                    <ul class="pagination">
                                        <li class="disabled"><a href="#" aria-label="Previous"><span aria-hidden="true">«</span></a></li>
                                        <li class="active"><a href="#">1 <span class="sr-only">(current)</span></a></li>
                                        <li><a href="#">2</a></li>
                                        <li><a href="#">3</a></li>
                                        <li><a href="#">4</a></li>
                                        <li><a href="#">5</a></li>
                                        <li><a href="#" aria-label="Next"><span aria-hidden="true">»</span></a></li>
                                    </ul>
                               </nav>

                            </div>
                            <!-- /.table-responsive -->
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
