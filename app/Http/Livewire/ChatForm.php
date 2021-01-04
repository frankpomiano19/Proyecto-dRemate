<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ChatForm extends Component
{

    public $name;
    public $messages;
    public function mount(){
        $this->name = "";
        $this->messages = [];
    }
    public function render()
    {
        return view('livewire.chatFolder.chat-form');
    }

    public function sendMessage(){
        $this->emit('mensajeEnviado');
        $this->emit('mensajeRecibido');
    }

}
