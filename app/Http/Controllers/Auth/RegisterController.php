<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Libreria\PHPMailer;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = "/";

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }
    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'usuario' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    public function create(array $data)
    {
        $dinero = 15.0;

        if(isset($data['suscripcion'])){

            // dd($data['suscripcion']);

            $asunto = "Suscripción D'REMATE";
            $destinatario = $data['email'];
            $cuerpo ="
            <div style='text-align:center; background-color:#FDFEFE ; padding:2px;'>
                <h1 style='color:black;'>¡Suscripción exitosa!</h1>
                <h2 style='color:black;'>" .$data['usuario']. ", ¡Gracias por suscribirte!<br>Ahora recibirás información de las subastas que más te interesen.</h2>
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

            $userRegisterAuth = User::create([
                'usuario' => $data['usuario'],
                'us_din' => $dinero,
                'us_descp'=> "Mi perfil",
                'email' => $data['email'],
                'Nombres' => $data['Nombres'],
                'Apellidos' => $data['Apellidos'],
                'telefono' => $data['telefono'],
                'fechadenacimiento' => $data['fechadenacimiento'],
                'password' => Hash::make($data['password']),
                'suscripcion' => (string)$data['suscripcion']
            ]);
            $userRegisterAuth->userHelp()->create([]);

            return $userRegisterAuth;

        }
        else{
            $userRegisterAuth = User::create([
                'usuario' => $data['usuario'],
                'us_din' => $dinero,
                'us_descp'=> "Mi perfil",
                'email' => $data['email'],
                'Nombres' => $data['Nombres'],
                'Apellidos' => $data['Apellidos'],
                'telefono' => $data['telefono'],
                'fechadenacimiento' => $data['fechadenacimiento'],
                'password' => Hash::make($data['password']),
                'suscripcion' => "0"
            ]);
            $userRegisterAuth->userHelp()->create([]);

            return $userRegisterAuth;
        }

        /*
        User::create([
            'usuario' => $data['usuario'],
            'us_din' => $dinero,
            'us_descp'=> "Mi perfil",
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);


        return view("template");*/

    }
}
