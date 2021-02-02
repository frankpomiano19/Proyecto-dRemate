<?php

namespace App\Http\Controllers;
use JD\Cloudder\Facades\Cloudder;
use App;
use Auth;
use Illuminate\Http\Request;
use App\Http\Requests\SubirProductoRequest;
use App\Support\Collection;
use Illuminate\Pagination\Paginator; 
use App\Models\Producto;
use App\Models\Puja;
use App\Models\User;

use DB;
class RegistroProductoController extends Controller
{
    public function formularioProducto(SubirProductoRequest $request){

        // dd($request->latitud);

        // dd($request->latitud,$request->longitud);


        $image1 = $request->file('image_name1');
        $image2 = $request->file('image_name2');
        $image3 = $request->file('image_name3');
        $image4 = $request->file('image_name4');

        $name1 = $request->file('image_name1')->getClientOriginalName();
        $name2 = $request->file('image_name2')->getClientOriginalName();
        $name3 = $request->file('image_name3')->getClientOriginalName();
        $name4 = $request->file('image_name4')->getClientOriginalName();

        $image_name1 = $request->file('image_name1')->getRealPath();
        $image_name2 = $request->file('image_name2')->getRealPath();
        $image_name3 = $request->file('image_name3')->getRealPath();
        $image_name4 = $request->file('image_name4')->getRealPath();

        Cloudder::upload($image_name1, null);
        list($width1, $height1) = getimagesize($image_name1);
        $image_url1= Cloudder::show(Cloudder::getPublicId(), ["width" => $width1, "height"=>$height1]);

        Cloudder::upload($image_name2, null);
        list($width2, $height2) = getimagesize($image_name2);
        $image_url2= Cloudder::show(Cloudder::getPublicId(), ["width" => $width2, "height"=>$height2]);

        Cloudder::upload($image_name3, null);
        list($width3, $height3) = getimagesize($image_name3);
        $image_url3= Cloudder::show(Cloudder::getPublicId(), ["width" => $width3, "height"=>$height3]);

        Cloudder::upload($image_name4, null);
        list($width4, $height4) = getimagesize($image_name4);
        $image_url4= Cloudder::show(Cloudder::getPublicId(), ["width" => $width4, "height"=>$height4]);

        $image1->move(public_path("uploads"), $name1);
        $image2->move(public_path("uploads"), $name2);
        $image3->move(public_path("uploads"), $name3);
        $image4->move(public_path("uploads"), $name4);

        // $this->saveImages($request, $image_url1,$image_url2,$image_url3,$image_url4);

        $datospro = new App\Models\Producto;

        $datospro->image_name1 = $image_url1;
        $datospro->image_name2 = $image_url2;
        $datospro->image_name3 = $image_url3;
        $datospro->image_name4 = $image_url4;

        $datospro->latitud = $request->latitud;
        $datospro->longitud = $request->longitud;
        $datospro->nombre_producto = $request->nombre_producto;
        $datospro->descripcion = $request->descripcion;
        $datospro->categoria_id = $request->categoria_id;
        $datospro->estado = $request->estado;
        $datospro->condicion = $request->condicion;
        $datospro->ubicacion = $request->selectDepartamento;
        $datospro->distrito = $request->distrito;
        $datospro->garantia = $request->garantia;
        $datospro->user_id = auth()->id();

        $datospro -> save();

        return view('VistaPreviaRegistrado/productoRegistrado')->with('datosProducto', $request)->with('imagen1', $image_url1);

    }
    


    public function pRegister()
    {
        $productos = App\Models\Producto::all();
        return view('productos.index')->with('productos', $productos);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

   


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
  
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */





    public function index(Request $request)
    {
        $ab = date_default_timezone_get();
        date_default_timezone_set('America/Lima');
        $fecha = date('Y-m-d H:i:s');
        $productosGanados = DB::table('users')
        ->join('productos','productos.user_id','=','users.id')
        ->select('productos.ultima_puja as ultimaPuja','productos.nombre_producto as producto','productos.ubicacion as departamento','productos.final_subasta as finalSubasta','productos.indicador as indicador', 'users.usuario as usuario', 'users.id as idVendedor','productos.id as idProducto')
        ->where('productos.final_subasta','<',$fecha)
        ->where('productos.user_id_comprador','=',auth()->user()->id)
        ->get();

        $i = 0;
        
        $mensaje_s= App\Models\Mensaje::where('use_id_receptor','=',Auth::user()->id)->paginate(10,['*'],'pagination-men');
        $mensajeEnviado_s= App\Models\Mensaje::where('use_id_emisor','=',Auth::user()->id)->paginate(10,['*'],'pagination-men-env');
        $productos = App\Models\Producto::where('user_id','=',Auth::user()->id)->paginate(4,['*'],'pagination-prod-reg');

        $productosSub_s = App\Models\Producto::where('user_id','=',Auth::user()->id)->where('inicio_subasta','!=',null)->paginate(4,['*'],'pagination-prod-sub');
        $pujas = App\Models\Puja::where('user_id', Auth::id())->orderBy('created_at','DESC')->paginate(6,['*'],'pagination-hist-puj');
        return view('productos.index',compact('productos','productosSub_s','productosGanados','i','mensaje_s','mensajeEnviado_s','pujas'))->with('i', (request()->input('page', 1) - 1) * 5);
        

        
    }

    public function pagProReg(){
        $productos = App\Models\Producto::where('user_id','=',Auth::user()->id)
        ->where('final_subasta','=','NULL')
        ->paginate(4,['*'],'pagination-prod-reg');
        return view('partials.prod_reg',compact('productos'))->with('i', (request()->input('page', 1) - 1) * 5);
        
    }

    public function pagProSub(){
        $productosSub_s = App\Models\Producto::where('user_id','=',Auth::user()->id)->where('inicio_subasta','!=',null)->paginate(4,['*'],'pagination-prod-sub');
        return view('partials.prod_sub',compact('productosSub_s'))->with('i', (request()->input('page', 1) - 1) * 5);
        
    }

    public function histPuj(){
        $pujas = App\Models\Puja::where('user_id', Auth::id())->orderBy('created_at','DESC')->paginate(6,['*'],'pagination-hist-puj');
        return view('partials.hist_pujas',compact('pujas'))->with('i', (request()->input('page', 1) - 1) * 5);
    }


    public function create()
    {
        return view('productos.create');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        


        $r=$request->validate([
            'nombre_producto' => 'required',
            'descripcion' => 'required',
            'condicion' => 'required',
            'ubicacion' => 'required',

            ]);
    
            App\Models\Producto::create($request->all());

            return redirect()->route('productos.index')
                ->with('success', 'Product created successfully.');
    }


    public function show(App\Models\Producto $producto)
    {
       

        return view('productos.show',compact('producto'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Producto  $Producto
     * @return \Illuminate\Http\Response
     */
    
    public function edit(App\Models\Producto $producto)
    {
        return view('productos.edit', compact('producto'));
    }


  


    public function update(Request $request, App\Models\Producto $producto)
    {
        $request->validate([

            'nombre_producto' =>  'required',
            'descripcion'=>  'required',
           'estado' => 'required',
           'ubicacion' =>  'required',
        ]);
        $producto->update($request->all());

        return redirect()->route('productos.index')
            ->with('success', 'Acción realizada exitosamente');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Producto  $Producto
     * @return \Illuminate\Http\Response
     */
  
   
    public function destroy(App\Models\Producto $producto)
    {
        $producto->delete();

        return redirect()->route('productos.index')
            ->with('success', 'Project deleted successfully');
    }
}
