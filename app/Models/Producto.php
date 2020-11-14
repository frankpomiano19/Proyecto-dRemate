<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    //use HasFactory;

    protected $table = 'productos';

    protected $fillable = [
        'nombre_producto', 'descripcion', 'precio_inicial', 'imagen', 'estado','final_subasta'
    ];

    public function productoUser(){
        return $this->belongsTo(User::class);
    }
}
