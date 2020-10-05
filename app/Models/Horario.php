<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Horario extends Model
{
    use SoftDeletes;
    use HasFactory;
    protected $fillable = [
        'id',
        'dia',
        'hora_init',
        'hora_fin',
        'status',
        'created_at',
        'updated_at',
        'deleted_at'
    ];
    protected $table = 'horario';
}