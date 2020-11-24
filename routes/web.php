<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PruebaController;
use App\Http\Controllers\SubastaRapController;
use App\Http\Controllers\userController ;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;
use App\Mail\MessageReceived;


Route::get('/', function () {
    return view('paginaPrincipal');
})->name("welcome");

Route::get('/prueba', function () {
    return view("paginaNT");
})->name("paginaPrueba");


Route::get('/template', function () {
    return view('template');
});

Route::get('/inicio', function () {
    return view('paginaPrincipal');
});
    

Route::get('/category', function () {
    return view('categorias');
});

Route::get('/subastaRapida',[SubastaRapController::class,'index'])->name("subastaRapida");
Route::post('/subastaRapida',[SubastaRapController::class,'filtroProc'])->name("subastaRapida_filtro_proc");


Route::get('/subastaRapida/fetch_data',[SubastaRapController::class,'fetch_data']);
Route::get('/subastaRapida/fetch_data1',[SubastaRapController::class,'fetch_data1']);
Route::get('/subastaRapida/fetch_data2',[SubastaRapController::class,'fetch_data2']);


Route::get('/producto', function () {
    return view('producto');
});    
Route::get('/subirProducto', function () {
    return view('subirProducto');
});



Route::get('/registroProducto', function () {
    return view('registroProducto');
});
Route::get('/registroSubasta', function () {
    return view('registroSubasta');
});


//Route::get('/producto', [HomeController::class, 'viewproduct'])->name("producto");

Route::get('/producto-{idpro}', [HomeController::class, 'viewproduct'])->name("producto.detalles");

// Route::post('/','HomeController@registro')->name('producto.registro');
Route::post('/prueba', [HomeController::class,'registro'])->name('producto.registro');

//Edson-View
Route::post('/registroProducto', [HomeController::class,'registroE'])->name('producto.registroe');

Route::post('/registrarSubasta', [HomeController::class,'registroEE'])->name('producto.registroee');


Route::get('/registrarSubasta', function () {
    return view('registroSubasta');
});

Route::get('/registrarSubasta',  [HomeController::class,'registroS']);

Route::get('/prueba', function () {
    return view('prueba');
});


Route::post('/producto', [HomeController::class,'hacerpuja'])->name('puja.crear');
//Usuario
Route::get('/home/perfil',[userController::class,'perfilGo'])->name('perfil_us');
Route::post('/home/perfil/edit-per',[userController::class,'editarDatosPerso'] )->name('edit-datos-per');
Route::post('/home/perfil/edit-publi',[userController::class,'editarDatosPubli'] )->name('edit-datos-publi');
Route::post('/home/perfil/edit-pago',[userController::class,'pagoUser'] );
Auth::routes();
Route::get('/home',  [HomeController::class,'index'])->name('home');
Route::get('/vacassss',[HomeController::class, 'valores'])->name("nombre");//Formato ejemplo
Route::get('/index', [HomeController::class, 'pRegister'])->name('index');
Route::get('/producto', 'HomeController@pRegister')->name('index');
Route::get('/productos', 'HomeController@get_company_data')->name('data');
Route::get('/addproducto', 'HomeController@pRegister')->name('view');
Route::post('/addproducto', 'HomeController@Store')->name('store');
Route::delete('/addproducto/{id}', 'HomeController@destroy')->name('destroy');
Route::get('/addproducto/{id}/edit', 'HomeController@update')->name('update');