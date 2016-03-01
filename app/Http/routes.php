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
	Route::get('/', function () { return view('welcome'); });
});

Route::group(['middleware' => ['web', 'auth']], function () {
	
	Route::get('/home', 		[ 'as' => 'home', 'uses' => 'HomeController@index' ]);    

	# Shipping Routes
    Route::get('/shippings', 	[ 'as' => 'shippings', 'uses' => 'ShippingController@index' ]);
    Route::get('/shippings/new',[ 'as' => 'shippings.new', 'uses' => 'ShippingController@getCreate' ]);
    Route::post('/shippings/create', [ 'as' => 'shippings.create', 'uses' => 'ShippingController@postCreate' ]);

    # User Routes
	Route::get('/users', 		[ 'as' => 'users', 		'uses' => 'UserController@index' ]);
	Route::get('/users/new', 	[ 'as' => 'users.new',  'uses' => 'UserController@getCreate' ]);
	Route::post('/users/create',[ 'as' => 'users.create','uses' => 'UserController@postCreate']);

	# Branch Routes
	Route::get('/branch', 		[ 'as' => 'branch', 	'uses' => 'BranchController@index']);
	Route::get('/branch/new', 	[ 'as' => 'branch.new', 'uses' => 'BranchController@create']);
});
