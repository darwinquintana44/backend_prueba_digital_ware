<?php

namespace App\Api\Configuracion\Transformadores;

use App\User;
use League\Fractal\TransformerAbstract;

class UsuariosTransformer extends TransformerAbstract
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
    public function transform(User $user)
    {
        return [
            'identificador' => (int) $user->id,
            'nombres' => (string) $user->name,
            'apellidos' => (string) $user->last_name,
            'numero_identificacion' => (double) $user->identification,
            'nro_celular' => (string) $user->movil,
            'nro_fijo' => (string) $user->telephone,
            'direccion' => (string) $user->direction,
            'correo' => (string) $user->email,
            'fecha_creacion' => (string) $user->created_at,
            'fecha_actualizacion' => (string) $user->updated_at,
            'fecha_eliminacion' => isset($user->deleted_at) ? (string) $user->deleted_at : null,
        ];
    }
}
