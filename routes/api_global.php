<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes - estas son las rutas de todas aquellas rutas que se vallan a manejar de manera global para el sistema
|--------------------------------------------------------------------------
*/

//RUTAS PARA EL LOGIN Y DEMAS UTILIDADES PARA EL JWT
Route::prefix('auth/v1')->group(function ($router){
    Route::post('login', 'AuthController@login');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
});
//RUTAS DE USUARIOS
Route::middleware(['auth:api'])->prefix('usuarios')->group(function ($router){
    Route::get('/', 'UsersController@index');
    Route::get('listado', 'UsersController@listadoGeneral');
    Route::get('listado/{id}', 'UsersController@listadoPorId');
    Route::post('/', 'UsersController@create');
    Route::patch('/', 'UsersController@update');
    Route::delete('/{id}', 'UsersController@destroy');
});

//RUTAS DE ESTADOS GENERALES
Route::middleware(['auth:api'])->prefix('estados_generales')->group(function ($router){
    Route::get('/', 'EstadosGeneralesController@index');
    Route::get('listado', 'EstadosGeneralesController@listadoGeneral');
    Route::get('listado/{id}', 'EstadosGeneralesController@listadoPorId');
    Route::post('/', 'EstadosGeneralesController@create');
    Route::patch('/', 'EstadosGeneralesController@update');
    Route::delete('/{id}', 'EstadosGeneralesController@destroy');
});



