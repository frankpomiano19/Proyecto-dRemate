<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PruebaController;
use App\Http\Controllers\SubastaRapController;
use App\Http\Controllers\registroProductoController;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;
use App\Mail\MessageReceived;


Route::get('/', function () {
    return view('welcome');
})->name("welcome");


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


Route::get('/producto', function () {
    return view('producto');
});


Route::get('/registroProducto', function () {
    return view('registroProducto');
})->middleware('auth');


Route::get('/registroSubasta', function () {
    return view('registroSubasta');
});


Route::post('/registroProducto', [registroProductoController::class,'formularioProducto'])->name('producto.registroe');


//Guarda 2doos datos de producto
Route::post('/registroSubasta', [registroProductoController::class,'formularioProDos'])->name('producto.registroee');

Auth::routes();
Route::get('/home',  [HomeController::class,'index'])->name('home');
Route::get('/vacassss',[HomeController::class, 'valores'])->name("nombre");//Formato ejemplo
