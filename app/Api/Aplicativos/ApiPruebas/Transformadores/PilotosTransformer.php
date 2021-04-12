<?php

namespace App\Api\Aplicativos\ApiPruebas\Transformadores;

use App\Api\Aplicativos\ApiPruebas\Modelos\Pilotos;
use League\Fractal\TransformerAbstract;

class PilotosTransformer extends TransformerAbstract
{
    /**
     * List of resources to automatically include
     *
     * @var array
     */
    protected $defaultIncludes = [
        //
    ];

    /**
     * List of resources possible to include
     *
     * @var array
     */
    protected $availableIncludes = [
        //
    ];

    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(Pilotos $pilotos)
    {
        return [
            'identificador' => (int) $pilotos->id,
            'nombre' => (string) $pilotos->nombre_completo,
            'numero_identificacion' => (string) $pilotos->nro_identificacion,
            'direccion_notificacion' => (string) $pilotos->direccion,
            'telefono_notificacion' => (string) $pilotos->telefono,
            'fecha_creacion' => (string) $pilotos->created_at,
            'fecha_actualizacion' => (string) $pilotos->updated_at,
            'fecha_eliminacion' => isset($pilotos->deleted_at) ? (string) $pilotos->deleted_at : null,
        ];
    }
}
