<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/



# Log the user out of the application route
Route::get('logout', [ 
	'as' => 'auth.logout', 
	'uses' => 'Auth\AuthController@getLogout'
]);



/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
	Route::auth();
	Route::get('/', 		  [ 'as' => 'index', 'uses' => 'HomeController@index' ]);
});

Route::group(['middleware' => ['web', 'auth']], function () {
	
	Route::get('/home', 		[ 'as' => 'home', 'uses' => 'HomeController@home' ]);    

	# Shipping Routes
    Route::get('/shippings', 	[ 'as' => 'shippings', 'uses' => 'ShippingController@index' ]);

    Route::get('/shippings/new',	 [ 'as' => 'shippings.new', 	'uses' => 'ShippingController@getCreate' ]);
    Route::post('/shippings/create', [ 'as' => 'shippings.create', 	'uses' => 'ShippingController@postCreate' ]);

    Route::get('/shippings/location/new/{code}', [ 'as' => 'shippings.location.new', 	'uses' => 'ShippingController@getCreateShippingLocation' ]);
    Route::post('/shippings/location/create', 	 [ 'as' => 'shippings.location.create', 'uses' => 'ShippingController@postCreateShippingLocation' ]);
   


    # User Routes
	Route::get('/users', 		[ 'as' => 'users', 		'uses' => 'UserController@index' ]);
	Route::get('/users/new', 	[ 'as' => 'users.new',  'uses' => 'UserController@getCreate' ]);
	Route::post('/users/create',[ 'as' => 'users.create','uses' => 'UserController@postCreate']);
	Route::get('/users/edit/{id}',	[ 'as' => 'users.edit', 	 'uses' => 'UserController@getEdit']);

	# Branch Routes
	Route::get('/branch', 		[ 'as' => 'branch', 	'uses' => 'BranchController@index']);
	Route::get('/branch/new', 	[ 'as' => 'branch.new', 'uses' => 'BranchController@getCreate']);
	Route::post('/branch/create', 	[ 'as' => 'branch.create', 'uses' => 'BranchController@postCreate']);
});
