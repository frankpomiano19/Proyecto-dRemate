<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Http\Support\Facades\Storage;
use App;
// use App\Http\Requests\SubirProductoRequest;
// use App\Http\Requests\SubirSubastaRequest;
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

    public function regresarP(){
        return view("subastaRapida");
    }

    public function registroS(){
        return view("registroSubasta");
    }

    public function registroE(Request $request){

        $request->validate([
            'nombre_producto'=>['required','min:8'],
            'descripcion'=>['required','min:30'],
            'categoria_id'=>'required',
            'estado'=>'required',
            'condicion'=>'required',
            'ubicacion'=>'required',
            'imagen'=>'required',
            'garantia'=>['required','min:8']
        ]);
        
        return view('registroSubasta')->with('datosProducto',$request);
        
    }

    public function registroEE(Request $request){

        $request->validate([
            'precio_inicial'=>'required|numeric|regex:/^[\d]{0,3}(\.[\d]{1,2})?$/',
            'inicio_subasta'=>'required',
            'final_subasta'=>'required',
            'nombre_producto'=>['required','min:8'],
            'descripcion'=>['required','min:30'],
            'categoria_id'=>'required',
            'estado'=>'required',
            'ubicacion'=>'required',
            'condicion'=>'required',
            'imagen'=>'required',
            'garantia'=>['required','min:8']
        ]);


        $datospro = new App\Models\Producto;

        // $datospro = App\Models\Producto::findOrFail($request->id);
        // dd($datospro->id);
        // $datospro->id = $request->id;

        $datospro->precio_inicial = $request->precio_inicial;
        $datospro->inicio_subasta = $request->inicio_subasta;
        $datospro->final_subasta = $request->final_subasta;


        // $datospro -> push();

        $datospro->nombre_producto = $request->nombre_producto;
        $datospro->descripcion = $request->descripcion;
        $datospro->categoria_id = $request->categoria_id;
        $datospro->estado = $request->estado;
        $datospro->condicion = $request->condicion;
        $datospro->imagen = $request->imagen;
        $datospro->ubicacion = $request->ubicacion;
        // $datospro->imagen = $url;
        $datospro->garantia = $request->garantia;
        $datospro->user_id = auth()->id();

        $datospro -> save();

        return view('paginaProducto')->with('datospro',$request);
    }
}

