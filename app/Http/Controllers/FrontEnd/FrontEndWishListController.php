<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use Cart;

use App\Product;
use App\ProductVariant;

use Validator;

use Auth;

use App\ShopCart;

use Shop;

use App\ShopOrder;

use App\WishList;

class FrontEndWishListController extends Controller
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
        $carttotal = Cart::total();
        $carttotalitems = Cart::count();

        Cart::instance('wishlist');

        $wishlist = Cart::content();
        
        return view('theme.frontend.shopwishlist',[
            'cart' => $cart,
            'wishlist' => $wishlist,
            'cartsubtotal' => 0,//Cart::subtotal(),
            'carttotal' => $carttotal,
            'carttotalitems' => $carttotalitems,
        ]);
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

        Cart::instance('wishlist');

        //return "Hello Cart";
        $validator = Validator::make($request->all(), [
            'productvid' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect(route('front.product.index'))
                ->withInput()
                ->withErrors($validator);
        }

        if ($request->isMethod('post')) {
            $productvid = $request->input('productvid');
            $productvariant = ProductVariant::findOrFail($productvid);

            //Cart::add([ 'id' => $productvariant->id, 'name' => $productvariant->name, 'qty' => 1, 'price' => $productvariant->price ]);
            Cart::add([ 'id' => $productvariant->id, 'name' => $productvariant->name, 'qty' => 1, 'price' => $productvariant->price ])->associate('App\ProductVariant');
        }
        if($request->ajax()){
            return ['status' => "success", "message" => "Added to Wishlist"];
        } else {
            return redirect()->route('front.wishlist.index');
        }
    }

        /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function removeitem(Request $request)
    {
        Cart::instance('wishlist');
        //return "Hello Cart";
        $validator = Validator::make($request->all(), [
            'rowid' => 'required',
        ]);

        if ($validator->fails()) {
            return ['status' => 'failed', 'message' => "validator failed"];
        }

        if ($request->isMethod('post')) {
            $rowId = $request->input('rowid');

            Cart::remove($rowId); 

            return ['status' => 'success', 'message' => "Item Removed Successfully"];       
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
    public function additem(Request $request)
    {
        Cart::instance('wishlist');
        //return "Hello Cart";
        $validator = Validator::make($request->all(), [
            'rowid' => 'required',
        ]);

        if ($validator->fails()) {
            return ['status' => 'failed', 'message' => "validator failed"];
        }

        if ($request->isMethod('post')) {
            $rowId = $request->input('rowid');

             
            $item = Cart::get($rowId);

            Cart::remove($rowId);

            Cart::instance('cart');

            Cart::add([ 'id' => $item->id, 'name' => $item->name, 'qty' => 1, 'price' => $item->price ])->associate('App\ProductVariant');
            //Cart::add($item,1);

            return ['status' => 'success', 'message' => "Item Removed Successfully"];       
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
