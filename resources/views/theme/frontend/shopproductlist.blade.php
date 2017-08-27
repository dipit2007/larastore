@extends('layouts.front.theme.main')

 @section('title-wrapper')
     @include('layouts.front.theme.title-wrapper')
 @endsection


 @section('breadcrumb')
     <ul class="breadcrumb">
            <li><a href="index.html">Home</a></li>
            <li><a href="">Store</a></li>
            <li class="active">Men category</li>
        </ul>
 @endsection


@section('sidebar')
	<!-- BEGIN SIDEBAR -->
          <div class="sidebar col-md-3 col-sm-5">
            
            <div class="sidebar-filter margin-bottom-25">
              <h2>Filter</h2>
              <h3>Availability</h3>
              <div class="checkbox-list">
                <label><input type="checkbox"> Not Available (3)</label>
                <label><input type="checkbox"> In Stock (26)</label>
              </div>

              <h3>Price</h3>
              <p>
                <label for="amount">Range:</label>
                <input type="text" id="amount" style="border:0; color:#f6931f; font-weight:bold;">
              </p>
              <div id="slider-range"></div>
            </div>

            <ul class="list-group margin-bottom-25 sidebar-menu">
              <li class="list-group-item clearfix"><a href="shop-product-list.html"><i class="fa fa-angle-right"></i> Ladies</a></li>
              <li class="list-group-item clearfix dropdown active">
                <a href="javascript:void(0);" class="collapsed">
                  <i class="fa fa-angle-right"></i>
                  Mens
                  
                </a>
                <ul class="dropdown-menu" style="display:block;">
                  <li class="list-group-item dropdown clearfix active">
                    <a href="javascript:void(0);" class="collapsed"><i class="fa fa-angle-right"></i> Shoes </a>
                      <ul class="dropdown-menu" style="display:block;">
                        <li class="list-group-item dropdown clearfix">
                          <a href="javascript:void(0);"><i class="fa fa-angle-right"></i> Classic </a>
                          <ul class="dropdown-menu">
                            <li><a href="shop-product-list.html"><i class="fa fa-angle-right"></i> Classic 1</a></li>
                            <li><a href="shop-product-list.html"><i class="fa fa-angle-right"></i> Classic 2</a></li>
                          </ul>
                        </li>
                        <li class="list-group-item dropdown clearfix active">
                          <a href="javascript:void(0);" class="collapsed"><i class="fa fa-angle-right"></i> Sport  </a>
                          <ul class="dropdown-menu" style="display:block;">
                            <li class="active"><a href="shop-product-list.html"><i class="fa fa-angle-right"></i> Sport 1</a></li>
                            <li><a href="shop-product-list.html"><i class="fa fa-angle-right"></i> Sport 2</a></li>
                          </ul>
                        </li>
                      </ul>
                  </li>
                  <li><a href="shop-product-list.html"><i class="fa fa-angle-right"></i> Trainers</a></li>
                  <li><a href="shop-product-list.html"><i class="fa fa-angle-right"></i> Jeans</a></li>
                  <li><a href="shop-product-list.html"><i class="fa fa-angle-right"></i> Chinos</a></li>
                  <li><a href="shop-product-list.html"><i class="fa fa-angle-right"></i> T-Shirts</a></li>
                </ul>
              </li>
              <li class="list-group-item clearfix"><a href="shop-product-list.html"><i class="fa fa-angle-right"></i> Kids</a></li>
              <li class="list-group-item clearfix"><a href="shop-product-list.html"><i class="fa fa-angle-right"></i> Accessories</a></li>
              <li class="list-group-item clearfix"><a href="shop-product-list.html"><i class="fa fa-angle-right"></i> Sports</a></li>
              <li class="list-group-item clearfix"><a href="shop-product-list.html"><i class="fa fa-angle-right"></i> Brands</a></li>
              <li class="list-group-item clearfix"><a href="shop-product-list.html"><i class="fa fa-angle-right"></i> Electronics</a></li>
              <li class="list-group-item clearfix"><a href="shop-product-list.html"><i class="fa fa-angle-right"></i> Home & Garden</a></li>
              <li class="list-group-item clearfix"><a href="shop-product-list.html"><i class="fa fa-angle-right"></i> Custom Link</a></li>
            </ul>


            <div class="sidebar-products clearfix">
              <h2>Bestsellers</h2>
              <div class="item">
                <a href="shop-item.html"><img src="{{ asset('assets/pages/img/products/k1.jpg') }}" alt="Some Shoes in Animal with Cut Out"></a>
                <h3><a href="shop-item.html">Some Shoes in Animal with Cut Out</a></h3>
                <div class="price">$31.00</div>
              </div>
              <div class="item">
                <a href="shop-item.html"><img src="{{ asset('assets/pages/img/products/k4.jpg') }}" alt="Some Shoes in Animal with Cut Out"></a>
                <h3><a href="shop-item.html">Some Shoes in Animal with Cut Out</a></h3>
                <div class="price">$23.00</div>
              </div>
              <div class="item">
                <a href="shop-item.html"><img src="{{ asset('assets/pages/img/products/k3.jpg') }}" alt="Some Shoes in Animal with Cut Out"></a>
                <h3><a href="shop-item.html">Some Shoes in Animal with Cut Out</a></h3>
                <div class="price">$86.00</div>
              </div>
            </div>
          </div>
          <!-- END SIDEBAR -->
