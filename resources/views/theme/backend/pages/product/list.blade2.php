@extends('theme.app')

@section('title')

    @if(isset($title))
        {{ $title }}
    @else
        No Title
    @endif

@endsection


@section('page-breadcrumb')
    <ul class="page-breadcrumb">
        <li>
            <a href="{{ route('admin.product.index') }}">Home</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <span> Product List</span>
        </li>
    </ul>
@endsection


@section('page-toolbar')
@endsection


@section('theme-panel')
@endsection


@section('pagescript')
@endsection


@section('pageheadercss')

        <!-- BEGIN GLOBAL MANDATORY STYLES -->
        <link href="{{ asset('theme/assets/fonts/fonts.css')}}?family=Open+Sans:400,300,600,700&subset=all"  rel="stylesheet" type="text/css" />
        <link href="{{ asset('theme/assets/global/plugins/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('theme/assets/global/plugins/simple-line-icons/simple-line-icons.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('theme/assets/global/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('theme/assets/global/plugins/uniform/css/uniform.default.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('theme/assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css') }}" rel="stylesheet" type="text/css" />
        <!-- END GLOBAL MANDATORY STYLES -->

        <!-- DATATABLES -->
        <link href="{{ asset('theme/assets/global/plugins/datatables/datatables.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('theme/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css') }}" rel="stylesheet" type="text/css" />
        <!-- DATATABLES -->

        <!-- SELECT2 -->
        <link href="{{ asset('theme/assets/global/plugins/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('theme/assets/global/plugins/select2/css/select2-bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
        <!-- SELECT2 -->

        <!-- DATEPICKER -->
        <link href="{{ asset('theme/assets/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css') }}" rel="stylesheet" type="text/css" />
        <!-- DATEPICKER -->

        <!-- BEGIN THEME GLOBAL STYLES -->
        <link href="{{ asset('theme/assets/global/css/components.min.css') }}" rel="stylesheet" id="style_components" type="text/css" />
        <link href="{{ asset('theme/assets/global/css/plugins.min.css') }}" rel="stylesheet" type="text/css" />
        <!-- END THEME GLOBAL STYLES -->
        <!-- BEGIN THEME LAYOUT STYLES -->
        <link href="{{ asset('theme/assets/layouts/layout/css/layout.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('theme/assets/layouts/layout/css/themes/darkblue.min.css') }}" rel="stylesheet" type="text/css" id="style_color" />
        <link href="{{ asset('theme/assets/layouts/layout/css/custom.min.css') }}" rel="stylesheet" type="text/css" />
        <!-- END THEME LAYOUT STYLES -->
@endsection

@section('pagetitle')
    @if(isset($pagetitle))
        <!-- BEGIN PAGE TITLE-->
        <h3 class="page-title"> 
            {{ $pagetitle }}
        </h3>
        <!-- END PAGE TITLE-->
    @endif
@endsection


@section('content')

