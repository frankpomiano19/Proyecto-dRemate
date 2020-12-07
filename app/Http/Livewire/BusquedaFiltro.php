<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Producto;

class BusquedaFiltro extends Component
{
    public $precioMin = 0;
    public $precioMax = 999;
    public $categoria = 1;
    public $condicion = "Nuevo";
    public $departamento = "Lima";
    public $verdadero = true;

    protected $rules = [
        'precioMin' => 'required|numeric|regex:/^[\d]{1,3}(\.[\d]{1,2})?$/',
        'precioMax' => 'required|numeric|regex:/^[\d]{1,3}(\.[\d]{1,2})?$/',
        'condicion' => 'required',
        'categoria' => 'required',
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
        'categoria.required' => 'Seleccione categoria',
        'departamento.required' => 'Seleccione departamento'
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
        $validatedData = $this->validate();
    }

    public function render()
    {
        return view('livewire.busqueda-filtro',[
            'productos' => Producto::where("precio_inicial","<=", $this->precioMax)
                ->where("precio_inicial",">=", $this->precioMin)
                ->where('ubicacion','=',"$this->departamento")
                ->where('categoria_id',$this->categoria)
                ->where('condicion','=',"$this->condicion")
                ->get()
        ]);
    }
}