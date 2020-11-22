<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\FormularioRequest;
use App\Http\Requests\FormularioDosRequest;


class RegistroProductoController extends Controller
{
    public function formularioProducto(FormularioRequest $request){
        // dd($request);

        return view('productoRegistrado')->with('datosProducto',$request);

    }
    
    public function formularioProDos(FormularioDosRequest $request){
        // dd($request);

        return view('productoRegistradoSubasta')->with('datosProducto',$request);
    }
}