<!-- REPLACE WITH CONTENT -->
<div class="row">
    <div class="col-md-12">
        <!-- BEGIN EXAMPLE TABLE PORTLET-->
        <div class="portlet light bordered" id="form_wizard_1">
            <div class="portlet-title">
                <!-- <div class="caption font-dark">
                    <i class="icon-settings font-dark"></i>
                    <span class="caption-subject bold uppercase"> Managed Table</span>
                </div> -->
                <div class="caption">
                    <i class=" icon-list font-green-seagreen"></i>
                    <span class="caption-subject font-green-seagreen sbold uppercase">@if(isset($subject)) {{ $subject }} @else Subject @endif </span>
                </div>

                <div class="btn-group pull-right">
                    <a href="javascript:viewNote();" id="sample_editable_1_new" class="btn sbold green"> Add New
                        <i class="fa fa-plus"></i>
                    </a>
                </div>
            </div>

            <div class="portlet-body">
                <table class="table table-striped table-bordered table-hover table-checkable order-column" id="dataTableId1">
                    <thead>
                        <tr>
                            <th class="details-control">
                        
                            </th>
                            <th> ID </th>
                            <th> Name </th>
                            <th> Description </th>
                            <th> Creation Date </th>
                            <th> Created By </th>
                            <th> Status </th>
                            <th> Action </th> 

                        </tr>
                    </thead>
                    <tbody>
                    @if(0)
                        <tr>
                            <td class="details-control">
                            </td>
                            <td>
                                4568
                            </td>
                            <td>
                                <a href="javascript:referrenceDetails()" class="btn btn-xs"><strong>Mumbai</strong></a>
                            </td>
                            <td>
                                Mumbai
                            </td>
                            <td>
                                2016-05-25 12:56
                            </td>
                            <td>
                                dips
                            </td>
                            <td>
                                <a href="javascript:viewNote();" class="btn btn-xs green-seagreen">
                                    <i class="fa fa-search-plus"></i> Note
                                </a>
                            </td>
                            <td>
                                <a href="#" class="btn btn-xs red-mint btnAction">
                                    <i class="fa fa-cogs"></i> Delete
                                </a>
                                <a href="#" class="btn btn-xs red-mint btnAction">
                                    <i class="fa fa-cogs"></i> Edit
                                </a>
                            </td>
                            
                            
                            <td>
                                <a href="javascript:viewDetails();" class="btn btn-xs green-seagreen">
                                    <i class="fa fa-search-plus"></i> View
                                </a>
                            </td>
                            <td>
                                01
                            </td>
                            <td>
                                Online
                            </td>
                            <td>
                                <a href="javascript:viewCOD();" class="btn btn-xs red-mint">
                                    <i class="fa fa-search-plus"></i> 0
                                </a>
                            </td>
                            
                            <td>
                                <a href="javascript:viewWarehouse();" class="btn btn-xs green-seagreen">
                                    <i class="fa fa-search-plus"></i> Warehouse
                                </a>
                            </td>
                            <td>
                                <a href="javascript:viewTracking();" class="btn btn-xs green-seagreen">
                                    <i class="fa fa-search-plus"></i> Tracking
                                </a>
                            </td>
                            
                            
                        </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
        <!-- END EXAMPLE TABLE PORTLET-->
    </div>
</div>    
<!-- REPLACE ENDS -->

<!-- NOTE MODAL -->
<div class="modal fade" id="divNoteDetails" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title">Add Zone </h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">

                    <!-- Add Zone Form Start -->
                        <div class="portlet light bordered">
                            <div class="portlet-title">
                                <div class="caption font-red-sunglo">
                                    <i class="icon-settings font-red-sunglo"></i>
                                    <span class="caption-subject bold uppercase"> Add Zone</span>
                                </div>
                            </div>
                            <div class="portlet-body form">
                                {!! Form::open(array('route' => array('admin.product.store') , 'role' => "form") ) !!}
                                    <div class="form-body">
                                        <div class="form-group">
                                            <label>Name</label>
                                            
                                                <input id="zonename" type="text" class="form-control" name="zonename" placeholder="Zone Name">
                                                
                                        </div>   
                                        <div class="form-group">
                                            <label>Description</label>
                                            
                                                <input id="zonedescription" type="text" class="form-control" name="zonedescription" placeholder="Zone Description">
                                                
                                        </div>                                                          
                                        @if(0)
                                        <div class="form-group">
                                            <label>Status</label>
                                            <select class="form-control">
                                                <option>Enabled</option>
                                                <option>Disabled</option>                                                                    
                                            </select>
                                        </div>
                                        @endif 
                                        <div class="form-group">


                                            {!! Form::label('zonestatus', 'Status', ['class' => 'control-label']) !!}

                                            {!! Form::select('zonestatus', $statusList, $selectedStatus, ['class' => 'form-control']) !!}

                                        </div>
                                    </div>                                                               
                                    <div class="form-actions right">
                                        <button id="addZoneFormCancel" class="btn default pull-left" type="button">Cancel</button>

                                        <button id="addZoneFormSave" type="button" class="btn green-seagreen">
                                            <i class="fa fa-save"></i> Save
                                        </button>
                                    </div>
                                {!! Form::close() !!}
                            </div>
                        </div>
                        <!-- Add Zone Form End -->


                        
                        
                    </div>
                    
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn red-mint" data-dismiss="modal"> <i class="fa fa-times-circle"></i> Close</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- NOTE MODAL -->

