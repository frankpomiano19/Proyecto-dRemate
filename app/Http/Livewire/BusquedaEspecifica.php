<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Producto;


class BusquedaEspecifica extends Component
{
    // protected $queryString = ['search'=> ['except'=>'']];



    public function render()
    {
        return view('livewire.busqueda-especifica');
    }
}
