<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes - esta es un ejemplo de la api que se va a manejar
|--------------------------------------------------------------------------
*/

//RUTAS DE PASAJEROS
Route::middleware(['auth:api'])->prefix('pasajeros')->group(function ($router){
    Route::get('listado', 'PasajerosController@listadoGeneral');
    Route::get('listado/{id}', 'PasajerosController@listadoPorId');
    Route::post('/', 'PasajerosController@create');
    Route::patch('/', 'PasajerosController@update');
    Route::delete('/{id}', 'PasajerosController@destroy');
});

//RUTAS DE PILOTOS
Route::middleware(['auth:api'])->prefix('pilotos')->group(function ($router){
    Route::get('listado', 'PilotosController@listadoGeneral');
    Route::get('listado/{id}', 'PilotosController@listadoPorId');
    Route::post('/', 'PilotosController@create');
    Route::patch('/', 'PilotosController@update');
    Route::delete('/{id}', 'PilotosController@destroy');
});

//RUTAS DE AERONAVES
Route::middleware(['auth:api'])->prefix('aeronaves')->group(function ($router){
    Route::get('listado', 'AeronavesController@listadoGeneral');
    Route::get('listado/{id}', 'AeronavesController@listadoPorId');
    Route::post('/', 'AeronavesController@create');
    Route::patch('/', 'AeronavesController@update');
    Route::delete('/{id}', 'AeronavesController@destroy');
});
