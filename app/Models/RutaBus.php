<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class RutaBus extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'id_ruta',
        'id_bus'
    ];
    protected $table = 'ruta_bus';
    public $timestamps  = false;

    public function rutas(): BelongsTo
    {
        return $this->belongsTo(Ruta::class, 'id_ruta', 'id');
    }
    public function buses(): BelongsTo
    {
        return $this->belongsTo(Bus::class, 'id_bus', 'id');
    }
    public function boletos(): HasMany
    {
        return $this->hasMany(Boleto::class);
    }

}
