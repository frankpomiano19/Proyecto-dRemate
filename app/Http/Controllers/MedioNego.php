<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;
use App\Models\Producto;
use App\Models\User;

class MedioNego extends Controller
{

    public function index($productUser,$usuarioPerfil)
    {
        $producto = Producto::where('id','=',$productUser)->first();
        $usuarioPerfil = User::where('id','=',$usuarioPerfil)->first();

        return view('medioNegociacion.medioInfoProd',compact('producto','usuarioPerfil'));
    }

}