@endsection


@push('pageheadcss')
<style type="text/css">
            #dataTableId1 td.details-control {
                background: url('{{ asset('theme/assets/layouts/layout2/img/datatable/details_open.png') }}') no-repeat center center;
                cursor: pointer;
            }
            #dataTableId1 tr.shown td.details-control {
                background: url('{{ asset('theme/assets/layouts/layout2/img/datatable/details_close.png') }}') no-repeat center center;
            }

            tfoot {
                display: table-header-group;
            }
        </style>

@endpush


@section('pagefooterscript')

        
<!-- BEGIN CORE PLUGINS -->
        <script src="{{ asset('theme/assets/global/plugins/jquery.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('theme/assets/global/plugins/bootstrap/js/bootstrap.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('theme/assets/global/plugins/js.cookie.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('theme/assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('theme/assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('theme/assets/global/plugins/jquery.blockui.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('theme/assets/global/plugins/uniform/jquery.uniform.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('theme/assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js') }}" type="text/javascript"></script>
        <!-- END CORE PLUGINS -->

         <!-- DATATABLES -->
        <script src="{{ asset('theme/assets/global/scripts/datatable.js') }}" type="text/javascript"></script>
        <script src="{{ asset('theme/assets/global/plugins/datatables/datatables.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('theme/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js') }}" type="text/javascript"></script>
        <!-- DATATABLES -->

        <!-- SELECT2 -->
        <script src="{{ asset('theme/assets/global/plugins/select2/js/select2.full.min.js') }}" type="text/javascript"></script>
        <!-- SELECT2 -->

        <!-- DATEPICKER -->
        <script src="{{ asset('theme/assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}" type="text/javascript"></script>
        <!-- DATEPICKER -->

        <!-- Bootbox -->
        <script src="{{ asset('theme/assets/global/plugins/bootbox/bootbox.min.js') }}" type="text/javascript"></script>
        <!-- Bootbox -->

        <!-- BEGIN THEME GLOBAL SCRIPTS -->
        <script src="{{ asset('theme/assets/global/scripts/app.min.js') }}" type="text/javascript"></script>
        <!-- END THEME GLOBAL SCRIPTS -->
        <!-- BEGIN THEME LAYOUT SCRIPTS -->
        <script src="{{ asset('theme/assets/layouts/layout/scripts/layout.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('theme/assets/layouts/layout/scripts/demo.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('theme/assets/layouts/global/scripts/quick-sidebar.min.js') }}" type="text/javascript"></script>
        <!-- END THEME LAYOUT SCRIPTS -->





<script type="text/javascript">

            

