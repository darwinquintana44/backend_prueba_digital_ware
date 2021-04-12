<?php

namespace App\Api\Aplicativos\ApiPruebas\Transformadores;

use App\Api\Aplicativos\ApiPruebas\Modelos\Pasajeros;
use League\Fractal\TransformerAbstract;

class PasajerosTransformer extends TransformerAbstract
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
    public function transform(Pasajeros $pasajeros)
    {
        return [
            'identificador' => (int) $pasajeros->id,
            'nombre' => (string) $pasajeros->nombre_completo,
            'numero_identificacion' => (string) $pasajeros->nro_identificacion,
            'direccion_notificacion' => (string) $pasajeros->direccion,
            'telefono_notificacion' => (string) $pasajeros->telefono,
            'fecha_creacion' => (string) $pasajeros->created_at,
            'fecha_actualizacion' => (string) $pasajeros->updated_at,
            'fecha_eliminacion' => isset($pasajeros->deleted_at) ? (string) $pasajeros->deleted_at : null,
        ];
    }
}
