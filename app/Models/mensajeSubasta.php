<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class mensajeSubasta extends Model
{
    use HasFactory;
    protected $table = 'mensaje_subastas';

    protected $fillable = [
        'men_sub_mensaje','like','dislike','us_emisor', 'us_receptor','pro_id'
    ];

    public function menSubUserReceptor(){
        return $this->belongsTo(User::class,'us_receptor');
    }
    public function menSubUserEmisor(){
        return $this->belongsTo(User::class,'us_emisor');
    }

    //Respuesta

    public function menSubRespuesta(){
        return $this->hasMany(mensubRespuesta::class,'mensub_resp');
    }

}
