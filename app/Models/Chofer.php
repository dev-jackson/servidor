<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Chofer extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'nombre',
        'ncelular',
        'id_ciudad',
        'id_cooperativa',
    ];
    protected $table = 'chofer';
    public $timestamps  = false;

    public function ciudades(): BelongsTo
    {
        return $this->belongsTo(Ciudad::class, 'id_ciudad', 'id');
    }
    public function cooperativas(): BelongsTo
    {
        return $this->belongsTo(Cooperativa::class, 'id_cooperativa', 'id');
    }
    public function buses(): HasMany
    {
        return $this->hasMany(Bus::class);
    }


}
