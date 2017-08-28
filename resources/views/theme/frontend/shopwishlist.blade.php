@extends('layouts.front.theme.main')

 @section('title-wrapper')

 @endsection


 @section('breadcrumb')
     <ul class="breadcrumb">
            <li><a href="index.html">Home</a></li>
            <li><a href="">Store</a></li>
            <li class="active">My Wish List</li>
        </ul>
 @endsection


@section('sidebar')
	<!-- BEGIN SIDEBAR -->
          <div class="sidebar col-md-3 col-sm-5">
            <ul class="list-group margin-bottom-25 sidebar-menu">
              <li class="list-group-item clearfix"><a href="shop-product-list.html"><i class="fa fa-angle-right"></i> Ladies</a></li>
              <li class="list-group-item clearfix"><a href="shop-product-list.html"><i class="fa fa-angle-right"></i> Kids</a></li>
              <li class="list-group-item clearfix"><a href="shop-product-list.html"><i class="fa fa-angle-right"></i> Accessories</a></li>
              <li class="list-group-item clearfix"><a href="shop-product-list.html"><i class="fa fa-angle-right"></i> Sports</a></li>
              <li class="list-group-item clearfix"><a href="shop-product-list.html"><i class="fa fa-angle-right"></i> Brands</a></li>
              <li class="list-group-item clearfix"><a href="shop-product-list.html"><i class="fa fa-angle-right"></i> Electronics</a></li>
              <li class="list-group-item clearfix"><a href="shop-product-list.html"><i class="fa fa-angle-right"></i> Home &amp; Garden</a></li>
              <li class="list-group-item clearfix"><a href="shop-product-list.html"><i class="fa fa-angle-right"></i> Custom Link</a></li>
            </ul>
          </div>
          <!-- END SIDEBAR -->
@endsection

@section('content')
	<!-- BEGIN CONTENT -->
          <div class="col-md-9 col-sm-7">
            <h1>My Wish List</h1>
            <div class="goods-page">
              <div class="goods-data clearfix">
                <div class="table-wrapper-responsive">
                <table summary="Shopping cart">
                  <tbody><tr>
                    <th class="goods-page-image">Image</th>
                    <th class="goods-page-description">Description</th>
                    <th class="goods-page-stock">Stock</th>
                    <th class="goods-page-price" colspan="2">Unit price</th>
                  </tr>
                  
                  {{--*/ $shopcartsubtotal = 0; $totaltax = 0 ; $totalshipping = 0; /*--}}

                  @foreach($wishlist as $item)

                  {{--*/ $shopcartsubtotal += $item->subtotal; ; $totaltax += $item->totaltax; $totalshipping += $item->totalshipping ; /*--}}

                  <tr>
                    <td class="goods-page-image">
                      <a href="javascript:;">                      
                      @if( count( $item->productvariant->images ) )
                        <img src="{{ asset('storage/').'/'. $item->productvariant->images->first()->filepath }}" alt="Berry Lace Dress">
                      @else
                        <img src="{{ asset('assets/pages/img/products/model3.jpg') }}" alt="Berry Lace Dress">
                      @endif
                      </a>
                    </td>
                    <td class="goods-page-description">
                      <h3><a href="javascript:;">{{ $item->name }}</a></h3>
                      <p><strong>Item 1</strong> - Color: Green; Size: S</p>
                      <em>Web ID : {{ $item->id }}</em>
                    </td>
                    <td class="goods-page-stock">
                      In Stock
                    </td>
                    <td class="goods-page-price">
                      <strong><span>$</span>{{$item->price}}</strong>
                    </td>
                    <td class="del-goods-col">
                      <a class="del-goods" data-rowid="{{$item->rowid}}" href="javascript:;">&nbsp;</a>
                      <a class="add-goods" data-rowid="{{$item->rowid}}" href="javascript:;">&nbsp;</a>
                    </td>
                  </tr>
                  @endforeach
                  @if(0)
                  <tr>
                    <td class="goods-page-image">
                      <a href="javascript:;"><img src="{{ asset('assets/pages/img/products/model4.jpg') }} " alt="Berry Lace Dress"></a>
                    </td>
                    <td class="goods-page-description">
                      <h3><a href="javascript:;">Cool green dress with red bell</a></h3>
                      <p><strong>Item 1</strong> - Color: Green; Size: S</p>
                      <em>More info is here</em>
                    </td>
                    <td class="goods-page-stock">
                      In Stock
                    </td>
                    <td class="goods-page-price">
                      <strong><span>$</span>47.00</strong>
                    </td>
                    <td class="del-goods-col">
                      <a class="del-goods" href="javascript:;">&nbsp;</a>
                      <a class="add-goods" href="javascript:;">&nbsp;</a>
                    </td>
                  </tr>
                  @endif
                </tbody></table>
                </div>
              </div>
              @if($wishlist->count() == 0)
              <div class="alert alert-danger alert-dismissable">  <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button> <strong>Your Wish List is empty!</strong></div>
              @endif
            </div>
          </div>
          <!-- END CONTENT -->
          {!! Form::open(array('route' => array('front.wishlist.create') )) !!}
          {!! Form::close() !!}
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

            
            $( document ).on('click', '.del-goods', function( e ) {
            
              e.preventDefault();

              var rowid = $(this).data("rowid");

              var removerow = $(this).parent().parent();

              $.ajaxSetup({
                headers: {
                  'X-CSRF-TOKEN': $('input[name="_token"]').val(),
                  }
              });


              //alert("hi");
              //firstname lastname email telephone address1 city post-code region-state  newslettersubscribe  sameaddress privacypolicy
              var formData = {
                rowid:rowid,
              }

              var type = "POST"; 

              var wishlistremoveitemurl = "{{ route('front.wishlist.removeitem') }}";
                  
              console.log(formData);

              $.ajax({

                  type: type,
                  url: wishlistremoveitemurl,
                  data: formData,
                  dataType: 'json',
                  success: function (data) {
                      console.log(data);
                      if(data.status == "success") {
                        removerow.remove();
                      }
                      
                  },
                  error: function (data) {
                      console.log('Error:', data);
                  }
              });
           
            });

            $( document ).on('click', '.add-goods', function( e ) {
            
              e.preventDefault();

              var rowid = $(this).data("rowid");

              var addrow = $(this).parent().parent();

              $.ajaxSetup({
                headers: {
                  'X-CSRF-TOKEN': $('input[name="_token"]').val(),
                  }
              });


              //alert("hi");
              //firstname lastname email telephone address1 city post-code region-state  newslettersubscribe  sameaddress privacypolicy
              var formData = {
                rowid:rowid,
              }

              var type = "POST"; 

              var wishlistadditemurl = "{{ route('front.wishlist.additem') }}";
                  
              console.log(formData);

              $.ajax({

                  type: type,
                  url: wishlistadditemurl,
                  data: formData,
                  dataType: 'json',
                  success: function (data) {
                      console.log(data);
                      if(data.status == "success") {
                        addrow.remove(); //<- / remove animation
                      }
                      
                  },
                  error: function (data) {
                      console.log('Error:', data);
                      alert("Server Error");
                  }
              });
           
            });


        });
    </script>
@endsection