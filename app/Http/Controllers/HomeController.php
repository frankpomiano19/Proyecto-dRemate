<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use App;
//use Auth;
use Carbon\Carbon;
use App\Models\Producto;
use App\Models\mensajeSubasta;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\SubirProductoRequest;
use App\Http\Requests\SubirSubastaRequest;

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
    public function valores()
    {
        return view("paginaNT");
    }

    public function regresarP()
    {
        return view("subastaRapida");
    }

    public function viewproduct($idpro)
    {

        $listaFavoritos = App\Models\User::where('id', '=', auth()->id())->first();

        $listaFavoritos = App\Models\User::where('id','=',auth()->id())->first();
        $listaUsuario = $listaFavoritos->favoritos;
        $listaInicio = str_replace("[", "", $listaUsuario);
        $listaFin = str_replace("]", "", $listaInicio);

        $favoritos = explode(',', $listaFin);

        $tamanio = sizeof($favoritos);
        //Convertir a entero
        for ($i = 0; $i < $tamanio; $i++) {

            $temp = (int)$favoritos[$i];
            $favoritos[$i] = $temp;
        }

        $prod = App\Models\Producto::findOrFail($idpro);
        $vendedor = App\Models\User::findOrFail($prod->user_id);
        $cat = App\Models\Categoria::findOrFail($prod->categoria_id);
        $pujastotales = App\Models\Puja::all()->sortDesc();
        $ultimapuja = $pujastotales->where('producto_id', $idpro)->first();
        $usuarios = App\Models\User::all();
        $iniciosubasta = new \Carbon\Carbon($prod->inicio_subasta);
        $limitepuja = new \Carbon\Carbon($prod->final_subasta);
        $productosRelac =  App\Models\Producto::where('categoria_id','=',$prod->categoria_id)->latest()->take(5)->get();
        // Comment
        $commentUsers = mensajeSubasta::where('pro_id','=',$prod->id)->orderBy('created_at','DESC')->paginate(10);
        //End comment

        if ($ultimapuja === null) {
            $ultimoprecio = $prod->precio_inicial;
        } else {
            $ultimoprecio = $ultimapuja->valor_puja;
        }


        //End comentarios
        return view('producto',compact('vendedor','prod','pujastotales','usuarios','cat','limitepuja','iniciosubasta','ultimoprecio','ultimapuja','productosRelac','favoritos','commentUsers'));
    }

    public function buscaProducto(Request $request)
    {


        $listaFavoritos = App\Models\User::where('id', '=', auth()->id())->first();

        //Campo favorito del usuario
        $listaUsuario = $listaFavoritos->favoritos;

        //Inicio de text
        $listaInicio = str_replace("[", "", $listaUsuario);

        //Final de text
        $listaFin = str_replace("]", "", $listaInicio);

        //Conversion a array
        $favoritos = explode(',', $listaFin);

        //Tamanio de array
        $tamanio = sizeof($favoritos);

        //Convertir a entero
        for ($i = 0; $i < $tamanio; $i++) {

            $temp = (int)$favoritos[$i];
            $favoritos[$i] = $temp;
        }

        // dd($favoritos);

        $casas = "adnof";

        return view('vistaLive', [
            'productos' => App\Models\Producto::where('nombre_producto', 'LIKE', "%{$request->bproducto}%")
                ->get()
        ], ['nombreProducto' => $request->bproducto]);
    }


    public function hacerpuja(Request $request)
    {

        $pujastotales = App\Models\Puja::all()->sortDesc();
        $ultimapuja = $pujastotales->where('producto_id', $request->productoid)->first();
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


        $modiUser = App\Models\Producto::where('id', '=', $request->productoid)->first();
        $modiUser->user_id_comprador = auth()->id();
        $modiUser->ultima_puja = $request->valorpuja;
        $modiUser->indicador = 1;
        $modiUser->save();
        $producto->user_id_comprador = $request->idganador;

        if ($ultimapuja === null) {
        } else {
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

    public function agregarFavorito(Request $request)
    {

        //Fila de usuario
        $listaFavoritos = App\Models\User::where('id', '=', auth()->id())->first();

        //Campo favorito del usuario
        $listaUsuario = $listaFavoritos->favoritos;

        //Inicio de text
        $listaInicio = str_replace("[", "", $listaUsuario);

        //Final de text
        $listaFin = str_replace("]", "", $listaInicio);

        //Conversion a array
        $favoritos = explode(',', $listaFin);

        //Tamanio de array
        $tamanio = sizeof($favoritos);

        //Convertir a entero
        for ($i = 0; $i < $tamanio; $i++) {

            $temp = (int)$favoritos[$i];
            $favoritos[$i] = $temp;
        }

        //Convierte a int el id que llega
        $favNuevo = (int)$request->favorito;


        // array_push($favoritos,$favNuevo);

        for ($i = 0; $i < $tamanio; $i++) {

            if ($favoritos[$i] == $favNuevo) {
                $favoritos[$i] = 0;
                // $favoritos[$i+1] = 0;
                $existe = 1;
                break;
            } else {
                $existe = 0;
            }
        }

        if ($existe == 1) {
        } else {
            array_push($favoritos, $favNuevo);
        }

        // $favUsuario = array_unique($favoritos);

        $listaFavoritos->favoritos = $favoritos;

        $listaFavoritos->save();

        // dd($favoritos);

        // $productos = App\Models\Producto::all();

        // dd($productos);

        return back();
    }

    public function registroEE(Request $request)
    {

        $datospro = App\Models\Producto::where('id', '=', $request->id)->first();

        // dd($datospro);

        return view('RegistroProductoSubasta.subastarProducto')->with('datosProducto', $datospro);
    }

    public function registroEEE(Request $request)
    {

        $validacion = $request->validate([
            'precio_inicial' => 'required|numeric|min:10|regex:/^[\d]{1,3}(\.[\d]{1,2})?$/',
            'inicio_subasta' => 'required',
            'final_subasta' => 'required'
        ]);

        $datospro = App\Models\Producto::where('id', '=', $request->id)->first();
        // dd($datospro);
        $datospro->precio_inicial = $request->precio_inicial;
        $datospro->inicio_subasta = $request->inicio_subasta;
        $datospro->final_subasta = $request->final_subasta;
        $datospro->save();
        // dd($datospro);

        return redirect('/producto-'.$datospro->id);
        // return view('RegistroProductoSubasta.subastarProducto')->with('datosProducto', $datospro);
    }

    public function product_calendar(Request $request)
    {
        $prodcalendar = new App\Models\calendario_de_producto;
        $prodcalendar->user_id = auth()->id();
        $prodcalendar->producto_id = $request->productoid;
        $prodcalendar->save();
        return back();
    }


    public function proximassubastas(){
        $hoy = \Carbon\Carbon::now();
        $proxsem = \Carbon\Carbon::now()->addWeeks(1);
        $proxsub = App\Models\Producto::all()->where('inicio_subasta','<',$proxsem)
                        ->where('inicio_subasta','>',$hoy)->sortBy('inicio_subasta');
        return view("proxsubastas", compact('proxsub'));
    }


    public function sendCommentProduct(Request $request){

        $fieldCreate= [
            'mensajeEnviado'=> 'required',
            'idProducto' =>'required',
        ];
        $messageError=[
            'mensajeEnviado.required' =>'El campo de texto es obligatorio',
            'idProducto.required' =>'Falta el identificador para el producto',
        ];
        $validacion = Validator::make($request->all(),$fieldCreate,$messageError);
        if($validacion->fails()){
            return back()->withErrors($validacion);
        }

        $userReceptor = Producto::where('id','=',$request->idProducto)->first();
        Auth::user()->userEmisorMenSub()->create([
            'men_sub_mensaje' => $request->mensajeEnviado,
            'us_receptor'=>(int)$userReceptor->user_id,
            'pro_id' =>(int)$request->idProducto
        ]);

        $ruta = '/producto-'.$request->idProducto;
        return redirect($ruta);
    }

    public function setAgreement(Request $request){
 
 
        $fieldCreate= [
            'agreementUser'=> 'required',
            'idProductoNow' =>'required',
        ];
        $messageError=[
            'agreementUser.required' =>'El campo de texto es obligatorio',
            'idProductoNow.required' =>'Falta el identificador para el producto',
        ];
        $validacion = Validator::make($request->all(),$fieldCreate,$messageError);
        if($validacion->fails()){
            return back()->withErrors($validacion);
        }


        $productoNow = Producto::where('id','=',$request->idProductoNow)->first();
        if($productoNow->productoAgreement->count()<6){
            $productoNow->productoAgreement()->create([
                'agre_message' => $request->agreementUser,
            ]);
        }
        $ruta = '/producto-'.$request->idProductoNow;
        return redirect($ruta);
 
    }

}
