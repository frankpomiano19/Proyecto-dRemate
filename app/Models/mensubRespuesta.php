<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class mensubRespuesta extends Model
{
    use HasFactory;
    protected $table = 'mensub_respuestas';

    protected $fillable = [
        'mensub_resp'
    ];

    public function menSubRespMenSub(){
        return $this->belongsTo(mensajeSubasta::class,'mensub_resp');
    }



}
