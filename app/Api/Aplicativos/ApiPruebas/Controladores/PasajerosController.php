<?php

namespace App\Api\Aplicativos\ApiPruebas\Controladores;

use App\Api\Aplicativos\ApiPruebas\Modelos\Pasajeros;
use App\Api\Configuracion\Controladores\ApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PasajerosController extends ApiController
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function create(Request $request)
    {
        DB::beginTransaction();
        try {
            $allRequest = $request->all();
            $getData = new Pasajeros();
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
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request)
    {
        $allRequest = $request->all();
        $getData = new Pasajeros();

        return $this->showAll(collect($getData->actualizaInfo($allRequest)), 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        $getData = new Pasajeros();

        return $this->showAll(collect($getData->eliminaInfo($id)), 200);
    }

    //LISTADO GENERALES
    public function listadoGeneral(){
        $data = new Pasajeros();

        return $this->showAll($data->listadoGeneral(), 200);
    }

    //LISTADO POR ID
    public function listadoPorId($id){
        $data = new Pasajeros();

        return $this->showOne($data->listadoPorId($id), 200);
    }
}
