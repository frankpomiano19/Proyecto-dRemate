<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Comentario;


class userGuest extends Controller
{
    public function comentarNow($idUser){
        $comentariosPerfil_s = Comentario::where('use_id',$idUser)->orderBy('created_at','DESC')->paginate(10);
        $comentariosGustado_s = Comentario::where('use_id',$idUser)->where('com_like','>',5)->orderBy('com_like','DESC')->take(2)->get();
        $idPerfil = $idUser;
        //dd($comentariosGustado_s->count(),$comentariosPerfil_s->count());
        
        return view('usuarioOpc.comentarioBorrar',compact('comentariosPerfil_s','comentariosGustado_s','idPerfil'));        
    }

    public function comentarCreate(Request $request){
        if($request->comentarioNow !=null){
            $nuevoComentario = new Comentario();
            $nuevoComentario->com_texto = $request->comentarioNow;
            $nuevoComentario->use_id = $request->idUserPerfil;
            $nuevoComentario->use_idComentarios = Auth::user()->id;
            $nuevoComentario->save();    
        }else{
            return back()->with('mensaje1','El campo no debe ser nulo');
        }
        $comentariosPerfil_s = Comentario::where('use_id',$request->idUserPerfil)->orderBy('created_at','DESC')->paginate(10);
        return view('usuarioOpc.partialsUser.comentarioReci',compact('comentariosPerfil_s'));        
        
    }
}
