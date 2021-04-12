<?php

namespace App\Api\Configuracion\Transformadores;

use App\Api\Configuracion\Modelos\EstadosGenerales;
use League\Fractal\TransformerAbstract;

class EstadosGeneralesTransformer extends TransformerAbstract
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
    public function transform(EstadosGenerales $estadosGenerales)
    {
        return [
            'identificador' => (int) $estadosGenerales->id,
            'descripcion' => (string) $estadosGenerales->descripcion,
            'usuario_insercion' => (int) $estadosGenerales->id_usuario,
            'fecha_creacion' => (string) $estadosGenerales->created_at,
            'fecha_actualizacion' => (string) $estadosGenerales->updated_at,
            'fecha_eliminacion' => isset($estadosGenerales->deleted_at) ? (string) $estadosGenerales->deleted_at : null,
        ];
    }
}
