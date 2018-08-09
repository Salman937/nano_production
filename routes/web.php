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

Route::get('/',[
	'uses' => 'Auth\LoginController@showLoginForm'
]);

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => 'auth'], function() {

	Route::resource('gallery','Admin\GalleryController');
	Route::resource('newsfeed','Admin\NewfeedContrller');
	Route::resource('products','Admin\ProductsController');
	Route::resource('customers','Admin\CustomersController');

	Route::get('detailers',[

		'uses' => 'Admin\DetailersController@index',
		'as'   => 'detailers'
	]);

	Route::post('create',[

		'uses' => 'Admin\DetailersController@create',
		'as'   => 'create'
	]);

	Route::get('/detailer/delete/{id}',[

		'uses' => 'Admin\DetailersController@destroy',
		'as'   => 'detailer.delete'
	]);

	Route::get('/detailer/edit/{id}',[
		'uses' => 'Admin\DetailersController@edit',
		'as'   => 'detailer.edit'
	]);

	Route::post('/detailer/update/{id}',[
		'uses' => 'Admin\DetailersController@update',
		'as'   => 'detailer.update'
	]);
});