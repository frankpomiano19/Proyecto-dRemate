<?php

namespace App\Http\Livewire;
use App\Models\User;
use App\Models\Producto;
use Livewire\Component;
use App\Models\Comentario;

class SubastadorPopular extends Component
{

    public $subastador = "";

    public $orden = "0";

    public $usuariosS;

    


    public function render()
    {

        if($this->orden=="0"){
            return view('livewire.subastador-popular',[
                'us_sub' => User::where('usuario','LIKE',"%{$this->subastador}%")->orderBy('visita','desc')
                ->get()            
            ]);
        }else{
            return view('livewire.subastador-popular',[
                'us_sub' => User::where('usuario','LIKE',"%{$this->subastador}%")->orderBy('subastas','desc')
                ->get()            
            ]);
        }

    }

    
}
