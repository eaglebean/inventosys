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

                        <!-- panel-heading -->
                        <div class="panel-heading">

                            <!-- toolbar -->
                            <div class="input-group">
                                <input type="text" class="form-control" aria-label="Search" placeholder="Search...">
                                <div class="input-group-btn">
                                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Action <span class="caret"></span></button>
                                    <ul class="dropdown-menu dropdown-menu-right">
                                        <li><a href="#" id="action_user_create"><i class="fa fa-plus insert-icon"> </i> Create User</a></li>
                                        <li><a href="#" id="action_user_import"><i class="fa fa-file-o"> </i> Import Users</a></li>

                                        <li role="separator" class="divider"></li>
                                        <li><a href="#" id="action_user_delete"><i class="fa fa-trash delete-icon"> </i> Delete </a></li>
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
                                            <th>Nombre</th>
                                            <th>Email</th>
                                            <th>Creado</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($users as $user )
                                            <tr>
                                                <td><input type="checkbox" id="user_id"></td>
                                                <td>{{$user->name}}</td>
                                                <td>{{$user->email}}</td>
                                                <td>{{$user->created_at}}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table -->

                            <!-- pagination -->
                            {!! $users->render() !!}
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
    <script src="/js/users.js"></script>
@stop