@endsection

@section('content')
	<!-- BEGIN CONTENT -->
          <div class="col-md-9 col-sm-7">

          <div class="content-search margin-bottom-20">
              <div class="row">
                <div class="col-md-6">
                  <h1>Search result for <em>shoes</em></h1>
                </div>
                <div class="col-md-6">
                  <form action="#">
                    <div class="input-group">
                      <!-- <input type="text" placeholder="Search again" class="form-control"> -->
                      <!-- // Then add the HTML for the select element that will be "Selectized" -->

                      <select id="searchbox" name="q" placeholder="Search products or categories..." class="form-control"></select>
                      @if(0)
                      <span class="input-group-btn">
                        <button class="btn btn-primary" type="submit">Search</button>
                      </span>
                      @endif
                    </div>
                  </form>
                </div>
              </div>
            </div>


            <div class="row list-view-sorting clearfix">
              @if(0)
              <div class="col-md-2 col-sm-2 list-view">
                <a href="javascript:;"><i class="fa fa-th-large"></i></a>
                <a href="javascript:;"><i class="fa fa-th-list"></i></a>
              </div>
              @endif
              <div class="col-md-6 col-sm-6 pull-left">
              {{ $products->links() }}
              </div>
              <div class="col-md-6 col-sm-6">
                <div class="pull-right">
                  <label class="control-label">Show:</label>
                  <select class="form-control input-sm">
                    <option value="#?limit=24" selected="selected">24</option>
                    <option value="#?limit=25">25</option>
                    <option value="#?limit=50">50</option>
                    <option value="#?limit=75">75</option>
                    <option value="#?limit=100">100</option>
                  </select>
                </div>
                <div class="pull-right">
                  <label class="control-label">Sort&nbsp;By:</label>
                  <select class="form-control input-sm">
                    <option value="#?sort=p.sort_order&amp;order=ASC" selected="selected">Default</option>
                    <option value="#?sort=pd.name&amp;order=ASC">Name (A - Z)</option>
                    <option value="#?sort=pd.name&amp;order=DESC">Name (Z - A)</option>
                    <option value="#?sort=p.price&amp;order=ASC">Price (Low &gt; High)</option>
                    <option value="#?sort=p.price&amp;order=DESC">Price (High &gt; Low)</option>
                    <option value="#?sort=rating&amp;order=DESC">Rating (Highest)</option>
                    <option value="#?sort=rating&amp;order=ASC">Rating (Lowest)</option>
                    <option value="#?sort=p.model&amp;order=ASC">Model (A - Z)</option>
                    <option value="#?sort=p.model&amp;order=DESC">Model (Z - A)</option>
                  </select>
                </div>
              </div>
            </div>
            

              <!-- Current Enabled Product List -->
              @php $loopcounter = 0 @endphp
              @if (count($products) > 0)                
                @foreach ($products as $product)
                  @foreach ($product->variants as $productvariant)

                    @if($loopcounter == 0)
                    <!-- BEGIN PRODUCT LIST -->
                    <div class="row product-list">
                    @endif
                    


                    <!-- PRODUCT ITEM START -->
                    <div class="col-md-4 col-sm-6 col-xs-12">
                      <div class="product-item">
                        <div class="pi-img-wrapper">
                          @if( count( $productvariant->images ) )
                          <img src="{{ asset('storage/').'/'. $productvariant->images->first()->filepath }}" class="img-responsive" alt="Berry Lace Dress">
                          <div>
                            <a href="{{ asset('storage/').'/'. $productvariant->images->first()->filepath }}" class="btn btn-default fancybox-button">Zoom</a>
                            
                            <a href="#" class="add2wishlist btn btn-default" data-productsku="{{$productvariant->sku}}" data-productvid="{{$productvariant->id}}" > <i class="fa fa-heart"></i></a>

                            <a href="#product-pop-up" class="btn btn-default fancybox-fast-view">View</a>
                          </div>
                          @else
                          <img src="{{ asset('assets/pages/img/products/model2.jpg') }}" class="img-responsive" alt="Berry Lace Dress">
                          
                          <div>
                            <a href="{{ asset('assets/pages/img/products/model2.jpg') }}" class="btn btn-default fancybox-button">Zoom</a>
                            
                            <a href="#" class="add2wishlist btn btn-default" data-productsku="{{$productvariant->sku}}" data-productvid="{{$productvariant->id}}" > <i class="fa fa-heart"></i></a>

                            <a href="#product-pop-up" class="btn btn-default fancybox-fast-view">View</a>
                          </div>
                          @endif
                          
                        </div>
                        <h3><a href="{{ route('front.shop-item.show',$productvariant->id) }}">{{ $productvariant->name }}</a></h3>
                        <div class="pi-price">${{ $productvariant->price }}</div>
                        
                        <button href="#" class="add2wishlist btn btn-default add2cart" data-productsku="{{$productvariant->sku}}" data-productvid="{{$productvariant->id}}" > <i class="fa fa-heart"></i></button>

                        {{-- <a href="javascript:;" class="btn btn-default add2cart">Add to cart</a> --}}
                        {!! Form::open(['method'=>'POST','route' => ['front.cart.store'], 'style' => 'display:inline']) !!}
                        <input id="product-quantity" type="hidden" name="productquantity" value="1">
                        <input type="hidden" name="productvid" value="{{ $productvariant->id }}">
                        <button type="submit" class="btn btn-default add2cart">Add to cart</button>
                        {!! Form::close() !!}
                      </div>
                    </div>
                    <!-- PRODUCT ITEM END -->
                    

                    {{--*/ $loopcounter++ /*--}}

                    @if($loopcounter == 3)
                    </div>
                    <!-- END PRODUCT LIST -->
                    {{--*/ $loopcounter = 0 /*--}}
                    @endif

                  @endforeach
                @endforeach 
                
                @if($loopcounter > 0 )
                  </div>
                  <!-- END PRODUCT LIST -->
                @endif

              @endif


            <!-- BEGIN PAGINATOR -->
            <div class="row">
              <div class="col-md-12 col-sm-12 pull-right">
                <div class="pull-right">{{ $products->links() }}</div>
              </div>
            </div>
            @if(0)
            <ul class="pagination"><li class="disabled"><span>&laquo;</span></li> <li class="active"><span>1</span></li><li><a href="http://127.0.0.1:8000/front/product?page=2">2</a></li> <li><a href="http://127.0.0.1:8000/front/product?page=2" rel="next">&raquo;</a></li></ul>
            
            <div class="row">
              <div class="col-md-4 col-sm-4 items-info">Items 1 to 9 of 10 total</div>
              <div class="col-md-8 col-sm-8">
                <ul class="pagination pull-right">
                  <li><a href="javascript:;">&laquo;</a></li>
                  <li><a href="javascript:;">1</a></li>
                  <li><span>2</span></li>
                  <li><a href="javascript:;">3</a></li>
                  <li><a href="javascript:;">4</a></li>
                  <li><a href="javascript:;">5</a></li>
                  <li><a href="javascript:;">&raquo;</a></li>
                </ul>
              </div>
            </div>
            @endif

            <!-- END PAGINATOR -->
          </div>
          <!-- END CONTENT -->
          {!! Form::open(array('route' => array('front.wishlist.store') )) !!}
          {!! Form::close() !!}
@endsection







@section('pagelevel-plugins-css')
  

  <!-- Page level plugin styles START -->
  <link href="{{ asset('assets/plugins/fancybox/source/jquery.fancybox.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/plugins/owl.carousel/assets/owl.carousel.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/plugins/uniform/css/uniform.default.css') }}" rel="stylesheet" type="text/css">
  <link href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" rel="stylesheet" type="text/css"><!-- for slider-range -->
  <link href="{{ asset('assets/plugins/rateit/src/rateit.css') }}" rel="stylesheet" type="text/css">
  <!-- Page level plugin styles END -->


    <link href="{{ url('assets/selectize/dist/css/selectize.default.css') }}" rel="stylesheet">
    <link href="{{ url('assets/selectize/dist/css/selectize.bootstrap2.css') }}" rel="stylesheet">
    <link href="{{ url('assets/selectize/dist/css/selectize.bootstrap3.css') }}" rel="stylesheet">
    <link href="{{ url('assets/selectize/dist/css/selectize.default.css') }}" rel="stylesheet">
    <link href="{{ url('assets/selectize/dist/css/selectize.bootstrap3.css') }}" rel="stylesheet">

 
   <style type="text/css">
   
    /* Search in the navigation bar */

.form-control.selectize-control{
  height: 34px;
}

.selectize-dropdown-content img{ width:20px; height:20px; margin-right: 3px; float:left; }

.selectize-control::before {
    -moz-transition: opacity 0.2s;
    -webkit-transition: opacity 0.2s;
    transition: opacity 0.2s;
    content: ' ';
    z-index: 2;
    position: absolute;
    display: block;
    top: 10px;
    right: 34px;
    width: 16px;
    height: 16px;
    background: url(../img/spinner.gif);
    background-size: 16px 16px;
    opacity: 0;
}
.selectize-control.loading::before {
    opacity: 1;
}

</style>
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


    <script type="text/javascript" src='{{ url("assets/selectize/dist/js/standalone/selectize.min.js") }}'></script>
    
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


            $( document ).on('click', '.add2wishlist', function( e ) {
            
            e.preventDefault();

            var productvid = $(this).data("productvid");
            var productsku = $(this).data("productsku");

            //var removerow = $(this).parent().parent();

            $.ajaxSetup({
                    headers: {
                      'X-CSRF-TOKEN': $('input[name="_token"]').val(),
                    }
                });


                //alert("hi");
                //firstname lastname email telephone address1 city post-code region-state  newslettersubscribe  sameaddress privacypolicy
                var formData = {
                    productvid:productvid,
                    productsku:productsku,
                }


                var type = "POST"; 

                var add2wishlisturl = "{{ route('front.wishlist.store') }}";
                
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
                          alert("Added to Wishlist");
                        }
                        
                    },
                    error: function (data) {
                        console.log('Error:', data);
                    }
                });


            
        });






        //$('#searchbox').selectize();

        var root = '{{url("/")}}';

        $('#searchbox').selectize({
        valueField: 'url',
        labelField: 'name',
        searchField: ['name'],
        maxOptions: 10,
        options: [],
        create: false,
        render: {
            option: function(item, escape) {
                return '<div><img src="http://127.0.0.1:8000/storage/2016-06-28-14-00-38-index.jpeg">' +escape(item.name)+'</div>';
            }
        },
        optgroups: [
            {value: 'product', label: 'Products'},
            {value: 'category', label: 'Categories'}
        ],
        optgroupField: 'class',
        optgroupOrder: ['product','category'],
        load: function(query, callback) {
            if (!query.length) return callback();
            $.ajax({
                url: root+'/front/product/search',
                type: 'GET',
                dataType: 'json',
                data: {
                    q: query
                },
                error: function() {
                    callback();
                },
                success: function(res) {
                    callback(res.data);
                }
            });
        },
        onChange: function(){
            window.location = this.items[0];
        }
    });



        });
    </script>
@endsection