$(document).ready( function() {

            $( document ).on('click', '.btnAction', function( e ) {
            //alert("abc");
                e.preventDefault();
                console.log("dips");
                bootbox.dialog({
                    message: "I am a custom dialog",
                    title: "Custom title",
                    buttons: {
                        success: {
                            label: "<i class='fa fa-search-plus'></i> View",
                            className: "green-seagreen",
                            callback: function() {
                                alert("great success")
                            }
                        },
                        // danger: {
                        //     label: "Danger!",
                        //     className: "red",
                        //     callback: function() {
                        //         alert("uh oh, look out!")
                        //     }
                        // },
                        main: {
                            label: "<i class='fa fa-print'></i> Print",
                            className: "yellow-casablanca",
                            callback: function() {
                                alert("Primary button")
                            }
                        }
                    }
                });
            });


            $( document ).on('click', '#addZoneFormSave', function( e ) {
            
            e.preventDefault();

            var zonename = $("#zonename").val();
            var zonedescription = $("#zonedescription").val();
            var zonestatus = $("#zonestatus").val();

            //var removerow = $(this).parent().parent();

            $.ajaxSetup({
                    headers: {
                      'X-CSRF-TOKEN': $('input[name="_token"]').val(),
                    }
                });


                //alert("hi");
                //firstname lastname email telephone address1 city post-code region-state  newslettersubscribe  sameaddress privacypolicy
                var formData = {
                    zonename:zonename,
                    zonedescription:zonedescription,
                    zonestatus:zonestatus,
                }


                var type = "POST"; 

                var add2wishlisturl = "{{ route('admin.product.store') }}";
                
                console.log(formData);

                $.ajax({

                    type: type,
                    url: add2wishlisturl,
                    data: formData,
                    dataType: 'json',
                    success: function (data) {
                        console.log(data);
                        if(data.status == "success") {
                          //removerow.remove();
                          alert("Added to Zone List");
                        }
                        
                    },
                    error: function (data) {
                        console.log('Error:', data);
                    }
                });


            
        });

        });

            function referrenceDetails() {
                $('#divReferrenceNoDetails').modal('show');
            }

            function viewDetails() {
                $('#divViewCourierDetails').modal('show');
            }

            function viewCOD() {
                $('#divCODDetails').modal('show');
            }

            function viewNote() {
                $("#divNoteDetails").modal('show');
            }

            function viewWarehouse() {
                $("#divWarehouseDetails").modal('show');
            }

            function viewTracking() {
                $("#divTrackingDetails").modal('show');
            }

        



            <!-- // SERVERSIDE DATATABLE // -->

            function format ( d ) {
                console.log(d);

                return '<table class="table table-striped table-bordered">'+
                    '<tr>'+
                        '<td>Message:</td>'+
                        '<td>'+d['name']+'</td>'+
                    '</tr>'+
                    '<tr>'+
                        '<td>Remarks:</td>'+
                        '<td>'+d['description']+'</td>'+
                        //'<td><a href=javascript:diputeFunction('+d[0]+') class="btn btn-danger btn-xs">Dispute</a></td>'+
                    '</tr>'+
                '</table>';
            }
             
            $(document).ready( function() {
                
                var dt = $('#dataTableId1').DataTable( {
                    "language": {
                            lengthMenu:"_MENU_ ",
                            search:"",
                        },
                    "searching" : true,
                    "lengthChange": true,
                    "ordering":  false,
                    "pagingType":"bootstrap_extended",
                    "processing": true,
                    "serverSide": true,                    
                    "ajax": "{{ route('admin.product.datatable') }}",
                    "columns": [
                        {
                            "class":          "details-control",
                            "orderable":      false,
                            "data":           null,
                            "defaultContent": "",
                            "searchable":      false,

                        },
                        { data: 'id', name: 'id' },
                        { data: 'name', name: 'name' },
                        { data: 'description', name: 'description' },
                        { data: 'created_at', name: 'created_at' },
                        { data: 'user.name', name: 'user.name' },
                        { data: 'status.description', name: 'product_status_id' },
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
                } );
             
                // Array to track the ids of the details displayed rows
                var detailRows = [];
             
                $('#dataTableId1 tbody').on( 'click', 'tr td.details-control', function () {
                    var tr = $(this).closest('tr');
                    var row = dt.row( tr );
                    var idx = $.inArray( tr.attr('id'), detailRows );
             
                    if ( row.child.isShown() ) {
                        tr.removeClass( 'shown' );
                        row.child.hide();
             
                        // Remove from the 'open' array
                        detailRows.splice( idx, 1 );

                        // console.log(11);
                    }
                    else {
                        tr.addClass( 'shown' );
                        row.child( format( row.data() ) ).show();
                        //tr.addClass('shown');
             
                        // Add to the 'open' array
                        if ( idx === -1 ) {
                            detailRows.push( tr.attr('id') );
                        }

                        // console.log(22);
                    }
                } );
             
                // On each draw, loop over the `detailRows` array and show any child rows
                dt.on( 'draw', function () {
                    $.each( detailRows, function ( i, id ) {
                        $('#'+id+' td.details-control').trigger( 'click' );
                    } );
                } );

                jQuery("#dataTableId1_wrapper .dataTables_length select").select2();
                jQuery("#dataTableId1_wrapper .dataTables_filter input").removeClass('input-sm');
                jQuery("#dataTableId1_wrapper .dataTables_filter input").removeClass('input-small');
                jQuery("#dataTableId1_wrapper .dataTables_filter input").attr('placeholder','Search here');
            } );

            /*$(document).ready(function() {
                // Setup - add a text input to each footer cell
                $('#example03 tfoot th').each( function () {
                    var title = $(this).text();

                    if(title != "") {
                        $(this).html( '<input type="text" class="form-control" placeholder="Search '+title+'" />' );
                    }
                } );
             
                // DataTable
                var table = $('#example03').DataTable();
             
                // Apply the search
                table.columns().every( function () {
                    var that = this;
             
                    $( 'input', this.footer() ).on( 'keyup change', function () {
                        if ( that.search() !== this.value ) {
                            that.search( this.value ).draw();
                        }
                    } );
                } );
            } );*/

        

            <!-- // SERVERSIDE DATATABLE // -->

</script>



@endsection









@if(0)

@section('content')
    <div class="row">
        <div class="col-sm-offset-2 col-sm-8">
             <div class="panel panel-default">
                <div class="panel-heading">Product</div>
                <div class="panel-body">
                    <!--form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}"-->
                    {!! Form::open(array('route' => array('admin.product.store'), 'class' => "form-horizontal" , 'role' => "form" )) !!}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}">

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        
                        <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                            <label for="description" class="col-md-4 control-label">Description</label>

                            <div class="col-md-6">
                                <input id="description" type="text" class="form-control" name="description" value="{{ old('description') }}">

                                @if ($errors->has('description'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('brand') ? ' has-error' : '' }}">

                        
                        {!! Form::label('brand', 'Brand', ['class' => 'control-label col-md-4']) !!}
                        <div class="col-md-6">
                        {!! Form::select('brand', $brandList, $selectedBrand, ['class' => 'form-control']) !!}
                        </div>

                        </div>

                        <div class="form-group{{ $errors->has('category') ? ' has-error' : '' }}">

                        
                        {!! Form::label('category', 'Category', ['class' => 'control-label col-md-4']) !!}
                        <div class="col-md-6">
                        {!! Form::select('category', $categoryList, $selectedCategory, ['class' => 'form-control']) !!}
                        </div>

                        </div>


                        <div class="form-group{{ $errors->has('status') ? ' has-error' : '' }}">

                        
                        {!! Form::label('status', 'Status', ['class' => 'control-label col-md-4']) !!}
                        <div class="col-md-6">
                        {!! Form::select('status', $statusList, $selectedStatus, ['class' => 'form-control']) !!}
                        </div>

                        </div>

                        

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-user"></i> Save
                                </button>
                            </div>
                        </div>
                    <!--/form-->
                    {!! Form::close() !!}
                </div>
            </div>




            <!-- Current Tasks -->
            @if (count($products) > 0)
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Current Product List
                    </div>

                    <div class="panel-body">
                        <table class="table table-striped product-table">
                            <thead>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Status</th>
                                <th>&nbsp;</th>
                            </thead>
                            <tbody>
                                @foreach ($products as $product)
                                    <tr>
                                        <td class="table-text"><div>{{ $product->name }}</div></td>
                                        <td class="table-text"><div>{{ $product->description }}</div></td>
                                        <td class="table-text"><div>{{ $product->product_status_id }}</div></td>

                                        <!-- Task Delete Button -->
                                        <td>
                                            <form action="/product/{{ $product->id }}" method="POST">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}

                                                <button type="submit" class="btn btn-danger">
                                                    <i class="fa fa-btn fa-trash"></i>Delete
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection
 @endif