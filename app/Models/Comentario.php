<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comentario extends Model
{
    //use HasFactory;
    protected $table = 'comentarios';

    protected $fillable = [
        'com_texto', 'com_like', 'com_dislike', 'com_editado', 'com_idLike','com_idDislike','use_id','use_idComentarios'
    ];

    public function comentUser(){
        return $this->belongsTo(User::class,'use_id');   
    }
    public function comentUserPerteneciente(){
        return $this->belongsTo(User::class,'use_idComentarios');   
    }
}
