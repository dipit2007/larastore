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
	    <div class="goods-page">
	      <div class="goods-data clearfix">
	        <div class="table-wrapper-responsive">
		        <table summary="Shopping cart">
		          <tr>
		            <th class="goods-page-image">Image</th>
		            <th class="goods-page-description">Description</th>
		            <th class="goods-page-ref-no">Ref No</th>
		            <th class="goods-page-quantity">Quantity</th>
		            <th class="goods-page-price">Unit price</th>
		            <th class="goods-page-total" colspan="2">Total</th>
		          </tr>
		          {{--*/ $shopcartsubtotal = 0; $totaltax = 0 ; $totalshipping = 0; /*--}}

		          @foreach($cart as $item)

		          {{--*/ $shopcartsubtotal += $item->subtotal; $totaltax += $item->productvariant->tax * $item->qty; $totalshipping += $item->productvariant->shipping  * $item->qty ; /*--}}

		          
		          <tr>
		            <td class="goods-page-image">
		              <a href="javascript:;">
		              	@if( count( $item->productvariant->images ) )
		              	<img src="{{ asset('storage/').'/'. $item->productvariant->images->first()->filepath }}" alt="Berry Lace Dress">
		              	@else
		              	<img src="{{ asset('theme/frontend/assets/pages/img/products/model3.jpg') }}" alt="Berry Lace Dress">
		              	@endif
		              </a>
		            </td>
		            <td class="goods-page-description">
		              <h3><a href="javascript:;">{{ $item->name }}</a></h3>
		              <p><strong>Item</strong> - Color: Green; Size: S</p>
		              <em>Web ID : {{ $item->id }}</em>
		            </td>
		            <td class="goods-page-ref-no">
		              REF # {{ $item->id }}
		            </td>
		            <td class="goods-page-quantity">
		              <div class="product-quantity">
		                  <input id="product-quantity-{{ $item->id }}" type="text" value="{{ $item->qty }}" readonly class="form-control input-sm product-quantity-input" data-rowid="{{$item->rowid}}">
		              </div>
		            </td>
		            <td class="goods-page-price">
		              <strong><span>$</span>{{$item->price}}</strong>
		            </td>
		            <td class="goods-page-total">
		              <strong><span>$</span>{{$item->subtotal}}</strong>
		            </td>
		            <td class="del-goods-col">
		              <a class="del-goods" data-rowid="{{$item->rowid}}" href="javascript:;">&nbsp;</a>
		            </td>
		          </tr>
		          @endforeach
		          @if(0)
		          <tr>
		            <td class="goods-page-image">
		              <a href="javascript:;"><img src="{{ asset('theme/frontend/assets/pages/img/products/model4.jpg') }}" alt="Berry Lace Dress"></a>
		            </td>
		            <td class="goods-page-description">
		              <h3><a href="javascript:;">Cool green dress with red bell</a></h3>
		              <p><strong>Item 1</strong> - Color: Green; Size: S</p>
		              <em>More info is here</em>
		            </td>
		            <td class="goods-page-ref-no">
		              javc2133
		            </td>
		            <td class="goods-page-quantity">
		              <div class="product-quantity">
		                  <input id="product-quantity2" type="text" value="1" readonly class="form-control input-sm">
		              </div>
		            </td>
		            <td class="goods-page-price">
		              <strong><span>$</span>47.00</strong>
		            </td>
		            <td class="goods-page-total">
		              <strong><span>$</span>47.00</strong>
		            </td>
		            <td class="del-goods-col">
		              <a class="del-goods" href="javascript:;">&nbsp;</a>
		            </td>
		          </tr>
		          @endif
		        </table>
	        </div>

	        <div class="shopping-total">
	          <ul>
	            <li>
	              <em>Sub total</em>
	              <strong class="price" id="shopcartsubtotal"><span>$</span>{{ $carttotal }}</strong>
	            </li>
	            <li>
	              <em>Shipping cost</em>
	              <strong class="price" id="totalshipping"><span>$</span>{{ $totalshipping }}</strong>
	            </li>
	            <li>
                  <em>Tax</em>
				  <strong class="price" id="totaltax"><span>$</span>{{ $totaltax }}</strong>
                </li>
	            <li class="shopping-total-price">
	              <em>Total</em>
	              {{--*/ $cartgrandtotal = $carttotal + $totalshipping + $totaltax /*--}}
	              <strong class="price" id="carttotal"><span>$</span>{{ $cartgrandtotal }}</strong>
	            </li>
	          </ul>
	        </div>
	      </div>
	      <!-- <button class="btn btn-default" type="submit">Continue shopping <i class="fa fa-shopping-cart"></i></button> -->
	      <a class="btn btn-default" href="{{ route('front.product.index') }}">Continue shopping <i class="fa fa-shopping-cart"></i></a>
	      <a class="btn btn-primary" href="{{ route('front.cart.checkout') }}">Checkout <i class="fa fa-check"></i></a>
	      {!! Form::open(array('route' => array('front.cart.removeitem') )) !!}
	      {!! Form::close() !!}
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

                var cartremoveitemurl = "{{ route('front.cart.removeitem') }}";
                
                console.log(formData);

                $.ajax({

                    type: type,
                    url: cartremoveitemurl,
                    data: formData,
                    dataType: 'json',
                    success: function (data) {
                        console.log(data);
                        if(data.status == "success") {
                        	removerow.remove();
                        	$('#shopcartsubtotal').html('<span>$</span>'+data.shopcartsubtotal);
                        	$('#totalshipping').html('<span>$</span>'+data.totalshipping);
                        	$('#totaltax').html('<span>$</span>'+data.totaltax);
                        	$('#carttotal').html('<span>$</span>'+data.carttotal);
                        }

                    },
                    error: function (data) {
                        console.log('Error:', data);
                        alert("Server Error");
                    }
                });


		        
		    });

		        
		    $( document ).on('change', '.product-quantity-input', function( e ) {

		        e.preventDefault();

		        var rowid = $(this).data("rowid");
		        var quantity = $(this).val();

		        $.ajaxSetup({
                    headers: {
                      'X-CSRF-TOKEN': $('input[name="_token"]').val(),
                    }
                });


                var parentdiv = $(this).parent("table");//.parent("div").parent("div");


                //alert("hi");
                //firstname lastname email telephone address1 city post-code region-state  newslettersubscribe  sameaddress privacypolicy
                var formData = {
                    rowid:rowid,
                    quantity:quantity,
                }


                var type = "POST"; 

                var cartremoveitemurl = "{{ route('front.cart.changeitemquantity') }}";
                
                console.log(formData);

                $.ajax({

                    type: type,
                    url: cartremoveitemurl,
                    data: formData,
                    dataType: 'json',
                    success: function (data) {
                        console.log(data);
                        if(data.status == "success") {
                        	//removerow.remove();
                        	$('#shopcartsubtotal').html('<span>$</span>'+data.shopcartsubtotal);
                        	$('#totalshipping').html('<span>$</span>'+data.totalshipping);
                        	$('#totaltax').html('<span>$</span>'+data.totaltax);
                        	$('#carttotal').html('<span>$</span>'+data.carttotal);

                        	var errorString = "";
                        	errorString += '<div style="bottom:0px;right:0px;position:absolute;z-index:99999;" class="alert alert-warning alert-dismissable">  <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button> <strong> Updated </strong></div>';
                            //alert(parentdiv.name);

                        	//$(parentdiv).append(errorString);
                        	//$('.goods-data').append(errorString);
                        	$('body').append(errorString);
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