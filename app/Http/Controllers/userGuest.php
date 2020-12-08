<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Comentario;
use App\Models\User;


class userGuest extends Controller
{

    public function comentarNow($idUser){
        $comentariosPerfil_s = Comentario::where('use_id',$idUser)->orderBy('created_at','DESC')->paginate(3);
        $comentariosGustado_s = Comentario::where('use_id',$idUser)->where('com_like','>',5)->orderBy('com_like','DESC')->take(2)->get();
        $idPerfil = $idUser;
        $usuarioPerfil =  User::where('id','=',$idPerfil)->first();       
        
        return view('usuarioOpc.infoPerfil',compact('comentariosPerfil_s','comentariosGustado_s','idPerfil','usuarioPerfil'));        
    }

    public function paginacionAjax(Request $request){
        
        $comentariosPerfil_s = Comentario::where('use_id',$request->idUser)->orderBy('created_at','DESC')->paginate(3);
        $idPerfil = $request->idUser;
        return view('usuarioOpc.partialsUser.comentarioReci',compact('comentariosPerfil_s','idPerfil'));        
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
