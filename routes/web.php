<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');





/*
|--------------------------------------------------------------------------
| Frondend Routes
|--------------------------------------------------------------------------
|
| Here is where you can register Frondend routes for your application. 
|
*/














/*
|--------------------------------------------------------------------------
| Backend Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register Backend Admin routes for your application. 
|
*/


Route::group(
	[
		'prefix'=>'backend',
		//'namespace'=>'Backend',
		'middleware' => 'auth'
    ],
    function()
    {
    	// blank START
    	Route::get('/blank',function()
        {
        	return view('theme.backend.pages.blank',[ 'menu' => "blank", 'submenu' => 'blank' ]);
        });
    	// blank END
    	
    	// dashboard START
    	Route::get('/',function()
        {
        	return view('theme.backend.pages.dashboard',[ 'menu' => "dashboard", 'submenu' => 'dashboard' ]);
        });
    	// dashboard END

        // BRAND START 

        Route::get('brand/datatable', [ 'as' => 'admin.brand.datatable', 'uses' => 'ProductBrandController@datatable']);
        Route::resource('brand','ProductBrandController', [
            'names' => [
                'index' => 'admin.brand.index',
                'create' => 'admin.brand.create',
                'store' => 'admin.brand.store',
                'show' => 'admin.brand.show',
                'edit' => 'admin.brand.edit',
                'update' => 'admin.brand.update',
                'destroy' => 'admin.brand.destroy',
            ],

            'parameters' => [
                'id' => 'id'
            ]
        ]);
        // BRAND END 

        // CATEGORY START 

        Route::get('category/datatable', [ 'as' => 'admin.category.datatable', 'uses' => 'ProductCategoryController@datatable']);
        Route::resource('category','ProductCategoryController', [
            'names' => [
                'index' => 'admin.category.index',
                'create' => 'admin.category.create',
                'store' => 'admin.category.store',
                'show' => 'admin.category.show',
                'edit' => 'admin.category.edit',
                'update' => 'admin.category.update',
                'destroy' => 'admin.category.destroy',
            ],

            'parameters' => [
                'id' => 'id'
            ]
        ]);
        // CATEGORY END 

        // PRODUCT START 

        Route::get('product/datatable', [ 'as' => 'admin.product.datatable', 'uses' => 'ProductController@datatable']);
        Route::resource('product','ProductController', [
            'names' => [
                'index' => 'admin.product.index',
                'create' => 'admin.product.create',
                'store' => 'admin.product.store',
                'show' => 'admin.product.show',
                'edit' => 'admin.product.edit',
                'update' => 'admin.product.update',
                'destroy' => 'admin.product.destroy',
            ],

            'parameters' => [
                'id' => 'id'
            ]
        ]);
        // PRODUCT END 

        // PRODUCT ATTRIBUTE START 

        Route::get('productattribute/datatable', [ 'as' => 'admin.product.attribute.datatable', 'uses' => 'ProductAttributeController@datatable']);
        Route::resource('productattribute','ProductAttributeController', [
            'names' => [
                'index' => 'admin.product.attribute.index',
                'create' => 'admin.product.attribute.create',
                'store' => 'admin.product.attribute.store',
                'show' => 'admin.product.attribute.show',
                'edit' => 'admin.product.attribute.edit',
                'update' => 'admin.product.attribute.update',
                'destroy' => 'admin.product.attribute.destroy',
            ],

            'parameters' => [
                'id' => 'id'
            ]
        ]);
        // PRODUCT ATTRIBUTE END 

        // PRODUCT ATTRIBUTE VALUE START 

        Route::get('productattributevalue/datatable', [ 'as' => 'admin.product.attribute.value.datatable', 'uses' => 'ProductAttributeValueController@datatable']);
        Route::resource('productattributevalue','ProductAttributeValueController', [
            'names' => [
                'index' => 'admin.product.attribute.value.index',
                'create' => 'admin.product.attribute.value.create',
                'store' => 'admin.product.attribute.value.store',
                'show' => 'admin.product.attribute.value.show',
                'edit' => 'admin.product.attribute.value.edit',
                'update' => 'admin.product.attribute.value.update',
                'destroy' => 'admin.product.attribute.value.destroy',
            ],

            'parameters' => [
                'id' => 'id'
            ]
        ]);
        // PRODUCT ATTRIBUTE VALUE END 

        // PRODUCT VARIANT

        Route::get('productvariant/datatable', [ 'as' => 'admin.product.variant.datatable', 'uses' => 'ProductVariantController@datatable']);
        Route::resource('productvariant','ProductVariantController', [
            'names' => [
                'index' => 'admin.product.variant.index',
                'create' => 'admin.product.variant.create',
                'store' => 'admin.product.variant.store',
                'show' => 'admin.product.variant.show',
                'edit' => 'admin.product.variant.edit',
                'update' => 'admin.product.variant.update',
                'destroy' => 'admin.product.variant.destroy',
            ],

            'parameters' => [
                'id' => 'id'
            ]
        ]);
        // PRODUCT VARIANT END 
    }
);

