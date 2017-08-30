@extends('layouts.front.theme.main')

 @section('title-wrapper')

 @endsection


 @section('breadcrumb')
     
 @endsection


@section('sidebar')
	
@endsection

@section('content')
	<!-- BEGIN CONTENT -->
          <div class="col-md-12 col-sm-12">
            <h1>Shopping cart</h1>
            <div class="shopping-cart-page">
              <div class="shopping-cart-data clearfix">
                <div class="alert alert-danger alert-dismissable">  <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button> <strong>Your shopping cart is empty!</strong></div>
              </div>
            </div>
          </div>
    <!-- END CONTENT -->
@endsection


@section('similar-products')

@include('layouts.front.theme.similar-products')

@endsection



@section('pagelevel-plugins-css')
  
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
        <link href="{{ asset('theme/assets/global/css/animate.css') }}" rel="stylesheet" type="text/css" />

  <!-- Page level plugin styles START -->
  <link href="{{ asset('theme/frontend/assets/plugins/fancybox/source/jquery.fancybox.css') }}" rel="stylesheet">
  <link href="{{ asset('theme/frontend/assets/plugins/owl.carousel/assets/owl.carousel.css') }}" rel="stylesheet">
  <link href="{{ asset('theme/frontend/assets/plugins/uniform/css/uniform.default.css') }}" rel="stylesheet" type="text/css">
  <link href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" rel="stylesheet" type="text/css"><!-- for slider-range -->
  <link href="{{ asset('theme/frontend/assets/plugins/rateit/src/rateit.css') }}" rel="stylesheet" type="text/css">
  <!-- Page level plugin styles END -->


  @endsection


          
@section('footer-page-level-javascripts')

<!-- BEGIN PAGE LEVEL JAVASCRIPTS (REQUIRED ONLY FOR CURRENT PAGE) -->
    <script src="{{ asset('theme/frontend/assets/plugins/fancybox/source/jquery.fancybox.pack.js') }}" type="text/javascript"></script><!-- pop up -->
    <script src="{{ asset('theme/frontend/assets/plugins/owl.carousel/owl.carousel.min.js') }}" type="text/javascript"></script><!-- slider for products -->
    <script src="{{ asset('theme/frontend/assets/plugins/zoom/jquery.zoom.min.js') }}" type="text/javascript"></script><!-- product zoom -->
    <script src="{{ asset('theme/frontend/assets/plugins/bootstrap-touchspin/bootstrap.touchspin.js') }}" type="text/javascript"></script><!-- Quantity -->
    <script src="{{ asset('theme/frontend/assets/plugins/uniform/jquery.uniform.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('theme/frontend/assets/plugins/rateit/src/jquery.rateit.js') }}" type="text/javascript"></script>
    <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js" type="text/javascript"></script><!-- for slider-range -->

    
    <!-- END PAGE LEVEL JAVASCRIPTS -->
@endsection



@section('initscript')
<script src="{{ asset('theme/frontend/assets/corporate/scripts/layout.js') }}" type="text/javascript"></script>
    <script type="text/javascript">
        jQuery(document).ready(function() {
            Layout.init();    
            Layout.initOWL();
            //Layout.initTwitter();
            Layout.initImageZoom();
            Layout.initTouchspin();
            Layout.initUniform();
            Layout.initSliderRange();

            Layout.initFixHeaderWithPreHeader();
            Layout.initNavScrolling();
        });
    </script>
@endsection