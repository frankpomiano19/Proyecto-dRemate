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
        $ab = date_default_timezone_get();
        date_default_timezone_set('America/Lima');
        $fecha = date('Y-m-d H:i:s');

        $listaFavoritos = User::where('id','=',auth()->id())->first();

        $listaUsuario = $listaFavoritos->favoritos;

        $listaInicio = str_replace("[", "", $listaUsuario);

        $listaFin = str_replace("]", "", $listaInicio);

        $favoritos = explode(',',$listaFin);

        $tamanio = sizeof($favoritos);

        //Convertir a entero
        for($i = 0; $i<$tamanio;$i++){

            $temp = (int)$favoritos[$i];
            $favoritos[$i] = $temp;
        }

        $i = 0;

        return view('livewire.busqueda',[
            'productos' => Producto::where('nombre_producto','LIKE',"%{$this->search}%")
                                    ->where('productos.final_subasta','<',$fecha)
                                    ->paginate(10)
        ],[
            'favs'=> $favoritos
        ]);
    }
}
