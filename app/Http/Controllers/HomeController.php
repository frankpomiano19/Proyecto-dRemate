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

    public function agregarFavorito(Request $request){

        //Fila de usuario
        $listaFavoritos = App\Models\User::where('id','=',auth()->id())->first();

        //Campo favorito del usuario
        $listaUsuario = $listaFavoritos->favoritos;

        //Inicio de text
        $listaInicio = str_replace("[", "", $listaUsuario);

        //Final de text
        $listaFin = str_replace("]", "", $listaInicio);

        //Conversion a array
        $favoritos = explode(',',$listaFin);

        //Tamanio de array
        $tamanio = sizeof($favoritos);

        //Convertir a entero
        for($i = 0; $i<$tamanio;$i++){

            $temp = (int)$favoritos[$i];
            $favoritos[$i] = $temp;
        }

        //Convierte a int el id que llega
        $favNuevo = (int)$request->favorito;

        
        array_push($favoritos,$favNuevo);
        
        for($i = 0; $i<$tamanio;$i++){

            if($favoritos[$i] == $favNuevo){
                $favoritos[$i] = 0;
                $favoritos[$i+1] = 0;
            }
        }

        // $favUsuario = array_unique($favoritos);

        $listaFavoritos->favoritos = $favoritos;

        $listaFavoritos->save();

        // dd($favoritos);

        $productos = App\Models\Producto::all();

        // dd($productos);

        return back();
    }

    public function registroEE(SubirSubastaRequest $request){

        // dd($request);

        return view('paginaProducto')->with('datospro',$request);
    


        // dd($request);

        //-----------------------------------------------------
        // $datospro = new App\Models\Producto;
        //-----------------------------------------------------

        // $datospro = App\Models\Producto::findOrFail($request->id);
        // dd($datospro->id);
        // $datospro->id = $request->id;

        //-----------------------------------------------------
        // $datospro->precio_inicial = $request->precio_inicial;
        // $datospro->inicio_subasta = $request->inicio_subasta;
        // $datospro->final_subasta = $request->final_subasta;
        //-----------------------------------------------------


    return back();
    } 
    
     /*
    public function registroE(Request $request){
        
        $datosProducto = new App\Models\Producto;
        
            $datosProducto->nombre_producto = $request->nombre;
            $datosProducto->descripcion = $request->message;
            $datosProducto->categoria_id = $request->categoria;
            $datosProducto->estado = $request->inlineRadioOptions;
            $datosProducto->condicion = $request->condicion;
            $file = $request->file('imagen');
            $nameimage = $file->getClientOriginalName();
            $file->move(public_path("img/productimages/"),$nameimage);
            $datosProducto->imagen = $nameimage;
            $datosProducto->garantia = $request->garantia;
            $datosProducto->user_id = auth()->id();
        
    
        $datosProducto -> save();
        
        // return view('registroSubasta')->with('datosProducto',$request);
        
    }*/


}