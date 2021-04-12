<?php

namespace App;

use App\Api\Configuracion\Transformadores\UsuariosTransformer;
use Illuminate\Support\Facades\Hash;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Str;
use Tymon\JWTAuth\Contracts\JWTSubject;


class User extends Authenticatable implements JWTSubject
{
    use Notifiable;

    public $transformer = UsuariosTransformer::class;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'last_name', 'identification', 'movil', 'telephone', 'direction', 'email', 'rol', 'password', 'password_confirmation', 'id_tipo_identificacion', 'id_usuario'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'password_confirmation', 'remember_token',
    ];

    public $timestamps = ['created_at', 'updated_at', 'deleted_at'];

    protected $dates = ['created_at', 'updated_at', 'deleted_at'];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

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
                'id_tipo_identificacion' => $data['id_tipo_identificacion'],
                'name' => mb_strtoupper($data['name']),
                'last_name' => mb_strtoupper($data['last_name']),
                'identification' => $data['identification'],
                'movil' => $data['movil'],
                'telephone' => $data['telephone'],
                'direction' => mb_strtoupper($data['direction']),
                'email' => mb_strtoupper($data['email']),
                'rol' => mb_strtolower($data['rol']),
                'password' => Hash::make($data['password']),
                'password_confirmation' => Hash::make($data['password_confirmation']),
            ]);

        return $data1;
    }

    public function crearRegistro($data){

        $dataInsert = [
            'id_tipo_identificacion' => $data['id_tipo_identificacion'],
            'id_usuario' => auth()->user()->id,
            'name' => mb_strtoupper($data['name']),
            'last_name' => mb_strtoupper($data['last_name']),
            'identification' => $data['identification'],
            'movil' => $data['movil'],
            'telephone' => $data['telephone'],
            'direction' => mb_strtoupper($data['direction']),
            'email' => mb_strtoupper($data['email']),
            'rol' => mb_strtolower($data['rol']),
            'password' => Hash::make($data['password']),
            'password_confirmation' => Hash::make($data['password_confirmation']),
        ];

        return self::create($dataInsert);
    }


    /*HACEMOS DELETE A LA TABLA*/
    public function eliminaInfo($data){
        $data = self::where('id', '=', $data['id'])
            ->delete();

        return $data;
    }

    //VALIDAMOS EL CORREO Y ASI PODER CAMBIAR LA CONTRASEÑA DE USUARIO
    public function verificarUsuario($correo){
        //consultamos si la existencia del correo en la tabla de usuarios
        $data = self::where('email', '=', trim(strtoupper($correo)))
            ->get();

        //virificamos que exista el correo para poderlo cambiar
        if (count($data) > 0){
            //actualizamos el token para poder pasarlo por el correo electronico
            $data = self::where('email', '=', trim(strtoupper($correo)))
                ->update([
                    'remember_token' => Str::random(10)
                ]);
            $data = true;
        }else{ // cuando el token no existe o no es valido
            $data = false;
        }

        return $data;
    }

    public function cambiarPassword($data){
        $data1 = self::where('id', '=', $data['id'])
            ->update([
                'password' => Hash::make($data['password']),
                'password_confirmation' => Hash::make($data['password_confirmation']),
            ]);

        return $data1;
    }

    /*********************************IMPLEMENTACION DE JWT**************************************/

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }
}
