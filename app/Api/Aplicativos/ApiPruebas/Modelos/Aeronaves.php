<?php

namespace App\Api\Aplicativos\ApiPruebas\Modelos;

use App\Api\Aplicativos\ApiPruebas\Transformadores\AeronavesTransformer;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Aeronaves extends Model
{
    use SoftDeletes;

    public $transformer = AeronavesTransformer::class;

    public $table = 'viajes_aeronaves';

    protected $primaryKey = 'id';

    public $fillable = ['nombre_completo', 'codigo_identificacion', 'observaciones', 'created_at'];

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
                'codigo_identificacion' => $data['numero_identificacion'],
                'observaciones' => $data['observaciones'],
            ]);

        return $data1;
    }

    public function crearRegistro($data)
    {
        $dataInsert = [
            'nombre_completo' => $data['nombre_completo'],
            'codigo_identificacion' => $data['numero_identificacion'],
            'observaciones' => $data['observaciones'],
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
