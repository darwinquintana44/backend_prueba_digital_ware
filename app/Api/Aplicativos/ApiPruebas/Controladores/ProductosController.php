<?php

namespace App\Api\Aplicativos\ApiPruebas\Controladores;

use App\Api\Aplicativos\ApiPruebas\Modelos\Productos;
use App\Api\Configuracion\Controladores\ApiController;
use App\Api\Configuracion\Controladores\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Mockery\Exception;

class ProductosController extends ApiController
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        DB::beginTransaction();
        try {
            $allRequest = $request->all();
            $getData = new Productos();

            //almacenamos la imagen
            $allRequest['ruta_url'] = $allRequest['ruta_url']->store('');

            //return response()->json($getData->crearRegistro($allRequest));
            DB::commit();
            return $this->showAll(collect($getData->crearRegistro($allRequest)), 200);
        }catch (\Exception $e){
            DB::rollBack();
            return $this->errorResponse($e, $e->getCode());
        }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $allRequest = $request->all();
        $getData = new Productos();

        //validamos que la imagen venga dentro de los parametros
        if ($request->hasFile('ruta_url')){
            $dataFind = Productos::find($allRequest['id']);

            Storage::delete($dataFind['ruta_url']); // eliminamos el archivo

            //almacenamos la imagen
            $allRequest['ruta_url'] = $allRequest['ruta_url']->store('');
        }

        return $this->showAll(collect($getData->actualizaInfo($allRequest)), 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $getData = new Productos();

        return $this->showAll(collect($getData->eliminaInfo($id)), 200);
    }

    //LISTADO GENERALES
    public function listadoGeneral(){
        $data = new Productos();

        return $this->showAll(collect($data->listadoGeneral()), 200);
    }

    //LISTADO POR ID
    public function listadoPorId($id){
        $data = new Productos();

        return $this->showOne($data->listadoPorId($id), 200);
    }
}
