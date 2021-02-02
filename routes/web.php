<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PruebaController;
use App\Http\Controllers\SubastaRapController;
use App\Http\Controllers\userController ;
use App\Http\Controllers\RegistroProductoController;
use App\Http\Controllers\RegistroSubastaController;
use App\Http\Controllers\SuscripcionController;
use App\Http\Controllers\userGuest;
use App\Http\Controllers\MailController;
use App\Http\Controllers\MedioNegoController;
use App\Http\Controllers\HelpController;
use Illuminate\Http\Request;


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
//calificar
Route::get('/infoa-{idUser}',[userGuest::class,'calificarNow'])->name('calificar-now');
Route::post('/infoa-calificar',[userGuest::class,'calificarCreate'])->middleware('auth')->name('calificar-create');
Route::post('/infoa-cal',[userGuest::class,'calificacionAjax'])->middleware('auth')->name('calif-ajax');
// comentarios
Route::get('/info-{idUser}',[userGuest::class,'comentarNow'])->name('comentarios-now');
Route::post('/info-crear',[userGuest::class,'comentarCreate'])->middleware('auth')->name('comentarios-create');
Route::post('/info-editar',[userGuest::class,'comentarEdit'])->middleware('auth')->name('comentarios-edit');

Route::get('/info/fetch_data_product-{idUser}',[userGuest::class,'paginacionProductAjax']);


//////////////////////////////////////

// Route::get('/subastarProducto', function () {
//     return view('RegistroProductoSubasta/subastarProducto');
// });

//////////////////////////////////////

Route::get('/category', function () {
    return view('categorias');
});

Route::get('/subastaRapida',[SubastaRapController::class,'index'])->name("subastaRapida");

Route::post('/subastaRapida',[SubastaRapController::class,'filtroProc'])->name("subastaRapida_filtro_proc");


Route::get('/subastaRapida/fetch_data',[SubastaRapController::class,'fetch_data']);
Route::get('/subastaRapida/fetch_data1',[SubastaRapController::class,'fetch_data1']);
Route::get('/subastaRapida/fetch_data2',[SubastaRapController::class,'fetch_data2']);

//guardar producto en calendario
Route::post('/subastaRapida/calendar',[HomeController::class,'product_calendar'])->name("producto_calendar");



Route::get('/vistaLive', function () {
    return view('vistaLive');
});

Route::get('/producto', function () {
    return view('producto');
});


Route::get('/subirProducto', function () {
    return view('subirProducto');
})->name('subirProducto-now');

// Subasta para pujar
Route::get('/producto-{idpro}', [HomeController::class, 'viewproduct'])->name("producto.detalles");//Punto de entrada
Route::group(['middleware' => 'auth'], function () {
    Route::post('enviarMensaje',[HomeController::class,'sendCommentProduct'])->name('enviarMensaje');//Comentario
    Route::post('setAgreement',[HomeController::class,'setAgreement'])->name('setAgreement');//Acuerdos
    Route::post('sendCommentResponse',[HomeController::class,'sendCommentResponse'])->name('sendCommentResponse');
});


// Route::post('/','HomeController@registro')->name('producto.registro');
Route::post('/prueba', [HomeController::class,'registro'])->middleware('auth')->name('producto.registro');

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
})->name('Joyas');
Route::get('categorias/tecnologia', function () {
    return view('categorias/tecnologia');
})->name('Tecnología');
Route::get('categorias/hogar', function () {
    return view('categorias/hogar');
})->name('Hogar');
Route::get('categorias/instrumentos', function () {
    return view('categorias/instrumentos');
})->name('Instrumento musical');
Route::get('categorias/electrodomesticos', function () {
    return view('categorias/electrodomesticos');
})->name('Electrodomésticos');

Route::get('categorias/productoPopular', function () {
    return view('categorias/productoPopular');
});


Route::get('favoritos', function () {
    return view('favoritos');
});

Route::get('edson2/', function () {
    return view('edson2');
});

Route::get('productosPopulares/', function () {
    return view('productosPopulares');
});



Route::get('/productosPopulares',[SuscripcionController::class,'productosPopulares'])->name('productosPopulares');

//Envío de datos del registro producto y subasta
Route::post('/registroProducto', [RegistroProductoController::class,'formularioProducto'])->middleware('auth')->name('producto.registroe');

