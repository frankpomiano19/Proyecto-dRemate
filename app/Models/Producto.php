<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    //use HasFactory;

    protected $table = 'productos';

    protected $fillable = [
        'nombre_producto', 'descripcion','categoria_id', 'precio_inicial', 'imagen', 'estado','final_subasta','favorito'
    ];

    public function productoUserPropietario(){
        return $this->belongsTo(User::class,'user_id');
    }
    public function productoUserComprador(){
        return $this->belongsTo(User::class,'user_id_comprador');
    }
    public function categoriaRelacionado(){
        return $this->hasOne(Categoria::class,'categoria_id');
    }

    public function productoPuja(){
        return $this->hasMany(Puja::class,'producto_id');
    }


    public function productoMensaje(){
        return $this->hasMany(Mensaje::class,'pro_id');
    }

    public function productoChatNoti(){
        return $this->hasOne(ChatNotification::class,'pro_id');
    }

    public function productoAgreement(){
        return $this->hasMany(AgreementUser::class,'pro_id');
    }

    public function id_subastador(){
        return $this->belongsTo(Producto::class,'user_id');
    }

    
}
