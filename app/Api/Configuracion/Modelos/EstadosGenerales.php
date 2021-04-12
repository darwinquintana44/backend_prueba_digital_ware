<?php

namespace App\Api\Configuracion\Modelos;

use App\Api\Configuracion\Transformadores\EstadosGeneralesTransformer;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EstadosGenerales extends Model
{
    use SoftDeletes;

    public $transformer = EstadosGeneralesTransformer::class;

    public $table = 'estados_generales';

    protected $primaryKey = 'id';

    public $fillable = ['descripcion', 'id_usuario', 'created_at'];

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
                'descripcion' => $data['descripcion']
            ]);

        return $data1;
    }

    //CREACION DE LA INFORMACION DE LA TABLA
    public function crearRegistro($data)
    {
        $dataInsert = [
            'descripcion' => $data['descripcion'],
            'id_usuario' => $data['id_usuario']
        ];

        return self::create($dataInsert);
    }


    /*HACEMOS DELETE A LA TABLA*/
    public function eliminaInfo($id)
    {
        $data = self::where('id', '=', $id)
            ->delete();

        return $data;
    }

}
