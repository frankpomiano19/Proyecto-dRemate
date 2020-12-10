<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Producto;

class Busqueda extends Component
{
    protected $queryString = ['search'=> ['except'=>'']];

    // public $count = 0;

    public $search;

    public $casa;


    // public function increment()
    // {
    //     $this->count++;
    // }

    public function render()
    {
        return view('livewire.busqueda',[
            'productos' => Producto::where('nombre_producto','LIKE',"%{$this->search}%")
            ->paginate(10)
        ]);
    }
}
