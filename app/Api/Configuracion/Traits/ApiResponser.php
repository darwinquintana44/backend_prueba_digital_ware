<?php

namespace App\Api\Configuracion\Traits;
//use App\Api\Configuracion\Controladores\AuthController;
use Illuminate\Database\Eloquent\Model;
//use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
//use Illuminate\Support\Facades\Cache;

trait ApiResponser{
    //RESPUESTA SATISFACTORIA
    private function successResponse($data, $code){
        //SE VALIDAN LAS RUTAS QUE NO DEBEN DEVOLVER UN TOKEN
        if (request()->route()->uri == "apiglobal/auth/v1/login" || request()->route()->uri == "apiglobal/auth/v1/logout"){
            return response()->json(['datos' => $data[0], 'status' => $code]);
        }

        if(request()->isMethod("POST") || request()->isMethod("PATCH") || request()->isMethod("DELETE") || request()->isMethod("PUT")) {
            return response()->json(['datos' => $data[0], 'status' => $code]);
        }
        return response()->json(['datos' => $data[0]['data'], 'status' => $code]);
    }

    //RESPUESTA DE ERRORES
    protected function errorResponse($message, $code){
        return response()->json(['error' => $message, 'status' => $code]);
    }

    //ESTE METODO RECIBIRA LA COLLECCION COMPLETA DE UNA CONSULTA Y LA DEVLVERA EN EL FORMATO JSON
    protected function showAll(Collection $collection, $code = 200 ){

        if($collection->isEmpty()){
            return $this->successResponse([$collection], $code);
        }

        if(request()->isMethod("POST") || request()->isMethod("PATCH") || request()->isMethod("DELETE")) {
            return $this->successResponse([$collection], $code);
        }

        $transformer = $collection->first()->transformer;
        //EL SIGUIENTE METODO ES PARA LA PAGINACION PERO HAY QUE REVISAR Y HACER LOS METODOS DESDE EL VIDEO 141 HASTA EL 145
        //$collection = $this->paginateData($collection);
        $collection = $this->transFormData($collection, $transformer);
        //EL SIGUIENTE METODO ES PARA CONSERVAR EN CACHE LA CONSULTA PARA NO ESTAR CONSULTADO CADA NADA LA BASE DE DATOS
        //PERO SE COMENTAREA YA QUE POR EL MOMENTO NO ES NECESARIO
        //LO QUE NECESITAMOS ES QUE SIEMPRE ESTEMOS EN LINEA Y HACER CONSULTAS CONTINUAS Y ACTUALIZADAS SOBRE NUESTRA BASE DE DATOS
        //$collection = $this->cacheResponse($collection);

        return $this->successResponse([$collection], $code);
    }

    //ESTE METODO RECIBIRA LA INSTANCIA DE UN METODO
    protected function showOne(Model $instance, $code = 200 ){

        if(request()->isMethod("POST") || request()->isMethod("PATCH") || request()->isMethod("DELETE")) {
            return $this->successResponse([$instance], $code);
        }

        $transformer = $instance->transformer;
        $instance = $this->transFormData($instance, $transformer);

        return $this->successResponse([$instance], $code);
    }

    //ESTE METODO RECIBIRA UN MENSAJE Y UN CODIGO
    protected function showMessage($message, $code = 200 ){
        return $this->successResponse([$message], $code);
    }

    //ESTE METODO QUE SE UTILIZARA PARA UTILIZAR LAS TRANFORMACIONES
    protected function transFormData ($data, $transformer){
        $transformation = fractal($data, new $transformer);

        return $transformation->toArray();
    }

    //ESTE METODO VA A SERVIR PARA NO ESTAR CONSULTADO LA INFORMACION CADA NADA EN LA BASE DE DATOS
    //SINO QUE CADA 15 SEGUNDOS ES QUE SE VA A HACER LA CONSULTA SI ES NECESARIO
    /*protected function cacheResponse($data){
        $url = request()->url();
        $queryParams = request()->query();

        ksort($queryParams);

        $queryString = http_build_query($queryParams);

        $fullUrl = "{$url}?{$queryString}";

        return Cache::remember($fullUrl, 15/60, function() use($data){
            return $data;
        });
    }*/

    //ESTE METODO VA A PAGINAR LOS DATOS - POR DEFECTO VA A PAGINAR EN 15 ELEMENTOS
    /*protected function paginateData(Collection $collection){
        $page = LengthAwarePaginator::resolveCurrentPage();

        $parPage = 15;

        $result = $collection->slice( ($page - 1) * $parPage, $parPage )->values();

        $paginated = new LengthAwarePaginator($result, $collection->count(), $parPage, $page, [
            'path' => LengthAwarePaginator::resolveCurrentPath()
        ]);

        $paginated->appends( request()->all() );

        return $paginated;
    }*/
}

?>
