<?php

namespace App\Api\Aplicativos\ApiPruebas\Modelos;

use App\Api\Aplicativos\ApiPruebas\Transformadores\ProductosTransformer;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Productos extends Model
{
    use SoftDeletes;

    public $transformer = ProductosTransformer::class;

    public $table = 'productos';

    protected $primaryKey = 'id';

    public $fillable = ['descripcion', 'id_usuario', 'id_estados_generales', 'ruta_url', 'created_at'];

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
                'descripcion' => $data['descripcion'],
                'id_estados_generales' => $data['id_estados_generales'],
                'ruta_url' => $data['ruta_url']
            ]);

        return $data1;
    }

    public function crearRegistro($data)
    {
        $dataInsert = [
            'descripcion' => $data['descripcion'],
            'id_estados_generales' => $data['id_estados_generales'],
            'ruta_url' => $data['ruta_url'],
            'id_usuario' => $data['id_usuario']
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
