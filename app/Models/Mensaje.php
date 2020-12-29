<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mensaje extends Model
{
    use HasFactory;

    protected $table = 'mensajes';

    protected $fillable = [
        'men_mensaje','men_asunto','use_id_emisor','use_id_receptor', 'pro_id'
    ];

    public function mensajeUserEmisor(){
        return $this->belongsTo(User::class,'use_id_emisor');
    }

    public function mensajeUserReceptor(){
        return $this->belongsTo(User::class,'use_id_receptor');
    }

    public function mensajeProducto(){
        return $this->belongsTo(Producto::class,'pro_id');
    }


}
