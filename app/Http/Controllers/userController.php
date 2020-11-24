<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
class userController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function perfilGo(){
        return view('usuarioOpc.pestaña');
    }

    public function editarDatosPerso(Request $request){
        $usuarioActual = Auth::user();
        
        if($request->usuario !=null){
            $usuarioActual->usuario = $request->usuario;
        }
        if($request->password !=null){
            $usuarioActual->password = Hash::make($request->password);
            
        }
        $usuarioActual->save();
        
        return view('usuarioOpc.partialsUser.datosPerso');
    }

    public function editarDatosPubli(Request $request){

        $usuarioActual = Auth::user();
        if($request->youtube!=null){
            $usuarioActual->us_youtube = $request->youtube;
        }

        if($request->facebook!=null){
            $usuarioActual->us_facebook = $request->facebook;
        }
        if($request->twitter!=null){
            $usuarioActual->us_twitter = $request->twitter;
        }
        if($request->twitch!=null){
            $usuarioActual->us_twitch = $request->twitch;
        }

        $usuarioActual->save();

        return view('usuarioOpc.partialsUser.datosPubli');
    }

    public function pagoUser(Request $request){
        $usuarioActual = Auth::user();
        $usuarioActual->us_din =$usuarioActual->us_din + 40; 

        $usuarioActual->save();
        return view('usuarioOpc.partialsUser.datosDine');

    }
}
