<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    //use HasFactory;

    protected $table = 'productos';

    protected $fillable = [
        'nombre_producto', 'descripcion','categoria_id', 'precio_inicial', 'imagen', 'estado','final_subasta'
    ];

    public function productoUserPropietario(){
        return $this->belongsTo(User::class,'user_id');
    }
    public function productoUserComprador(){
        return $this->belongsTo(User::class,'user_id_comprador');
    }
    /*public function productoPuja(){
        //$products = App\Models\Producto::all();
        
        return $this->hasMany(Puja::class,'producto_id');
    }*/
    public function categoriaRelacionado(){
        return $this->hasOne(Categoria::class,'categoria_id');
    }
    
}
