<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Producto;
use App\Models\User;

class Tecnologia extends Component
{
    public $precioMin = 0;
    public $precioMax = 999;
    public $condicion = "Nuevo";
    public $departamento = "Lima";
    // public $verdadero = true;

    public $tipo;

    protected $rules = [
        'precioMin' => 'required|numeric|regex:/^[\d]{1,3}(\.[\d]{1,2})?$/',
        'precioMax' => 'required|numeric|regex:/^[\d]{1,3}(\.[\d]{1,2})?$/',
        'condicion' => 'required',
        'departamento' => 'required'
    ];

    protected $messages = [
        'precioMin.required' => 'Precio mínimo requerido',
        'precioMax.required' => 'Precio máximo requerido',
        'precioMin.numeric' => 'Solo carácteres numéricos',
        'precioMax.numeric' => 'Solo carácteres numéricos',
        'precioMax.regex' => 'Máximo 999.99',
        'precioMin.regex' => 'Mínimo 10.00',
        'condicion.required' => 'Seleccione condicion',
        'departamento.required' => 'Seleccione departamento'
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
        $validatedData = $this->validate();
    }

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

            return view('livewire.tecnologia',[
                'productos' => Producto::where("precio_inicial","<=", $this->precioMax)
                    ->where("precio_inicial",">=", $this->precioMin)
                    ->where('ubicacion','=',"$this->departamento")
                    ->where('categoria_id',1)
                    ->where('condicion','=',"$this->condicion")
                    ->get()
            ],[
                'favs'=> $favoritos
            ]);
        }else{
            return view('livewire.tecnologia',[
                'productos' => Producto::where("precio_inicial","<=", $this->precioMax)
                    ->where("precio_inicial",">=", $this->precioMin)
                    ->where('ubicacion','=',"$this->departamento")
                    ->where('categoria_id',1)
                    ->where('condicion','=',"$this->condicion")
                    ->get()
            ]);
        }
    }
}