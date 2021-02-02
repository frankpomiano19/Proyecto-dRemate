<?php

namespace App\Http\Controllers\Auth;

use Auth;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    //protected $redirectTo = "/subastaRapida";

    /**
     * Create a new controller instance.
     *
     * @return void
     */



  
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }


    public function username()
    {
        return 'usuario';
    } 

    public function login()
    {
        $credentials = $this->validate(request(), [
            $this->username() => 'required|string',
            'password' => 'required|string'
        ]);

        if(Auth::attempt($credentials))
       {
           if(Auth::user()->userReportUser !=null){
            $status = Auth::user()->userReportUser->count();
           }else{
            $status = 0;
           }
           if ($status >= 30) {
                //return back()->with('message','Su cuenta ha sido baneada')->with('typealert', 'danger');
                //Si tiene más de 30 denuncias es redirigido al login
                Auth::logout();
                return redirect()->route('user_reported');
           } else {

                return redirect()->route('subastaRapida');
           }
           
        
        }

        return back()
        ->withErrors([$this->username() => trans('auth.failed')])
        ->withImput(request([$this->username()]));
    }


    public function logout()
    {
        Auth::logout();
        
        return redirect('/');
    }    
}
