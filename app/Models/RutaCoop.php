<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class RutaCoop extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'id_ruta',
        'id_cooperativa'
    ];
    protected $table = 'ruta_coop';
    public $timestamps  = false;

    public function rutas(): HasOne
    {
        return $this->hasOne(Ruta::class, 'id', 'id_ruta');
    }
    public function cooperativas(): HasMany
    {
        return $this->hasMany(Cooperativa::class);
    }
    
}
