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
    }
);

