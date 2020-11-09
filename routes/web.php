<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PruebaController;

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

Route::get('/subirProducto', function () {
    return view('subirProducto');
});

Route::get('/registroProducto', function () {
    return view('registroProducto');
});

Route::get('/registroSubasta', function () {
    return view('registroSubasta');
});

Auth::routes();
Route::get('/home',  [HomeController::class,'index'])->name('home');
Route::get('/vacassss',[HomeController::class, 'valores'])->name("nombre");//Formato ejemplo
