<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PruebaController;
use App\Http\Controllers\SubastaRapController;
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


Route::get('/producto', function () {
    return view('producto');
});

Route::get('/menuSubasta', function () {
    return view('menuSubasta');
});

Route::get('/rpEdson', function () {
    return view('rpEdson');
})->middleware('auth');

Route::get('/rsEdson', function () {
    return view('rsEdson');
})->middleware('auth');


Route::get('/registroProducto', function () {
    return view('registroProducto');
})->middleware('auth');


Route::get('/registroSubasta', function () {
    return view('registroSubasta');
})->middleware('auth');


Route::post('/registroProducto', [RegistroProductoController::class,'formularioProducto'])->name('producto.registroe');

Route::post('/registroSubasta', [RegistroSubastaController::class,'formularioProducto'])->name('producto.registroee');

Auth::routes();
Route::get('/home',  [HomeController::class,'index'])->name('home');
Route::get('/vacassss',[HomeController::class, 'valores'])->name("nombre");//Formato ejemplo
