<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Http\Support\Facades\Storage;
use App;
use App\Http\Requests\SubirProductoRequest;
use App\Http\Requests\SubirSubastaRequest;
use Livewire\Component\Busqueda;
use Carbon\Carbon;
use App\Models\Producto;

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

    public function buscaProducto(Request $request){

        $request->validate([
            'bproducto' => 'required'
        ]);

        return view('vistaLive',[
            'productos' => Producto::where('nombre_producto','LIKE',"{$request->bproducto}%")
            ->paginate(10)
        ],['nombreProducto' => $request->bproducto]);
    }
    
    public function viewproduct($idpro){
        
        //Producto con el id que llega
        $prod = App\Models\Producto::findOrFail($idpro);

        //El id del usuario que trae el producto
        $vendedor = App\Models\User::findOrFail($prod->user_id);

        //La categoría del producto que llega
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

        return view('producto',compact('vendedor','prod','pujastotales','usuarios','cat','limitepuja','iniciosubasta','ultimoprecio','ultimapuja','productosRelac'));
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
        
        
        if($ultimapuja=== null){
            
        }else{
            $usuariodevolucion = App\Models\User::findOrFail($ultimapuja->user_id);
            $saldouseranterior = $usuariodevolucion->us_din;
            $usuariodevolucion->us_din = $saldouseranterior + $request->ultimoprecio;
            $usuariodevolucion->save();
        }
        auth()->user()->save();
        $datosPuja->save();
        
        return back();
    }



    public function registroEE(SubirSubastaRequest $request){

        return view('paginaProducto')->with('datospro',$request);
    
    return back();
} 

}

