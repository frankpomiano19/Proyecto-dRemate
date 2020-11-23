<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Http\Support\Facades\Storage;
use App;
use App\Http\Requests\SubirProductoRequest;
use App\Http\Requests\SubirSubastaRequest;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    public function valores(){
        return view("paginaNT");
    }

    public function regresarP(){
        return view("subastaRapida");
    }

    public function registroS(){
        return view("registroSubasta");
    }

    public function formularioProducto(Request $request){
        dd($request);
    }

    public function registroE(SubirProductoRequest $request){

        $datospro = new App\Models\Producto;

        $datospro->nombre_producto = $request->nombre_producto;
        $datospro->descripcion = $request->descripcion;
        $datospro->categoria_id = $request->categoria_id;
        $datospro->estado = $request->estado;
        $datospro->condicion = $request->condicion;
        $datospro->imagen = $request->imagen;
        $datospro->ubicacion = $request->ubicacion;
        $datospro->garantia = $request->garantia;
        $datospro->user_id = auth()->id();

        $datospro -> save();
    

        // dd($request);

    public function viewproduct($id,$idpro){
        $vendedor = App\Models\User::findOrFail($id);
        $prod = App\Models\Producto::findOrFail($idpro);
        $cat = App\Models\Categoria::findOrFail($prod->categoria_id);
        $pujastotales = App\Models\Puja::all();
        $ultimapuja = App\Models\Puja::all()->last();
        $usuarios = App\Models\User::all();

        return view('producto',compact('vendedor','prod','pujastotales','usuarios','ultimapuja','cat'));
    }
    

    public function hacerpuja(Request $request){
        $datosPuja = new App\Models\Puja;

        $datosPuja->valor_puja = $request->valorpuja;
        $datosPuja->user_id = auth()->id();       
        $datosPuja->producto_id = $request->productoid;

        $datosPuja->save();
        return back();
    }
    
    public function registroE(Request $request){
        
        $datosProducto = new App\Models\Producto;

        $datosProducto->nombre_producto = $request->nombre;
        $datosProducto->descripcion = $request->descripcion;
        $datosProducto->categoria_id = $request->categoria;
        $datosProducto->estado = $request->estado;
        $datosProducto->condicion = $request->condicion;
        $file = $request->file('imagen');
        $nameimage = $file->getClientOriginalName();
        $file->move(public_path("img/productimages/"),$nameimage);
        $datosProducto->imagen = $nameimage;
        $datosProducto->garantia = $request->garantia;
        $datosProducto->user_id = auth()->id();
    
        $datosProducto -> save();
        
        // return view('registroSubasta')->with('datosProducto',$request);
        
    }

    public function registroEE(SubirSubastaRequest $request){

            // dd($request);

            return view('paginaProducto')->with('datospro',$request);
        


            // dd($request);

            //-----------------------------------------------------
            // $datospro = new App\Models\Producto;
            //-----------------------------------------------------

            // $datospro = App\Models\Producto::findOrFail($request->id);
            // dd($datospro->id);
            // $datospro->id = $request->id;

            //-----------------------------------------------------
            // $datospro->precio_inicial = $request->precio_inicial;
            // $datospro->inicio_subasta = $request->inicio_subasta;
            // $datospro->final_subasta = $request->final_subasta;
            //-----------------------------------------------------


        return back();
    } 
    public function pRegister() {
       
        return view('index');
        
    }
    public function get_index_data(Request $request)
    {
        $companies = Producto::latest()->paginate(5);
  
        return Request::ajax() ? 
                     response()->json($companies,Response::HTTP_OK) 
                     : abort(404);
    }
}

