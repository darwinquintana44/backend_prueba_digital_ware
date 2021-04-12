<?php

namespace App\Api\Configuracion\Controladores;

use App\Api\Configuracion\Traits\ApiResponser;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    //AQUI VAMOS A TENER LOS METODOS DE NUESTRA API
    use ApiResponser; //llamamos el trait principal de la API
}
