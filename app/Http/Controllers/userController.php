<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\Models\Mensaje;
use App;
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
    public function responderMensaje(Request $request){

        $camposCreate = [
            'recipientMensajeResponder'=>'required',
            'recipientAsuntoRespuestaModal'=>'required',
            'recipientIdModal'=>'required',
            'recipientIdProductoModal'=>'required'
        ];

        $mensajesError=[
            'recipientMensajeResponder.required' =>'El campo de mensaje es requerido',
            'recipientAsuntoRespuestaModal.required' =>'El campo de asunto es requerido',
        ];
        $validacion = Validator::make($request->all(),$camposCreate,$mensajesError);

        if($validacion->fails()){
            return redirect('/home/perfil/enviar-mensaje/create')->withErrors($validacion,'respuesta')->withInput();
        }
        Auth::user()->userMensajeEmisor()->create([
            'men_mensaje'=>$request->recipientMensajeResponder,
            'men_asunto'=>$request->recipientAsuntoRespuestaModal,
            'use_id_receptor'=>(int)$request->recipientIdModal,
            'pro_id'=>(int)$request->recipientIdProductoModal
        ]);
        $mensaje_s= Mensaje::where('use_id_receptor','=',Auth::user()->id)->paginate(10,['*'],'pagination-men');
        $mensajeEnviado_s= Mensaje::where('use_id_emisor','=',Auth::user()->id)->paginate(10,['*'],'pagination-men-env');        
        return view('partials.men_perfil',compact('mensaje_s','mensajeEnviado_s'));
     }

     public function messageCreate(){
        $mensaje_s= Mensaje::where('use_id_receptor','=',Auth::user()->id)->paginate(10,['*'],'pagination-men');
        $mensajeEnviado_s= Mensaje::where('use_id_emisor','=',Auth::user()->id)->paginate(10,['*'],'pagination-men-env');        
        return view('partials.men_perfil',compact('mensaje_s','mensajeEnviado_s'));

     }

     public function reportarUser(Request $request){
        $report = new App\Models\Report_user;
        $report->user_denunc_id = $request->id_denunc;
        $report->descrip = $request->denuncia;
        $report->save();
        return back();
     }
}
