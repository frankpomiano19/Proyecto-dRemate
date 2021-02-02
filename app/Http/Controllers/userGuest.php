<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Comentario;
use App\Models\User;
use App\Models\Producto;
use App\Models\Votes;
use Exception;

class userGuest extends Controller
{

    public function comentarNow($idUser){
        $comentariosPerfil_s = Comentario::where('use_id',$idUser)->orderBy('created_at','DESC')->paginate(3);
        $comentariosGustado_s = Comentario::where('use_id',$idUser)->where('com_like','>',5)->orderBy('com_like','DESC')->take(2)->get();
        $idPerfil = $idUser;
        $usuarioPerfil =  User::where('id','=',$idPerfil)->first();       
        $productUser_s = Producto::where('user_id','=',$idUser)->paginate(4);
        $usuarioPerfil->visita = $usuarioPerfil->visita + 1;
        $usuarioPerfil->save();
        return view('usuarioOpc.infoPerfil',compact('comentariosPerfil_s','comentariosGustado_s','idPerfil','usuarioPerfil','productUser_s'));
    }

    public function paginacionAjax(Request $request){
        
        $comentariosPerfil_s = Comentario::where('use_id',$request->idUser)->orderBy('created_at','DESC')->paginate(3);
        $idPerfil = $request->idUser;
        return view('usuarioOpc.partialsUser.comentarioReci',compact('comentariosPerfil_s','idPerfil'));        
    }

    public function paginacionProductAjax(Request $request){
        $productUser_s = Producto::where('user_id','=',$request->idUser)->paginate(4);       
        $idPerfil = $request->idUser;

        return view('usuarioOpc.partialsUser.comentarioProd',compact('idPerfil','productUser_s'));        
    }

    public function calificarNow($idUser){
        $comentariosPerfil_s = Comentario::where('use_id',$idUser)->orderBy('created_at','DESC')->paginate(3);
        $comentariosGustado_s = Comentario::where('use_id',$idUser)->where('com_like','>',5)->orderBy('com_like','DESC')->take(2)->get();
        $idPerfil = $idUser;
        $usuarioPerfil =  User::where('id','=',$idPerfil)->first();  
        $productUser_s = Producto::where('user_id','=',$idUser)->paginate(4);    
        $calificaPerfil_s = Votes::where('use_ids',$idUser)->orderBy('created_at','DESC')->paginate(3);
        
                  
        return view('usuarioOpc.infoPerfil',compact('comentariosPerfil_s','comentariosGustado_s','idPerfil','usuarioPerfil','productUser_s'));        
    }
    public function calificarCreate(Request $request){

        try{
            
        if($request->score==null){
            return back();
        }
        $comentariosPerfil_s = Comentario::where('use_id',$request->idUserPerfil)->orderBy('created_at','DESC')->paginate(3);
        $comentariosGustado_s = Comentario::where('use_id',$request->idUserPerfil)->where('com_like','>',5)->orderBy('com_like','DESC')->take(2)->get();
        $calificaPerfil_s =Votes::where('use_ids',$request->idUserPerfil)->orderBy('created_at','DESC')->paginate(3);
        $productUser_s = Producto::where('user_id','=',$request->idUserPerfil)->paginate(4);  
        $idPerfil = $request->idUserPerfil;
        $usuarioPerfil =  User::where('id','=',$idPerfil)->first(); 
        // Verifica que el 1 usuario no vote en un mismo perfil 2 veces
        // $calificaPerfilAux =Votes::where('use_ids',(int)$request->idUserPerfil);
        // dd(Auth::user()->id,$calificaPerfilAux->user_ids,$request->idUserPerfil);

        // if($calificaPerfilAux!=null){
        //     foreach ($calificaPerfilAux->use_idc as $usuarioCalificador) {
        //         if($usuarioCalificador==Auth::user()->id){
        //             return back();
        //         }
        //     }
        // }
        // Fin
        $votes = new Votes();  
        $votes->score=$request->score;
        $votes->use_ids = $request->idUserPerfil;
        $votes->use_idc= Auth::user()->id;
        $votes->save();
        $cantidad = Votes::where('use_ids',$request->idUserPerfil)->count();
        $suma=Votes::where('use_ids',$request->idUserPerfil)->sum('score');
        $promedio=ceil($suma/$cantidad);
      
        //dd($cantidad);
        //dd($promedio);
        //$suma = Votes::where('use_ids', '>', 100)->count();

        //return view('votes.calificar')->with('votes', $votes);
        return view('usuarioOpc.infoPerfil',compact('comentariosPerfil_s','comentariosGustado_s','usuarioPerfil','productUser_s','calificaPerfil_s','idPerfil','cantidad','promedio')); 
        // view('usuarioOpc.partialsUser.calificacion',compact('calificaPerfil_s','idPerfil'));  
        }catch(Exception $e){
            return back();
        }
    }
    
    public function boot()
    {
        View::share('variableAqui', 'valor aquí');
    }
    public function comentarCreate(Request $request){

        $longitud = $request->comentarioNow;
        $longitud = strlen($longitud);
        if($request->comentarioNow !=null && $longitud!=null && $longitud<=400){
            $nuevoComentario = new Comentario();
            $nuevoComentario->com_texto = $request->comentarioNow;
            $nuevoComentario->com_editado = 0;
            $nuevoComentario->use_id = $request->idUserPerfil;
            $nuevoComentario->use_idComentarios = Auth::user()->id;
            $nuevoComentario->save();    
        }
        $comentariosPerfil_s = Comentario::where('use_id',$request->idUserPerfil)->orderBy('created_at','DESC')->paginate(3);
        $idPerfil = $request->idUserPerfil;

        return view('usuarioOpc.partialsUser.comentarioReci',compact('comentariosPerfil_s','idPerfil'));        
        
    }

    public function comentarEdit(Request $request){
        if($request->comentarioEditado !=null){
            $editComentario= Comentario::where('id',$request->idComentario)->first();
            if($editComentario->com_editado!=null){
                $editComentario->com_editado++;

            }else{
                $editComentario->com_editado=1;
            }
            $valorTexto = strval($editComentario->com_texto."\n".'Edicion '.$editComentario->com_editado.' :'."\n".$request->comentarioEditado);
            $editComentario->com_texto = $valorTexto;
            //$editComentario->com_texto =$editComentario->com_texto + $request->comentarioEditado;
            $editComentario->push();
        }
        $comentariosPerfil_s = Comentario::where('use_id',$request->idUserPerfilPartial)->orderBy('created_at','DESC')->paginate(3);
        $idPerfil = $request->idUserPerfilPartial;

        return view('usuarioOpc.partialsUser.comentarioReci',compact('comentariosPerfil_s','idPerfil'));        

    }
}
