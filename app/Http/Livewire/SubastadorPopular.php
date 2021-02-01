<?php

namespace App\Http\Livewire;
use App\Models\User;
use App\Models\Producto;
use Livewire\Component;

class SubastadorPopular extends Component
{

    public $subastador = "";

    public $orden = "";

    public $subastas;

    public function render()
    {
        return view('livewire.subastador-popular',[
            'us_sub' => User::where('usuario','LIKE',"%{$this->subastador}%")->orderBy('visita','desc')
            ->get()
        ],['i'=>1
        ]);
    }

    
}