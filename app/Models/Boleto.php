<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Boleto extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'id_usuario',
        'precio',
        'id_embarque',
        'id_rutabus',
        'fechaemision',
        'fechasalida',
        'cantidad',
        'id_asiento'
    ];
    protected $table = 'boleto';
    public $timestamps  = false;

    public function usuarios(): BelongsTo
    {
        return $this->belongsTo(Chofer::class, 'id_usuario', 'id');
    }
    public function embarques(): BelongsTo
    {
        return $this->belongsTo(Chofer::class, 'id_embarque', 'id');
    }
    public function rutas_buses(): BelongsTo
    {
        return $this->belongsTo(Chofer::class, 'id_rutabus', 'id');
    }
    public function asientos(): BelongsTo
    {
        return $this->belongsTo(Chofer::class, 'id_asiento', 'id');
    }
}
