<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Libreria\Mail\PHPMailer;
use App\Libreria\Mail\Exception;

class MailController extends Controller
{
    public function enviar(Request $request)
    {
        $asunto = $request->input('Suscripciòn a dRemate');
        $destinatario = $request->input('Correo registrado');
        $cuerpo = $request->input('Gracias por suscribirte a nuestra plataforma');

        $mail = new PHPMailer(true);  
        $mail->SMTPDebug = 2;
        $mail->isSMTP();                    
        $mail->Host       = 'smtp.gmail.com';             
        $mail->SMTPAuth   = true;                               
        $mail->Username   = 'correo_emisor@gmail.com';
        $mail->Password   = "contraseña_del_correo_emisor";
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;        
        $mail->Port       = 587;          
        $mail->setFrom('subastas.dRemate@gmail.com', 'Suscripciòn dRemate');
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
    }
}
