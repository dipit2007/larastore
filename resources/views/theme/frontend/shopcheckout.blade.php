@extends('layouts.front.theme.main')

 @section('title-wrapper')

 @endsection


 @section('breadcrumb')
     <ul class="breadcrumb">
            <li><a href="index.html">Home</a></li>
            <li><a href="">Store</a></li>
            <li class="active">Checkout</li>
        </ul>
 @endsection

  
@section('product-pop-up')
    @if (Auth::guest())
    @include('layouts.front.theme.loginmodalpopup')
    @endif
@endsection

@section('sidebar')
	
@endsection

@section('content')
	<!-- BEGIN CONTENT -->
          <div class="col-md-12 col-sm-12">
            <h1>Checkout</h1>
            {!! Form::open(array('route' => array('front.cart.placeorder') )) !!}
            <!-- BEGIN CHECKOUT PAGE -->
            <div class="panel-group checkout-page accordion scrollable" id="checkout-page">

              @if(0)
              <!-- BEGIN CHECKOUT -->
              <div id="checkout" class="panel panel-default">
                <div class="panel-heading">
                  <h2 class="panel-title">
                    <a data-toggle="collapse" data-parent="#checkout-page" href="#checkout-content" class="accordion-toggle">
                      Step 1: Checkout Options
                    </a>
                  </h2>
                </div>
                <div id="checkout-content" class="panel-collapse collapse in">
                  <div class="panel-body row">
                    <div class="col-md-6 col-sm-6">
                      <h3>New Customer</h3>
                      <p>Checkout Options:</p>
                      <div class="radio-list">
                        <label>
                          <input type="radio" name="account"  value="register"> Register Account
                        </label>
                        <label>
                          <input type="radio" name="account"  value="guest"> Guest Checkout
                        </label> 
                      </div>
                      <p>By creating an account you will be able to shop faster, be up to date on an order's status, and keep track of the orders you have previously made.</p>
                      <button class="btn btn-primary" type="submit" data-toggle="collapse" data-parent="#checkout-page" data-target="#payment-address-content">Continue</button>
                    </div>
                    <div class="col-md-6 col-sm-6">
                      <h3>Returning Customer</h3>
                      <p>I am a returning customer.</p>
                      <form role="form" action="#">
                        <div class="form-group">
                          <label for="email-login">E-Mail</label>
                          <input type="text" id="email-login" class="form-control">
                        </div>
                        <div class="form-group">
                          <label for="password-login">Password</label>
                          <input type="password" id="password-login" class="form-control">
                        </div>
                        <a href="javascript:;">Forgotten Password?</a>
                        <div class="padding-top-20">                  
                          <button class="btn btn-primary" type="submit">Login</button>
                        </div>
                        <hr>
                        <div class="login-socio">
                          <p class="text-muted">or login using:</p>
                          <ul class="social-icons">
                            <li><a href="javascript:;" data-original-title="facebook" class="facebook" title="facebook"></a></li>
                            <li><a href="javascript:;" data-original-title="Twitter" class="twitter" title="Twitter"></a></li>
                            <li><a href="javascript:;" data-original-title="Google Plus" class="googleplus" title="Google Plus"></a></li>
                            <li><a href="javascript:;" data-original-title="Linkedin" class="linkedin" title="LinkedIn"></a></li>
                          </ul>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
              <!-- END CHECKOUT -->
              @endif

              <!-- BEGIN PAYMENT ADDRESS -->
              <div id="payment-address" class="panel panel-default">
                <div class="panel-heading">
                  <h2 class="panel-title">
                    <a data-toggle="collapse" data-parent="#checkout-page" href="#payment-address-content" class="accordion-toggle">
                      Step 1: Billing Details
                    </a>
                  </h2>
                </div>
                <div id="payment-address-content" class="panel-collapse collapse in">
                  <div class="panel-body row">
                    <div class="col-md-6 col-sm-6">
                      <h3>Your Personal Details</h3>
                      <div class="form-group">
                        <label for="firstname">First Name <span class="require">*</span></label>
                        <input type="text" id="firstname" class="form-control" name="firstname" value="{{ old('firstname') }}">
                      </div>
                      <div class="form-group">
                        <label for="lastname">Last Name <span class="require">*</span></label>
                        <input type="text" id="lastname" class="form-control" name="lastname" value="{{ old('lastname') }}">
                      </div>
                      <div class="form-group">
                        <label for="email-cd">E-Mail <span class="require">*</span></label>
                        <input type="text" id="email-cd" class="form-control" name="email-cd" value="{{ old('email-cd') }}">
                      </div>
                      <div class="form-group">
                        <label for="telephone">Mobile No <span class="require">*</span></label>
                        <input type="text" id="telephone" class="form-control"  name="mobileno" value="{{ old('mobileno') }}">
                      </div>

                    </div>
                    <div class="col-md-6 col-sm-6">
                      <h3>Your Address</h3>
                      
                      <div class="form-group">
                        <label for="address1">Address <span class="require">*</span></label>
                        <input type="text" id="address1" class="form-control" name="address1" value="{{ old('address1') }}">
                      </div>
                      
                      <div class="form-group">
                        <label for="city">City <span class="require">*</span></label>
                        <input type="text" id="city" class="form-control" name="city" value="{{ old('city') }}">
                      </div>
                      <div class="form-group">
                        <label for="post-code">Post Code <span class="require">*</span></label>
                        <input type="text" id="post-code" class="form-control" name="post-code" value="{{ old('post-code') }}">
                      </div>
                      
                      <div class="form-group">
                        <label for="region-state">State <span class="require">*</span></label>
                        <select class="form-control input-sm" id="region-state" name="region-state" value="{{ old('region-state') }}">
                          <option value=""> --- Please Select --- </option><option value="3513">Bangalore</option><option value="3514">Delhi</option><option value="3515">West Bengal</option>
                        </select>
                      </div>
                    </div>
                    <hr>
                    <div class="col-md-12">                      
                      <div class="pull-left">
                        <div class="checkbox">
                          <label>
                            <input type="checkbox" name="newslettersubscribe" id="newslettersubscribe"> I wish to subscribe to the Paramjute newsletter. 
                          </label>
                        </div>
                        <div class="checkbox">
                          <label>
                            <input type="checkbox" name="sameaddress" id="sameaddress"> My delivery and billing addresses are the same.
                          </label>
                        </div>
                      </div>
                      <button class="btn btn-primary  pull-right" type="submit" data-toggle="collapse" data-parent="#checkout-page" data-target="#shipping-address-content" id="button-account-billing-address">Continue</button>
                      <div class="checkbox pull-right">
                        <label>
                          <input type="checkbox" name="privacypolicy" id="privacypolicy"> I have read and agree to the <a title="Privacy Policy" href="javascript:;">Privacy Policy</a> &nbsp;&nbsp;&nbsp; 
                        </label>
                      </div>                        
                    </div>
                  </div>
                </div>
              </div>
              <!-- END PAYMENT ADDRESS -->

              <!-- BEGIN SHIPPING ADDRESS -->
              <div id="shipping-address" class="panel panel-default">
                <div class="panel-heading">
                  <h2 class="panel-title">
                    <a data-toggle="collapse" data-parent="#checkout-page" href="#shipping-address-content" class="accordion-toggle">
                      Step 2: Delivery Details
                    </a>
                  </h2>
                </div>
                <div id="shipping-address-content" class="panel-collapse collapse">
                  <div class="panel-body row">
                    <div class="col-md-6 col-sm-6">
                      <div class="form-group">
                        <label for="firstname-dd">First Name <span class="require">*</span></label>
                        <input type="text" id="firstname-dd" class="form-control" name="firstname-dd" value="{{ old('firstname-dd') }}">
                      </div>
                      <div class="form-group">
                        <label for="lastname-dd">Last Name <span class="require">*</span></label>
                        <input type="text" id="lastname-dd" class="form-control" name="lastname-dd" value="{{ old('lastname-dd') }}">
                      </div>
                      <div class="form-group">
                        <label for="email-dd">E-Mail <span class="require">*</span></label>
                        <input type="text" id="email-dd" class="form-control" name="email-dd" value="{{ old('email-dd') }}">
                      </div>
                      <div class="form-group">
                        <label for="telephone-dd">Telephone <span class="require">*</span></label>
                        <input type="text" id="telephone-dd" class="form-control" name="telephone-dd" value="{{ old('telephone-dd') }}">
                      </div>
                    </div>
                    <div class="col-md-6 col-sm-6">
                      <div class="form-group">
                        <label for="address1-dd">Address 1<span class="require">*</span></label>
                        <input type="text" id="address1-dd" class="form-control" name="address1-dd" value="{{ old('address1-dd') }}">
                      </div>
                      <div class="form-group">
                        <label for="city-dd">City <span class="require">*</span></label>
                        <input type="text" id="city-dd" class="form-control" name="city-dd" value="{{ old('city-dd') }}">
                      </div>
                      <div class="form-group">
                        <label for="post-code-dd">Post Code <span class="require">*</span></label>
                        <input type="text" id="post-code-dd" class="form-control" name="post-code-dd" value="{{ old('post-code-dd') }}">
                      </div>
                      
                      <div class="form-group">
                        <label for="region-state-dd">State <span class="require">*</span></label>
                        <select class="form-control input-sm" id="region-state-dd" name="region-state-dd" value="{{ old('region-state-dd') }}">
                          <option value=""> --- Please Select --- </option><option value="3513">Bangalore</option><option value="3514">Delhi</option><option value="3515">West Bengal</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-12">
                      <button class="btn btn-primary  pull-right" type="button" id="button-shipping-address" data-toggle="collapse" data-parent="#checkout-page" data-target="#shipping-method-content">Continue</button>
                    </div>
                  </div>
                </div>
              </div>
              <!-- END SHIPPING ADDRESS -->

              <!-- BEGIN SHIPPING METHOD -->
              <div id="shipping-method" class="panel panel-default">
                <div class="panel-heading">
                  <h2 class="panel-title">
                    <a data-toggle="collapse" data-parent="#checkout-page" href="#shipping-method-content" class="accordion-toggle">
                      Step 3: Delivery Method
                    </a>
                  </h2>
                </div>
                <div id="shipping-method-content" class="panel-collapse collapse">
                  <div class="panel-body row">
                    <div class="col-md-12">
                      <p>Please select the preferred shipping method to use on this order.</p>
                      <h4>Flat Rate</h4>
                      <div class="radio-list">
                        <label>
                          <input type="radio" name="FlatShippingRate" value="FlatShippingRate"> Flat Shipping Rate
                        </label>
                      </div>
                      <div class="form-group">
                        <label for="delivery-comments">Add Comments About Your Order</label>
                        <textarea id="delivery-comments" name="delivery-comments" rows="8" class="form-control"></textarea>
                      </div>
                      <button class="btn btn-primary  pull-right" type="button" id="button-shipping-method" data-toggle="collapse" data-parent="#checkout-page" data-target="#payment-method-content">Continue</button>
                    </div>
                  </div>
                </div>
              </div>
              <!-- END SHIPPING METHOD -->

              <!-- BEGIN PAYMENT METHOD -->
              <div id="payment-method" class="panel panel-default">
                <div class="panel-heading">
                  <h2 class="panel-title">
                    <a data-toggle="collapse" data-parent="#checkout-page" href="#payment-method-content" class="accordion-toggle">
                      Step 4: Payment Method
                    </a>
                  </h2>
                </div>
                <div id="payment-method-content" class="panel-collapse collapse">
                  <div class="panel-body row">
                    <div class="col-md-12">
                      <p>Please select the preferred payment method to use on this order.</p>
                      <div class="radio-list">
                        <label>
                          <input type="radio" name="CashOnDelivery" value="CashOnDelivery"> Cash On Delivery
                        </label>
                      </div>
                      <div class="form-group">
                        <label for="delivery-payment-method">Add Comments About Your Order</label>
                        <textarea id="delivery-payment-method" name="delivery-payment-method" rows="8" class="form-control"></textarea>
                      </div>
                      <button class="btn btn-primary  pull-right" type="button" id="button-payment-method" data-toggle="collapse" data-parent="#checkout-page" data-target="#confirm-content">Continue</button>
                      <div class="checkbox pull-right">
                        <label>
                          <input type="checkbox" name="termsconditions" id="termsconditions"> I have read and agree to the <a title="Terms & Conditions" href="javascript:;">Terms & Conditions </a> &nbsp;&nbsp;&nbsp; 
                        </label>
                      </div>  
                    </div>
                  </div>
                </div>
              </div>
              <!-- END PAYMENT METHOD -->

              <!-- BEGIN CONFIRM -->
              <div id="confirm" class="panel panel-default">
                <div class="panel-heading">
                  <h2 class="panel-title">
                    <a data-toggle="collapse" data-parent="#checkout-page" href="#confirm-content" class="accordion-toggle">
                      Step 5: Confirm Order
                    </a>
                  </h2>
                </div>
                <div id="confirm-content" class="panel-collapse collapse">
                  <div class="panel-body row">
                    <div class="col-md-12 clearfix">
                      @if (Auth::guest())

                      @else
                      <div class="table-wrapper-responsive">
                      <table>
                        <tr>
                          <th class="checkout-image">Image</th>
                          <th class="checkout-description">Description</th>
                          <th class="checkout-model">Model</th>
                          <th class="checkout-quantity">Quantity</th>
                          <th class="checkout-price">Price</th>
                          <th class="checkout-total">Total</th>
                        </tr>
                        @php $shopcartsubtotal = 0; $totaltax = 0 ; $totalshipping = 0; @endphp
                        @foreach($shopcart->items as $item)
                        @php $shopcartsubtotal += $item->subtotal; ; $totaltax += $item->totaltax; $totalshipping += $item->totalshipping ; @endphp
                        <tr>
                          <td class="checkout-image">
                            <a href="javascript:;">
                            
                            @if ($item->hasObject)
                              @if( count( $item->object->images ) )
                                <img src="{{ asset('storage/').'/'. $item->object->images->first()->filepath }}" alt="Berry Lace Dress">
                              @else
                                <img src="{{ asset('theme/frontend/assets/pages/img/products/model3.jpg') }}" alt="Berry Lace Dress">
                              @endif
                            @else
                              <img src="{{ asset('theme/frontend/assets/pages/img/products/model3.jpg') }}" alt="Berry Lace Dress">
                            @endif
                            </a>
                          </td>
                          <td class="checkout-description">
                            <h3><a href="javascript:;">{{ $item->object->name }}</a></h3>
                            <p><strong>Item</strong> - Color: Green; Size: S</p>
                            <em>Web ID : {{ $item->id }}</em>
                          </td>
                          <td class="checkout-model">REF # {{ $item->sku }}</td>
                          <td class="checkout-quantity checkout-price"><strong>{{ $item->quantity }}</strong></td>
                          <td class="checkout-price"><strong><span>$</span>{{$item->price}}</strong></td>
                          <td class="checkout-total"><strong><span>$</span>{{$item->subtotal}}</strong></td>
                        </tr>
                        @endforeach
                        @if(0)
                        <tr>
                          <td class="checkout-image">
                            <a href="javascript:;"><img src="{{ asset('theme/frontend/assets/pages/img/products/model4.jpg') }}" alt="Berry Lace Dress"></a>
                          </td>
                          <td class="checkout-description">
                            <h3><a href="javascript:;">Cool green dress with red bell</a></h3>
                            <p><strong>Item 1</strong> - Color: Green; Size: S</p>
                            <em>More info is here</em>
                          </td>
                          <td class="checkout-model">RES.193</td>
                          <td class="checkout-quantity">1</td>
                          <td class="checkout-price"><strong><span>$</span>47.00</strong></td>
                          <td class="checkout-total"><strong><span>$</span>47.00</strong></td>
                        </tr>
                        @endif
                      </table>
                      </div>

                      <div class="checkout-total-block">
                        <ul>
                          <li>
                            <em>Sub total</em>
                            <strong class="price"><span>$</span>{{ $shopcartsubtotal }}</strong>
                          </li>
                          <li>
                            <em>Shipping cost</em>
                            <strong class="price"><span>$</span>{{ $totalshipping }}</strong>
                          </li>
                          <li>
                            <em>Tax</em>
                            <strong class="price"><span>$</span>{{ $totaltax }}</strong>
                          </li>
                          <li>
                            <em>VAT (17.5%)</em>
                            <strong class="price"><span>$</span>0.00</strong>
                          </li>
                          <li class="checkout-total-price">
                            <em>Total</em>
                            <strong class="price"><span>$</span>{{ $shopcart->total }}</strong>
                          </li>
                        </ul>
                      </div>
                      <div class="clearfix"></div>
                      <button class="btn btn-primary pull-right" type="submit" id="button-confirm">Confirm Order</button>
                      <button type="button" class="btn btn-default pull-right margin-right-20">Cancel</button>
                      @endif
                    </div>
                  </div>
                </div>
              </div>
              <!-- END CONFIRM -->
            </div>
            <!-- END CHECKOUT PAGE -->
            {!! Form::close() !!}
          </div>
          <!-- END CONTENT -->
