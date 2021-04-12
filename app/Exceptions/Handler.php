<?php

namespace App\Exceptions;

use App\Api\Configuracion\Traits\ApiResponser;
use Asm89\Stack\CorsService;
use Fruitcake\Cors\CorsServiceProvider;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Throwable;

class Handler extends ExceptionHandler
{
    use ApiResponser;
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Report or log an exception.
     *
     * @param  \Throwable  $exception
     * @return void
     *
     * @throws \Exception
     */
    public function report(Throwable $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Throwable  $exception
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @throws \Throwable
     */
    /*ESTE ES EL METODO ORIGINAL ANTES DE SER MODIFICADO*/
    /**
     * @param \Illuminate\Http\Request $request
     * @param Throwable $exception
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\Response|\Symfony\Component\HttpFoundation\Response
     * @throws Throwable
     */
    /*public function render($request, Throwable $exception)
    {
        return parent::render($request, $exception);
    }*/
    public function render($request, Throwable $exception)
    {
        $response = $this->handleException($request, $exception);
        //excepciones de cors, y de esta manera aseguramos los cors en las respuestas sin importar si tenemos errores o no
        app(CorsService::class)->addActualRequestHeaders($response, $request);

        return $response;
    }

    //metodo nuevo que va a almacenar todas las excepciones de nuestro sistema
    public function handleException($request, Throwable $exception){
        //errores de validacion
        if ($exception instanceof ValidationException){
            return $this->convertValidationExceptionToResponse($exception, $request);
        }
        //metodo no encontrado en el modelo
        if ($exception instanceof ModelNotFoundException){
            $modelo = strtolower(class_basename($exception->getModel())); //nombre del modelo que presenta el error
            return $this->errorResponse('No existe ningun modelo asociado '.$modelo, 404);
        }
        //No hay Autenticacion
        if ($exception instanceof AuthenticationException){
            return $this->errorResponse('El usuario no esta autenticado', 401);
        }
        //errores de autorizacion
        if ($exception instanceof AuthorizationException){
            return $this->errorResponse('El usuario no posee permisos para ejecutar esta accion', 403);
        }
        //errores de ruta no encontrada
        if ($exception instanceof NotFoundHttpException){
            return $this->errorResponse('No se encontro a URL especificada', 404);
        }
        //errores de metodo no valido en las peticiones
        if ($exception instanceof MethodNotAllowedHttpException){
            return $this->errorResponse('El metodo especificado en la peticion no es valido', 405);
        }
        //errores generales de http con sus respectivos mensajes y codigos
        if ($exception instanceof HttpException){
            return $this->errorResponse($exception->getMessage(), $exception->getStatusCode());
        }
        //errores de query cuando el codigo sea el 1451 que significa que es una violacion de integridad
        //en la base de datos por ejemplo cuando vamos a eliminar un usuario y este tiene o esta
        //relacionado en otras tablas y estas no se han borrado previamente
        if ($exception instanceof QueryException){
            $error = $exception->errorInfo[1]; // conseguimos la posicion en donde esta el codigo del error
            if($error == 1451){
                return $this->errorResponse('Error de integridad violada en la base de datos', 409);
            }
        }
        //Manejamos los errores inesperados para irlos trabajando uno a uno cuando se presenten
        if( config('app.debug') == true ) {
            return $this->errorResponse('Falla inesperada. Intente luego o conmuniquese con el administrador del sistema', 500);
        }
        return parent::render($request, $exception);
    }

    //modificamos el metodo de la clase para mejorar los errores de validaciones
    protected function convertValidationExceptionToResponse(ValidationException $e, $request)
    {
        $errors = $e->validator->errors()->getMessages(); //obtenemos el error

        return $this->errorResponse($errors, 422); // retornamos el error segun el validator
    }
}
