<?php

namespace App\Models;

use App\Http\Livewire\ChatList;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Notifications\MyResetPassword;

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
        'suscripcion',
        'departamento',
        'distrito',
        'subastas'
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

    public function sendPasswordResetNotification($token)
    {
        
        $this->notify(new MyResetPassword($token));
    }

    public function userMensajeEmisor(){
        return $this->hasMany(Mensaje::class,'use_id_emisor');
    }
    public function userMensajeReceptor(){
        return $this->hasMany(Mensaje::class,'use_id_receptor');
    }

    public function userProductoCalendar(){
        return $this->belongsToMany(Producto::class, 'calendario_de_productos', 'user_id', 'producto_id');
    }


    public function userEnviaNotiChat(){
        return $this->hasMany(ChatNotification::class,'us_envia');
    }

    public function userRecibeNotiChat(){
        return $this->hasMany(ChatNotification::class,'us_recibe');
    }

    public function userReceptorMenSub(){
        return $this->hasMany(mensajeSubasta::class,'us_receptor');
    }

    public function userEmisorMenSub(){
        return $this->hasMany(mensajeSubasta::class,'us_emisor');
    }
    public function userReportUser(){
        return $this->hasMany(Report_user::class,'user_denunc_id');
    }

    public function userMessageResponseSubasta(){
        return $this->hasOne(mensubRespuesta::class,'us_response');
    }

    public function userProdBloq(){
        return $this->belongsToMany(Producto::class, 'bloq_user_pros', 'user_id', 'product_bloq_id');
    }
    //Relacion con help

    public function userHelp(){
        return $this->hasOne(Help::class,'us_id');
    }
}
