<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('personal-zone',[

	'uses' => 'Apis\PersonalZoneController@index',
	'as'   => 'personal-zone'

]);

Route::get('products',[

	'uses' => 'Apis\ProductsController@index',
	'as'   => 'products'	
]);

Route::get('product/{id}',[

	'uses' => 'Apis\ProductsController@product',
	'as'   => 'product'
]);

Route::group(['prefix' => 'user'], function() {
   
	Route::post('login', [
		'uses' => 'Apis\LoginController@index',
		'as'   => 'login'
	]);

	Route::post('register',[

		'uses' => 'Apis\UserRegisterApiController@register',
		'as'   => 'register'

	]);

	Route::get('map-users',[

		'uses' => 'Apis\UsersController@map_users',
		'as'   => 'map-users'
	]);

	Route::get('get-user-in-map/{id}',[

		'uses' => 'Apis\UsersController@get_user_in_map',
		'as'   => 'get-user-in-map'
	]);
});