<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;

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
        dd($request->usuario);

        return view('usuarioOpc.partialsUser.datosPerso');
    }
}
