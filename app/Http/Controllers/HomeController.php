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
        $nombre="casa";
        return view('home')->with('nombre', $nombre);
    }
    public function valores(){
        return view("paginaNT");
    }

    public function regresarP(){
        return view("subastaRapida");
    }
    
    public function viewproduct($idpro){

        $listaFavoritos = App\Models\User::where('id','=',auth()->id())->first();

        $listaUsuario = $listaFavoritos->favoritos;

        $listaInicio = str_replace("[", "", $listaUsuario);

        $listaFin = str_replace("]", "", $listaInicio);

        $favoritos = explode(',',$listaFin);

        $tamanio = sizeof($favoritos);

        for($i = 0; $i<$tamanio;$i++){

            $temp = (int)$favoritos[$i];
            $favoritos[$i] = $temp;
        }
        
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

        $muestra = 0;


        return view('producto',compact('vendedor','prod','pujastotales','usuarios','cat','limitepuja','iniciosubasta','ultimoprecio','ultimapuja','productosRelac','favoritos','muestra'));
    }
 
    public function buscaProducto(Request $request){


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

        // dd($favoritos);

        $casas = "adnof";

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

    public function agregarFavorito(Request $request){

        //Fila de usuario
        $listaFavoritos = App\Models\User::where('id','=',auth()->id())->first();

        $productoFavorito = App\Models\Producto::where('id','=',$request->favorito)->first();

        // dd($request->fav);




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

        
        // array_push($favoritos,$favNuevo);
        
        for($i = 0; $i<$tamanio;$i++){

            if($favoritos[$i] == $favNuevo){
                $favoritos[$i] = 0;
                $existe = 1;
                break;
            }else{
                $existe = 0;
            }

        }

        if($request->fav=="1"){
            $productoFavorito->favorito = $productoFavorito->favorito + 1;
            $productoFavorito->save();
        }else{
            $productoFavorito->favorito = $productoFavorito->favorito - 1;
            $productoFavorito->save();
        }

        if($request->indice=="0"){
            $productoFavorito->favorito = $productoFavorito->favorito - 1;
            $productoFavorito->save();
        }

        if($existe == 1){
            
        }else{
            array_push($favoritos,$favNuevo);
        }

        // $favUsuario = array_unique($favoritos);

        $listaFavoritos->favoritos = $favoritos;

        $listaFavoritos->save();

        // dd($favoritos);

        // $productos = App\Models\Producto::all();

        // dd($productos);

        return back();
    }

    public function registroEE(Request $request){

        $datospro = App\Models\Producto::where('id','=',$request->id)->first();

        // dd($datospro);

        return view('RegistroProductoSubasta.subastarProducto')->with('datosProducto', $datospro);

    }

    public function enviarSubasta(Request $request){

        $request->validate([
            'precio_inicial'=>'required|numeric|min:10|regex:/^[\d]{1,3}(\.[\d]{1,2})?$/',
            'inicio_subasta'=>'required|date',
            'final_subasta'=>'required|date|after:inicio_subasta'
        ]);

        $id = $request->id;

        $prod = App\Models\Producto::findOrFail($id);

        $prod->precio_inicial = $request->precio_inicial;
        $prod->final_subasta = $request->final_subasta;
        $prod->inicio_subasta = $request->inicio_subasta;

        $prod->save();

        $listaFavoritos = App\Models\User::where('id','=',auth()->id())->first();

        $listaUsuario = $listaFavoritos->favoritos;

        $listaInicio = str_replace("[", "", $listaUsuario);

        $listaFin = str_replace("]", "", $listaInicio);

        $favoritos = explode(',',$listaFin);

        $tamanio = sizeof($favoritos);

        for($i = 0; $i<$tamanio;$i++){

            $temp = (int)$favoritos[$i];
            $favoritos[$i] = $temp;
        }
        
        $prod = App\Models\Producto::findOrFail($id);
        $vendedor = App\Models\User::findOrFail($prod->user_id);
        $cat = App\Models\Categoria::findOrFail($prod->categoria_id);
        $pujastotales = App\Models\Puja::all()->sortDesc();
        $ultimapuja = $pujastotales->where('producto_id',$id)->first();
        $usuarios = App\Models\User::all();
        $iniciosubasta = new \Carbon\Carbon($prod->inicio_subasta);
        $limitepuja = new \Carbon\Carbon($prod->final_subasta);
        $productosRelac =  App\Models\Producto::where('categoria_id','=',$prod->categoria_id)->latest()->take(5)->get();
        if ($ultimapuja === null) {
            $ultimoprecio = $prod->precio_inicial;
        } else {
            $ultimoprecio = $ultimapuja->valor_puja;
        }

        $muestra = 1;


        return view('producto',compact('vendedor','prod','pujastotales','usuarios','cat','limitepuja','iniciosubasta','ultimoprecio','ultimapuja','productosRelac','favoritos','muestra'));

        // dd($prod);

    }
    
    public function product_calendar(Request $request){
        $prodcalendar = new App\Models\calendario_de_producto;
        $prodcalendar->user_id = auth()->id();
        $prodcalendar->producto_id = $request->productoid;
        $prodcalendar->save();
        return back();
    }

    public function vistaSubasta($idpro){

        $prod = App\Models\Producto::findOrFail($idpro);


        // dd($prod);

        return view('RegistroProductoSubasta/subastarProducto')->with('datosProducto', $prod);
    }

}