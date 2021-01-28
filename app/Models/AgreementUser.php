<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AgreementUser extends Model
{
    use HasFactory;
    protected $table = 'agreement_users';
    protected $fillable = [
        'agre_message',
        'pro_id'    
    ];


    public function agreementProduct(){
        return $this->belongsTo(Producto::class,'pro_id');
    }
}
