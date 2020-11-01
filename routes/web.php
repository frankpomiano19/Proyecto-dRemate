<?php

use App\Http\Controllers\HomeController;
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

Route::get('/templateaasdasda', function () {
    return view('template');
});


Auth::routes();

Route::get('/home',"HomeController@index" )->name('home');


