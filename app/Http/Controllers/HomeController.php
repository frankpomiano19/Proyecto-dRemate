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

    // public function registro(Request $request){
    //     $datosProducto = new App\Models\Producto;
    //     $datosProducto->nombre_producto = $request->nombre;
    //     $datosProducto->descripcion = $request->descripcion;
    //     $datosProducto->categoria_id = $request->categoria;
    //     $datosProducto->estado = $request->estado;
    //     $datosProducto->condicion = $request->condicion;
    //     $datosProducto->imagen = $request->imagen;
    //     $datosProducto->garantia = $request->garantia;

    //     $datosProducto->precio_inicial = $request->precio_inicial;
    //     $datosProducto->inicio_subasta = $request->inicio_subasta;
    //     $datosProducto->final_subasta = $request->final_subasta;
    //     $datosProducto->user_id = auth()->id();;

    //     $datosProducto -> save();

    //     return back();


    //     // return $request->all();
    // }

    public function registroS(){
        return view("registroSubasta");
    }

    public function viewproduct($id,$idpro){
        $vendedor = App\Models\User::findOrFail($id);
        $prod = App\Models\Producto::findOrFail($idpro);
        $pujastotales = App\Models\Puja::all();
        $usuarios = App\Models\User::all();

        return view('producto',compact('vendedor','prod','pujastotales','usuarios'));
    }
    /*
    public function viewproduct(){
        $pujastotales = App\Models\Puja::all();
        $usuarios = App\Models\User::all();

        return view('producto',compact('pujastotales','usuarios'));
    }

    */


    // public function registro(Request $request){
    //     $datosProducto = new App\Models\Nuevop;
    //     $datosProducto->nombre = $request->nombre;
    //     $datosProducto->categoria = $request->categoria;
    //     $datosProducto->estado = $request->estado;
    //     $datosProducto->foto = $request->foto;
    public function registroE(Request $request){
        
        $datosProducto = new App\Models\Producto;

        $datosProducto->nombre_producto = $request->nombre;
        $datosProducto->descripcion = $request->descripcion;
        $datosProducto->categoria_id = $request->categoria;
        $datosProducto->estado = $request->estado;
        $datosProducto->condicion = $request->condicion;
        $datosProducto->imagen = $request->imagen;
        $datosProducto->garantia = $request->garantia;
        $datosProducto->user_id = auth()->id();
    
        $datosProducto -> save();
        
        return view('registroSubasta')->with('datosProducto',$datosProducto);
        
        // return back();
    }

    public function registroEE(Request $request){

        $datospro = App\Models\Producto::findOrFail($request->id);
        // dd($datospro->id);


        $datospro->precio_inicial = $request->precio_inicial;
        $datospro->inicio_subasta = $request->inicio_subasta;
        $datospro->final_subasta = $request->final_subasta;

        $datospro -> push();

        return back();
    } 
}

