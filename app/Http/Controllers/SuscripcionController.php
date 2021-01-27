<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;
use App\Libreria\PHPMailer;
use App\Libreria\Exception;
use App\Models\User;
use App\Models\Producto;

class SuscripcionController extends Controller
{
    public function productosPopulares(){

        $variable = "casa";

        $productos = Producto::where('favorito','!=',0)->orderBy('favorito', 'desc')->get();
        
        // dd($producto);


        return view('productosPopulares')->with('variable', $variable)->with('productos', $productos);

    }

    public function suscripcion(Request $request){

        $idUsuario = $request->idUsuario;
        $nameUser = $request->nameUser;

        $usuario = $nameUser;
        $asunto = "Suscripción D'REMATE";
        $destinatario = $request->email;
        $cuerpo ="
            <div style='text-align:center; background-color:#FDFEFE ; padding:2px;'>
                <h1 style='color:black;'>¡Suscripción exitosa!</h1>
                <h2 style='color:black;'>" .$usuario. ", ¡Gracias por suscribirte!<br>Ahora recibirás información de las subastas que más te interesen.</h2>
                <img sytle='width:5px;height:5px;' src='http://imgfz.com/i/LiPHm9E.png'>
                <div>
                    <button style='background-color:#119933; border-radius:20px; border:1px solid black; padding: 15px 32px;'><a style='text-align: center; text-decoration: none; color:black; display: inline-block; width: 100%;' href='http://dremate.herokuapp.com/subastaRapida'><b>Ir a D'REMATE</b></a></button>
                </div>
            </div>";

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

        $usuarioSuscrito = User::where('id','=',$idUsuario)->first();

        if($usuarioSuscrito->suscripcion=="1"){
            $usuarioSuscrito->suscripcion = "0";
            $usuarioSuscrito->save();

            $suscrito = 0;
        }else{
            $usuarioSuscrito->suscripcion = "1";
            $usuarioSuscrito->save();
            $suscrito = 1;
        }
        return back();
    }

    public function enviarCorreo(Request $request){

        // dd($request);
        $productoFav = $request->productoCorreo;
        $usuario = $request->usuario;

        $producto = Producto::where('id','=',$productoFav)->first();

        $nombreProducto = $producto->nombre_producto;
        $descripcion = $producto->descripcion;
        $precio = $producto->precio_inicial;
        $garantia = $producto->garantia;
        $departamento = $producto->ubicacion;
        $imagen = $producto->image_name1;

        $enlace = 'http://dremate.herokuapp.com/producto-'.$productoFav;
        
        $asunto = "Producto favorito.";
        $destinatario = $request->email;
        $cuerpo ="
            <div style='text-align:center; background-color:#FDFEFE ; padding:2px;'>
                <h1 style='color:black;'>$nombreProducto</h1>
                <h2 style='color:black;'>" .$usuario. ", ¡Te hacemos llegar las caracteristicas de tu producto favorito!</h2>
                <h3>Descripcion: ".$descripcion."</h3>
                <h3>Descripcion: ".$garantia."</h3>
                <h3>Precio inicial: ".$precio."</h3>
                <h3>Departamento: ".$departamento."</h3>
                <div style='width:5%; height:5%;position:relative;
                width:100%;'>
                    <img style='margin:auto;
                    display:block;' src='$imagen' alt='$nombreProducto'>
                </div>
                <div>
                    <button style='background-color:#119933; border-radius:20px; border:1px solid black; padding: 15px 32px;'><a style='text-align: center; text-decoration: none; color:white; display: inline-block; width: 100%;' href='$enlace'><b>Ver producto</b></a></button>
                </div>
            </div>";
        
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

        return back();
        
    }
}
