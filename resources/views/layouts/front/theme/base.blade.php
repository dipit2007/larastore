<!DOCTYPE html>
<!--
Template: Metronic Frontend Freebie - Responsive HTML Template Based On Twitter Bootstrap 3.3.4
Version: 1.0.0
Author: KeenThemes
Website: http://www.keenthemes.com/
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Like: www.facebook.com/keenthemes
Purchase Premium Metronic Admin Theme: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
-->
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->

<!-- Head BEGIN -->
<head>
  <meta charset="utf-8">
  <title>@yield('page-title','Metronic Shop UI DIPS')</title>

  @section('page-meta')
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

  <meta content="Metronic Shop UI description" name="description">
  <meta content="Metronic Shop UI keywords" name="keywords">
  <meta content="keenthemes" name="author">

  <meta property="og:site_name" content="-CUSTOMER VALUE-">
  <meta property="og:title" content="-CUSTOMER VALUE-">
  <meta property="og:description" content="-CUSTOMER VALUE-">
  <meta property="og:type" content="website">
  <meta property="og:image" content="-CUSTOMER VALUE-"><!-- link to image for socio -->
  <meta property="og:url" content="-CUSTOMER VALUE-">
  @show

  @section('page-favicon')
  <link rel="shortcut icon" href="favicon.ico">
  @show

  @section('font-css')
  <!-- Fonts START -->
  <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700|PT+Sans+Narrow|Source+Sans+Pro:200,300,400,600,700,900&amp;subset=all" rel="stylesheet" type="text/css">
  <link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900&amp;subset=all" rel="stylesheet" type="text/css"><!--- fonts for slider on the index page -->  
  <!-- Fonts END -->
  @show

  @section('global-css')
  <!-- Global styles START -->          
  <link href="{{ asset('theme/frontend/assets/plugins/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
  <link href="{{ asset('theme/frontend/assets/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <!-- Global styles END --> 
  @show
   
  @section('pagelevel-plugins-css')
  <!-- Page level plugin styles START -->
  <link href="{{ asset('theme/frontend/assets/pages/css/animate.css') }}" rel="stylesheet">
  <link href="{{ asset('theme/frontend/assets/plugins/fancybox/source/jquery.fancybox.css') }}" rel="stylesheet">
  <link href="{{ asset('theme/frontend/assets/plugins/owl.carousel/assets/owl.carousel.css') }}" rel="stylesheet">
  <!-- Page level plugin styles END -->
  @show

  @section('pagelevel-theme-css')
  <!-- Theme styles START -->
  <link href="{{ asset('theme/frontend/assets/pages/css/components.css') }}" rel="stylesheet">
  <link href="{{ asset('theme/frontend/assets/pages/css/slider.css') }}" rel="stylesheet">
  <link href="{{ asset('theme/frontend/assets/pages/css/style-shop.css') }}" rel="stylesheet" type="text/css">
  <link href="{{ asset('theme/frontend/assets/corporate/css/style.css') }}" rel="stylesheet">
  <link href="{{ asset('theme/frontend/assets/corporate/css/style-responsive.css') }}" rel="stylesheet">
  <link href="{{ asset('theme/frontend/assets/corporate/css/themes/red.css') }}" rel="stylesheet" id="style-color">
  <link href="{{ asset('theme/frontend/assets/corporate/css/custom.css') }}" rel="stylesheet">
  <!-- Theme styles END -->
  @show

  @yield('header-extracss')
  @yield('header-extrajs')
</head>
<!-- Head END -->

<!-- Body BEGIN -->
<body class="ecommerce">
    @yield('stylecustomizer')

    @yield('topbarpreheader')
    
    @yield('header')
    
    @yield('title-wrapper')
    
    @yield('page-slider')
    
    @section('main-content')
    <div class="main">
      <div class="container">

        @yield('breadcrumb')
        
        @yield('sale-product-and-mew-arrivals')

        <!-- BEGIN SIDEBAR & CONTENT -->
        <div class="row margin-bottom-40 ">
          @yield('sidebar')

          @yield('content')
          
        </div>
        <!-- END SIDEBAR & CONTENT -->

        @yield('similar-products')

        @yield('two-products-and-promo')

      </div>
    </div>
    @show

    @yield('brands')
    

    @yield('steps-block')
    

    @yield('pre-footer')
    

    @yield('footer')
    

    @yield('product-pop-up')
    

    @section('footer-all-javascripts')
    


    @section('footer-core-javascripts')
    <!-- Load javascripts at bottom, this will reduce page load time -->
    <!-- BEGIN CORE PLUGINS (REQUIRED FOR ALL PAGES) -->
    <!--[if lt IE 9]>
    <script src="{{ asset('theme/frontend/assets/plugins/respond.min.js') }}"></script>  
    <![endif]-->
    <script src="{{ asset('theme/frontend/assets/plugins/jquery.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('theme/frontend/assets/plugins/jquery-migrate.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('theme/frontend/assets/plugins/bootstrap/js/bootstrap.min.js') }}" type="text/javascript"></script>      
    <script src="{{ asset('theme/frontend/assets/corporate/scripts/back-to-top.js') }}" type="text/javascript"></script>
    <script src="{{ asset('theme/frontend/assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js') }}" type="text/javascript"></script>
    <!-- END CORE PLUGINS -->
    @show

    @section('footer-page-level-javascripts')
    <!-- BEGIN PAGE LEVEL JAVASCRIPTS (REQUIRED ONLY FOR CURRENT PAGE) -->
    <script src="{{ asset('theme/frontend/assets/plugins/fancybox/source/jquery.fancybox.pack.js') }}" type="text/javascript"></script><!-- pop up -->
    <script src="{{ asset('theme/frontend/assets/plugins/owl.carousel/owl.carousel.min.js') }}" type="text/javascript"></script><!-- slider for products -->
    <script src="{{ asset('theme/frontend/assets/plugins/zoom/jquery.zoom.min.js') }}" type="text/javascript"></script><!-- product zoom -->
    <script src="{{ asset('theme/frontend/assets/plugins/bootstrap-touchspin/bootstrap.touchspin.js') }}" type="text/javascript"></script><!-- Quantity -->

    <script src="{{ asset('theme/frontend/assets/pages/scripts/bs-carousel.js') }}" type="text/javascript"></script>
    @show


    @section('initscript')
    <script src="{{ asset('theme/frontend/assets/corporate/scripts/layout.js') }}" type="text/javascript"></script>
    <script type="text/javascript">
        jQuery(document).ready(function() {
            Layout.init();    
            Layout.initOWL();
            Layout.initImageZoom();
            Layout.initTouchspin();
            Layout.initTwitter();
            
            Layout.initFixHeaderWithPreHeader();
            Layout.initNavScrolling();
        });
    </script>
    @show
    <!-- END PAGE LEVEL JAVASCRIPTS -->
    

    @show

    @yield('footer-extrajs')

</body>
<!-- END BODY -->
</html>