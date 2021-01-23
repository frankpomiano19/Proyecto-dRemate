<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class EventMessageRealTime implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    // public $data;
    public $usuario;
    public $mensaje;
    public $idUsuario;
    public function __construct($usuario,$mensaje,$idUsuario)
    {
        // $this->data = $data;
       $this->usuario=$usuario;
        $this->mensaje= $mensaje;
        $this->idUsuario=$idUsuario;
    }


    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return ['canal-chat'];
    }

    public function broadCastAs(){
        return 'my-event';
    }
}
