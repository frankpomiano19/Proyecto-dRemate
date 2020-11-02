<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PruebaController;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;
use App\Mail\MessageReceived;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/prueba', function () {
    return view("paginaNT");
})->name("paginaPrueba");


Route::get('/template', function () {
    return view('template');
});
Auth::routes();
Route::get('/home',  [HomeController::class,'index'])->name('home');
Route::get('/vacassss',[HomeController::class, 'valores'])->name("nombre");//Formato ejemplo
