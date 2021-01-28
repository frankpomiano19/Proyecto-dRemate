<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subastador extends Model
{
    use HasFactory;
    protected $table = 'subastador';
    protected $fillable = [
        'numvotos', 'totalscore', 'rating','use_idsub'
    ];
   
}
