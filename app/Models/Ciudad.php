<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Ciudad extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'nombre',
        'id_provincia'
    ];
    protected $table = 'ciudad';
    public $timestamps  = false;

    public function provincias(): BelongsTo
    {
        return $this->belongsTo(Provincia::class, 'id_provincia', 'id');
    }
    public function usuarios(): HasMany
    {
        return $this->hasMany(Users::class);
    }

}
