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
        $comentariosGustado_s = Comentario::where('use_id',$idUser)->orderBy('com_like','DESC')->take(2)->get();
        //dd($comentariosGustado_s->count(),$comentariosPerfil_s->count());
        
        return view('usuarioOpc.comentarioBorrar',compact('comentariosPerfil_s','comentariosGustado_s'));        
    }
}
