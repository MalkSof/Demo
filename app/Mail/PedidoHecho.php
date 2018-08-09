<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Pedido;

class PedidoHecho extends Mailable
{
    use Queueable, SerializesModels;
    public $pedido;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Pedido $pedido)
    {
        //
        $this->pedido = $pedido;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this ->to('nico@nico.com','nick')
                       ->bcc('another@another.com')
                        ->subject('Pedido para Aieka')
                        ->markdown('emails.pedidos.hecho');
    }
}
