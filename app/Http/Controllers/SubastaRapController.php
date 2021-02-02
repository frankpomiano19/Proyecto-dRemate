<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App;
use App\Models\Producto;
use App\Models\Puja;
use App\Models\User;
use App\Models\calendario_de_producto;

use DB;

class SubastaRapController extends Controller
{
    public function index(){

        $ab = date_default_timezone_get();  //Obtiene la fecha actual
        date_default_timezone_set('America/Lima');  //Obtiene la fecha de Lima Peru
        $valorN = date('Y-m-d H:i:s');//Sale el formato 2020-10-29 15:29:12
        
        $su_curso_s = Producto::where('inicio_subasta','<',$valorN)->where('final_subasta','>',$valorN)->orderBy('final_subasta','ASC')->paginate(6);
        $su_dispo_s = Producto::where('inicio_subasta','>',$valorN)->orderBy('inicio_subasta','ASC')->paginate(6);
        $su_hist_s = Producto::where('final_subasta','<',$valorN)->orderBy('final_subasta','ASC')->paginate(10);


        if(isset(auth()->user()->id)){



            $listaFavoritos = User::where('id','=',auth()->id())->first();

            $listaUsuario = $listaFavoritos->favoritos;
    
            $listaInicio = str_replace("[", "", $listaUsuario);
    
            $listaFin = str_replace("]", "", $listaInicio);
    
            $favoritos = explode(',',$listaFin);
    
            $tamanio = sizeof($favoritos);

            for($i = 0; $i<$tamanio;$i++){
    
                $temp = (int)$favoritos[$i];
                $favoritos[$i] = $temp;
            }
    
            $i = 0;
            
              $listaNotificaciones = $listaFavoritos->notificaciones;

              $listaInicNotif = str_replace("[", "", $listaNotificaciones);

             $listaFinNotif = str_replace("]", "", $listaInicNotif);

            $notificaciones = explode(',', $listaFinNotif);

              $tam = sizeof($notificaciones);
            
            for ($i = 0; $i < $tam; $i++) {

                $temp = (int)$notificaciones[$i];
                $notificaciones[$i] = $temp;
            }

    
            return view('subastaRapida',compact('su_curso_s','su_dispo_s','su_hist_s','favoritos','notificaciones'));
        }else{
            

            return view('subastaRapida',compact('su_curso_s','su_dispo_s','su_hist_s'));
        }

        
    }

    public function filtroProc(Request $request){      

        $ab = date_default_timezone_get();  //Obtiene la fecha actual
        date_default_timezone_set('America/Lima');  //Obtiene la fecha de Lima Peru
        $valorN = date('Y-m-d H:i:s');//Sale el formato 2020-10-29 15:29:12

        if(auth()->user()!=null){
            $listaFavoritos = User::where('id','=',auth()->id())->first();
            $listaUsuario = $listaFavoritos->favoritos;
            $listaInicio = str_replace("[", "", $listaUsuario);
            $listaFin = str_replace("]", "", $listaInicio);
            $favoritos = explode(',',$listaFin);
            $tamanio = sizeof($favoritos);
            //Convertir a entero
            for($i = 0; $i<$tamanio;$i++){
    
                $temp = (int)$favoritos[$i];
                $favoritos[$i] = $temp;
            }
    
            $i = 0;
    
        }

        if($request -> ajax()){
            if($request->filtro == 0){
                $su_curso_s = Producto::where('inicio_subasta','<',$valorN)->where('final_subasta','>',$valorN)->orderBy('final_subasta','DESC')->paginate(6);
                if(auth()->user()!=null){
                    return view('partials.sub_rap_pro',compact('su_curso_s','favoritos'));    
                }else{
                    return view('partials.sub_rap_pro',compact('su_curso_s'));    
                }
            }else if($request->filtro == 1){
                $su_curso_s = Producto::where('inicio_subasta','<',$valorN)->where('final_subasta','>',$valorN)->orderBy('final_subasta','ASC')->paginate(6);
                if(auth()->user()!=null){
                    return view('partials.sub_rap_pro',compact('su_curso_s','favoritos'));    
                }else{
                    return view('partials.sub_rap_pro',compact('su_curso_s'));    
                }

            }else{
                return "ERROR";
            }
        }
        /*
        if($request -> ajax()){
            $productoPrueba = Producto::where('id',1)->get();
            return response()->json(array('id'=>$productoPrueba[0]->id,'nombre_producto'=>$productoPrueba[0]->nombre_producto),200);
        }*/
        /*
        $su_curso_s = Producto::where('estado','En curso')->orderBy('id','DESC')->paginate(9);
        $su_dispo_s = Producto::where('estado','Disponible')->orderBy('id','DESC')->paginate(9);
        $su_hist_s = Producto::where('estado','Comprado')->orderBy('id','ASC')->paginate(30);
        */

        //$su_dispo_s = QueryBuilder::for(Producto::class)->allowedSorts('id')->get();
        //$su_curso_s  = QueryBuilder::for(Producto::class)->allowedSorts('name')->paginate(3)->appends(request()->query());
        //return view('subastaRapida',compact('su_curso_s','su_dispo_s','su_hist_s'));
        //return view('subastaRapida',compact('su_curso_s','su_dispo_s'))->renderSection()['partials.sub_rap_pro'];
    }

    public function barraProgreso(){

    }

    public function pagoVendedor(){

        $ab = date_default_timezone_get();
        date_default_timezone_set('America/Lima');
        $fecha = date('Y-m-d H:i:s');
        $productosGanados = DB::table('users')
        ->join('productos','productos.user_id','=','users.id')
        ->select('productos.ultima_puja as ultimaPuja','productos.nombre_producto as producto','productos.ubicacion as departamento','productos.final_subasta as finalSubasta','productos.indicador as indicador', 'users.usuario as usuario', 'users.id as idVendedor','productos.id as idProducto')
        ->where('productos.final_subasta','<',$fecha)
        ->where('productos.user_id_comprador','=',auth()->user()->id)
        ->get();
        
        $i = 0;

        return view('partials.sub_ganadas',compact('productosGanados','i'));

    }

