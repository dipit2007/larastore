<?php

/*
|--------------------------------------------------------------------------
| Frondend Routes
|--------------------------------------------------------------------------
|
| Here is where you can register Frondend routes for your application. 
|
*/

Route::group([
    'prefix'=>'front',
    'namespace'=>'FrontEnd',
    //'middleware' => 'auth'
    ], 
    function()
    {

        Route::resource('product','FrontEndProductController', [
            'names' => [
                'index' => 'front.product.index',
                'create' => 'front.product.create',
                'store' => 'front.product.store',
                'show' => 'front.product.show',
                'edit' => 'front.product.edit',
                'update' => 'front.product.update',
                'destroy' => 'front.product.destroy',
            ],
            'parameters' => [
                'id' => 'id'
            ]
        ]);

        Route::resource('shop-item','FrontEndProductVariantController', [
            'names' => [
                'index' => 'front.shop-item.index',
                'create' => 'front.shop-item.create',
                'store' => 'front.shop-item.store',
                'show' => 'front.shop-item.show',
                'edit' => 'front.shop-item.edit',
                'update' => 'front.shop-item.update',
                'destroy' => 'front.shop-item.destroy',
            ],
            'parameters' => [
                'id' => 'id'
            ]
        ]);

        Route::resource('cart','FrontEndCartController', [
            'names' => [
                'index' => 'front.cart.index',
                'create' => 'front.cart.create',
                'store' => 'front.cart.store',
                'show' => 'front.cart.show',
                'edit' => 'front.cart.edit',
                'update' => 'front.cart.update',
                'destroy' => 'front.cart.destroy',
            ],
            'parameters' => [
                'id' => 'id'
        ]]);

        Route::get('checkout',['as' => 'front.cart.checkout', 'uses' => 'FrontEndCartController@checkout']);

        Route::resource('wishlist','FrontEndWishListController', [
            'names' => [
                'index' => 'front.wishlist.index',
                'create' => 'front.wishlist.create',
                'store' => 'front.wishlist.store',
                'show' => 'front.wishlist.show',
                'edit' => 'front.wishlist.edit',
                'update' => 'front.wishlist.update',
                'destroy' => 'front.wishlist.destroy',
            ],
            'parameters' => [
                'id' => 'id'
        ]]);

        Route::post('wishlistremoveitem',['as' => 'front.wishlist.removeitem', 'uses' => 'FrontEndWishListController@removeitem']);
        Route::post('wishlistadditem',['as' => 'front.wishlist.additem', 'uses' => 'FrontEndWishListController@additem']);

        Route::get('shopaccount',['as' => 'front.account.shopaccount', 'uses' => 'FrontEndAccountController@shopaccount']);        
	}
);