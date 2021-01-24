<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Libreria\PHPMailer;
use App\Libreria\Exception;
use App\Models\User;

class SuscripcionController extends Controller
{
    public function suscribir(Request $request){

        $usuario = Auth::user()->usuario;
        $asunto = "Suscripción D'REMATE";
        $destinatario = Auth::user()->email;
        $cuerpo ="
            <div style='text-align:center; background-color:#FDFEFE ; padding:2px;'>
                <h1 style='color:black;'>¡Suscripción exitosa!</h1>
                <h2 style='color:black;'>" .$usuario. ", ¡Gracias por suscribirte!<br>Ahora recibirás información de las subastas que más te interesen.</h2>
                <img sytle='width:5px;height:5px;' src='http://imgfz.com/i/LiPHm9E.png'>
                <div>
                    <button style='background-color:#119933; border-radius:20px; border:1px solid black; padding: 15px 32px;'><a style='text-align: center; text-decoration: none; color:black; display: inline-block; width: 100%;' href='http://dremate.herokuapp.com/subastaRapida'><b>Ir a D'REMATE</b></a></button>
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
        $mail->send();

        $usuarioSuscrito = User::where('id','=',$id_vendedor)->first();

        if($usuarioSuscrito->suscripcion=="1"){
            $usuarioSuscrito->suscripcion = "0";
            $suscrito = 0;
        }else{
            $usuarioSuscrito->suscripcion = "1";
            $suscrito = 1;
        }

        return back()->with('suscrito', $suscrito);


    }
}
