<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    protected $fillable = [
        'estado_civil',
        'nombre',
        'apellido',
        'distrito_id',
        'direccion',
        'telefono',
        'email',
        'dni_numero',
    ];

    public function distrito()
    {
        return $this->belongsTo(Distrito::class);
    }
}
