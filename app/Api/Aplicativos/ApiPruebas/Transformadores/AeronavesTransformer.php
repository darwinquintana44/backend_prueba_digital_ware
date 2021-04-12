<?php

namespace App\Api\Aplicativos\ApiPruebas\Transformadores;

use App\Api\Aplicativos\ApiPruebas\Modelos\Aeronaves;
use League\Fractal\TransformerAbstract;

class AeronavesTransformer extends TransformerAbstract
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
    public function transform(Aeronaves $aeronaves)
    {
        return [
            'identificador' => (int) $aeronaves->id,
            'nombre' => (string) $aeronaves->nombre_completo,
            'numero_identificacion' => (string) $aeronaves->codigo_identificacion,
            'observaciones' => (string) $aeronaves->observaciones,
            'fecha_creacion' => (string) $aeronaves->created_at,
            'fecha_actualizacion' => (string) $aeronaves->updated_at,
            'fecha_eliminacion' => isset($aeronaves->deleted_at) ? (string) $aeronaves->deleted_at : null,
        ];
    }
}
