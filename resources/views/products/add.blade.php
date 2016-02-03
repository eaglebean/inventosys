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
                    <h1 class="page-header">Agregar Productos</h1>

                    <div id="products_app">

                        <div class="panel panel-default">
                            <!-- panel-heading -->
                            <div class="panel-heading">
                               Informacion del producto

                               <div class="btn-group pull-right">
                                    <button type="button" class="btn btn-default" aria-label="Left Align" title="IMPORTAR">
                                        <i class="fa fa-file-excel-o"> </i>
                                    </button>
                                    <button type="button" class="btn btn-default" aria-label="Center Align" title="LISTA">
                                        <i class="fa fa-list"></i>
                                    </button>
                                </div>
                                <div class="clearfix"></div>

                            </div>
                            <!-- /.panel-heading -->

                            <!-- panel-body -->
                            <div class="panel-body">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label class="col-md-12 control-label">Codigo (Contpaq)</label>
                                            <div class="col-md-12 margin-bottom">
                                                <input type="text" class="form-control" v-model="product.contpaq_id">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="col-md-12 control-label">Codigo barra (empaque)</label>
                                            <div class="col-md-12 margin-bottom">
                                                <input type="text" class="form-control" v-model="product.barcode">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group " v-bind:class="{'has-error':isStyle}">
                                        <label class="col-md-12 control-label">Estilo (Nombre)</label>
                                        <div class="col-md-12 margin-bottom">
                                            <input id="prodcut_style" type="text" class="form-control" v-model="product.style" placeholder="Por ejemplo: Flex Junior">
                                            <span id="helpBlock2" class="help-block" v-if="isStyle">Este campo es requerido!</span>
                                        </div>
                                    </div>

                                    <label class="col-md-12 control-label">Descripcion Generica</label>
                                    <div class="col-md-12 margin-bottom">
                                        <textarea class="form-control"  v-model="product.description"></textarea>
                                    </div>


                                    <div class="col-md-12 margin-bottom">
                                        <input type="checkbox" v-model="product.active" >
                                        <label class="control-label">Activado</label>
                                    </div>
                                </div>
                            </div>
                            <!-- /.panel-body -->
                        </div>

                        <div class="panel panel-default">
                            <!-- panel-heading -->
                            <div class="panel-heading">
                               Attributos del producto
                            </div>
                            <!-- /.panel-heading -->

                            <!-- panel-body -->
                            <div class="panel-body">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-2">
                                            <label class="col-md-12 control-label">Tipo de calzado</label>
                                            <div class="col-md-12 margin-bottom">
                                                <select v-model="product.footwear_type_id" class="form-control">
                                                    @foreach ($footweartypes as $footweartype)
                                                    <option value="{{$footweartype->id}}">{{$footweartype->label}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-2">
                                            <label class="col-md-12 control-label">Color</label>
                                            <div class="col-md-12 margin-bottom">
                                                <select v-model="product.color_id" class="form-control">
                                                    @foreach ($colors as $color)
                                                    <option value="{{$color->id}}">{{$color->label}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-2">
                                            <label class="col-md-12 control-label">Talla</label>
                                            <div class="col-md-12 margin-bottom">
                                                <select v-model="product.size_id" class="form-control">
                                                    @foreach ($sizes as $size)
                                                    <option value="{{$size->id}}">{{$size->label}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-2">
                                            <label class="col-md-12 control-label">Qty (pares/contenedor)</label>
                                            <div class="col-md-12 margin-bottom">
                                                <input type="number" class="form-control" min="0" v-model="product.qty_container">
                                            </div>
                                        </div>

                                        <div class="col-md-2">
                                            <label class="col-md-12 control-label">Tipo de unidad</label>
                                            <div class="col-md-12 margin-bottom">
                                            <select v-model="product.unit_id" class="form-control">
                                                @foreach ($units as $unit)
                                                    <option value="{{$unit->id}}">{{$unit->label}}</option>
                                                @endforeach
                                            </select>
                                            </div>
                                        </div>

                                    </div>
                                </div>


                            </div>
                            <!-- /.panel-body -->
                        </div>

                        <div class="clearfix"></div>
                        <button type="button" class="btn btn-primary pull-right" @click="saveAction" :disabled="isStyle">Guardar</button>


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
    <script src="/js/products.add.js"></script>

@stop
