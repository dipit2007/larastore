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
            <div class="alert bg-green alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    Lorem ipsum dolor sit amet, id fugit tollit pro, illud nostrud aliquando ad est, quo esse dolorum id
            </div>
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
                                        <li><a href="{{ route('admin.category.create') }}">Add Category</a></li>
                                        @if(0)
                                        <li><a href="javascript:void(0);">Another action</a></li>
                                        <li><a href="javascript:void(0);">Something else here</a></li>
                                        @endif
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table id="dataTableId1" class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Description</th>
                                            <th>Created At</th>
                                            <th>Created By</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                    </tbody>
                                </table>
                            </div>
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
    
    <!-- Bootstrap Select Css -->
    <link href="{{ asset('theme/backend/AdminBSBMaterialDesign/plugins/bootstrap-select/css/bootstrap-select.css') }}" rel="stylesheet" />

    @endsection
    

    @section('pageLevelPluginJS')
    <!-- Jquery DataTable Plugin Js -->
    <script src="{{ asset('theme/backend/AdminBSBMaterialDesign/plugins/jquery-datatable/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('theme/backend/AdminBSBMaterialDesign/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js') }}"></script>

    @endsection



    @section('pageLevelJS')



    <script>

        var dt = $('#dataTableId1').DataTable( {
            "language": {
                lengthMenu:"_MENU_ ",
                search:"",
            },
            "searching" : true,
            "lengthChange": true,
            "ordering":  false,
            "processing": true,
            "serverSide": true,                    
            "ajax": "{{ route('admin.category.datatable') }}",
            "columns": [
            
            { data: 'id', name: 'id' },
            { data: 'name', name: 'name' },
            { data: 'description', name: 'description' },
            { data: 'created_at', name: 'created_at' },
            { data: 'user.name', name: 'user.name' },
            { data: 'status', name: 'status' },
            /*{ data: 'delete', name: 'delete' , searchable:      false,},*/
            {

                "orderable":      false,
                "data":           'id',
                "render": function ( data, type, row ) {

                    return '<a href="#" class="btn btn-xs red-mint btnAction" data-zoneid="'+ row['id'] +'">'+
                    '<i class="fa fa-cogs"></i> Delete'+
                    '</a>';


                },
            },
            ],
            "order": [[1, 'asc']]
        });

    </script>

    @endsection
