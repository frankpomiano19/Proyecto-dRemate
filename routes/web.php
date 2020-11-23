<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PruebaController;
use App\Http\Controllers\SubastaRapController;
use App\Http\Controllers\userController ;
use App\Http\Controllers\registroProductoController;
use App\Http\Controllers\ImageUploadController;
use App\Http\Controllers\RegistroSubastaController;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;
use App\Mail\MessageReceived;


Route::get('/', function () {
    return view('welcome');
})->name("welcome");



Route::get('/imagen', [ImageUploadController::class,'home']);

Route::post('/imagen', [ImageUploadController::class,'uploadImages'])->name("uploadImage");


Route::get('/prueba', function () {
    return view("paginaNT");
})->name("paginaPrueba");

Route::get('/template', function () {
    return view('template');
});

Route::get('/oferta', function () {
    return view('puja');
});
    

Route::get('/subastaRapida',[SubastaRapController::class,'index'])->name("subastaRapida");

Route::post('/subastaRapida',[SubastaRapController::class,'filtroProc'])->name("subastaRapida_filtro_proc");


Route::get('/subastaRapida/fetch_data',[SubastaRapController::class,'fetch_data']);
Route::get('/subastaRapida/fetch_data1',[SubastaRapController::class,'fetch_data1']);
Route::get('/subastaRapida/fetch_data2',[SubastaRapController::class,'fetch_data2']);


Route::get('/producto', function () {
    return view('producto');
});



Route::get('/registroProducto', function () {
    return view('registroProducto');
    
Route::get('/menuSubasta', function () {
    return view('menuSubasta');
});
Route::get('/registroSubasta', function () {
    return view('registroSubasta');
});


//Route::get('/producto', [HomeController::class, 'viewproduct'])->name("producto");

Route::get('/producto-{idus}-{idpro}', [HomeController::class, 'viewproduct'])->name("producto.detalles");

// Route::post('/','HomeController@registro')->name('producto.registro');
Route::post('/prueba', [HomeController::class,'registro'])->name('producto.registro');


Route::get('/registroProducto', function () {
    return view('registroProducto');
})->middleware('auth');


Route::get('/registroSubasta', function () {
    return view('registroSubasta');
})->middleware('auth');


Route::post('/registroProducto', [RegistroProductoController::class,'formularioProducto'])->name('producto.registroe');

Route::post('/registroSubasta', [RegistroSubastaController::class,'formularioProducto'])->name('producto.registroee');

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