@extends('theme.backend.layouts.app')


	@section('content')
    <section class="content">
        <div class="container-fluid">
            @include('theme.backend.layouts.block-header')
            @if(0)
            <div class="block-header">
                <h2>
                    JQUERY DATATABLES
                    <small>Taken from <a href="https://datatables.net/" target="_blank">datatables.net</a></small>
                </h2>
            </div>
            @endif
            <!-- Basic Examples -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                {{ $contentCardHeaderTitle }}
                            </h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="{{ route('admin.product.index') }}">Category List</a></li>
                                        @if(0)
                                        <li><a href="javascript:void(0);">Another action</a></li>
                                        <li><a href="javascript:void(0);">Something else here</a></li>
                                        @endif
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="body">                            
                            {!! Form::open(array('route' => array('admin.product.store') )) !!}
                                <label for="product_name">Name</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="name" id="product_name" class="form-control" placeholder="Enter product name">
                                    </div>
                                </div>

                                <label for="product_description">Desciption</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="description" id="product_description" class="form-control" placeholder="Enter product description">
                                    </div>
                                </div>
                                
                                <br>
                                <button type="submit" class="btn bg-teal btn-lg waves-effect">
                                    <i class="material-icons">save</i>
                                    <span>SAVE</span>
								</button>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Basic Examples -->
            
        </div>
    </section>
    @endsection


    @section('pageLevelPluginCSS')
    <!-- JQuery DataTable Css -->
    <link href="{{ asset('theme/backend/AdminBSBMaterialDesign/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css') }}" rel="stylesheet" />
    @endsection
    

    @section('pageLevelPluginJS')
    <!-- Jquery DataTable Plugin Js -->
    <script src="{{ asset('theme/backend/AdminBSBMaterialDesign/plugins/jquery-datatable/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('theme/backend/AdminBSBMaterialDesign/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js') }}"></script>

    @endsection




    @section('pageLevelJS')
    <script src="{{ asset('theme/backend/AdminBSBMaterialDesign/js/pages/tables/jquery-datatable.js') }}"></script>
    @endsection
