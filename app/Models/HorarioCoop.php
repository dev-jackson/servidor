<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class HorarioCoop extends Model{

    use HasFactory;
    protected $fillable = [
        'id',
        'id_horario',
        'id_coop'
    ];

    protected $table = 'horario_coop';
    public $timestamps  = false;

    public function horarios(): HasOne
    {
        return $this->hasOne(Horario::class, 'id', 'id_horario');
    }
    public function cooperativas(): HasMany
    {
        return $this->hasMany(Cooperativa::class);
    }
    

}