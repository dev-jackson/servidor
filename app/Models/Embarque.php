<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Embarque extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'id_cooperativa',
        'id_bloque'
    ];
    protected $table = 'embarque';
    public $timestamps  = false;

    public function coopertivas(): BelongsTo
    {
        return $this->belongsTo(Cooperativa::class, 'id_cooperativa', 'id');
    }
    public function bloques(): BelongsTo
    {
        return $this->belongsTo(Bloque::class, 'id_bloque', 'id');
    }
}
