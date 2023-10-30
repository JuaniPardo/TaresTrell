<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Tarea extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'descripcion',
        'fecha_limite',
        'lista_id',
    ];
    function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    function lista(): BelongsTo
    {
        return $this->belongsTo(Lista::class);
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
