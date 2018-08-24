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

Route::get('/', 'UsersController@dashboard');
Route::get('/recipes', 'RecipesController@index');
Route::get('help', 'PagesController@help');
Route::get('home', 'PagesController@home');
Route::get('contact', 'PagesController@contact');
Route::get('about', 'PagesController@about');
Route::get('instructions', 'PagesController@instructions');
Route::get('logout', 'PagesController@logout');
Route::post('/food/search', 'FoodsController@search');
Route::get('/food/search', 'FoodsController@search');
Route::post('/payment/success', 'PaymentsController@success');
Route::get('/payment/success', 'PaymentsController@success');
Route::post('/payment/failure', 'PaymentsController@failure');
Route::get('/payment/failure', 'PaymentsController@failure');

Route::post('/payment/validateKey/{clave}','PaymentsController@validateKey');
Route::get('/payment/validateKey/{clave}', 'PaymentsController@validateKey');

Route::post('/payment/saveKey', 'PaymentsController@saveKeyTransaction');
Route::get('/payment/saveKey', 'PaymentsController@saveKeyTransaction');

Route::get('/user/dashboard', 'UsersController@dashboard');
Route::model('food','App\Food');
Route::model('user','App\User');
Route::resource('user', 'UsersController');
Route::get('/user/{user_id}/activate', 'UsersController@activate');
Route::resource('food', 'FoodsController');
//Route::resource('recipe', 'RecipesController');
Route::get('/food/{food_code}/details', 'FoodsController@details');
Route::get('/recipe/get_foods_list/{group_id}', 'RecipesController@get_foods_list');
Route::post('/recipe/get_foods_list/{group_id}', 'RecipesController@get_foods_list');
Route::post('/recipe/export_to_excel', 'RecipesController@export_to_excel');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
