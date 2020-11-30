<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Comentario;


class userGuest extends Controller
{
    public function comentarNow($idUser){
        $comentariosPerfil_s = Comentario::where('use_id',$idUser)->orderBy('created_at','DESC')->paginate(3);
        $comentariosGustado_s = Comentario::where('use_id',$idUser)->where('com_like','>',5)->orderBy('com_like','DESC')->take(2)->get();
        $idPerfil = $idUser;        
        return view('usuarioOpc.comentarioBorrar',compact('comentariosPerfil_s','comentariosGustado_s','idPerfil'));        
    }

    public function paginacionAjax(Request $request){

        $comentariosPerfil_s = Comentario::where('use_id',$request->idUser)->orderBy('created_at','DESC')->paginate(3);
        $comentariosGustado_s = Comentario::where('use_id',$request->idUser)->where('com_like','>',5)->orderBy('com_like','DESC')->take(2)->get();
        $idPerfil = $request->idUser;        
        return view('usuarioOpc.partialsUser.comentarioReci',compact('comentariosPerfil_s','comentariosGustado_s','idPerfil'));        
    }

    public function comentarCreate(Request $request){

        $longitud = $request->comentarioNow;
        $longitud = strlen($longitud);
        if($request->comentarioNow !=null && $longitud!=null && $longitud<=400){
            $nuevoComentario = new Comentario();
            $nuevoComentario->com_texto = $request->comentarioNow;
            $nuevoComentario->use_id = $request->idUserPerfil;
            $nuevoComentario->use_idComentarios = Auth::user()->id;
            $nuevoComentario->save();    
        }
        $comentariosPerfil_s = Comentario::where('use_id',$request->idUserPerfil)->orderBy('created_at','DESC')->paginate(3);
        return view('usuarioOpc.partialsUser.comentarioReci',compact('comentariosPerfil_s'));        
        
    }
}
