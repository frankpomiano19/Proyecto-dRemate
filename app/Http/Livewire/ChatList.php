<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ChatList extends Component
{

    public $nombreProducto;
    public $mensajes;
    public $idUsuario;
    protected $listeners = ["mensajeRecibido"];

    public function mount($nombreProducto){
        $this->mensajes=[];
        $this->nombreProducto=$nombreProducto;
    }

    public function mensajeRecibido($mensaje){
        $this->mensajes[] = $mensaje;
    }
    public function render()
    {
        return view('livewire.chatFolder.chat-list');
    }
}
