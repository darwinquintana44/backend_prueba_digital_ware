<?php

namespace App\Api\Configuracion\Controladores;

use App\Api\Configuracion\Modelos\EstadosGenerales;
use App\Api\Configuracion\Controladores\ApiController;
use Illuminate\Http\Request;

class EstadosGeneralesController extends ApiController
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $allRequest = $request->all();
        $getData = new EstadosGenerales();

        return $this->showAll(collect($getData->crearRegistro($allRequest)), 200);
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
        $getData = new EstadosGenerales();

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
        $data = new EstadosGenerales();

        return $this->showAll(collect($data->eliminaInfo($id)), 200);
    }

    public function listadoGeneral(){
        $data = new EstadosGenerales();

        return $this->showAll(collect($data->listadoGeneral()), 200);
    }

    public function listadoPorId($id){
        $data = new EstadosGenerales();

        return $this->showOne($data->listadoPorId($id), 200);
    }
}
