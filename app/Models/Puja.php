<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Puja extends Model
{
    //use HasFactory;
    protected $table = 'pujas';

    protected $fillable = [
        'valor_puja', 'created_at', 'updated_at'
    ];

    public function productosPujar(){
        return $this->belongsTo(Producto::class,'producto_id');
    }    

    
}
