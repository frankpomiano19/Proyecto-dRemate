<?php

namespace App\Http\Livewire;
use App\Models\Producto;
use App\Models\User;

use Livewire\Component;

class ProductoPopular extends Component
{
    public $categoria = "0";

    public $orden = "desc";

    public function render()
    {
        if(auth()->id()!=null){

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

            if($this->categoria=="0"){
                return view('livewire.producto-popular',[
                    'productos' => Producto::where('favorito','!=',0)->orderBy('favorito', $this->orden)
                    ->get()
                ],[
                    'favs'=> $favoritos
                ]);
            }else{
                return view('livewire.producto-popular',[
                    'productos' => Producto::where('categoria_id',$this->categoria)
                    ->where('favorito','!=',0)->orderBy('favorito', $this->orden)
                    ->get()
                ],[
                    'favs'=> $favoritos
                ]);
            }

        }else{
            if($this->categoria=="0"){
                // dd("Muestra cero");
                return view('livewire.producto-popular',[
                    'productos' => Producto::where('favorito','!=',0)->orderBy('favorito', $this->orden)
                    ->get()
                ]);
            }else{
                return view('livewire.producto-popular',[
                    'productos' => Producto::where('categoria_id',$this->categoria)
                    ->where('favorito','!=',0)->orderBy('favorito', $this->orden)
                    ->get()
                ]);
            }
        }

    }
}