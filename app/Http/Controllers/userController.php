<?php

namespace App\Http\Controllers;

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

}
