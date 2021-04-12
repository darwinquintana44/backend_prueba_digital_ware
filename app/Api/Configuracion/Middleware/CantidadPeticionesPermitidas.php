<?php

namespace App\Api\Configuracion\Middleware;

use App\Api\Configuracion\Traits\ApiResponser;
use Closure;
use Illuminate\Http\Exceptions\ThrottleRequestsException;
use Illuminate\Routing\Middleware\ThrottleRequests;

class CantidadPeticionesPermitidas extends ThrottleRequests
{
    use ApiResponser;
    /**
     * Create a 'too many attempts' exception.
     *
     * @param  string  $key
     * @param  int  $maxAttempts
     * @return \Illuminate\Http\Exceptions\ThrottleRequestsException
     */
    protected function buildException($key, $maxAttempts)
    {
        $retryAfter = $this->getTimeUntilNextRetry($key);

        $headers = $this->getHeaders(
            $maxAttempts,
            $this->calculateRemainingAttempts($key, $maxAttempts, $retryAfter),
            $retryAfter
        );

        return $this->errorResponse(new ThrottleRequestsException('Ha excedido la cantidad de peticiones por minuto permitidas en nuestro sistema en un lapso de 1 minuto', null, $headers), $headers);
    }
}
