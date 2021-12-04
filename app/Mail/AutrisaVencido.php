<?php

namespace App\Mail;

use App\Models\PermisoAutrisa;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AutrisaVencido extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    protected $permisoAutrisa;

    public function __construct(PermisoAutrisa $permiso)
    {
        $this->permisoAutrisa = $permiso;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('notificaciones@sinnens.com', 'Permiso próximo a vencer')
            ->view('emails.permisoautrisa')
            ->with([
                'placa' => $this->permisoAutrisa->placa,
                'fecha_venc' => $this->permisoAutrisa->fecha_venc
            ]);
    }
}