    public function productosFavoritos(){

        $productos = Producto::all();

        $nombre = "mNUAEL";

        $listaFavoritos = User::where('id','=',auth()->id())->first();

        $listaUsuario = $listaFavoritos->favoritos;

        $suscrito = $listaFavoritos->suscripcion;

        $listaInicio = str_replace("[", "", $listaUsuario);

        $listaFin = str_replace("]", "", $listaInicio);

        $favoritos = explode(',',$listaFin);

        $tamanio = sizeof($favoritos);

        //Convertir a entero
        for($i = 0; $i<$tamanio;$i++){

            $temp = (int)$favoritos[$i];
            $favoritos[$i] = $temp;
        }

        $i = 0;
        // dd($favoritos);


        return view('favoritos')->with('casa', $nombre)->with('productos', $productos)->with('favoritos', $favoritos)->with('i', $i)->with('suscrito', $suscrito);
    }

    public function productosNotif(){
  

        $productos = Producto::all();

        $nombre = "mNUAEL";

        $listaFavoritos = User::where('id','=',auth()->id())->first();

        $listaNotificaciones = $listaFavoritos->notificaciones;

        $listaInicNotif = str_replace("[", "", $listaNotificaciones);

       $listaFinNotif = str_replace("]", "", $listaInicNotif);

      $notificaciones = explode(',', $listaFinNotif);

        $tam = sizeof($notificaciones);

        //Convertir a entero
        for ($i = 0; $i < $tam; $i++) {

            $temp = (int)$notificaciones[$i];
            $notificaciones[$i] = $temp;
        }
        $i = 0;
        // dd($favoritos);

        return view('notificaciones')->with('casa', $nombre)->with('productos', $productos)->with('notificaciones', $notificaciones)->with('i', $i);
    }


    public function sumarVendedor(Request $request){

        $nombre = "Manuel";

        $id_vendedor = $request->vendedor;
        $monto = $request->monto;
        $idProduc = $request->idProducto;

        // dd($idProduc);
        // dd($nombre,$id_vendedor,$monto);

        $pagoVendedor = User::where('id','=',$id_vendedor)->first();

        $pagoProducto = Producto::where('id','=',$idProduc)->first();

        $pagoProducto->indicador = 0;

        // dd($pagoProducto);

        $saldoActual = $pagoVendedor->us_din;
        
        $pagoVendedor->us_din = $saldoActual + $monto;


        $pagoVendedor->save();
        $pagoProducto->save();



        // dd($pagoVendedor->us_din

        return back();
    }


    public function fetch_data(Request $request){

        $ab = date_default_timezone_get();  //Obtiene la fecha actual
        date_default_timezone_set('America/Lima');  //Obtiene la fecha de Lima Peru
        $valorN = date('Y-m-d H:i:s');//Sale el formato 2020-10-29 15:29:12

        if(auth()->user()!=null){
            $listaFavoritos = User::where('id','=',auth()->id())->first();

            $listaUsuario = $listaFavoritos->favoritos;
    
            $listaInicio = str_replace("[", "", $listaUsuario);
    
            $listaFin = str_replace("]", "", $listaInicio);
    
            $favoritos = explode(',',$listaFin);
    
            $tamanio = sizeof($favoritos);
            //Convertir a entero
            for($i = 0; $i<$tamanio;$i++){
                $temp = (int)$favoritos[$i];
                $favoritos[$i] = $temp;
            }
            $i = 0;
        }

        

        if($request->ajax()){
            if($request->filtro == 0){
                $su_curso_s = Producto::where('inicio_subasta','<',$valorN)->where('final_subasta','>',$valorN)->orderBy('final_subasta','ASC')->paginate(6);
                if(auth()->user()!=null){
                    return view('partials.sub_rap_pro',compact('su_curso_s','favoritos'));    
                }else{
                    return view('partials.sub_rap_pro',compact('su_curso_s'));    

                }
    
            }else if($request->filtro==1){
                $su_curso_s = Producto::where('inicio_subasta','<',$valorN)->where('final_subasta','>',$valorN)->orderBy('final_subasta','DESC')->paginate(6);
                if(auth()->user()!=null){
                    return view('partials.sub_rap_pro',compact('su_curso_s','favoritos'));    
                }else{
                    return view('partials.sub_rap_pro',compact('su_curso_s'));    

                }
        
            }
    
        }
        return "Error al cargar datos";
    }

    public function fetch_data1(Request $request){

        $ab = date_default_timezone_get();  //Obtiene la fecha actual
        date_default_timezone_set('America/Lima');  //Obtiene la fecha de Lima Peru
        $valorN = date('Y-m-d H:i:s');//Sale el formato 2020-10-29 15:29:12
        
        $su_dispo_s = Producto::where('inicio_subasta','>',$valorN)->orderBy('inicio_subasta','ASC')->paginate(6);
        return view('partials/sub_rap_progra',compact('su_dispo_s'));    
    }
    public function fetch_data2(Request $request){

        $ab = date_default_timezone_get();  //Obtiene la fecha actual
        date_default_timezone_set('America/Lima');  //Obtiene la fecha de Lima Peru
        $valorN = date('Y-m-d H:i:s');//Sale el formato 2020-10-29 15:29:12
        $su_hist_s = Producto::where('final_subasta','<',$valorN)->orderBy('final_subasta','ASC')->paginate(10);
        return view('partials.sub_rap_his',compact('su_hist_s'));    
    }
}

