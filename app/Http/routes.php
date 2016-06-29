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

Route::get('/', 'WelcomeController@index');

Route::get('home', 'HomeController@index');

Route::Resource('/users', 'UserController');

get('/api/users', function (){
	return App\User::all();
});

post('/api/users', function () {
	return App\User::create(Request::all());
});


Route::Resource('/clientes', 'ClienteController');

get('/api/clientes', function (){
	return App\Cliente::all();
});

post('/api/clientes', function () {
	return App\Cliente::create(Request::all());
});
get('/api/clientes/{id}', function ($id) {
	return App\Cliente::findOrFail($id);
});
patch('/api/clientes/{id}', function ($id) {
	App\Cliente::findOrFail($id)->update(Request::all());
	return Response::json(Request::all());
});
delete('/api/clientes/{id}', function($id) {
	return App\Cliente::destroy($id);
});

/*


Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
 */