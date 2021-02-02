<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\Producto;
use App\Models\User;
use App\Models\Mensaje;
use App\Models\BloqUserPro;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class MedioNegoController extends Controller
{

    public function index($productUser,$usuarioPerfil)
    {
        $producto = Producto::where('id','=',$productUser)->first();
        $usuarioPerfil = User::where('id','=',$usuarioPerfil)->first();
        $users = User::all();

        return view('medioNegociacion.medioInfoProd',compact('producto','usuarioPerfil','users'));
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

    public function loadChatRealTime($productUser){
        $producto = Producto::where('id','=',$productUser)->first();
        if(auth()->user()->id!=$producto->user_id){
            Auth::user()->userEnviaNotiChat()->create([
                'us_envia'=>auth()->user()->id,
                'us_recibe'=>$producto->user_id,
                'pro_id'=>$productUser,
                'confirmed'=>false
            ]);        
        }
        return view('broadcast.chatRealTime',compact('producto'));
    }

    public function BloquearProductUser(Request $request){
        $bloq = new BloqUserPro;
        $bloq->user_id = $request->user_bloq_id;
        $bloq->product_bloq_id = $request->idprod_bloq;
        $bloq->save();

        return back();
    }

}
