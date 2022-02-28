<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\PagosController;
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
    return view('auth.login');
});



Route::get('/clientes/index', function () {
    return view('clientes.index');
});

Route::get('/pagos/index', function () {
    return view('pagos.index');
});

/* Route::resource('clientes','App\Http\Controllers\ClienteController');
Route::resource('pagos','App\Http\Controllers\PagosController'); */

/* Ruta de clientes */
/* Route::post('clientes',[ClienteController::class,'index'])
->name('clientes.index'); */

Route::post('clientes/index',[ClienteController::class,'store'])
->name('clientes.create');

Route::get('clientes/eliminar/{id}',[ClienteController::class,'destroy'])
->name('clientes.eliminar');

Route::put('clientes/update/{id}',[ClienteController::class,'update'])
->name('clientes.update');

Route::get('clientes/editar/{id}',[ClienteController::class,'edit'])
->name('clientes.editar');

Route::get('clientes/pago/{id}',[ClienteController::class,'edit'])
->name('clientes.editar');
/* Fin de rutas de clientes */


/* RUTA DE PAGOS */
Route::post('pagos/index',[PagosController::class,'store'])
->name('pagos.create');

Route::get('pagos/eliminar/{id}',[PagosController::class,'destroy'])
->name('pagos.eliminar');

Route::put('pagos/update/{id}',[PagosController::class,'update'])
->name('pagos.update');

Route::get('pagos/editar/{id}',[PagosController::class,'edit'])
->name('pagos.editar');
/* FIN DE RUTAS */


Route::get('/admin', [AdminController::class,'index'])
    -> middleware('auth.admin')
    -> name('admin.index');

Route::get('/clientes', [ClienteController::class,'index'])
-> middleware('auth.admin')
-> name('clientes.index');

Route::get('/pagos', [PagosController::class,'index'])
-> middleware('auth.admin')
-> name('pagos.index');

