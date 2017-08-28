@extends('layouts.front.theme.main')

 @section('title-wrapper')

 @endsection


 @section('breadcrumb')
     <ul class="breadcrumb">
            <li><a href="index.html">Home</a></li>
            <li><a href="">Store</a></li>
            <li class="active">My Account Page</li>
        </ul>
 @endsection


@section('sidebar')
	<!-- BEGIN SIDEBAR -->
          <div class="sidebar col-md-3 col-sm-3">
            <ul class="list-group margin-bottom-25 sidebar-menu">
              <li class="list-group-item clearfix"><a href="javascript:;"><i class="fa fa-angle-right"></i> Login/Register</a></li>
              <li class="list-group-item clearfix"><a href="javascript:;"><i class="fa fa-angle-right"></i> Restore Password</a></li>
              <li class="list-group-item clearfix"><a href="javascript:;"><i class="fa fa-angle-right"></i> My account</a></li>
              <li class="list-group-item clearfix"><a href="javascript:;"><i class="fa fa-angle-right"></i> Address book</a></li>
              <li class="list-group-item clearfix"><a href="javascript:;"><i class="fa fa-angle-right"></i> Wish list</a></li>
              <li class="list-group-item clearfix"><a href="javascript:;"><i class="fa fa-angle-right"></i> Returns</a></li>
              <li class="list-group-item clearfix"><a href="javascript:;"><i class="fa fa-angle-right"></i> Newsletter</a></li>
            </ul>
          </div>
          <!-- END SIDEBAR -->
@endsection

@section('content')
	<!-- BEGIN CONTENT -->
          <div class="col-md-9 col-sm-7">
            <h1>My Account Page</h1>
            <div class="content-page">
              <h3>My Account</h3>
              <ul>
                <li><a href="javascript:;">Edit your account information</a></li>
                <li><a href="javascript:;">Change your password</a></li>
                <li><a href="javascript:;">Modify your address book entries</a></li>
                <li><a href="javascript:;">Modify your wish list</a></li>
              </ul>
              <hr>

              <h3>My Orders</h3>
              <ul>
                <li><a href="javascript:;">View your order history</a></li>
                <li><a href="javascript:;">Downloads</a></li>
                <li><a href="javascript:;">Your Reward Points</a></li>
                <li><a href="javascript:;">View your return requests</a></li>
                <li><a href="javascript:;">Your Transactions</a></li>
              </ul>
            </div>
          </div>
          <!-- END CONTENT -->
@endsection







@section('pagelevel-plugins-css')
  

  <!-- Page level plugin styles START -->
  <link href="{{ asset('assets/plugins/fancybox/source/jquery.fancybox.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/plugins/owl.carousel/assets/owl.carousel.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/plugins/uniform/css/uniform.default.css') }}" rel="stylesheet" type="text/css">
  <link href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" rel="stylesheet" type="text/css"><!-- for slider-range -->
  <link href="{{ asset('assets/plugins/rateit/src/rateit.css') }}" rel="stylesheet" type="text/css">
  <!-- Page level plugin styles END -->


  @endsection


          
@section('footer-page-level-javascripts')

<!-- BEGIN PAGE LEVEL JAVASCRIPTS (REQUIRED ONLY FOR CURRENT PAGE) -->
    <script src="{{ asset('assets/plugins/fancybox/source/jquery.fancybox.pack.js') }}" type="text/javascript"></script><!-- pop up -->
    <script src="{{ asset('assets/plugins/owl.carousel/owl.carousel.min.js') }}" type="text/javascript"></script><!-- slider for products -->
    <script src="{{ asset('assets/plugins/zoom/jquery.zoom.min.js') }}" type="text/javascript"></script><!-- product zoom -->
    <script src="{{ asset('assets/plugins/bootstrap-touchspin/bootstrap.touchspin.js') }}" type="text/javascript"></script><!-- Quantity -->
    <script src="{{ asset('assets/plugins/uniform/jquery.uniform.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/plugins/rateit/src/jquery.rateit.js') }}" type="text/javascript"></script>
    <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js" type="text/javascript"></script><!-- for slider-range -->

    
    <!-- END PAGE LEVEL JAVASCRIPTS -->
@endsection



@section('initscript')
<script src="{{ asset('assets/corporate/scripts/layout.js') }}" type="text/javascript"></script>
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