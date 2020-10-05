<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Bus extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'disco',
        'placa',
        'id_chofer',
    ];
    protected $table = 'bus';
    public $timestamps  = false;

    public function chofers(): BelongsTo
    {
        return $this->belongsTo(Chofer::class, 'id_chofer', 'id');
    }
    public function Rutas_Buses(): HasMany
    {
        return $this->hasMany(RutaBus::class);
    }

}
