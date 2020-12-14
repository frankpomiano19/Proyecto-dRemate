<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'users';
    protected $fillable = [
        'usuario',
        'us_din',
        'us_descp',
        'email',
        'Nombres',
        'Apellidos',
        'telefono',
        'fechadenacimiento',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function userProducto(){
        return $this->hasMany(Producto::class);
    }
    public function userProductoSubastaGanada(){
        return $this->hasMany(Producto::class,'user_id_comprador');
    }

    public function userProductoSubastaIniciada(){
        $ab = date_default_timezone_get(); //Obtiene la fecha actual
        date_default_timezone_set('America/Lima'); //Obtiene la fecha de Lima Peru
        $valorN = date('Y-m-d H:i:s');//Sale el formato 2020-10-29 15:29:12
        return $this->hasMany(Producto::class,'user_id')->where('inicio_subasta','<',$valorN);
    }

    public function userProductoCompradorDestacado(){
        $ab = date_default_timezone_get(); //Obtiene la fecha actual
        date_default_timezone_set('America/Lima'); //Obtiene la fecha de Lima Peru
        $valorN = date('Y-m-d H:i:s');//Sale el formato 2020-10-29 15:29:12
        return $this->hasMany(Producto::class,'user_id')->where('final_subasta','<',$valorN);
    }

    public function userComentarioUs(){
        return $this->hasMany(Comentario::class,'use_id');    
    }


}
