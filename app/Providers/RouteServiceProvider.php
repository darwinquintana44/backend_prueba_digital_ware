<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to your controller routes.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'App\Http\Controllers';

    /**
     * The path to the "home" route for your application.
     *
     * @var string
     */
    public const HOME = '/home';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        //

        parent::boot();
    }

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map()
    {
        $this->mapApiRoutes();

        $this->mapWebRoutes();

        $this->mapGlobal(); // mapeamos las rutas y asi podemos crear las nuestras individualmente por aplicativo

        $this->mapPruebas(); // mapeamos las rutas y asi podemos crear las nuestras individualmente por aplicativo

        //
    }

    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapWebRoutes()
    {
        Route::middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/web.php'));
    }

    /**
     * Define the "api" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapApiRoutes()
    {
        Route::prefix('api')
            ->middleware('api')
            ->namespace($this->namespace)
            ->group(base_path('routes/api.php'));
    }

    /*
     * Definimos las rutas API para todas las rutas globales del sistema
     * */

    protected function mapGlobal(){
        Route::prefix('apiglobal')
            ->middleware('api')
            ->namespace('App\Api\Configuracion\Controladores')
            ->group(base_path('routes/api_global.php'));
    }

    /*
     * Definimos las rutas API para el aplicativo de pruebas
     * */

    protected function mapPruebas(){
        Route::prefix('apiprueba')
            ->middleware('api')
            ->namespace('App\Api\Aplicativos\ApiPruebas\Controladores')
            ->group(base_path('routes/api_pruebas.php'));
    }
}
