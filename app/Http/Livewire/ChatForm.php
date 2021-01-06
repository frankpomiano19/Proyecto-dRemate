<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ChatForm extends Component
{

    public $name;
    public $message;
    public function mount(){
        $this->name = "";
        $this->message = "";
    }



    public function updated($field){
        $this->validateOnly($field,[
            // "name"=>"required|min:3",
            "message"=>"required"
        ]);
    }
    public function sendMessage(){
        $this->validate([
            // "name"=>"required|min:3",
            "message"=>"required"
        ]);

        $datos = [
            "usuario"=>$this->name,
            "mensaje"=>$this->message
        ];

        $this->emit('mensajeEnviado');
        // $this->emit('mensajeRecibido',$datos);

        event(new \App\Events\EventMessageRealTime($this->name,$this->message));

    }
    public function render()
    {
        return view('livewire.chatFolder.chat-form');
    }

}
