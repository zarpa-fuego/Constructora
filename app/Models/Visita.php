<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visita extends Model
{
    use HasFactory;
    protected $fillable = [
        'nombre',
        'apellido',
        'telefono',
        'email',
        'empresa',
        'motivo',
        'fecha',
        'documento_identidad',
        'agente_comercial_id',
    ];

    public function agenteComercial()
    {
        return $this->belongsTo(\App\Models\User::class, 'agente_comercial_id');
    }
}
