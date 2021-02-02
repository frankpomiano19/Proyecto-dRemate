<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Help extends Model
{
    use HasFactory;
    protected $table = 'helps';

    protected $fillable = [
        'us_id','help_home','help_subasta_rapida','help_infoPerfil', 'help_comentariosPerfil','help_subastaPujas'
    ];
    public function helpUser(){
        return $this->belongsTo(User::class,'us_id');
    }

}
