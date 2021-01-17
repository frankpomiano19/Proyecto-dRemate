<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChatNotification extends Model
{
    use HasFactory;

    protected $table= "chat_notifications";
    public $fillable = ['us_envia',
    'us_recibe','confirmed','pro_id'
    ];

    public function notiChatUserEnvia(){
        return $this->belongsTo(User::class,'us_envia');
    }
    public function notiChatUserRecibe(){
        return $this->belongsTo(User::class,'us_recibe');  
    }

    public function notiChatProduct(){
        return $this->belongsToMany(Producto::class,'pro_id');
    }
}
