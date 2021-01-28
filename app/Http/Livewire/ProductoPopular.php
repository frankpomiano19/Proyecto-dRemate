<?php

namespace App\Http\Livewire;
use App\Models\Producto;

use Livewire\Component;

class ProductoPopular extends Component
{
    public $categoria = "0";

    public $orden = "desc";

    public function render()
    {
        if($this->categoria=="0"){
            // dd("Muestra cero");
            return view('livewire.producto-popular',[
                'productos' => Producto::where('favorito','!=',0)->orderBy('favorito', $this->orden)
                ->get()
            ]);
        }else{
            // dd("Muestra uno");
            return view('livewire.producto-popular',[
                'productos' => Producto::where('categoria_id',$this->categoria)
                ->where('favorito','!=',0)->orderBy('favorito', $this->orden)
                ->get()
            ]);
        }

    }
}