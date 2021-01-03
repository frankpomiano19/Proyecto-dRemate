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

        $listaFavoritos = App\Models\User::where('id','=',auth()->id())->first();

        $listaUsuario = $listaFavoritos->favoritos;

        $listaInicio = str_replace("[", "", $listaUsuario);

        $listaFin = str_replace("]", "", $listaInicio);



        $favoritos = explode(',',$listaFin);

        // $nombre = "Manuel";

        dd($favoritos);

        //Convierte a lista
        

        // dd($favoritos);

        // dd($nombre);

        $tamanio = sizeof($favoritos);

        

        $sinCo = substr($favoritos[$tamanio-1], -3, -1);

        $favoritos[$tamanio-1] = $sinCo;


        // $entradaFav = $request->favorito;

        dd($favoritos);

        // $favoritoLista = (int)$entradaFav;


        // array_push($favoritos,$favoritoLista);
        // array_push($favoritos,50);

        // $listaFavoritos->favoritos = $favoritos;

        // $listaFavoritos->save();

        // $existe = "no se encuentra";

        // foreach($favoritos as $fav){
        //     if($fav == $request->favorito){
        //         $existe = "Se encuentra";
        //     }
        // }


        // dd($listaFavoritos->favoritos);
    



        return view('home');
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

