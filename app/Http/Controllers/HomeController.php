<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    public function valores(){
        return view("paginaNT");
    }

    public function registro(Request $request){
        $datosProducto = new App\Models\Nuevop;
        $datosProducto->nombre_producto = $request->nombre;
        // $datosProducto->categoria = $request->categoria;
        $datosProducto->estado = $request->estado;
        $datosProducto->descripcion = $request->descripcion;
        // $datosProducto->devoluciones = $request->devoluciones;
        $datosProducto->precio_inicial = $request->precioInicial;
        $datosProducto->final_subasta = $request->fecha;
        $datosProducto->imagen = $request->foto;

        $datosProducto -> save();

        return back();


        // return $request->all();
    }
}
