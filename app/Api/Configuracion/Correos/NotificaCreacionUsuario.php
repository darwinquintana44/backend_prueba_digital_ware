<?php

namespace App\Api\Configuracion\Correos;

use App\Api\Configuracion\Traits\ApiResponser;
use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NotificaCreacionUsuario extends Mailable
{
    use Queueable, SerializesModels, ApiResponser;

    public $subject = "Creación de usuarios en el sistema";

    public $user;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.notificaCreacionUsuario');
    }
}
