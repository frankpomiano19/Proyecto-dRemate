<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App;
use Carbon\Carbon;

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
        $cat = App\Models\Categoria::findOrFail($prod->categoria_id);
        $pujastotales = App\Models\Puja::all()->sortDesc();
        $ultimapuja = $pujastotales->where('producto_id',$idpro)->first();
        $usuarios = App\Models\User::all();
        $iniciosubasta = new \Carbon\Carbon($prod->inicio_subasta);
        $limitepuja = new \Carbon\Carbon($prod->final_subasta);
        if ($ultimapuja === null) {
            $ultimoprecio = $prod->precio_inicial;
        } else {
            $ultimoprecio = $ultimapuja->valor_puja;
        }

        return view('producto',compact('vendedor','prod','pujastotales','usuarios','ultimapuja','cat','limitepuja','iniciosubasta','ultimoprecio'));
    }
 


    public function hacerpuja(Request $request){

        $pujastotales = App\Models\Puja::all()->sortDesc();
        $ultimapuja = $pujastotales->where('producto_id',$request->productoid)->first();

        $request->validate([
            'valorpuja' => 'required|gt:ultimoprecio',
            'saldousuario' => 'gt:ultimoprecio|gte:valorpuja'
        ]);

        $datosPuja = new App\Models\Puja;

        $datosPuja->valor_puja = $request->valorpuja;
        $datosPuja->user_id = auth()->id();       
        $datosPuja->producto_id = $request->productoid;
        $nuevosaldo = $request->saldousuario - $request->valorpuja;
        auth()->user()->us_din = $nuevosaldo;
        
        
        if($ultimapuja->valorpuja  != 'null'){
            $usuariodevolucion = App\Models\User::findOrFail($ultimapuja->user_id);
            $saldouseranterior = $usuariodevolucion->us_din;
            $usuariodevolucion->us_din = $saldouseranterior + $request->ultimoprecio;
            $usuariodevolucion->save();
        }
        auth()->user()->save();
        $datosPuja->save();
        
        return back();
    }


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
        $file = $request->file('imagen');
        $nameimage = $file->getClientOriginalName();
        $file->move(public_path("img/productimages/"),$nameimage);
        $datosProducto->imagen = $nameimage;
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

