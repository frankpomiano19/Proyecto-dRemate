<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Libreria\PHPMailer;
use App\Libreria\Exception;

class MailController extends Controller
{
    public function enviar(Request $request)
    {
        // $usuario = $request->usuario;
        // $correo = $request->email;

    
        // $cuerpo = "<div style='text-align:center; background-color:#FBEEE6; padding:2px;'>
        // <h1 style='color:black;'>$usuario, Gracias por suscribirte.</h1>
        // <h2 style='color:black;'>Recibirás información de las subastas que mas te interesen</h2>
        // <img sytle='width:5px;height:5px;' src='http://imgfz.com/i/LiPHm9E.png'>
        // <div>
        // <button style='background-color:#58D68D; border:1px solid black;'><a style='text-align: center; text-decoration: none; color:black; display: inline-block; width: 100%;' href='http://dremate.herokuapp.com/subastaRapida'>Ir a D'REMATE</a></button>
        // </div>
        // </div>
        // ";

        $asunto = "Suscripción D'REMATE";
        $destinatario = "cruzmanuelar@gmail.com";
        $cuerpo = "<div style='text-align:center; background-color:#FBEEE6; padding:2px;'>
        <h1 style='color:black;'>Gracias por suscribirte.</h1>
        <h2 style='color:black;'>Recibirás información de las subastas que mas te interesen</h2>
        <img sytle='width:5px;height:5px;' src='http://imgfz.com/i/LiPHm9E.png'>
        <div>
        <button style='background-color:#58D68D; border:1px solid black;'><a style='text-align: center; text-decoration: none; color:black; display: inline-block; width: 100%;' href='http://dremate.herokuapp.com/subastaRapida'>Ir a D'REMATE</a></button>
        </div>
        </div>
        ";

        $mail = new PHPMailer(true);
        $mail->CharSet = 'UTF-8';
        $mail->SMTPDebug = 2;
        $mail->isSMTP();                    
        $mail->Host       = 'smtp.gmail.com';             
        $mail->SMTPAuth = true;                               
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
