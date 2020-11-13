<?php
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
 */
Route::get('/', 'JobsController@index');

Route::get('notification', 'HomeController@notification');

//return view('home' , array('id'=>Auth::id()) )->withErrors($validator->errors());
Route::auth();
Route::get('user/activation/{token}', 'Auth\AuthController@userActivation');

Route::group(['middleware' => ['auth']], function () {

	//catagory search

	Route::get('categories', ['as' => 'categories.index', 'uses' => 'CategoryController@index', 'middleware' => ['permission:categories-list|categories-create|categories-edit|categories-delete']]);

	Route::get('categories/create', ['as' => 'categories.create', 'uses' => 'CategoryController@create', 'middleware' => ['permission:item-create']]);
	Route::post('categories/create', ['as' => 'categories.store', 'uses' => 'CategoryController@store', 'middleware' => ['permission:item-create']]);
	Route::get('categories/{id}', ['as' => 'categories.show', 'uses' => 'CategoryController@show']);
	Route::get('categories/{id}/edit', ['as' => 'categories.edit', 'uses' => 'CategoryController@edit', 'middleware' => ['permission:item-edit']]);
	Route::patch('categories/{id}', ['as' => 'categories.update', 'uses' => 'CategoryController@update', 'middleware' => ['permission:item-edit']]);
	Route::delete('categories/{id}', ['as' => 'categories.destroy', 'uses' => 'CategoryController@destroy', 'middleware' => ['permission:item-delete']]);
});
