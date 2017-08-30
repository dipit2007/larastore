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
            <span>Create New Product</span>
        </li>
    </ul>
@endsection


@section('page-toolbar')

@foreach($errors as $error )
{{ $error }}

@endforeach
                                  
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
                @if(0)
                <div class="btn-group pull-right">
                    <a href="javascript:viewNote();" id="sample_editable_1_new" class="btn sbold green"> Add New
                        <i class="fa fa-plus"></i>
                    </a>
                </div>
                @endif
            </div>

            <div class="portlet-body form">
                <!-- New Order add For Form Start-->
                <!--form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}"-->
                {!! Form::open(array('route' => array('admin.product.store'), 'class' => "form-horizontal" , 'role' => "form" )) !!}
                    <div class="form-body  "> 



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
                        
                        
                    </div>
                
                                                                                 
                    <div class="form-actions right">
                        <button id="addOrderFormCancel" class="btn default pull-left" type="button">Cancel</button>

                        <button id="addOrderFormSave" type="submit" class="btn green-seagreen">
                            <i class="fa fa-save"></i> Save
                        </button>
                    </div>
                    
                {!! Form::close() !!}
                <!-- New Order Add Form Ends -->

            </div>
        </div>
        <!-- END EXAMPLE TABLE PORTLET-->
    </div>
</div>    
<!-- REPLACE ENDS -->


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


@endsection





@if(0)
@section('content2')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
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
        </div>
    </div>
@endsection
@endif