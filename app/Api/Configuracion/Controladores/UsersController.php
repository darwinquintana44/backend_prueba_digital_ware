<?php

namespace App\Api\Configuracion\Controladores;

use App\Api\Configuracion\Correos\NotificaActualizacionUsuario;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Api\Configuracion\Controladores\ApiController;
use App\Api\Configuracion\Correos\NotificaCreacionUsuario;

class UsersController extends ApiController
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
            $reglas = [
                'name' => 'required',
                'last_name' => 'required',
                'identification' => 'required|min:6|unique:users',
                'email' => 'required|email|unique:users',
                'password' => 'required|min:6|required_with:password_confirmation|confirmed',
                'password_confirmation' => 'required'
            ];

            $this->validate($request, $reglas);

            $allRequest = $request->all();
            $getData = new User();

            $crearUsuario = $getData->crearRegistro($allRequest);

            DB::commit();

            UsersController::notificaCreacionUsuario($allRequest['email']);

            return $this->showAll(collect($crearUsuario), 200);
        }catch (\Exception $e){
            DB::rollBack();
            return $this->errorResponse('Error al crear el usuario: ' . $e->getMessage(), 500);
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
        DB::beginTransaction();
        try {
            $allRequest = $request->all();

            $existeUsuario = User::findOrFail($allRequest['id']);

            $reglas = [
                'identification' => 'min:6|unique:users,identification,'.$existeUsuario->id, //hacemos una excepcion al id de usuario actual para no tener problema
                'email' => 'required|email|unique:users,email,'.$existeUsuario->id, // la excepcion tambien se debe hacer al correo
                'password' => 'min:6|required_with:password_confirmation|confirmed',
                'password_confirmation' => 'required'
            ];

            $this->validate($request, $reglas);

            $getData = new User();

            $actualizaUsuario = $getData->actualizaInfo($allRequest);

            DB::commit();

            UsersController::notificaActualizaUsuario($allRequest['email'], $existeUsuario);

            return $this->showAll(collect($actualizaUsuario), 200);
        }catch (\Exception $e){
            DB::rollBack();
            return $this->showMessage('Error al actualizar el usuario: ' . $e->getMessage() . ' ' . $e->getCode(), 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $getData = new User();

        return $this->showAll(collect($getData->eliminaInfo($id)), 200);
    }

    public function listadoGeneral(){
        $data = new User();

        return $this->showAll(collect($data->listadoGeneral()), 200);
    }

    public function listadoPorId($id){
        $data = new User();

        return $this->showOne($data->listadoPorId($id), 200);
    }

    //metodo que notifica la creacion de un usuario
    private function notificaCreacionUsuario($email){
        $data = new User();

        $user = User::where('email', '=', $email)->first();

        //envio de correo electronico al usuario que se acaba de crear y al administrador del sistema
        Mail::to($user->email)->queue(new NotificaCreacionUsuario($user));
        Mail::to('darwinquintana44@gmail.com')->queue(new NotificaCreacionUsuario($user));

        return $this->showMessage($data->verificarUsuario($email), 200);
    }

    //metodo que notifica la modificacion de datos de un usuario
    private function notificaActualizaUsuario($email, $userOld){

        $data = new User();

        $user = User::where('email', '=', $email)->first();

        //envio de correo electronico al usuario que se acaba de crear y al administrador del sistema
        //revisar porque no esta tomando los datos anteriores en el metodo update de este mismo controlador
        Mail::to($user->email)->queue(new NotificaActualizacionUsuario($user, $userOld));
        Mail::to('darwinquintana44@gmail.com')->queue(new NotificaActualizacionUsuario($user, $userOld));

        return $this->showMessage($data->verificarUsuario($email), 200);
    }
}
