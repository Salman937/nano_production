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

Route::post('search',[

	'uses' => 'Apis\SearchController@index',
	'as'   => 'search'

]);

Route::post('search',[

	'uses' => 'Apis\SearchController@index',
	'as'   => 'search'
]);

Route::get('product/show',[

	'uses' => 'Apis\ProductsController@index',
	'as'   => 'product.show'	
]);

Route::get('product/{id}',[

	'uses' => 'Apis\ProductsController@product',
	'as'   => 'product'
]);

Route::get('/albums',[

	'uses' => 'Apis\ProductsController@gallery',
	'as'   => 'albums'
]);

Route::get('/images-gallery/{id}', [

	'uses' => 'Apis\ProductsController@gallery_images',
	'as'   => 'images-gallery'
]);


Route::group(['prefix' => 'user'], function() {
   
	Route::post('login', [
		'uses' => 'Apis\LoginController@index',
		'as'   => 'login'
	]);

	Route::group(['middleware' => 'auth:api'], function() {
	    
		Route::post('register',[

			'uses' => 'Apis\RegisterController@register',
			'as'   => 'register'

		]);

		Route::post('applications-done',[

			'uses' => 'Apis\ApplicationDoneController@applicants',
			'as'   => 'applications-done'
		]);

		Route::post('user-details',[

			'uses' => 'Apis\UsersController@user_details',
			'as'   => 'user-details'

		]);

		Route::post('getWarantyCode',[

			'uses' => 'Apis\UsersController@get_waranty_code',
			'as'   => 'getWarantyCode'

		]);
	});


	Route::get('map-users',[

		'uses' => 'Apis\UsersController@map_users',
		'as'   => 'map-users'
	]);

	Route::get('get-user-in-map/{id}',[

		'uses' => 'Apis\UsersController@get_user_in_map',
		'as'   => 'get-user-in-map'
	]);
});