@endsection


@section('brands')

@endsection




@section('pagelevel-plugins-css')
  

  <!-- Page level plugin styles START -->
  <link href="{{ asset('theme/frontend/assets/plugins/fancybox/source/jquery.fancybox.css') }}" rel="stylesheet">
  <link href="{{ asset('theme/frontend/assets/plugins/owl.carousel/assets/owl.carousel.css') }}" rel="stylesheet">
  <link href="{{ asset('theme/frontend/assets/plugins/uniform/css/uniform.default.css') }}" rel="stylesheet" type="text/css">
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
<script src="{{ asset('theme/frontend/assets/pages/scripts/checkout.js') }}" type="text/javascript"></script>

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

            Checkout.init();

            @if (Auth::guest())
              $("#loginmodalpopup").modal({
                backdrop: 'static'
              });

              $('#loginmodalpopupform').submit(function(e) {
                  e.preventDefault(); 

                  $.ajaxSetup({
                    headers: {
                      'X-CSRF-TOKEN': $('input[name="_token"]').val(),
                    }
                  });

                  var email = $('input[name="email"]').val();
                  var password= $('input[name="password"]').val();

                 
                  var url = "{{ route('front.cart.checkoutlogin') }}";
                  
                  var formData = {
                    email: $('input[name="email"]').val(),
                    password: $('input[name="password"]').val(),
                  }

                  //used to determine the http verb to use [add=POST], [update=PUT]
                  var state = $('#btn-save').val();

                  var type = "POST"; //for creating new resource
                  var task_id = $('#task_id').val();;
                  var my_url = url;

                  if (state == "update"){
                    type = "PUT"; //for updating existing resource
                    my_url += '/' + task_id;
                  }

                  console.log(formData);

                  $.ajax({

                      type: type,
                      url: my_url,
                      data: formData,
                      dataType: 'json',
                      success: function (data) {
                          console.log(data);

                          /*var task = '<tr id="task' + data.id + '"><td>' + data.id + '</td><td>' + data.task + '</td><td>' + data.description + '</td><td>' + data.created_at + '</td>';
                          task += '<td><button class="btn btn-warning btn-xs btn-detail open-modal" value="' + data.id + '">Edit</button>';
                          task += '<button class="btn btn-danger btn-xs btn-delete delete-task" value="' + data.id + '">Delete</button></td></tr>';*/

                          /*if (state == "add"){ //if user added a new record
                              $('#tasks-list').append(task);
                          }else{ //if user updated an existing record

                              $("#task" + task_id).replaceWith( task );
                          }

                          $('#frmTasks').trigger("reset");

                          $('#myModal').modal('hide')*/
                          if(data.status == 'success'){
                            var confirmationModalID = "#loginmodalpopup";
                            //$('#divSubmitConfirmationModal').modal('toggle');
                            $(confirmationModalID).modal('toggle');
                          } else {
                            alert(data.status);
                          }
                          
                      },
                      error: function (data) {
                          console.log('Error:', data);
                      }
                  });


                          
                  
                 
              }); 
            @endif


            //create new task / update existing task
            $("#button-account-billing-address").click(function (e) {
                $.ajaxSetup({
                    headers: {
                      'X-CSRF-TOKEN': $('input[name="_token"]').val(),
                    }
                });

                e.preventDefault(); 

                //alert("hi");
                //firstname lastname email telephone address1 city post-code region-state  newslettersubscribe  sameaddress privacypolicy
                var formData = {
                    firstname: $('#firstname').val(),
                    lastname: $('#lastname').val(),
                    email: $('#email-cd').val(),
                    telephone: $('#telephone').val(),
                    address1: $('#address1').val(),
                    city: $('#city').val(),
                    postcode: $('#post-code').val(),
                    regionstate: $('#region-state').val(),
                    newslettersubscribe: $('#newslettersubscribe').is(':checked'),
                    sameaddress: $('#sameaddress').is(':checked'),
                    privacypolicy: $('#privacypolicy').is(':checked'),
                }


                if( $('#sameaddress').is(':checked') ){
                    $('#firstname-dd').val( $('#firstname').val() );
                    $('#lastname-dd').val( $('#lastname').val() );
                    $('#email-dd').val( $('#email-cd').val() );
                    $('#telephone-dd').val( $('#telephone').val() );
                    $('#address1-dd').val( $('#address1').val() );
                    $('#city-dd').val( $('#city').val() );
                    $('#post-code-dd').val( $('#post-code').val() );
                    $('#region-state-dd').val( $('#region-state').val() );            
                } else {
                    /*$('#firstname-dd').val( $('#firstname').val() );
                    $('#lastname-dd').val( $('#lastname').val() );
                    $('#email-dd').val( $('#email').val() );
                    $('#telephone-dd').val( $('#telephone').val() );
                    $('#address1-dd').val( $('#address1').val() );
                    $('#city-dd').val( $('#city').val() );
                    $('#post-code-dd').val( $('#post-code').val() );
                    $('#region-state-dd').val( $('#region-state').val() ); */
                }

                //used to determine the http verb to use [add=POST], [update=PUT]
                //var state = $('#btn-save').val();
                //alert("hi");

                var type = "POST"; //for creating new resource
                //var task_id = $('#task_id').val();;
                var accaddrurl = "{{ route('front.cart.checkoutaccountbillingaddress') }}";
                //alert(accaddrurl);
                /*if (state == "update"){
                    type = "PUT"; //for updating existing resource
                    my_url += '/' + task_id;
                }*/

                console.log(formData);

                $.ajax({

                    type: type,
                    url: accaddrurl,
                    data: formData,
                    dataType: 'json',
                    success: function (data) {
                        console.log(data);

                        /*var task = '<tr id="task' + data.id + '"><td>' + data.id + '</td><td>' + data.task + '</td><td>' + data.description + '</td><td>' + data.created_at + '</td>';
                        task += '<td><button class="btn btn-warning btn-xs btn-detail open-modal" value="' + data.id + '">Edit</button>';
                        task += '<button class="btn btn-danger btn-xs btn-delete delete-task" value="' + data.id + '">Delete</button></td></tr>';

                        if (state == "add"){ //if user added a new record
                            $('#tasks-list').append(task);
                        }else{ //if user updated an existing record

                            $("#task" + task_id).replaceWith( task );
                        }

                        $('#frmTasks').trigger("reset");

                        $('#myModal').modal('hide')*/
                    },
                    error: function (data) {
                        console.log('Error:', data);
                    }
                });
            });


        });
    </script>
@endsection