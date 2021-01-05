<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\Producto;
use App\Models\User;
use App\Models\Mensaje;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class MedioNegoController extends Controller
{

    public function index($productUser,$usuarioPerfil)
    {
        $producto = Producto::where('id','=',$productUser)->first();
        $usuarioPerfil = User::where('id','=',$usuarioPerfil)->first();

        return view('medioNegociacion.medioInfoProd',compact('producto','usuarioPerfil'));
    }

    public function store(Request $request){
        $fieldCreate= [
            'messageSubject'=> 'required',
            'messageText' =>'required',
            'idProducto' =>'required',
            'idUsuarioDestino'=>'required'
        ];
        $messageError=[
            'messageSubject.required' =>'El campo de asunto debe ser llenado',
            'messageText.required' =>'El campo de mensaje debe ser llenado',
        ];
        $validacion = Validator::make($request->all(),$fieldCreate,$messageError);
        if($validacion->fails()){
            return response()->json(['enviado'=>false,'respuestas'=>$validacion]);
            // return redirect('/producto/createMessage')->withErrors($validacion,'respuestas')->withInput();
        }

        $vaca = 30;
        Auth::user()->userMensajeEmisor()->create([
            'men_mensaje' => $request->messageText,
            'men_asunto' => $request->messageSubject,
            'use_id_receptor'=>(int)$request->idUsuarioDestino,
            'pro_id' =>(int)$request->idProducto
        ]);


        
        return response()->json(['enviado'=>true,'respuestas'=>$validacion]);

    }
    public function create(){
        // return response()->json(['enviado'=>false]);
    }

}
