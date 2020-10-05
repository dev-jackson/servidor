<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Cooperativa extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'nombre',
        'id_ciudad',
       
    ];
    protected $table = 'cooperativa';
    public $timestamps  = false;

    public function ciudades(): BelongsTo
    {
        return $this->belongsTo(Ciudad::class, 'id_ciudad', 'id');
    }
   
    public function rutascoop(): HasMany
    {
        return $this->hasMany(RutaCoop::class, 'id_cooperativa');
    }
    public function horarioscoop(): HasMany
    {
        return $this->hasMany(HorarioCoop::class, 'id_coop');
    }

}
