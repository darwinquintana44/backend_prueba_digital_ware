<?php

namespace App\Api\Configuracion\Correos;

use App\Api\Configuracion\Traits\ApiResponser;
use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NotificaActualizacionUsuario extends Mailable
{
    use Queueable, SerializesModels, ApiResponser;

    public $subject = "Actualización de usuarios en el sistema";

    public $user, $userOld;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $user, $userOld)
    {
        $this->user = $user;
        $this->userOld = $userOld;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.notificaActualizacionUsuario');
    }
}
