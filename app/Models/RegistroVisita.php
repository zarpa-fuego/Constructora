<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RegistroVisita extends Model
{

    protected $fillable = [
        'user_id',
        'fecha',
        'hora',
        'cliente',
        'observacion'
    ];

    // Relación con el modelo User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Cast para fechas
    protected $casts = [
        'fecha' => 'date',
        'hora' => 'datetime:H:i',
    ];
}
