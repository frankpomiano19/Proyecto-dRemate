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
        $datosProducto->nombre = $request->nombre;
        $datosProducto->precio_inicial = $request->precioInicial;
        $datosProducto->fecha = $request->fecha;
        $datosProducto->categoria = $request->categoria;
        $datosProducto->estado = $request->estado;
        $datosProducto->devoluciones = $request->devoluciones;
        $datosProducto->foto = $request->foto;

        $datosProducto -> save();

        return back();


        // return $request->all();
    }

    // public function registro(Request $request){
    //     $datosProducto = new App\Models\Nuevop;
    //     $datosProducto->nombre = $request->nombre;
    //     $datosProducto->categoria = $request->categoria;
    //     $datosProducto->estado = $request->estado;
    //     $datosProducto->foto = $request->foto;

    //     $datosProducto -> save();

    //     return back();
    // }
}
