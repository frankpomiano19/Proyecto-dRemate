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
        $datosProducto = new App\Models\Producto;
        $datosProducto->nombre_producto = $request->nombre;
        $datosProducto->descripcion = $request->descripcion;
        $datosProducto->categoria_id = $request->categoria;
        $datosProducto->estado = $request->estado;
        $datosProducto->condicion = $request->condicion;
        $datosProducto->imagen = $request->imagen;
        $datosProducto->garantia = $request->garantia;
        $datosProducto->precio_inicial = $request->precio_inicial;
        $datosProducto->inicio_subasta = $request->inicio_subasta;
        $datosProducto->final_subasta = $request->final_subasta;
        $datosProducto->user_id = auth()->id();;

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
