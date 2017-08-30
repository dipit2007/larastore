<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Product;
use App\ProductVariant;

use Validator;

use Cart;

use Auth;

use App\ShopCart;

use Shop;

use App\ShopOrder;

class FrontEndCartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        Cart::instance('cart');
        
        $cart = Cart::content();

        if(Cart::count()){            

        //print "<pre>".print_r($cart,1)."</pre>"; //exit();

            return view('theme.frontend.shopshoppingcart',[
                'cart' => $cart,
                'cartsubtotal' => 0,//Cart::subtotal(),
                'carttotal' => Cart::total(),
                'carttotalitems' => Cart::count(),
            ]);
        //return view('front.theme.shopshoppingcart');
        } else {
            return view('theme.frontend.shopshoppingcartnull',[
                'cart' => $cart,
                'cartsubtotal' => 0,//Cart::subtotal(),
                'carttotal' => Cart::total(),
                'carttotalitems' => Cart::count(),
            ]);

        }
    }

        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function cartcheckoutlogin(Request $request)
    {
        //return "Hello Cart";
        $validator = Validator::make($request->all(), [
            'email' => 'required',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return ['status' => 'failed','message' => "Validation Error"];            
        }else{
            $email = $request->input('email');
            $password = $request->input('password');

            if (Auth::attempt(['email' => $email, 'password' => $password])) {
                // Authentication passed...
                return ['status' => 'success', 'message' => "Logged In Successfully"];
            } else {
                return ['status' => 'failed', 'message' => "Logged In Error"];
            }
        }    
    }

    public function checkoutaccountbillingaddress(Request $request)
    {
        
        //firstname lastname email telephone address1 city postcode regionstate

        //return "Hello Cart";
        $validator = Validator::make($request->all(), [
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required',
            'telephone' => 'required',
            'address1' => 'required',
            'city' => 'required',
            'postcode' => 'required',
            'regionstate' => 'required',
        ]);

        if ($validator->fails()) {
            return ['status' => 'failed','message' => "Validation Error"];            
        }else{
            $firstname = $request->input('firstname');
            $lastname = $request->input('lastname');
            $email = $request->input('email');
            $telephone = $request->input('telephone');
            $address1 = $request->input('address1');
            $city = $request->input('city');
            $postcode = $request->input('postcode');
            $regionstate = $request->input('regionstate');

            $accountbillingaddress = $request->only(['firstname', 'lastname', 'email', 'telephone', 'address1', 'city', 'postcode', 'regionstate', 'newslettersubscribe',  'sameaddress', 'privacypolicy']);

            //$request->session()->flush();

            $request->session()->push('checkout.accountbillingaddress',$accountbillingaddress);

            //print print_r($request->session()->get('checkout'),1);

            if ( 1 ) {
                // Authentication passed...
                return ['status' => 'success', 'message' => "Logged In Successfully",'data' => $request->session()->get('checkout')];
            } else {
                return ['status' => 'failed', 'message' => "Logged In Error"];
            }
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function checkout()
    {
        Cart::instance('cart');

        if( Auth::guest() ){
            $cart = Cart::content();

            //$shopcart = ShopCart::current();

            return view('theme.frontend.shopcheckout',[
                'cart' => $cart,
                //'shopcart' => $shopcart,
                'cartsubtotal' => 0,//Cart::subtotal(),
                'carttotal' => Cart::total(),
                'carttotalitems' => Cart::count(),
                ]);

        } else {
            $shopcart = ShopCart::current();

            if(Cart::count()){


                $cart = Cart::content();

            //print "<pre>" . print_r($cart,1) . "</pre>";

                //$shopcart = ShopCart::current();

                $shopcart->clear();


                foreach ($cart as $cartkey => $cartvalue) {
                    $productvid = $cartvalue->id;
                    $productvariant = ProductVariant::findOrFail($productvid);

                    $shopcart->add($productvariant,$cartvalue->qty);
                }

            //echo $shopcart->count;

            //print "<pre>" . print_r($shopcart,1) . "</pre>";

                return view('theme.frontend.shopcheckout',[
                    'cart' => $cart,
                    'shopcart' => $shopcart,
                    'cartsubtotal' => 0,//Cart::subtotal(),
                    'carttotal' => Cart::total(),
                    'carttotalitems' => Cart::count(),
                ]);

            } else {
                return view('theme.frontend.shopshoppingcartnull',[
                'cart' => Cart::content(),
                'shopcart' => $shopcart,
                'cartsubtotal' => 0,//Cart::subtotal(),
                'carttotal' => Cart::total(),
                'carttotalitems' => Cart::count(),
            ]);

            }
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getplaceorder()
    {
        Cart::instance('cart');

        if( Auth::guest() ){
            return redirect()->route('front.cart.checkout');
        } else {
            
            $order = ShopOrder::find(6);
            
            //print "<pre>" . print_r($order->items() ,1) . "</pre>";

            /*print "dips";

            print $order->items->count();

            $items = $order->items;

            foreach($items  as $item )
            {
                print "order item";
                print $item->sku;
            }*/

            return view('front.theme.shopordercomplete',[
                'cart' => Cart::content(),
                'order' => $order,
                'cartsubtotal' => 0,//Cart::subtotal(),
                'carttotal' => Cart::total(),
                'carttotalitems' => Cart::count(),
            ]);
        }
          
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function placeorder()
    {
        Cart::instance('cart');

        if( Auth::guest() ){
            return redirect()->route('front.cart.checkout');
        } else {
            // Select the gateway to use
            Shop::setGateway('cod');

            //echo Shop::getGateway(); // echos: paypal

            $shopcart = ShopCart::current();

            // On checkout
            if (!Shop::checkout($shopcart)) {
              $exception = Shop::exception();
              echo $exception->getMessage(); // echos: error
          }

            // Placing order
          $order = Shop::placeOrder($shopcart);

          if ($order->hasFailed) {
              $exception = Shop::exception();
              echo $exception->getMessage(); // echos: error
          } else {
                //Empty Session Cart as successful
            Cart::destroy();

            return view('front.theme.shopordercomplete',[
                'cart' => Cart::content(),
                'order' => $order,
                'cartsubtotal' => 0,//Cart::subtotal(),
                'carttotal' => Cart::total(),
                'carttotalitems' => Cart::count(),
            ]);
        }

            /////////

        $cart = Cart::content();

            //print "<pre>" . print_r($cart,1) . "</pre>";

        $shopcart = ShopCart::current();

            //echo $shopcart->count;

            //print "<pre>" . print_r($shopcart,1) . "</pre>";

        return view('front.theme.shopordercomplete',[
            'cart' => $cart,
                'cartsubtotal' => 0,//Cart::subtotal(),
                'carttotal' => Cart::total(),
                'carttotalitems' => Cart::count(),
        ]);

        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Cart::destroy();

        Cart::instance('cart');

        //return "Hello Cart";
        $validator = Validator::make($request->all(), [
            'productvid' => 'required',
            'productquantity' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect(route('front.product.index'))
                ->withInput()
                ->withErrors($validator);
        }

        if ($request->isMethod('post')) {
            $productvid = $request->input('productvid');
            $productquantity = $request->input('productquantity');
            $productvariant = ProductVariant::findOrFail($productvid);

            //Cart::add([ 'id' => $productvariant->id, 'name' => $productvariant->name, 'qty' => 1, 'price' => $productvariant->price ]);
            Cart::add([ 'id' => $productvariant->id, 'name' => $productvariant->name, 'qty' => $productquantity , 'price' => $productvariant->price ])->associate('App\ProductVariant');
            //Cart::associate('ProductVariant','App')->add([ 'id' => $productvariant->id, 'name' => $productvariant->name, 'qty' => $productquantity , 'price' => $productvariant->price ]);
        }
        
        $cart = Cart::content();


        //print "<pre>".print_r($cart,1)."</pre>"; //exit();

        return view('theme.frontend.shopshoppingcart',[
            'cart' => $cart,
            'cartsubtotal' => 0,//Cart::subtotal(),
            'carttotal' => Cart::total(),
            'carttotalitems' => Cart::count(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function removeitem(Request $request)
    {
        //return "Hello Cart";
        $validator = Validator::make($request->all(), [
            'rowid' => 'required',
        ]);

        if ($validator->fails()) {
            return ['status' => 'failed', 'message' => "validator failed"];
        }

        if ($request->isMethod('post')) {
            $rowId = $request->input('rowid');

            Cart::instance('cart');

            Cart::remove($rowId); 


            // Calculation Update START

            Cart::instance('cart');        
            $cart = Cart::content();
            $carttotal = Cart::total();
            $carttotalitems = Cart::count();

            $shopcartsubtotal = 0; $totaltax = 0 ; $totalshipping = 0;

            /*foreach(Cart::content() as $row) {
                echo 'You have ' . $row->qty . ' items of ' . $row->model->name . ' with description: "' . $row->model->description . '" in your cart.';
            }  */    
            foreach($cart as $item) {
                $shopcartsubtotal += $item->price * $item->qty ;
                $totaltax += $item->model->tax * $item->qty ;
                $totalshipping += $item->model->shipping * $item->qty ;
            }

            //$shopcartsubtotal = Cart::subtotal();
            //$totaltax = Cart::tax();

            // Calculation Update END

            return [
                'status' => 'success',
                'message' => "Item Removed Successfully",
                'shopcartsubtotal' => $shopcartsubtotal,
                'totaltax' => $totaltax,
                'totalshipping' => $totalshipping,
                'carttotal' => $carttotal + $totaltax + $totalshipping,
                'carttotalitems' => $carttotalitems,
            ];       
        } else {
            return ['status' => 'failed', 'message' => "Method Not Allowed"];
        }

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function changeitemquantity(Request $request)
    {
        // TODO
        // 1. When total qty becomes zero remove whole row otherwise rowId does not exists error

        //return "Hello Cart";
        $validator = Validator::make($request->all(), [
            'rowid' => 'required',
            'quantity' => 'required',
        ]);

        if ($validator->fails()) {
            return ['status' => 'failed', 'message' => "validator failed"];
        }

        if ($request->isMethod('post')) {
            $rowId = $request->input('rowid');
            $quantity = $request->input('quantity');

            Cart::instance('cart');

            Cart::update($rowId,$quantity); // Will update the quantity

            // Calculation Update START

            Cart::instance('cart');        
            $cart = Cart::content();
            $carttotal = Cart::total();
            $carttotalitems = Cart::count();

            $shopcartsubtotal = 0; $totaltax = 0 ; $totalshipping = 0;

            /*foreach(Cart::content() as $row) {
                echo 'You have ' . $row->qty . ' items of ' . $row->model->name . ' with description: "' . $row->model->description . '" in your cart.';
            }  */    
            foreach($cart as $item) {
                $shopcartsubtotal += $item->price * $item->qty ;
                $totaltax += $item->model->tax * $item->qty ;
                $totalshipping += $item->model->shipping * $item->qty ;
            }

            //$shopcartsubtotal = Cart::subtotal();
            //$totaltax = Cart::tax();

            // Calculation Update END

            return [
                'status' => 'success',
                'message' => "Item Removed Successfully",
                'shopcartsubtotal' => $shopcartsubtotal,
                'totaltax' => $totaltax,
                'totalshipping' => $totalshipping,
                'carttotal' => $carttotal + $totaltax + $totalshipping,
                'carttotalitems' => $carttotalitems,
            ];       
        } else {
            return ['status' => 'failed', 'message' => "Method Not Allowed"];
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
