<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Http\Support\Facades\Storage;
use App;
use App\Http\Requests\SubirProductoRequest;
use App\Http\Requests\SubirSubastaRequest;
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

    public function regresarP(){
        return view("subastaRapida");
    }
    
    public function viewproduct($idpro){
        
        $prod = App\Models\Producto::findOrFail($idpro);
        $vendedor = App\Models\User::findOrFail($prod->user_id);
        $cat = App\Models\Categoria::findOrFail($prod->categoria_id);
        $pujastotales = App\Models\Puja::all()->sortDesc();
        $ultimapuja = $pujastotales->where('producto_id',$idpro)->first();
        $usuarios = App\Models\User::all();
        $iniciosubasta = new \Carbon\Carbon($prod->inicio_subasta);
        $limitepuja = new \Carbon\Carbon($prod->final_subasta);
        $productosRelac =  App\Models\Producto::where('categoria_id','=',$prod->categoria_id)->latest()->take(5)->get();
        if ($ultimapuja === null) {
            $ultimoprecio = $prod->precio_inicial;
        } else {
            $ultimoprecio = $ultimapuja->valor_puja;
        }

        // dd($productosRelac);

        return view('producto',compact('vendedor','prod','pujastotales','usuarios','cat','limitepuja','iniciosubasta','ultimoprecio','ultimapuja','productosRelac'));
    }
 
    public function buscaProducto(Request $request){

        return view('vistaLive',[
            'productos' => App\Models\Producto::where('nombre_producto','LIKE',"%{$request->bproducto}%")
            ->get()
        ],['nombreProducto'=>$request->bproducto]);
    }


    public function hacerpuja(Request $request){

        $pujastotales = App\Models\Puja::all()->sortDesc();
        $ultimapuja = $pujastotales->where('producto_id',$request->productoid)->first();
        $producto = App\Models\Producto::findOrFail($request->productoid);
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
        

        $modiUser = App\Models\Producto::where('id','=',$request->productoid)->first();
        $modiUser->user_id_comprador = auth()->id();
        $modiUser->ultima_puja = $request->valorpuja;
        $modiUser->indicador = 1;
        $modiUser->save();
        $producto->user_id_comprador = $request->idganador;
        
        if($ultimapuja=== null){
            
        }else{
            $usuariodevolucion = App\Models\User::findOrFail($ultimapuja->user_id);
            $saldouseranterior = $usuariodevolucion->us_din;
            $usuariodevolucion->us_din = $saldouseranterior + $request->ultimoprecio;
            $usuariodevolucion->save();
        }
        auth()->user()->save();
        
        $datosPuja->save();
        $producto->save();
        return back();
    }
    public function registroEE(SubirSubastaRequest $request){

        return view('paginaProducto')->with('datospro',$request);
        // return back();
    } 

}

