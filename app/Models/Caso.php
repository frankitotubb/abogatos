<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Caso extends Model
{
    use HasFactory;
    
    protected $table = "casos";
    protected $fillable = ['detalle', 'fecha', 'autoridad', 'involucrados', 'observaciones', 'id_user', 'id_categoria'];
}
