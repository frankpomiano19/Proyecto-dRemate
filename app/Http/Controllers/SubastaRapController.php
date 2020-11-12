<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Producto;

class SubastaRapController extends Controller
{
    public function index(){
        $su_curso_s = Producto::where('estado','En curso')->paginate(9);
        $su_dispo_s = Producto::where('estado','Disponible')->paginate(9);

        return view('subastaRapida',compact('su_curso_s','su_dispo_s'));
    }

    public function filtroProc(Request $request){
        $su_curso_s = Producto::where('estado','En curso')->orderBy('id','DESC')->paginate(9);
        $su_dispo_s = Producto::where('estado','Disponible')->paginate(9);
     
        if($request->ajax()){
            return view('subastaRapida',compact('su_curso_s','su_dispo_s'))->renderSection()['partials.sub_rap_pro'];
            //return view('subastaRapida',compact('su_curso_s','su_dispo_s'));
        }
        return view('subastaRapida',compact('su_curso_s','su_dispo_s'));
    }
}