Route::post('/registroSubasta', [RegistroSubastaController::class,'formularioProducto'])->middleware('auth')->name('producto.registroee');

Route::get('/subastarProducto-{idpro}', [HomeController::class, 'vistaSubasta'])->middleware('auth')->name("subastar.producto");


Route::post('/suscripcionUsuario', [SuscripcionController::class,'suscripcion'])->middleware('auth')->name('suscripcion.usuario');

Route::post('/productoCorreo', [SuscripcionController::class,'enviarCorreo'])->middleware('auth')->name('enviar.correo');
// Route::post('/subastarProducto', [HomeController::class,'registroEE'])->middleware('auth')->name('subastar.producto');

Route::post('/enviarSubasta', [HomeController::class,'enviarSubasta'])->middleware('auth')->name('enviar.subasta');


Route::post('/home', [HomeController::class,'buscaProducto'])->name('busqueda.busquedaespecifica');


//Controlador pago vendedor
Route::post('/sumaVendedor', [SubastaRapController::class,'sumarVendedor'])->middleware('auth')->name('pago.vendedor');
Route::post('/', [HomeController::class,'agregarFavorito'])->middleware('auth')->name('producto.favorito');
Route::post('/a', [HomeController::class,'agregarNotificacion'])->middleware('auth')->name('producto.notificacion');
//GET
Route::get('/enviarCorreo',[MailController::class,'enviar']);

Route::get('/pagoVendedor',[SubastaRapController::class,'pagoVendedor']);

Route::get('/favoritos',[SubastaRapController::class,'productosFavoritos'])->middleware('auth')->name('productos.favoritos');

Route::get('/notificacion',[SubastaRapController::class,'productosNotif'])->middleware('auth')->name('productos.notificaciones');
Route::post('/producto', [HomeController::class,'hacerpuja'])->name('puja.crear');
////////////////////////// +++++++++++++++++++ Medio de negociacion +++++++++++++++++++++++++++++ /////////////////////////
//Medio de negociacion

Route::get('/producto/{productUser}/{usuarioPerfil}',[MedioNegoController::class,'index'])->name('infoProducto');
Route::post('/producto/storeMessage',[MedioNegoController::class,'store']);
Route::get('/producto/createMessage',[MedioNegoController::class,'create']);
Route::get('/producto/chatTimeReal-{productUser}',[MedioNegoController::class,'loadChatRealTime'])->name('chat-real-time');

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

//historial de pujas 
Route::get('/producto/pagination_hist_pujas',[RegistroProductoController::class,'histPuj']);

// Mensajeria
Route::post('/home/perfil/enviar-mensaje',[userController::class,'responderMensaje'])->name('responder-mensaje');
Route::get('/home/perfil/enviar-mensaje/create',[userController::class,'messageCreate']);

//Reportar Usuario
Route::post('/infoUser',[userController::class,'reportarUser'] )->name('report-usuario');
Route::get('/informenos', function () {
    return view('user_reported');
})->name('user_reported');

Route::get('/proxsubastas',[HomeController::class,'proximassubastas'])->name('prosubastas');;

//Bloquear producto a un usuario
Route::post('/productoBloq',[MedioNegoController::class,'BloquearProductUser'] )->name('bloq-user-prod');

//Borrar al finalizar 

Route::get('borrar2',function (){
    return view('edson2');
});


// Ventana de ayuda

Route::group(['middleware' => ['auth']], function () {
    Route::post('/deleteAllHelps',[HelpController::class,'deleteAllHelps']);
    Route::post('/deleteOneHelpHome',[HelpController::class,'deleteOneHelpHome']);    
    Route::post('/deleteOneHelpSubRap',[HelpController::class,'deleteOneHelpSubRap']);    
    Route::post('/deleteOneHelpInfoPerfil',[HelpController::class,'deleteOneHelpInfoPerfil']);    
    Route::post('/deleteOneHelpCommentPefil',[HelpController::class,'deleteOneHelpCommentPefil']);    
    Route::post('/deleteOneHelpSubPuj',[HelpController::class,'deleteOneHelpSubPuj']);        
    Route::post('/addAllHelps',[HelpController::class,'addAllHelps'])->name('addAllHelps');

});
