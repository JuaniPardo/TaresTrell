<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Tarea extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'descripcion',
        'completada',
        'fecha_limite',
    ];
    function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    function porVencer(): bool
    {
        return Carbon::parse($this->fecha_limite)->diffInDays(now()) <= 3;
    }

    function vencida(): bool
    {
        return Carbon::parse($this->fecha_limite)->isPast();
    }
}
