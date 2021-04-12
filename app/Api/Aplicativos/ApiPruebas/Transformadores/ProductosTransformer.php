<?php

namespace App\Api\Aplicativos\ApiPruebas\Transformadores;

use App\Api\Aplicativos\ApiPruebas\Modelos\Productos;
use League\Fractal\TransformerAbstract;

class ProductosTransformer extends TransformerAbstract
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
    public function transform(Productos $productos)
    {
        return [
            'identificador' => (int) $productos->id,
            'descripcion' => (string) $productos->descripcion,
            'usuario_insercion' => (int) $productos->id_usuario,
            'codigo_estado_general' => (int) $productos->id_estados_generales,
            'ruta_url_archivo' => url("storage/img/{$productos->ruta_url}"),
            'fecha_creacion' => (string) $productos->created_at,
            'fecha_actualizacion' => (string) $productos->updated_at,
            'fecha_eliminacion' => isset($productos->deleted_at) ? (string) $productos->deleted_at : null,
        ];
    }
}
