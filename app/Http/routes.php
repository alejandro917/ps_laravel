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

Route::Resource('/facturas', 'FacturaController');

get('/api/facturas/', function (){
	return App\Factura::all();
});

get('/api/facturas/{id}', function ($id) {
	return App\Factura::findOrFail($id);
});
post('/api/facturas', function () {
	return App\Factura::create(Request::all());
});

patch('/api/facturas/{id}', function ($id) {
	App\Factura::findOrFail($id)->update(Request::all());
	return Response::json(Request::all());
});
patch('/api/facturas/productos/{id}', function ($numero_factura) {
	App\FacturaProducto::findOrFail($numero_factura)->update(Request::all());
	return Response::json(Request::all());
});
post('/api/facturas/productos', function () {
	return App\FacturaProducto::create(Request::all());
});

get('/api/facturas/productos/{id}', function ($id) {
	return App\FacturaProducto::where('factura_id', '=', $id)->get();
});
delete('/api/facturas/productos/{id}', function($id) {
	return App\FacturaProducto::destroy($id);
});


/*


Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
 */