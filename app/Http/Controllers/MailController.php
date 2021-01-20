<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Libreria\PHPMailer;
use App\Libreria\Exception;

class MailController extends Controller
{
    public function enviar(Request $request)
    {
        // $asunto = $request->input('Suscripciòn a dRemate');
        // $destinatario = $request->input('Correo registrado');
        // $cuerpo = $request->input('Gracias por suscribirte a nuestra plataforma');

        $asunto = "Suscripcion dRemate";
        $destinatario = "cruzmanuelar@gmail.com";
        $cuerpo = "<h1>Gracias por suscribirte, recibirás informacion de las subastas que mas te interesen</h1>
        <h4>Jjeje</h4>
        <img src="{{asset('img/assets/img1.png')}}">
        <img src="{{asset('img/assets/img2.png')}}">
        <img src="{{asset('img/assets/img3.png')}}"";
        

        $mail = new PHPMailer(true);
        $mail->CharSet = 'UTF-8';
        $mail->SMTPDebug = 2;
        $mail->isSMTP();                    
        $mail->Host       = 'smtp.gmail.com';             
        $mail->SMTPAuth   = true;                               
        $mail->Username   = 'subastas.dRemate@gmail.com';
        $mail->Password   = "drematecontra";
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;        
        $mail->Port = 587;          
        $mail->setFrom('subastas.dRemate@gmail.com', "D'REMATE");
        $mail->addAddress($destinatario);
        $mail->isHTML(true);                                 
        $mail->Subject = $asunto;
        $mail->Body    = $cuerpo;
        if($mail->send()){
            return json_encode(array("status" => 200, "response" => array("message" => "Mensaje enviado")));
        }
        else{
            return response()->json(array("status" => 100, "message" => "Error al enviar correo"));
        }

        return view('enviarCorreo');
    }
}
