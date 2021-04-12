<?php

namespace App\Api\Configuracion\Controladores;

use App\Api\Configuracion\Controladores\ApiController;
use Illuminate\Http\Request;

class AuthController extends ApiController
{
    public function __construct(){
        $this->middleware('auth:api', ['except' => ['login']]);
    }

    //METODO DE LOGIN DEL USUARIO
    public function login(){
        $credentiales = request(['email', 'password']);

        try {
            //SI NO GENERA EL TOKEN CORRECTAMENTE MOSTRAMOS UN ERROR DE CREDENCIALES
            if (!$token = auth()->attempt($credentiales)) {
                return $this->errorResponse('Email o password incorrectos', 401);
            }

            //ACCEDEMOS AL METODO QUE VA A GENERAR EL TOKEN DE AUTENTICACION
            return $this->showMessage($this->respondWithToken($token)->original);
        }catch (\Exception $e){
            return $this->errorResponse('Revisa tus credenciales de autenticacion y vuelve a intentar de nuevo', 500);
        }
    }

    //METODO DE GENERACION DE AUTENTICACION
    private function respondWithToken($token){
        //creamos un nuevo arreglo que va a contener los datos del usuario que esta haciendo login
        $datosUsuario['nombre_completo'] = auth()->user()->name . ' ' . auth()->user()->last_name;
        $datosUsuario['correo'] = auth()->user()->email;
        $datosUsuario['identificacion'] = auth()->user()->identification;
        $datosUsuario['celular'] = auth()->user()->movil;
        $datosUsuario['fijo'] = auth()->user()->telephone;
        $datosUsuario['direccion'] = auth()->user()->direction;
        $datosUsuario['rol_asignado'] = auth()->user()->rol;

        //retornamos el mensaje que va a visualizar en el front de la aplicacion
        return response()->json([
            'token' => $token, // token
            'access_type' => 'bearer', // tipo de acceso por la cabecera Authorization
            'expires_in' => auth()->factory()->getTTL() * 60, //tiempo de expiracion en 600 minutos = 10 horas
            'usuario' => $datosUsuario, // datos de usuario
            //se debe realizar la consulta que devuelva el menu al que el usuario tiene permisos
        ]);
    }

    //METODO DE LOGOUT DEL USUARIO
    public function logout(){
        //cerramos cesion y al mismo tiempo se destruye el token
        auth()->logout();
        return $this->showMessage(['msg' => 'Sesion cerrada correctamente']);
    }

    //METODO PARA GENERAR UN NUEVO TOKEN
    public function refresh(){
        //obteniendo el token del usuario actual se actualiza a uno nuevo y el anterior queda inactivo
        return $this->respondWithToken(auth()->refresh());
    }

}
