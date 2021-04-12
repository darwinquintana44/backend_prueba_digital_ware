<?php

namespace App\Api\Configuracion\Middleware;

use Closure;

class Cabecera
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $header = "X-Name")
    {
        $response = $next($request);

        $response->headers->set($header, config('api.name'));

        return $response;
    }
}
