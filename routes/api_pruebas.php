<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes - esta es un ejemplo de la api que se va a manejar
|--------------------------------------------------------------------------
*/

//RUTAS DE PRODUCTOS
Route::middleware(['auth:api'])->prefix('productos')->group(function ($router){
    Route::get('/', 'ProductosController@index');
    Route::get('listado', 'ProductosController@listadoGeneral');
    Route::get('listado/{id}', 'ProductosController@listadoPorId');
    Route::post('/', 'ProductosController@create');
    Route::patch('/', 'ProductosController@update');
    Route::delete('/{id}', 'ProductosController@destroy');
});
