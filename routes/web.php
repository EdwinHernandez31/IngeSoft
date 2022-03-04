<?php

use App\Http\Controllers\autorController;
use App\Http\Controllers\carritoController;
use App\Http\Controllers\catalogoController;
use App\Http\Controllers\categoriasController;
use App\Http\Controllers\DetalleVentaController;
use App\Http\Controllers\editorialController;
use App\Http\Controllers\librosController;
use App\Http\Controllers\ventaController;
use Illuminate\Support\Facades\Route;
use Monolog\Handler\RotatingFileHandler;
use Illuminate\Support\Facades\Auth;

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
    //return "Hola Mundo";
});

Route::get('/principal', function () {
    return view('hola');
    //return "Hola Mundo";
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home');

Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'App\Http\Controllers\UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'App\Http\Controllers\ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\ProfileController@update']);
	Route::get('upgrade', function () {return view('pages.upgrade');})->name('upgrade'); 
	 Route::get('map', function () {return view('pages.maps');})->name('map');
	 Route::get('icons', function () {return view('pages.icons');})->name('icons'); 
	 Route::get('table-list', function () {return view('pages.tables');})->name('table');
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\ProfileController@password']);
	
	Route::get('/categorias',[categoriasController::class,'index'])
	->middleware('verificarRol:1')
	->name('r.categoria');
	Route::post('api/guardar_categoria',[categoriasController::class,'guardar']);
	Route::post('api/elimina_categoria',[categoriasController::class,'eliminar']);
	Route::get('api/categoria',[categoriasController::class,'listar']);
	
	Route::get('/autores',[autorController::class,'index'])
	->middleware('verificarRol:1')
	->name('r.autor');
	Route::post('api/guardar_autor',[autorController::class,'guardar']);
	Route::post('api/elimina_autor',[autorController::class,'eliminar']);
	Route::get('api/autor',[autorController::class,'listar']);
	
	Route::get('/venta',[ventaController::class,'index'])
	->middleware('verificarRol:1')
	->name('r.venta');
	Route::post('api/guardar_venta',[ventaController::class,'guardar']);
	Route::post('api/eliminar_venta',[ventaController::class,'eliminar']);
	Route::get('api/venta',[ventaController::class,'listar']);

	Route::get('/detalleventa',[DetalleVentaController::class,'index'])->name('r.dtventa');
	Route::get('api/dtventa',[DetalleVentaController::class,'listar']);

	
	Route::get('/catalogo',[catalogoController::class,'index'])->name('r.catalogo');

	Route::post('api/guardar_Cventa',[catalogoController::class,'guardar']);
	Route::get('api/Cventa',[ventaController::class,'listarV']);
	Route::post('api/guardar_Dtventa',[catalogoController::class,'guardarDetalleVenta']);
	



	





	
	Route::get('/libros',[librosController::class,'index'])->name('r.libros');
	
	

	Route::post('api/guardar_libro',[librosController::class,'guardar']);
	Route::post('api/elimina_libro',[librosController::class,'eliminar']);

	Route::get('api/libros',[librosController::class,'listar']);
	Route::get('api/categorias',[categoriasController::class,'listar']);
	Route::get('api/editorial',[editorialController::class,'listar']);
	Route::get('api/autor',[autorController::class,'listar']);
});

