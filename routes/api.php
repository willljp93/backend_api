<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});
//api Clientes
Route::get('/clients', 'App\Http\Controllers\ClientController@index');
Route::post('/clients', 'App\Http\Controllers\ClientController@store');
Route::get('/clients/{client}', 'App\Http\Controllers\ClientController@show');
Route::put('/clients/{client}', 'App\Http\Controllers\ClientController@update');
Route::delete('/clients/{client}', 'App\Http\Controllers\ClientController@destroy');
//api Servicios
Route::get('/services', 'App\Http\Controllers\ServiceController@index');
Route::post('/services', 'App\Http\Controllers\ServiceController@store');
Route::get('/services/{service}', 'App\Http\Controllers\ServiceController@show');
Route::put('/services/{service}', 'App\Http\Controllers\ServiceController@update');
Route::delete('/services/{service}', 'App\Http\Controllers\ServiceController@destroy');
//api asignar servicios a clientes
Route::post('/clients/service', 'App\Http\Controllers\ClientController@attach');
Route::post('/clients/service/detach', 'App\Http\Controllers\ClientController@detach');
//api ver cusntos clientes tienen un servicio
Route::post('/services/clients', 'App\Http\Controllers\ServiceController@clients');