<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PruebaController;
use App\Http\Controllers\SubastaRapController;
use App\Http\Controllers\userController ;
use App\Http\Controllers\RegistroProductoController;
use App\Http\Controllers\RegistroSubastaController;
use App\Http\Controllers\userGuest;
use App\Http\Controllers\MedioNegoController;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;
use App\Mail\MessageReceived;
use App\Http\Livewire\ProductosComponente;
use App\Http\Livewire\busquedaFiltro;


Route::get('/', function () {
    return view('paginaPrincipal');
})->name("welcome");

Route::get('/prueba', function () {
    return view("paginaNT");
})->name("paginaPrueba");

Route::get('/template', function () {
    return view('template');
});

//Informacion y comentario
Route::get('/info', function () {
    return view('informacion');
});

Route::get('/info/fetch_data_coment-{idUser}',[userGuest::class,'paginacionAjax']);
Route::get('/info-{idUser}',[userGuest::class,'comentarNow'])->name('comentarios-now');
Route::post('/info-crear',[userGuest::class,'comentarCreate'])->middleware('auth')->name('comentarios-create');
Route::post('/info-editar',[userGuest::class,'comentarEdit'])->middleware('auth')->name('comentarios-edit');

Route::get('/info/fetch_data_product-{idUser}',[userGuest::class,'paginacionProductAjax']);



Route::get('/subastarProducto', function () {
    return view('RegistroProductoSubasta/subastarProducto');
});

//////////////////////////////////////
Route::get('/category', function () {
    return view('categorias');
});

Route::get('/subastaRapida',[SubastaRapController::class,'index'])->name("subastaRapida");

Route::post('/subastaRapida',[SubastaRapController::class,'filtroProc'])->name("subastaRapida_filtro_proc");


Route::get('/subastaRapida/fetch_data',[SubastaRapController::class,'fetch_data']);
Route::get('/subastaRapida/fetch_data1',[SubastaRapController::class,'fetch_data1']);
Route::get('/subastaRapida/fetch_data2',[SubastaRapController::class,'fetch_data2']);

Route::get('/vistaLive', function () {
    return view('vistaLive');
});

Route::get('/producto', function () {
    return view('producto');
});


Route::get('/subirProducto', function () {
    return view('subirProducto');
})->name('subirProducto-now');

//Route::get('/producto', [HomeController::class, 'viewproduct'])->name("producto");
//Route::get('/rutaNoValida', [HomeController::class, 'viewproduct'])->name("ErrorNoValid");



Route::get('/producto-{idpro}', [HomeController::class, 'viewproduct'])->name("producto.detalles");



// Route::post('/','HomeController@registro')->name('producto.registro');
Route::post('/prueba', [HomeController::class,'registro'])->name('producto.registro');

//Menú de subasta, hay dos opciones: 1 Registrar producto, 2 Registrar y subastar producto
Route::get('/menuSubasta', function () {
    return view('RegistroProductoSubasta/menuSubasta');
});

//1 Registrar Producto
Route::get('registroProducto', function () {
    return view('RegistroProductoSubasta/registroProducto');
})->middleware('auth')->name('registroProducto-now');
//Registrar y subastar producto
Route::get('registroSubasta', function () {
    return view('RegistroProductoSubasta/registroSubasta');
})->middleware('auth')->name('registroSubasta-now');

//Mostrar todos los productos
Route::get('mostrarProductos', function () {
    return view('mostrarProductos');
});

Route::get('/busquedaFiltro', function () {
    return view('categorias/filtroBusqueda');
});
Route::get('categorias/joyas', function () {
    return view('categorias/joyas');
});
Route::get('categorias/tecnologia', function () {
    return view('categorias/tecnologia');
});
Route::get('categorias/hogar', function () {
    return view('categorias/hogar');
});
Route::get('categorias/instrumentos', function () {
    return view('categorias/instrumentos');
});
Route::get('categorias/electrodomesticos', function () {
    return view('categorias/electrodomesticos');
});

Route::get('edson', function () {
    return view('edson');
});



//Envío de datos del registro producto y subasta
Route::post('/registroProducto', [RegistroProductoController::class,'formularioProducto'])->name('producto.registroe');
Route::post('/registroSubasta', [RegistroSubastaController::class,'formularioProducto'])->name('producto.registroee');

Route::post('/home', [HomeController::class,'buscaProducto'])->name('busqueda.busquedaespecifica');

//Controlador pago vendedor
Route::post('/', [SubastaRapController::class,'sumarVendedor'])->name('pago.vendedor');
//GET
Route::get('/pagoVendedor',[SubastaRapController::class,'pagoVendedor']);

Route::post('/producto', [HomeController::class,'hacerpuja'])->name('puja.crear');

//Medio de negociacion

Route::get('/producto/{productUser}/{usuarioPerfil}',[MedioNegoController::class,'index'])->name('infoProducto');
Route::post('/producto/storeMessage',[MedioNegoController::class,'store']);
Route::get('/producto/createMessage',[MedioNegoController::class,'create']);

//Usuario
Route::get('/home/perfil',[userController::class,'perfilGo'])->name('perfil_us');
Route::post('/home/perfil/edit-per',[userController::class,'editarDatosPerso'] )->name('edit-datos-per');
Route::post('/home/perfil/edit-publi',[userController::class,'editarDatosPubli'] )->name('edit-datos-publi');
Route::post('/home/perfil/edit-pago',[userController::class,'pagoUser'] );
Auth::routes();
Route::get('/home',  [HomeController::class,'index'])->name('home');
Route::get('/vacassss',[HomeController::class, 'valores'])->name("nombre");//Formato ejemplo
Route::get('/productos', [RegistroProductoController::class, 'pRegister'])->name('producto');
Route::resource('productos', RegistroProductoController::class);
Route::get('/addproducto', [HomeController::class,'pRegister'])->name('view');
Route::post('/addproducto',[HomeController::class,'Store'])->name('store');
Route::delete('/addproducto/{id}', [HomeController::class,'destroy'])->name('destroy');
Route::get('/addproducto/{id}/edit',[HomeController::class,'update'])->name('update');

Route::get('/producto/pagination_data_prod_reg',[RegistroProductoController::class,'pagProReg']);
Route::get('/producto/pagination_data_prod_sub',[RegistroProductoController::class,'pagProSub']);
// Mensajeria
Route::post('/home/perfil/enviar-mensaje',[userController::class,'responderMensaje'])->name('responder-mensaje');
Route::get('/home/perfil/enviar-mensaje/create',[userController::class,'messageCreate']);