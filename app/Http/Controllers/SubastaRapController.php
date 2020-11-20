<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Producto;

class SubastaRapController extends Controller
{
    public function index(){
        $su_curso_s = Producto::where('estado','En curso')->orderBy('final_subasta','ASC')->paginate(6);
        $su_dispo_s = Producto::where('estado','Disponible')->orderBy('final_subasta','ASC')->paginate(6);
        $su_hist_s = Producto::where('estado','Comprado')->orderBy('final_subasta','ASC')->paginate(10);

        return view('subastaRapida',compact('su_curso_s','su_dispo_s','su_hist_s'));
    }

    public function filtroProc(Request $request){      


        if($request -> ajax()){
            if($request->filtro == 0){
                $su_curso_s = Producto::where('estado','En curso')->orderBy('final_subasta','DESC')->paginate(6);
                return view('partials.sub_rap_pro',compact('su_curso_s'));    
            }else if($request->filtro == 1){
                $su_curso_s = Producto::where('estado','En curso')->orderBy('final_subasta','ASC')->paginate(6);
                return view('partials.sub_rap_pro',compact('su_curso_s'));    

            }else{
                return "ERROR";
            }
        }
        /*
        if($request -> ajax()){
            $productoPrueba = Producto::where('id',1)->get();
            return response()->json(array('id'=>$productoPrueba[0]->id,'nombre_producto'=>$productoPrueba[0]->nombre_producto),200);
        }*/
        /*
        $su_curso_s = Producto::where('estado','En curso')->orderBy('id','DESC')->paginate(9);
        $su_dispo_s = Producto::where('estado','Disponible')->orderBy('id','DESC')->paginate(9);
        $su_hist_s = Producto::where('estado','Comprado')->orderBy('id','ASC')->paginate(30);
        */

        //$su_dispo_s = QueryBuilder::for(Producto::class)->allowedSorts('id')->get();
        //$su_curso_s  = QueryBuilder::for(Producto::class)->allowedSorts('name')->paginate(3)->appends(request()->query());
        //return view('subastaRapida',compact('su_curso_s','su_dispo_s','su_hist_s'));
        //return view('subastaRapida',compact('su_curso_s','su_dispo_s'))->renderSection()['partials.sub_rap_pro'];
    }

    public function barraProgreso(){

    }


    public function fetch_data(Request $request){

        if($request->ajax()){
            if($request->filtro == 0){
                $su_curso_s = Producto::where('estado','En curso')->orderBy('final_subasta','ASC')->paginate(6);
                return view('partials.sub_rap_pro',compact('su_curso_s'));    
    
            }else if($request->filtro==1){
                $su_curso_s = Producto::where('estado','En curso')->orderBy('final_subasta','DESC')->paginate(6);
                return view('partials.sub_rap_pro',compact('su_curso_s'));    
        
            }
    
        }
        return "Error al cargar datos";
    }

    public function fetch_data1(Request $request){
        $su_dispo_s = Producto::where('estado','Disponible')->orderBy('final_subasta','ASC')->paginate(6);
        return view('partials/sub_rap_progra',compact('su_dispo_s'));    
    }
    public function fetch_data2(Request $request){
        $su_hist_s = Producto::where('estado','Comprado')->orderBy('final_subasta','ASC')->paginate(10);    
        return view('partials.sub_rap_his',compact('su_hist_s'));    
    }


}

