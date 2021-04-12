<?php

namespace App\Api\Aplicativos\ApiPruebas\Modelos;

use App\Api\Aplicativos\ApiPruebas\Transformadores\PasajerosTransformer;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pasajeros extends Model
{
    use SoftDeletes;

    public $transformer = PasajerosTransformer::class;

    public $table = 'viajes_pasajeros';

    protected $primaryKey = 'id';

    public $fillable = ['nombre_completo', 'nro_identificacion', 'direccion', 'telefono', 'created_at'];

    protected $hidden = ['updated_at', 'deleted_at'];

    public $timestamps = ['created_at', 'updated_at', 'deleted_at'];

    protected $dates = ['created_at', 'updated_at', 'deleted_at'];

    public function listadoGeneral(){
        $data = self::all();
        return $data;
    }

    public function listadoPorId($id){
        $data = self::findOrFail($id);
        return $data;
    }

    /*ACTUALIZAMOS LA INFORMACION DE LA TABLA*/
    public function actualizaInfo($data)
    {
        $data1 = self::where('id', '=', $data['id'])
            ->update([
                'nombre_completo' => $data['nombre_completo'],
                'nro_identificacion' => $data['nro_identificacion'],
                'direccion' => $data['direccion'],
                'telefono' => $data['telefono'],
            ]);

        return $data1;
    }

    public function crearRegistro($data)
    {
        $dataInsert = [
            'nombre_completo' => $data['nombre_completo'],
            'nro_identificacion' => $data['nro_identificacion'],
            'direccion' => $data['direccion'],
            'telefono' => $data['telefono']
        ];

        return self::create($dataInsert);
    }


    /*HACEMOS DELETE A LA TABLA*/
    public function eliminaInfo($id)
    {
        $find = self::find($id);

        $data = self::where('id', '=', $id)
            ->delete();

        return $data;
    }

}
