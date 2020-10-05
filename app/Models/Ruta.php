<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ruta extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'nombre',
        'id_ciudad',
        'precio'
    ];
    protected $table = 'ruta';
    public $timestamps  = false;
}
