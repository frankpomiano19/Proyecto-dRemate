<?php

namespace App\Http\Livewire;

use Livewire\Component;

class NotificationMessageChat extends Component
{
 
    public $snippet;
    public function mount(){
        $this->snippet = "";
    }

    public function sendNotification(){
        event(new \App\Events\EventMessageRealTime($this->name,$this->message,$this->idUsuario));
    }
    public function render()
    {
        return view('livewire.notification-message-chat');
    }
}
