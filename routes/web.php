<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PruebaController;
use App\Http\Controllers\SubastaRapController;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;
use App\Mail\MessageReceived;


Route::get('/', function () {
    return view('welcome');
})->name("welcome");


//Formulario Login
Route::get('/prueba', function () {
    return view("paginaNT");
})->name("paginaPrueba");

//OK
Route::get('/template', function () {
    return view('template');
});

//OK
Route::get('/oferta', function () {
    return view('puja');
});

Route::get('/subastaRapida',[SubastaRapController::class,'index'])->name("subastaRapida");
Route::post('/subastaRapida',[SubastaRapController::class,'filtroProc'])->name("subastaRapida_filtro_proc");

//OK
Route::get('/producto', function () {
    return view('producto');
});

Route::get('/Producto',function(){
    return view('paginaProducto');
});

Route::get('/Productto',function(){
    return view('registroProduc');
});

Route::get('/registroProducto', function () {
    return view('registroProducto');
})->middleware('auth');


//Guarda 1eros datos de producto
Route::post('/registroProducto', [HomeController::class,'registroE'])->name('producto.registroe');

//Guarda 2doos datos de producto
Route::post('/registrarSubasta', [HomeController::class,'registroEE'])->name('producto.registroee');


Route::get('/registroProducto', function () {
    return view('registroProducto');
})->middleware('auth');

Route::get('/registroSubasta', function () {
    return view('registroProducto');
})->middleware('auth');

Auth::routes();
Route::get('/home',  [HomeController::class,'index'])->name('home');
Route::get('/vacassss',[HomeController::class, 'valores'])->name("nombre");//Formato ejemplo
