<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Auth;


class ChatForm extends Component
{

    public $name;
    public $message;
    public $idUsuario;
    public function mount(){
        $this->name = "";
        $this->message = "";
        $this->idUsuario=Auth::user()->id;
    }



    public function updated($field){
        $this->validateOnly($field,[
            // "name"=>"required|min:3",
            "idUsuario"=>"required"
        ]);
    }
    public function sendMessage(){
        $this->validate([
            // "name"=>"required|min:3",
            "message"=>"required"
        ]);

        // $datos = [
        //     "usuario"=>$this->name,
        //     "mensaje"=>$this->message,
        //     "id"=>$this->idUsuario
        // ];

        //$this->emit('mensajeEnviado');
        // $this->emit('mensajeRecibido',$datos);

        event(new \App\Events\EventMessageRealTime($this->name,$this->message,$this->idUsuario));

        $this->reset('message');
    }
    public function render()
    {
        return view('livewire.chatFolder.chat-form');
    }

}
