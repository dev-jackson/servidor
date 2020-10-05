<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Bloque extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'descripcion',
        'id_piso',
    ];
    protected $table = 'bloque';
    public $timestamps  = false;

    public function piso(): BelongsTo
    {
        return $this->belongsTo(Piso::class, 'id_piso', 'id');
    }
    public function embarques(): HasMany
    {
        return $this->hasMany(Embarque::class);
    }
    
    
}
